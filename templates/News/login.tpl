[not-group=5]
<a href="#" class="omodal" data-modal-title="پنل کاربری" data-modal-content="
	<div class='user-panel-box'>
		<div class='avatar'>
			<img src='{foto}' alt='{login}' />
			[admin-link]<a href='{admin-link}' target='_blank' style='color: #7CE1FF;'>پنل مدیریت</a><br/>[/admin-link]
			<a href='{logout-link}'>خروج</a>
		</div>
		<div class='user-info'>
			<ul>
				<li><a href='{profile-link}'>پروفایل شخصی</a></li>
				<li><a href='{addnews-link}'>ارسال مطلب</a></li>
				<li><a href='{pm-link}' title='خوانده نشده: {new-pm} | کل: {all-pm}'>پیغام خصوصی&nbsp; (<span class='en'>{new-pm}|{all-pm}</span>)</a></li>
				<li><a href='{favorites-link}'>علاقه‌مندی ها (<span class='en'>{favorite-count}</span>)</a></li>
				<li><a href='{newposts-link}'>مطالب جدید</a></li>
				<li><a href='/?do=lastcomments'>آخرین نظرات</a></li>
			</ul>
		</div>
	</div>
	">
	<img src="{THEME}/images/user.png" alt="" /> خوش آمدید {login}
</a>


[/not-group]
[group=5]

<a href="#" class="omodal" data-modal-title="ورود کاربری" data-modal-content="
		<div class='login-box'>
			<form method='post' action=''>
				<div class='login-desc'>جهت ورود به پنل کاربری خود، نام کاربری و رمز عبور را وارد نمائید:</div>
				<input type='text' name='login_name' placeholder='نام کاربری یا آدرس ایمیل' />
				<input type='password' name='login_password' placeholder='رمز عبور' />
				<label>
					<input type='checkbox' name='login_not_save' id='login_not_save' value='1' class='valign' /> رمز عبورم را ذخیره نکن
				</label>
				<div class='clear'></div>
				<div class='right'>
					<input type='submit' value='ورود به سایت' />
				</div>
				<div class='left'>
					<a href='{lostpassword-link}'>بازیابی رمز عبور</a>
				</div>
				<div class='clear'></div>
				<input name='login' type='hidden' id='login' value='submit' />
			</form>
		</div>
	">
	<img src="{THEME}/images/login.png" alt="" /> ورود
</a>
<a href="{registration-link}">
	<img src="{THEME}/images/user.png"  alt="" /> ثبت نام
</a>
[/group]