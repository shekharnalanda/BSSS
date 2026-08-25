<!doctype html>
<html lang="hi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title>ID Card - {{ $member->membership_number }}</title>

<style>
@page{size:86mm 54mm;margin:0}

*{box-sizing:border-box}

body{
font-family:Arial,"Mangal",sans-serif;
background:#eee;
margin:0;
padding:25px;
}

.actions{
text-align:center;
margin-bottom:18px;
}

.card{
width:86mm;
height:54mm;
margin:auto;
background:#fff;
border:1.5px solid #7b1e2d;
border-radius:3mm;
overflow:hidden;
position:relative;
box-shadow:0 8px 24px rgba(0,0,0,.16);
}

.header{
height:16mm;
display:flex;
align-items:center;
gap:2.5mm;
padding:2mm 3mm;
background:linear-gradient(90deg,#7b1e2d,#e97818);
color:#fff;
}

.logo{
width:12mm;
height:12mm;
object-fit:contain;
background:#fff;
border-radius:50%;
padding:.8mm;
}

.org{
font-size:9.5px;
font-weight:bold;
}

.tagline{
font-size:7px;
margin-top:1mm;
}

.content{
display:grid;
grid-template-columns:19mm 1fr 18mm;
gap:2.5mm;
padding:3mm;
}

.photo{
width:19mm;
height:23mm;
border:1px solid #ccc;
object-fit:cover;
border-radius:1.5mm;
}

.photo-placeholder{
width:19mm;
height:23mm;
background:#f2e4d5;
display:flex;
align-items:center;
justify-content:center;
font-weight:bold;
font-size:7px;
color:#7b1e2d;
border-radius:1.5mm;
}

.details{
font-size:7px;
line-height:1.45;
}

.name{
font-size:10px;
font-weight:bold;
color:#7b1e2d;
}

.member-no{
font-size:7.5px;
font-weight:bold;
color:#163b69;
margin-bottom:1mm;
}

.qr-wrap{
text-align:center;
font-size:5.8px;
color:#555;
}

#qrcode{
width:17mm;
height:17mm;
margin:auto;
}

#qrcode img,
#qrcode canvas{
width:17mm!important;
height:17mm!important;
}

.footer{
position:absolute;
bottom:0;
left:0;
right:0;
background:#163b69;
color:#fff;
padding:1.5mm 3mm;
font-size:6px;
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

<div>

@if($member->photo)
<img src="{{ asset('storage/'.$member->photo) }}"
class="photo"
alt="{{ $member->name }}">
@else
<div class="photo-placeholder">PHOTO</div>
@endif

</div>

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

<div class="qr-wrap">
<div id="qrcode"></div>
<div>Scan to Verify</div>
</div>

</div>

<div class="footer">
<span>bsss.mciedu.com</span>
<span>राष्ट्रीय अध्यक्ष: भारत मानस</span>
</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
new QRCode(document.getElementById("qrcode"), {
    text: @json(route('member.verify', $member->membership_number)),
    width: 128,
    height: 128,
    correctLevel: QRCode.CorrectLevel.M
});
</script>

</body>
</html>
