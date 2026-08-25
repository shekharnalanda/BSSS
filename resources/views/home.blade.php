<!doctype html>
<html lang="hi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>भारतीय स्वतंत्र शिक्षण संघ (BSSS) | शिक्षित भारत समृद्ध भारत</title>

    <meta name="description"
          content="भारतीय स्वतंत्र शिक्षण संघ (BSSS) — शिक्षित भारत समृद्ध भारत। शिक्षा, कौशल विकास, स्वतंत्र विद्यालयों के सशक्तिकरण और शैक्षणिक सहयोग के लिए समर्पित संगठन।">

    <link rel="canonical" href="https://bsss.mciedu.com/">

    @php
        $mainLogoPath = public_path('images/bsss/bsss-main-logo.png');
        $indiaLogoPath = public_path('images/bsss/bsss-india-emblem.png');
        $heroPath = public_path('images/bsss/bsss-hero.jpg');
        $presidentPhotoPath = public_path('images/bsss/bharat-manas.jpg');

        $mainLogo = file_exists($mainLogoPath)
            ? asset('images/bsss/bsss-main-logo.png')
            : asset('images/mci-logo.png');

        $indiaLogo = file_exists($indiaLogoPath)
            ? asset('images/bsss/bsss-india-emblem.png')
            : $mainLogo;

        $heroImage = file_exists($heroPath)
            ? asset('images/bsss/bsss-hero.jpg')
            : null;

        $presidentPhoto = file_exists($presidentPhotoPath)
            ? asset('images/bsss/bharat-manas.jpg')
            : null;
    @endphp

    <link rel="icon" type="image/png" href="{{ $mainLogo }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="भारतीय स्वतंत्र शिक्षण संघ">
    <meta property="og:title" content="भारतीय स्वतंत्र शिक्षण संघ (BSSS)">
    <meta property="og:description" content="शिक्षित भारत समृद्ध भारत">
    <meta property="og:url" content="https://bsss.mciedu.com/">
    <meta property="og:image" content="{{ $mainLogo }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root{
            --bsss-maroon:#7b1e2d;
            --bsss-maroon-dark:#56131f;
            --bsss-saffron:#e97818;
            --bsss-gold:#d8a735;
            --bsss-blue:#163b69;
            --bsss-cream:#fff9ef;
            --bsss-soft:#f8f1e8;
            --bsss-text:#2f2b2a;
            --bsss-green:#167442;
        }

        *{box-sizing:border-box}

        body{
            margin:0;
            font-family:"Noto Sans Devanagari","Mangal",Arial,sans-serif;
            color:var(--bsss-text);
            background:#fff;
        }

        a{text-decoration:none}

        .top-strip{
            background:linear-gradient(90deg,var(--bsss-maroon-dark),var(--bsss-maroon));
            color:#fff;
            font-size:.91rem;
            padding:7px 0;
        }

        .header-main{
            background:#fffdf8;
            border-bottom:4px solid var(--bsss-saffron);
        }

        .brand-emblem{
            width:92px;
            height:92px;
            object-fit:contain;
        }

        .brand-center{
            text-align:center;
            flex:1;
            padding:5px 18px;
        }

        .brand-center h1{
            color:var(--bsss-maroon);
            font-weight:900;
            margin:0;
            font-size:clamp(1.4rem,3vw,2.45rem);
            line-height:1.15;
        }

        .brand-center .english{
            color:var(--bsss-blue);
            font-weight:700;
            letter-spacing:.05em;
            font-size:.9rem;
            margin-top:4px;
        }

        .brand-center .tagline{
            color:var(--bsss-saffron);
            font-weight:900;
            margin-top:6px;
            font-size:1.05rem;
        }

        .bsss-nav{
            background:var(--bsss-blue);
            box-shadow:0 6px 20px rgba(0,0,0,.12);
        }

        .bsss-nav .nav-link{
            color:#fff!important;
            font-weight:700;
            padding:.85rem .8rem!important;
        }

        .bsss-nav .nav-link:hover{
            color:#ffd997!important;
        }

        .hero{
            position:relative;
            min-height:535px;
            display:flex;
            align-items:center;
            overflow:hidden;
            background:
                linear-gradient(105deg,rgba(86,19,31,.94),rgba(123,30,45,.79) 48%,rgba(233,120,24,.52)),
                @if($heroImage) url('{{ $heroImage }}') center/cover no-repeat @else linear-gradient(135deg,#6e1727,#d8681c) @endif;
        }

        .hero:after{
            content:"";
            position:absolute;
            inset:0;
            background:
                radial-gradient(circle at 78% 30%,rgba(255,215,110,.23),transparent 30%),
                linear-gradient(180deg,transparent 70%,rgba(43,11,18,.34));
        }

        .hero-content{
            position:relative;
            z-index:2;
            color:#fff;
            max-width:850px;
        }

        .hero-badge{
            display:inline-block;
            padding:8px 15px;
            border:1px solid rgba(255,255,255,.45);
            border-radius:30px;
            background:rgba(255,255,255,.12);
            font-weight:700;
        }

        .hero h2{
            font-size:clamp(2.2rem,5vw,4.6rem);
            font-weight:900;
            line-height:1.07;
            margin-top:20px;
        }

        .hero-tagline{
            color:#ffe4a8;
            font-weight:900;
            font-size:clamp(1.25rem,2.6vw,2rem);
        }

        .hero-copy{
            font-size:1.1rem;
            line-height:1.8;
            max-width:730px;
        }

        .btn-bsss{
            background:var(--bsss-saffron);
            color:#fff;
            border:none;
            font-weight:800;
            padding:12px 20px;
            border-radius:8px;
        }

        .btn-bsss:hover{
            background:#ca5f0e;
            color:#fff;
        }

        .section{
            padding:78px 0;
        }

        .soft{
            background:var(--bsss-cream);
        }

        .section-kicker{
            color:var(--bsss-saffron);
            text-transform:uppercase;
            letter-spacing:.12em;
            font-size:.8rem;
            font-weight:900;
        }

        .section-title{
            color:var(--bsss-maroon);
            font-weight:900;
        }

        .intro-card,
        .purpose-card,
        .committee-card,
        .news-card{
            background:#fff;
            border:1px solid #eee1d2;
            border-radius:18px;
            box-shadow:0 12px 32px rgba(87,45,30,.07);
        }

        .purpose-card{
            height:100%;
            padding:25px;
            border-top:4px solid var(--bsss-saffron);
        }

        .purpose-icon{
            width:52px;
            height:52px;
            border-radius:50%;
            display:grid;
            place-items:center;
            background:#fff0dc;
            color:var(--bsss-maroon);
            font-weight:900;
            margin-bottom:16px;
        }

        .president-wrap{
            background:
                linear-gradient(120deg,#fffaf1,#fff 65%);
            border:1px solid #eadcc7;
            border-radius:24px;
            padding:30px;
            box-shadow:0 16px 42px rgba(77,40,22,.08);
        }

        .president-photo{
            width:100%;
            max-width:360px;
            aspect-ratio:4/5;
            object-fit:cover;
            border-radius:22px;
            border:7px solid #fff;
            box-shadow:0 14px 35px rgba(0,0,0,.14);
        }

        .photo-placeholder{
            width:100%;
            max-width:360px;
            aspect-ratio:4/5;
            border-radius:22px;
            display:grid;
            place-items:center;
            background:linear-gradient(145deg,#f6dfbd,#fff);
            color:var(--bsss-maroon);
            font-size:4rem;
            font-weight:900;
            border:1px solid #e4ccb1;
        }

        .president-name{
            color:var(--bsss-maroon);
            font-weight:900;
        }

        .designation{
            color:var(--bsss-blue);
            font-weight:800;
        }

        .message-text{
            font-size:1.05rem;
            line-height:1.9;
            color:#4d4541;
        }

        .committee-card{
            overflow:hidden;
            height:100%;
        }

        .committee-head{
            background:linear-gradient(90deg,var(--bsss-maroon),#9b2e32);
            color:#fff;
            padding:18px 20px;
        }

        .committee-head h3{
            font-size:1.25rem;
            font-weight:900;
            margin:0;
        }

        .member-row{
            padding:14px 18px;
            border-bottom:1px solid #f0e5d8;
        }

        .member-row:last-child{
            border-bottom:none;
        }

        .member-name{
            font-weight:900;
            color:#302927;
        }

        .member-role{
            color:var(--bsss-blue);
            font-size:.91rem;
            font-weight:700;
        }

        .member-mobile{
            color:#7b675d;
            font-size:.88rem;
        }

        .notice-strip{
            background:#fff4e4;
            border-top:1px solid #f1d3a8;
            border-bottom:1px solid #f1d3a8;
            color:#643c25;
        }

        .cta{
            border-radius:25px;
            background:linear-gradient(115deg,var(--bsss-blue),var(--bsss-maroon));
            color:#fff;
            padding:42px;
        }

        .gallery-img{
            width:100%;
            height:225px;
            object-fit:cover;
        }

        footer{
            background:#32101a;
            color:#eadfe1;
            padding:55px 0 25px;
            border-top:5px solid var(--bsss-saffron);
        }

        footer h5{
            color:#fff;
            font-weight:900;
        }

        footer a{
            color:#eadfe1;
        }

        footer a:hover{
            color:#ffd49a;
        }

        .footer-emblem{
            width:100px;
            height:100px;
            object-fit:contain;
            background:#fff;
            border-radius:50%;
            padding:4px;
        }

        @media(max-width:767.98px){
            .brand-emblem{
                width:62px;
                height:62px;
            }

            .header-main .container{
                align-items:flex-start!important;
            }

            .brand-center{
                padding:0 7px;
            }

            .brand-center .english{
                display:none;
            }

            .brand-center .tagline{
                font-size:.8rem;
            }

            .hero{
                min-height:500px;
            }

            .section{
                padding:58px 0;
            }
        }
    </style>
</head>

<body>

<div class="top-strip">
    <div class="container d-flex flex-wrap justify-content-between gap-2">
        <div>भारतीय स्वतंत्र शिक्षण संघ (BSSS)</div>
        <div>राष्ट्रीय अध्यक्ष: भारत मानस • 9430888639</div>
    </div>
</div>

<header class="header-main">
    <div class="container py-3 d-flex align-items-center justify-content-between">

        <img src="{{ $mainLogo }}"
             alt="BSSS मुख्य लोगो"
             class="brand-emblem">

        <div class="brand-center">
            <h1>भारतीय स्वतंत्र शिक्षण संघ</h1>
            <div class="english">BHARATIYA SWATANTRA SHIKSHAN SANGH • BSSS</div>
            <div class="tagline">शिक्षित भारत • समृद्ध भारत</div>
        </div>

        <img src="{{ $indiaLogo }}"
             alt="BSSS भारत प्रतीक"
             class="brand-emblem">
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-dark bsss-nav sticky-top">
    <div class="container">

        <button class="navbar-toggler ms-auto"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#bsssNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="bsssNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="/">होम</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">हमारे बारे में</a></li>
                <li class="nav-item"><a class="nav-link" href="#president">राष्ट्रीय अध्यक्ष</a></li>
                <li class="nav-item"><a class="nav-link" href="#committees">कार्यकारिणी</a></li>
                <li class="nav-item"><a class="nav-link" href="/programs">कार्यक्रम</a></li>
                <li class="nav-item"><a class="nav-link" href="/institutions">संस्थान / केन्द्र</a></li>
                <li class="nav-item"><a class="nav-link" href="/news-events">सूचना</a></li>
                <li class="nav-item"><a class="nav-link" href="/gallery">गैलरी</a></li>
                <li class="nav-item"><a class="nav-link" href="/downloads">डाउनलोड</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">संपर्क</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <div class="hero-content py-5">
            <div class="hero-badge">शिक्षा • कौशल • स्वावलम्बन • राष्ट्र निर्माण</div>

            <h2>भारतीय स्वतंत्र शिक्षण संघ</h2>

            <div class="hero-tagline mt-3">
                शिक्षित भारत समृद्ध भारत
            </div>

            <p class="hero-copy mt-4">
                स्वतंत्र शिक्षा, विद्यालय सशक्तिकरण, कौशल विकास,
                प्रशिक्षण और शैक्षणिक सहयोग के माध्यम से
                समाज एवं राष्ट्र को सशक्त बनाने की दिशा में एक संगठित प्रयास।
            </p>

            <div class="d-flex flex-wrap gap-3 mt-4">
                <a href="#committees" class="btn btn-bsss btn-lg">
                    हमारी कार्यकारिणी
                </a>

                <a href="/contact" class="btn btn-outline-light btn-lg fw-bold">
                    हमसे जुड़ें
                </a>
            </div>
        </div>
    </div>
</section>

<div class="notice-strip py-3">
    <div class="container text-center fw-bold">
        “प्रत्येक भारतवासी शिक्षित हो — यही हमारा संकल्प”
    </div>
</div>

<section class="section soft">
    <div class="container">

        <div class="text-center mb-5">
            <div class="section-kicker">हमारा संकल्प</div>
            <h2 class="section-title display-6 mt-2">
                शिक्षा से सशक्त समाज की ओर
            </h2>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-3">
                <div class="purpose-card">
                    <div class="purpose-icon">01</div>
                    <h4 class="fw-bold">सर्वसुलभ शिक्षा</h4>
                    <p class="mb-0 text-secondary">
                        शिक्षा के अवसरों को अधिक से अधिक लोगों तक पहुँचाना।
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="purpose-card">
                    <div class="purpose-icon">02</div>
                    <h4 class="fw-bold">कौशल विकास</h4>
                    <p class="mb-0 text-secondary">
                        रोजगारोन्मुख एवं व्यावहारिक कौशल को बढ़ावा देना।
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="purpose-card">
                    <div class="purpose-icon">03</div>
                    <h4 class="fw-bold">विद्यालय सशक्तिकरण</h4>
                    <p class="mb-0 text-secondary">
                        स्वतंत्र विद्यालयों एवं शिक्षण संस्थानों को संगठित सहयोग प्रदान करना।
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="purpose-card">
                    <div class="purpose-icon">04</div>
                    <h4 class="fw-bold">राष्ट्र निर्माण</h4>
                    <p class="mb-0 text-secondary">
                        शिक्षित, आत्मनिर्भर और समृद्ध भारत के निर्माण में योगदान।
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section" id="president">
    <div class="container">

        <div class="president-wrap">
            <div class="row align-items-center g-5">

                <div class="col-lg-4 text-center">

                    @if($presidentPhoto)
                        <img src="{{ $presidentPhoto }}"
                             alt="भारत मानस - राष्ट्रीय अध्यक्ष"
                             class="president-photo">
                    @else
                        <div class="photo-placeholder mx-auto">BM</div>
                    @endif

                </div>

                <div class="col-lg-8">

                    <div class="section-kicker">
                        राष्ट्रीय अध्यक्ष का संदेश
                    </div>

                    <h2 class="president-name display-6 mt-2">
                        {{ $presidentMessage?->name ?? 'भारत मानस' }}
                    </h2>

                    <div class="designation mb-3">
                        {{ $presidentMessage?->designation ?? 'राष्ट्रीय अध्यक्ष' }}
                        • Authorized Person
                    </div>

                    @if($presidentMessage?->message)
                        <div class="message-text">
                            {!! nl2br(e($presidentMessage->message)) !!}
                        </div>
                    @else
                        <div class="message-text">
                            राष्ट्रीय अध्यक्ष का विस्तृत संदेश शीघ्र प्रकाशित किया जाएगा।
                        </div>
                    @endif

                    <div class="mt-4 fw-bold">
                        संपर्क:
                        {{ $presidentMessage?->mobile ?? '9430888639' }}
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

<section class="section soft" id="committees">
    <div class="container">

        <div class="text-center mb-5">
            <div class="section-kicker">हमारा नेतृत्व</div>
            <h2 class="section-title display-6 mt-2">
                संगठनात्मक कार्यकारिणी
            </h2>
            <p class="text-secondary">
                राष्ट्रीय, प्रदेश एवं जिला स्तर पर संगठन की संरचना
            </p>
        </div>

        <div class="row g-4">

            @forelse($committees as $committee)

                <div class="col-lg-4">
                    <div class="committee-card">

                        <div class="committee-head">
                            <h3>{{ $committee->name }}</h3>

                            @if($committee->state || $committee->district)
                                <div class="small opacity-75 mt-1">
                                    {{ $committee->state }}
                                    @if($committee->district)
                                        • {{ $committee->district }}
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div>

                            @forelse($committee->members as $member)

                                <div class="member-row">

                                    <div class="member-name">
                                        {{ $member->name }}
                                    </div>

                                    <div class="member-role">
                                        {{ $member->designation }}
                                    </div>

                                    @if($member->mobile)
                                        <div class="member-mobile mt-1">
                                            {{ $member->mobile }}

                                            @if($member->alternate_mobile)
                                                / {{ $member->alternate_mobile }}
                                            @endif
                                        </div>
                                    @endif

                                </div>

                            @empty

                                <div class="member-row text-secondary">
                                    सदस्य विवरण शीघ्र प्रकाशित होगा।
                                </div>

                            @endforelse

                        </div>
                    </div>
                </div>

            @empty

                <div class="col-12">
                    <div class="alert alert-light border text-center">
                        कार्यकारिणी विवरण शीघ्र प्रकाशित होगा।
                    </div>
                </div>

            @endforelse

        </div>
    </div>
</section>

@if($programItems->count())
<section class="section">
    <div class="container">

        <div class="text-center mb-5">
            <div class="section-kicker">कार्यक्रम</div>
            <h2 class="section-title display-6">प्रमुख शैक्षणिक कार्यक्रम</h2>
        </div>

        <div class="row g-4">

            @foreach($programItems as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="purpose-card">
                        <h4 class="fw-bold">{{ $item->title }}</h4>
                        <p class="text-secondary mb-0">
                            {{ $item->short_description ?: $item->description }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endif

@if($institutions->count())
<section class="section soft">
    <div class="container">

        <div class="text-center mb-5">
            <div class="section-kicker">नेटवर्क</div>
            <h2 class="section-title display-6">
                संबद्ध संस्थान एवं केन्द्र
            </h2>
        </div>

        <div class="row g-4">

            @foreach($institutions as $item)
                <div class="col-md-6 col-lg-4">

                    <div class="purpose-card">

                        <h4 class="fw-bold">
                            {{ $item->name }}
                        </h4>

                        <p class="text-secondary">
                            {{ $item->short_description ?: $item->description }}
                        </p>

                        @if($item->website_url)
                            <a href="{{ $item->website_url }}"
                               target="_blank"
                               rel="noopener"
                               class="btn btn-outline-secondary">
                                Website देखें
                            </a>
                        @endif

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endif

@if($newsItems->count())
<section class="section">
    <div class="container">

        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-5">
            <div>
                <div class="section-kicker">सूचना एवं समाचार</div>
                <h2 class="section-title display-6 mb-0">
                    नवीनतम अपडेट
                </h2>
            </div>

            <a href="/news-events"
               class="btn btn-outline-secondary">
                सभी देखें
            </a>
        </div>

        <div class="row g-4">

            @foreach($newsItems as $item)
                <div class="col-md-6 col-lg-4">

                    <article class="news-card h-100 p-4">

                        <div class="small fw-bold"
                             style="color:var(--bsss-saffron)">
                            {{ optional($item->published_at)->format('d M Y') ?: 'BSSS Update' }}
                        </div>

                        <h3 class="h5 fw-bold mt-2">
                            {{ $item->title }}
                        </h3>

                        <p class="text-secondary mb-0">
                            {{ $item->excerpt }}
                        </p>

                    </article>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endif

@if($galleryItems->count())
<section class="section soft">
    <div class="container">

        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-5">
            <div>
                <div class="section-kicker">गतिविधियाँ</div>
                <h2 class="section-title display-6 mb-0">गैलरी</h2>
            </div>

            <a href="/gallery"
               class="btn btn-outline-secondary">
                पूरी गैलरी
            </a>
        </div>

        <div class="row g-4">

            @foreach($galleryItems as $item)
                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm h-100">

                        <img src="{{ $item->image }}"
                             alt="{{ $item->title }}"
                             class="gallery-img">

                        <div class="card-body">
                            <h3 class="h6 fw-bold">
                                {{ $item->title }}
                            </h3>

                            @if($item->caption)
                                <p class="small text-secondary mb-0">
                                    {{ $item->caption }}
                                </p>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endif

<section class="section">
    <div class="container">

        <div class="cta d-lg-flex align-items-center justify-content-between gap-4">

            <div>
                <div class="text-uppercase fw-bold opacity-75 mb-2">
                    भारतीय स्वतंत्र शिक्षण संघ
                </div>

                <h2 class="fw-bold">
                    संगठन से जुड़ें और शिक्षा के इस अभियान का हिस्सा बनें
                </h2>

                <p class="mb-0 opacity-75">
                    सदस्यता, संस्थागत सहयोग, कार्यक्रम एवं अन्य जानकारी के लिए संपर्क करें।
                </p>
            </div>

            <div class="mt-4 mt-lg-0">
                <a href="/contact"
                   class="btn btn-light btn-lg fw-bold">
                    संपर्क करें
                </a>
            </div>

        </div>
    </div>
</section>

<footer>
    <div class="container">

        <div class="row g-4 align-items-start">

            <div class="col-lg-5">

                <div class="d-flex gap-3 align-items-center mb-3">

                    <img src="{{ $mainLogo }}"
                         class="footer-emblem"
                         alt="BSSS Logo">

                    <div>
                        <h5 class="mb-1">
                            भारतीय स्वतंत्र शिक्षण संघ
                        </h5>

                        <div class="fw-bold"
                             style="color:#ffd49a">
                            शिक्षित भारत समृद्ध भारत
                        </div>
                    </div>

                </div>

                <p class="mb-0">
                    शिक्षा, कौशल, स्वावलम्बन एवं सामाजिक सशक्तिकरण के लिए समर्पित संगठन।
                </p>
            </div>

            <div class="col-6 col-lg-3">

                <h5>Quick Links</h5>

                <div class="d-grid gap-2">
                    <a href="/about">हमारे बारे में</a>
                    <a href="#committees">कार्यकारिणी</a>
                    <a href="/programs">कार्यक्रम</a>
                    <a href="/downloads">डाउनलोड</a>
                    <a href="/gallery">गैलरी</a>
                </div>

            </div>

            <div class="col-6 col-lg-4">

                <h5>संपर्क</h5>

                <p class="mb-1">
                    राष्ट्रीय अध्यक्ष: भारत मानस
                </p>

                <p class="mb-1">
                    मोबाइल: 9430888639
                </p>

                <p class="mb-0">
                    Website: bsss.mciedu.com
                </p>

            </div>

        </div>

        <hr class="border-secondary my-4">

        <div class="small">
            © {{ date('Y') }} भारतीय स्वतंत्र शिक्षण संघ (BSSS). All rights reserved.
        </div>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
