<!doctype html>
<html lang="hi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Membership Certificate - {{ $member->membership_number }}</title>

<style>
@page{size:A4 landscape;margin:10mm}
*{box-sizing:border-box}

body{
font-family:"Times New Roman","Mangal",serif;
background:#eee;
margin:0;
padding:20px;
}

.actions{text-align:center;margin-bottom:15px}

.certificate{
width:277mm;
height:190mm;
margin:auto;
background:#fffdf8;
border:8px double #7b1e2d;
padding:14mm;
position:relative;
}

.top{
text-align:center;
}

.logo{
width:30mm;
height:30mm;
object-fit:contain;
}

.org{
font-size:28px;
font-weight:bold;
color:#7b1e2d;
margin-top:3mm;
}

.tagline{
font-size:17px;
font-weight:bold;
color:#e97818;
}

.title{
font-size:34px;
font-weight:bold;
color:#163b69;
margin:8mm 0 5mm;
text-transform:uppercase;
}

.text{
font-size:19px;
line-height:1.8;
text-align:center;
max-width:230mm;
margin:auto;
}

.member{
font-size:30px;
font-weight:bold;
color:#7b1e2d;
display:inline-block;
border-bottom:2px solid #7b1e2d;
padding:0 8mm 2mm;
}

.number{
font-size:18px;
font-weight:bold;
color:#163b69;
margin-top:5mm;
}

.signatures{
position:absolute;
bottom:18mm;
left:20mm;
right:20mm;
display:flex;
justify-content:space-between;
text-align:center;
font-size:15px;
}

.sign-line{
border-top:1px solid #333;
width:55mm;
padding-top:2mm;
}

@media print{
body{background:#fff;padding:0}
.actions{display:none}
.certificate{margin:0}
}
</style>
</head>

<body>

<div class="actions">
<button onclick="window.print()">Print Certificate</button>
</div>

<div class="certificate">

<div class="top">

<img src="{{ asset('images/bsss/bsss-main-logo.png') }}"
class="logo"
alt="BSSS">

<div class="org">
भारतीय स्वतंत्र शिक्षण संघ
</div>

<div class="tagline">
शिक्षित भारत • समृद्ध भारत
</div>

<div class="title">
Membership Certificate
</div>

<div class="text">
यह प्रमाणित किया जाता है कि
<br><br>

<span class="member">
{{ $member->name }}
</span>

<br><br>

भारतीय स्वतंत्र शिक्षण संघ के
<strong>{{ $member->membershipType?->name ?? 'सदस्य' }}</strong>
के रूप में स्वीकृत सदस्य हैं।

<div class="number">
Membership No.: {{ $member->membership_number }}
</div>

@if($member->joined_on)
<div>
Membership Date:
{{ $member->joined_on->format('d-m-Y') }}
</div>
@endif

</div>

</div>

<div class="signatures">

<div class="sign-line">
Authorized Signatory
</div>

<div class="sign-line">
भारत मानस<br>
राष्ट्रीय अध्यक्ष
</div>

</div>

</div>

</body>
</html>
