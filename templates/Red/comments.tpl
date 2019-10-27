<div class="comment[comments-author] com_author[/comments-author]" id="{comment-id}">
	<div class="avatar">
		[profile]<span class="cover" style="background-image: url({foto});">{login}</span>[/profile]
		<span class="com_decor"></span>
	</div>
	<div class="grid_1_4">
		[rating]
		<div class="rate">
			[rating-type-1]<div class="rate_stars">{rating}</div>[/rating-type-1]
			[rating-type-2]
				<div class="rate_like" title="Like">
				[rating-plus]
					<span class="rate_like_icon"><svg class="icon icon-like"><use xlink:href="#icon-like"></use></svg></span>
					<span class="grey">{rating}</span>
				[/rating-plus]
				</div>
			[/rating-type-2]
			[rating-type-3]
				<div class="rate_like-dislike">
					<div class="rate_like-dislike_in">
						[rating-plus]<span class="plus_icon" title="Like"><span>+</span></span>[/rating-plus]
						[rating-minus]<span class="plus_icon minus" title="Dislike"><span>-</span></span>[/rating-minus]
					</div>
					<span class="grey">{rating}</span>
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
	<div class="com_content">
		<div class="com_info">
			<b class="name">{author}</b>
			[online]<span title="Online" class="status online">Online</span>[/online]
			[offline]<span title="Offline" class="status offline">Offline</span>[/offline]
			<span class="grey date">{date}</span>
		</div>
		<div class="text">
			[available=lastcomments|search]<h5 class="title">{news_title}</h5>[/available]
			{comment}
			[signature]<div class="signature">--------------------<br />{signature}</div>[/signature]
		</div>
		<div class="com_tools">
			[not-group=5]
			<div class="mass">{mass-action}</div>
			<span class="edit_btn" title="Edit">
			[com-edit]<i></i>[/com-edit]
			</span>
			[/not-group]
			<div class="com_tools_links grey">
				[fast]<svg class="icon icon-meta_reply"><use xlink:href="#icon-meta_reply"></use></svg><span>Quote</span>[/fast]
				[treecomments] 
					[reply]<svg class="icon icon-meta_reply"><use xlink:href="#icon-meta_reply"></use></svg><span>Reply</span>[/reply]
				[/treecomments] 
				[com-del]<svg class="icon icon-cross"><use xlink:href="#icon-cross"></use></svg><span>Delete</span>[/com-del]
				[complaint]<svg class="icon icon-compl"><use xlink:href="#icon-compl"></use></svg><span>Complaint</span>[/complaint]
			</div>
		</div>
	</div>
</div>