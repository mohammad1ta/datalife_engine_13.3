<!DOCTYPE html>
<html xml:lang="fa" lang="fa">
<head>
<meta name=apple-mobile-web-app-capable content=yes>
<meta name=viewport content="width=device-width, initial-scale=1.0">
{headers}
<link rel="icon" type="image/png" sizes="16x16" href="{THEME}/images/favicon.ico">
<link media="screen" href="{THEME}/style/styles.css" type="text/css" rel="stylesheet" />
<link media="screen" href="{THEME}/style/engine.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{THEME}/js/libs.js"></script>
</head>
<body>
{AJAX}

<div class="modal">
	<div class="modal-bg"></div>
	<div class="modal-box">
		<div class="modal-title"><div>ورود به سایت</div><span class="modal-close"></span></div>
		<div class="modal-content">تست</div>
	</div>
</div>

<header class="header">

	<div class="topbar">
		<div class="wrapper">

			<div class="right">
				امروز: {today}
			</div>
			<div class="left">
				{login}
			</div>

		</div>
	</div>

	<h1>دیتالایف انجین</h1>
	<h2>خوش آمدید</h2>

</header>

<nav class="navigation">
	<ul class="button-switcher">
	 <li class="switcher"><a href="#"><img src="{THEME}/images/menu.jpg" width="32" height="32" alt="menu">منوی اصلی </a></li>

		<li><a href="/index.php">خانه</a></li>
		<li class="sub">
			<a href="#">موضوعات</a>
			<ul>
				<li><a href="#">شخصی</a></li>
				<li><a href="#">اینترنت و کامپیوتر</a></li>
				<li><a href="#">هنر</a></li>
				<li><a href="#">متفرقه</a></li>
			</ul>
		</li>
		<li><a href="/index.php">درباره من</a></li>
		<li><a href="/index.php?do=feedback">تماس با من</a></li>
	</ul>
</nav>

<div class="wrapper">

	<section class="main">

		[banner_header]{banner_header}<br/>[/banner_header]
		{info}
		{content}

	</section>

	<aside class="sidebar">

		<section class="section">
			<div class="center">
				<form action="" name="searchform" method="post">
					<input type="text" id="story" name="story" placeholder="جستجو در اخبار...">
					<input type="submit" value="جستجو">
					<input type="hidden" name="do" value="search" />
					<input type="hidden" name="subaction" value="search" />
				</form>
			</div>
		</section>

		<section class="section">
			<header class="section-title"><span>دسته بندی اخبار</span></header>
			{catmenu}
		</section>

		<section class="section">
			<header class="section-title"><span>برترین مطالب</span></header>
			<ul>
				{custom category="1" template="custom" available="global" from="0" limit="3" order="reads" cache="yes"}
			</ul>
		</section>

		<section class="section">
			<header class="section-title"><span>تقویم مطالب</span></header>
			{calendar}
		</section>

		<section class="section">
			<header class="section-title"><span>آرشیو مطالب</span></header>
			{archives}
		</section>

		<section class="section">
			<header class="section-title"><span>نظرسنجی</span></header>
			{vote}
		</section>

		<section class="section">
			<header class="section-title"><span>آخرین نظرات</span></header>
			<ul class="lastcomm">
				{customcomments template="lastcomments" available="global" from="0" limit="5" order="date" sort="desc" cache="yes"}
			</ul>
		</section>

		<section class="section">
			<header class="section-title"><span>لینک دوستان</span></header>
			<ul>
				{include file="engine/modules/obmen.php"}
			</ul>
		</section>

	</aside>

</div>

<footer>

	<div class="footer">

		<div class="wrapper">

			<div class="footer-column">

				<div class="footer-content">

					<h5><span>مطالب تصادفی</span></h5>

					<ul>
						{custom category="1" template="custom" available="global" from="0" limit="3" order="rand" cache="yes"}
					</ul>

				</div>

			</div>

			<div class="footer-column">

				<div class="footer-content">

					<h5><span>تگ های مطالب سایت</span></h5>

					<div class="tags">
						{tags}
					</div>

				</div>

			</div>

			<div class="footer-column">

				<div class="footer-content">

					<h5><span>درباره سایت...</span></h5>

					<p class="justify">
						در این مکان می توانید توضیحی در رابطه با وب سایت خود بنویسید.<br/>جهت ویرایش این متن، به فایل <span class="en">main.tpl</span> قالب خود مراجعه کنید.
					</p>

				</div>

			</div>

		</div>

	</div>

	<div class="copyright">

		<div class="wrapper">

			<div class="right">
				سیستم قدرت گرفته از: <a href="http://www.datalifeengine.ir/?utm_source=customers&utm_medium=cpc&utm_campaign=copyright" target="_blank">دیتالایف انجین</a>
			</div>

			<div class="left">
				Copyright &copy; 2020 by Datalife Engine, All rights reserved.
			</div>

		</div>

	</div>

</footer>

</body>
</html>
