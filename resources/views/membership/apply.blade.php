@extends('layouts.app')

@section('title','सदस्यता आवेदन | भारतीय स्वतंत्र शिक्षण संघ')
@section('meta_description','भारतीय स्वतंत्र शिक्षण संघ (BSSS) की सदस्यता हेतु ऑनलाइन आवेदन करें।')

@section('content')

<section class="page-hero">
<div class="container">
<span class="badge badge-bsss mb-3">Membership</span>
<h1 class="display-5">BSSS सदस्यता आवेदन</h1>
<p class="lead mb-0">भारतीय स्वतंत्र शिक्षण संघ से जुड़ने के लिए अपना विवरण भरें।</p>
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
<ul class="mb-0">
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form method="POST" action="{{ route('membership.store') }}" enctype="multipart/form-data">
@csrf

<div class="row g-3">

<div class="col-md-6">
<label class="form-label">सदस्यता प्रकार *</label>
<select name="membership_type_id" class="form-select" required>
<option value="">चुनें</option>
@foreach($membershipTypes as $type)
<option value="{{ $type->id }}" @selected(old('membership_type_id') == $type->id)>
{{ $type->name }}
@if(!is_null($type->fee))
- ₹{{ number_format((float)$type->fee,2) }}
@endif
</option>
@endforeach
</select>
</div>

<div class="col-md-6">
<label class="form-label">पूरा नाम *</label>
<input class="form-control" name="name" value="{{ old('name') }}" required>
</div>

<div class="col-md-6">
<label class="form-label">मोबाइल *</label>
<input class="form-control" name="mobile" value="{{ old('mobile') }}" required>
</div>

<div class="col-md-6">
<label class="form-label">ईमेल</label>
<input type="email" class="form-control" name="email" value="{{ old('email') }}">
</div>

<div class="col-md-6">
<label class="form-label">फोटो</label>
<input type="file"
       class="form-control"
       name="photo"
       accept=".jpg,.jpeg,.png,.webp,image/*">
<div class="form-text">
JPG, PNG या WEBP • अधिकतम 2 MB
</div>
</div>

<div class="col-md-6">
<label class="form-label">पिता / पति / पत्नी का नाम</label>
<input class="form-control" name="father_or_spouse_name" value="{{ old('father_or_spouse_name') }}">
</div>

<div class="col-md-6">
<label class="form-label">जन्म तिथि</label>
<input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">
</div>

<div class="col-md-6">
<label class="form-label">व्यवसाय / कार्य</label>
<input class="form-control" name="occupation" value="{{ old('occupation') }}">
</div>

<div class="col-md-6">
<label class="form-label">संस्थान / विद्यालय का नाम</label>
<input class="form-control" name="institution_name" value="{{ old('institution_name') }}">
</div>

<div class="col-12">
<label class="form-label">पूरा पता</label>
<textarea class="form-control" name="address" rows="3">{{ old('address') }}</textarea>
</div>

<div class="col-md-4">
<label class="form-label">जिला</label>
<input class="form-control" name="district" value="{{ old('district') }}">
</div>

<div class="col-md-4">
<label class="form-label">राज्य</label>
<input class="form-control" name="state" value="{{ old('state','बिहार') }}">
</div>

<div class="col-md-4">
<label class="form-label">पिन कोड</label>
<input class="form-control" name="pincode" value="{{ old('pincode') }}">
</div>

<div class="col-12">
<label class="form-label">संदेश / अतिरिक्त जानकारी</label>
<textarea class="form-control" name="message" rows="4">{{ old('message') }}</textarea>
</div>

<div class="col-12">
<button class="btn btn-bsss btn-lg">
सदस्यता आवेदन जमा करें
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
