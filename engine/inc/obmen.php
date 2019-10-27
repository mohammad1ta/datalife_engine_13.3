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

if(!defined('DATALIFEENGINE')) {
	die("Hacking attempt!");
}

if ($action == "sort" || $action == "delete" || $_POST['obmen-submit']) {
	@unlink( ENGINE_DIR . '/cache/system/obmen.php' );
}

$js_array[] = "engine/skins/obmen/colorpicker.js";
$colorPicker = <<<HTML
<link rel="stylesheet" media="screen" type="text/css" href="engine/skins/obmen/colorpicker.css" />
<script type="text/javascript">
\$('#colorSelector').ColorPicker({
	color: \$('#colorSelector').val(),
	onShow: function (colpkr) {
		\$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		\$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		\$('#colorSelector').val(hex);
	}
});
</script>
HTML;

if ($action == "edit") {

	if( isset($_POST['obmen-submit']) AND ($_POST['obmen-submit'] == "true") ){
		$id = $db->safesql(intval($_REQUEST['id']));
		$title = $db->safesql(stripslashes($_POST['title']));
		$color = $db->safesql(stripslashes($_POST['color']));
		$bold = $db->safesql(stripslashes($_POST['bold']));
		$link = $db->safesql(stripslashes($_POST['link']));
		$mail = $db->safesql(stripslashes($_POST['mail']));
		$posit = $db->safesql(stripslashes($_POST['posit']));
		$target = $db->safesql(stripslashes($_POST['target']));
		$description = $db->safesql(substr(strip_tags(stripslashes($_REQUEST['description'])), 0, 350));
		$db->query("UPDATE " . PREFIX . "_obmen set title='$title', color='$color', bold='$bold', link='$link', mail='$mail', description='$description', posit='$posit', target='$target' where id='$id'");
		msg("info", "اطلاعات", "لینک {$title} با موفقیت بروز شد.", "$PHP_SELF?mod=obmen");
	} else {

		echoheader("لینک ها", "مدیریت " . $lang['opt_obmen']);

		$db->query("SELECT * FROM " . PREFIX . "_obmen WHERE id=" . (int)$_REQUEST['id'] . " ORDER BY posit ASC");
		$row = $db->get_row();

		if ($row["bold"]) $boldchecked = " checked=\"true\"";

		if ($row["target"] == "_blank") $blankselected = " selected=\"true\"";
		if ($row["target"] == "_top") $topselected = " selected=\"true\"";

		$id = $row['id'];
		$title = $row['title'];
		$link = $row['link'];
		$color = $row['color'];
		$mail = $row['mail'];
		$description = $row['description'];

		$posit = "";

		for($i = 0; $i <= 20; $i++){
			$posit .= "<option value=\"{$i}\"";
			$posit .= ($row['posit'] == $i) ? " selected=\"true\"" : "";
			$posit .= ">{$i}</option>";
		}

		echo <<<HTML

<form method="post" action="" class="form-horizontal" >

<div class="panel panel-default">
  <div class="panel-heading">
    ویرایش لینک
  </div>

	<table class="table table-striped table-xs">

		<tr>
		  <td>عنوان لینک:</td>
		  <td>
			<input type="text" name="title" class="form-control" style="width:100%;max-width:437px;" value="{$title}">
		  </td>
		 </tr>

		<tr>
		  <td>آدرس:</td>
		  <td>
			<input type="text" name="link" class="form-control" style="width:100%;max-width:437px;" dir="ltr" value="{$link}">
		  </td>
		 </tr>

		<tr>
		  <td>توضیحات:</td>
		  <td>
			<input type="text" name="description" class="form-control" style="width:100%;max-width:437px;" value="{$description}">
		  </td>
		 </tr>

		<tr>
		  <td>ایمیل مدیر وب سایت:</td>
		  <td>
			<input type="text" name="mail" class="form-control" style="width:100%;max-width:437px;" dir="ltr" value="{$mail}">
		  </td>
		 </tr>

		<tr>
		  <td>محل قرارگیری:</td>
		  <td>
			<select name="posit" class="uniform">
				{$posit}
			</select>
		  </td>
		 </tr>

		<tr>
		  <td>هدف:</td>
		  <td>
			<select name="target" class="uniform">
				<option value="">بدون انتخاب</option>
				<option value="_blank"{$blankselected}>پنجره یا تب جدید (_blank)</option>
				<option value="_top"{$topselected}>پنجره فعلی (_top)</option>
			</select>
		  </td>
		 </tr>

		<tr>
		  <td>رنگ لینک:</td>
		  <td>
			<input type="text" name="color" id="colorSelector" class="form-control" maxlength="6" size="6" style="width: 120px;max-width:437px;" dir="ltr" value="{$color}">#
		  </td>
		 </tr>

		<tr>
		  <td>پر رنگ بودن لینک:</td>
		  <td>
			<input class="icheck" type="checkbox" id="bold_id" name="bold" value="1" {$boldchecked}> <label for="bold_id">بله</label>
		  </td>
		 </tr>

		<tr>
		  <td></td>
		  <td>
			<input type="submit" class="btn bg-teal btn-sm btn-raised" value="ویرایش"> <input onclick="confirmdelete();return false" type="button" class="btn bg-primary-600 btn-sm btn-raised" value=" حذف لینک  " />
		  </td>
		 </tr>
	</table>

</div>
<input name="obmen-submit" value="true" type="hidden">
</form>
<script type="text/javascript">
<!--
function confirmdelete(){
	DLEconfirm("آیا واقعا میخواهید این لینک را حذف کنید؟" ,"حذف لینک",function(){
		document.location="{$PHP_SELF}?mod=obmen&action=delete&id={$id}";
	});
}
//-->
</script>
HTML;

		echo $colorPicker;
		echofooter();
	}
} elseif ($action == "sort") {
	foreach ($_POST["posit"] as $id => $posit) {
		if($posit != "") {
			$posi = intval($posit);
			$id = intval($id);
			$query = $db->query("UPDATE " . PREFIX . "_obmen SET posit=$posi WHERE id = $id");
		}
	}
	msg("info", "اطلاعات", "لینک ها با موفقیت چیده شدند.", "{$PHP_SELF}?mod=obmen");

} elseif ($action == "add") {

	if( isset($_POST['obmen-submit']) AND ($_POST['obmen-submit'] == "true") ){
		$title = $db->safesql(stripslashes($_POST['title']));
		$color = $db->safesql(stripslashes($_POST['color']));
		$bold = $db->safesql(stripslashes($_POST['bold']));
		$link = $db->safesql(stripslashes($_POST['link']));
		$mail = $db->safesql(stripslashes($_POST['mail']));
		$posit = $db->safesql(stripslashes($_POST['posit']));
		$target = $db->safesql(stripslashes($_POST['target']));
		$description = $db->safesql(substr(strip_tags(stripslashes($_REQUEST['description'])), 0, 350));
		$sql_insert = $db->query("INSERT INTO " . PREFIX . "_obmen (title, color, bold, link, mail, description, target, posit) values ('$title', '$color', '$bold', '$link', '$mail', '$description', '$target', '$posit')");
		msg("info", "اطلاعات", "لینک {$title} با موفقیت اضافه شد.", "{$PHP_SELF}?mod=obmen");
	} else {
		echoheader("لینک ها", "مدیریت " . $lang['opt_obmen']);

		$posit = "";

		for($i = 0; $i <= 20; $i++){
			$posit .= "<option value=\"{$i}\">{$i}</option>";
		}

		echo <<<HTML
<form method="post" action="" class="form-horizontal">

<div class="panel panel-default">
  <div class="panel-heading">
    اضافه کردن لینک
  </div>

	<table class="table table-striped table-xs">

		<tr>
		  <td>عنوان لینک:</td>
		  <td>
			<input type="text" name="title" class="form-control" style="width:100%;max-width:437px;">
		  </td>
		 </tr>

		<tr>
		  <td>آدرس:</td>
		  <td>
			<input type="text" name="link" class="form-control" style="width:100%;max-width:437px;" dir="ltr" value="http://">
		  </td>
		 </tr>

		<tr>
		  <td>توضیح:<br/></td>
		  <td>
			<input type="text" name="description" class="form-control" style="width:100%;max-width:437px;"> ( اختیاری )
		  </td>
		 </tr>

		<tr>
		  <td>ایمیل مدیر وب سایت:</td>
		  <td>
			<input type="text" name="mail" class="form-control" style="width:100%;max-width:437px;" dir="ltr"> ( اختیاری )
		  </td>
		 </tr>

		<tr>
		  <td>محل قرارگیری:</td>
		  <td>
			<select name="posit" class="uniform">
				{$posit}
			</select>
		  </td>
		 </tr>

		<tr>
		  <td>هدف:</td>
		  <td>
			<select name="target" class="uniform">
				<option value="">بدون انتخاب</option>
				<option value="_blank">پنجره یا تب جدید (_blank)</option>
				<option value="_top">پنجره فعلی (_top)</option>
			</select>
		  </td>
		 </tr>

		<tr>
		  <td>رنگ لینک:</td>
		  <td>
			<input type="text" name="color" id="colorSelector" class="form-control" maxlength="6" size="6" style="width: 120px;max-width:437px;" dir="ltr">#
		  </td>
		 </tr>

		<tr>
		  <td>پر رنگ بودن لینک:</td>
		  <td>
			<input class="icheck" type="checkbox" id="bold_id" name="bold" value="1"> <label for="bold_id">بله</label>
		  </td>
		 </tr>

		<tr>
		  <td></td>
		  <td>
			<input type="submit" class="btn bg-teal btn-sm btn-raised" value="درج لینک">
		  </td>
		 </tr>
	</table>

</div>

<input name="obmen-submit" value="true" type="hidden">
</form>
HTML;

		echo $colorPicker;
		echofooter();
	}
} elseif ($action == "delete") {
	$db->query ("DELETE FROM " . PREFIX . "_obmen WHERE id = '{$_REQUEST['id']}'");
	msg("info", "اطلاعات", "این لینک با موفقیت حذف شد.", "$PHP_SELF?mod=obmen");

} else {


	echoheader( "<i class=\"icon-user\"></i>".$lang['opt_obmen'], "مدیریت لینک ها" );


	echo <<<HTML
<script type="text/javascript">
<!--
function check_rank( host, id ){
ShowLoading("");
\$.post("{$config['http_home_url']}engine/ajax/ranksite.php",{'idsea':host},function(a){\$('#rank-'+id).fadeOut('normal',function(){\$(this).html(a).fadeIn();HideLoading("");});});
return false;
}

function confirmdelete(id){
DLEconfirm("آیا واقعا میخواهید این لینک را حذف کنید؟","حذف لینک",function(){
document.location="{$PHP_SELF}?mod=obmen&action=delete&id="+id;
});
}
//-->
</script>
HTML;
	$result = $db->query("SELECT * FROM " . PREFIX . "_obmen ORDER BY posit ASC");
	while($row = $db->get_row($result)) {
		$link = $row['link'];
		$id = $row['id'];
		$title = $row['title'];
		$color = $row['color'];
		$bold = $row['bold'];
		$mail = $row['mail'];
		$posit = $row['posit'];
		$description = $row['description'];

		$che = parse_url("$link");
		$host = $che['host'];

		$entry .= <<<HTML

<tr>
<td width="60"><input name="posit[{$id}]" value="{$posit}" class="edit ltr text-center" size="2" /></td>
<td><a href="{$PHP_SELF}?mod=obmen&action=edit&id={$id}">{$title}</a></td>
<td style="text-align: left;"><a href="{$link}" target="_blank" class="ltr">{$host}</a></td>
<td width="200" align="center"><span id="rank-{$id}">---</span></td>
<td width="80">

<div class="btn-group">
	<button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="icon-pencil"></i> {$lang['filter_action']} <span class="caret"></span></button>
	<ul class="dropdown-menu text-left">
		<li><a href="?mod=obmen&action=edit&id={$id}"><i class="icon-pencil"></i> ویرایش</a></li>
		<li class="divider"></li>
		<li><a href="#" onclick="confirmdelete({$id}); return(false)"><i class="icon-trash"></i> حذف</a></li>
		<li class="divider"></li>
		<li><a href="#" onclick="check_rank('{$host}', '{$id}'); return(false)"><i class="icon-link"></i> گرفتن رتبه گوگل</a></li>
	</ul>
</div>

</td>
</tr>
HTML;
	}

	if ($_POST['action'] == "send_notice") {

		$obmen_config = array();

		foreach($_POST as $name => $value){
			if($name == "action") continue;
			$obmen_config[$name] = $_POST[$name];
		}

		$f = fopen( ENGINE_DIR . "/data/obmen.php", 'w' );
		fwrite( $f, serialize($obmen_config) );
		fclose( $f );
	}

	$obmen_config = unserialize( @file_get_contents( ENGINE_DIR . "/data/obmen.php" ));

	$text1 = $obmen_config['text']['1'];
	$text2 = $obmen_config['text']['2'];
	$showchecked1 = $obmen_config['showchecked']['1'];
	$showchecked2 = $obmen_config['showchecked']['2'];
	$showchecked3 = $obmen_config['showchecked']['3'];

	if ( $showchecked1 == '1' ) $ifchecked1 = "checked";
	if ( $showchecked2 == '1' ) $ifchecked2 = "checked";

	if ($showchecked3 == '1' ) $ifchecked3 = "checked";

	echo <<<HTML
<form method="post" action="$PHP_SELF?mod=obmen&action=sort">

<div class="panel panel-default">
  <div class="panel-heading">
    فهرست لینک ها
  </div>
    <table class="table table-striped table-xs">
HTML;

	if ($entry) $entry = <<<HTML
      <thead>
<tr>
<td align="right">مکان</td>
<td align="right">عنوان لینک</td>
<td align="center">آدرس</td>
<td align="center" width="200">رتبه گوگل</td>
<td align="center" width="80">عملیات</td>
</tr>
      </thead>
{$entry}
HTML;
	else $entry = "<tr><td align=\"center\" height=\"30\" colspan=\"5\" align=\"center\" class=\"navigation\">- هیچ لینکی وجود ندارد -</td></tr>";
	$row = $db->super_query("SELECT COUNT(*) as count FROM " . PREFIX . "_obmen");
	$sites = $row['count'];
	echo <<<HTML
<tbody>{$entry}</tbody>
</table>

<div class="panel-footer">
	<input type='button' value=' اضافه کردن لینک جدید ' class='btn bg-teal btn-sm btn-raised' onclick="window.location='$PHP_SELF?mod=obmen&action=add'">
	<input type='button' value=' تنظیمات ' class='btn bg-primary-600 btn-sm btn-raised' onclick="javascript:ShowOrHide('options')">
	<input type="submit" value=' چیدن لینک ها ' class='btn bg-info-800 btn-sm btn-raised'>
</div>

</form>
</div>

<div id="options" style="display:none;">
	<form method="post" action="" class="form-horizontal" >
	<input type="hidden" name="action" value="send_notice">
	
	<div class="panel panel-default">
	
	  <div class="panel-heading">تنظیمات</div>
	
		<table class="table table-striped table-xs">
	
			<tr>
			  <td>متن در بالای لینک ها:</td>
			  <td>
				<input type="text" class="form-control" name="text[1]" style="width:100%;max-width:437px;" value="{$text1}"> <input class="icheck" type="checkbox" id="show_1" {$ifchecked1} name="showchecked[1]" value="1" value="1"> <label for="show_1">نمایش</label>
			  </td>
			 </tr>
	
			<tr>
			  <td>متن در پایین لینک ها:</td>
			  <td>
				<input type="text" class="form-control" name="text[2]" style="width:100%;max-width:437px;" value="{$text2}"> <input class="icheck" type="checkbox" id="show_2" {$ifchecked2} name="showchecked[2]" value="1" value="1"> <label for="show_2">نمایش</label>
			  </td>
			 </tr>
	
	
			<tr>
			  <td>حرکت به سمت بالا:</td>
			  <td>
				<input class="icheck" type="checkbox" {$ifchecked3} name="showchecked[3]" value="1" id="check3" value="1"> <label for="check3">بله</label>
			  </td>
			 </tr>
	
			<tr>
			  <td></td>
			  <td>
				<input type="submit" class="btn bg-teal btn-sm btn-raised" value="ذخیره">
			  </td>
			 </tr>

		</table>

	</div>
	
	</form>
</div>
HTML;

	echofooter();
}

?>
