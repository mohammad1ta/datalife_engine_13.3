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

if(!defined('DATALIFEENGINE')){
	die("Hacking attempt!");
}

$obmen_links = get_vars ( "obmen" );
if (! is_array ( $obmen_links )) {
	$obmen_links = array ();

	$db->query ( "SELECT * FROM " . PREFIX . "_obmen ORDER BY posit ASC" );
	while ( $row = $db->get_row () ) {

		$obmen_links[$row['id']] = array ();

		foreach ( $row as $key => $value ) {
			$obmen_links[$row['id']][$key] = stripslashes ( $value );
		}

	}
	set_vars ( "obmen", $obmen_links );
	$db->free ();
}

foreach($obmen_links as $obmen_link) {
	$style = "";
	if ($obmen_link['color'] != '') $style .= "color:#" . $obmen_link['color'] . ";";
	if ($obmen_link['bold'] == '1') $style .= "font-weight:bold";

	$link = $obmen_link['link'];
	$target = $obmen_link['target'];
	$description = $obmen_link['description'];
	$title = $obmen_link['title'];

	$fincompile .= "<li><a href='{$link}' title='{$description}' target='{$target}' style='{$style}'>{$title}</a></li>";
}

$tpl->clear();

$obmen = $fincompile;

if ($obmen != "") {
	$obmen_config = unserialize( @file_get_contents( ENGINE_DIR . "/data/obmen.php" ));

	if ($obmen_config['showchecked']['3'] == '1') $obmen = '<marquee onmouseover="this.stop()" onmouseout="this.start()" direction="up" scrollAmount="1" style="height:130px" scrolldelay="20">' . $obmen . '</marquee>';
	if ($obmen_config['showchecked']['2'] == '1' && $obmen_config['text']['2'] != '') $obmen .= "\n<div align=\"justify\" dir=\"rtl\">{$obmen_config['text']['2']}</div>";
	if ($obmen_config['showchecked']['1'] == '1' && $obmen_config['text']['1'] != '') $obmen = "<div align=\"justify\" dir=\"rtl\">{$obmen_config['text']['1']}</div>\n" . $obmen;
}

echo $obmen;

?>
