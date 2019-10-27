<div class="greenmenu">
	<!-- Search -->
	<form id="q_search" method="post">
		<div class="q_search">
			<input id="story" name="story" placeholder="Search..." type="search">
			<button class="q_search_btn" type="submit" title="Find"><svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg><span class="title_hide">Find</span></button>
		</div>
		<input type="hidden" name="do" value="search">
		<input type="hidden" name="subaction" value="search">
	</form>
	<!-- / Search -->
	<nav class="menu">
		<a[available=main] class="active"[/available] href="/" title="Main">Main</a>
		<a[available=feedback] class="active"[/available] href="/index.php?do=feedback" title="Contacts">Contacts</a>
		<a[available=rules] class="active"[/available] href="/rules.html" title="Rules">Rules</a>
		{catmenu}
	</nav>
</div>