<article class="block story shortstory">
	[not-group=5]
	<ul class="story_icons">
		<li class="fav_btn">
			[add-favorites]<span title="Add to favorites"><svg class="icon icon-fav"><use xlink:href="#icon-fav"></use></svg></span>[/add-favorites]
			[del-favorites]<span title="Remove from favorites"><svg class="icon icon-fav_del"><use xlink:href="#icon-fav_del"></use></svg></span>[/del-favorites]
		</li>
		<li class="edit_btn">
			[edit]<i title="Edit">Edit</i>[/edit]
		</li>
	</ul>
	[/not-group]
	<h2 class="title">[full-link]{title}[/full-link]</h2>
	<div class="story_top">
		[fixed]<span class="fixed_label" title="Fixed!">Fixed!</span>[/fixed]
		<time class="date grey" datetime="{date=Y-m-d}">[day-news]{date=d/m/Y H:i}[/day-news]</time>
	</div>
	<div class="text">
		{short-story}
		[edit-date]<p class="editdate grey">Article is edited by: <b>{editor}</b> - {edit-date}<br>
		[edit-reason]Reason: {edit-reason}[/edit-reason]</p>[/edit-date]
	</div>
	<div class="category grey">
		<svg class="icon icon-cat"><use xlink:href="#icon-cat"></use></svg>
		{link-category}
	</div>
	<div class="story_tools">
		<div class="story_tools_in">
			<a href="{full-link}" title="Read more: {title}" class="btn"><span class="more_icon"><i></i><i></i><i></i></span></a>
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
			<li class="meta_author" title="Author">
				<svg class="icon icon-author"><use xlink:href="#icon-author"></use></svg>{author}
			</li>
			<li class="meta_coms" title="Comments: {comments-num}">[com-link]<svg class="icon icon-coms"><use xlink:href="#icon-coms"></use></svg>{comments-num}[/com-link]</li>
			<li class="meta_views" title="Views: {views}"><svg class="icon icon-view"><use xlink:href="#icon-view"></use></svg>{views}</li>
		</ul>
	</div>
</article>