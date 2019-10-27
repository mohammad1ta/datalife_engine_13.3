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
			<a href="#">About us</a>
			<a href="#">World</a>
			<a href="#">Economics</a>
			<a href="#">Religion</a>
			<a href="#">Crime</a>
			<a href="#">Sports</a>
			<a href="#">Culture</a>
			<a href="#">Foreign press</a>
		</nav>
		<!-- Head Menu [E] -->
	</div>
	<div class="background"></div>
	<header id="header">
		<!-- LogoType -->
		<a id="logo" href="/">
			<b id="logo-text">Datalife Engine</b>
			<span>Softnews Media Group</span>
		</a>
		<!-- LogoType [E] -->
		<!--Search-->
		<form id="quicksearch" method="post" action=''>
			<input type="hidden" name="do" value="search">
			<input type="hidden" name="subaction" value="search">
			<div class="quicksearch">
				<input class="f_input" placeholder="Search..." name="story" value="" type="search">
				<button type="submit" title="Search" class="thd">Search</button>
			</div>
		</form>
		<!--Search [E]-->
		<a id="go2full" class="ico" href="/index.php?action=mobiledisable">Full version</a>
	</header>
	<section id="content">
		{info}
		{content}
	</section>
	<div id="footmenu">
		<h3>Navigation</h3>
		<nav class="main-nav">
			<a href="#">About us</a>
			<a href="#">World</a>
			<a href="#">Economics</a>
			<a href="#">Religion</a>
			<a href="#">Crime</a>
			<a href="#">Sports</a>
			<a href="#">Culture</a>
			<a href="#">Foreign press</a>
			<span class="nav-sep"></span>
			<a href="/index.php?do=lastnews" target="_blank">All the latest news</a>
			<a href="http://dle-news.ru" target="_blank">Script support</a>
			<a href="/index.php?action=mobiledisable">Full version</a>
		</nav>
	</div>
	<footer id="footer">
		<div class="background"></div>
		<div id="copyright">Powered by <a href="http://dle-news.ru" target="_blank">DataLife Engine</a> © 2017</div>
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