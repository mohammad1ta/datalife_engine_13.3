<article class="block story shadow">
	<div class="wrp">
		<div class="head"><h1 class="title h2 ultrabold">آمار سایت</h1></div>
		<div class="stats_head">
			<ul>
				<li class="stats_d"><b>امروز</b> <span>{news_day} مطلب ، {comm_day} نظر و {user_day} کاربر در سایت به ثبت رسیده اند.</span></li>
				<li class="stats_w"><b>این هفته</b> <span>{news_week} مطلب ، {comm_week} نظر و {user_week} کاربر در سایت به ثبت رسیده اند.</span></li>
				<li class="stats_m"><b>این ماه</b> <span>{news_month} مطلب ، {comm_month} نظر و {user_month} کاربر در سایت به ثبت رسیده اند.</span></li>
			</ul>
		</div>
	</div>
</article>
<div class="block">
	<div class="wrp">
		<div class="statistics">
			<div class="stat_group">
				<h5>مطالب</h5>
				<ul>
					<li>تعداد کل <b class="left">{news_num}</b></li>
					<li>منتشر شده <b class="left">{news_allow}</b></li>
					<li>منتشر شده در صفحه اصلی <b class="left">{news_main}</b></li>
					<li>در انتظار تایید <b class="left">{news_moder}</b></li>
				</ul>
			</div>
			<div class="stat_group">
				<h5>کاربران</h5>
				<ul>
					<li>تعداد کل <b class="left">{user_num}</b></li>
					<li>اخراج شده ها <b class="left">{user_banned}</b></li>
				</ul>
			</div>
			<div class="stat_group">
				<h5>نظرات</h5>
				<ul>
					<li>تعداد کل <b class="left">{comm_num}</b></li>
					<li><a href="/?do=lastcomments">مشاهده آخرین ها</a></li>
				</ul>
			</div>
			<p class="grey">حجم کل بانک اطلاعاتی: {datenbank}</p>
		</div>
	</div>
</div>
<div class="block block_table_top_users">
	<div class="wrp">
		<h4 class="block_title ultrabold">برترین کاربران</h4>
		<div class="table_top_users">
			<table class="userstop">{topusers}</table>
		</div>
	</div>
</div>