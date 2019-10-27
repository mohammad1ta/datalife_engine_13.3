<article class="story">
	<div class="block">
		<h1 class="title h2">Website statistics</h1>
		<div class="stats_head">
			<ul>
				<li class="stats_d"><b>This day</b> <span>{news_day} news and {comm_day} comments added, {user_day} users registered</span></li>
				<li class="stats_w"><b>This week</b> <span>{news_week} news and {comm_week} comments added, {user_week} users registered</span></li>
				<li class="stats_m"><b>This month</b> <span>{news_month} news and {comm_month} comments added, {user_month} users registered</span></li>
			</ul>
		</div>
	</div>
	<div class="block">
		<div class="statistics">
			<div class="stat_group">
				<h5>News</h5>
				<ul>
					<li>Total number of news <b class="right">{news_num}</b></li>
					<li>Published <b class="right">{news_allow}</b></li>
					<li>Published on Homepage <b class="right">{news_main}</b></li>
					<li>Awaiting moderation <b class="right">{news_moder}</b></li>
				</ul>
			</div>
			<div class="stat_group">
				<h5>Users</h5>
				<ul>
					<li>Total number of users <b class="right">{user_num}</b></li>
					<li>Banned <b class="right">{user_banned}</b></li>
				</ul>
			</div>
			<div class="stat_group">
				<h5>Comments</h5>
				<ul>
					<li>Number of comments <b class="right">{comm_num}</b></li>
					<li><a href="/?do=lastcomments">View the latest</a></li>
				</ul>
			</div>
			<p class="grey">Total size of the database: {datenbank}</p>
		</div>
	</div>
	<div class="block block_table_top_users">
		<h4 class="title">Top users</h4>
		<div class="table_top_users">
			<table class="userstop">{topusers}</table>
		</div>
	</div>
</article>