[not-group=5]
<a id="login" class="h_btn login" href="{profile-link}" title="{login}, messages {new-pm}">
	<div class="avatar pmnum_{new-pm}">
		<span class="cover" style="background-image: url({foto});">{login}</span>
		<span class="num">{new-pm}</span>
	</div>
	<span class="icon_close">
		<i class="mt_1"></i><i class="mt_2"></i>
	</span>
</a>
<div id="loginpane" class="droptopbar loggedpane">
	<div class="wrp">
		<div class="name">
			Hallo, <a href="{profile-link}"><b>{login}</b></a>!
		</div>
		<ul class="login_menu">
			<li>
				<a href="{pm-link}"><b class="lm_num">{new-pm}</b>Messages</a>
			</li>
			<li>
				<a href="{favorites-link}"><b class="lm_num">{favorite-count}</b>My favorites</a>
			</li>
			<li>
				<a href="{logout-link}">Logout</a>
			</li>
		</ul>
		<div class="login_form_links">
			[admin-link]<a href="{admin-link}" target="_blank">Administration Panel</a>[/admin-link]
			<a href="{addnews-link}">Add news article</a>
		</div>
	</div>
</div>
[/not-group]
[group=5]
<a href="{profile-link}" id="loginf" class="h_btn login">
	<svg class="icon icon-login"><use xlink:href="#icon-login"></use></svg>
	<span class="title_hide">Login</span>
	<span class="icon_close">
		<i class="mt_1"></i><i class="mt_2"></i>
	</span>
</a>
<form class="droptopbar" id="loginpane" method="post">
	<div class="wrp">
		<ul class="login_form">
			<li class="form-group">
				<label for="login_name">{login-method}</label>
				<input placeholder="{login-method}" type="text" name="login_name" id="login_name" class="wide">
			</li>
			<li class="form-group">
				<label for="login_password">Password</label>
				<input placeholder="Password" type="password" name="login_password" id="login_password" class="wide">
			</li>
			<li>
				<button class="btn" onclick="submit();" type="submit" title="Submit">
					<b class="ultrabold">Submit</b>
				</button>
			</li>
		</ul>
		<div class="soc_links">
			[vk]<a href="{vk_url}" target="_blank" class="soc_vk">
				<svg class="icon icon-vk"><use xlink:href="#icon-vk"/></svg>
			</a>[/vk]
			[yandex]<a href="{yandex_url}" target="_blank" class="soc_ya">
				<svg class="icon icon-ya"><use xlink:href="#icon-ya"/></svg>
			</a>[/yandex]
			[facebook]<a href="{facebook_url}" target="_blank" class="soc_fb">
				<svg class="icon icon-fb"><use xlink:href="#icon-fb"/></svg>
			</a>[/facebook]
			[google]<a href="{google_url}" target="_blank" class="soc_gp">
				<svg class="icon icon-gp"><use xlink:href="#icon-gp"/></svg>
			</a>[/google]
			[odnoklassniki]<a href="{odnoklassniki_url}" target="_blank" class="soc_od">
				<svg class="icon icon-od"><use xlink:href="#icon-od"/></svg>
			</a>[/odnoklassniki]
			[mailru]<a href="{mailru_url}" target="_blank" class="soc_mail">
				<svg class="icon icon-mail"><use xlink:href="#icon-mail"/></svg>
			</a>[/mailru]
		</div>
		<input name="login" type="hidden" id="login" value="submit">
		<div class="login_form_links">
			<a href="{registration-link}">Registration</a>
			<a href="{lostpassword-link}">Forgot password?</a>
		</div>
	</div>
</form>
[/group]