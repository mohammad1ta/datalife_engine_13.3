<?php
/*
=====================================================
 DataLife Engine - by SoftNews Media Group 
-----------------------------------------------------
 http://dle-news.ru/
-----------------------------------------------------
 Copyright (c) 2004-2019 SoftNews Media Group
=====================================================
 This code is protected by copyright
=====================================================
 File: find_tags.php
=====================================================
*/

if(!defined('DATALIFEENGINE')) {
	header( "HTTP/1.1 403 Forbidden" );
	header ( 'Location: ../../' );
	die( "Hacking attempt!" );
}

if( $_REQUEST['user_hash'] == "" OR $_REQUEST['user_hash'] != $dle_login_hash ) {
	die( "error" );
}

if( preg_match( "/[\||\<|\>|\"|\!|\?|\$|\@|\/|\\\|\&\~\*\+]/", $_GET['term'] ) ) $term = "";
else $term = $db->safesql( htmlspecialchars( strip_tags( stripslashes( trim( $_GET['term'] ) ) ), ENT_QUOTES, $config['charset'] ) );

if( $term == "" ) die("[]");

$buffer = "[]";
$tags = array ();

if($_GET['mode'] == "xfield" ) {
	
	$term = $db->safesql( htmlspecialchars( trim( $_GET['term'] ), ENT_QUOTES, $config['charset'] ) );
	$db->query("SELECT tagvalue as tag, COUNT(*) AS count FROM " . PREFIX . "_xfsearch WHERE `tagvalue` like '{$term}%' GROUP BY tagvalue ORDER by count DESC LIMIT 15");

} else {
	
	$db->query("SELECT tag, COUNT(*) AS count FROM " . PREFIX . "_tags WHERE `tag` like '{$term}%' GROUP BY tag ORDER by count DESC LIMIT 15");
	
}

while($row = $db->get_row()){
	
	$row['tag'] = str_replace("&quot;", '\"', $row['tag']);
	$row['tag'] = str_replace("&#039;", "'", $row['tag']);
	
	$tags[] = $row['tag'];

}

if (count($tags)) $buffer = "[\"".implode("\",\"",$tags)."\"]";

echo $buffer;

?>