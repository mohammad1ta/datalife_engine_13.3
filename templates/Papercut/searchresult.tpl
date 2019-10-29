[searchposts]
[fullresult]
<article class="article">

	<div class="post-category">{link-category}</div>

	<div class="post-image">
		<img src="{image-1}" alt="{title limit="20"}" />
		<div class="post-image-dark">
			<a href="{full-link}">مشاهده ادامه خبر</a>
		</div>
	</div>

	<header class="post-head">

		<h2>[full-link]{title}[/full-link]</h2>

		<div class="post-info">
			<ul>
				<li>توسط {author}</li>
				<li>در <strong>{date=d M Y}</strong></li>
				<li>با <strong>{comments-num}</strong> نظر</li>
			</ul>
		</div>

	</header>

	<div class="post-content">
		<p>
			{short-story limit="100"}...
		</p>
	</div>

</article>
[/fullresult]
[shortresult]
<div class="dpad searchitem">
	<h3>[full-link]{title}[/full-link]</h3>
	<b>[day-news]{date}[/day-news]</b> | {link-category} | Author: {author}
</div>
[/shortresult]
[/searchposts]








