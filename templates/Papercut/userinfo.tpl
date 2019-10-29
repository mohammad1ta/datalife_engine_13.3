<section class="section">

	<header class="section-main-title">
		<h3><span>پروفایل کاربری {usertitle}</span></h3>
	</header>

	<div class="content">

		<div class="userinfo">
			<div class="avatar"><img src="{foto}" alt=""/></div>
			<table width="100%">
				<tr>
					<td width="30%">نام کامل:</td>
					<td width="70%">{fullname}</td>
				</tr>
				<tr>
					<td>گروه کاربری:</td>
					<td>{status} [time_limit]&nbsp;گروه ارتقاء یافته: {time_limit}[/time_limit]</td>
				</tr>
				<tr>
					<td>محل سکونت:</td>
					<td>{land}</td>
				</tr>
				<tr>
					<td>آخرین بازدید از سایت:</td>
					<td>{lastdate}</td>
				</tr>
				<tr>
					<td>تاریخ عضویت:</td>
					<td>{registration}</td>
				</tr>
				<tr>
					<td>وضعیت در سایت:</td>
					<td>[online]<i class="fa fa-check-circle"></i> آنلاین[/online][offline]<i class="fa fa-times"></i> آفلاین[/offline]</td>
				</tr>
				<tr>
					<td>تعداد مطالب:</td>
					<td>{news-num} ( {news} ) [rss]<i class="fa fa-rss"></i>[/rss]</td>
				</tr>
				<tr>
					<td>نظرات:</td>
					<td>{comm-num} ( {comments} )</td>
				</tr>
				<tr>
					<td>احراز هویت 2 مرحله ای:</td>
					<td>{twofactor-auth}</td>
				</tr>
				<tr>
					<td>رتبه:</td>
					<td>{rate}</td>
				</tr>
				<tr>
					<td>اطلاعات شخصی:</td>
					<td>{info}</td>
				</tr>
			</table>
			<div class="left">
				{edituser}
			</div>
			<div class="clear"></div>
		</div>

	</div>

</section>

[not-logged]
<div id="options" style="display:none;">

	<section class="section">

		<header class="section-main-title">
			<h3><span>ویرایش مشخصات</span></h3>
		</header>

		<div class="content">

			<table class="tableform" width="100%">
				<tr>
					<td width="30%">نام کامل:</td>
					<td width="70%" colspan="2"><input type="text" name="fullname" value="{fullname}" class="f_input" /></td>
				</tr>
				<tr>
					<td>پست الکترونیک:</td>
					<td colspan="2">
						<input type="text" name="email" value="{editmail}" class="f_input en ltr" /><br />
						<div class="checkbox">{hidemail}</div>
						<div class="checkbox"><input type="checkbox" id="subscribe" name="subscribe" value="1" /> <label for="subscribe">عدم دریافت ایمیل خبرنامه</label></div>
					</td>
				</tr>
				<tr>
					<td>محل سکونت:</td>
					<td colspan="2"><input type="text" name="land" value="{land}" class="f_input" /></td>
				</tr>
				<tr>
					<td>لیست سیاه:</td>
					<td colspan="2">{ignore-list}</td>
				</tr>
				<tr>
					<td>رمزعبور فعلی:</td>
					<td colspan="2"><input type="password" name="altpass" class="f_input en ltr" /></td>
				</tr>
				<tr>
					<td>رمزعبور جدید:</td>
					<td colspan="2"><input type="password" name="password1" class="f_input en ltr" /></td>
				</tr>
				<tr>
					<td>تکرار رمزعبور جدید:</td>
					<td colspan="2"><input type="password" name="password2" class="f_input en ltr" /></td>
				</tr>
				<tr>
					<td>آواتار:</td>
					<td colspan="2">
						آپلود از کامپیوتر:<br/>
						<input type="file" name="image" class="f_input" /><br /><br />
						سرویس <a href="http://www.gravatar.com/" target="_blank">گراواتار</a>:<br/>
						<input type="text" name="gravatar" value="{gravatar}" placeholder="you@example.com" class="f_input en ltr" /> (آدرس ایمیل در این سرویس را وارد نمائید)
						<br /><br /><div class="checkbox"><input type="checkbox" name="del_foto" id="del_foto" value="yes" /> <label for="del_foto">حذف تصویر</label></div>
					</td>
				</tr>
				<tr>
					<td>منطقه زمانی:</td>
					<td colspan="2">{timezones}</td>
				</tr>
				<tr>
					<td>اطلاعات من:</td>
					<td colspan="2"><textarea name="info" style="width:98%;" rows="5" class="f_textarea">{editinfo}</textarea></td>
				</tr>
				<tr>
					<td>امضا:</td>
					<td colspan="2"><textarea name="signature" style="width:98%;" rows="5" class="f_textarea">{editsignature}</textarea></td>
				</tr>
				{xfields}
				
				<tr>
					<td>&nbsp;</td>
				  <td colspan="2">{twofactor-auth}</td>
				</li>
				<tr>
					<td>&nbsp;</td>
					<td colspan="2"><input class="submit" type="submit" name="submit" value="ذخیره" /></td>
				</tr>
			</table>
			<input name="submit" type="hidden" id="submit" value="submit" />

		</div>

	</section>

</div>
[/not-logged]