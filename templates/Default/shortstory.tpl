<article class="box story[fixed] fixed_story[/fixed] shortstory">
	<div class="box_in">
		[not-group=5]
		<ul class="story_icons">
			<li class="fav_btn">
				[add-favorites]<span title="Add to favorites"><svg class="icon icon-fav"><use xlink:href="#icon-fav"></use></svg></span>[/add-favorites]
				[del-favorites]<span title="Remove from favorites"><svg class="icon icon-star"><use xlink:href="#icon-star"></use></svg></span>[/del-favorites]
			</li>
			<li class="edit_btn">
				[edit]<i title="Edit">Edit</i>[/edit]
			</li>
		</ul>
		[/not-group]
		<h2 class="title"><a href="{full-link}">{title}</a></h2>
		<div class="text">
			{short-story}
			[edit-date]<p class="editdate grey">Article is edited by: <b>{editor}</b> - {edit-date}<br>
			[edit-reason]Reason: {edit-reason}[/edit-reason]</p>[/edit-date]
		</div>
		<div class="story_tools">
			<div class="category">
				<svg class="icon icon-cat"><use xlink:href="#icon-cat"></use></svg>
				{link-category}
			</div>
			<a href="{full-link}" title="Read more: {title}" class="btn"><b>Read more</b></a>
			[rating]
				<div class="rate">
					[rating-type-1]<div class="rate_stars">{rating}</div>[/rating-type-1]
					[rating-type-2]
					<div class="rate_like">
					[rating-plus]
						<svg class="icon icon-love"><use xlink:href="#icon-love"></use></svg>
						{rating}
					[/rating-plus]
					</div>
					[/rating-type-2]
					[rating-type-3]
					<div class="rate_like-dislike">
						[rating-plus]<span title="Like"><svg class="icon icon-like"><use xlink:href="#icon-like"></use></svg></span>[/rating-plus]
						{rating}
						[rating-minus]<span title="Dislike"><svg class="icon icon-dislike"><use xlink:href="#icon-dislike"></use></svg></span>[/rating-minus]
					</div>
					[/rating-type-3]
					[rating-type-4]
					<div class="rate_like-dislike">
						<span class="ratingtypeplusminus ignore-select ratingplus">{likes}</span>
						[rating-plus]<span title="Like"><svg class="icon icon-like"><use xlink:href="#icon-like"></use></svg></span>[/rating-plus]
						<span class="ratingtypeplusminus ratingminus ignore-select">{dislikes}</span>
						[rating-minus]<span title="Dislike"><svg class="icon icon-dislike"><use xlink:href="#icon-dislike"></use></svg></span>[/rating-minus]
					</div>
					[/rating-type-4]
				</div>
			[/rating]
		</div>
		[fixed]<span class="fixed_label" title="Fixed"></span>[/fixed]
	</div>
	<div class="meta">
		<ul class="right">
			<li class="complaint" title="Complaint">[complaint]<svg class="icon icon-bad"><use xlink:href="#icon-bad"></use></svg><span class="title_hide">complaint</span>[/complaint]</li>
			<li class="grey" title="Views: {views}"><svg class="icon icon-views"><use xlink:href="#icon-views"></use></svg> {views}</li>
			<li title="Comments: {comments-num}">[com-link]<svg class="icon icon-coms"><use xlink:href="#icon-coms"></use></svg> {comments-num}[/com-link]</li>
		</ul>
		<ul class="left">
			<li class="story_date"><svg class="icon icon-info"><use xlink:href="#icon-info"></use></svg> {author}<span class="grey"> from </span><time datetime="{date=Y-m-d}" class="grey">[day-news]{date}[/day-news]</time></li>
		</ul>
	</div>
</article>