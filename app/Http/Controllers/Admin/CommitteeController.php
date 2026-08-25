<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\CommitteeMember;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    public function index()
    {
        $committees = Committee::with('members')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.committees.index', compact('committees'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'level' => ['required', 'in:national,state,district,block,local'],
            'state' => ['nullable', 'string', 'max:255'],
            'district' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        Committee::create($data);

        return back()->with('success', 'Committee created successfully.');
    }

    public function update(Request $request, Committee $committee)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'level' => ['required', 'in:national,state,district,block,local'],
            'state' => ['nullable', 'string', 'max:255'],
            'district' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $committee->update($data);

        return back()->with('success', 'Committee updated successfully.');
    }

    public function destroy(Committee $committee)
    {
        $committee->delete();

        return back()->with('success', 'Committee deleted successfully.');
    }

    public function storeMember(Request $request, Committee $committee)
    {
        $data = $request->validate([
            'designation' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['nullable', 'string', 'max:20'],
            'alternate_mobile' => ['nullable', 'string', 'max:20'],
            'photo' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_authorized_person'] = $request->boolean('is_authorized_person');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $committee->members()->create($data);

        return back()->with('success', 'Committee member added successfully.');
    }

    public function updateMember(Request $request, CommitteeMember $member)
    {
        $data = $request->validate([
            'designation' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['nullable', 'string', 'max:20'],
            'alternate_mobile' => ['nullable', 'string', 'max:20'],
            'photo' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_authorized_person'] = $request->boolean('is_authorized_person');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $member->update($data);

        return back()->with('success', 'Committee member updated successfully.');
    }

    public function destroyMember(CommitteeMember $member)
    {
        $member->delete();

        return back()->with('success', 'Committee member deleted successfully.');
    }
}
