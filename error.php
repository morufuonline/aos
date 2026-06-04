<?php
// Date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

ini_set("session.cookie_lifetime", 604800);
ini_set("session.gc_maxlifetime", 604800);
session_start();

require_once("includes/functions.php");

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
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
<base href="<?php directory(); ?>" target="_top">
<meta charset="UTF-8" />
<meta name="description" content="<?php echo $full_gen_name; ?>"/>
<meta name="robots" content="noodp"/>
<meta name="keywords" content="<?php echo $full_gen_name; ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<title>Error - <?php echo $full_gen_name; ?></title>

<meta property="og:url" content="<?php directory(); ?>" /> 
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $full_gen_name; ?>" /> 
<meta property="og:description" content="<?php echo $full_gen_name; ?>" /> 
<meta property="og:image" content="<?php directory(); echo $images; ?>logos/aos-general-logo.png" />
<meta property="og:image:type" content="image/jpg" />
<meta property="og:image:width" content="210" />
<meta property="og:image:height" content="210" />

<link rel="shortcut icon" href="<?php echo $images; ?>favicon.png"/>
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="css/font-awesome.css" />
<link type="text/css" rel="stylesheet" href="<?php echo new_version("css/style.css"); ?>" />
<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/owl.carousel.js"></script>

<style>
<!--
.shadow{
background:#fff;
text-align:center;
padding:20px;
}

.error-header, .error-header *{
font-size:50px;
color:#900;
}
.error-message{
font-size:50px;
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

<a href="<?php directory(); ?>" class="logo-link float-left"><img src="<?php echo $images; ?>logos/aos-logo.png"></a>

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
<div class="container" style="padding-top:50px;"> 

<div class="error-header"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error</div>

<div class="error-message">Hello! We are sorry. Your request is not available.</div>

</div>
</div>

<?php require_once("includes/footer.php"); ?>