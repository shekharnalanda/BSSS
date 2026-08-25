<!doctype html>
<html lang="hi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title>@yield('title','Admin') | BSSS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
:root{
--maroon:#7b1e2d;
--dark:#51131e;
--saffron:#e97818;
--blue:#163b69;
--cream:#fff9ef;
}

body{background:#f7f4f1;color:#332d2b}

.sidebar{
min-height:100vh;
background:linear-gradient(180deg,var(--dark),var(--maroon) 55%,var(--blue));
color:#fff;
}

.admin-logo{
width:72px;
height:72px;
object-fit:contain;
background:white;
border-radius:50%;
padding:3px;
}

.sidebar a{
color:#f9edef;
text-decoration:none;
display:block;
padding:.72rem .9rem;
border-radius:.65rem;
margin-bottom:3px;
font-weight:600;
}

.sidebar a:hover{
background:rgba(255,255,255,.13);
color:#fff;
}

.sidebar .group-title{
font-size:.72rem;
text-transform:uppercase;
letter-spacing:.1em;
color:#ffc98d;
font-weight:800;
margin:18px 8px 7px;
}

.card{
border:0;
border-radius:18px;
box-shadow:0 8px 28px rgba(70,35,25,.08);
}

.stat-card{
border-top:4px solid var(--saffron);
}

.stat-number{
font-size:2.3rem;
font-weight:900;
color:var(--maroon);
}

.admin-heading{
color:var(--maroon);
font-weight:900;
}

.btn-bsss{
background:var(--maroon);
border-color:var(--maroon);
color:#fff;
}

.btn-bsss:hover{
background:var(--dark);
color:#fff;
}

@media(max-width:991px){
.sidebar{min-height:auto}
}
</style>

@stack('styles')
</head>

<body>

<div class="container-fluid">
<div class="row">

<aside class="col-lg-2 p-3 sidebar">

<div class="text-center mb-3">
<img src="{{ asset('images/bsss/bsss-main-logo.png') }}"
class="admin-logo"
alt="BSSS">

<h5 class="fw-bold mt-2 mb-0">BSSS ADMIN</h5>
<small>शिक्षित भारत • समृद्ध भारत</small>
</div>

<hr>

<a href="{{ route('admin.dashboard') }}">▣ Dashboard</a>

<div class="group-title">संगठन</div>

<a href="{{ route('admin.committees.index') }}">
कार्यकारिणी एवं सदस्य
</a>

<a href="{{ route('admin.leadership.index') }}">
राष्ट्रीय नेतृत्व संदेश
</a>

<a href="{{ route('admin.programs.index') }}">
Programs
</a>

<a href="{{ route('admin.memberships.index') }}">
Membership Types
</a>

<a href="{{ route('admin.membership-applications.index') }}">
Membership Applications
</a>

<a href="{{ route('admin.members.index') }}">
Approved Members
</a>

<div class="group-title">Affiliation</div>

<a href="{{ route('admin.affiliation-applications.index') }}">
Affiliation Applications
</a>

<a href="{{ route('admin.affiliated-institutions.index') }}">
Affiliated Institutions
</a>

<div class="group-title">Content</div>

<a href="{{ route('admin.institutions.index') }}">
संस्थान / केन्द्र
</a>

<a href="{{ route('admin.news.index') }}">
सूचना एवं समाचार
</a>

<a href="{{ route('admin.gallery.index') }}">
गैलरी
</a>

<a href="{{ route('admin.downloads.index') }}">
डाउनलोड
</a>

<a href="{{ route('admin.enquiries.index') }}">
Enquiries
</a>

<div class="group-title">System</div>

<a href="{{ route('admin.settings.index') }}">
Settings
</a>

<hr>

<a href="{{ route('home') }}" target="_blank">
↗ Website देखें
</a>

<form method="POST"
action="{{ route('admin.logout') }}"
class="mt-2">
@csrf

<button class="btn btn-light w-100 fw-bold">
Logout
</button>
</form>

</aside>

<main class="col-lg-10 p-4 p-md-5">

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">{{ $errors->first() }}</div>
@endif

@yield('content')

</main>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>
