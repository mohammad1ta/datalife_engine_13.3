[not-group=5]
<a id="login-btn" class="logged ico">{login}</a>
<div id="lg-dialog" title="درباره" class="wideDialog">
	<a id="lg-close" class="thd">پنل کاربری</a>
	<ul id="usermenu">
		<li><a href="{profile-link}">پروفايل کاربری</a></li>
		<li><a href="{pm-link}">پيغام خصوصی ({new-pm} | {all-pm})</a></li>
		<li><a href="{favorites-link}">علاقمندی‌ها</a></li>
		<li><a href="{stats-link}">آمار سايت</a></li>
		<li><a href="{newposts-link}">مطالب جديد</a></li>
		<li><a href="{logout-link}">خروج از سايت!</a></li>
	</ul>
</div>
[/not-group]
[group=5]
<a id="login-btn" class="ico">ورود</a>
<div id="lg-dialog" title="authorization" class="wideDialog">
	<a id="lg-close" class="thd">بستن</a>
	<form class="login-form" method="post" action="">
		<ul>
			<li><label for="login_name">{login-method}</label>
			<input class="f_input" type="text" name="login_name" id="login_name" dir="ltr" ></li>
			<li><label for="login_password">رمز عبور:</label>
			<input class="f_input" type="password" name="login_password" id="login_password" dir="ltr" ></li>
		</ul>
		<div class="submitline">
			<button onclick="submit();" type="submit" title="ورود" class="btn f_wide">ورود</button>
		</div>
		<div class="log-links">
			<a href="{lostpassword-link}">بازیابی رمز عبور</a> |
			<a href="{registration-link}">عضويت در سايت</a>
		</div>
		<input name="login" type="hidden" id="login" value="submit">
	</form>
</div>
[/group]