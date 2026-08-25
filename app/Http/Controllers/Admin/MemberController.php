<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::with('membershipType')
            ->orderByDesc('id');

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('membership_number', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%")
                    ->orWhere('district', 'like', "%{$search}%");
            });
        }

        $members = $query->paginate(25)->withQueryString();

        return view('admin.members.index', compact('members'));
    }

    public function update(Request $request, Member $member)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'mobile' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:150'],
            'occupation' => ['nullable', 'string', 'max:150'],
            'institution_name' => ['nullable', 'string', 'max:180'],
            'address' => ['nullable', 'string', 'max:1000'],
            'district' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'pincode' => ['nullable', 'string', 'max:10'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'valid_until' => ['nullable', 'date'],
            'status' => ['required', 'in:active,inactive,suspended'],
        ]);

        unset($data['photo']);

        if ($request->hasFile('photo')) {

            if (
                $member->photo &&
                str_starts_with($member->photo, 'members/') &&
                Storage::disk('public')->exists($member->photo)
            ) {
                Storage::disk('public')->delete($member->photo);
            }

            $data['photo'] = $request->file('photo')
                ->store('members/photos', 'public');
        }

        $member->update($data);

        return back()->with('success', 'Member updated successfully.');
    }

    public function card(Member $member)
    {
        $member->load('membershipType');

        return view('admin.members.card', compact('member'));
    }

    public function certificate(Member $member)
    {
        $member->load('membershipType');

        return view('admin.members.certificate', compact('member'));
    }
}
