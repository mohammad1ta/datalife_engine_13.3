<article class="story">
	<div class="block">
		<h1 class="title h2">آمار سایت</h1>
		<div class="stats_head">
			<ul>
				<li class="stats_d"><b>امروز</b> <span>{news_day} مطلب و {comm_day} نظر افزوده شده, {user_day} کاربر عضو شده اند</span></li>
				<li class="stats_w"><b>این هفته</b> <span>{news_week} مطلب و {comm_week}  نظر افزوده شده, {user_week} کاربر عضو شده اند</span></li>
				<li class="stats_m"><b>این ماه</b> <span>{news_month} مطلب و {comm_month}  نظر افزوده شده, {user_month} کاربر عضو شده اند</span></li>
			</ul>
		</div>
	</div>
	<div class="block">
		<div class="statistics">
			<div class="stat_group">
				<h5>مطالب</h5>
				<ul>
					<li>تعداد کل مطالب <b class="left">{news_num}</b></li>
					<li>منتشر شده <b class="left">{news_allow}</b></li>
					<li>منتشر شده در صفحه اصلی <b class="left">{news_main}</b></li>
					<li>مطالب مدیریت شده <b class="left">{news_moder}</b></li>
				</ul>
			</div>
			<div class="stat_group">
				<h5>کاربران</h5>
				<ul>
					<li>تعداد کل کاربران <b class="left">{user_num}</b></li>
					<li>تعداد کاربران بن شده <b class="left">{user_banned}</b></li>
				</ul>
			</div>
			<div class="stat_group">
				<h5>نظرات</h5>
				<ul>
					<li>تعداد کل نظرات <b class="left">{comm_num}</b></li>
					<li><a href="/?do=lastcomments">نمایش آخرین نظرات</a></li>
				</ul>
			</div>
			<p class="grey">اندازه کل پایگاه داده: {datenbank}</p>
		</div>
	</div>
	<div class="block block_table_top_users">
		<h4 class="title">کاربران برتر</h4>
		<div class="table_top_users">
			<table class="userstop">{topusers}</table>
		</div>
	</div>
</article>