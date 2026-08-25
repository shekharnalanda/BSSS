@extends('layouts.app')

@section('title','सूचना एवं समाचार | भारतीय स्वतंत्र शिक्षण संघ')

@section('content')

<section class="page-hero">
<div class="container">
<span class="badge badge-bsss mb-3">Updates</span>
<h1 class="display-5">सूचना एवं समाचार</h1>
<p class="lead mb-0">भारतीय स्वतंत्र शिक्षण संघ की नवीनतम सूचनाएँ, गतिविधियाँ एवं कार्यक्रम।</p>
</div>
</section>

<section class="py-5">
<div class="container">
<div class="row g-4">

@forelse($items as $item)

<div class="col-md-6 col-lg-4">
<article class="bsss-card overflow-hidden">

@if($item->image)
<img src="{{ $item->image }}" alt="{{ $item->title }}" style="height:220px;object-fit:cover;width:100%">
@endif

<div class="p-4">
<span class="small fw-bold" style="color:var(--saffron)">
{{ optional($item->published_at)->format('d M Y') ?: 'BSSS Update' }}
</span>

<h2 class="h5 section-title mt-2">{{ $item->title }}</h2>

@if($item->excerpt)
<p class="text-secondary mb-0">{{ $item->excerpt }}</p>
@endif
</div>
</article>
</div>

@empty

<div class="col-12">
<div class="alert alert-light border text-center">
अभी कोई सूचना या समाचार प्रकाशित नहीं हुआ है।
</div>
</div>

@endforelse

</div>
</div>
</section>

@endsection
