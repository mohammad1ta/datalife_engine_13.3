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
 File: pm_alert.php
-----------------------------------------------------
 Use: Notification about personal message
=====================================================
*/

if( !defined('DATALIFEENGINE') ) {
	header( "HTTP/1.1 403 Forbidden" );
	header ( 'Location: ../../' );
	die( "Hacking attempt!" );
}

$row = $db->super_query("SELECT subj, text, user_from FROM " . USERPREFIX . "_pm WHERE user = '$member_id[user_id]' AND folder = 'inbox' ORDER BY pm_read ASC, date DESC LIMIT 0,1");

$lang['pm_alert'] = str_replace ("{user}"  , $member_id['name'], str_replace ("{num}"  , intval($member_id['pm_unread']), $lang['pm_alert']));
$row['subj'] = dle_substr(stripslashes($row['subj']),0,45, $config['charset'])." ...";

$row['text'] = preg_replace ( "#\[hide(.*?)\]#i", "", $row['text'] );
$row['text'] = str_ireplace( "[/hide]", "", $row['text']);
$row['text'] = str_replace ("<br>", " ", $row['text']);
$row['text'] = str_replace ("<br />", " ", $row['text']);
$row['text'] = str_replace ("{", "&#123;", $row['text']);
$row['text'] = dle_substr(strip_tags (stripslashes($row['text']) ),0,340, $config['charset'])." ...";


$pm_alert = <<<HTML
<div id="newpm" title="{$lang['pm_atitle']}" style="display:none;" >{$lang['pm_alert']}
<br /><br />
{$lang['pm_asub']} <b>{$row['subj']}</b><br />
{$lang['pm_from']} <b>{$row['user_from']}</b><br /><br /><i>{$row['text']}</i></div>
HTML;

$onload_scripts[] = <<<HTML
$('#newpm').dialog({
	autoOpen: true,
	show: 'fade',
	hide: 'fade',
	width: 450,
	resizable: false,
	dialogClass: "dle-popup-newpm",
	buttons: {
		"{$lang['pm_close']}" : function() { 
			$(this).dialog("close");						
		}, 
		"{$lang['pm_aread']}": function() {
			document.location='{$PHP_SELF}?do=pm';			
		}
	}
});
HTML;
?>