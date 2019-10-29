<!DOCTYPE html>
<html xml:lang="fa" lang="fa">
<head>
<meta name=apple-mobile-web-app-capable content=yes>
<meta name=viewport content="width=device-width, initial-scale=1.0">
{headers}
<link rel="icon" type="image/png" sizes="16x16" href="{THEME}/images/favicon.ico">
<link media="screen" href="{THEME}/style/styles.css" type="text/css" rel="stylesheet" />
<link media="screen" href="{THEME}/style/flaticon.css" type="text/css" rel="stylesheet" />
<link media="screen" href="{THEME}/style/engine.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{THEME}/js/libs.js"></script>
</head>
<body>
{AJAX}

{*<div class="modal">*}
{*	<div class="modal-bg"></div>*}
{*	<div class="modal-box">*}
{*		<div class="modal-title"><div>ورود به سایت</div><span class="modal-close"></span></div>*}
{*		<div class="modal-content">تست</div>*}
{*	</div>*}
{*</div>*}



<header class="header">

	<div class="wrapper relative">

		<h1>{main-title}</h1>

		<div class="login-area">
			{login}
		</div>

		<ul class="social-list">
			<li><a href="https://facebook.com" target="_blank"><i class="flaticon-facebook-logo"></i></a></li>
			<li><a href="https://twitter.com" target="_blank"><i class="flaticon-twitter-social-logotype"></i></a></li>
			<li><a href="https://instagram.com" target="_blank"><i class="flaticon-instagram"></i></a></li>
			<li><a href="https://linkedin.com" target="_blank"><i class="flaticon-linkedin-logo"></i></a></li>
		</ul>

		<div class="navbar">
			<div class="right"><i class="flaticon-menu" id="hamburger-button"></i></div>
			<div class="navigation">
				<nav>
					<ul>
						<li><a href="{main-link}">صفحه نخست</a></li>
						<li>
							<a href="#">دسته‌بندی<i class="flaticon-down"></i></a>
							{catmenu}
						</li>
						<li><a href="{lastcomments-link}">آخرین نظرات</a></li>
						<li><a href="{main-link}about.html">درباره ما</a></li>
						<li><a href="{feedback-link}">تماس با ما</a></li>
					</ul>
				</nav>
			</div>
			<div class="left taleft"><i class="flaticon-search" id="search-button"></i></div>
			<div class="clear"></div>
		</div>

	</div>

</header>

<div id="search-area">
	<div class="wrapper">

		<div class="search-box">
			<form action="" name="searchform" method="post">
				<i class="flaticon-search"></i>
				<input type="text" id="story" name="story" placeholder="جستجو در اخبار...">
				<input type="hidden" name="do" value="search" />
				<input type="hidden" name="subaction" value="search" />
				<i class="flaticon-close"></i>
			</form>
		</div>

	</div>
</div>

<div class="wrapper oh" id="main-container">

	<main class="main">

		[aviable=showfull]
			{speedbar}
		[/aviable]

		[banner_header]{banner_header}<br/>[/banner_header]
		{info}
		{content}

	</main>

	<aside class="sidebar">

		<section class="sidebar-box">
			<header class="sidebar-title"><span>برترین مطالب هفته</span></header>
			<ul class="article-list">
				{custom template="custom/post-sidebar" available="global" from="0" limit="3" order="reads" cache="no"}
			</ul>
		</section>

		<section class="sidebar-box gray-bg">
			<header class="sidebar-title"><span>نظرسنجی</span></header>
			{vote}
		</section>

		<section class="sidebar-box">
			<header class="sidebar-title"><span>آرشیو ماهانه</span></header>
			<div class="archive-list">
				{archives}
			</div>
		</section>

		<section class="sidebar-box">
			<header class="sidebar-title"><span>لینک دوستان</span></header>
			<ul>
				{include file="engine/modules/obmen.php"}
			</ul>
		</section>

	</aside>

</div>

<footer>

	<div class="footer">

		<div class="wrapper">

			<div class="copyright">
				Copyright © 2019 {site-name}. Powered by <a href="http://www.datalifeengine.ir/?utm_source=customers&utm_medium=cpc&utm_campaign=copyright" target="_blank">Datalife Engine</a>
			</div>

			<div class="footer-separator"></div>

			<ul>
				<li><a href="{main-link}">Home Page</a></li>
				<li><a href="{registration-link}">Registration</a></li>
				<li><a href="{lastcomments-link}">Last Comments</a></li>
				<li><a href="{main-link}about.html">About Us</a></li>
				<li><a href="{feedback-link}">Contact Us</a></li>
				<li><a href="{main-link}rss.xml">RSS<i class="flaticon-rss"></i></a></li>
			</ul>

		</div>

	</div>

</footer>

</body>
</html>
