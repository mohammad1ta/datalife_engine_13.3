<aside class="str_right" id="rightside">
	<!-- Popular, similar, discussed -->
	<div class="block">
		<ul class="block_tabs">
			[available=showfull]
			<li class="active">
				<a title="Related" href="#news_rel" aria-controls="news_rel" data-toggle="tab">
					Related
				</a>
			</li>
			[/available]
			<li[not-available=showfull] class="active"[/not-available]>
				<a title="Popular" href="#news_top" aria-controls="news_top" data-toggle="tab">
					Popular
				</a>
			</li>
			[not-available=showfull]
			<li>
				<a title="Discuss" href="#news_coms" aria-controls="news_coms" data-toggle="tab">
					Discuss
				</a>
			</li>
			[/not-available]
		</ul>
		<div class="tab-content">
			[available=showfull]
			<div class="tab-pane active" id="news_rel">{related-news}</div>
			[/available]
			<div class="tab-pane[not-available=showfull] active[/not-available]" id="news_top">{topnews}</div>
			[not-available=showfull]
			<div class="tab-pane" id="news_coms">
				{custom days="30" template="story_line" limit="5" order="comments" cache="yes"}
			</div>
			[/not-available]
		</div>
	</div>
	<!-- / Popular, similar, discussed -->
	<div class="block_sep"></div>
	{vote}
	<!-- Archive and Calendar -->
	<div class="block">
		<ul class="block_tabs">
			<li class="active">
				<a title="Calendar" href="#arch_calendar" aria-controls="arch_calendar" data-toggle="tab">
					Calendar
				</a>
			</li>
			<li>
				<a title="Archive" href="#arch_list" aria-controls="arch_list" data-toggle="tab">
					Archive
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="arch_calendar">{calendar}</div>
			<div class="tab-pane" id="arch_list">
				{archives}
			</div>
		</div>
	</div>
	<!-- / Archive and Calendar -->
	<!-- Banner 300X500 -->
	<div class="block">
		<div class="banner">
			<img src="{THEME}/images/tmp/banner_300x500.png" alt="">
		</div>
	</div>
	<!-- / Banner 300X500 -->
	<!-- Tags -->
	<div class="block">
		<h4 class="title">Tags Cloud</h4>
		<div class="tag_list">
			{tags}
		</div>
	</div>
	<!-- / Tags -->
	<!-- Design -->
	<div class="block">
		<div class="change_skin">
			{changeskin}
			<h4 class="title">Design</h4>
			<span class="arrow"></span>
			<span class="cs_colors"><i class="cs_1"></i><i class="cs_2"></i><i class="cs_3"></i></span>
		</div>
	</div>
	<!-- / Design -->
</aside>