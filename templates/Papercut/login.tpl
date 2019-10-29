[not-group=5]
	<strong>{login}</strong> خوش‌آمدید، <span class="login-button user-panel"><i class="flaticon-user"></i> پنل کاربری</span>
	<div class="login-bg">
		<div class="login-box">
			<i class="flaticon-close"></i>
			[admin-link]<a href='{admin-link}' class="admin-button fbutton" target='_blank'>پنل مدیریت</a><br/>[/admin-link]
			<img src='{foto}' alt='{login}' />
			<div class="center">
				<strong>{login}</strong> عزیز، خوش‌آمدید
			</div>
			<ul>
				<li><a href='{profile-link}'>پروفایل شخصی</a></li>
				<li><a href='{addnews-link}'>ارسال خبر</a></li>
				<li><a href='{pm-link}' title='خوانده نشده: {new-pm} | کل: {all-pm}'>پیغام خصوصی&nbsp; (<span>{new-pm} / {all-pm}</span>)</a></li>
				<li><a href='{favorites-link}'>علاقه‌مندی ها (<span>{favorite-count}</span>)</a></li>
				<li><a href='{newposts-link}'>مطالب جدید</a></li>
				<li><a href='{lastcomments-link}'>آخرین نظرات</a></li>
			</ul>
			<div class="center">
				<a href='{logout-link}' class="logout-button fbutton">خروج از سایت</a>
			</div>
		</div>
	</div>
[/not-group]
[group=5]

<div class="login-bg">
	<div class="login-box">
		<i class="flaticon-close"></i>
		<div class="login-title">ورود به سایت</div>

		<div class="login-form">
			<form method='post' action=''>
				<div class='login-desc'>جهت ورود به پنل کاربری خود، نام کاربری و رمز عبور را وارد نمائید:</div>
				<div class='form-input-area'>
					<i class="flaticon-user-1"></i>
					<input type='text' name='login_name' placeholder='نام کاربری یا آدرس ایمیل' />
				</div>
				<div class='form-input-area'>
					<i class="flaticon-key"></i>
					<input type='password' name='login_password' placeholder='رمز عبور' />
				</div>
				<label class="no-save">
					<input type='checkbox' name='login_not_save' id='login_not_save' value='1' class='valign' /> عدم ذخیره ماندن رمز عبور
				</label>
				<div class='clear'></div>
				<div class='right'>
					<input type='submit' class="fbutton" value='ورود به سایت' />
				</div>
				<div class='left'>
					<a href='{lostpassword-link}' class="lost-password-link">بازیابی رمز عبور</a>
				</div>
				<div class='clear'></div>
				<input name='login' type='hidden' id='login' value='submit' />
			</form>
		</div>
	</div>
</div>

<strong class="login-button">ورود</strong> /
<a href="{registration-link}">ثبت نام</a>
[/group]