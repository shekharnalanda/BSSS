<?php

namespace App\Http\Controllers;

use App\Models\Member;

class MemberVerificationController extends Controller
{
    public function show(string $membershipNumber)
    {
        $member = Member::with('membershipType')
            ->where('membership_number', $membershipNumber)
            ->firstOrFail();

        return view('members.verify', compact('member'));
    }
}
