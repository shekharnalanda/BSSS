<!doctype html>
<html lang="hi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title>ID Card - {{ $member->membership_number }}</title>

<style>
*{box-sizing:border-box}
body{
font-family:Arial,"Mangal",sans-serif;
background:#eee;
margin:0;
padding:30px;
}
.actions{text-align:center;margin-bottom:20px}
.card{
width:86mm;
height:54mm;
margin:auto;
background:#fff;
border:2px solid #7b1e2d;
border-radius:10px;
overflow:hidden;
position:relative;
box-shadow:0 8px 25px rgba(0,0,0,.15);
}
.header{
height:18mm;
display:flex;
align-items:center;
gap:8px;
padding:4px 8px;
background:linear-gradient(90deg,#7b1e2d,#e97818);
color:#fff;
}
.logo{
width:14mm;
height:14mm;
object-fit:contain;
background:#fff;
border-radius:50%;
padding:1mm;
}
.org{
font-size:10px;
font-weight:bold;
}
.tagline{
font-size:8px;
}
.content{
display:flex;
padding:5mm;
gap:4mm;
}
.photo{
width:20mm;
height:24mm;
border:1px solid #ccc;
object-fit:cover;
background:#f3f3f3;
}
.photo-placeholder{
width:20mm;
height:24mm;
background:#f2e4d5;
display:flex;
align-items:center;
justify-content:center;
font-weight:bold;
color:#7b1e2d;
}
.details{
font-size:8px;
line-height:1.55;
flex:1;
}
.name{
font-size:12px;
font-weight:bold;
color:#7b1e2d;
}
.member-no{
font-size:9px;
font-weight:bold;
color:#163b69;
}
.footer{
position:absolute;
bottom:0;
left:0;
right:0;
background:#163b69;
color:#fff;
padding:2mm 4mm;
font-size:7px;
display:flex;
justify-content:space-between;
}
@media print{
body{background:#fff;padding:0}
.actions{display:none}
.card{box-shadow:none;margin:0}
}
</style>
</head>

<body>

<div class="actions">
<button onclick="window.print()">Print ID Card</button>
</div>

<div class="card">

<div class="header">

<img src="{{ asset('images/bsss/bsss-main-logo.png') }}"
class="logo"
alt="BSSS">

<div>
<div class="org">भारतीय स्वतंत्र शिक्षण संघ</div>
<div class="tagline">शिक्षित भारत • समृद्ध भारत</div>
</div>

</div>

<div class="content">

@if($member->photo)
<img src="{{ asset($member->photo) }}"
class="photo"
alt="{{ $member->name }}">
@else
<div class="photo-placeholder">PHOTO</div>
@endif

<div class="details">

<div class="name">
{{ $member->name }}
</div>

<div class="member-no">
{{ $member->membership_number }}
</div>

<div>
<strong>Type:</strong>
{{ $member->membershipType?->name ?? 'Member' }}
</div>

<div>
<strong>Mobile:</strong>
{{ $member->mobile }}
</div>

@if($member->district)
<div>
<strong>District:</strong>
{{ $member->district }}
</div>
@endif

@if($member->joined_on)
<div>
<strong>Joined:</strong>
{{ $member->joined_on->format('d-m-Y') }}
</div>
@endif

@if($member->valid_until)
<div>
<strong>Valid:</strong>
{{ $member->valid_until->format('d-m-Y') }}
</div>
@endif

</div>
</div>

<div class="footer">
<span>bsss.mciedu.com</span>
<span>राष्ट्रीय अध्यक्ष: भारत मानस</span>
</div>

</div>

</body>
</html>
