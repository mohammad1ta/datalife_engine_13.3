<article class="block story fullstory">
	[not-group=5]
	<ul class="story_icons ignore-select">
		<li class="fav_btn">
			[add-favorites]<span title="Add to favorites"><svg class="icon icon-fav"><use xlink:href="#icon-fav"></use></svg></span>[/add-favorites]
			[del-favorites]<span title="Remove from favorites"><svg class="icon icon-fav_del"><use xlink:href="#icon-fav_del"></use></svg></span>[/del-favorites]
		</li>
		<li class="edit_btn">
			[edit]<i title="Edit">Edit</i>[/edit]
		</li>
	</ul>
	[/not-group]
	<h1 class="h2 title">{title}</h1>
	<div class="story_top ignore-select">
		[fixed]<span class="fixed_label" title="Fixed!">Fixed!</span>[/fixed]
		<time class="date grey" datetime="{date=Y-m-d}">[day-news]{date=d/m/Y H:i}[/day-news]</time>
	</div>
	{poll}
	<div class="text">
		{full-story}
		{pages}
		[edit-date]<p class="editdate grey">News article is edited by: <b>{editor}</b> - {edit-date}<br>
		[edit-reason]Reason: {edit-reason}[/edit-reason]</p>[/edit-date]
	</div>
	<div class="category grey">
		<svg class="icon icon-cat"><use xlink:href="#icon-cat"></use></svg>
		{link-category}
	</div>
	<div class="story_tools ignore-select">
		<div class="story_tools_in">
		<!-- Ya.Share -->
		<div class="share">
			<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
			<script src="//yastatic.net/share2/share.js" charset="utf-8"></script>
			<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus" data-size="s"></div>
		</div>
		<!-- / Ya.Share -->
		[rating]
			<div class="rate">
				[rating-type-1]<div class="rate_stars">{rating}</div>[/rating-type-1]
				[rating-type-2]
				<div class="rate_like" title="Like">
				[rating-plus]
					<svg class="icon icon-like"><use xlink:href="#icon-like"></use></svg>
					{rating}
				[/rating-plus]
				</div>
				[/rating-type-2]
				[rating-type-3]
				<div class="rate_like-dislike">
					[rating-plus]<span class="plus_icon" title="Like"><span>+</span></span>[/rating-plus]
					{rating}
					[rating-minus]<span class="plus_icon minus" title="Dislike"><span>-</span></span>[/rating-minus]
				</div>
				[/rating-type-3]
				[rating-type-4]
				<div class="rate_like-dislike">
					<span class="ratingtypeplusminus ignore-select ratingplus">{likes}</span>
					[rating-plus]<span class="plus_icon" title="Like"><span>+</span></span>[/rating-plus]
					<span class="ratingtypeplusminus ratingminus ignore-select">{dislikes}</span>
					[rating-minus]<span class="plus_icon minus" title="Dislike"><span>-</span></span>[/rating-minus]
				</div>
				[/rating-type-4]
			</div>
		[/rating]
		</div>
		<ul class="meta grey">
			<li class="meta_author" title="author">
				<svg class="icon icon-author"><use xlink:href="#icon-author"></use></svg>{author}
			</li>
			<li class="meta_coms" title="Comments: {comments-num}">[com-link]<svg class="icon icon-coms"><use xlink:href="#icon-coms"></use></svg>{comments-num}[/com-link]</li>
			<li class="meta_views" title="Views: {views}"><svg class="icon icon-view"><use xlink:href="#icon-view"></use></svg>{views}</li>
		</ul>
	</div>
</article>
<div class="block">
	[prev-url]<a href="{prev-url}" class="btn">Prev</a>[/prev-url]
	[next-url]<a href="{next-url}" class="btn right">Next</a>[/next-url]
</div>
<!-- Banner -->
<div class="block ignore-select">
	<div class="banner">
		{banner_header}
	</div>
</div>
<!-- / Banner -->
<div class="comments ignore-select">
	[comments]
	<div class="comments_box">
		<div class="comments_box_in">
			<h4 class="title">Comments <span class="green">{comments-num}</span></h4>
			<div class="com_list">
				{comments}
			</div>
			{navigation}
		</div>
	</div>
	[/comments]
	[not-comments]
	<div style="padding-left:45px;padding-right:45px;">
		{comments}
	</div>
	[/not-comments]
	{addcomments}
</div>