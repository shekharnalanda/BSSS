<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MembershipTypeController extends Controller
{
    public function index()
    {
        $membershipTypes = MembershipType::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.memberships.index', compact('membershipTypes'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        MembershipType::create($data);

        return back()->with('success', 'Membership type added successfully.');
    }

    public function update(Request $request, MembershipType $membershipType)
    {
        $membershipType->update($this->validated($request, $membershipType));
        return back()->with('success', 'Membership type updated successfully.');
    }

    public function destroy(MembershipType $membershipType)
    {
        $membershipType->delete();
        return back()->with('success', 'Membership type deleted successfully.');
    }

    private function validated(Request $request, ?MembershipType $membershipType = null): array
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'slug' => ['nullable','string','max:255'],
            'description' => ['nullable','string'],
            'fee' => ['nullable','numeric','min:0'],
            'validity_months' => ['nullable','integer','min:1'],
            'sort_order' => ['nullable','integer','min:0'],
        ]);

        $slug = $data['slug'] ?: Str::slug($data['name']);

        if (!$slug) {
            $slug = 'membership-' . time();
        }

        $base = $slug;
        $i = 1;

        while (
            MembershipType::where('slug', $slug)
                ->when($membershipType, fn($q) => $q->where('id', '!=', $membershipType->id))
                ->exists()
        ) {
            $slug = $base . '-' . $i++;
        }

        $data['slug'] = $slug;
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
