<?php require_once("includes/header.php"); ?>
<style>
<!--
.special-title{
padding:20px;
font-size:25px;
background:#eee;
color:#000;
margin-bottom:10px;
margin-top:10px;
}
.special-title *{
color:#000;
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
.contact-social *{
font-size:20px;
}
.contact-social *:hover{
color:#c33;
}
.body-header2{
padding:10px 0px;
}
-->
</style>

<?php
$mail = np_input("mail");
$name = tp_input("name");
$phone = np_input("phone");
$email = tp_input("email");;
$subject = tp_input("subject");
$subject2 = $subject;
$message = tp_input("message");
$message2 = $message;
$check_user = tp_input("check_user");

if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($mail) && !empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($phone) && strlen($phone) >= 5 && !empty($subject) && !empty($message) && $check_user == $_SESSION["spam_checker"]){

$to = $email;
$subject = "Ticket #{$ticket_id}: Inquiry - {$subject2} Level";
$message = "<p>Thank you for using our customer support service.</p>
<p>We will get back to you as soon as possible.</p>";
$message = message_template();
$headers = "{$gen_name} <no-reply@{$domain}>";

$act1 = send_mail();

$to = $gen_email;
$subject = "Ticket #{$ticket_id}: Inquiry - {$subject2} Level";
$message = "<p><b>Email:</b> {$email}</p><p><b>Phone Number:</b> {$phone}</p><p>{$message2}</p>";
$foot_note = $regards = "";
$message = message_template();
$headers = "{$name} <{$email}>";
$act2 = send_mail(1);

$error = 0;

$_SESSION["msg"] = "<div class='success'>Your message was successfully sent. We will get back to you shortly.</div>";
redirect("{$directory}contact/");
}

if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($mail) && (empty($name) || empty($phone) || empty($email) || empty($subject2) || empty($message2) || empty($check_user))){
echo "<div class='not-success'>Not Successful. All fields must be properly filled.</div>";
}else if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($mail) && !empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "<div class='not-success'>Not Successful. Invalid email format.</div>";
}else if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($mail) && !empty($phone) && strlen($phone) < 5){
echo "<div class='not-success'>Not Successful. Phone number must not be less than 5 digits.</div>";
}else if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($mail) && !empty($check_user) && $check_user != $_SESSION["spam_checker"]){
echo "<div class='not-success'>Not submitted! Incorrect check code.</div>";
}

if(isset($_SESSION["msg"]) && empty($mail)){
echo $_SESSION["msg"];
unset($_SESSION["msg"]);
}
?>

<div class="home-body-wrapper"> 
<div class="container"> 

<h1 class="body-header border-radius"><div class="border-radius">Contact <span>Us</span></div></h1>

<div class="col-md-5 content-body">

<div class="body-header2"><i class="fa fa-building" aria-hidden="true"></i> Location</div>
<p><b>U.S Office:</b> South Tower, 115 W Washington St, Indianapolis, IN 46204, United States.</p>
<p><b>Canada Office:</b> 231 Fort York Blvd, Toronto, Ontario.</p>
<p><b>U.K Office:</b> 26 Wembley Park Blvd, Wembley Park, Wembley HA9 0HP, United Kingdom.</p>
<p><b>Europe Office:</b> Piet Heinkade 55, 1019 GM Amsterdam, Netherlands.</p>

<div class="body-header2"><i class="fa fa-envelope" aria-hidden="true"></i> Email</div>
<p><a href="mailto:<?php echo $gen_email; ?>"><?php echo $gen_email; ?></a></p>

<div class="body-header2"><i class="fa fa-phone" aria-hidden="true"></i> Phone</div>
<p><?php echo $gen_phone; ?></p>

<div class="body-header2"><i class="fa fa-globe" aria-hidden="true"></i> Social Media</div>
<p class="contact-social"><a href="https://web.facebook.com/profile.php?id=100089679864598" title="Facebook" class="fa fa-facebook btn" target="_blank"></a> <a href="https://www.instagram.com/aoscompetitions/" title="Instagram" class="fa fa-instagram btn" target="_blank"></a></p>


</div>
<div class="col-md-7 content-vission">
<form action="contact/" method="post" class="special-form" id="contact-result" runat="server" name="send_mail" autocomplete="off" enctype="multipart/form-data">  

<div class="special-title border-radius"><i class="fa fa-envelope"></i> Send us a mail</div>

<p><b style="color:#f11;">Contact us</b> <b>for more information on the payment categories and other questions.</b></p>

<input type="hidden" name="mail" value="1">

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
<input type="text" name="name" id="name" class="form-control" placeholder="Your Full Name" required value="<?php echo (isset($_SESSION["id"]))?$username:check_inputted("name"); ?>">
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
<input type="email" name="email" id="email" class="form-control" placeholder="Your E-mail Address" required value="<?php echo (isset($_SESSION["id"]))?$user_email:check_inputted("email"); ?>">
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
<input type="text" name="phone" id="phone" class="form-control only-no" placeholder="Your Phone Number" required value="<?php check_inputted("phone"); ?>">
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-file-text" aria-hidden="true"></i></span>
<input type="text" name="subject" id="subject" class="form-control" placeholder="Keep the subject short" required value="<?php check_inputted("subject"); ?>">
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
<textarea type="text" name="message" id="message" class="form-control" placeholder="Message" required rows="4"><?php check_inputted("message"); ?></textarea>
</div>

<label for="check_user">Type this check code below: <span class="check-spam"><?php $_SESSION["spam_checker"] = rand(1000,9999); echo $_SESSION["spam_checker"]; ?></span></label>
<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-lock"></i></span>
<input type="text" name="check_user" id="check_user" class="form-control only-no"  maxlength="4" placeholder="Type the check code here" required value="" style="height:auto;">
</div>

<div>
<button class="btn gen-btn border-radius float-right"><i class="fa fa-send"></i> Send</button>
</div>

</form>

</div>

<div class="col-md-12">
<p>&nbsp;</p>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3066.725591226598!2d-86.15879968526023!3d39.76826910274589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886b50bdda57e76b%3A0x3764236bd8004bcb!2s50%20N%20Pennsylvania%20St%2C%20Indianapolis%2C%20IN%2046204%2C%20USA!5e0!3m2!1sen!2sng!4v1675367952730!5m2!1sen!2sng" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>

</div>
</div>

<?php require_once("includes/footer.php"); ?>