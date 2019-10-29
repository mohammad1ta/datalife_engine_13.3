<?php
/*
=====================================================
 DataLife Engine v13.3
-----------------------------------------------------
 Persian support site: http://datalifeengine.ir
-----------------------------------------------------
 Contact us with: info@datalifeengine.ir
=====================================================
 Copyright (c) 2006-2019, All rights reserved.s
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

require_once(ROOT_DIR.'/language/Farsi/adminpanel.lng');
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
	<title>DataLife Engine - نصب سیستم</title>
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
		<a class="navbar-brand" href="#">نصب دیتالایف انجین فارسی</a>
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
	<button type="submit" {$back} class="btn bg-teal btn-sm btn-raised position-right">بازگشت<i class="fa fa-arrow-circle-o-left position-right"></i></button>
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

	if ( !$_SESSION['dle_install'] ) msgbox( "", "خطا", "به صفحه اصلی نصب سیستم بازگردید و مراحل نصب را از اول طی کنید.<br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>" );

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
		DLEalert( 'می بایستی قبل از نصب هشدارنامه را بپذیرید.', 'خطا' );
		return false;
	}
};
document.getElementById( 'check-eula' ).onsubmit = check_eula;
</script>
<div class="panel panel-default">
  <div class="panel-heading">
    هشدارها
  </div>
	<div class="panel-body">
		لطفا قبل از نصب هشدارهای زیر را مطالعه نمایید.<br /><br />
		<div style="height: 300px; border: 1px solid #76774C; background-color: #FDFDD3; padding: 5px; overflow: auto;"><b>
		کاربر گرامی!<br><br>بعد از نصب سیستم حتما فایل <span style="color:red">install.php</span> و پوشه ی <span style="color:red">upgrade</span> را از روی سیستم خود حذف نمایید.<br><br>
		این سیستم توسط مدیران پشتیبان فارسی دیتالایف انجین در ایران ترجمه، شمسی سازی و منتشر شده است. لذا کوچک ترین حمایت شما از ما رعایت حق کپی رایت است.<br><br>
		این نسخه ورژن 13.3 سیستم مدیریت محتوای دیتالایف انجین می باشد.<br><br>
		برای دریافت اطلاعات بیشتر به سایت پشتیبانی فارسی به آدرس <a href="http://datalifeengine.ir" target="_blank">DatalifeEngine.ir</a> مراجعه نمایید.<br><br>
		در همه حال آماده ی دریافت پیشنهادات و انتقادات شما کاربران گرامی هستیم.<br><br>
		با تقدیم احترام<br><br>
		از طرف تیم مدیریتی دیتالایف انجین فارسی
		</div>
		<br /><br /><input type="checkbox" name="eula" id="eula" class="icheck"> <label for="eula"> می پذیرم</label>
	</div>
	<div class="panel-footer">
	<button type="submit" class="btn bg-teal btn-sm btn-raised position-right">مرحله بعد<i class="fa fa-arrow-circle-o-left position-right"></i></button>
	</div>
</div>
</form>
HTML;

} elseif($_REQUEST['action'] == "function_check") {

	if ( !$_SESSION['dle_install'] ) msg( "", "خطا", "به صفحه اصلی نصب سیستم بازگردید و مراحل نصب را از اول طی کنید.<br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>" );

  echo $skin_header;

echo <<<HTML
<form method="get" action="">
<input type=hidden name="action" value="chmod_check">
<div class="panel panel-default">
  <div class="panel-heading">
    بررسی تنظیمات سرور
  </div>
  <div class="table-responsive">
<table class="table table-striped table-xs">
<thead>
<tr>
<th width="250">نوع نیازمندی</th>
<th colspan="2">مقدار</th>
</tr>
</thead>
HTML;

	$errors=false;
	
	if( version_compare(phpversion(), '5.4', '<') ) {
		$status = '<span class="text-danger"><b>خیر</b></span>';
		$errors=true;
	} else {
		$status = '<span class="text-success"><b>بله</b></span>';
  }

   echo "<tr>
	     <td>نسخه PHP از 5.4 به بالا</td>
         <td colspan=2>$status</td>
         </tr>";

	if( function_exists('mysqli_connect') ) {
	  $status = '<span class="text-success"><b>بله</b></span>';
	} else {
	  $status = '<span class="text-danger"><b>خیر</b></span>';
	  $errors=true;
	}

   echo "<tr>
         <td>پشتیبانی از MySQLi</td>
         <td colspan=2>$status</td>
         </tr>";


	if( function_exists('gzopen') ) {
	  $status = '<span class="text-success"><b>بله</b></span>';
	} else {
	  $status = '<span class="text-danger"><b>خیر</b></span>';
	  $errors=true;
	}

	echo "<tr>
	<td>پشتیبانی از فشرده ساز ZLib</td>
	<td colspan=2>$status</td>
	</tr>";

	if( function_exists('mb_convert_encoding') ) {
	  $status = '<span class="text-success"><b>بله</b></span>';
	} else {
	  $status = '<span class="text-danger"><b>خیر</b></span>';
	  $errors=true;
	}

	echo "<tr>
	<td>پشتیبانی از XML</td>
	<td colspan=2>$status</td>
	</tr>";

	if($errors) {
	 $button= "<button onclick=\"location.reload(true); return false;\" class=\"btn bg-danger btn-sm btn-raised position-left\"><i class=\"fa fa-refresh position-left\"></i>بررسی مجدد</button>";
	} else {
	 $button = "<button type=\"submit\" class=\"btn bg-teal btn-sm btn-raised position-left\">مرحله بعد<i class=\"fa fa-arrow-circle-o-left position-right\"></i></button>";
	}
	
echo <<<HTML
</table>
  <div class="panel-body">
	اگر مقدار هر یک از آیتم های بالا خیر بود، قبل از ادامه مراحل نصب، نسبت به تصحیح آیتم مورد نظر اقدام کنید (با مدیریت سرور تماس بگیرید).
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
    سطح دسترسی فولدرها
  </div>
  <div class="table-responsive">
<table class="table table-striped table-xs">
HTML;

echo"<thead><tr>
<th>Directory/File</th>
<th width=\"100\">CHMOD</th>
<th width=\"100\">وضعیت</td></tr></thead><tbody>";

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
				$file_status = "<span class=\"text-danger\">یافت نشد!</span>";
				$not_found_errors ++;
			}
			elseif(is_writable($file)){
				$file_status = "<span class=\"text-success\">درست</span>";
			}
			else{
				@chmod($file, 0777);
				if(is_writable($file)){
					$file_status = "<span class=\"text-success\">درست</span>";
				}else{
					@chmod("$file", 0755);
					if(is_writable($file)){
						$file_status = "<span class=\"text-success\">درست</span>";
					}else{
						$file_status = "<span class=\"text-danger\">نادرست</font>";
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

			$status_report = 'سطح دسترسی فولدرها چک شد و مشکلی نداشت. اکنون می توانید به ادامه نصب سیستم بپردازید.';

		} else {

			if($chmod_errors > 0){
				$status_report = "<font color=red>خطا!!!</font><br /><br />در چک کردن فولدرها، مشاهده شد که <b>$chmod_errors</b> امکان نوشتن در آن وجود ندارد. !<br />لطفاً سطح دسترسی به فولدرهای مشخص شده با رنگ قرمز را بر روی 777 قرار دهید.<br /><br />تصحیح این مورد قبل از ادامه روند کار <font color=red><b>به شدت</b></font> توصیه می شود.<br />";
			}

			if($not_found_errors > 0){
				$status_report .= "<span class=\"text-danger\">!!!</span><br />در چک کردن فولدرها، <b>$not_found_errors</b> فایل پیدا نشد!<br /><br />تصحیح این مورد قبل از ادامه روند کار <span class=\"text-danger\"><b>به شدت</b></span> توصیه می شود.<br />";
			}
		}


echo <<<HTML
</tbody></table>
  </div>
  <div class="panel-body">
	{$status_report}
  </div>
  <div class="panel-footer">
	<button type="submit" class="btn bg-teal btn-sm btn-raised position-right">مرحله بعد<i class="fa fa-arrow-circle-o-left position-right"></i></button>
  </div>
</div></form>
HTML;

} elseif($_REQUEST['action'] == "doconfig") {

  if ( !$_SESSION['dle_install'] ) msgbox( "", "خطا", "به صفحه اصلی نصب سیستم بازگردید و مراحل نصب را از اول طی کنید.<br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>" );

  echo $skin_header;

  echo <<<HTML
<style>
.install-tbl { border-top: 1px solid #ddd; margin-top: 15px }
.install-tbl tr { margin: 2px; }
.install-tbl td { border-bottom: 1px solid #ddd; }
.install-tbl td:first-child { border-left: 1px solid #ddd; }
.install-tbl td:nth-child( odd ) { background: #fbfbfb; }
.install-tbl td:nth-child( even ) { background: #f8f8f8; }
.table-head { background: #1177cc !important; color: #fff; border-left: 0 !important; text-align: center }
</style>
<form method="post" action="">
<input type=hidden name="action" value="doinstall">
<div class="panel panel-default">
  <div class="panel-heading">
    پیکربندی سیستم
  </div>
  <div class="panel-body">
	جهت نصب سیستم مدیریت محتوای دیتالایف انجین، فرم زیر را تکمیل نمائید. در صورت نیاز، می توانید از آموزش نصب استفاده کنید. <a href="http://www.datalifeengine.ir/tutorial-video/2918-آموزش-نصب-دیتالایف-انجین-روی-لوکال-هاست.html" target="_blank" style="color: #1177cc">ویدئو آموزش نصب</a>
<table width="100%" class="install-tbl">
HTML;

echo '<tr>
<tr><td colspan="2" style="padding: 5px;"><b>اطلاعات مربوط به پایگاه داده ها (دیتابیس)</b><td></tr>
<tr><td style="padding: 5px;" width="175">سرور MySQL:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;direction:ltr;" name="dbhost" value="localhost"></tr>
<tr><td style="padding: 5px;">نام دیتابیس:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;direction:ltr;"" name="dbname"></tr>
<tr><td style="padding: 5px;">نام‌کاربری دیتابیس:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;direction:ltr;" name="dbuser"></tr>
<tr><td style="padding: 5px;">رمز دیتابیس:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;direction:ltr;" name="dbpasswd"></tr>
<tr><td style="padding: 5px;">پیشوند جدول‌ها:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;direction:ltr;" name="dbprefix" value="dle"> <span class="text-size-small text-muted">اگر نمی‌دانید Prefix Table چه چیزی هست، نیازی به تغییر آن ندارید.</span></tr>
<tr><td colspan="2" style="padding: 5px;"><b>اطلاعات مربوط به مدیریت سایت</b><td></tr>
<tr><td style="padding: 5px;">نام‌کاربری مدیریت:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;direction:ltr;" name="reg_username" ></tr>
<tr><td style="padding: 5px;">رمز عبور:</td><td style="padding: 5px;"><input type="password" class="classic" style="width:220px;direction:ltr;" name="reg_password1"></tr>
<tr><td style="padding: 5px;">تکرار رمزعبور:</td><td style="padding: 5px;"><input type="password" class="classic" style="width:220px;direction:ltr;" name="reg_password2"></tr>
<tr><td style="padding: 5px;">آدرس ایمیل:</td><td style="padding: 5px;"><input type="text" class="classic" style="width:220px;direction:ltr;" name="reg_email"></tr>';

echo <<<HTML
</table>
  </div>
  <div class="panel-footer">
	<button type="submit" class="btn bg-teal btn-sm btn-raised position-right">نصب سیستم<i class="fa fa-arrow-circle-o-left position-right"></i></button>
  </div>
</div></form>
HTML;

}
// ********************************************************************************
// Do Install
// ********************************************************************************
elseif($_REQUEST['action'] == "doinstall")
{

	if ( !$_SESSION['dle_install'] ) msgbox( "", "خطا", "به صفحه اصلی نصب سیستم بازگردید و مراحل نصب را از اول طی کنید.<br /><br /><a href=\"http://{$_SERVER['HTTP_HOST']}/install.php\">http://{$_SERVER['HTTP_HOST']}/install.php</a>" );

	if( !$_POST['reg_username'] OR !$_POST['reg_email'] OR !$_POST['reg_password1'] OR $_POST['reg_password1'] != $_POST['reg_password2'] ){ msgbox("error", "خطا!!!" ,"تمامی فیلدهای لازم را پر نمایید!", "history.go(-1)"); }

	if (preg_match("/[\||\'|\<|\>|\[|\]|\"|\!|\?|\$|\@|\#|\/|\\\|\&\~\*\{\+]/", $_POST['reg_username']))
    {
        msgbox("error", "خطا!!!" ,"نام کاربری مدیریت معتبر نیست!", "javascript:history.go(-1)");
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
        $timezone = "Asia/Tehran";
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
        msgbox("error", "خطا!!!" ,"امکان اتصال به سرور بانک اطلاعاتی MySQL میسر نیست. لطفا اطلاعات درست جهت اتصال به دیتابیس را وارد کنید.", "history.go(-1)");
	}
	
	if( version_compare($check_db->mysql_version, '5.5.3', '<') ) {
		msgbox("error", "خطا!!!" ,"On your server the MySQL version is <b>{$check_db->mysql_version}</b>, to install the script you need MySQL version 5.5.3 or greater", "history.go(-1)");
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

'description' => "Datalife Engine Farsi",

'keywords' => "DataLife, Engine, CMS, PHP engine",

'date_adjust' => "{$timezone}",

'site_offline' => "0",

'allow_alt_url' => "1",

'langs' => "Farsi",

'skin' => "Papercut",

'allow_gzip' => "0",

'allow_admin_wysiwyg' => "1",

'allow_static_wysiwyg' => "1",

'news_number' => "10",

'smilies' => "bowtie,smile,laughing,blush,smiley,relaxed,smirk,heart_eyes,kissing_heart,kissing_closed_eyes,flushed,relieved,satisfied,grin,wink,stuck_out_tongue_winking_eye,stuck_out_tongue_closed_eyes,grinning,kissing,stuck_out_tongue,sleeping,worried,frowning,anguished,open_mouth,grimacing,confused,hushed,expressionless,unamused,sweat_smile,sweat,disappointed_relieved,weary,pensive,disappointed,confounded,fearful,cold_sweat,persevere,cry,sob,joy,astonished,scream,tired_face,angry,rage,triumph,sleepy,yum,mask,sunglasses,dizzy_face,imp,smiling_imp,neutral_face,no_mouth,innocent",

'timestamp_active' => "j F Y, H:i",

'news_sort' => "date",

'news_msort' => "DESC",

'hide_full_link' => "0",

'allow_site_wysiwyg' => "1",

'allow_comments' => "1",

'comm_nummers' => "30",

'comm_msort' => "ASC",

'flood_time' => "30",

'auto_wrap' => "80",

'timestamp_comment' => "j M Y H:i",

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

'short_title' => "دیتالایف انجین فارسی",

'allow_rss' => "1",

'rss_mtype' => "0",

'rss_number' => "10",

'rss_format' => "1",

'comments_maxlen' => "3000",

'offline_reason' => "درحال حاضر دسترسی به این وب‌سایت امکان پذیر نمی‌باشد<br /><br />لطفاً ساعاتی بعد از این وب‌سایت بازدید نمائید.",

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

		$con_file = fopen("engine/data/config.php", "w+") or die("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"><font size=2 face=tahoma>شما باید سطح دسترسی فایل <b>.engine/data/config.php</b>. را 666 بگذارید.");
		fwrite($con_file, $config);
		fclose($con_file);
		@chmod("engine/data/config.php", 0666);

		$con_file = fopen("engine/data/dbconfig.php", "w+") or die("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"><font size=2 face=tahoma>شما باید سطح دسترسی فایل <b>.engine/data/dbconfig.php</b>. را 666 بگذارید.");
		fwrite($con_file, $dbconfig);
		fclose($con_file);
		@chmod("engine/data/dbconfig.php", 0666);

		$con_file = fopen("engine/data/videoconfig.php", "w+") or die("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"><font size=2 face=tahoma>شما باید سطح دسترسی فایل <b>.engine/data/videoconfig.php</b>. را 666 بگذارید.");
		fwrite($con_file, $video_config);
		fclose($con_file);
		@chmod("engine/data/videoconfig.php", 0666);

		$con_file = fopen("engine/data/socialconfig.php", "w+") or die("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"><font size=2 face=tahoma>شما باید سطح دسترسی فایل <b>.engine/data/socialconfig.php</b>. را 666 بگذارید.");
		fwrite($con_file, $social_config);
		fclose($con_file);
		@chmod("engine/data/socialconfig.php", 0666);

		$con_file = fopen("engine/data/wordfilter.db.php", "w+") or die("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"><font size=2 face=tahoma>شما باید سطح دسترسی فایل  <b>.engine/data/wordfilter.db.php</b>. را 666 بگذارید.");
		fwrite($con_file, '');
		fclose($con_file);
		@chmod("engine/data/wordfilter.db.php", 0666);

		$con_file = fopen("engine/data/xfields.txt", "w+") or die("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"><font size=2 face=tahoma>شما باید سطح دسترسی فایل  <b>.engine/data/xfields.txt</b>. را 666 بگذارید.");
		fwrite($con_file, '');
		fclose($con_file);
		@chmod("engine/data/xfields.txt", 0666);

		$con_file = fopen("engine/data/xprofile.txt", "w+") or die("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"><font size=2 face=tahoma>شما باید سطح دسترسی فایل  <b>.engine/data/xprofile.txt</b>. را 666 بگذارید.");
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

    // DatalifeEngine.IR Added
    $tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_obmen";

    $tableSchema[] = "CREATE TABLE " . PREFIX . "_obmen (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `icq` varchar(255) NOT NULL default '',
  `mail` varchar(255) NOT NULL default '',
  `posit` smallint(5) NOT NULL default '1',
  `description` varchar(255) default NULL,
  `bold` char(1) default '',
  `color` varchar(255) default '',
  `target` varchar(255) default '',
  PRIMARY KEY  (`id`)
  ) ENGINE=" . $storage_engine . " DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci";

    $tableSchema[] = "INSERT INTO `" . PREFIX . "_obmen` VALUES (1, 'Datalife Engine Farsi', 'http://datalifeengine.ir', '', 'info@datalifeengine.ir', 0, 'Datalife Engine Farsi', '0', '', '')";
    // DatalifeEngine.IR Added

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

$tableSchema[] = "INSERT INTO " . PREFIX . "_rssinform VALUES (1, 'dle', 'اخبار سایت دیتالایف انجین فارسی', '0', 'http://www.datalifeengine.ir/rss.xml', 'informer', 3, 0, 200, 1, 'j F Y H:i')";

$tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (1, 'مدیر کل', 'all', 1, 'all', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, 101, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, '{THEME}/images/icon_1.gif', 0, 1, 1, 1, 1, 1, 1, 0, 1,500,1000,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,1,'<b><span style=\"color:red\">','</span></b>',1,1,'all', 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'zip,rar,exe,doc,pdf,swf', 4096, 0, 2, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, '', 1, 1, 1, 3, '800x600', 300, '200x150', 1, 3, 1000, 'jpg,png,zip,pdf',1,1,'10x10')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (2, 'مدیر', 'all', 1, 'all', 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 50, 101, 1, 1, 1, 0, 2, 1, 1, 1, 1, 1, 0, '{THEME}/images/icon_2.gif', 0, 1, 0, 1, 1, 1, 1, 0, 1,500,1000,1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,1,'','',1,1,'all', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'zip,rar,exe,doc,pdf,swf', 4096, 0, 2, 1, 0, 0, 0, 0, 2, 0, 0, 2, 0, 0, 2, 0, 0, 2, '', 1, 1, 1, 3, '800x600', 300, '200x150', 1, 3, 1000, 'jpg,png,zip,pdf',1,1,'10x10')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (3, 'ویرایشگر', 'all', 1, 'all', 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 50, 101, 1, 1, 1, 0, 3, 0, 1, 1, 1, 1, 0, '{THEME}/images/icon_3.gif', 0, 1, 0, 1, 1, 1, 1, 0, 1,500,1000,1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,1,'','',1,1,'all', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'zip,rar,exe,doc,pdf,swf', 4096, 0, 2, 1, 0, 0, 0, 0, 3, 0, 0, 3, 0, 0, 3, 0, 0, 3, '', 1, 1, 1, 3, '800x600', 300, '200x150', 0, 3, 1000, 'jpg,png,zip,pdf',1,1,'10x10')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (4, 'عضو سایت', 'all', 1, 'all', 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 20, 101, 1, 1, 1, 0, 4, 0, 1, 1, 1, 1, 0, '{THEME}/images/icon_4.gif', 0, 1, 0, 1, 0, 1, 1, 1, 0,500,1000,0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,1,'','',1,0,'all', 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'zip,rar,exe,doc,pdf,swf', 4096, 0, 2, 1, 0, 2, 0, 0, 4, 0, 0, 4, 0, 0, 4, 0, 0, 4, '', 0, 0, 0, 1, '800x600', 300, '200x150', 0, 3, 1000, 'jpg,png,zip,pdf',0,0,'10x10')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_usergroups VALUES (5, 'میهمان', 'all', 0, 'all', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 5, 0, 1, 1, 1, 0, 1, '{THEME}/images/icon_5.gif', 0, 1, 0, 0, 0, 0, 1, 1, 0,1,1,0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0,'','',0,0,'all', 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', 0, 0, 2, 1, 0, 2, 0, 0, 5, 0, 0, 5, 0, 0, 5, 0, 0, 5, '', 0, 0, 0, 1, '', 0, '', 0, 3, 1000, 'jpg,png,zip,pdf',0,0,'10x10')";

$tableSchema[] = "INSERT INTO " . PREFIX . "_rss VALUES (1, 'http://datalifeengine.ir/rss.xml', 'DataLife Engine Farsi', 1, 1, 1, 1, 1, '<div class=\"full-post-content row\">{get}</div><div class=\"full-post-footer ignore-select\">', 5, '', 1, 0)";

    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (1, 'reg_mail', 'با سلام خدمت شما کاربر گرامی {%username%},\r\n\r\nاز اینکه در وب سایت $url ثبت نام کرده اید، متشکریم؛ \r\n\r\n مشخصات شما در این وب سایت به شرح زیر می‌باشد:\r\n\r\nنام کاربری: {%username%}\r\nرمز عبور: {%password%}\r\n\r\n\r\nاکنون جهت تکمیل و اتمام مراحل ثبت نام در سایت، بر روی لینک زیر کلیک نمائید:\r\n\r\n{%validationlink%}', 0)";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (2, 'feed_mail', 'با سلام خدمت شما کاربر گرامی {%username_to%},\r\n\r\nایمیلی از طرف نام کاربری {%username_from%} در سایت $url  برای شما ارسال شده است.\r\n\r\nمتن پیام به شرح زیر می‌باشد:\r\n\r\n{%text%}\r\n\r\nIP ارسال کننده: {%ip%}', 0)";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (3, 'lost_mail', 'با سلام خدمت شما کاربر گرامی {%username%},\r\n\r\nبرای اکانت کاربری شما در وب سایت $url  درخواست تغییر رمزعبور داده شده است.\r\n در صورتی که این درخواست از جانب شما بوده است بر روی لینک زیر کلیک نمایید تا فرایند تغییر کلمه عبور شما تکمیل گردد؛ در غیر این صورت این ایمیل را نادیده بگیرید: \r\n\r\n{%lostlink%}\r\n\r\nIP ارسال کننده: {%ip%}', 0)";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (4, 'new_news', 'با سلام خدمت شما مدیریت محترم سایت $url \r\n\r\nمطلب جدیدی در سایت با مشخصات زیر ارسال گردید:\r\n\r\nفرستنده: {%username%}\r\nعنوان مطلب: {%title%}\r\nموضوع: {%category%}\r\nتاریخ ارسال: {%date%}', 0)";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (5, 'comments', 'با سلام خدمت شما کاربر گرامی {%username_to%},\r\n\r\nنظر جدیدی در وب سایت  $url  توسط شخصی با نام کاربری {%username%} ارسال شده است.\r\nتاریخ ارسال: {%date%}\r\nلینک خبر:  {%link%}\r\n\r\nمتن نظر به شرح زیر است:\r\n{%text%}\r\n\r\n\r\n اگر شما می‌خواهید اشتراک خود را از آگاهی نظر جدید این خبر حذف کنید، بر روی لینک زیر کلیک نمائید: \r\n{%unsubscribe%}', 0)";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (6, 'pm', 'با سلام خدمت شما کاربر گرامی {%username%},\r\n\r\nشما در وب سایت $url پیغام خصوصی جدیدی دریافت کرده اید. \r\n\r\n مشخصات این پیغام خصوصی به شرح زیر می‌باشد:\r\n\r\n فرستنده: {%fromusername%}\r\nتاریخ ارسال: {%date%}\r\nعنوان پیام: {%title%}\r\n\r\nمتن پیام به شرح زیر می‌باشد:\r\n{%text%}', 0)";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_email values (7, 'wait_mail', '{%username%} عزیز,\r\n\r\nشما در سایت $url با استفاده از شبکه اجتماعی {%network%} ثبت نام کرده اید. بخاطر مسائل امنیتی، بر روی لینک زیر کلیک کنید تا مراحل ثبت نام تکمیل شود: \r\n\r\n------------------------------------------------\r\n{%link%}\r\n------------------------------------------------\r\n\r\nتوجه، در صورتی که قبلاً در این سایت حساب کاربری ایجاد کرده باشید (بدون شبکه اجتماعی)، رمز عبور شما تغییر خواهد یافت و به صورت قبل امکان ورود ندارید و فقط با استفاده از شبکه اجتماعی قادر خواهید بود وارد سایت شوید.\r\n\r\nاگر شما این درخواست را ارسال نکرده اید، بر روی لینک بالا کلیک نکنید و این ایمیل را نادیده بگیرید.\r\n\r\nآی پی شخص درخواست کننده: {%ip%}\r\n\r\nبا تشکر،\r\n\r\nمدیریت سایت $url', 0)";

$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (8, 'newsletter', '<html>\r\n<head>\r\n<title>{%title%}</title>\r\n<meta content=\"text/html; charset={%charset%}\" http-equiv=Content-Type>\r\n<style type=\"text/css\">\r\nhtml,body{\r\n    font-family: Verdana;\r\n    word-spacing: 0.1em;\r\n    letter-spacing: 0;\r\n    line-height: 1.5em;\r\n    font-size: 11px;\r\n}\r\n\r\np {\r\n	margin:0px;\r\n	padding: 0px;\r\n}\r\n\r\na:active,\r\na:visited,\r\na:link {\r\n	color: #4b719e;\r\n	text-decoration:none;\r\n}\r\n\r\na:hover {\r\n	color: #4b719e;\r\n	text-decoration: underline;\r\n}\r\n</style>\r\n</head>\r\n<body>\r\n{%content%}\r\n</body>\r\n</html>', 0)";
$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (9, 'twofactor', '{%username%},\r\n\r\nاین ایمیل از سایت  $url ارسال شده است \r\n\r\nشما این ایمیل را دریافت کرده اید زیرا حساب شما دارای تایید ورود دو مرحله ای است. برای تأیید در سایت، شما باید کد پین خود را وارد کنید.\r\n\r\n------------------------------------------------\r\nکد پین:\r\n------------------------------------------------\r\n\r\n{%pin%}\r\n\r\n------------------------------------------------\r\nIf you are not authorized on our site, then your password is known to unauthorized persons. You need to immediately go to the site under your login and password, and change your password in your profile.\r\n\r\nآیپی ارسال کننده: {%ip%}\r\n\r\nС با تشکر,\r\n\r\nمدیریت $url', 0)";

    $tableSchema[] = "INSERT INTO " . PREFIX . "_category (name, alt_name, keywords) values ('اخبار', 'main', ''), ('فیلم', 'film', ''), ('سریال', 'serial', ''), ('موزیک', 'music', ''), ('ورزش', 'sport', '')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_banners (banner_tag, descr, code, approve, short_place, bstick, main, category) values ('header', 'Top banner', '<div align=\"center\"><a href=\"http://www.datalifeengine.ir/\" target=\"_blank\"><img src=\"{$url}templates/News/images/_banner_.gif\" style=\"border: none;\" alt=\"\" /></a></div>', 0, 0, 0, 0, 0)";

    $add_time = time();
    $thistimeold = date ("Y-m-d H:i:s", $add_time - 10);
    $thistime = date ("Y-m-d H:i:s", $add_time);

    $tableSchema[] = "INSERT INTO " . PREFIX . "_static (`name`, `descr`, `template`, `allow_br`, `allow_template`, `grouplevel`, `tpl`, `metadescr`, `metakeys`, `views`, `template_folder`, `date`) VALUES ('dle-rules-page', 'قوانین عمومی سایت', '<b>قوانین عمومی طرز رفتار در سایت</b><br /><br />برای شروع سایت، با ارتباط برقرار کردن صدها نفر از مردم از ادیان و اعتقادات مختلف، و بسیاری از میهمانان سایت، شما موظف هستید که به یک سری از قوانین سایت عمل کنید. شما را توصیه به خواندن این قوانین می کنیم که در کل بیشتر از پنج دقیقه طول نمی کشد.<br /><br />1. این وب سایت تابع قوانین جمهوری اسلامی ایران می باشد.<br />2. کپی مطلب از این وب سایت با ذکر منبع بلامانع است.<br />3. نمایش مطالب هر عضو در سایت به معنای تایید آن نیست و مسئولیت آن بر عهده خود نویسنده مطلب می باشد.<br />4. توهین به هر شخص ،  نژاد ، قوم و زبانی در این سایت ممنوع می باشد.<br />5. در حد امکان از بحث ها تفرقه انگیز بین اقوام ایرانی و طرح مطالبی که موجب ایجاد تنش بین اعضای سایت می گردد خودداری شود.<br /><br /><b>در صورتی که شخصی از قوانین سایت خارج گردد نام کاربری ایشان مسدود خواهد شد.</b><br /><div align=\"center\">{ACCEPT-DECLINE}</div>', 1, 1, 'all', '', 'قوانین عمومی', 'قوانین عمومی', 0, '', '{$add_time}')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_users (name, password, email, reg_date, lastdate, user_group, news_num, info, signature, favorites, xfields) values ('$reg_username', '$reg_password', '$reg_email', '$add_time', '$add_time', '1', '6', '', '', '', '')";
    $tableSchema[] = "INSERT INTO " . PREFIX . "_vote (category, vote_num, date, title, body) VALUES ('all', '0', '$thistime', 'نظرشما در مورد سیستم؟', 'عالی<br />خوب<br />متوسط<br />بد')";

    $tableSchema[] = "INSERT INTO " . PREFIX . "_tags (news_id, tag) values ('1', 'DLE'), ('1', 'Datalife'), ('1', 'Engine'), ('1', 'CMS'), ('1', 'Farsi'), ('1', 'DatalifeEngine.ir')";

    $tableSchema[] = "INSERT INTO `" . PREFIX . "_images` (`id`, `images`, `news_id`, `author`, `date`) VALUES (1, '2019-10/1572193752_1.jpg', 3, 'admin', '1572193725'), (2, '2019-10/1572193781_2.jpg', 2, 'admin', '1572193753'), (3, '2019-10/1572193809_3.jpg', 4, 'admin', '1572193798'), (4, '2019-10/1572368565_4.png', 5, 'admin', '1572368359'), (5, '2019-10/1572368565_5.jpg', 6, 'admin', '1572368542');";

    $tableSchema[] = "INSERT INTO `" . PREFIX . "_post` (`autor`, `date`, `short_story`, `full_story`, `xfields`, `title`, `descr`, `keywords`, `category`, `alt_name`, `comm_num`, `allow_comm`, `allow_main`, `approve`, `fixed`, `allow_br`, `symbol`, `tags`, `metatitle`) VALUES
        ('$reg_username', '$thistimeold', 'با سلام خدمت شما کاربر گرامی؛<br><br>از اینکه این سیستم را برای سایت خود در نظر گرفته اید متشکریم.<br><br>خواهشمندیم در صورت برخورد با هر اشکالی در این سیستم و یا اگر پیشنهادی در بهتر سازی آن دارید ما را توسط ایمیل زیر با خبر فرمایید.<br><br>برای دانلود قالب های فارسی و امکانات اضافی دیگر به سایت زیر مراجعه فرمایید.<br><br><br><div align=\"left\">E-Mail: <a href=\"http://datalifeengine.ir\" target=\"_blank\" rel=\"noopener external noreferrer\">info@datalifeengine.ir</a><br><br>Offical website: <a href=\"http://datalifeengine.ir\" target=\"_blank\" rel=\"noopener external noreferrer\">www.datalifeengine.ir</a><br><br>Support forum: <a href=\"http://forum.datalifeengine.ir\" target=\"_blank\" rel=\"noopener external noreferrer\">www.forum.Datalifeengine.ir</a><br><br>Free template: <a href=\"http://themes.datalifeengine.ir\" target=\"_blank\" rel=\"noopener external noreferrer\">www.themes.datalifeEngine.ir</a></div><br><div align=\"center\"><img src=\"{$url}uploads/boxsmall.jpg\" width=\"330\" height=\"448\" class=\"fr-fic fr-dii\" alt=\"\"></div><br>شاد و پیروز باشید.', '', '', 'دیتالایف انجین فارسی نسخه 13.3', 'با سلام خدمت شما کاربر گرامی؛ از اینکه این سیستم را برای سایت خود در نظر گرفته اید متشکریم. خواهشمندیم در صورت برخورد با هر اشکالی در این سیستم و یا اگر پیشنهادی در بهتر سازی آن دارید ما را توسط ایمیل زیر با خبر فرمایید. برای دانلود قالب های فارسی و امکانات اضافی دیگر به سایت زیر مراجعه فرمایید.', 'فرمایید, forum, سیستم, datalifeengine, Support, website, Offical, مراجعه, Datalifeengine, پیروز, باشید, datalifeEngine, themes, template, اضافی, فارسی, متشکریم, خواهشمندیم, گرفته, اینکه', '1', 'welcome', 0, 1, 1, 1, 0, 0, '', 'Datalife, Engine, CMS', ''),
        ('$reg_username', '$thistime', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.<br><img src=\"{$url}uploads/posts/2019-10/1572193781_2.jpg\" alt=\"\" class=\"fr-dib\"><br>', '', '', 'خبر آزمایش اول', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و', 'طراحان, شرایط, استفاده, شناخت, موجود, ایجاد, دشواری, فارسی, فرهنگ, الخصوص, خلاقی, ارائه, رایانه, پیشرو, وزمان, پیوسته, دنیای, طراحی, اساسا, سوالات', '2', 'test-1', 0, 1, 1, 1, 0, 0, '', 'تست, تست اول', ''),
        ('$reg_username', '$thistime', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.<br><img src=\"{$url}uploads/posts/2019-10/1572193752_1.jpg\" alt=\"\" class=\"fr-dib\"><br>', '', '', 'خبر آزمایشی دوم', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و', 'طراحان, شرایط, استفاده, شناخت, موجود, ایجاد, دشواری, فارسی, فرهنگ, الخصوص, خلاقی, ارائه, رایانه, پیشرو, وزمان, پیوسته, دنیای, طراحی, اساسا, سوالات', '3', 'test-2', 0, 1, 1, 1, 0, 0, '', 'تست, تست دوم', ''),
        ('$reg_username', '$thistime', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.<br><img src=\"{$url}uploads/posts/2019-10/1572193809_3.jpg\" alt=\"\" class=\"fr-dib\"><br>', '', '', 'خبر آزمایشی سوم', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و', 'طراحان, شرایط, استفاده, شناخت, موجود, ایجاد, دشواری, فارسی, فرهنگ, الخصوص, خلاقی, ارائه, رایانه, پیشرو, وزمان, پیوسته, دنیای, طراحی, اساسا, سوالات', '4', 'test-3', 0, 1, 1, 1, 0, 0, '', 'تست, تست سوم', ''),
        ('$reg_username', '$thistime', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.<br><img src=\"{$url}uploads/posts/2019-10/1572368565_4.png\" alt=\"\" class=\"fr-dib\"><br>', '', '', 'خبر آزمایشی سوم', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و', 'طراحان, شرایط, استفاده, شناخت, موجود, ایجاد, دشواری, فارسی, فرهنگ, الخصوص, خلاقی, ارائه, رایانه, پیشرو, وزمان, پیوسته, دنیای, طراحی, اساسا, سوالات', '5', 'test-4', 0, 1, 1, 1, 0, 0, '', 'تست, تست چهارم', ''),
        ('$reg_username', '$thistime', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.<br><br><img src=\"{$url}uploads/posts/2019-10/1572368565_5.jpg\" alt=\"\" class=\"fr-dib\"><br>', '', '', 'خبر آزمایشی پنجم', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و', 'طراحان, شرایط, استفاده, شناخت, موجود, ایجاد, دشواری, فارسی, فرهنگ, الخصوص, خلاقی, ارائه, رایانه, پیشرو, وزمان, پیوسته, دنیای, طراحی, اساسا, سوالات', '2', 'test-5', 0, 1, 1, 1, 0, 0, '', 'تست, تست پنجم', '');";

    $tableSchema[] = "INSERT INTO " . PREFIX . "_post_extras (news_id, user_id) values ('1', '1'), ('2', '1'), ('3', '1'), ('4', '1'), ('5', '1'), ('6', '1');";

    $tableSchema[] = "INSERT INTO `" . PREFIX . "_images` (`images`, `news_id`, `author`, `date`) VALUES ('2019-10/1572193752_1.jpg', 3, '$reg_username', '1572193725'), ('2019-10/1572193781_2.jpg', 2, '$reg_username', '1572193753'), ('2019-10/1572193809_3.jpg', 4, '$reg_username', '1572193798'), ('2019-10/1572368565_4.png', 5, '$reg_username', '1572368359'), ('2019-10/1572368565_5.jpg', 6, '$reg_username', '1572368542');";



      foreach($tableSchema as $table) {

        $db->query($table);

      }

  echo $skin_header;


echo <<<HTML
<div class="panel panel-default">
  <div class="panel-heading">
    پایان نصب
  </div>
  <div class="panel-body">
سیستم مدیریت محتوای دیتالایف انجین با موفقیت بر روی سایت شما نصب گردید.<br/> برای دیدن صفحه اصلی سایت <B><a href="index.php"><font color="#1176CC" size="2">اینجا</font></a></B> کلیک کنید و یا اگر می خواهید کنترل پنل مدیریت سایت را ببینید <B><a href="admin.php"><font color="#1176CC" size="2">اینجا</font></a></B> کلیک کنید.
<br><br><span class="text-danger">توجه: به یاد داشته باشید که فایل <b>install.php</b> را برای امنیت بیشتر سایت حذف کنید. همچنین در صورتی که نیاز به ارتقاء سیستم ندارید و بار اول هست این سیستم را نصب می کنید، فولدر <strong>/upgrade/</strong> را حذف کنید.</span><br><br>
موفق باشید.<br>
  </div>
  <div class="panel-footer">
	<a href="{$url}" class="btn bg-teal btn-sm btn-raised position-left">ورود به سایت<i class="fa fa-arrow-circle-o-left position-right"></i></a>
  </div>
</div>
HTML;

}
else {

	if (@file_exists(ENGINE_DIR.'/data/config.php')) {

			msgbox( "", "خطا در نصب سیستم", "به دلیل وجود فایل <b>engine/data/config.php/</b> شما نمی توانید دوباره این سیستم را نصب کنید. [مگر آنکه فایل مذکور را حذف کنید]" );

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
    نصب و راه اندازی سیستم دیتالایف انجین فارسی
  </div>
	<div class="panel-body">
      با سلام خدمت شما کاربر گرامی،<br><br>
      به صفحۀ نصب سیستم مدیریت محتوای فارسی دیتالایف انجین نسخه 13.3 خوش آمدید.<br><br>
	  به خاطر داشته باشید در صورتیکه حالت سئوی سیستم را غیرفعال می کنید، فایل <b>htaccess.</b> را از روی سرور حذف نموده و در مرحله پیکربندی سیستم قابلیت سئو را غیر فعال نمایید.<br><br>
	<span class="text-danger">توجه: برای امنیت بیشتر سایت، ضروریست که بعد از نصب، فایل <B>install.php</b> و پوشه ی <b>upgrade</b> را از سرور خود پاک کنید.</span><br><br>
	<font color="#555555">امیدواریم از امکانات این سیستم لذت ببرید.</font>
	</div>
	<div class="panel-footer">
	<button type="submit" class="btn bg-teal btn-sm btn-raised position-left">شروع نصب <i class="fa fa-arrow-circle-o-left position-right"></i></button>
	</div>
</div>
</form>
HTML;
}


echo $skin_footer;
?>