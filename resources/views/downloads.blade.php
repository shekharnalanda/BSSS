@extends('layouts.app')

@section('title','डाउनलोड | भारतीय स्वतंत्र शिक्षण संघ')

@section('content')

<section class="page-hero">
<div class="container">
<span class="badge badge-bsss mb-3">Documents</span>
<h1 class="display-5">डाउनलोड एवं दस्तावेज</h1>
<p class="lead mb-0">महत्वपूर्ण फॉर्म, सूचना, पत्र, ब्रोशर और अन्य दस्तावेज।</p>
</div>
</section>

<section class="py-5">
<div class="container">
<div class="row g-4">

@forelse($items as $item)

<div class="col-md-6">
<div class="bsss-card p-4 d-flex flex-column">

<h2 class="h5 section-title">{{ $item->title }}</h2>

@if($item->description)
<p class="text-secondary flex-grow-1">{{ $item->description }}</p>
@endif

<div class="d-flex gap-2 flex-wrap mt-2">

@if($item->file_path)
<a class="btn btn-bsss"
href="{{ asset($item->file_path) }}"
target="_blank"
rel="noopener">
डाउनलोड करें
</a>
@endif

@if($item->external_url)
<a class="btn btn-outline-secondary"
href="{{ $item->external_url }}"
target="_blank"
rel="noopener">
Link खोलें
</a>
@endif

</div>

</div>
</div>

@empty

<div class="col-12">
<div class="alert alert-light border text-center">
अभी कोई दस्तावेज प्रकाशित नहीं हुआ है।
</div>
</div>

@endforelse

</div>
</div>
</section>

@endsection
