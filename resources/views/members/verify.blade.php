@extends('layouts.app')

@section('title','सदस्य सत्यापन | भारतीय स्वतंत्र शिक्षण संघ')
@section('meta_description','BSSS membership verification page.')

@section('content')

<section class="page-hero">
<div class="container">
<span class="badge badge-bsss mb-3">Membership Verification</span>
<h1 class="display-5">सदस्य सत्यापन</h1>
<p class="lead mb-0">भारतीय स्वतंत्र शिक्षण संघ सदस्यता की ऑनलाइन पुष्टि</p>
</div>
</section>

<section class="py-5">
<div class="container">
<div class="row justify-content-center">

<div class="col-lg-8">

<div class="bsss-card p-4 p-lg-5">

<div class="text-center mb-4">

<img src="{{ asset('images/bsss/bsss-main-logo.png') }}"
     alt="BSSS"
     style="width:110px;height:110px;object-fit:contain">

<h2 class="section-title mt-3 mb-1">
भारतीय स्वतंत्र शिक्षण संघ
</h2>

<div class="fw-bold" style="color:var(--saffron)">
शिक्षित भारत • समृद्ध भारत
</div>

</div>

@if($member->status === 'active')
<div class="alert alert-success text-center fw-bold">
✓ यह BSSS सदस्यता वर्तमान में ACTIVE है।
</div>
@elseif($member->status === 'suspended')
<div class="alert alert-danger text-center fw-bold">
⚠ यह BSSS सदस्यता SUSPENDED है।
</div>
@else
<div class="alert alert-secondary text-center fw-bold">
यह BSSS सदस्यता INACTIVE है।
</div>
@endif

<div class="row g-4 mt-2">

<div class="col-md-4 text-center">

@if($member->photo)
<img src="{{ asset('storage/'.$member->photo) }}"
     alt="{{ $member->name }}"
     style="width:150px;height:180px;object-fit:cover;border-radius:12px;border:1px solid #ddd">
@else
<div style="width:150px;height:180px;margin:auto;display:grid;place-items:center;background:#f4eadf;border-radius:12px;color:#7b1e2d;font-weight:bold">
PHOTO
</div>
@endif

</div>

<div class="col-md-8">

<table class="table table-bordered">

<tr>
<th>Membership No.</th>
<td><strong>{{ $member->membership_number }}</strong></td>
</tr>

<tr>
<th>नाम</th>
<td>{{ $member->name }}</td>
</tr>

<tr>
<th>Membership Type</th>
<td>{{ $member->membershipType?->name ?? 'Member' }}</td>
</tr>

@if($member->institution_name)
<tr>
<th>संस्थान</th>
<td>{{ $member->institution_name }}</td>
</tr>
@endif

@if($member->district || $member->state)
<tr>
<th>क्षेत्र</th>
<td>
{{ $member->district }}
@if($member->district && $member->state), @endif
{{ $member->state }}
</td>
</tr>
@endif

<tr>
<th>Membership Date</th>
<td>{{ $member->joined_on?->format('d-m-Y') ?? '—' }}</td>
</tr>

<tr>
<th>Valid Until</th>
<td>{{ $member->valid_until?->format('d-m-Y') ?? 'Not specified' }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ strtoupper($member->status) }}</td>
</tr>

</table>

</div>
</div>

<div class="text-center mt-4 small text-muted">
इस verification page पर केवल सार्वजनिक सदस्यता जानकारी प्रदर्शित की जाती है।
</div>

</div>
</div>

</div>
</div>
</section>

@endsection
