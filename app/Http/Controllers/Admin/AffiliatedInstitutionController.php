<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AffiliatedInstitution;
use Illuminate\Http\Request;

class AffiliatedInstitutionController extends Controller
{
    public function index(Request $request)
    {
        $query = AffiliatedInstitution::orderByDesc('id');

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('affiliation_number','like',"%{$search}%")
                    ->orWhere('institution_name','like',"%{$search}%")
                    ->orWhere('mobile','like',"%{$search}%")
                    ->orWhere('district','like',"%{$search}%");
            });
        }

        $institutions = $query->paginate(25)->withQueryString();

        return view(
            'admin.affiliated-institutions.index',
            compact('institutions')
        );
    }

    public function update(
        Request $request,
        AffiliatedInstitution $affiliatedInstitution
    ) {
        $data = $request->validate([
            'institution_name' => ['required','string','max:200'],
            'contact_person' => ['required','string','max:150'],
            'mobile' => ['required','string','max:20'],
            'email' => ['nullable','email','max:150'],
            'address' => ['required','string','max:1500'],
            'district' => ['nullable','string','max:100'],
            'state' => ['nullable','string','max:100'],
            'pincode' => ['nullable','string','max:10'],
            'website' => ['nullable','url','max:255'],
            'valid_until' => ['nullable','date'],
            'status' => ['required','in:active,inactive,suspended'],
        ]);

        $affiliatedInstitution->update($data);

        return back()->with('success','Institution updated.');
    }

    public function certificate(
        AffiliatedInstitution $affiliatedInstitution
    ) {
        return view(
            'admin.affiliated-institutions.certificate',
            compact('affiliatedInstitution')
        );
    }
}
