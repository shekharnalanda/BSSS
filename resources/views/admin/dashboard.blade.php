@extends('admin.layouts.app')

@section('title','Command Center')

@push('styles')
<style>
.command-hero{
    background:linear-gradient(135deg,#51131e,#7b1e2d 55%,#163b69);
    color:#fff;
    border-radius:22px;
    padding:28px;
    box-shadow:0 12px 35px rgba(81,19,30,.18);
}
.command-hero h1{font-weight:900}
.command-hero p{color:#f7dfe3}

.metric{
    border-top:4px solid var(--saffron);
    transition:.18s ease;
}
.metric:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 32px rgba(70,35,25,.12);
}
.metric-number{
    font-size:2.25rem;
    font-weight:900;
    color:var(--maroon);
}
.metric-label{
    font-size:.82rem;
    color:#6c757d;
    font-weight:800;
    text-transform:uppercase;
    letter-spacing:.04em;
}

.attention{
    border-left:5px solid #dc3545;
}
.attention.ok{
    border-left-color:#198754;
}

.workflow-card{
    border-left:4px solid var(--blue);
}

.quick-action{
    text-decoration:none;
    display:block;
    height:100%;
    color:#332d2b;
}
.quick-action:hover{color:var(--maroon)}

.quick-icon{
    width:46px;
    height:46px;
    border-radius:12px;
    background:#fff1df;
    display:grid;
    place-items:center;
    font-size:1.35rem;
    margin-bottom:12px;
}

.status-pending{
    color:#9a6700;
    background:#fff3cd;
}
.status-approved{
    color:#0f5132;
    background:#d1e7dd;
}
.status-rejected{
    color:#842029;
    background:#f8d7da;
}
.status-badge{
    display:inline-block;
    padding:.25rem .55rem;
    border-radius:999px;
    font-size:.72rem;
    font-weight:800;
}

@media(max-width:767px){
    .command-hero{padding:22px}
    .command-hero h1{font-size:1.65rem}
    .metric-number{font-size:1.8rem}
}
</style>
@endpush

@section('content')

<div class="command-hero mb-4">

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

<div>
<div class="small text-uppercase fw-bold opacity-75 mb-1">
BSSS Administration
</div>

<h1 class="mb-2">
Command Center
</h1>

<p class="mb-0">
Membership, affiliation, organization और website management एक ही dashboard से।
</p>
</div>

<div class="d-flex flex-wrap gap-2">

<a href="{{ route('membership.apply') }}"
   target="_blank"
   class="btn btn-light fw-bold">
Membership Form ↗
</a>

<a href="{{ route('affiliation.apply') }}"
   target="_blank"
   class="btn btn-warning fw-bold">
Affiliation Form ↗
</a>

<a href="{{ route('home') }}"
   target="_blank"
   class="btn btn-outline-light fw-bold">
Website ↗
</a>

</div>

</div>
</div>

<div class="card p-4 mb-4">

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

<div>
<div class="metric-label">Unread Notifications</div>
<div class="metric-number">{{ number_format($unreadNotificationCount) }}</div>
<div class="small text-muted">
Membership और affiliation activity alerts
</div>
</div>

<a href="{{ route('admin.notifications.index') }}"
   class="btn btn-bsss">
View Notifications
</a>

</div>

</div>

{{-- ATTENTION REQUIRED --}}

<div class="row g-4 mb-4">

<div class="col-lg-6">

<div class="card p-4 h-100 attention {{ $pendingMembershipCount == 0 ? 'ok' : '' }}">

<div class="d-flex justify-content-between align-items-start gap-3">

<div>
<div class="metric-label">
Pending Membership Applications
</div>

<div class="metric-number">
{{ number_format($pendingMembershipCount) }}
</div>

<p class="text-muted mb-3">
नए सदस्यता आवेदन जिन्हें Admin review की आवश्यकता है।
</p>

<a href="{{ route('admin.membership-applications.index', ['status'=>'pending']) }}"
   class="btn btn-bsss">
Review Applications
</a>
</div>

<div class="fs-2">
{{ $pendingMembershipCount > 0 ? '⚠' : '✓' }}
</div>

</div>

</div>
</div>

<div class="col-lg-6">

<div class="card p-4 h-100 attention {{ $pendingAffiliationCount == 0 ? 'ok' : '' }}">

<div class="d-flex justify-content-between align-items-start gap-3">

<div>
<div class="metric-label">
Pending Affiliation Applications
</div>

<div class="metric-number">
{{ number_format($pendingAffiliationCount) }}
</div>

<p class="text-muted mb-3">
विद्यालय / संस्थान संबद्धता के pending applications।
</p>

<a href="{{ route('admin.affiliation-applications.index', ['status'=>'pending']) }}"
   class="btn btn-bsss">
Review Affiliations
</a>
</div>

<div class="fs-2">
{{ $pendingAffiliationCount > 0 ? '⚠' : '✓' }}
</div>

</div>

</div>
</div>

</div>

{{-- CORE COUNTS --}}

<h3 class="admin-heading h5 mb-3">
Membership & Affiliation Overview
</h3>

<div class="row g-3 mb-4">

@foreach([
[
'Membership Applications',
$membershipApplicationCount,
'admin.membership-applications.index'
],
[
'Approved Members',
$approvedMemberCount,
'admin.members.index'
],
[
'Affiliation Applications',
$affiliationApplicationCount,
'admin.affiliation-applications.index'
],
[
'Affiliated Institutions',
$affiliatedInstitutionCount,
'admin.affiliated-institutions.index'
]
] as [$label,$count,$route])

<div class="col-6 col-xl-3">

<a href="{{ route($route) }}" class="quick-action">

<div class="card metric p-4 h-100">

<div class="metric-label">
{{ $label }}
</div>

<div class="metric-number">
{{ number_format($count) }}
</div>

<div class="small fw-bold">
Manage →
</div>

</div>

</a>

</div>

@endforeach

</div>

{{-- STATUS BREAKDOWN --}}

<div class="row g-4 mb-4">

<div class="col-lg-6">

<div class="card p-4 h-100 workflow-card">

<h4 class="admin-heading h5">
Membership Workflow
</h4>

<div class="row g-3 mt-1">

<div class="col-4">
<div class="p-3 bg-light rounded text-center">
<div class="fw-bold fs-4">{{ $pendingMembershipCount }}</div>
<div class="small text-muted">Pending</div>
</div>
</div>

<div class="col-4">
<div class="p-3 bg-light rounded text-center">
<div class="fw-bold fs-4">{{ $approvedMembershipApplicationCount }}</div>
<div class="small text-muted">Approved</div>
</div>
</div>

<div class="col-4">
<div class="p-3 bg-light rounded text-center">
<div class="fw-bold fs-4">{{ $rejectedMembershipCount }}</div>
<div class="small text-muted">Rejected</div>
</div>
</div>

</div>

<hr>

<div class="d-flex justify-content-between">
<span>Permanent Members</span>
<strong>{{ $approvedMemberCount }}</strong>
</div>

<div class="d-flex justify-content-between mt-2">
<span>Active Members</span>
<strong>{{ $activeMemberCount }}</strong>
</div>

</div>
</div>

<div class="col-lg-6">

<div class="card p-4 h-100 workflow-card">

<h4 class="admin-heading h5">
Affiliation Workflow
</h4>

<div class="row g-3 mt-1">

<div class="col-4">
<div class="p-3 bg-light rounded text-center">
<div class="fw-bold fs-4">{{ $pendingAffiliationCount }}</div>
<div class="small text-muted">Pending</div>
</div>
</div>

<div class="col-4">
<div class="p-3 bg-light rounded text-center">
<div class="fw-bold fs-4">{{ $approvedAffiliationApplicationCount }}</div>
<div class="small text-muted">Approved</div>
</div>
</div>

<div class="col-4">
<div class="p-3 bg-light rounded text-center">
<div class="fw-bold fs-4">{{ $rejectedAffiliationCount }}</div>
<div class="small text-muted">Rejected</div>
</div>
</div>

</div>

<hr>

<div class="d-flex justify-content-between">
<span>Affiliated Institutions</span>
<strong>{{ $affiliatedInstitutionCount }}</strong>
</div>

<div class="d-flex justify-content-between mt-2">
<span>Active Affiliations</span>
<strong>{{ $activeAffiliatedInstitutionCount }}</strong>
</div>

</div>
</div>

</div>

{{-- ORGANIZATION --}}

<h3 class="admin-heading h5 mb-3">
Organization Management
</h3>

<div class="row g-3 mb-4">

@foreach([
['कार्यकारिणी',$committeeCount,'admin.committees.index','राष्ट्रीय, प्रदेश और जिला समितियाँ'],
['कार्यकारिणी सदस्य',$committeeMemberCount,'admin.committees.index','पदाधिकारी एवं सदस्य'],
['Leadership',$leadershipCount,'admin.leadership.index','राष्ट्रीय नेतृत्व संदेश'],
['Programs',$programCount,'admin.programs.index','संगठन के कार्यक्रम'],
['Membership Types',$membershipTypeCount,'admin.memberships.index','सदस्यता श्रेणियाँ']
] as [$label,$count,$route,$desc])

<div class="col-md-6 col-xl">

<a href="{{ route($route) }}" class="quick-action">

<div class="card p-4 h-100">

<div class="metric-label">{{ $label }}</div>

<div class="metric-number">
{{ number_format($count) }}
</div>

<div class="small text-muted">
{{ $desc }}
</div>

</div>

</a>

</div>

@endforeach

</div>

{{-- RECENT ACTIVITY --}}

<div class="row g-4 mb-4">

<div class="col-xl-6">

<div class="card p-4 h-100">

<div class="d-flex justify-content-between align-items-center mb-3">

<h4 class="admin-heading h5 mb-0">
Recent Membership Applications
</h4>

<a href="{{ route('admin.membership-applications.index') }}"
class="small fw-bold text-decoration-none">
View All →
</a>

</div>

@forelse($recentMembershipApplications as $application)

<div class="border-top py-3">

<div class="d-flex justify-content-between gap-3">

<div>

<strong>{{ $application->name }}</strong>

<div class="small text-muted">
{{ $application->membershipType?->name ?? 'Membership' }}
@if($application->district)
• {{ $application->district }}
@endif
</div>

</div>

<span class="status-badge status-{{ $application->status }}">
{{ ucfirst($application->status) }}
</span>

</div>

</div>

@empty

<div class="text-muted py-3">
अभी कोई membership application प्राप्त नहीं हुआ है।
</div>

@endforelse

</div>
</div>

<div class="col-xl-6">

<div class="card p-4 h-100">

<div class="d-flex justify-content-between align-items-center mb-3">

<h4 class="admin-heading h5 mb-0">
Recent Affiliation Applications
</h4>

<a href="{{ route('admin.affiliation-applications.index') }}"
class="small fw-bold text-decoration-none">
View All →
</a>

</div>

@forelse($recentAffiliationApplications as $application)

<div class="border-top py-3">

<div class="d-flex justify-content-between gap-3">

<div>

<strong>
{{ $application->institution_name }}
</strong>

<div class="small text-muted">
{{ $application->contact_person }}

@if($application->district)
• {{ $application->district }}
@endif

</div>

</div>

<span class="status-badge status-{{ $application->status }}">
{{ ucfirst($application->status) }}
</span>

</div>

</div>

@empty

<div class="text-muted py-3">
अभी कोई affiliation application प्राप्त नहीं हुआ है।
</div>

@endforelse

</div>
</div>

</div>

{{-- WEBSITE CONTENT --}}

<h3 class="admin-heading h5 mb-3">
Website & Content
</h3>

<div class="row g-3">

@foreach([
['संस्थान / केन्द्र',$institutionCount,'admin.institutions.index'],
['News',$newsCount,'admin.news.index'],
['Gallery',$galleryCount,'admin.gallery.index'],
['Downloads',$downloadCount,'admin.downloads.index'],
['Enquiries',$enquiryCount,'admin.enquiries.index']
] as [$label,$count,$route])

<div class="col-6 col-lg">

<a href="{{ route($route) }}" class="quick-action">

<div class="card p-3 h-100">

<div class="metric-label">
{{ $label }}
</div>

<div class="fs-4 fw-bold mt-2" style="color:var(--maroon)">
{{ number_format($count) }}
</div>

</div>

</a>

</div>

@endforeach

</div>

@endsection
