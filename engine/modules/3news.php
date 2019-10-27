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

if( ! defined( 'DATALIFEENGINE' ) ) {
	die( "Hacking attempt!" );
}

$news_cache_id = $template . "_" . $from . "_" . $limit;

$news_result = dle_cache( $mod, $news_cache_id, true );

if( ! $news_result ) {

	$this_month = date( 'Y-m-d H:i:s', $_TIME );

	$tpl->load_template( $template . '.tpl' );

	if( $mod == "randnews" ) $order = "RAND()";
	if( $mod == "lastnews" ) $order = "date DESC";
	else $order = "comm_num DESC, date DESC";

	$limit = intval( $limit );
	if( ! $limit ) $limit = 10;

	$from = intval( $from );

	$db->query( "SELECT id, short_story, title, date, alt_name, category FROM " . PREFIX . "_post WHERE approve=1 AND date >= '$this_month' - INTERVAL 1 MONTH AND date < '$this_month' ORDER BY $order LIMIT $from,$limit" );

	while ( $row = $db->get_row() ) {

		$row['date'] = strtotime( $row['date'] );
		$row['category'] = intval( $row['category'] );

		if( $config['allow_alt_url'] ) {

			if( $config['seo_type'] == 1 OR $config['seo_type'] == 2 ) {

				if( $row['category'] and $config['seo_type'] == 2 ) {

					$full_link = $config['http_home_url'] . get_url( $row['category'] ) . "/" . $row['id'] . "-" . $row['alt_name'] . ".html";

				} else {

					$full_link = $config['http_home_url'] . $row['id'] . "-" . $row['alt_name'] . ".html";

				}

			} else {

				$full_link = $config['http_home_url'] . jdate( 'Y/m/d/', $row['date'] ) . $row['alt_name'] . ".html";
			}

		} else {

			$full_link = $config['http_home_url'] . "index.php?newsid=" . $row['id'];

		}

		if( dle_strlen( $row['title'], $config['charset'] ) > 55 ) $title = dle_substr( $row['title'], 0, 55, $config['charset'] ) . " ...";
		else $title = $row['title'];

		$tpl->set( '{title}', htmlspecialchars( strip_tags( stripslashes( $title ) ) ) );
		$tpl->set( '{link}', $full_link );

		$row['short_story'] = stripslashes( $row['short_story'] );

		if( $user_group[$member_id['user_group']]['allow_hide'] ) $row['short_story'] = str_ireplace( "[hide]", "", str_ireplace( "[/hide]", "", $row['short_story']) );
		else $row['short_story'] = preg_replace ( "#\[hide\](.+?)\[/hide\]#ims", "<div class=\"quote\">" . $lang['news_regus'] . "</div>", $row['short_story'] );

		if (stripos ( $tpl->copy_template, "{image-" ) !== false) {

			$images = array();
			preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $row['short_story'], $media);
			$data=preg_replace('/(img|src)("|\'|="|=\')(.*)/i',"$3",$media[0]);

			foreach($data as $url) {
				$info = pathinfo($url);
				if (isset($info['extension'])) {
					$info['extension'] = strtolower($info['extension']);
					if (($info['extension'] == 'jpg') || ($info['extension'] == 'jpeg') || ($info['extension'] == 'gif') || ($info['extension'] == 'png')) array_push($images, $url);
				}
			}

			if ( count($images) ) {
				$i=0;
				foreach($images as $url) {
					$i++;
					$tpl->copy_template = str_replace( '{image-'.$i.'}', $url, $tpl->copy_template );
				}

			}

			$tpl->copy_template = preg_replace( "#\\{image-(.+?)\\}#i", "", $tpl->copy_template );

		}

		if ( preg_match( "#\\{text limit=['\"](.+?)['\"]\\}#i", $tpl->copy_template, $matches ) ) {
			$count= intval($matches[1]);

			$row['short_story'] = strip_tags( $row['short_story'], "<br/>" );
			$row['short_story'] = trim(str_replace( "<br/>", " ", str_replace( "<br />", " ", $row['short_story'] ) ));

			if( $count AND dle_strlen( $row['short_story'], $config['charset'] ) > $count ) {

				$row['short_story'] = dle_substr( $row['short_story'], 0, $count, $config['charset'] );

				if( ($temp_dmax = dle_strrpos( $row['short_story'], ' ', $config['charset'] )) ) $row['short_story'] = dle_substr( $row['short_story'], 0, $temp_dmax, $config['charset'] );

			}

			$tpl->set( $matches[0], $row['short_story'] );

		} else $tpl->set( '{text}', $row['short_story'] );


		$tpl->compile( $template );
	}

	$tpl->clear();
	$db->free();

	create_cache( $template, $tpl->result[$template], $news_cache_id, true );
}

echo $tpl->result[$template];

?>
