[not-group=5]
<a id="login-btn" class="logged ico">{login}</a>
<div id="lg-dialog" title="About" class="wideDialog">
	<a id="lg-close" class="thd">Close</a>
	<ul id="usermenu">
		<li><a href="{profile-link}">My profile</a></li>
		<li><a href="{pm-link}">Messages ({new-pm} | {all-pm})</a></li>
		<li><a href="{favorites-link}">My favorites</a></li>
		<li><a href="{stats-link}">Statistics</a></li>
		<li><a href="{newposts-link}">Unread</a></li>
		<li><a href="{logout-link}">Log out!</a></li>
	</ul>
</div>
[/not-group]
[group=5]
<a id="login-btn" class="ico">Log in</a>
<div id="lg-dialog" title="Авторизация" class="wideDialog">
	<a id="lg-close" class="thd">Close</a>
	<form class="login-form" method="post" action="">
		<ul>
			<li><label for="login_name">{login-method}</label>
			<input class="f_input" type="text" name="login_name" id="login_name" ></li>
			<li><label for="login_password">Password:</label>
			<input class="f_input" type="password" name="login_password" id="login_password" ></li>
		</ul>
		<div class="submitline">
			<button onclick="submit();" type="submit" title="Войти" class="btn f_wide">Submit</button>
		</div>
		<div class="log-links">
			<a href="{lostpassword-link}">Forgot it?</a> |
			<a href="{registration-link}">Registration</a>
		</div>
		<input name="login" type="hidden" id="login" value="submit">
	</form>
</div>
[/group]