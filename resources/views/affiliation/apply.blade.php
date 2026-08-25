@extends('layouts.app')

@section('title','संस्थान संबद्धता आवेदन | BSSS')

@section('content')

<section class="page-hero">
<div class="container">
<span class="badge badge-bsss mb-3">Institution Affiliation</span>
<h1 class="display-5">संस्थान संबद्धता आवेदन</h1>
<p class="lead mb-0">BSSS से संस्थागत संबद्धता हेतु ऑनलाइन आवेदन करें।</p>
</div>
</section>

<section class="py-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-9">
<div class="bsss-card p-4 p-lg-5">

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
{{ $errors->first() }}
</div>
@endif

<form method="POST" action="{{ route('affiliation.store') }}">
@csrf

<div class="row g-3">

<div class="col-md-8">
<label class="form-label">संस्थान का नाम *</label>
<input class="form-control" name="institution_name"
value="{{ old('institution_name') }}" required>
</div>

<div class="col-md-4">
<label class="form-label">संस्थान प्रकार</label>
<input class="form-control" name="institution_type"
placeholder="School / Institute / Training Centre"
value="{{ old('institution_type') }}">
</div>

<div class="col-md-6">
<label class="form-label">संपर्क व्यक्ति *</label>
<input class="form-control" name="contact_person"
value="{{ old('contact_person') }}" required>
</div>

<div class="col-md-6">
<label class="form-label">मोबाइल *</label>
<input class="form-control" name="mobile"
value="{{ old('mobile') }}" required>
</div>

<div class="col-md-6">
<label class="form-label">ईमेल</label>
<input type="email" class="form-control" name="email"
value="{{ old('email') }}">
</div>

<div class="col-md-6">
<label class="form-label">Website</label>
<input class="form-control" name="website"
value="{{ old('website') }}">
</div>

<div class="col-12">
<label class="form-label">पूरा पता *</label>
<textarea class="form-control" name="address" rows="3" required>{{ old('address') }}</textarea>
</div>

<div class="col-md-4">
<label class="form-label">जिला</label>
<input class="form-control" name="district"
value="{{ old('district') }}">
</div>

<div class="col-md-4">
<label class="form-label">राज्य</label>
<input class="form-control" name="state"
value="{{ old('state','बिहार') }}">
</div>

<div class="col-md-4">
<label class="form-label">PIN</label>
<input class="form-control" name="pincode"
value="{{ old('pincode') }}">
</div>

<div class="col-md-6">
<label class="form-label">स्थापना वर्ष</label>
<input class="form-control" name="establishment_year"
value="{{ old('establishment_year') }}">
</div>

<div class="col-md-6">
<label class="form-label">Registration No.</label>
<input class="form-control" name="registration_number"
value="{{ old('registration_number') }}">
</div>

<div class="col-12">
<label class="form-label">Courses / Activities</label>
<textarea class="form-control" name="courses_or_activities" rows="4">{{ old('courses_or_activities') }}</textarea>
</div>

<div class="col-12">
<label class="form-label">अतिरिक्त जानकारी</label>
<textarea class="form-control" name="message" rows="3">{{ old('message') }}</textarea>
</div>

<div class="col-12">
<button class="btn btn-bsss btn-lg">
आवेदन जमा करें
</button>
</div>

</div>
</form>

</div>
</div>
</div>
</div>
</section>

@endsection
