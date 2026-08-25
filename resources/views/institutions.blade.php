@extends('layouts.app')

@section('title','संस्थान एवं केन्द्र | भारतीय स्वतंत्र शिक्षण संघ')
@section('meta_description','भारतीय स्वतंत्र शिक्षण संघ से जुड़े संस्थानों और केन्द्रों की जानकारी।')

@section('content')

<section class="page-hero">
<div class="container">
<span class="badge badge-bsss mb-3">BSSS Network</span>
<h1 class="display-5">संबद्ध संस्थान एवं केन्द्र</h1>
<p class="lead mb-0">शिक्षा और सामाजिक विकास के लिए बढ़ता हुआ संगठनात्मक नेटवर्क</p>
</div>
</section>

<section class="py-5">
<div class="container">

<div class="row g-4">

@forelse($institutions as $institution)

<div class="col-md-6 col-lg-4">
<div class="bsss-card p-4 d-flex flex-column">

@if($institution->logo)
<img src="{{ $institution->logo }}"
alt="{{ $institution->name }}"
class="mb-3"
style="max-height:75px;max-width:170px;object-fit:contain">
@endif

<div class="mb-3">
<span class="badge badge-bsss">BSSS Network</span>
</div>

<h3 class="h4 section-title">{{ $institution->name }}</h3>

<p class="text-secondary flex-grow-1">
{{ $institution->short_description ?: $institution->description }}
</p>

@if($institution->website_url)
<a href="{{ $institution->website_url }}"
target="_blank"
rel="noopener"
class="btn btn-bsss align-self-start">
Website देखें
</a>
@endif

</div>
</div>

@empty

<div class="col-12">
<div class="alert alert-light border text-center">
संबद्ध संस्थानों एवं केन्द्रों की जानकारी शीघ्र प्रकाशित की जाएगी।
</div>
</div>

@endforelse

</div>
</div>
</section>

@endsection
