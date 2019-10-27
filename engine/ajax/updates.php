<?php
/*
=====================================================
 DataLife Engine v13.3
-----------------------------------------------------
 Persian support site: http://datalifeengine.ir
-----------------------------------------------------
 Contact us with: info@datalifeengine.ir
=====================================================
 Copyright (c) 2006-2019, All rights reserved.
=====================================================
 File: updates.php
-----------------------------------------------------
 Use: Check for new versions
=====================================================
*/

if(!defined('DATALIFEENGINE')) {
	header( "HTTP/1.1 403 Forbidden" );
	header ( 'Location: ../../' );
	die( "Hacking attempt!" );
}

if(($member_id['user_group'] != 1)) {die ("error");}

if( $_REQUEST['user_hash'] == "" OR $_REQUEST['user_hash'] != $dle_login_hash ) {

	echo $lang['sess_error'];
	die();

}

$_REQUEST['versionid'] = htmlspecialchars( strip_tags($_REQUEST['versionid']), ENT_QUOTES, $config['charset']);

$data = @file_get_contents("http://www.datalifeengine.ir/updatesdle.php?version_id=".$_REQUEST['versionid']);

if (!strlen($data)) echo $lang['no_update']; else echo $data;

?>