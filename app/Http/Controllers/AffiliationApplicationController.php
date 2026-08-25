<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\AffiliationApplication;
use Illuminate\Http\Request;

class AffiliationApplicationController extends Controller
{
    public function create()
    {
        return view('affiliation.apply');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'institution_name' => ['required','string','max:200'],
            'institution_type' => ['nullable','string','max:100'],
            'contact_person' => ['required','string','max:150'],
            'mobile' => ['required','string','max:20'],
            'email' => ['nullable','email','max:150'],
            'address' => ['required','string','max:1500'],
            'district' => ['nullable','string','max:100'],
            'state' => ['nullable','string','max:100'],
            'pincode' => ['nullable','string','max:10'],
            'establishment_year' => ['nullable','string','max:10'],
            'registration_number' => ['nullable','string','max:120'],
            'website' => ['nullable','url','max:255'],
            'courses_or_activities' => ['nullable','string','max:3000'],
            'message' => ['nullable','string','max:2000'],
        ]);

        $data['status'] = 'pending';

        $application = AffiliationApplication::create($data);

        AdminNotification::create([
            'type' => 'affiliation_application',
            'title' => 'New Affiliation Application',
            'message' => $application->institution_name.' ने नया affiliation application submit किया है।',
            'url' => route('admin.affiliation-applications.index'),
        ]);

        return back()->with(
            'success',
            'आपका संस्थान संबद्धता आवेदन सफलतापूर्वक प्राप्त हो गया है।'
        );
    }
}
