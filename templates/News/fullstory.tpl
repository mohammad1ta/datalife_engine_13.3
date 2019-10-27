<article class="section" id="fullnews">

	<header class="oh">

		<div class="fullnews-date">
			<span>{date=m/j}</span>
			{date=Y}
		</div>

		<div class="section-main-title">
			<h3><span>[full-link]{title}[/full-link]</span></h3>
		</div>

	</header>

	<div class="fullnews-s">
		{full-story}
	</div>

	<footer class="section-footer news-footer">

		<div class="right">دسته بندی: {link-category}</div>
		<div class="left">
			 <span>بازدیدها: <strong>{views}</strong></span>
			 <span>نظرات: <strong>{comments-num}</strong></span>
			 <span>نویسنده: {author}</span>
		</div>

		<div class="clear"></div>

		تگ های مطلب : {tags}

	</footer>

</article>

{comments}
{navigation}
{addcomments}
