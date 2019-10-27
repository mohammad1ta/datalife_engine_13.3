<article class="story">
	<div class="userinfo_top">
		<div class="avatar">
			<a href="#"><span class="cover" style="background-image: url({foto});">{usertitle}</span></a>
		</div>
		<h1 class="title h2">کاربر: {usertitle}</h1>
		<div class="userinfo_status">[online]<span style="color: #70bb39;">آنلاین</span>[/online][offline]آفلاین[/offline]</div>
		<ul class="user_tab">
			<li class="active"><a href="#user1" data-toggle="tab">مشخصات کاربری</a></li>[not-logged]<li><a href="#user2" data-toggle="tab">ویرایش پروفایل</a></li>[/not-logged][not-group=5]<li>{pm}</li>[/not-group]
		</ul>
	</div>
	<div class="block">
		<div class="tab-content">
			<div class="tab-pane active" id="user1">
				<ul class="usinf">
					<li><div class="ui-c1 grey">نام کامل</div> <div class="ui-c2">{fullname}[not-fullname]وارد نشده[/not-fullname]</div></li>
					<li><div class="ui-c1 grey">محل سکونت</div> <div class="ui-c2">{land}[not-land]وارد نشده[/not-land]</div></li>
					<li><div class="ui-c1 grey">تاریخ عضویت</div> <div class="ui-c2">{registration}</div></li>
					<li><div class="ui-c1 grey">آخرین بازدید</div> <div class="ui-c2">{lastdate}</div></li>
					<li><div class="ui-c1 grey">گروه کاربری</div> <div class="ui-c2">{status}</div></li>
				</ul>
				<br>
				<ul class="usinf">
					<li><div class="ui-c1 grey">تعداد مطالب</div> <div class="ui-c2">{news-num}&nbsp;&nbsp; [ {news} ]</div></li>
					<li><div class="ui-c1 grey">تعداد نظرات</div> <div class="ui-c2">{comm-num}&nbsp;&nbsp; [ {comments} ]</div></li>
					<li><div class="ui-c1 grey">امتیاز</div> <div class="ui-c2">{rate}</div></li>
				</ul>
				<h4 class="heading">درباره من</h4>
				<p>{info}</p>
				[signature]
					<h4 class="heading">امضا</h4>
					{signature}
				[/signature]
			</div>
			[not-logged]
			<div class="tab-pane" id="user2">
				<!-- User settings -->
				<div id="options">
					<div class="addform">
						<ul class="ui-form">
							<li class="form-group">
								<label for="fullname">نام شما</label>
								<input type="text" name="fullname" id="fullname" value="{fullname}" class="wide">
							</li>
							<li class="form-group">
								<label for="email">ایمیل شما</label>
								<input type="email" name="email" id="email" value="{editmail}" class="wide" required>
								<div class="checkbox">{hidemail}</div>
							</li>
							<li class="form-group">
								<label for="land">محل سکونت</label>
								<input type="text" name="land" id="land" value="{land}" class="wide">
							</li>
							<li class="form-group">
								<label>منطقه زمانی</label>
								{timezones}
							</li>
							<li class="form-group form-sep"></li>
							<li class="form-group">
								<label for="altpass">پسورد قبلی</label>
								<input type="password" name="altpass" id="altpass" class="wide">
							</li>
							<li class="form-group">
								<label for="password1">پسورد جدید</label>
								<input type="password" name="password1" id="password1" class="wide">
							</li>
							<li class="form-group">
								<label for="password2">تکرار پسورد جدید</label>
								<input type="password" name="password2" id="password2" class="wide">
							</li>
							<li class="form-group form-sep"></li>
							<li class="form-group">
								<label for="image">آواتار</label>
								<input type="file" name="image" id="image" class="wide">
							</li>
							<li class="form-group">
								<input placeholder="(آدرس ايميل در اين سرويس را وارد نمائيد)" type="text" name="gravatar" id="gravatar" value="{gravatar}" class="wide">
							</li>
							<li class="form-group">
								<div class="checkbox"><input type="checkbox" name="del_foto" id="del_foto" value="yes" /> <label for="del_foto">حذف آواتار</label></div>
							</li>
							<li class="form-group form-sep"></li>
							<li class="form-group">
								<label for="info">درباره من</label>
								<textarea name="info" id="info" rows="5" class="wide">{editinfo}</textarea>
							</li>
							<li class="form-group">
								<label for="signature">امضا</label>
								<textarea name="signature" id="signature" rows="3" class="wide">{editsignature}</textarea>
							</li>
							<li class="form-group form-sep"></li>
							<li class="form-group">
								<label for="signature">لیست سیاه:</label>
								{ignore-list}
							</li>
							<li class="form-group form-sep"></li>
							[group=1,2,3]
							<li class="form-group">
								<label for="allowed_ip">قفل کردن IP</label>
								<textarea placeholder="برای مثال: 192.48.25.71 or 129.42.*.* or 129.42.0.0/16" name="allowed_ip" id="allowed_ip" rows="5" class="field wide">{allowed-ip}</textarea>
							</li>
							[/group]
							<li class="form-group">
								<table class="xfields">
								{xfields}
								</table>
							</li>
							<li class="form-group">
							  <div class="checkbox">{twofactor-auth}</div>
							</li>
							<li class="form-group">
								<div class="checkbox">{news-subscribe}</div>
							</li>
							<li class="form-group">
								<div class="checkbox">{comments-reply-subscribe}</div>
							</li>
							<li class="form-group">
								<div class="checkbox">{unsubscribe}</div>
							</li>
						</ul>
						<div class="form_submit">
							<button class="btn btn-big" name="submit" type="submit"><b>ارسال</b></button>
							<input name="submit" type="hidden" id="submit" value="submit">
						</div>
					</div>
				</div>
				<!-- / User settings -->
			</div>
			[/not-logged]
		</div>
	</div>
</article>