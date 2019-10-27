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
 File: fullsite.php
-----------------------------------------------------
 Use: WYSIWYG for website news
=====================================================
*/

if( !defined( 'DATALIFEENGINE' ) ) {
	header( "HTTP/1.1 403 Forbidden" );
	header ( 'Location: ../../' );
	die( "Hacking attempt!" );
}

$fullarea = <<<HTML
    <div class="wseditor"><textarea id="full_story" name="full_story" class="wysiwygeditor" style="width:98%;height:200px;">{$row['full_story']}</textarea></div>
HTML;

?>