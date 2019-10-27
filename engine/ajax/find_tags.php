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