@extends('layouts.app')

@section('title','Affiliation Verification | BSSS')

@section('content')

<section class="page-hero">
<div class="container">
<h1 class="display-5">Institution Affiliation Verification</h1>
</div>
</section>

<section class="py-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">

<div class="bsss-card p-4 p-lg-5 text-center">

<img src="{{ asset('images/bsss/bsss-main-logo.png') }}"
style="width:110px;height:110px;object-fit:contain"
alt="BSSS">

<h2 class="section-title mt-3">
{{ $institution->institution_name }}
</h2>

@if($institution->status === 'active')
<div class="alert alert-success fw-bold">
✓ यह BSSS संबद्धता ACTIVE है।
</div>
@elseif($institution->status === 'suspended')
<div class="alert alert-danger fw-bold">
यह संबद्धता SUSPENDED है।
</div>
@else
<div class="alert alert-secondary fw-bold">
यह संबद्धता INACTIVE है।
</div>
@endif

<table class="table table-bordered text-start mt-4">

<tr>
<th>Affiliation No.</th>
<td><strong>{{ $institution->affiliation_number }}</strong></td>
</tr>

<tr>
<th>Institution</th>
<td>{{ $institution->institution_name }}</td>
</tr>

<tr>
<th>Type</th>
<td>{{ $institution->institution_type ?: '—' }}</td>
</tr>

<tr>
<th>Contact Person</th>
<td>{{ $institution->contact_person }}</td>
</tr>

<tr>
<th>District / State</th>
<td>{{ $institution->district }}, {{ $institution->state }}</td>
</tr>

<tr>
<th>Affiliated On</th>
<td>{{ $institution->affiliated_on?->format('d-m-Y') ?? '—' }}</td>
</tr>

<tr>
<th>Valid Until</th>
<td>{{ $institution->valid_until?->format('d-m-Y') ?? 'Not specified' }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ strtoupper($institution->status) }}</td>
</tr>

</table>

</div>

</div>
</div>
</div>
</section>

@endsection
