<!doctype html>
<html lang="hi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

@php
$seoTitle=trim($__env->yieldContent('title','भारतीय स्वतंत्र शिक्षण संघ (BSSS)'));
$seoDescription=trim($__env->yieldContent('meta_description','भारतीय स्वतंत्र शिक्षण संघ — शिक्षित भारत समृद्ध भारत'));
$logoUrl=asset('images/bsss/bsss-main-logo.png');
$indiaLogo=asset('images/bsss/bsss-india-emblem.png');
@endphp

<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<link rel="canonical" href="{{ url()->current() }}">
<link rel="icon" href="{{ $logoUrl }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:image" content="{{ $logoUrl }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
:root{
--maroon:#7b1e2d;
--dark-maroon:#56131f;
--saffron:#e97818;
--blue:#163b69;
--cream:#fff9ef;
--soft:#f8f1e8;
}

body{font-family:"Noto Sans Devanagari","Mangal",Arial,sans-serif;color:#302b29}
.topbar{background:linear-gradient(90deg,var(--dark-maroon),var(--maroon));color:white;font-size:.9rem}
.header{background:#fffdf8;border-bottom:4px solid var(--saffron)}
.emblem{width:76px;height:76px;object-fit:contain}
.brand{text-align:center;flex:1}
.brand h1{font-weight:900;color:var(--maroon);font-size:clamp(1.2rem,2.5vw,2rem);margin:0}
.brand small{display:block;color:var(--blue);font-weight:700}
.tagline{color:var(--saffron);font-weight:900}
.navbar{background:var(--blue)!important}
.navbar .nav-link{color:#fff!important;font-weight:700}
.navbar .nav-link:hover{color:#ffd89b!important}
.page-hero{background:linear-gradient(115deg,var(--maroon),#9c3438 60%,var(--saffron));color:white;padding:72px 0}
.page-hero h1{font-weight:900}
.section-title{font-weight:900;color:var(--maroon)}
.bsss-card{border:1px solid #eee0d1;border-radius:18px;box-shadow:0 12px 30px rgba(75,39,25,.07);height:100%}
.btn-bsss{background:var(--maroon);border-color:var(--maroon);color:white}
.btn-bsss:hover{background:var(--dark-maroon);color:white}
.badge-bsss{background:#fff0dc;color:var(--maroon)}
footer{background:#32101a;color:#eadfe1;border-top:5px solid var(--saffron)}
footer a{color:#eadfe1;text-decoration:none}
.footer-logo{width:88px;height:88px;object-fit:contain;background:white;border-radius:50%;padding:3px}
@media(max-width:600px){.emblem{width:54px;height:54px}.brand small{display:none}.tagline{font-size:.75rem}}
</style>
@stack('styles')
</head>

<body>

<div class="topbar py-2">
<div class="container d-flex flex-wrap justify-content-between gap-2">
<span>भारतीय स्वतंत्र शिक्षण संघ (BSSS)</span>
<span>राष्ट्रीय अध्यक्ष: भारत मानस • 9430888639</span>
</div>
</div>

<header class="header">
<div class="container py-3 d-flex align-items-center justify-content-between">
<img src="{{ $logoUrl }}" class="emblem" alt="BSSS Logo">

<div class="brand px-2">
<h1>भारतीय स्वतंत्र शिक्षण संघ</h1>
<small>BHARATIYA SWATANTRA SHIKSHAN SANGH • BSSS</small>
<div class="tagline">शिक्षित भारत • समृद्ध भारत</div>
</div>

<img src="{{ $indiaLogo }}" class="emblem" alt="BSSS India Emblem">
</div>
</header>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
<div class="container">
<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#bsssNav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="bsssNav">
<ul class="navbar-nav mx-auto">
<li class="nav-item"><a class="nav-link" href="{{ route('home') }}">होम</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('about') }}">हमारे बारे में</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('institutions') }}">संस्थान / केन्द्र</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('affiliation.apply') }}">संबद्धता आवेदन</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('programs') }}">कार्यक्रम</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('news-events') }}">सूचना</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">गैलरी</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('downloads') }}">डाउनलोड</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">संपर्क</a></li>
</ul>
</div>
</div>
</nav>

<main>@yield('content')</main>

<footer class="pt-5 pb-3 mt-5">
<div class="container">
<div class="row g-4">

<div class="col-lg-5">
<div class="d-flex align-items-center gap-3 mb-3">
<img src="{{ $logoUrl }}" class="footer-logo" alt="BSSS">
<div>
<h5 class="text-white mb-1">भारतीय स्वतंत्र शिक्षण संघ</h5>
<div class="tagline">शिक्षित भारत समृद्ध भारत</div>
</div>
</div>
<p>शिक्षा, कौशल, स्वावलम्बन एवं सामाजिक सशक्तिकरण के लिए समर्पित संगठन।</p>
</div>

<div class="col-6 col-lg-3">
<h5 class="text-white">Quick Links</h5>
<div class="d-grid gap-2">
<a href="{{ route('about') }}">हमारे बारे में</a>
<a href="{{ route('programs') }}">कार्यक्रम</a>
<a href="{{ route('downloads') }}">डाउनलोड</a>
<a href="{{ route('gallery') }}">गैलरी</a>
</div>
</div>

<div class="col-6 col-lg-4">
<h5 class="text-white">संपर्क</h5>
<p class="mb-1">राष्ट्रीय अध्यक्ष: भारत मानस</p>
<p class="mb-1">मोबाइल: 9430888639</p>
<p class="mb-0">bsss.mciedu.com</p>
</div>

</div>

<hr class="border-secondary my-4">
<div class="small">© {{ date('Y') }} भारतीय स्वतंत्र शिक्षण संघ (BSSS). All rights reserved.</div>
</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
