@extends('layouts.app')

@section('title','गैलरी | भारतीय स्वतंत्र शिक्षण संघ')

@section('content')

<section class="page-hero">
<div class="container">
<span class="badge badge-bsss mb-3">गतिविधियाँ</span>
<h1 class="display-5">गैलरी</h1>
<p class="lead mb-0">BSSS की बैठकों, कार्यक्रमों, प्रशिक्षण और शैक्षणिक गतिविधियों की झलक।</p>
</div>
</section>

<section class="py-5">
<div class="container">
<div class="row g-4">

@forelse($items as $item)

<div class="col-md-6 col-lg-4">
<div class="bsss-card overflow-hidden">

<img src="{{ $item->image }}"
alt="{{ $item->title }}"
style="height:240px;object-fit:cover;width:100%">

<div class="p-3">
<h2 class="h6 section-title">{{ $item->title }}</h2>

@if($item->caption)
<p class="text-secondary mb-0">{{ $item->caption }}</p>
@endif
</div>

</div>
</div>

@empty

<div class="col-12">
<div class="alert alert-light border text-center">
गैलरी फोटो शीघ्र प्रकाशित किए जाएँगे।
</div>
</div>

@endforelse

</div>
</div>
</section>

@endsection
