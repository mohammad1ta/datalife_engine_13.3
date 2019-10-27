<?PHP
/*
=====================================================
 DataLife Engine v13.3
-----------------------------------------------------
 Persian support site: http://datalifeengine.ir
-----------------------------------------------------
 Contact us with: info@datalifeengine.ir
-----------------------------------------------------
 Copyright (c) 2006-2019, All rights reserved.
=====================================================
*/

@error_reporting(7);
@ini_set('display_errors', true);
@ini_set('html_errors', false);

define('DATALIFEENGINE', true);
define('ROOT_DIR', '../..');
define('ENGINE_DIR', '..');

require_once ENGINE_DIR . "/data/config.php";

@header("HTTP/1.0 200 OK");
@header("HTTP/1.1 200 OK");
@header("Cache-Control: no-cache, must-revalidate, max-age=0");
@header("Expires: 0");
@header("Pragma: no-cache");
@header("Content-type: text/css; charset=" . $config['charset']);

$idsea = $_REQUEST['idsea'];

function StrToNum($Str, $Check, $Magic){
	$Int32Unit = 4294967296;  // 2^32

	$length = strlen($Str);
	for ($i = 0; $i < $length; $i++) {
		$Check *= $Magic;
		//If the float is beyond the boundaries of integer (usually +/- 2.15e+9 = 2^31),
		//  the result of converting to integer is undefined
		//  refer to http://www.php.net/manual/en/language.types.integer.php
		if ($Check >= $Int32Unit) {
			$Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
			//if the check less than -2^31
			$Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
		}
		$Check += ord($Str{$i});
	}
	return $Check;
}

/*
 * Genearate a hash for a url
 */
function HashURL($String){
	$Check1 = StrToNum($String, 0x1505, 0x21);
	$Check2 = StrToNum($String, 0, 0x1003F);

	$Check1 >>= 2;
	$Check1 = (($Check1 >> 4) & 0x3FFFFC0 ) | ($Check1 & 0x3F);
	$Check1 = (($Check1 >> 4) & 0x3FFC00 ) | ($Check1 & 0x3FF);
	$Check1 = (($Check1 >> 4) & 0x3C000 ) | ($Check1 & 0x3FFF);

	$T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) <<2 ) | ($Check2 & 0xF0F );
	$T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000 );

	return ($T1 | $T2);
}

/*
 * genearate a checksum for the hash string
 */
function CheckHash($Hashnum){
	$CheckByte = 0;
	$Flag = 0;

	$HashStr = sprintf('%u', $Hashnum) ;
	$length = strlen($HashStr);

	for ($i = $length - 1;  $i >= 0;  $i --) {
		$Re = $HashStr{$i};
		if (1 === ($Flag % 2)) {
			$Re += $Re;
			$Re = (int)($Re / 10) + ($Re % 10);
		}
		$CheckByte += $Re;
		$Flag ++;
	}

	$CheckByte %= 10;
	if (0 !== $CheckByte) {
		$CheckByte = 10 - $CheckByte;
		if (1 === ($Flag % 2) ) {
			if (1 === ($CheckByte % 2)) {
				$CheckByte += 9;
			}
			$CheckByte >>= 1;
		}
	}

	return '7'.$CheckByte.$HashStr;
}

function getpagerank($url) {

	echo '<img src="http://www.getranking.info/primage.php?url='.$url.'" border="0" />';

}

getpagerank($idsea);

?>
