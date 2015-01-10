<?php 
session_start(); 

include_once 'allcon.php';
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>


<!DOCTYPE html> 
<html> 
	<head> 
		<title>Edit Profile</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
<link rel="shortcut icon" href="favicon.png"/>
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
<script src="php/index.js"></script>



        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
	</head> 
<body>
<data-role="page" >
<?php include 'header.php';?>
<data-role="content">

<?php 

if($_SERVER["REQUEST_METHOD"]=="POST"){
$user=$_SESSION['current'];
$t=mysqli_query($con,"select * from users where Username='$user'");
$me=mysqli_fetch_array($t);


if(!empty($_POST[fname])){
mysqli_query($con,"update users set FirstName='$_POST[fname]' where Username='$user'");
}

if(!empty($_POST[username])){
$new=mysqli_real_escape_string($con,$_POST[username]);
$r="select * from users where Username like '%$new%'";
$pass=mysqli_query($con,$r);

if(mysqli_num_rows($pass)!==0){

echo "This Username has already been taken";
}else{

mysqli_query($con,"update users set Username='$_POST[username]' where Username='$user'");
mysqli_query($con,"update chat set Sender='$_POST[username]' where  Sender='$user'");
mysqli_query($con,"update chat set Receiver='$_POST[username]' where Receiver='$user'");
mysqli_query($con,"update status set username='$_POST[username]' where username='$user'");
mysqli_query($con,"update status set Sharing='$_POST[username]' where Sharing='$user'");
mysqli_query($con,"update follow set Userfollowing='$_POST[username]' where Userfollowing='$user'");
mysqli_query($con,"update follow set Userfollowed='$_POST[username]' where Userfollowed='$user'");
mysqli_query($con,"update favorites set userfrom='$_POST[username]' where userfrom='$user'");
mysqli_query($con,"update favorites set Username='$_POST[username]' where Username='$user'");
mysqli_query($con,"update dislikes set Userliking='$_POST[username]' where Userliking='$user'");
mysqli_query($con,"update likes set Userliking='$_POST[username]' where Userliking='$user'");
mysqli_query($con,"update list set Friend='$_POST[username]' where Friend='$user'");
mysqli_query($con,"update logged set username='$_POST[username]' where username='$user'");
mysqli_query($con,"update notifications set usernotified='$_POST[username]' where usernotified='$user'");
mysqli_query($con,"update notifications set Username='$_POST[username]' where Username='$user'");
mysqli_query($con,"update replies set Username='$_POST[username]' where Username='$user'");
mysqli_query($con,"update request set Userto='$_POST[username]' where Userto='$user'");
mysqli_query($con,"update request set Userfrom='$_POST[username]' where Userfrom='$user'");
mysqli_query($con,"update sharedmedia set username='$_POST[username]' where username='$user'");
mysqli_query($con,"update topicfollowing set username='$_POST[username]' where username='$user'");
$_SESSION['current']=$_POST[username];
}
}

if(!empty($_POST[sname])){
$new=mysqli_real_escape_string($con,$_POST[sname]);
mysqli_query($con,"update users set SecondName='$new' where Username='$user'");
}
if(!empty($_POST[per])){

mysqli_query($con,"update users set Personality='$_POST[per]' where Username='$user'");
}

if(!empty($_POST[email])){
$new=mysqli_real_escape_string($con,$_POST[email]);
mysqli_query($con,"update users set email='$new' where Username='$user'");
}

if(!empty($_POST[web])){
$new=mysqli_real_escape_string($con,$_POST[web]);
mysqli_query($con,"update users set website='$new' where Username='$user'");
}
if(!empty($_POST[country])){
$new=mysqli_real_escape_string($con,$_POST[country]);
mysqli_query($con,"update users set Usercountry='$new' where Username='$user'");
}
if(!empty($_POST[bio])){
mysqli_query($con,"update users set Bio='$_POST[bio]' where Username='$user'");
}
if(!empty($_POST[tcat])){
mysqli_query($con,"update users set TrendCategory='$_POST[tcat]' where Username='$user'");
}
if(!empty($_POST[tcou])){
mysqli_query($con,"update users set Country='$_POST[tcou]' where Username='$user'");
}

if(!empty($_POST[fcat])){
mysqli_query($con,"update users set Category='$_POST[fcat]' where Username='$user'");
}

if(!empty($_POST[cpassword])&&!empty($_POST[npass])&&!empty($_POST[cnpass])){
if(md5($_POST[cpassword])<>$me[Password]){
echo '<br><br><br><span class="fg-black" style="font-size:18px;font-family:"Century Gothic"">Current Password does not match your input</span>';
}else{
if($_POST[npass]<>$_POST[cnpass]){
echo '<br><br><br><span class="fg-black" style="font-size:18px;font-family:"Century Gothic"">Password do not match</span>';
}else{
$newpassword=md5($_POST[npass]);
mysqli_query($con,"update users set Password='$newpassword' where Username='$user'");
echo '<br><br><br><span class="fg-black" style="font-size:18px;font-family:"Century Gothic"">Password successfully updated</span>';

}

}





}









}

?>
<?php 

$user=$_SESSION['current'];
$t=mysqli_query($con,"select * from users where Username='$user'");
$me=mysqli_fetch_array($t);

$username=$me['Username'];
$fname=$me['FirstName'];
$sname=$me['SecondName'];
$personality=$me['Personality'];
$email=$me['email'];
$web=$me['website'];
$bio=$me['Bio'];

echo '
<table style="width:100%;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<tr>
<td style="width:50px" class="avatar">
<li style="list-style-type:none;height:auto">
<img  STYLE="border-radius:5px;height:100px;width:100px;border:solid;border-color:#d3d3d3" src="profilepics/'.$me['Photo'].'"></a></li>
</td>
<td valign="top" style="color:black;width:auto;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
<span  style="font-size:17px;color:black;font-type:"Century Gothic"" ><b>'.$me[FirstName].' '.$me[SecondName].'</b><br style="color:purple"><b>'.$me[Username].'</b></span><br></td></tr></table>

<a href="sec.php" rel="external" data-role="button" data-mini="true" data-inline="true" style="background:#3b5998;border:none;border-radius:2px;color:#fff">Change Password</a>
<a href="editprophoto.php" rel="external" data-role="button" data-mini="true" data-inline="true" style="background:#3b5998;border:none;border-radius:2px;color:#fff">Change Profile Picture</a>
<a href="editcoverphoto.php" rel="external" data-role="button" data-mini="true" data-inline="true" style="background:#3b5998;border:none;border-radius:2px;color:#fff">Change Cover Photo</a>
<center>
<div style="max-width:500px;border:solid 3px;border-radius:5px;border-color:#fff" data-role="content">
<span class="fg-black" style="font-size:20px;font-family:"Century Gothic"">General Profile</span><br><br>

<form action="editprofile.php" method="post" data-ajax="false">

<span>First Name</span><br>
<input type="text" name="fname" value="'.$fname.'" style="border:solid 1px;border-color:#3b4998;border-radius:5px;height:40px;width:100%" data-role="none"/><br>
<span>Second Name</span><br><input type="text" name="email" value="'.$sname.'" style="border:solid 1px;border-color:#3b4998;border-radius:5px;height:40px;width:100%" data-role="none"/><br>
<span>Email</span><br>
<input type="text" name="email" value="'.$email.'" style="border:solid 1px;border-color:#3b4998;border-radius:5px;height:40px;width:100%" data-role="none"/><br>
<span>Web</span><br>
<input type="text" name="web" value="'.$web.'" style="border:solid 1px;border-color:#3b4998;border-radius:5px;height:40px;width:100%" data-role="none"/><br>
<span>Choose Country</span><br>
<select style="border:solid 1px;border-color:#3b4998;border-radius:5px;height:40px;width:100%" data-icon="false" data-theme="c" name="tcou" data-role="none">
<option>'.$me[Country].'</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote DIvoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select><br>
<span>Choose Category For Your Feeds</span><br>
<select data-icon="false" data-theme="c" data-role="none" name="fcat" style="border:solid 1px;border-color:#3b4998;border-radius:5px;height:40px;width:100%">
<option>'.$me[Category].'</option>
<option value="News">News</option>
<option value="Entertainment">Entertainment</option>
<option value="Business">Business</option>
<option value="Technology">Technology</option>
<option value="Celebrity">Celebrity</option>
<option value="Sports">Sports</option>
<option value="Music">Music</option>
<option value="Religion">Religion</option>
<option value="Careers and Jobs">Careers and Jobs</option>
<option value="Lifestyle">Lifestyle</option>
<option value="Health">Health</option>
<option value="Tv Show">TV Show</option>
<option value="Comedy">Comedy</option>
<option value="Youth">Youth</option>
</select><br>
<span>Bio</span><br>
<textarea name="bio" class="size3" style="border:solid 1px;border-color:#3b4998;border-radius:5px;height:auto;width:100%" data-role="none">'.$bio.'</textarea><br>

<input type="submit" value="Update Profile" style="border:none;background:#3b5998;border-radius:5px" data-mini="true" data-inline="true">

</form></div></center>








';

?>
</div>
</div>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
</body>
</html>