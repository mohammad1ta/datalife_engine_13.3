<article class="article single">

	<header class="post-head">

		<h2>[full-link]{title}[/full-link]</h2>

		<div class="post-info">
			<ul>
				<li> بخش {link-category}</li>
				<li>توسط {author}</li>
				<li>در تاریخ <strong>{date=d M Y}</strong></li>
				<li>با <strong>{comments-num}</strong> نظر</li>
				<li>و <strong>{views}</strong>بازدید</li>
			</ul>
			<div class="left">
				[add-favorites]<i class="flaticon-heart-1" title="اضافه به علاقمندی ها"></i>[/add-favorites]
				[del-favorites]<i class="flaticon-heart" title="حذف از علاقمندی ها"></i>[/del-favorites]
				[edit]<i class="flaticon-edit-1" title="ویرایش خبر"></i>[/edit]
				[complaint]<i class="flaticon-chat-1" title="گزارش به مدیر"></i>[/complaint]
			</div>
		</div>

	</header>

	<div class="post-content">
		<p>
			{full-story}
		</p>
	</div>

</article>

[tags]
	<section class="tags-box">
		<i class="flaticon-tag"></i>
		<div class="tags-content">{tags}</div>
	</section>
[/tags]

<section class="section">
	[comments]
		<header class="section-main-title">
			<h3><span>نظرات کاربران</span></h3>
		</header>
	[/comments]

	{comments}
	{navigation}
	{addcomments}
</section>