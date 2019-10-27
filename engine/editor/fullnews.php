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
 File: fullnews.php
-----------------------------------------------------
 Use: WYSIWYG for adminpanel
=====================================================
*/

if( !defined( 'DATALIFEENGINE' ) ) {
	header( "HTTP/1.1 403 Forbidden" );
	header ( 'Location: ../../' );
	die( "Hacking attempt!" );
}

if ($mod != "editnews") {
$row['id'] = "";
$row['autor'] = $member_id['name'];
}

if (!isset ($row['full_story'])) $row['full_story'] = "";

echo <<<HTML
<div class="editor-panel"><textarea id="full_story" name="full_story" class="wysiwygeditor" style="width:98%;height:300px;">{$row['full_story']}</textarea></div>
HTML;

?>