<?php
/*
=====================================================
 DataLife Engine - by SoftNews Media Group
-----------------------------------------------------
 http://dle-news.ru/
-----------------------------------------------------
 Copyright (c) 2004-2019 SoftNews Media Group
=====================================================
 This code is protected by copyrights
=====================================================
 File: install.php
-----------------------------------------------------
 Use: Script installation
=====================================================
*/
session_start();

@error_reporting ( E_ALL ^ E_WARNING ^ E_DEPRECATED ^ E_NOTICE );
@ini_set ( 'error_reporting', E_ALL ^ E_WARNING ^ E_DEPRECATED ^ E_NOTICE );

define('DATALIFEENGINE', true);
define('ROOT_DIR', dirname (__FILE__));
define('ENGINE_DIR', ROOT_DIR.'/engine');

header("Content-type: text/html; charset=utf-8");

require_once(ROOT_DIR.'/language/English/adminpanel.lng');
require_once(ENGINE_DIR.'/inc/include/functions.inc.php');

$url = explode( basename($_SERVER['PHP_SELF']), strtolower ( $_SERVER['PHP_SELF'] ) );
$url = reset($url);

if( isSSL() ) $url  = "https://".$_SERVER['HTTP_HOST'].$url;
else $url  = "http://".$_SERVER['HTTP_HOST'].$url;

$skin_header = <<<HTML
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>DataLife Engine - Установка</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="HandheldFriendly" content="true">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width"> 
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="engine/skins/fonts/fontawesome/styles.min.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="engine/skins/stylesheets/application.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="engine/skins/javascripts/application.js"></script>
</head>
<body class="no-theme">
<script>
<!--
var dle_act_lang   = [];
var cal_language   = {en:{months:[],dayOfWeek:[]}};
var filedefaulttext= '';
var filebtntext    = '';
//-->
</script>
<div class="navbar navbar-inverse bg-primary-700">
	<div class="navbar-header">
		<a class="navbar-brand" href="#">DataLife Engine Installation Wizard</a>
	</div>
</div>
<div class="page-container">
	<div class="page-content">
		<div class="col-md-8 col-md-offset-2 mt-20">
<!--MAIN area-->
HTML;


$skin_footer = <<<HTML
	 <!--MAIN area-->
    </div>
  </div>
</div>
</body>
</html>
HTML;

function msgbox($type, $title, $text, $back=false){
global $lang, $skin_header, $skin_footer;

  if ($back) $back = "onclick=\"history.go(-1); return false;\""; else $back = "";

  echo $skin_header;

echo <<<HTML
<form action="install.php" method="get">
<div class="panel panel-default">
  <div class="panel-heading">
	{$title}
  </div>
  <div class="panel-body">
		{$text}
  </div>
  <div class="panel-footer">
	<button type="submit" {$back} class="btn bg-teal btn-sm btn-raised position-left"><i class="fa fa-arrow-circle-o-right position-left"></i>Next</button>
  </div>
</div>
</form>
HTML;

  echo $skin_footer;

  exit();
}

function GetRandInt($max){

	if(function_exists('openssl_random_pseudo_bytes')) {
	     do{
	         $result = floor($max*(hexdec(bin2hex(openssl_random_pseudo_bytes(4)))/0xffffffff));
	     }while($result == $max);
	} else {

		$result = mt_rand( 0, $max );
	}

    return $result;
}

function generate_auth_key() {

    $arr = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','o','p','r','s',
                 't','u','v','x','y','z',
                 'A','B','C','D','E','F',
                 'G','H','I','J','K','L',
                 'M','N','O','P','R','S',
                 'T','U','V','X','Y','Z',
                 '1','2','3','4','5','6',
                 '7','8','9','0','.',',',
                 '(',')','[',']','!','?',
                 '&','^','%','@','*',' ',
                 '<','>','/','|','+','-',
                 '{','}','`','~','#',';',
                 '/','|','=',':','`');

    $key = "";
    for($i = 0; $i < 64; $i++)
    {
      $index = GetRandInt(count($arr))-1;
      $key .= $arr[$index];
    }
    return $key;
}

if($_REQUEST['action'] == "eula") {

if ( !$_SESSION['dle_install'] ) msgbox( "", "Error", "Script installation was started not from the beginning. Return to homepage to start the script installation: <br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>" );

  echo $skin_header;

echo <<<HTML
<form id="check-eula" method="get" action="">
<input type=hidden name=action value="function_check">
<script language='javascript'>
function check_eula(){

	if( document.getElementById( 'eula' ).checked == true )
	{
		return true;
	}
	else
	{
		DLEalert( 'You must accept the license agreement before continuing the installation.', 'Information' );
		return false;
	}
};
document.getElementById( 'check-eula' ).onsubmit = check_eula;
</script>
<div class="panel panel-default">
  <div class="panel-heading">
    License Agreement
  </div>
	<div class="panel-body">
		Please read carefully and accept before using DataLife Engine.<br /><br /><div style="height: 300px; border: 1px solid #76774C; background-color: #FDFDD3; padding: 5px; overflow: auto;"><b>Dear User! Please, read the terms of use of the Program contained in this Agreement before starting the installation, copying or other use of the Program. Installation, launch or other use of the Program means the proper conclusion of this Agreement and your full acceptance of all its terms. If you do not agree to unconditionally accept the terms of this Agreement, you have no right to install and use the Program and must remove all of its components from your computer (PC).</b><br /><br />This EULA (hereinafter - the Agreement) is concluded between LLC "SoftNews Media Group" (hereinafter - the Licensee), and any natural person, an individual entrepreneur, or a legal entity (hereinafter - the User).<br /><br /><div style="text-align:center;"><b>1. Definitions</b></div><br /><b>1.1.</b> <b>Program</b> – is "DataLife Engine" computer program of the appropriate version (as a whole and its components), which is provided in the form of an objective set of data and commands, including the source code, databases, audiovisual works included in the Program by the Licensee, as well as any documentation on its use.<br /><br /><b>1.2. Use of Program</b> - any activity related to the functioning of the Program in accordance with its intended purpose (including saving in PC memory).<br /><br /><b>1.3. Technical Support</b> – activities carried out by the Licensee within the established limits and volumes to ensure the functioning of the Program, including information and advisory support to Users about the use of the Program.<br /><br /><b>1.4. Licensor</b> - keeper, owner and franchisor of the Program, who issues the License to another person (Licensee), that gives the right to use the Program within limits established by the License.<br /><br /><b>1.5. Licensee</b> - a legal entity or individual entrepreneur who has the License.<br /><br /><b>1.6. User</b> - a natural person, legal entity, or individual entrepreneur who purchased the license to use DataLife Engine according to the agreement.<br /><br /><div style="text-align:center;"><b>2. Subject of the license agreement</b></div><br /><b>2.1.</b> The subject of this license agreement is the right to use a single licensed copy of "DataLife Engine" computer program in the manner and on the conditions set forth in this Agreement. If you do not agree with the terms of this agreement, you can not use this product. Installation and use of the product indicates your complete acceptance of all the clauses of this Agreement.<br /><br /><b>2.2.</b> All provisions of this Agreement shall apply to the Program as a whole and to its individual components, except for the cases when a different type of license is applied to the system component.<br /><br /><b>2.3.</b> This Agreement is concluded before or directly at the start of the Program use and works throughout the entire period of its lawful use by the User within the term of copyright on it subject to the terms of this User Agreement.<br /><br /><div style="text-align:center;"><b>3. Content of the agreement</b></div><br /><b>3.1. </b>The term of customer service since the purchase of one licensed copy of the "DataLife Engine" program is one year. If you choose not to renew the service period at the end of it, your program will be fully operational, but without our support and without the provision of new versions of Program, except for critical software updates.<br /><br /><b>3.2. </b>Licensee provides Technical support to Users, including the issues related to the Program functionality, features of installation and operation at standard configurations of supported (popular) operating, mail and other systems in the manner and under the conditions specified in its technical documentation.<br /><br /><b>3.3. </b>In case of the purchase and use of only the basic license for the Program, the customer service is limited only by the delivery of standard service for the duration of the license agreement: the provision of distribution kits, new versions of Program, critical software updates. Technical support is not available for the basic license. User must have a license that includes technical support, or be a subscriber to technical support to get technical support for the program.<br /><br /><b>3.4. </b>If the User has purchased the Program for the transfer of the finished project or the website directly to the customer, the User is required to notify the customer of this license agreement, and to give him/her the client access on dle-news.com. Otherwise, a person who directly purchased the license, and having a client access on dle-news.com will still be the User of the license. Third parties who do not have this access will be denied to get the support and distribution kits.<br /><br /><b>3.5. </b>We reserve the right to publish lists of favourite sites with the agreement of the User of software that use "DataLife Engine" program. We reserve the right to modify the terms of this agreement at any time, but these changes are not retroactive. Changes in this agreement will be sent to users by e-mail to the addresses indicated when purchased the license for the Program.<br /><br /><div style="text-align:center;"><b>4. Limitations of Program Use</b></div><br /><b>4.1. </b>The program is the result of intellectual activity and subject to copyrights (computer program), which are regulated and protected by the laws of the Russian Federation intellectual property law and international law.<br /><br /><b>4.2. </b>The name "DataLife Engine" and scripts of this program  are the property of the Licensor, use of which is possible only within this Agreement, except for the cases when a different type of license is used for the system component. Any published original material created using the Program, and the associated rights to them are the property of the User and protected by law. Licensor and Licensee are not responsible for the content of websites, created by User of "DataLife Engine" Program.<br /><br /><b>4.3. </b>The algorithm of the program and its source code (including its parts) are the property of Licensor and Licensee. Any use of it or use of the Program that violates the terms of this Agreement shall be considered as a violation of the rights of the Licensor and is sufficient reason for deprivation of rights of the User provided in this Agreement.<br /><br /><b>4.4. </b>Licensee guarantees that it has all necessary rights under this Agreement to provide them to Users, including the program documentation.<br /><br /><b>4.5. </b>You should know that you do not purchase copyrights for the Program by purchasing a license for the "DataLife Engine". You purchase the right to use the software on a single website only (a second-level domain and its subdomains) owned by you or your client. You need to purchase another license to use the program on another website.<br /><br /><b>4.6. </b>Program can not be resold to third parties.<br /><br /><b>4.7. </b>The User of this Agreement is not provided with any right to use the trademarks and service marks of Licensor and Licensee.<br /><br /><b>4.8. </b>The User is not allowed to remove or change the information appearance and information about the copyrights, trademark or patent indicated in the source code of the Program under any circumstances.<br /><br /><div style="text-align:center;"><b>5. Rights and obligations of the Parties</b></div><br /><b>5.1. User may:</b><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.1.1 </b>Changing the design and structure of the code in accordance with the needs of your site.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.1.2 </b>Produce and distribute the instructions on custom templates and language files modifications, if they have a reference to the original developer of the software that is modified by you. The modifications made by you are not owned by the Licensor, if there is no source code of the Program itself.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.1.3 </b>Create your own modules for the Program that will interact with the source code of the Program, with the indication that this is an original product of the User.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.1.4 </b>Move the Program to another site after obligatory notification to the Licensee, as well as the complete removal of the Program from the previous website.<br /><br /><b>5.2. User may not:</b><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.2.1</b> Transfer the right to use the Program to third parties.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.2.2 </b>Use or change the structure of the program code and functions of the program to create related products.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.2.3 </b>Create separate standalone products based on our code.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.2.4 </b>Use copies of the "DataLife Engine" program with one license on more than one website (one second-level domain and its subdomains).<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.2.5 </b>Advertise, sell or publish pirated copies of the Program on User's website.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.2.6 </b>Distribute or promote the distribution of unlicensed copies of the "DataLife Engine" program.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.2.7 </b>Modify and delete the original license validation procedure.<br /><br /><div style="text-align:center;"><b>6. Limitation of warranty</b></div><br /><b>6.1. </b>We note that security mechanisms that are installed on "DataLife Engine", have its limitations, and despite the fact that we are making every effort to ensure the safety of the Program, you must know that we can not absolutely guarantee that your site will not be hacked. Also, our warranty and technical support is not subject to the modifications made by third parties, including changes in the code, style, language packs, as well as if these changes are made by the Licensee. If the program is modified by you or a third party, we refuse to provide technical support.<br /><br /><b>6.2. </b>DataLife Engine" program can not be returned or exchanged due to the lack of guarantees that protect the program from being copied.<br /><br /><div style="text-align:center;"><b>7. Early termination of the contractual obligations</b></div><br /><b>7.1. </b>This agreement shall be terminated automatically if you refuse to comply with the terms of our agreement. This sublicense agreement may be terminated by us unilaterally in case of violation of the sublicense agreement. In case of early termination of the Agreement, you must delete all of your copies of our Program within 3 working days from the date of receipt of the notification.</div>
		<div class="checkbox"><label><input type="checkbox" name="eula" id="eula" class="icheck">I accept this agreement</label></div>
	</div>
	<div class="panel-footer">
	<button type="submit" class="btn bg-teal btn-sm btn-raised position-left"><i class="fa fa-arrow-circle-o-right position-left"></i>Next</button>
	</div>
</div>
</form>
HTML;

} elseif($_REQUEST['action'] == "function_check") {

    if ( !$_SESSION['dle_install'] ) msgbox( "", "Error", "Script installation was started not from the beginning. Return to homepage to start the script installation: <br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>" );

  echo $skin_header;

echo <<<HTML
<form method="get" action="">
<input type=hidden name="action" value="chmod_check">
<div class="panel panel-default">
  <div class="panel-heading">
    Check of the installed PHP components
  </div>
  <div class="table-responsive">
<table class="table table-striped table-xs">
<thead>
<tr>
<th width="250">Minimal script requirements</th>
<th colspan="2">Current value</th>
</tr>
</thead>
HTML;

	$errors=false;
	
	if( version_compare(phpversion(), '5.4', '<') ) {
		 $status = '<span class="text-danger"><b>No</b></span>';
		 $errors=true;
	} else {
		$status = '<span class="text-success"><b>Yes</b></span>';
  }

   echo "<tr>
         <td>PHP ver. 5.4 or higher</td>
         <td colspan=2>$status</td>
         </tr>";

	if( function_exists('mysqli_connect') ) {
	  $status = '<span class="text-success"><b>Yes</b></span>';
	} else {
	  $status = '<span class="text-danger"><b>No</b></span>';
	  $errors=true;
	}

   echo "<tr>
         <td>MySQLi support</td>
         <td colspan=2>$status</td>
         </tr>";


	if( function_exists('gzopen') ) {
	  $status = '<span class="text-success"><b>Yes</b></span>';
	} else {
	  $status = '<span class="text-danger"><b>No</b></span>';
	  $errors=true;
	}

   echo "<tr>
         <td>ZLib compression support</td>
         <td colspan=2>$status</td>
         </tr>";

	if( function_exists('mb_convert_encoding') ) {
	  $status = '<span class="text-success"><b>Yes</b></span>';
	} else {
	  $status = '<span class="text-danger"><b>Yes</b></span>';
	  $errors=true;
	}

   echo "<tr>
         <td>Multibyte strings support</td>
         <td colspan=2>$status</td>
         </tr>";

	if($errors) {
	 $button= "<button onclick=\"location.reload(true); return false;\" class=\"btn bg-danger btn-sm btn-raised position-left\"><i class=\"fa fa-refresh position-left\"></i>Check again</button>";
	} else {
	 $button = "<button type=\"submit\" class=\"btn bg-teal btn-sm btn-raised position-left\"><i class=\"fa fa-arrow-circle-o-right position-left\"></i>Next</button>";
	}
	
echo <<<HTML
</table>
  <div class="panel-body">
	If any of these items are highlighted in red, please follow the steps to remedy the situation. In the case of non-compliance with the minimum requirements of the script it can not work properly in the system.
  </div>
  <div class="panel-footer">
	{$button}
  </div>

  </div>
</div></form>
HTML;

}
// ********************************************************************************
// Checking write permissions
// ********************************************************************************
elseif($_REQUEST['action'] == "chmod_check") {

if ( !$_SESSION['dle_install'] ) msgbox( "", "Error", "Script installation was started not from the beginning. Return to homepage to start the script installation: <br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>" );

  echo $skin_header;

echo <<<HTML
<form method="get" action="">
<input type=hidden name="action" value="doconfig">
<div class="panel panel-default">
  <div class="panel-heading">
    Checking the write access for important system files
  </div>
  <div class="table-responsive">
<table class="table table-striped table-xs">
HTML;

echo"<thead><tr>
<th>Directory/File</th>
<th width=\"100\">CHMOD</th>
<th width=\"100\">Status</td></tr></thead><tbody>";

$important_files = array(
'./backup/',
'./engine/data/',
'./engine/cache/',
'./engine/cache/system/',
'./uploads/',
'./uploads/files/',
'./uploads/fotos/',
'./uploads/posts/',
'./uploads/posts/thumbs/',
'./uploads/posts/medium/',
'./uploads/thumbs/',
'./templates/',
'./templates/Default/',
);


$chmod_errors = 0;
$not_found_errors = 0;
    foreach($important_files as $file){

        if(!file_exists($file)){
            $file_status = "<span class=\"text-danger\">is not found!</span>";
            $not_found_errors ++;
        }
        elseif(is_writable($file)){
            $file_status = "<span class=\"text-success\">is permitted</span>";
        }
        else{
            @chmod($file, 0777);
            if(is_writable($file)){
                $file_status = "<span class=\"text-success\">is permitted</span>";
            }else{
                @chmod("$file", 0755);
                if(is_writable($file)){
                    $file_status = "<span class=\"text-success\">is permitted</span>";
                }else{
                    $file_status = "<span class=\"text-danger\">is prohibited</font>";
                    $chmod_errors ++;
                }
            }
        }
        $chmod_value = @decoct(@fileperms($file)) % 1000;

    echo"<tr>
         <td>$file</td>
         <td>$chmod_value</td>
         <td>$file_status</td>
         </tr>";
    }
    
if($chmod_errors == 0 and $not_found_errors == 0){

    $status_report = 'Checking is successfully completed! You can continue the installation!';

} else {
    
    if($chmod_errors > 0){
        $status_report = "<span class=\"text-danger\">Warning!!!</span><br /><br />The following errors were found during the check: <b>$chmod_errors</b>. It is permitted to write to the file.<br />You must set CHMOD 777 for folders and CHMOD 666 for files using FTP client.<br /><br /><span class=\"text-danger\"><b>It is strongly recommended</b></span> not to continue the installation until changes will be done.<br />";
    }

    if($not_found_errors > 0){
        $status_report .= "<span class=\"text-danger\">Warning!!!</span><br />The following errors were found during the check: <b>$not_found_errors</b>. Files not found!<br /><br /><span class=\"text-danger\"><b>It is not recommended</b></span> to continue the installation until changes will be done.<br />";
    }
}


echo <<<HTML
</tbody></table>
  </div>
  <div class="panel-body">
	{$status_report}
  </div>
  <div class="panel-footer">
	<button type="submit" class="btn bg-teal btn-sm btn-raised position-left"><i class="fa fa-arrow-circle-o-right position-left"></i>Next</button>
  </div>
</div></form>
HTML;

} elseif($_REQUEST['action'] == "doconfig") {

    if ( !$_SESSION['dle_install'] ) msgbox( "", "Error", "Script installation was started not from the beginning. Return to homepage to start the script installation: <br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>" );

  echo $skin_header;

  echo <<<HTML
<form method="post" action="">
<input type=hidden name="action" value="doinstall">
<div class="panel panel-default">
  <div class="panel-heading">
    System configuration settings
  </div>
  <div class="panel-body">
<table width="100%">
HTML;

echo '<tr>
<tr><td colspan="2" style="padding: 5px;"><b>Data for access to MySQL server</b><td></tr>
<tr><td style="padding: 5px;" width="175">MySQL Server Host:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;" name="dbhost" value="localhost"></tr>
<tr><td style="padding: 5px;">Database Name:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;" name="dbname"></tr>
<tr><td style="padding: 5px;">MySQL User Name:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;" name="dbuser"></tr>
<tr><td style="padding: 5px;">MySQL Password:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;" name="dbpasswd"></tr>
<tr><td style="padding: 5px;">Prefix:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;" name="dbprefix" value="dle"> <span class="text-size-small text-muted">Do not change the parameter unless you know what it is for</span></tr>
<tr><td colspan="2" style="padding: 5px;"><b>Data for the access to the control panel</b><td></tr>
<tr><td style="padding: 5px;">Login for Administrator:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;" name="reg_username" ></tr>
<tr><td style="padding: 5px;">Password:</td><td style="padding: 5px;"><input type="password" class="classic" style="width:220px;" name="reg_password1"></tr>
<tr><td style="padding: 5px;">Confirm Your Password:</td><td style="padding: 5px;"><input type="password" class="classic" style="width:220px;" name="reg_password2"></tr>
<tr><td style="padding: 5px;">E-mail:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;" name="reg_email"></tr>';

echo <<<HTML
</table>
  </div>
  <div class="panel-footer">
	<button type="submit" class="btn bg-teal btn-sm btn-raised position-left"><i class="fa fa-arrow-circle-o-right position-left"></i>Next</button>
  </div>
</div></form>
HTML;

}
// ********************************************************************************
// Do Install
// ********************************************************************************
elseif($_REQUEST['action'] == "doinstall")
{

	if ( !$_SESSION['dle_install'] ) msgbox( "", "Error", "Script installation was started not from the beginning. Return to homepage to start the script installation: <br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>" );

    if( !$_POST['reg_username'] OR !$_POST['reg_email'] OR !$_POST['reg_password1'] OR $_POST['reg_password1'] != $_POST['reg_password2'] ){
		msgbox("error", "Error!!!" ,"Fill in the required fields!", "history.go(-1)");
	}

	if (preg_match("/[\||\'|\<|\>|\[|\]|\"|\!|\?|\$|\@|\#|\/|\\\|\&\~\*\{\+]/", $_POST['reg_username'])) {
		msgbox("error", "Error!!!" ,"The entered Administrator name is unacceptable for the registration!", "history.go(-1)");
	}

	$reg_password = password_hash($_POST['reg_password1'], PASSWORD_DEFAULT);
	
	if( !$reg_password ) {
		msgbox("error", "PHP extension Crypt must be loaded for password_hash to function", "history.go(-1)");
	}

	$reg_username = $_POST['reg_username'];

	$not_allow_symbol = array ("\x22", "\x60", "\t", '\n', '\r', "\n", "\r", '\\', ",", "/", "¬", "#", ";", ":", "~", "[", "]", "{", "}", ")", "(", "*", "^", "%", "$", "<", ">", "?", "!", '"', "'", " ", "&" );
	$reg_email = trim( str_replace( $not_allow_symbol, '', strip_tags( stripslashes( $_POST['reg_email'] ) ) ) );

	$timezone = date_default_timezone_get();
	
	$timezones = array('Pacific/Midway','US/Samoa','US/Hawaii','US/Alaska','US/Pacific','America/Tijuana','US/Arizona','US/Mountain','America/Chihuahua','America/Mazatlan','America/Mexico_City','America/Monterrey','US/Central','US/Eastern','US/East-Indiana','America/Lima','America/Caracas','Canada/Atlantic','America/La_Paz','America/Santiago','Canada/Newfoundland','America/Buenos_Aires','America/Godthab','Atlantic/Stanley','Atlantic/Azores','Africa/Casablanca','Europe/Dublin','Europe/Lisbon','Europe/London','Europe/Amsterdam','Europe/Belgrade','Europe/Berlin','Europe/Bratislava','Europe/Brussels','Europe/Budapest','Europe/Copenhagen','Europe/Madrid','Europe/Paris','Europe/Prague','Europe/Rome','Europe/Sarajevo','Europe/Stockholm','Europe/Vienna','Europe/Warsaw','Europe/Zagreb','Europe/Athens','Europe/Bucharest','Europe/Helsinki','Europe/Istanbul','Asia/Jerusalem','Europe/Kiev','Europe/Minsk','Europe/Riga','Europe/Sofia','Europe/Tallinn','Europe/Vilnius','Asia/Baghdad','Asia/Kuwait','Africa/Nairobi','Asia/Tehran','Europe/Kaliningrad','Europe/Moscow','Europe/Volgograd','Europe/Samara','Asia/Baku','Asia/Muscat','Asia/Tbilisi','Asia/Yerevan','Asia/Kabul','Asia/Yekaterinburg','Asia/Tashkent','Asia/Kolkata','Asia/Kathmandu','Asia/Almaty','Asia/Novosibirsk','Asia/Jakarta','Asia/Krasnoyarsk','Asia/Hong_Kong','Asia/Kuala_Lumpur','Asia/Singapore','Asia/Taipei','Asia/Ulaanbaatar','Asia/Urumqi','Asia/Irkutsk','Asia/Seoul','Asia/Tokyo','Australia/Adelaide','Australia/Darwin','Asia/Yakutsk','Australia/Brisbane','Pacific/Port_Moresby','Australia/Sydney','Asia/Vladivostok','Asia/Sakhalin','Asia/Magadan','Pacific/Auckland','Pacific/Fiji');

	if ( !in_array($timezone, $timezones) ) {
		$timezone = "Europe/Moscow";
		date_default_timezone_set ( $timezone );
	}
	
	$dbhost = str_replace ('"', '\"', str_replace ("$", "\\$", $_POST['dbhost']) );
	$dbname = str_replace ('"', '\"', str_replace ("$", "\\$", $_POST['dbname']) );
	$dbuser = str_replace ('"', '\"', str_replace ("$", "\\$", $_POST['dbuser']) );
	$dbpasswd = str_replace ('"', '\"', str_replace ("$", "\\$", $_POST['dbpasswd']) );
	$dbprefix = str_replace ('"', '\"', str_replace ("$", "\\$", $_POST['dbprefix']) );
	$auth_key = generate_auth_key();
	
	define ("PREFIX", $dbprefix);
	define ("COLLATE", "utf8mb4");

	include ENGINE_DIR.'/classes/mysql.php';
	
	$check_db = new db;
	
	if ( !$check_db->connect($dbuser, $dbpasswd, $dbname, $dbhost, false) ) {
		msgbox("error", "Error!!!" ,"Unable to connect to MySQL server. Enter the correct access data for connecting to MySQL database. You have error:<br><br>".$check_db->query_errors_list[0]['error'], "history.go(-1)");
	}
	
	if( version_compare($check_db->mysql_version, '5.5.3', '<') ) {
		msgbox("error", "Error!!!" ,"On your server the MySQL version is <b>{$check_db->mysql_version}</b>, to install the script you need MySQL version 5.5.3 or greater", "history.go(-1)");
	}
	
	if( version_compare($check_db->mysql_version, '5.6.4', '<') ) {
		$storage_engine = "MyISAM";
	} else $storage_engine = "InnoDB";


	unset($check_db);
$config = <<<HTML
<?PHP

//System Configurations

\$config = array (

'version_id' => "13.3",

'home_title' => "DataLife Engine",

'http_home_url' => "{$url}",

'charset' => "utf-8",

'admin_mail' => "{$reg_email}",

'description' => "Demo page of DataLife Engine",

'keywords' => "DataLife, Engine, CMS, PHP engine",

'date_adjust' => "{$timezone}",

'site_offline' => "0",

'allow_alt_url' => "1",

'langs' => "English",

'skin' => "Default",

'allow_gzip' => "0",

'allow_admin_wysiwyg' => "1",

'allow_static_wysiwyg' => "1",

'news_number' => "10",

'smilies' => "bowtie,smile,laughing,blush,smiley,relaxed,smirk,heart_eyes,kissing_heart,kissing_closed_eyes,flushed,relieved,satisfied,grin,wink,stuck_out_tongue_winking_eye,stuck_out_tongue_closed_eyes,grinning,kissing,stuck_out_tongue,sleeping,worried,frowning,anguished,open_mouth,grimacing,confused,hushed,expressionless,unamused,sweat_smile,sweat,disappointed_relieved,weary,pensive,disappointed,confounded,fearful,cold_sweat,persevere,cry,sob,joy,astonished,scream,tired_face,angry,rage,triumph,sleepy,yum,mask,sunglasses,dizzy_face,imp,smiling_imp,neutral_face,no_mouth,innocent",

'timestamp_active' => "j-m-Y, H:i",

'news_sort' => "date",

'news_msort' => "DESC",

'hide_full_link' => "0",

'allow_site_wysiwyg' => "1",

'allow_comments' => "1",

'comm_nummers' => "30",

'comm_msort' => "ASC",

'flood_time' => "30",

'auto_wrap' => "80",

'timestamp_comment' => "j F Y H:i",

'allow_comments_wysiwyg' => "1",

'allow_registration' => "1",

'allow_cache' => "0",

'allow_votes' => "1",

'allow_topnews' => "1",

'allow_read_count' => "1",

'allow_calendar' => "1",

'allow_archives' => "1",

'files_allow' => "1",

'files_count' => "1",

'reg_group' => "4",

'registration_type' => "0",

'allow_sec_code' => "1",

'allow_skin_change' => "1",

'max_users' => "0",

'max_users_day' => "0",

'max_up_size' => "200",

'max_image_days' => "2",

'allow_watermark' => "1",

'max_watermark' => "150",

'max_image' => "200",

'jpeg_quality' => "85",

'files_antileech' => "1",

'allow_banner' => "1",

'log_hash' => "0",

'show_sub_cats' => "1",

'tag_img_width' => "0",

'mail_metod' => "php",

'smtp_host' => "localhost",

'smtp_port' => "25",

'smtp_user' => "",

'smtp_pass' => "",

'mail_bcc' => "0",

'speedbar' => "1",

'extra_login' => "0",

'image_align' => "center",

'ip_control' => "1",

'cache_count' => "0",

'related_news' => "1",

'no_date' => "1",

'mail_news' => "1",

'mail_comments' => "1",

'admin_path' => "admin.php",

'rss_informer' => "1",

'allow_cmod' => "0",

'max_up_side' => "0",

'files_force' => "1",

'short_rating' => "1",

'full_search' => "0",

'allow_multi_category' => "1",

'short_title' => "Website Demo",

'allow_rss' => "1",

'rss_mtype' => "0",

'rss_number' => "10",

'rss_format' => "1",

'comments_maxlen' => "3000",

'offline_reason' => "The website is currently on the reconstruction. After the completion of all works the website will be opened.<br /><br />We apologize for any inconvenience.",

'catalog_sort' => "date",

'catalog_msort' => "DESC",

'related_number' => "5",

'seo_type' => "2",

'max_moderation' => "0",

'allow_quick_wysiwyg' => "1",

'sec_addnews' => "2",

'mail_pm' => "1",

'allow_change_sort' => "1",

'registration_rules' => "1",

'allow_tags' => "1",

'allow_add_tags' => "1",

'allow_fixed' => "1",

'max_file_count' => "0",

'allow_smartphone' => "0",

'allow_smart_images' => "0",

'allow_smart_video' => "0",

'allow_search_print' => "1",

'allow_search_link' => "1",

'allow_smart_format' => "1",

'thumb_dimming' => "0",

'thumb_gallery' => "1",

'max_comments_days' => "0",

'allow_combine' => "1",

'allow_subscribe' => "1",

'parse_links' => "0",

't_seite' => "0",

'comments_minlen' => "10",

'js_min' => "0",

'outlinetype' => "0",

'fast_search' => "1",

'login_log' => "5",

'allow_recaptcha' => "0",

'recaptcha_public_key' => "",

'recaptcha_private_key' => "",

'search_number' => "10",

'news_navigation' => "1",

'smtp_mail' => "",

'seo_control' => "0",

'news_restricted' => "0",

'comments_restricted' => "0",

'auth_metod' => "0",

'comments_ajax' => "0",

'create_catalog' => "0",

'mobile_news' => "10",

'reg_question' => "0",

'news_future' => "0",

'cache_type' => "0",

'memcache_server' => "localhost:11211",

'allow_comments_cache' => "1",

'reg_multi_ip' => "1",

'top_number' => "10",

'tags_number' => "40",

'mail_title' => "",

'o_seite' => "0",

'online_status' => "1",

'avatar_size' => "100",

'allow_share' => "1",

'auth_domain' => "0",

'start_site' => "1",

'clear_cache' => "0",

'allow_complaint_mail' => "0",

'spam_api_key' => "",

'create_metatags' => '1',

'admin_allowed_ip' => '',

'related_only_cats' => '0',

'allow_links' => '1',

'comments_lazyload' => '0',

'category_separator' => '/',

'speedbar_separator' => '&raquo;',

'adminlog_maxdays' => '30',

'allow_social' => '0',

'medium_image' => '450',

'login_ban_timeout' => '20',

'watermark_seite' => '4',

'auth_only_social' => '0',

'rating_type' => '0',

'allow_comments_rating' => '1',

'comments_rating_type' => '1',

'tree_comments' => '0',

'tree_comments_level' => '5',

'simple_reply' => '0',

'recaptcha_theme' => "light",

'smtp_secure' => '',

'search_pages' => '5',

'profile_news' => '1',

'fullcache_days' => '30',

'twofactor_auth' => '1',

'category_newscount' => '1',

'max_cache_pages' => '10',

'only_ssl' => '0',

'bbimages_in_wysiwyg' => '0',

'allow_redirects' => '1',

'allow_own_meta' => '1',

'own_404' => '0',

'own_ip' => '',

'disable_frame' => '0',

'allow_plugins' => '1',

'allow_admin_social' => '0',

'image_lazy' => '0',

'search_length_min' => '4',

'min_up_side' => '10x10',

'jquery_version' => '0',

'key' => '',

);

?>
HTML;

$dbconfig = <<<HTML
<?PHP

define ("DBHOST", "{$dbhost}");

define ("DBNAME", "{$dbname}");

define ("DBUSER", "{$dbuser}");

define ("DBPASS", "{$dbpasswd}");

define ("PREFIX", "{$dbprefix}");

define ("USERPREFIX", "{$dbprefix}");

define ("COLLATE", "utf8mb4");

define('SECURE_AUTH_KEY', '{$auth_key}');

\$db = new db;

?>
HTML;


$video_config = <<<HTML
<?PHP

//Videoplayers Configurations

\$video_config = array (

'width' => "560",

'audio_width' => "560",

'preload' => '1',

'theme' => 'default',

);

?>
HTML;


$social_config = <<<HTML
<?PHP

//Social Configurations

\$social_config = array (

'vk' => '0',

'vkid' => '',

'vksecret' => '',

'od' => '0',

'odid' => '',

'odpublic' => '',

'odsecret' => '',

'fc' => '0',

'fcid' => '',

'fcsecret' => '',

'google' => '0',

'googleid' => '',

'googlesecret' => '',

'mailru' => '0',

'mailruid' => '',

'mailrusecret' => '',

'yandex' => '0',

'yandexid' => '',

'yandexsecret' => '',

);

?>
HTML;

$con_file = fopen("engine/data/config.php", "w+") or die("Sorry! Unable to create <b>.engine/data/config.php</b>.<br />Check the CHMOD!");
fwrite($con_file, $config);
fclose($con_file);
@chmod("engine/data/config.php", 0666);

$con_file = fopen("engine/data/dbconfig.php", "w+") or die("Sorry! Unable to create <b>.engine/data/dbconfig.php</b>.<br />Check the CHMOD!");
fwrite($con_file, $dbconfig);
fclose($con_file);
@chmod("engine/data/dbconfig.php", 0666);

$con_file = fopen("engine/data/videoconfig.php", "w+") or die("Sorry! Unable to create <b>.engine/data/videoconfig.php</b>.<br />Check the CHMOD!");
fwrite($con_file, $video_config);
fclose($con_file);
@chmod("engine/data/videoconfig.php", 0666);

$con_file = fopen("engine/data/socialconfig.php", "w+") or die("Sorry! Unable to create <b>.engine/data/socialconfig.php</b>.<br />Check the CHMOD!");
fwrite($con_file, $social_config);
fclose($con_file);
@chmod("engine/data/socialconfig.php", 0666);

$con_file = fopen("engine/data/wordfilter.db.php", "w+") or die("Sorry! Unable to create <b>.engine/data/wordfilter.db.php</b>.<br />Check the CHMOD!");
fwrite($con_file, '');
fclose($con_file);
@chmod("engine/data/wordfilter.db.php", 0666);

$con_file = fopen("engine/data/xfields.txt", "w+") or die("Sorry! Unable to create <b>.engine/data/xfields.txt</b>.<br />Check the CHMOD!");
fwrite($con_file, '');
fclose($con_file);
@chmod("engine/data/xfields.txt", 0666);

$con_file = fopen("engine/data/xprofile.txt", "w+") or die("Sorry! Unable to create <b>.engine/data/xprofile.txt</b>.<br />Check the CHMOD!");
fwrite($con_file, '');
fclose($con_file);
@chmod("engine/data/xprofile.txt", 0666);

@unlink(ENGINE_DIR.'/cache/system/usergroup.php');
@unlink(ENGINE_DIR.'/cache/system/vote.php');
@unlink(ENGINE_DIR.'/cache/system/banners.php');
@unlink(ENGINE_DIR.'/cache/system/category.php');
@unlink(ENGINE_DIR.'/cache/system/banned.php');
@unlink(ENGINE_DIR.'/cache/system/cron.php');
@unlink(ENGINE_DIR.'/cache/system/informers.php');
@unlink(ENGINE_DIR.'/cache/system/plugins.php');
@unlink(ENGINE_DIR.'/data/snap.db');

listdir( ENGINE_DIR . '/cache/system/CSS' );
listdir( ENGINE_DIR . '/cache/system/HTML' );
listdir( ENGINE_DIR . '/cache/system/URI' );
listdir( ENGINE_DIR . '/cache/system/plugins' );

$fdir = opendir( ENGINE_DIR . '/cache' );
		
while ( $file = readdir( $fdir ) ) {
	if( $file != '.htaccess' AND !is_dir($file) ) {
		@unlink( ENGINE_DIR . '/cache/' . $file );
	}
}

include ENGINE_DIR.'/data/dbconfig.php';

$reg_username = $db->safesql( $reg_username );
$reg_password = $db->safesql( $reg_password );

$tableSchema = array();

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_category";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_category (
  `id` mediumint(8) NOT NULL auto_increment,
  `parentid` mediumint(8) NOT NULL default '0',
  `posi` mediumint(8) NOT NULL default '1',
  `name` varchar(50) NOT NULL default '',
  `alt_name` varchar(50) NOT NULL default '',
  `icon` varchar(200) NOT NULL default '',
  `skin` varchar(50) NOT NULL default '',
  `descr` varchar(300) NOT NULL default '',
  `keywords` text NOT NULL,
  `news_sort` varchar(10) NOT NULL default '',
  `news_msort` varchar(4) NOT NULL default '',
  `news_number` smallint(5) NOT NULL default '0',
  `short_tpl` varchar(40) NOT NULL default '',
  `full_tpl` varchar(40) NOT NULL default '',
  `metatitle` varchar(255) NOT NULL default '',
  `show_sub` tinyint(1) NOT NULL default '0',
  `allow_rss` tinyint(1) NOT NULL default '1',
  `fulldescr` text NOT NULL,
  `disable_search` tinyint(1) NOT NULL default '0',
  `disable_main` tinyint(1) NOT NULL default '0',
  `disable_rating` tinyint(1) NOT NULL default '0',
  `disable_comments` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
  ) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_comments";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_comments (
  `id` int(10) unsigned NOT NULL auto_increment,
  `post_id` int(11) NOT NULL default '0',
  `user_id` int(11) NOT NULL default '0',
  `date` datetime NOT NULL default '2000-01-01 00:00:00',
  `autor` varchar(40) NOT NULL default '',
  `email` varchar(40) NOT NULL default '',
  `text` text NOT NULL,
  `ip` varchar(46) NOT NULL default '',
  `is_register` tinyint(1) NOT NULL default '0',
  `approve` tinyint(1) NOT NULL default '1',
  `rating` int(11) NOT NULL default '0',
  `vote_num` int(11) NOT NULL default '0',
  `parent` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  KEY `approve` (`approve`),
  KEY `parent` (`parent`),
  KEY `rating` (`rating`),
  FULLTEXT KEY `text` (`text`)
  ) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_email";

$tableSchema[] = "CREATE TABLE " . PREFIX . "_email (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `name` varchar(10) NOT NULL default '',
  `template` text NOT NULL,
  `use_html` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
  ) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";


$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_flood";

$tableSchema[] = "CREATE TABLE  " . PREFIX . "_flood (
  `f_id` int(11) unsigned NOT NULL auto_increment,
  `ip` varchar(46) NOT NULL default '',
  `id` varchar(20) NOT NULL default '',
  `flag` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`f_id`),
  KEY `ip` (`ip`),
  KEY `id` (`id`),
  KEY `flag` (`flag`)
  ) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_images";

$tableSchema[] = "CREATE TABLE " . PREFIX . "_images (
  `id` int(10) unsigned NOT NULL auto_increment,
  `images` text NOT NULL,
  `news_id` int(10) NOT NULL default '0',
  `author` varchar(40) NOT NULL default '',
  `date` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `author` (`author`),
  KEY `news_id` (`news_id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_logs";

$tableSchema[] = "CREATE TABLE " . PREFIX . "_logs (
  `id` int(10) unsigned NOT NULL auto_increment,
  `news_id` int(10) NOT NULL default '0',
  `member` varchar(40) NOT NULL default '',
  `ip` varchar(46) NOT NULL default '',
  `rating` TINYINT(4) NOT NULL DEFAULT '0',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`),
  KEY `member` (`member`),
  KEY `ip` (`ip`)
  ) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_vote";

$tableSchema[] = "CREATE TABLE " . PREFIX . "_vote (
  `id` mediumint(8) NOT NULL auto_increment,
  `category` text NOT NULL,
  `vote_num` mediumint(8) NOT NULL default '0',
  `date` varchar(25) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `body` text NOT NULL,
  `approve` tinyint(1) NOT NULL default '1',
  `start` varchar(15) NOT NULL default '',
  `end` varchar(15) NOT NULL default '',
  `grouplevel` varchar(250) NOT NULL default 'all',
  PRIMARY KEY  (`id`),
  KEY `approve` (`approve`)
  ) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_vote_result";

$tableSchema[] = "CREATE TABLE " . PREFIX . "_vote_result (
  `id` int(10) NOT NULL auto_increment,
  `ip` varchar(46) NOT NULL default '',
  `name` varchar(40) NOT NULL default '',
  `vote_id` mediumint(8) NOT NULL default '0',
  `answer` tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `answer` (`answer`),
  KEY `vote_id` (`vote_id`),
  KEY `ip` (`ip`),
  KEY `name` (`name`)
  ) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_lostdb";

$tableSchema[] = "CREATE TABLE " . PREFIX . "_lostdb (
  `id` mediumint(8) NOT NULL auto_increment,
  `lostname` mediumint(8) NOT NULL default '0',
  `lostid` varchar( 40 ) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `lostid` (`lostid`)
  ) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_pm";

$tableSchema[] = "CREATE TABLE " . PREFIX . "_pm (
  `id` int(11) unsigned NOT NULL auto_increment,
  `subj` varchar(255) NOT NULL default '',
  `text` text NOT NULL,
  `user` MEDIUMINT(8) NOT NULL default '0',
  `user_from` varchar(40) NOT NULL default '',
  `date` int(11) unsigned NOT NULL default '0',
  `pm_read` TINYINT(1) NOT NULL default '0',
  `folder` varchar(10) NOT NULL default '',
  `reply` tinyint(1) NOT NULL default '0',
  `sendid` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `folder` (`folder`),
  KEY `user` (`user`),
  KEY `user_from` (`user_from`),
  KEY `pm_read` (`pm_read`)
  ) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_post";

$tableSchema[] = "CREATE TABLE " . PREFIX . "_post (
  `id` int(11) NOT NULL auto_increment,
  `autor` varchar(40) NOT NULL default '',
  `date` datetime NOT NULL default '2000-01-01 00:00:00',
  `short_story` MEDIUMTEXT NOT NULL,
  `full_story` MEDIUMTEXT NOT NULL,
  `xfields` MEDIUMTEXT NOT NULL,
  `title` varchar(255) NOT NULL default '',
  `descr` varchar(300) NOT NULL default '',
  `keywords` text NOT NULL,
  `category` varchar(190) NOT NULL default '0',
  `alt_name` varchar(190) NOT NULL default '',
  `comm_num` mediumint(8) unsigned NOT NULL default '0',
  `allow_comm` tinyint(1) NOT NULL default '1',
  `allow_main` tinyint(1) unsigned NOT NULL default '1',
  `approve` tinyint(1) NOT NULL default '0',
  `fixed` tinyint(1) NOT NULL default '0',
  `allow_br` tinyint(1) NOT NULL default '1',
  `symbol` varchar(3) NOT NULL default '',
  `tags` VARCHAR(255) NOT NULL default '',
  `metatitle` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `autor` (`autor`),
  KEY `alt_name` (`alt_name`),
  KEY `category` (`category`),
  KEY `approve` (`approve`),
  KEY `allow_main` (`allow_main`),
  KEY `date` (`date`),
  KEY `symbol` (`symbol`),
  KEY `comm_num` (`comm_num`),
  KEY `tags` (`tags`),
  KEY `fixed` (`fixed`),
  FULLTEXT KEY `short_story` (`short_story`,`full_story`,`xfields`,`title`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_post_extras";

$tableSchema[] = "CREATE TABLE " . PREFIX . "_post_extras (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL DEFAULT '0',
  `news_read` int(11) NOT NULL DEFAULT '0',
  `allow_rate` tinyint(1) NOT NULL DEFAULT '1',
  `rating` int(11) NOT NULL DEFAULT '0',
  `vote_num` int(11) NOT NULL DEFAULT '0',
  `votes` tinyint(1) NOT NULL DEFAULT '0',
  `view_edit` tinyint(1) NOT NULL DEFAULT '0',
  `disable_index` tinyint(1) NOT NULL DEFAULT '0',
  `related_ids` varchar(255) NOT NULL DEFAULT '',
  `access` varchar(150) NOT NULL DEFAULT '',
  `editdate` int(11) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(40) NOT NULL DEFAULT '',
  `reason` varchar(255) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `disable_search` tinyint(1) NOT NULL DEFAULT '0',
  `need_pass` tinyint(1) NOT NULL DEFAULT '0',
  `allow_rss` TINYINT(1) NOT NULL DEFAULT '1',
  `allow_rss_turbo` TINYINT(1) NOT NULL DEFAULT '1',
  `allow_rss_dzen` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`eid`),
  KEY `news_id` (`news_id`),
  KEY `user_id` (`user_id`),
  KEY `rating` (`rating`),
  KEY `disable_search` (`disable_search`),
  KEY `allow_rss` (`allow_rss`),
  KEY `news_read` (`news_read`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_post_extras_cats";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_post_extras_cats (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` INT(11) NOT NULL default '0',
  `cat_id` INT(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_static";

$tableSchema[] = "CREATE TABLE " . PREFIX . "_static (
  `id` MEDIUMINT(8) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `descr` varchar(255) NOT NULL default '',
  `template` MEDIUMTEXT NOT NULL,
  `allow_br` tinyint(1) NOT NULL default '0',
  `allow_template` tinyint(1) NOT NULL default '0',
  `grouplevel` varchar(100) NOT NULL default 'all',
  `tpl` varchar(40) NOT NULL default '',
  `metadescr` varchar(300) NOT NULL default '',
  `metakeys` text NOT NULL,
  `views` mediumint(8) NOT NULL default '0',
  `template_folder` varchar(50) NOT NULL default '',
  `date` int(11) unsigned NOT NULL default '0',
  `metatitle` varchar(255) NOT NULL default '',
  `allow_count` tinyint(1) NOT NULL default '1',
  `sitemap` tinyint(1) NOT NULL default '1',
  `disable_index` tinyint(1) NOT NULL default '0',
  `disable_search` tinyint(1) NOT NULL default '0',
  `password` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`),
  KEY `disable_search` (`disable_search`),
  FULLTEXT KEY `template` (`template`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_users";

$tableSchema[] = "CREATE TABLE " . PREFIX . "_users (
  `email` varchar(50) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  `name` varchar(40) NOT NULL default '',
  `user_id` int(11) NOT NULL auto_increment,
  `news_num` mediumint(8) NOT NULL default '0',
  `comm_num` mediumint(8) NOT NULL default '0',
  `user_group` smallint(5) NOT NULL default '4',
  `lastdate` varchar(20) NOT NULL default '',
  `reg_date` varchar(20) NOT NULL default '',
  `banned` varchar(5) NOT NULL default '',
  `allow_mail` tinyint(1) NOT NULL default '1',
  `info` text NOT NULL,
  `signature` text NOT NULL,
  `foto` varchar(255) NOT NULL default '',
  `fullname` varchar(100) NOT NULL default '',
  `land` varchar(100) NOT NULL default '',
  `favorites` text NOT NULL,
  `pm_all` smallint(5) NOT NULL default '0',
  `pm_unread` smallint(5) NOT NULL default '0',
  `time_limit` varchar(20) NOT NULL default '',
  `xfields` text NOT NULL,
  `allowed_ip` varchar(255) NOT NULL default '',
  `hash` varchar(32) NOT NULL default '',
  `logged_ip` varchar(46) NOT NULL default '',
  `restricted` tinyint(1) NOT NULL default '0',
  `restricted_days` smallint(4) NOT NULL default '0',
  `restricted_date` varchar(15) NOT NULL default '',
  `timezone` varchar(100) NOT NULL default '',
  `news_subscribe` tinyint(1) NOT NULL default '0',
  `comments_reply_subscribe` tinyint(1) NOT NULL default '0',
  `twofactor_auth` tinyint(1) NOT NULL default '0',
  `cat_add` varchar(500) NOT NULL DEFAULT '',
  `cat_allow_addnews` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_banned";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_banned (
  `id` smallint(5) NOT NULL auto_increment,
  `users_id` int(11) NOT NULL default '0',
  `descr` text NOT NULL,
  `date` varchar(15) NOT NULL default '',
  `days` smallint(4) NOT NULL default '0',
  `ip` varchar(46) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`users_id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_files";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_files (
  `id` int(11) NOT NULL auto_increment,
  `news_id` int(11) NOT NULL default '0',
  `name` varchar(250) NOT NULL default '',
  `onserver` varchar(250) NOT NULL default '',
  `author` varchar(40) NOT NULL default '',
  `date` varchar(15) NOT NULL default '',
  `dcount` int(11) NOT NULL default '0',
  `size` bigint(20) NOT NULL default '0',
  `checksum` char(32) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_usergroups";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_usergroups (
  `id` smallint(5) NOT NULL auto_increment,
  `group_name` varchar(50) NOT NULL default '',
  `allow_cats` text NOT NULL,
  `allow_adds` tinyint(1) NOT NULL default '1',
  `cat_add` text NOT NULL,
  `allow_admin` tinyint(1) NOT NULL default '0',
  `allow_addc` tinyint(1) NOT NULL default '0',
  `allow_editc` tinyint(1) NOT NULL default '0',
  `allow_delc` tinyint(1) NOT NULL default '0',
  `edit_allc` tinyint(1) NOT NULL default '0',
  `del_allc` tinyint(1) NOT NULL default '0',
  `moderation` tinyint(1) NOT NULL default '0',
  `allow_all_edit` tinyint(1) NOT NULL default '0',
  `allow_edit` tinyint(1) NOT NULL default '0',
  `allow_pm` tinyint(1) NOT NULL default '0',
  `max_pm` smallint(5) NOT NULL default '0',
  `max_foto` VARCHAR(10) NOT NULL default '',
  `allow_files` tinyint(1) NOT NULL default '0',
  `allow_hide` tinyint(1) NOT NULL default '1',
  `allow_short` tinyint(1) NOT NULL default '0',
  `time_limit` tinyint(1) NOT NULL default '0',
  `rid` smallint(5) NOT NULL default '0',
  `allow_fixed` tinyint(1) NOT NULL default '0',
  `allow_feed`  tinyint(1) NOT NULL default '1',
  `allow_search`  tinyint(1) NOT NULL default '1',
  `allow_poll`  tinyint(1) NOT NULL default '1',
  `allow_main`  tinyint(1) NOT NULL default '1',
  `captcha`  tinyint(1) NOT NULL default '0',
  `icon` varchar(200) NOT NULL default '',
  `allow_modc`  tinyint(1) NOT NULL default '0',
  `allow_rating` tinyint(1) NOT NULL default '1',
  `allow_offline` tinyint(1) NOT NULL default '0',
  `allow_image_upload` tinyint(1) NOT NULL default '0',
  `allow_file_upload` tinyint(1) NOT NULL default '0',
  `allow_signature` tinyint(1) NOT NULL default '0',
  `allow_url` tinyint(1) NOT NULL default '1',
  `news_sec_code` tinyint(1) NOT NULL default '1',
  `allow_image` tinyint(1) NOT NULL default '0',
  `max_signature` SMALLINT(6) NOT NULL default '0',
  `max_info` SMALLINT(6) NOT NULL default '0',
  `admin_addnews` tinyint(1) NOT NULL default '0',
  `admin_editnews` tinyint(1) NOT NULL default '0',
  `admin_comments` tinyint(1) NOT NULL default '0',
  `admin_categories` tinyint(1) NOT NULL default '0',
  `admin_editusers` tinyint(1) NOT NULL default '0',
  `admin_wordfilter` tinyint(1) NOT NULL default '0',
  `admin_xfields` tinyint(1) NOT NULL default '0',
  `admin_userfields` tinyint(1) NOT NULL default '0',
  `admin_static` tinyint(1) NOT NULL default '0',
  `admin_editvote` tinyint(1) NOT NULL default '0',
  `admin_newsletter` tinyint(1) NOT NULL default '0',
  `admin_blockip` tinyint(1) NOT NULL default '0',
  `admin_banners` tinyint(1) NOT NULL default '0',
  `admin_rss` tinyint(1) NOT NULL default '0',
  `admin_iptools` tinyint(1) NOT NULL default '0',
  `admin_rssinform` tinyint(1) NOT NULL default '0',
  `admin_googlemap` tinyint(1) NOT NULL default '0',
  `allow_html` tinyint(1) NOT NULL default '1',
  `group_prefix` text NOT NULL,
  `group_suffix` text NOT NULL,
  `allow_subscribe` tinyint(1) NOT NULL default '0',
  `allow_image_size` tinyint(1) NOT NULL default '0',
  `cat_allow_addnews` text NOT NULL,
  `flood_news` smallint(6) NOT NULL default '0',
  `max_day_news` smallint(6) NOT NULL default '0',
  `force_leech` tinyint(1) NOT NULL default '0',
  `edit_limit` smallint(6) NOT NULL default '0',
  `captcha_pm` tinyint(1) NOT NULL default '0',
  `max_pm_day` smallint(6) NOT NULL default '0',
  `max_mail_day` smallint(6) NOT NULL default '0',
  `admin_tagscloud` tinyint(1) NOT NULL default '0',
  `allow_vote` tinyint(1) NOT NULL default '0',
  `admin_complaint` tinyint(1) NOT NULL default '0',
  `news_question` tinyint(1) NOT NULL default '0',
  `comments_question` tinyint(1) NOT NULL default '0',
  `max_comment_day` smallint(6) NOT NULL default '0',
  `max_images` smallint(6) NOT NULL default '0',
  `max_files` smallint(6) NOT NULL default '0',
  `disable_news_captcha` smallint(6) NOT NULL default '0',
  `disable_comments_captcha` smallint(6) NOT NULL default '0',
  `pm_question` tinyint(1) NOT NULL default '0',
  `captcha_feedback` tinyint(1) NOT NULL default '1',
  `feedback_question` tinyint(1) NOT NULL default '0',
  `files_type` varchar(255) NOT NULL default '',
  `max_file_size` mediumint(9) NOT NULL default '0',
  `files_max_speed` smallint(6) NOT NULL default '0',
  `spamfilter` tinyint(1) NOT NULL default '2',
  `allow_comments_rating` tinyint(1) NOT NULL default '1',
  `max_edit_days` tinyint(1) NOT NULL default '0',
  `spampmfilter` tinyint(1) NOT NULL default '0',
  `force_reg` TINYINT(1) NOT NULL default '0',
  `force_reg_days` MEDIUMINT(9) NOT NULL default '0',
  `force_reg_group` SMALLINT(6) NOT NULL default '4',
  `force_news` TINYINT(1) NOT NULL default '0',
  `force_news_count` MEDIUMINT(9) NOT NULL default '0',
  `force_news_group` SMALLINT(6) NOT NULL default '4',
  `force_comments` TINYINT(1) NOT NULL default '0',
  `force_comments_count` MEDIUMINT(9) NOT NULL default '0',
  `force_comments_group` SMALLINT(6) NOT NULL default '4',
  `force_rating` TINYINT(1) NOT NULL default '0',
  `force_rating_count` MEDIUMINT(9) NOT NULL default '0',
  `force_rating_group` SMALLINT(6) NOT NULL default '4',
  `not_allow_cats` text NOT NULL,
  `allow_up_image` TINYINT(1) NOT NULL default '0',
  `allow_up_watermark` TINYINT(1) NOT NULL default '0',
  `allow_up_thumb` TINYINT(1) NOT NULL default '0',
  `up_count_image` SMALLINT(6) NOT NULL default '0',
  `up_image_side` varchar(20) NOT NULL default '',
  `up_image_size` MEDIUMINT(9) NOT NULL default '0',
  `up_thumb_size` varchar(20) NOT NULL default '',
  `allow_mail_files` TINYINT(1) NOT NULL DEFAULT '0',
  `max_mail_files` SMALLINT(6) NOT NULL DEFAULT '0',
  `max_mail_allfiles` MEDIUMINT(9) NOT NULL DEFAULT '0',
  `mail_files_type` VARCHAR(100) NOT NULL DEFAULT '',
  `video_comments` TINYINT(1) NOT NULL DEFAULT '0',
  `media_comments` TINYINT(1) NOT NULL DEFAULT '0',
  `min_image_side` VARCHAR(20) NOT NULL DEFAULT '',
  PRIMARY KEY  (`id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_poll";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_poll (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `news_id` int(10) unsigned NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `frage` varchar(200) NOT NULL default '',
  `body` text NOT NULL,
  `votes` mediumint(8) NOT NULL default '0',
  `multiple` tinyint(1) NOT NULL default '0',
  `answer` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_poll_log";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_poll_log (
  `id` int(10) unsigned NOT NULL auto_increment,
  `news_id` int(10) unsigned NOT NULL default '0',
  `member` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`),
  KEY `member` (`member`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_banners";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_banners (
  `id` smallint(5) NOT NULL auto_increment,
  `banner_tag` varchar(40) NOT NULL default '',
  `descr` varchar(200) NOT NULL default '',
  `code` text NOT NULL,
  `approve` tinyint(1) NOT NULL default '0',
  `short_place` tinyint(1) NOT NULL default '0',
  `bstick` tinyint(1) NOT NULL default '0',
  `main` tinyint(1) NOT NULL default '0',
  `category` VARCHAR(255) NOT NULL default '',
  `grouplevel` varchar(100) NOT NULL default 'all',
  `start` varchar(15) NOT NULL default '',
  `end` varchar(15) NOT NULL default '',
  `fpage` tinyint(1) NOT NULL default '0',
  `innews` tinyint(1) NOT NULL default '0',
  `devicelevel` varchar(10) NOT NULL default '',
  `allow_views` tinyint(1) NOT NULL default '0',
  `max_views` int(11) NOT NULL default '0',
  `allow_counts` tinyint(1) NOT NULL default '0',
  `max_counts` int(11) NOT NULL default '0',
  `views` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `rubric` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_rss";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_rss (
  `id` smallint(5) NOT NULL auto_increment,
  `url` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `allow_main` tinyint(1) NOT NULL default '0',
  `allow_rating` tinyint(1) NOT NULL default '0',
  `allow_comm` tinyint(1) NOT NULL default '0',
  `text_type` tinyint(1) NOT NULL default '0',
  `date` tinyint(1) NOT NULL default '0',
  `search` text NOT NULL,
  `max_news` tinyint(3) NOT NULL default '0',
  `cookie` text NOT NULL,
  `category` smallint(5) NOT NULL default '0',
  `lastdate` INT(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_views";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_views (
  `id` int(11) NOT NULL auto_increment,
  `news_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";


$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_rssinform";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_rssinform (
  `id` smallint(5) NOT NULL auto_increment,
  `tag` varchar(40) NOT NULL default '',
  `descr` varchar(255) NOT NULL default '',
  `category` varchar(200) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `template` varchar(40) NOT NULL default '',
  `news_max` smallint(5) NOT NULL default '0',
  `tmax` smallint(5) NOT NULL default '0',
  `dmax` smallint(5) NOT NULL default '0',
  `approve` tinyint(1) NOT NULL default '1',
  `rss_date_format` VARCHAR(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_notice";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_notice (
  `id` mediumint(8) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `notice` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_static_files";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_static_files (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `static_id` int(11) NOT NULL default '0',
  `author` varchar(40) NOT NULL default '',
  `date` varchar(15) NOT NULL default '',
  `name` varchar(200) NOT NULL default '',
  `onserver` varchar(190) NOT NULL default '',
  `dcount` int(11) NOT NULL default '0',
  `size` bigint(20) NOT NULL default '0',
  `checksum` char(32) NOT NULL default '',
  PRIMARY KEY (`id`),
  KEY `static_id` (`static_id`),
  KEY `onserver` (`onserver`),
  KEY `author` (`author`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_tags";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_tags (
  `id` INT(11) NOT NULL auto_increment,
  `news_id` INT(11) NOT NULL default '0',
  `tag` varchar(100) CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_bin NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`),
  KEY `tag` (`tag`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_post_log";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_post_log (
  `id` INT(11) NOT NULL auto_increment,
  `news_id` INT(11) NOT NULL default '0',
  `expires` varchar(15) NOT NULL default '',
  `action` tinyint(1) NOT NULL default '0',
  `move_cat` VARCHAR(190) NOT NULL DEFAULT '',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`),
  KEY `expires` (`expires`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_admin_sections";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_admin_sections (
  `id` mediumint(8) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `descr` varchar(255) NOT NULL default '',
  `icon` varchar(255) NOT NULL default '',
  `allow_groups` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_subscribe";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_subscribe (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `name` varchar(40) NOT NULL default '',
  `email`  varchar(50) NOT NULL default '',
  `news_id` int(11) NOT NULL default '0',
  `hash` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`),
  KEY `user_id` (`user_id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_sendlog";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_sendlog (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(40) NOT NULL DEFAULT '',
  `date` INT(11) unsigned NOT NULL DEFAULT '0',
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `date` (`date`),
  KEY `flag` (`flag`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_login_log";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_login_log (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(46) NOT NULL DEFAULT '',
  `count` smallint(6) NOT NULL DEFAULT '0',
  `date` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`),
  KEY `date` (`date`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_mail_log";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_mail_log (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `mail` varchar(50) NOT NULL DEFAULT '',
  `hash` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `hash` (`hash`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_complaint";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_complaint (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL DEFAULT '0',
  `c_id` int(11) NOT NULL DEFAULT '0',
  `n_id` int(11) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `from` varchar(40) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `date` int(11) unsigned NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`),
  KEY `p_id` (`p_id`),
  KEY `n_id` (`n_id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_ignore_list";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_ignore_list (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL default '0',
  `user_from` VARCHAR(40) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `user` (`user`),
  KEY `user_from` (`user_from`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_admin_logs";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_admin_logs (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `date` int(11) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(46) NOT NULL DEFAULT '',
  `action` int(11) NOT NULL DEFAULT '0',
  `extras` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `date` (`date`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_question";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_question (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL DEFAULT '',
  `answer` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_read_log";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_read_log (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`),
  KEY `ip` (`ip`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_spam_log";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_spam_log (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(46) NOT NULL DEFAULT '',
  `is_spammer` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '',
  `date` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`),
  KEY `is_spammer` (`is_spammer`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_links";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_links (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `only_one` tinyint(1) NOT NULL DEFAULT '0',
  `replacearea` tinyint(1) NOT NULL DEFAULT '1',
  `rcount` tinyint(3) NOT NULL DEFAULT '0',
  `targetblank` tinyint(1) NOT NULL DEFAULT '0',
   `title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_social_login";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_social_login (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(40) NOT NULL DEFAULT '',
  `uid` int(11) NOT NULL DEFAULT '0',
  `password` varchar(32) NOT NULL DEFAULT '',
  `provider` varchar(15) NOT NULL DEFAULT '',
  `wait` tinyint(1) NOT NULL DEFAULT '0',
  `waitlogin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_comment_rating_log";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_comment_rating_log (
  `id` int unsigned NOT NULL auto_increment,
  `c_id` int NOT NULL default '0',
  `member` varchar(40) NOT NULL default '',
  `ip` varchar(46) NOT NULL default '',
  `rating` TINYINT(4) NOT NULL DEFAULT '0',
  PRIMARY KEY  (`id`),
  KEY `c_id` (`c_id`),
  KEY `member` (`member`),
  KEY `ip` (`ip`)
  ) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_xfsearch";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_xfsearch (
  `id` INT(11) NOT NULL auto_increment,
  `news_id` INT(11) NOT NULL default '0',
  `tagname` varchar(50) NOT NULL default '',
  `tagvalue` varchar(100) CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_bin NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`),
  KEY `tagname` (`tagname`),
  KEY `tagvalue` (`tagvalue`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_comments_files";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_comments_files (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `c_id` int(10) NOT NULL default '0',
  `author` varchar(40) NOT NULL default '',
  `date` varchar(15) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`),
  KEY `author` (`author`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_twofactor";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_twofactor (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL default '0',
  `pin` varchar(10) NOT NULL default '',
  `attempt` tinyint(1) NOT NULL DEFAULT '0',
  `date` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pin` (`pin`),
  KEY `date` (`date`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_redirects";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_redirects (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(250) NOT NULL default '',
  `to` varchar(250) NOT NULL default '',
  PRIMARY KEY (`id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_post_pass";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_post_pass (
  `id` INT(11) NOT NULL auto_increment,
  `news_id` INT(11) NOT NULL default '0',
  `password` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_metatags";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_metatags (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(250) NOT NULL default '',
  `title` varchar(200) NOT NULL default '',
  `description` varchar(300) NOT NULL default '',
  `keywords` text NOT NULL,
  `page_title` varchar(255) NOT NULL default '',
  `page_description` text NOT NULL,
  `robots` VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_banners_logs";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_banners_logs (
  `id` int(11) unsigned NOT NULL auto_increment,
  `bid` int(11) NOT NULL default '0',
  `click` tinyint(1) NOT NULL default '0',
  `ip` varchar(46) NOT NULL  default '',
  PRIMARY KEY  (`id`),
  KEY `bid` (`bid`),
  KEY `ip` (`ip`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_banners_rubrics";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_banners_rubrics (
  `id` mediumint(8) NOT NULL auto_increment,
  `parentid` mediumint(8) NOT NULL default '0',
  `title` varchar(70) NOT NULL default '',
  `description` varchar(255) NOT NULL  default '',
  PRIMARY KEY  (`id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_plugins";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_plugins (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `version` varchar(10) NOT NULL DEFAULT '',
  `dleversion` varchar(10) NOT NULL DEFAULT '',
  `versioncompare` char(2) NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `mysqlinstall` text NOT NULL,
  `mysqlupgrade` text NOT NULL,
  `mysqlenable` text NOT NULL,
  `mysqldisable` text NOT NULL,
  `mysqldelete` text NOT NULL,
  `filedelete` tinyint(1) NOT NULL DEFAULT '0',
  `filelist` text NOT NULL,
  `upgradeurl` varchar(255) NOT NULL DEFAULT '',
  `needplugin` varchar(100) NOT NULL default '',
  `phpinstall` text NOT NULL,
  `phpupgrade` text NOT NULL,
  `phpenable` text NOT NULL,
  `phpdisable` text NOT NULL,
  `phpdelete` text NOT NULL,
  `notice` TEXT NOT NULL,
  `mnotice` TINYINT(1) NOT NULL DEFAULT '0',
  `posi` MEDIUMINT(8) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_plugins_files";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_plugins_files (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin_id` int(11) NOT NULL DEFAULT '0',
  `file` varchar(255) NOT NULL DEFAULT '',
  `action` varchar(10) NOT NULL DEFAULT '',
  `searchcode` text NOT NULL,
  `replacecode` mediumtext NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `searchcount` smallint(6) NOT NULL DEFAULT '0',
  `replacecount` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `plugin_id` (`plugin_id`),
  KEY `active` (`active`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_plugins_logs";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_plugins_logs (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin_id` int(11) NOT NULL DEFAULT '0',
  `area` text NOT NULL,
  `error` text NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `plugin_id` (`plugin_id`)
) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

$tableSchema[] = "INSERT INTO " . PREFIX . "_rssinform VALUES (1, 'dle', 'News from Google', '0', 'https://news.google.com/news?cf=all&hl=en&pz=1&ned=en&topic=h&num=3&output=rss', 'informer', 3, 0, 200, 1, 'j F Y H:i')";

$tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (1, 'Administrators', 'all', 1, 'all', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, 101, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, '{THEME}/images/icon_1.gif', 0, 1, 1, 1, 1, 1, 1, 0, 1,500,1000,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,1,'<b><span style=\"color:red\">','</span></b>',1,1,'all', 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'zip,rar,exe,doc,pdf,swf', 4096, 0, 2, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, '', 1, 1, 1, 3, '800x600', 300, '200x150', 1, 3, 1000, 'jpg,png,zip,pdf',1,1,'10x10')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (2, 'Chief Editors', 'all', 1, 'all', 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 50, 101, 1, 1, 1, 0, 2, 1, 1, 1, 1, 1, 0, '{THEME}/images/icon_2.gif', 0, 1, 0, 1, 1, 1, 1, 0, 1,500,1000,1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,1,'','',1,1,'all', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'zip,rar,exe,doc,pdf,swf', 4096, 0, 2, 1, 0, 0, 0, 0, 2, 0, 0, 2, 0, 0, 2, 0, 0, 2, '', 1, 1, 1, 3, '800x600', 300, '200x150', 1, 3, 1000, 'jpg,png,zip,pdf',1,1,'10x10')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (3, 'Journalists', 'all', 1, 'all', 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 50, 101, 1, 1, 1, 0, 3, 0, 1, 1, 1, 1, 0, '{THEME}/images/icon_3.gif', 0, 1, 0, 1, 1, 1, 1, 0, 1,500,1000,1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,1,'','',1,1,'all', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'zip,rar,exe,doc,pdf,swf', 4096, 0, 2, 1, 0, 0, 0, 0, 3, 0, 0, 3, 0, 0, 3, 0, 0, 3, '', 1, 1, 1, 3, '800x600', 300, '200x150', 0, 3, 1000, 'jpg,png,zip,pdf',1,1,'10x10')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (4, 'Visitors', 'all', 1, 'all', 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 20, 101, 1, 1, 1, 0, 4, 0, 1, 1, 1, 1, 0, '{THEME}/images/icon_4.gif', 0, 1, 0, 1, 0, 1, 1, 1, 0,500,1000,0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,1,'','',1,0,'all', 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'zip,rar,exe,doc,pdf,swf', 4096, 0, 2, 1, 0, 2, 0, 0, 4, 0, 0, 4, 0, 0, 4, 0, 0, 4, '', 0, 0, 0, 1, '800x600', 300, '200x150', 0, 3, 1000, 'jpg,png,zip,pdf',0,0,'10x10')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (5, 'Guests', 'all', 0, 'all', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 5, 0, 1, 1, 1, 0, 1, '{THEME}/images/icon_5.gif', 0, 1, 0, 0, 0, 0, 1, 1, 0,1,1,0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0,'','',0,0,'all', 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 2, 1, 0, 2, 0, 0, 5, 0, 0, 5, 0, 0, 5, 0, 0, 5, '', 0, 0, 0, 1, '', 0, '', 0, 3, 1000, 'jpg,png,zip,pdf',0,0,'10x10')";


$tableSchema[] = "INSERT INTO " . PREFIX . "_rss VALUES (1, 'https://dle-news.com/rss.xml', 'DataLife Engine Official Website', 1, 1, 1, 1, 1, '<div class=\"full-post-content row\">{get}</div><div class=\"full-post-footer ignore-select\">', 5, '', 1, 0)";

$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (1, 'reg_mail', '{%username%},\r\n\r\nThis letter was sent from the $url\r\n\r\nYou are receiving this email because this e-mail address was used for registration on the website. If you are not registered on this website, just ignore this email and delete it. You will not get this letter in the future.\r\n\r\n------------------------------------------------\r\nYour username and password on the website:\r\n------------------------------------------------\r\n\r\nUsername: {%username%}\r\nPassword: {%password%}\r\n\r\n------------------------------------------------\r\nActivation Instructions\r\n------------------------------------------------\r\n\r\nThank you for registering.\r\nWe require you to confirm your registration to verify that e-mail address that you have entered is real. This is required to protect against unwanted spam and abuse.\r\n\r\nTo activate your account, go to the following link:\r\n\r\n{%validationlink%}\r\n\r\nIf these actions do not work, maybe your account has been deleted. In this case, contact the administrator to resolve the problem.\r\n\r\nSincerely,\r\n\r\nAdministration $url.', 0)";
$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (2, 'feed_mail', '{%username_to%},\r\n\r\n{%username_from%} has sent this letter from $url\r\n\r\n------------------------------------------------\r\nMessage text\r\n------------------------------------------------\r\n\r\n{%text%}\r\n\r\nIP address of the sender: {%ip%}\r\nGroup: {%group%}\r\n\r\n------------------------------------------------\r\nRemember that website administration is not responsible for the content of this letter\r\n\r\nSincerely,\r\n\r\nAdministration $url', 0)";
$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (3, 'lost_mail', 'Dear {%username%},\r\n\r\nYou have requested the password recovery on $url However, passwords are stored in encrypted form for security, so we can not tell you your old password. If you want generate a new password, go to the following link: \r\n\r\n{%lostlink%}\r\n\r\nIf you did not make a request for a password recovery, then simply delete this email. Your password in a safe place and is inaccessible to unauthorized persons.\r\n\r\nIP address of sender: {%ip%}\r\n\r\nSincerely,\r\n\r\nAdministration $url', 0)";
$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (4, 'new_news', 'Dear Administrator,\r\n\r\nThe article was added on $url, which is currently awaiting moderation.\r\n\r\n------------------------------------------------\r\nSummary of the article\r\n------------------------------------------------\r\n\r\nAuthor: {%username%}\r\nArticle title: {%title%}\r\nCategory: {%category%}\r\nDate: {%date%}\r\n\r\nSincerely,\r\n\r\nAdministration $url', 0)";
$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (5, 'comments', 'Dear {%username_to%},\r\n\r\nThe comment for the article that you have subscribed to was added on $url.\r\n\r\n------------------------------------------------\r\nSummary of the comment\r\n------------------------------------------------\r\n\r\nAuthor: {%username%}\r\nDate: {%date%}\r\nLink to the article: {%link%}\r\n\r\n------------------------------------------------\r\nComment text\r\n------------------------------------------------\r\n\r\n{%text%}\r\n\r\n------------------------------------------------\r\n\r\nIf you do not want to receive notifications about new comments to this article, then follow this link: {%unsubscribe%}\r\n\r\nSincerely,\r\n\r\nAdministration $url', 0)";
$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (6, 'pm', 'Dear {%username%},\r\n\r\nYou received a personal message on $url.\r\n\r\n------------------------------------------------\r\nSummary of the message\r\n------------------------------------------------\r\n\r\nSender: {%fromusername%}\r\nDate: {%date%}\r\nSubject: {%title%}\r\n\r\n------------------------------------------------\r\nMessage text\r\n------------------------------------------------\r\n\r\n{%text%}\r\n\r\nSincerely,\r\n\r\nAdministration $url', 0)";
$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (7, 'wait_mail', 'Dear {%username%},\r\n\r\nYou have requested the association of you account on $url with the social network account on {%network%}. However, for security reasons you need to confirm this action on the following link: \r\n\r\n------------------------------------------------\r\n{%link%}\r\n------------------------------------------------\r\n\r\nIf you did not make this request, then just delete this email. Your account details are stored in a secure place and are inaccessible to unauthorized persons.\r\n\r\nIP address of sender: {%ip%}\r\n\r\nSincerely,\r\n\r\nAdministration $url', 0)";
$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (8, 'newsletter', '<html>\r\n<head>\r\n<title>{%title%}</title>\r\n<meta content=\"text/html; charset={%charset%}\" http-equiv=Content-Type>\r\n<style type=\"text/css\">\r\nhtml,body{\r\n    font-family: Verdana;\r\n    word-spacing: 0.1em;\r\n    letter-spacing: 0;\r\n    line-height: 1.5em;\r\n    font-size: 11px;\r\n}\r\n\r\np {\r\n	margin:0px;\r\n	padding: 0px;\r\n}\r\n\r\na:active,\r\na:visited,\r\na:link {\r\n	color: #4b719e;\r\n	text-decoration:none;\r\n}\r\n\r\na:hover {\r\n	color: #4b719e;\r\n	text-decoration: underline;\r\n}\r\n</style>\r\n</head>\r\n<body>\r\n{%content%}\r\n</body>\r\n</html>', 0)";
$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (9, 'twofactor', '{%username%},\r\n\r\nThis letter was sent from the $url\r\n\r\nYou received this email because for your account two-factor authentication enabled. To login on a website you must enter your pin.\r\n\r\n------------------------------------------------\r\nPin:\r\n------------------------------------------------\r\n\r\n{%pin%}\r\n\r\n------------------------------------------------\r\n\r\nThe IP of the user: {%ip%}\r\n\r\nSincerely,\r\n\r\nAdministration $url', 0)";


$tableSchema[] = "INSERT INTO " . PREFIX . "_category (name, alt_name, keywords) values ('About DLE', 'about-dle', '')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_category (name, alt_name, keywords) values ('World', 'world', '')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_category (name, alt_name, keywords) values ('Economy', 'economy', '')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_category (name, alt_name, keywords) values ('Religion', 'religion', '')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_category (name, alt_name, keywords) values ('Crime', 'crime', '')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_category (name, alt_name, keywords) values ('Sport', 'sport', '')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_category (name, alt_name, keywords) values ('Culture', 'kultura', '')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_banners (banner_tag, descr, code, approve, short_place, bstick, main, category) values ('header', 'Top banner', '<div style=\"text-align:center;\"><a href=\"https://dle-news.com/\" target=\"_blank\"><img src=\"{$url}templates/Default/images/_banner_.gif\" style=\"border: none;\" alt=\"\" /></a></div>', 1, 0, 0, 0, 0)";

$add_time = time();
$thistime = date ("Y-m-d H:i:s", $add_time);

$tableSchema[] = "INSERT INTO " . PREFIX . "_static (`name`, `descr`, `template`, `allow_br`, `allow_template`, `grouplevel`, `tpl`, `metadescr`, `metakeys`, `views`, `template_folder`, `date`) VALUES ('dle-rules-page', 'General rules on the website', '<b>General rules of conduct on the website:</b><br /><br />To begin with, hundreds of people of different religions and beliefs are communicate on the website, and all of them are full-fledged visitors of our website, so if we want a community of people to function, then we need rules. We strongly recommend that you read these rules. It will take just five minutes, but it will save your and our time and will help make the website more interesting and organized.<br /><br />Firstly, you should behave respectfully to all visitors on our website. Do not insult to the participants, it is always unwanted. If you have a complaint - contact administrators or moderators (use personal messages). We considered insulting of other visitors one of the most serious violations and it is severely punished by the administration. <b>Racism, religious and political speech are strictly forbidden.</b> Thank you for your understanding and desire to make our website more polite and friendly.<br /><br /><b>The following is strictly prohibited:</b> <br /><br />- messages not related to the content of the article or to the context of the discussion<br />- insults and threats to other visitors<br />- expressions that contain profanity, degrading, inciting ethnic strife are prohibited in comments<br />- spam and advertising of any goods and services, other resources, media or events not related to the context of discussion of the article<br /><br />Let us respect each other and the site where you and other readers come to talk and express their thoughts. The Administration reserves the right to remove comments, or comment parts, if they do not meet these requirements.<br /><br />If you violate the rules you may be given a <b>warning</b>. In some cases, you may be banned <b>without warning</b>. Contact the Administrator regarding ban removal.<br /><br /><b>Insulting</b> of administrators and moderators is also punished by a <b>ban</b> - Respect other people\'s labor.<br /><br /><div style=\"text-align:center;\">{ACCEPT-DECLINE}</div>', 1, 1, 'all', '', 'General rules', 'General rules', 0, '', '{$add_time}')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_users (name, password, email, reg_date, lastdate, user_group, news_num, info, signature, favorites, xfields) values ('$reg_username', '$reg_password', '$reg_email', '$add_time', '$add_time', '1', '3', '', '', '', '')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_vote (category, vote_num, date, title, body) VALUES ('all', '0', '$thistime', 'Please, rate the engine', 'The best of news engines<br />A good engine<br />It\'s ok, but...<br />I have seen better<br />Don\'t like it at all')";

$title = "Welcome";
$short_story = "<div style=\"text-align:center;\"><img src=\"".$url."uploads/boxsmall.jpg\" alt=\"\" /></div>Welcome to the demo page of DataLife Engine. DataLife Engine is a multi-user news engine with a high functionality. First of all, the engine is designed to create news blogs and websites with a large information context. However, it has a lot of settings that allow you to use it for any purpose. The engine can be integrated into almost any existing design and it has no limatations for making new templates for it. Another key feature of DataLife Engine - is a low load on system resources. Server load will be minimal even when many users will be online, and you will not experience any problems with the information displaying. The engine is optimized for search engines. You can read about all the functional features on <a href=\"https://dle-news.com/\" target=\"_blank\">our page</a>.<br /><br />Discussion of all issues on the script is conducted <a href=\"https://forum.dle-news.ru/index.php\" target=\"_blank\">here</a>. Also, you can get prompt assistance there.";
$full_story = "";

$tableSchema[] = "INSERT INTO " . PREFIX . "_post (id, date, autor, short_story, full_story, xfields, title, keywords, category, alt_name, allow_comm, approve, allow_main, tags) values ('1', '$thistime', '$reg_username', '$short_story', '$full_story', '', '$title', '', '1', 'post1', '1', '1', '1', 'by, news')";

$title = "Script purchase and payment";
$short_story = "Dear webmaster, we would like to add something. Before asking our technical support any questions, make sure that you carefully read the documentation on script and did not find the needed answer. We reserve the right to ignore questions received by us from users using a non-commercial version of the script or users who did not pay for the license that includes the technical support service. You can purchase one of two types of DataLife Engine license of your choice:<br /><br />- <b>Basic license.</b> When you purchase this license, you also get the opportunity to receive new versions of script for free within <b>one year</b>.<br /><br />- <b>Advanced license.</b> When you purchase this license you get everything that is included in the basic license and additionally you get technical support of the script and you are allowed to remove copyrights from the user part of the website (that is visible to visitors).<br /><br /><b>Validity of the license</b> is <span style=\"color:#FF0000\">1 year</span>, during which you will receive all the new versions and updates of the script for free, and if you purchase the advanced license you\'ll get the technical support. After expiration of the license, you can extend it, or use the current version of the script without updates.<br /><br /><b>Here you can read how to purchase the script</b> <a href=\"https://dle-news.com/price.html\" target=\"_blank\">https://dle-news.com/price.html</a><br /><br />Note that one license can be used for one domain (project) and it can not be used on other websites. It is also prohibited to give your license file to others.<br /><br /><b>Sincerely,<br /><br />SoftNews Media Group</b>";

$add_time = time()-20;
$thistime = date ("Y-m-d H:i:s", $add_time);

$tableSchema[] = "INSERT INTO " . PREFIX . "_post (id, date, autor, short_story, full_story, xfields, title, keywords, category, alt_name, allow_comm, approve, allow_main, tags) values ('2', '$thistime', '$reg_username', '$short_story', '$full_story', '', '$title', '', '1', 'post2', '1', '1', '1', 'by, news')";

$title = "Technical support of the engine";
$short_story = "<b>Technical support is </b> provided by the <a href=\"https://forum.dle-news.ru/index.php\" target=\"_blank\">support forum</a> and via E-Mail. We try to answer all your questions, but due to the large number of visitors, it is not always possible. Therefore, guaranteed technical support is available only to users who have purchased the extended license. <br /><br /><b>Technical support service includes:</b><br /><br />1. Users who faced with the script for the first time and of course do not know all the nuances of its work have the priority of answering the questions. Only failures of the script itself are the responsibility of technical support. If the reason of failure is your template that doesn\'t meet the requirements of the engine, then the support you may be denied.<br /><br />2. Also you get a one-time opportunity to install the script on your server, including setting it up to full operation with current server settings (sometimes it is needed to correctly disable the User-Friendly URL, enable the specific features of Russian Apache for the correct images uploading, etc...).<br /><br />3. You receive a consultancy support on working with the structure of the script. For example, if you want to make small changes to the script for more convenient work for you, you can save time on finding the correct piece of code by just asking us. You will be given an advice where to find it and how to implement your task better. (Note that we do not write additional modules for you, but only help you to understand the structure of the script better, so always ask related questions. Questions like: \"How to make this stuff\" may be ignored by customer support)<br /><br />4. Another common problem is incorrect updating of the script. For example the server has failed during the update, where part of the new data was entered into the database and configurations, and the other part was not entered. As a result, you get a non-working script with all the consequences. In this case, you will be held manual correction of the damaged database structure.<br /><br />If you are not subscribed to additional support services, your questions can be ignored and unanswered.<br /><br /><b>Sincerely,<br /><br />SoftNews Media Group</b>";

$add_time = time()-50;
$thistime = date ("Y-m-d H:i:s", $add_time);

$tableSchema[] = "INSERT INTO " . PREFIX . "_post (id, date, autor, short_story, full_story, xfields, title, keywords, category, alt_name, allow_comm, approve, allow_main, tags) values ('3', '$thistime', '$reg_username', '$short_story', '$full_story', '', '$title', '', '1', 'post4', '1', '1', '1', '')";

$tableSchema[] = "INSERT INTO " . PREFIX . "_post_extras (news_id, user_id) values ('1', '1'), ('2', '1'), ('3', '1')";

$tableSchema[] = "INSERT INTO " . PREFIX . "_post_extras_cats (news_id, cat_id) values ('1', '1'), ('2', '1'), ('3', '1')";

$tableSchema[] = "INSERT INTO " . PREFIX . "_tags (news_id, tag) values ('1', 'software'), ('2', 'software'), ('3', 'software'), ('1', 'news'), ('2', 'news')";


      foreach($tableSchema as $table) {

        $db->query($table);

      }

  echo $skin_header;


echo <<<HTML
<div class="panel panel-default">
  <div class="panel-heading">
    Installation Complete
  </div>
  <div class="panel-body">
Congratulations, DataLife Engine has been successfully installed on your server. Now you can go to the <a href="{$url}">Homepage of your website</a> and try the features of the engine. Or you can <a href="admin.php">enter</a> the DataLife Engine control panel and change other system settings.
<br><br><span class="text-danger">Attention: when you install the engine, the database structure and administrator's account are created, and basic system settings are performed, so you need to delete <b>install.php</b> after the successful installation in order to avoid re-installation of the engine!</span><br><br>
Enjoy your work with the engine,<br><br>
SoftNews Media Group
  </div>
  <div class="panel-footer">
	<a href="{$url}" class="btn bg-teal btn-sm btn-raised position-left"><i class="fa fa-arrow-circle-o-right position-left"></i>Next</a>
  </div>
</div>
HTML;

}
else {

	if (@file_exists(ENGINE_DIR.'/data/config.php')) {

		msgbox( "", "Scirpt installation is blocked automatically", "Installed copy of DataLife Engine is detected on the server. If you want to re-install the engine, you must manually delete <b>/engine/data/config.php</b> using FTP protocol." );

		die ();
	}

$_SESSION['dle_install'] = 1;

// ********************************************************************************
// Greeting
// ********************************************************************************

  echo $skin_header;

echo <<<HTML
<form method="get" action="">
<input type="hidden" name="action" value="eula">
<div class="panel panel-default">
  <div class="panel-heading">
    DataLife Engine Installation Wizard
  </div>
	<div class="panel-body">
	Welcome to the DataLife Engine installation wizard. This wizard will help you install the script in just a few minutes. However, we strongly recommend that you to read the documentation on the work of the script, and documentation on its installation, which comes with a script.<br><br>
	<span class="text-danger">Attention: when you install the engine, the database structure and administrator's account are created, and basic system settings are performed, so you need to delete <b>install.php</b> after the successful installation in order to avoid re-installation of the engine!</span><br><br>
	Enjoy your work with the engine,<br><br>
	SoftNews Media Group
	</div>
	<div class="panel-footer">
	<button type="submit" class="btn bg-teal btn-sm btn-raised position-left"><i class="fa fa-arrow-circle-o-right position-left"></i>Start the installation</button>
	</div>
</div>
</form>
HTML;
}


echo $skin_footer;
?>