<!DOCTYPE html>
<html>
<head>
{headers}
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{THEME}/css/engine.css" rel="stylesheet">
<link href="{THEME}/css/style.css" rel="stylesheet">
<script src="{THEME}/js/libs.js" type="text/javascript"></script>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<!--[if lt IE 9]><script src="{THEME}/js/html5shiv.js" type="text/javascript"></script><![endif]-->
</head>
<body>
	{AJAX}
	<div id="toolbar">
		<div id="in-toolbar">
			{login}
			<a id="menu-btn">
				<span id="hamburger"></span>
			</a>
		</div>
		<!-- Head Menu -->
		<nav id="menu-head">
			<a href="#">منوی 1</a>
			<a href="#">منوی 2</a>
			<a href="#">منوی 3</a>
			<a href="#">منوی 4</a>
			<a href="#">منوی 5</a>
			<a href="#">منوی 6</a>
			<a href="#">منوی 7</a>
			<a href="#">منوی 8</a>
		</nav>
		<!-- Head Menu [E] -->
	</div>
	<div class="background"></div>
	<header id="header">
		<!-- LogoType -->
		<a id="logo" href="/">
			<b id="logo-text">Datalife Engine</b>
			<span>Persian Group</span>
		</a>
		<!-- LogoType [E] -->
		<!--Search-->
		<form id="quicksearch" method="post" action=''>
			<input type="hidden" name="do" value="search">
			<input type="hidden" name="subaction" value="search">
			<div class="quicksearch">
				<input class="f_input" placeholder="جستجو..." name="story" value="" type="search">
				<button type="submit" title="Search" class="thd">جستجو...</button>
			</div>
		</form>
		<!--Search [E]-->
		<a id="go2full" class="ico" href="/index.php?action=mobiledisable">بازگشت به نسخه غير موبایل</a>
	</header>
	<section id="content">
		{info}
		{content}
	</section>
	<div id="footmenu">
		<h3>فهرست</h3>
		<nav class="main-nav">
			<a href="#">منوی 1</a>
			<a href="#">منوی 2</a>
			<a href="#">منوی 3</a>
			<a href="#">منوی 4</a>
			<a href="#">منوی 5</a>
			<a href="#">منوی 6</a>
			<a href="#">منوی 7</a>
			<a href="#">منوی 8</a>
			<span class="nav-sep"></span>
			<a href="/index.php?do=lastnews" target="_blank">آخرين اخبار</a>
			<a href="http://datalifeengine.ir" target="_blank">پشتیبانی اسکریپت</a>
			<a href="/index.php?action=mobiledisable">بازگشت به نسخه غير موبایل</a>
		</nav>
	</div>
	<footer id="footer">
		<div class="background"></div>
		<div id="copyright">Powered by <a href="http://www.datalifeengine.ir/?utm_source=customers&utm_medium=cpc&utm_campaign=copyright" target="_blank">DataLife Engine</a> © 2019</div>
	</footer>
	<script type="text/javascript">
	// <![CDATA[
		(function(doc) {

		var addEvent = 'addEventListener',
		type = 'gesturestart',
		qsa = 'querySelectorAll',
		scales = [1, 1],
		meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];

		function fix() {
		meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
		doc.removeEventListener(type, fix, true);
		}

		if ((meta = meta[meta.length - 1]) && addEvent in doc) {
		fix();
		scales = [.25, 1.6];
		doc[addEvent](type, fix, true);
		}

		}(document));
	// ]]>
	</script>
</body>
</html>