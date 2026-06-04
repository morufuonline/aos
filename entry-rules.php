<?php require_once("includes/header.php"); ?>

<?php
$mail = np_input("mail");
$name = tp_input("name");
$gender = tp_input("gender");
$phone = np_input("phone");
$email = tp_input("email");
$address = tp_input("address");
$region = tp_input("region");
$country = tp_input("country");
$subject = tp_input("level_of_sport");
$subject2 = $subject;
$message = tp_input("message");
$message2 = $message;
$about_us = tp_input("about_us");
$terms = tp_input("terms");
$check_user = tp_input("check_user");

if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($mail) && !empty($name) && !empty($gender) && !empty($phone) && strlen($phone) >= 5 && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($address) && !empty($region) && !empty($country) && !empty($subject) && !empty($message) && !empty($about_us) && !empty($terms) && $check_user == $_SESSION["spam_checker"]){

$to = $email;
$subject = "Ticket #{$ticket_id}: Registration for {$subject2} Level";
$message = "<p>Thank you for using our customer support service.</p>
<p>We will get back to you as soon as possible.</p>";
$message = message_template();
$headers = "{$gen_name} <no-reply@{$domain}>";

$act1 = send_mail();

$to = $gen_email;
$subject = "Ticket #{$ticket_id}: Registration for {$subject2} Level";
$message = "<p><b>Email:</b> {$email}</p><p><b>Phone Number:</b> {$phone}</p><p><b>Gender:</b> {$gender}</p><p><b>Address:</b> {$address}, {$region}, {$country}</p><p><b>Known us via:</b> {$about_us}</p><p>{$message2}</p>";
$foot_note = $regards = "";
$message = message_template();
$headers = "{$name} <{$email}>";
$act2 = send_mail(1);

$error = 0;

$_SESSION["msg"] = "<div class='success'>Your message was successfully sent. We will get back to you shortly.</div>";
redirect("{$directory}entry-rules/");
}

if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($mail) && (empty($name) || empty($gender) || empty($phone) || empty($email) || empty($address) || empty($region) || empty($country) || empty($level_of_sport) || empty($message) || empty($about_us) || empty($terms) || empty($check_user))){
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

<style>
<!--
.clients table{
width:100%;
}
.clients table td{
padding-left:5px;
padding-right:5px;
vertical-align:middle;
}
.clients .fa{
font-size:30px;
color:#c33;
}
.clients fieldset{
margin-bottom:10px;
}
.clients legend .fa{
font-size:14px;
color:#fff;
}

.home-body-wrapper ol{
margin-left:30px;
}

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
-->
</style>

<div class="home-body-wrapper"> 
<div class="container">

<h1 class="body-header border-radius"><div class="border-radius">The Entry <span>Rules</span></div></h1>

<div>
<div class="col-md-5">

<p><b>Note:</b> upon confirmation and payment registration, a site will be provided for all applicants to obtain guidelines and updates on the date and location of the competition when their region is hosting it after applicant registration and payment confirmation.</p>

<ol type="1">
<li>Fill out the registration form.</li>
<li>In order to enter, participants must be at least 18 years old.</li>
<li>A resident of North America and one of the listed EU nations must enter.</li>
</ol>

<h3 class="general-header">CATEGORY & <span>ENTRY PAYMENT</span></h3>

<p>You must pay a one-time registration fee.</p>

<p>The two types of entry fees are as follows;</p>

<p><b>Category A</b></p>

<p>The Platinum registration price is $500.</p>

<p><b>Category B</b></p>

<p>Registration for Gold is $250.</p>

<p>Late registration attracts a fee of $50.</p>

</div>
<div class="col-md-7 content-vission">

<form action="entry-rules/" method="post" class="special-form" id="contact-result" runat="server" name="send_mail" autocomplete="off" enctype="multipart/form-data">  

<div class="special-title border-radius"><i class="fa fa-upload"></i> Registration Form</div>

<input type="hidden" name="mail" value="1">

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
<input type="text" name="name" id="name" class="form-control" placeholder="Your Full Name" required value="<?php echo (isset($_SESSION["id"]))?$username:check_inputted("name"); ?>">
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
<select name="gender" id="gender" class="form-control" required>
<option value=""> - - Select a gender - - </option>
<option value="Male"<?php check_selected("gender", "Male"); ?>>Male</option>
<option value="Female"<?php check_selected("gender", "Female"); ?>>Female</option>
</select>
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
<input type="text" name="phone" id="phone" class="form-control only-no" placeholder="Your Phone Number" required value="<?php check_inputted("phone"); ?>">
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
<input type="email" name="email" id="email" class="form-control" placeholder="Your E-mail Address" required value="<?php echo (isset($_SESSION["id"]))?$user_email:check_inputted("email"); ?>">
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
<textarea name="address" id="address" class="form-control" placeholder="Your contact address" required rows="2"><?php check_inputted("address"); ?></textarea>
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
<input type="text" name="region" id="region" class="form-control" placeholder="Your Region" required value="<?php check_inputted("region"); ?>">
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
<select name="country" id="country" class="form-control js-example-basic-single" required>
<option value="">**Select a country**</option>
<option value='Afghanistan'>Afghanistan</option><option value='Albania'>Albania</option><option value='Algeria'>Algeria</option><option value='American Samoa'>American Samoa</option><option value='Andorra'>Andorra</option><option value='Angola'>Angola</option><option value='Anguilla'>Anguilla</option><option value='Antarctica'>Antarctica</option><option value='Antigua and Barbuda'>Antigua and Barbuda</option><option value='Argentina'>Argentina</option><option value='Armenia'>Armenia</option><option value='Aruba'>Aruba</option><option value='Australia'>Australia</option><option value='Austria'>Austria</option><option value='Azerbaijan'>Azerbaijan</option><option value='Bahamas'>Bahamas</option><option value='Bahrain'>Bahrain</option><option value='Bangladesh'>Bangladesh</option><option value='Barbados'>Barbados</option><option value='Belarus'>Belarus</option><option value='Belgium'>Belgium</option><option value='Belize'>Belize</option><option value='Benin'>Benin</option><option value='Bermuda'>Bermuda</option><option value='Bhutan'>Bhutan</option><option value='Bolivia'>Bolivia</option><option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option><option value='Botswana'>Botswana</option><option value='Brazil'>Brazil</option><option value='British Indian Ocean Territory'>British Indian Ocean Territory</option><option value='British Virgin Islands'>British Virgin Islands</option><option value='Brunei'>Brunei</option><option value='Bulgaria'>Bulgaria</option><option value='Burkina Faso'>Burkina Faso</option><option value='Burundi'>Burundi</option><option value='Cambodia'>Cambodia</option><option value='Cameroon'>Cameroon</option><option value='Canada'>Canada</option><option value='Cape Verde'>Cape Verde</option><option value='Cayman Islands'>Cayman Islands</option><option value='Central African Republic'>Central African Republic</option><option value='Chad'>Chad</option><option value='Chile'>Chile</option><option value='China'>China</option><option value='Christmas Island'>Christmas Island</option><option value='Cocos Islands'>Cocos Islands</option><option value='Colombia'>Colombia</option><option value='Comoros'>Comoros</option><option value='Congo'>Congo</option><option value='Cook Islands'>Cook Islands</option><option value='Costa Rica'>Costa Rica</option><option value='Croatia'>Croatia</option><option value='Cuba'>Cuba</option><option value='Curacao'>Curacao</option><option value='Cyprus'>Cyprus</option><option value='Czech Republic'>Czech Republic</option><option value='Democratic Republic of the Congo'>Democratic Republic of the Congo</option><option value='Denmark'>Denmark</option><option value='Djibouti'>Djibouti</option><option value='Dominica'>Dominica</option><option value='Dominican Republic'>Dominican Republic</option><option value='East Timor'>East Timor</option><option value='Ecuador'>Ecuador</option><option value='Egypt'>Egypt</option><option value='El Salvador'>El Salvador</option><option value='Equatorial Guinea'>Equatorial Guinea</option><option value='Eritrea'>Eritrea</option><option value='Estonia'>Estonia</option><option value='Ethiopia'>Ethiopia</option><option value='Falkland Islands'>Falkland Islands</option><option value='Faroe Islands'>Faroe Islands</option><option value='Fiji'>Fiji</option><option value='Finland'>Finland</option><option value='France'>France</option><option value='French Polynesia'>French Polynesia</option><option value='Gabon'>Gabon</option><option value='Gambia'>Gambia</option><option value='Georgia'>Georgia</option><option value='Germany'>Germany</option><option value='Ghana'>Ghana</option><option value='Gibraltar'>Gibraltar</option><option value='Greece'>Greece</option><option value='Greenland'>Greenland</option><option value='Grenada'>Grenada</option><option value='Guam'>Guam</option><option value='Guatemala'>Guatemala</option><option value='Guernsey'>Guernsey</option><option value='Guinea'>Guinea</option><option value='Guinea-Bissau'>Guinea-Bissau</option><option value='Guyana'>Guyana</option><option value='Haiti'>Haiti</option><option value='Honduras'>Honduras</option><option value='Hong Kong'>Hong Kong</option><option value='Hungary'>Hungary</option><option value='Iceland'>Iceland</option><option value='India'>India</option><option value='Indonesia'>Indonesia</option><option value='Iran'>Iran</option><option value='Iraq'>Iraq</option><option value='Ireland'>Ireland</option><option value='Isle of Man'>Isle of Man</option><option value='Israel'>Israel</option><option value='Italy'>Italy</option><option value='Ivory Coast'>Ivory Coast</option><option value='Jamaica'>Jamaica</option><option value='Japan'>Japan</option><option value='Jersey'>Jersey</option><option value='Jordan'>Jordan</option><option value='Kazakhstan'>Kazakhstan</option><option value='Kenya'>Kenya</option><option value='Kiribati'>Kiribati</option><option value='Kosovo'>Kosovo</option><option value='Kuwait'>Kuwait</option><option value='Kyrgyzstan'>Kyrgyzstan</option><option value='Laos'>Laos</option><option value='Latvia'>Latvia</option><option value='Lebanon'>Lebanon</option><option value='Lesotho'>Lesotho</option><option value='Liberia'>Liberia</option><option value='Libya'>Libya</option><option value='Liechtenstein'>Liechtenstein</option><option value='Lithuania'>Lithuania</option><option value='Luxembourg'>Luxembourg</option><option value='Macau'>Macau</option><option value='Macedonia'>Macedonia</option><option value='Madagascar'>Madagascar</option><option value='Malawi'>Malawi</option><option value='Malaysia'>Malaysia</option><option value='Maldives'>Maldives</option><option value='Mali'>Mali</option><option value='Malta'>Malta</option><option value='Marshall Islands'>Marshall Islands</option><option value='Mauritania'>Mauritania</option><option value='Mauritius'>Mauritius</option><option value='Mayotte'>Mayotte</option><option value='Mexico'>Mexico</option><option value='Micronesia'>Micronesia</option><option value='Moldova'>Moldova</option><option value='Monaco'>Monaco</option><option value='Mongolia'>Mongolia</option><option value='Montenegro'>Montenegro</option><option value='Montserrat'>Montserrat</option><option value='Morocco'>Morocco</option><option value='Mozambique'>Mozambique</option><option value='Myanmar'>Myanmar</option><option value='Namibia'>Namibia</option><option value='Nauru'>Nauru</option><option value='Nepal'>Nepal</option><option value='Netherlands'>Netherlands</option><option value='Netherlands Antilles'>Netherlands Antilles</option><option value='New Caledonia'>New Caledonia</option><option value='New Zealand'>New Zealand</option><option value='Nicaragua'>Nicaragua</option><option value='Niger'>Niger</option><option value='Nigeria'>Nigeria</option><option value='Niue'>Niue</option><option value='North Korea'>North Korea</option><option value='Northern Mariana Islands'>Northern Mariana Islands</option><option value='Norway'>Norway</option><option value='Oman'>Oman</option><option value='Pakistan'>Pakistan</option><option value='Palau'>Palau</option><option value='Palestine'>Palestine</option><option value='Panama'>Panama</option><option value='Papua New Guinea'>Papua New Guinea</option><option value='Paraguay'>Paraguay</option><option value='Peru'>Peru</option><option value='Philippines'>Philippines</option><option value='Pitcairn'>Pitcairn</option><option value='Poland'>Poland</option><option value='Portugal'>Portugal</option><option value='Puerto Rico'>Puerto Rico</option><option value='Qatar'>Qatar</option><option value='Republic of the Congo'>Republic of the Congo</option><option value='Reunion'>Reunion</option><option value='Romania'>Romania</option><option value='Russia'>Russia</option><option value='Rwanda'>Rwanda</option><option value='Saint Barthelemy'>Saint Barthelemy</option><option value='Saint Helena'>Saint Helena</option><option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option><option value='Saint Lucia'>Saint Lucia</option><option value='Saint Martin'>Saint Martin</option><option value='Saint Pierre and Miquelon'>Saint Pierre and Miquelon</option><option value='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines</option><option value='Samoa'>Samoa</option><option value='San Marino'>San Marino</option><option value='Sao Tome and Principe'>Sao Tome and Principe</option><option value='Saudi Arabia'>Saudi Arabia</option><option value='Senegal'>Senegal</option><option value='Serbia'>Serbia</option><option value='Seychelles'>Seychelles</option><option value='Sierra Leone'>Sierra Leone</option><option value='Singapore'>Singapore</option><option value='Sint Maarten'>Sint Maarten</option><option value='Slovakia'>Slovakia</option><option value='Slovenia'>Slovenia</option><option value='Solomon Islands'>Solomon Islands</option><option value='Somalia'>Somalia</option><option value='South Africa'>South Africa</option><option value='South Korea'>South Korea</option><option value='South Sudan'>South Sudan</option><option value='Spain'>Spain</option><option value='Sri Lanka'>Sri Lanka</option><option value='Sudan'>Sudan</option><option value='Suriname'>Suriname</option><option value='Svalbard and Jan Mayen'>Svalbard and Jan Mayen</option><option value='Swaziland'>Swaziland</option><option value='Sweden'>Sweden</option><option value='Switzerland'>Switzerland</option><option value='Syria'>Syria</option><option value='Taiwan'>Taiwan</option><option value='Tajikistan'>Tajikistan</option><option value='Tanzania'>Tanzania</option><option value='Thailand'>Thailand</option><option value='Togo'>Togo</option><option value='Tokelau'>Tokelau</option><option value='Tonga'>Tonga</option><option value='Trinidad and Tobago'>Trinidad and Tobago</option><option value='Tunisia'>Tunisia</option><option value='Turkey'>Turkey</option><option value='Turkmenistan'>Turkmenistan</option><option value='Turks and Caicos Islands'>Turks and Caicos Islands</option><option value='Tuvalu'>Tuvalu</option><option value='U.S. Virgin Islands'>U.S. Virgin Islands</option><option value='Uganda'>Uganda</option><option value='Ukraine'>Ukraine</option><option value='United Arab Emirates'>United Arab Emirates</option><option value='United Kingdom'>United Kingdom</option><option value='United States'>United States</option><option value='Uruguay'>Uruguay</option><option value='Uzbekistan'>Uzbekistan</option><option value='Vanuatu'>Vanuatu</option><option value='Vatican'>Vatican</option><option value='Venezuela'>Venezuela</option><option value='Vietnam'>Vietnam</option><option value='Wallis and Futuna'>Wallis and Futuna</option><option value='Western Sahara'>Western Sahara</option><option value='Yemen'>Yemen</option><option value='Zambia'>Zambia</option><option value='Zimbabwe'>Zimbabwe</option>
</select>
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-soccer-ball-o" aria-hidden="true"></i></span>
<select name="level_of_sport" id="level_of_sport" class="form-control" required>
<option value=""> - - Level of Sport - - </option>
<option value="BEGINNER"<?php check_selected("level_of_sport", "BEGINNER"); ?>>BEGINNER</option>
<option value="INTERMEDIATE"<?php check_selected("level_of_sport", "INTERMEDIATE"); ?>>INTERMEDIATE</option>
<option value="EXPERT"<?php check_selected("level_of_sport", "EXPERT"); ?>>EXPERT</option>
</select>
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
<textarea type="text" name="message" id="message" class="form-control" placeholder="Message" required rows="4"><?php check_inputted("message"); ?></textarea>
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></span>
<select name="about_us" id="about_us" class="form-control" required>
<option value=""> - - How did you here about us? - - </option>
<option value="INSTAGRAM"<?php check_selected("about_us", "INSTAGRAM"); ?>>INSTAGRAM</option>
<option value="FRIEND"<?php check_selected("about_us", "FRIEND"); ?>>FRIEND</option>
<option value="REFERRAL"<?php check_selected("about_us", "REFERRAL"); ?>>REFERRAL</option>
<option value="ADVERT"<?php check_selected("about_us", "ADVERT"); ?>>ADVERT</option>
</select>
</div>

<div class="form-group input-group border-radius">
<span class="input-group-addon"><i class="fa fa-file-text" aria-hidden="true"></i></span>
 &nbsp;&nbsp; <label><input type="checkbox" name="terms" id="terms" value="1" required> AGREE TO TERMS AND CONDITON <a href="terms/" target="_blank" style="color:#f11;"> Read here...</a></label>
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
</div>


</div>
</div>

<?php require_once("includes/footer.php"); ?>