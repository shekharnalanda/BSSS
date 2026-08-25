<?php

namespace App\Http\Controllers;

use App\Models\AffiliatedInstitution;

class AffiliationVerificationController extends Controller
{
    public function show(string $affiliationNumber)
    {
        $institution = AffiliatedInstitution::where(
            'affiliation_number',
            $affiliationNumber
        )->firstOrFail();

        return view(
            'affiliation.verify',
            compact('institution')
        );
    }
}
