@extends('admin.layouts.app')

@section('title','Dashboard')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

<div>
<h2 class="admin-heading mb-1">
BSSS Administration Dashboard
</h2>

<p class="text-muted mb-0">
भारतीय स्वतंत्र शिक्षण संघ — Website & Organization Management
</p>
</div>

<a href="{{ route('home') }}"
target="_blank"
class="btn btn-bsss">
Website देखें
</a>

</div>

<div class="row g-4">

@foreach([
['कार्यकारिणी',$committeeCount,'admin.committees.index'],
['सदस्य',$memberCount,'admin.committees.index'],
['Leadership',$leadershipCount,'admin.leadership.index'],
['संस्थान / केन्द्र',$institutionCount,'admin.institutions.index'],
['सूचना / समाचार',$newsCount,'admin.news.index'],
['Gallery',$galleryCount,'admin.gallery.index'],
['Downloads',$downloadCount,'admin.downloads.index'],
['Approved Members',$memberPermanentCount,'admin.members.index'],
['Enquiries',$enquiryCount,'admin.enquiries.index']
] as [$label,$count,$route])

<div class="col-sm-6 col-xl-3">

<div class="card stat-card p-4 h-100">

<div class="text-muted small fw-bold">
{{ $label }}
</div>

<div class="stat-number my-2">
{{ $count }}
</div>

<a href="{{ route($route) }}"
class="text-decoration-none fw-bold">
Manage →
</a>

</div>

</div>

@endforeach

</div>

<div class="row g-4 mt-2">

<div class="col-lg-6">

<div class="card p-4 h-100">

<h4 class="admin-heading">
संगठन प्रबंधन
</h4>

<p class="text-muted">
राष्ट्रीय, प्रदेश और जिला कार्यकारिणी तथा सदस्यों का विवरण यहाँ से manage करें।
</p>

<div class="d-flex flex-wrap gap-2">

<a href="{{ route('admin.committees.index') }}"
class="btn btn-bsss">
कार्यकारिणी
</a>

<a href="{{ route('admin.leadership.index') }}"
class="btn btn-outline-secondary">
राष्ट्रीय अध्यक्ष संदेश
</a>

</div>

</div>
</div>

<div class="col-lg-6">

<div class="card p-4 h-100">

<h4 class="admin-heading">
Website Content
</h4>

<p class="text-muted">
सूचना, फोटो, downloads, enquiries और संस्थान संबंधी content manage करें।
</p>

<div class="d-flex flex-wrap gap-2">

<a href="{{ route('admin.news.index') }}"
class="btn btn-outline-secondary">
News
</a>

<a href="{{ route('admin.gallery.index') }}"
class="btn btn-outline-secondary">
Gallery
</a>

<a href="{{ route('admin.enquiries.index') }}"
class="btn btn-outline-secondary">
Enquiries
</a>

</div>

</div>
</div>

</div>

<div class="card p-4 mt-4">

<h4 class="admin-heading">
Programs & Membership
</h4>

<div class="row g-3">

<div class="col-md-6">
<div class="p-3 rounded border bg-light h-100">
<strong>Programs</strong>
<div class="text-muted small mb-3">
Database records: {{ $programCount }}
</div>
<a href="{{ route('admin.programs.index') }}" class="btn btn-bsss btn-sm">
Programs Manage करें
</a>
</div>
</div>

<div class="col-md-6">
<div class="p-3 rounded border bg-light h-100">
<strong>Membership Types</strong>
<div class="text-muted small mb-3">
Database records: {{ $membershipCount }}
</div>
<a href="{{ route('admin.memberships.index') }}" class="btn btn-bsss btn-sm">
Membership Manage करें
</a>
</div>
</div>

</div>

</div>

@endsection
