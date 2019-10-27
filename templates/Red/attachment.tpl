[allow-download]
	<div class="attachment">
		<a href="{link}" title="{name}">
			<svg class="icon icon-arrow_right"><use xlink:href="#icon-arrow_right"></use></svg>
			<b>{name}</b> [count] [{size}] (downloads: {count})[/count]
		</a>
		[allow-online]<br />See the file online: <a href="{online-view-link}" target="_blank">{name}</a>[/allow-online]
	</div>
[/allow-download]
[not-allow-download]
	<div class="attachment_error">You do not have access to download files from our server</div>
[/not-allow-download]