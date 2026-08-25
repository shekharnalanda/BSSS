<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipApplication;
use Illuminate\Http\Request;

class MembershipApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = MembershipApplication::with('membershipType')
            ->latest();

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

        $membershipApplication->update($data);

        return back()->with('success', 'Membership application updated successfully.');
    }

    public function destroy(MembershipApplication $membershipApplication)
    {
        $membershipApplication->delete();

        return back()->with('success', 'Membership application deleted successfully.');
    }
}
