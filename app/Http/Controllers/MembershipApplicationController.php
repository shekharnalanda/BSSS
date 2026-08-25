<?php

namespace App\Http\Controllers;

use App\Models\MembershipApplication;
use App\Models\MembershipType;
use Illuminate\Http\Request;

class MembershipApplicationController extends Controller
{
    public function create()
    {
        $membershipTypes = MembershipType::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('membership.apply', compact('membershipTypes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'membership_type_id' => ['required', 'exists:membership_types,id'],
            'name' => ['required', 'string', 'max:150'],
            'mobile' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:150'],
            'father_or_spouse_name' => ['nullable', 'string', 'max:150'],
            'date_of_birth' => ['nullable', 'date', 'before_or_equal:today'],
            'occupation' => ['nullable', 'string', 'max:150'],
            'institution_name' => ['nullable', 'string', 'max:180'],
            'address' => ['nullable', 'string', 'max:1000'],
            'district' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'pincode' => ['nullable', 'string', 'max:10'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('members/applications', 'public');
        }

        $data['status'] = 'pending';

        MembershipApplication::create($data);

        return back()->with(
            'success',
            'आपका सदस्यता आवेदन सफलतापूर्वक प्राप्त हो गया है। BSSS टीम आपसे संपर्क करेगी।'
        );
    }
}
