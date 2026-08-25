<!doctype html>
<html lang="hi">
<head>
<meta charset="utf-8">
<title>Affiliation Certificate - {{ $affiliatedInstitution->affiliation_number }}</title>

<style>
@page{size:A4 landscape;margin:10mm}
*{box-sizing:border-box}

body{
font-family:"Times New Roman","Mangal",serif;
background:#eee;
padding:20px;
margin:0;
}

.actions{text-align:center;margin-bottom:15px}

.certificate{
width:277mm;
height:190mm;
margin:auto;
background:#fffdf7;
border:8px double #7b1e2d;
padding:13mm;
position:relative;
text-align:center;
}

.logo{
width:28mm;
height:28mm;
object-fit:contain;
}

.org{
font-size:28px;
font-weight:bold;
color:#7b1e2d;
}

.tagline{
font-size:17px;
font-weight:bold;
color:#e97818;
}

.title{
font-size:31px;
font-weight:bold;
color:#163b69;
margin:7mm 0 5mm;
}

.inst{
font-size:28px;
font-weight:bold;
color:#7b1e2d;
margin:5mm 0;
}

.text{
font-size:18px;
line-height:1.7;
}

.number{
font-weight:bold;
font-size:18px;
color:#163b69;
margin-top:4mm;
}

.qr{
position:absolute;
left:18mm;
bottom:14mm;
font-size:10px;
}

#qrcode{
width:24mm;
height:24mm;
}

#qrcode img,
#qrcode canvas{
width:24mm!important;
height:24mm!important;
}

.sign{
position:absolute;
right:22mm;
bottom:24mm;
width:60mm;
border-top:1px solid #333;
padding-top:2mm;
font-size:15px;
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
Institution Affiliation Certificate
</div>

<div class="text">
यह प्रमाणित किया जाता है कि
</div>

<div class="inst">
{{ $affiliatedInstitution->institution_name }}
</div>

<div class="text">
को भारतीय स्वतंत्र शिक्षण संघ (BSSS) से संस्थागत संबद्धता प्रदान की गई है।
</div>

<div class="number">
Affiliation No.: {{ $affiliatedInstitution->affiliation_number }}
</div>

@if($affiliatedInstitution->affiliated_on)
<div class="text">
Affiliation Date:
{{ $affiliatedInstitution->affiliated_on->format('d-m-Y') }}
</div>
@endif

@if($affiliatedInstitution->valid_until)
<div class="text">
Valid Until:
{{ $affiliatedInstitution->valid_until->format('d-m-Y') }}
</div>
@endif

<div class="qr">
<div id="qrcode"></div>
<div>Scan to Verify</div>
</div>

<div class="sign">
भारत मानस<br>
राष्ट्रीय अध्यक्ष
</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
new QRCode(document.getElementById("qrcode"), {
    text: @json(route('affiliation.verify',$affiliatedInstitution->affiliation_number)),
    width: 180,
    height: 180,
    correctLevel: QRCode.CorrectLevel.M
});
</script>

</body>
</html>
