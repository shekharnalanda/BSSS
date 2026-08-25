<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\Download;
use App\Models\Enquiry;
use App\Models\GalleryItem;
use App\Models\Institution;
use App\Models\LeadershipMessage;
use App\Models\Member;
use App\Models\MembershipType;
use App\Models\NewsPost;
use App\Models\Program;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'committeeCount' => Committee::count(),
            'memberCount' => CommitteeMember::count(),
            'memberPermanentCount' => Member::count(),
            'leadershipCount' => LeadershipMessage::count(),
            'programCount' => Program::count(),
            'membershipCount' => MembershipType::count(),
            'institutionCount' => Institution::count(),
            'newsCount' => NewsPost::count(),
            'galleryCount' => GalleryItem::count(),
            'downloadCount' => Download::count(),
            'enquiryCount' => Enquiry::count(),
        ]);
    }
}
