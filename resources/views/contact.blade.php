@extends('layouts.app')

@section('title','संपर्क | भारतीय स्वतंत्र शिक्षण संघ')
@section('meta_description','भारतीय स्वतंत्र शिक्षण संघ (BSSS) से संपर्क करें।')

@section('content')

<section class="page-hero">
<div class="container">
<span class="badge badge-bsss mb-3">संपर्क</span>
<h1 class="display-5">भारतीय स्वतंत्र शिक्षण संघ से जुड़ें</h1>
<p class="lead mb-0">सदस्यता, संगठन, संस्थागत सहयोग एवं अन्य जानकारी के लिए संपर्क करें।</p>
</div>
</section>

<section class="py-5">
<div class="container">
<div class="row g-4">

<div class="col-lg-5">
<div class="bsss-card p-4 p-lg-5">
<h2 class="h4 section-title mb-4">संपर्क विवरण</h2>

<p>
<strong>राष्ट्रीय अध्यक्ष एवं Authorized Person</strong><br>
भारत मानस
</p>

<p>
<strong>मोबाइल</strong><br>
<a href="tel:+919430888639">9430888639</a>
</p>

<p class="mb-0">
<strong>Website</strong><br>
bsss.mciedu.com
</p>
</div>
</div>

<div class="col-lg-7">
<div class="bsss-card p-4 p-lg-5">

<h2 class="h4 section-title">अपना संदेश भेजें</h2>
<p class="text-secondary">आपका संदेश BSSS Admin Panel में सुरक्षित प्राप्त होगा।</p>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">{{ $errors->first() }}</div>
@endif

<form method="POST" action="{{ route('enquiry.store') }}">
@csrf

<div class="row g-3">

<div class="col-md-6">
<label class="form-label">नाम *</label>
<input class="form-control" name="name" value="{{ old('name') }}" maxlength="120" required>
</div>

<div class="col-md-6">
<label class="form-label">मोबाइल *</label>
<input class="form-control" name="phone" value="{{ old('phone') }}" maxlength="30" required>
</div>

<div class="col-12">
<label class="form-label">ईमेल</label>
<input type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="150">
</div>

<div class="col-12">
<label class="form-label">विषय</label>
<input class="form-control" name="subject" value="{{ old('subject') }}" maxlength="180">
</div>

<div class="col-12">
<label class="form-label">संदेश *</label>
<textarea class="form-control" name="message" rows="5" maxlength="3000" required>{{ old('message') }}</textarea>
</div>

<div class="col-12">
<button class="btn btn-bsss px-4">संदेश भेजें</button>
</div>

</div>
</form>

</div>
</div>

</div>
</div>
</section>

@endsection
