<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\MembershipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembershipApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = MembershipApplication::with('membershipType')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $applications = $query->paginate(25)->withQueryString();

        return view('admin.membership-applications.index', compact('applications'));
    }

    public function update(Request $request, MembershipApplication $membershipApplication)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,approved,rejected'],
            'admin_note' => ['nullable', 'string', 'max:2000'],
        ]);

        DB::transaction(function () use ($data, $membershipApplication) {

            $membershipApplication->update($data);

            if ($data['status'] === 'approved') {
                $this->createOrUpdateMember($membershipApplication);
            }
        });

        return back()->with('success', 'Membership application updated successfully.');
    }

    public function destroy(MembershipApplication $membershipApplication)
    {
        $membershipApplication->delete();

        return back()->with('success', 'Membership application deleted successfully.');
    }

    private function createOrUpdateMember(MembershipApplication $application): Member
    {
        $existing = Member::where(
            'membership_application_id',
            $application->id
        )->first();

        if ($existing) {
            $existing->update($this->memberData($application));
            return $existing;
        }

        $member = Member::create(array_merge(
            $this->memberData($application),
            [
                'membership_application_id' => $application->id,
                'membership_number' => $this->generateMembershipNumber(),
            ]
        ));

        return $member;
    }

    private function memberData(MembershipApplication $application): array
    {
        $validUntil = null;

        if ($application->membershipType?->validity_months) {
            $validUntil = now()
                ->addMonths($application->membershipType->validity_months)
                ->toDateString();
        }

        return [
            'membership_type_id' => $application->membership_type_id,
            'name' => $application->name,
            'mobile' => $application->mobile,
            'email' => $application->email,
            'father_or_spouse_name' => $application->father_or_spouse_name,
            'date_of_birth' => $application->date_of_birth,
            'occupation' => $application->occupation,
            'institution_name' => $application->institution_name,
            'address' => $application->address,
            'district' => $application->district,
            'state' => $application->state,
            'pincode' => $application->pincode,
            'photo' => $application->photo,
            'joined_on' => now()->toDateString(),
            'valid_until' => $validUntil,
            'status' => 'active',
        ];
    }

    private function generateMembershipNumber(): string
    {
        $year = now()->format('Y');

        $last = Member::where('membership_number', 'like', "BSSS-{$year}-%")
            ->orderByDesc('id')
            ->value('membership_number');

        $sequence = 1;

        if ($last && preg_match('/(\d{6})$/', $last, $matches)) {
            $sequence = ((int) $matches[1]) + 1;
        }

        do {
            $number = sprintf(
                'BSSS-%s-%06d',
                $year,
                $sequence++
            );
        } while (
            Member::where('membership_number', $number)->exists()
        );

        return $number;
    }
}
