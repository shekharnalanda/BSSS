<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AffiliatedInstitution;
use App\Models\AffiliationApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AffiliationApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = AffiliationApplication::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $applications = $query->paginate(25)->withQueryString();

        return view(
            'admin.affiliation-applications.index',
            compact('applications')
        );
    }

    public function update(
        Request $request,
        AffiliationApplication $affiliationApplication
    ) {
        $data = $request->validate([
            'status' => ['required','in:pending,approved,rejected'],
            'admin_note' => ['nullable','string','max:2000'],
        ]);

        DB::transaction(function () use ($data, $affiliationApplication) {

            $affiliationApplication->update($data);

            if ($data['status'] === 'approved') {
                $this->createOrUpdateInstitution($affiliationApplication);
            }
        });

        return back()->with('success','Affiliation application updated.');
    }

    public function destroy(AffiliationApplication $affiliationApplication)
    {
        $affiliationApplication->delete();

        return back()->with('success','Affiliation application deleted.');
    }

    private function createOrUpdateInstitution(
        AffiliationApplication $application
    ): AffiliatedInstitution {

        $existing = AffiliatedInstitution::where(
            'affiliation_application_id',
            $application->id
        )->first();

        $data = [
            'institution_name' => $application->institution_name,
            'institution_type' => $application->institution_type,
            'contact_person' => $application->contact_person,
            'mobile' => $application->mobile,
            'email' => $application->email,
            'address' => $application->address,
            'district' => $application->district,
            'state' => $application->state,
            'pincode' => $application->pincode,
            'registration_number' => $application->registration_number,
            'website' => $application->website,
            'affiliated_on' => now()->toDateString(),
            'status' => 'active',
        ];

        if ($existing) {
            $existing->update($data);
            return $existing;
        }

        return AffiliatedInstitution::create(
            array_merge(
                $data,
                [
                    'affiliation_application_id' => $application->id,
                    'affiliation_number' => $this->generateNumber(),
                ]
            )
        );
    }

    private function generateNumber(): string
    {
        $year = now()->format('Y');

        $last = AffiliatedInstitution::where(
            'affiliation_number',
            'like',
            "BSSS-AFF-{$year}-%"
        )
        ->orderByDesc('id')
        ->value('affiliation_number');

        $sequence = 1;

        if ($last && preg_match('/(\d{5})$/', $last, $matches)) {
            $sequence = ((int)$matches[1]) + 1;
        }

        do {
            $number = sprintf(
                'BSSS-AFF-%s-%05d',
                $year,
                $sequence++
            );
        } while (
            AffiliatedInstitution::where(
                'affiliation_number',
                $number
            )->exists()
        );

        return $number;
    }
}
