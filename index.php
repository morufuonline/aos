<?php
// Date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
//header("HTTP/1.0 204 No Content"); 

ini_set("session.cookie_lifetime", 604800);
ini_set("session.gc_maxlifetime", 604800);
session_start();

error_reporting(E_ALL); ini_set('display_errors', 1);

require_once("includes/functions.php");

require_once("includes/mobile-detect.php");
$detect = new Mobile_Detect;

function detectCurrUserBrowser($a,$b,$c){
$msie = stripos($_SERVER["HTTP_USER_AGENT"], "msie") ? true : false;
if($msie){ 
$msiePosition = stripos($_SERVER["HTTP_USER_AGENT"], "msie");
$msiePositionNew = $msiePosition+5;
$versionNumber = substr($_SERVER["HTTP_USER_AGENT"],$msiePositionNew,1);
if($versionNumber <= $c){
echo $a;
}
else{
echo $b;
}
}
else{
echo $b;
}
}

$det_cat_slug = "";
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
<?php include_once("includes/analyticstracking.php"); ?>

<base href="<?php directory(); ?>" target="_top">
<meta charset="UTF-8" />
<meta name="description" content="<?php echo "{$full_gen_name} {$domain}"; ?>"/>
<meta name="robots" content="noodp"/>
<meta name="keywords" content="<?php echo $domain; ?>, <?php echo $full_gen_name; ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<title><?php echo $full_gen_name; ?></title>

<meta property="og:site_name" content="<?php echo $full_gen_name; ?>"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:url" content="<?php directory(); ?>" /> 
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $full_gen_name; ?>" /> 
<meta property="og:description" content="<?php echo "{$full_gen_name} {$domain}"; ?>" /> 
<meta property="og:image" content="<?php directory(); echo new_version("{$images}logos/aos-general-logo.png"); ?>" />
<meta property="og:image:type" content="image/jpg" />
<meta property="og:image:width" content="210" />
<meta property="og:image:height" content="210" />

<link rel="shortcut icon" href="<?php echo new_version("{$images}favicon.png"); ?>"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="css/font-awesome.css" />
<link type="text/css" rel="stylesheet" href="<?php echo new_version("css/style.css"); ?>" />
<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/select2.min.js"></script>
<link rel="stylesheet" href="css/fotorama.css">
<script src="js/fotorama.js"></script>


<style>
<!--
.special-form{
background:rgba(255,255,255,0.8);
margin-top:20px;
}
.special-form label{
color:#000;
}
.special-title{
padding:20px;
font-size:25px;
background:#005;
color:#fff;
margin-bottom:10px;
margin-top:10px;
}
.special-title *{
color:#fff;
}
.form-group i{
color:#000;
}
.special{
background:#f55;
color:#fff;
font-size:#18px;
margin-bottom:10px;
text-align:center;
}
.special i{
color:#fff;
}
.special:hover{
color:#fff;
background:#f33;
}
.content-vission input[type="text"], .content-vission input[type="email"], .content-vission textarea{
color:#333 !important;
}
.check-spam{
color:#f11!important;
font-weight:900!important;
}

.shadow{
background:#fff;
text-align:center;
}

#owl-content .item{
  margin: 15px;
  border:1px solid #eee;
}
#owl-content .item img{
  display: block;
  width: 100%;
  height: auto;
}
#owl-content .item div:not(.cat-div){
padding:10px;
background:#fbfbfb;
}
#owl-content .item div span{
padding:10px;
padding-left:0px;
padding-right:0px;
font-size:18px;
font-weight:bold;
float:left;
}
#owl-content .item div a.btn{
float:right;
background:#f55;
border:1px solid #f55;
font-size:16px;
color:#fff;
}
#owl-content .item div a.btn:hover{
color:#f55;
background:#fff;
}
@media(max-width:600px){
#owl-content .item{
  margin: 5px;
}
}
.fotorama *{
overflow:visible;
}
-->
</style>

</head>
<?php detectCurrUserBrowser('<table width="100%"><tr><td>','',7); ?>
<body>

<div class="header-wrapper header-wrapper1" id="bodyDiv">
<div class="header header1">
<ul class="top-ul" style="float:left;">
<li><a><i class="fa fa-map-marker" aria-hidden="true"></i> <b>U.S Office:</b> South Tower, 115 W Washington St, Indianapolis, IN 46204, United States.</a></li>
</ul>
<ul class="top-ul">
<li><a href="mailto:<?php echo $gen_email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $gen_email; ?></a></li>
<li style="padding:5px;">|</li>
<li><a href="tel:<?php echo $gen_phone; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $gen_phone; ?></a></li>
</ul>
</div>
</div>

<div class="header-wrapper header-wrapper2" id="bodyDiv">
<div class="header header2">

<a href="<?php directory(); ?>" class="logo-link float-left"><img src="<?php echo new_version("{$images}logos/aos-logo.png"); ?>"></a>

<button class="collapse"><span></span><span></span><span></span></button>
<ul class="main-list">
<li><a href="about/"><i class="fa fa-university" aria-hidden="true"></i> About Us</a></li>
<li><a href="sports/"><i class="fa fa-trophy" aria-hidden="true"></i> Sports</a></li>
<li><a href="prizes/"><i class="fa fa-money" aria-hidden="true"></i> Prices</a><li>
<li><a href="entry-rules/"><i class="fa fa-file-text" aria-hidden="true"></i> Entry Rules</a><li>
<li><a href="contact/"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a></li>
</ul>
</div>
</div>

<div class="home-body-wrapper"> 
<div class="home-body container"> 

<div class="fotorama" data-width="100%" data-ratio="2.34/1" data-nav="thumbs" data-thumbheight="48" data-autoplay="true" data-autoplay="3000" data-stopautoplayontouch="false">
<a href="<?php echo new_version("{$images}slides/slide-1.jpg"); ?>"><img src="<?php echo new_version("{$images}slides/slide-1.jpg"); ?>"></a>
<a href="<?php echo new_version("{$images}slides/slide-2.jpg"); ?>"><img src="<?php echo new_version("{$images}slides/slide-2.jpg"); ?>"></a>
<a href="<?php echo new_version("{$images}slides/slide-3.jpg"); ?>"><img src="<?php echo new_version("{$images}slides/slide-3.jpg"); ?>"></a>
<a href="<?php echo new_version("{$images}slides/slide-4.jpg"); ?>"><img src="<?php echo new_version("{$images}slides/slide-4.jpg"); ?>"></a>
</div> 

</div>
</div>

<div class="home-body-wrapper"> 
<div class="container">

<h1 class="align-center general-header">ALL OUTDOOR SPORTS <span>(AOS)</span></h1>

<p>Welcome to AOS (All Outdoor Sports) million fortune competition, currently the aos million fortune competition is focused on the following sports, more will be added in future.</p>

<p>The All Outdoor Sport is a brand-new Million Dollar Fortune Competition that is being held in North America and Europe and is meant to recognize and reward young athletes in the BMX, ATV, and skateboarding sports. AOS Million Fortune's Donald Gallagher emphasized that the prize pool competition was meant to act as a libration for this sport, competitors, and the society. While governments and independent incentives have been introduced in some countries to encourage these sport categories, Gallagher noted that this was not the case everywhere.</p>

<p>Our dedication to provide high-caliber, safe, interesting, and inexpensive competition hasn't wavered over the years, despite the fact that our community of supporters, sponsors, riders, skaters, competitors, races, and volunteers has expanded. We are still committed to putting on well-planned, thrilling, and gratifying racing events around Europe and North America. We are dedicated to developing this fantastic sports while caring for the surroundings we enjoy and the towns that have welcomed us.</p>

<div>
<a href="about/" class="float-right read-content">Read more ...</a>
</div>

</div>
</div>
<div class="home-body-wrapper" style="background:#f5f5f5; padding-top:30px; padding-bottom:20px;"> 
<div class="container">

<h1 class="align-center general-header">Our <span>Core Value</span></h1>

<div id="owl-content" class="owl-carousel"> 
<div class="item shadow border-radius <?php echo det_browser("fly"); ?>">
<div class="cat-div"><a href="about/"><img src="<?php echo new_version("{$images}grids/about.jpg"); ?>" alt=""></a></div>
<div><a href="about/" class="btn gen-btn border-radius"><i class="fa fa-university" aria-hidden="true"></i> About Us</a></div>
</div>
<div class="item shadow border-radius <?php echo det_browser("fly"); ?>">
<div class="cat-div"><a href="prizes/"><img src="<?php echo new_version("{$images}grids/competition.jpg"); ?>" alt=""></a></div>
<div><a href="prizes/" class="btn gen-btn border-radius"><i class="fa fa-cogs" aria-hidden="true"></i> Competition</a></div>
</div>
<div class="item shadow border-radius <?php echo det_browser("fly"); ?>">
<div class="cat-div"><a href="contact/"><img src="<?php echo new_version("{$images}grids/contact.jpg"); ?>" alt=""></a></div>
<div><a href="contact/" class="btn gen-btn border-radius"><i class="fa fa-envelope" aria-hidden="true"></i> Contact Us</a></div>
</div>
</div>

</div>
</div>

<script>
<!--
$(document).ready(function () {

$("#owl-content").owlCarousel({
autoPlay: 3000,
items : 3,
itemsDesktop : [1199,3],
itemsDesktopSmall : [979,2],
itemsTablet : [540,1]
});

//Zoom effect
$(".item img").hover(function() {
	$(this).addClass("transition");
}, function() {
	$(this).removeClass("transition");
});

//////////////////////////////////////////

var $fotorama = $('.fotorama'),
    interval = $fotorama.data('autoplay'),
    fotorama = $fotorama.data('fotorama');

$fotorama.hover(
    function () {
        fotorama.stopAutoplay();
    },
    function () {
        fotorama.startAutoplay(interval);
    }
);

});


//-->
</script>

<?php require_once("includes/footer.php"); ?>