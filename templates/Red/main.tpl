<!DOCTYPE html>
<html>
<head>
	{headers}
	<meta name="HandheldFriendly" content="true">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width"> 
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">

	<link rel="shortcut icon" href="{THEME}/images/favicon.ico">
	<link rel="apple-touch-icon" href="{THEME}/images/touch-icon-iphone.png">
	<link rel="apple-touch-icon" sizes="76x76" href="{THEME}/images/touch-icon-ipad.png">
	<link rel="apple-touch-icon" sizes="120x120" href="{THEME}/images/touch-icon-iphone-retina.png">
	<link rel="apple-touch-icon" sizes="152x152" href="{THEME}/images/touch-icon-ipad-retina.png">

	<link href="{THEME}/css/engine.css" type="text/css" rel="stylesheet">
	<link href="{THEME}/css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div class="page">
		<!-- Search -->
		<form class="droptopbar" id="q_search" method="post">
			<div class="wrp">
				<div class="q_search">
					<input id="story" name="story" placeholder="Search on the site..." type="search">
					<button class="btn btn_border" type="submit" title="Find"><b class="ultrabold">Find</b></button>
				</div>
			</div>
			<input type="hidden" name="do" value="search">
			<input type="hidden" name="subaction" value="search">
		</form>
		<!-- / Search -->
		<!-- Header -->
		<div class="headpic fixed">
			<div class="wrp">
				<header id="header">
					<!-- Logo -->
					<a class="logotype" href="/" title="DataLife Engine">
						<svg class="icon icon-logo"><use xlink:href="#icon-logo"></use></svg>
						<span class="title_hide">DataLife Engine</span>
					</a>
					<!-- / Logo -->
					<div class="topbar">
						{login}
						<!-- Search button -->
						<div class="h_btn" id="search" title="Search">
							<svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg>
							<span class="icon_close">
								<i class="mt_1"></i><i class="mt_2"></i>
							</span>
							<span class="title_hide">Search on the site</span>
						</div>
						<!-- / Search button -->
						<!-- Menu -->
						<!-- Menu button -->
						<div class="h_btn" id="mainmenu">
							<span class="menu_toggle">
								<i class="mt_1"></i><i class="mt_2"></i><i class="mt_3"></i>
							</span>
						</div>
						<!-- / Menu button -->
						<nav id="topmenu">
							{include file="modules/menu.tpl"}
						</nav>
						<a href="#" id="closemenu"><span><svg class="icon icon-cross"><use xlink:href="#icon-cross"></use></svg></span></a>
						<!-- / Menu -->
					</div>
				</header>
				[available=main]
				<div class="head_text">
					<div class="head_text_in">
						<h1 class="title ultrabold">DataLife Engine</h1>
						<p class="text">Make your website with no limits!</p>
					</div>
				</div>
				[/available]
			</div>
		</div>
		<!-- / Header -->
		<!-- Sorting, Tags, Bread crumbs -->
		{include file="modules/tools.tpl"}
		<!-- / Sorting, Tags, Bread crumbs -->
		<!-- Content -->
		<div id="content">
			{info}
			[available=lastcomments]
				<div class="block story lastcomments">
					<div class="wrp">
						<div class="head">
							<h1 class="title h2 ultrabold">Recent comments</h1>
						</div>
			[/available]
			[available=cat|favorites|newposts|lastnews|main]<section class="story_list">[/available]
			{content}
			[available=cat|favorites|newposts|lastnews|main]</section>[/available]
			[available=lastcomments]</div></div>[/available]
		</div>
		<!-- / Content -->
		[available=main]
		<!-- Popular news -->
		<div class="block col_news">
			<div class="wrp">
				<div class="block_title"><h4 class="ultrabold">Popular news</h4></div>
				<div class="grid_list">
					{custom template="story_top" limit="4" days="80" order="reads" cache="yes"}
				</div>
			</div>
		</div>
		<!-- / Popular news -->
		[/available]
		[not-available=showfull]
		{vote}
		[/not-available]
		<!-- footer -->
		<footer id="footer">
			<div class="wrp">
				{include file="modules/footmenu.tpl"}
				{include file="modules/copyright.tpl"}
			</div>
		</footer>
		<!-- / footer -->
	</div>
	{AJAX}
	<script src="{THEME}/js/lib.js"></script>
	<script src="{THEME}/js/svgxuse.min.js"></script>
	<script>
		jQuery(function($){
			$.get("{THEME}/images/sprite.svg", function(data) {
			  var div = document.createElement("div");
			  div.innerHTML = new XMLSerializer().serializeToString(data.documentElement);
			  document.body.insertBefore(div, document.body.childNodes[0]);
			});
		});
	</script>
</body>
</html>