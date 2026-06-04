<script src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">

<div class="general-fade"></div>

<div class="general-result"></div>

<div class="footer-container">
<div class="footer-wrapper">
<div class="footer container">

<div class="col-sm-4 nav-link share">
<div class="title btn">CONTACT US</div>
<div><a href="mailto:<?php echo $gen_email; ?>"><b>Email:</b> <?php echo $gen_email; ?></a></div>
<div><a href="tel:<?php echo $gen_phone; ?>"><b>Phone:</b> <?php echo $gen_phone; ?></a></div>
<div style="padding:3px;"><b>U.S Office:</b> South Tower, 115 W Washington St, Indianapolis, IN 46204, United States.</div>
<div style="padding:3px;"><b>Canada Office:</b> 231 Fort York Blvd, Toronto, Ontario.</div>
<div style="padding:3px;"><b>U.K Office:</b> 26 Wembley Park Blvd, Wembley Park, Wembley HA9 0HP, United Kingdom.</div>
<div style="padding:3px;"><b>Europe Office:</b> Piet Heinkade 55, 1019 GM Amsterdam, Netherlands.</div>
</div>

<div class="col-sm-4 nav-link">
<div class="title btn">QUICK LINKS</div>
<a href="<?php directory(); ?>" class="<?php echo current_page("index"); ?>">Home</a>
<a href="about/" class="<?php echo current_page("about"); ?>">About Us</a>
<a href="sports/" class="<?php echo current_page("sports"); ?>">Sports</a>
<a href="prizes/" class="<?php echo current_page("prizes"); ?>">Prizes</a>
<a href="entry-rules/" class="<?php echo current_page("entry-rules"); ?>">Entry Rules</a>
<a href="contact/" class="<?php echo current_page("contact"); ?>">Contact Us</a>
<a href="terms/" class="<?php echo current_page("terms"); ?>">Terms & Conditions</a>
<a href="policy/" class="<?php echo current_page("policy"); ?>">Privacy Policy</a>
</div>

<div class="col-sm-4 subscribe">
<div class="title btn">ABOUT US</div>
<p>The All Outdoor Sport is a brand-new Million Dollar Fortune Competition that is being held in North America and Europe and is meant to recognize and reward young athletes in the BMX, ATV, and skateboarding sports. AOS Million Fortune's Donald Gallagher emphasized that the prize pool competition was meant to act as a libration for this sport <a class="read-more" href="about/">read more...</a></p>
<div class="footer-social">
<a href="https://web.facebook.com/profile.php?id=100089679864598" title="Facebook" class="fa fa-facebook btn" target="_blank"></a>
<a href="javascript:void(0);" title="Twitter" class="fa fa-twitter btn"></a>
<a href="javascript:void(0);" title="Google +" class="fa fa-google-plus btn"></a>
<a href="javascript:void(0);" title="Pinterest" class="fa fa-pinterest-p btn"></a>
<a href="https://www.instagram.com/aoscompetitions/" title="Instagram" class="fa fa-instagram btn"></a>
</div>
</div>

</div>
</div>
</div>

<div class="copyright">Copyright &copy; <?php echo date("Y") . " " . $full_gen_name; ?>. All Rights Reserved.<br />Developed by: <a href="http://reliancewisdom.com" target="_blank">Reliance Wisdom Digital.</a></div>

<script type="text/javascript" src="<?php echo new_version("js/general.js"); ?>"></script>
<script src="<?php echo new_version("js/general-form.js"); ?>"></script>
</body>
<?php
detectCurrUserBrowser('</td></tr></table>','',7); ?>
</html>