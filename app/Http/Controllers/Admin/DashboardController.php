<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\AffiliatedInstitution;
use App\Models\AffiliationApplication;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\Download;
use App\Models\Enquiry;
use App\Models\GalleryItem;
use App\Models\Institution;
use App\Models\LeadershipMessage;
use App\Models\Member;
use App\Models\MembershipApplication;
use App\Models\MembershipType;
use App\Models\NewsPost;
use App\Models\Program;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'unreadNotificationCount' => AdminNotification::where('is_read', false)->count(),


            // Organization
            'committeeCount' => Committee::count(),
            'committeeMemberCount' => CommitteeMember::count(),
            'leadershipCount' => LeadershipMessage::count(),

            // Membership
            'membershipApplicationCount' => MembershipApplication::count(),
            'pendingMembershipCount' => MembershipApplication::where('status', 'pending')->count(),
            'approvedMembershipApplicationCount' => MembershipApplication::where('status', 'approved')->count(),
            'rejectedMembershipCount' => MembershipApplication::where('status', 'rejected')->count(),
            'approvedMemberCount' => Member::count(),
            'activeMemberCount' => Member::where('status', 'active')->count(),
            'membershipTypeCount' => MembershipType::count(),

            // Affiliation
            'affiliationApplicationCount' => AffiliationApplication::count(),
            'pendingAffiliationCount' => AffiliationApplication::where('status', 'pending')->count(),
            'approvedAffiliationApplicationCount' => AffiliationApplication::where('status', 'approved')->count(),
            'rejectedAffiliationCount' => AffiliationApplication::where('status', 'rejected')->count(),
            'affiliatedInstitutionCount' => AffiliatedInstitution::count(),
            'activeAffiliatedInstitutionCount' => AffiliatedInstitution::where('status', 'active')->count(),

            // Programs / website
            'programCount' => Program::count(),
            'institutionCount' => Institution::count(),
            'newsCount' => NewsPost::count(),
            'galleryCount' => GalleryItem::count(),
            'downloadCount' => Download::count(),
            'enquiryCount' => Enquiry::count(),

            // Recent workflow
            'recentMembershipApplications' => MembershipApplication::with('membershipType')
                ->latest()
                ->limit(5)
                ->get(),

            'recentAffiliationApplications' => AffiliationApplication::latest()
                ->limit(5)
                ->get(),
        ]);
    }
}
