<section class="section">

	<header class="section-main-title">
		<h3>
			<span>
				[registration]ثبت نام کاربر جدید[/registration]
				[validation]بروزرسانی مشخصات کاربری[/validation]
			</span>
		</h3>
	</header>

	<div class="content">

		[registration]
		<b> سلام, به وبسایت ما خوش آمدید! </b> <br/>
		با عضویت در سایت ما سطح دسترسی شما به امکانات سایت افزایش خواهد داشت.
		می توانید در سایت مطالب خود را انتشار دهید، ارسال نظر، مشاهده نوشته های پنهان و به خیلی امکانات بیشتری دسترسی خواهید داشت.
		<br/> اگر شما با هرگونه مشکلی در عضویت مواجه شدید، لطفا به <a href="/feedback.html"> مدیریت </a> سایت اطلاع دهید.
		[/registration]
		[validation]<b>کاربر گرامی،</b> <br/>حساب کاربری شما با موفقیت در سایت دیتالایف انجین ایجاد شد. در صورت تمایل، می توانید فیلدهای زیر را کامل کنید.[/validation]

		<table class="tableform" width="100%">
			<tr>
				<td colspan="2">
					<span class="impot">*</span> &nbsp; پر نمودن فیلدهای ستاره دار، الزامی می‌باشد.
				</td>
			</tr>
			[registration]
				<tr>
					<td class="label">نام کاربری: <span class="impot">*</span></td>
					<td>
						<input type="text" name="name" id='name' style="width:240px; margin-left: 6px;" class="f_input" dir="ltr" />
						<input class="submit blue" title="چک کردن نام کاربری" onclick="CheckLogin(); return false;" type="button" value="چک کردن نام کاربری" />
						<div id='result-registration'></div>
					</td>
				</tr>
				<tr>
					<td class="label">رمز عبور: <span class="impot">*</span></td>
					<td><input type="password" name="password1" class="f_input" dir="ltr" /></td>
				</tr>
				<tr>
					<td class="label">تکرار رمز عبور: <span class="impot">*</span></td>
					<td><input type="password" name="password2" class="f_input" dir="ltr" /></td>
				</tr>
				<tr>
					<td class="label">آدرس ایمیل: <span class="impot">*</span></td>
					<td><input type="text" name="email" class="f_input" dir="ltr" /></td>
				</tr>
				[question]  
				<tr>  
					<td class="label">سوال امنیتی:</td>  
					<td><div>{question}</div></td>  
				</tr>  
		            	<tr>
		            		<td class="label">پاسخ: <span class="impot">*</span></td>  
					<td><div><input type="text" name="question_answer" class="f_input" /></div></td>
				</tr>  
				[/question]  
				[sec_code]
				<tr>
					<td class="label">کد موجود در تصویر <br/> را وارد کنید: <span class="impot">*</span></td>
					<td>
						<div>{reg_code}</div>
						<div><input type="text" name="sec_code" style="width:160px; margin-top: 10px;" class="f_input" /></div>
					</td>
				</tr>
				[/sec_code]
				[recaptcha]
				<tr>
					<td class="label">دو کلمه نمایش داده شده در تصویر را وارد کنید: <span class="impot">*</span></td>
					<td><div>{recaptcha}</div></td>
				</tr>
				[/recaptcha]
			[/registration]
			[validation]
				<tr>
					<td class="label">نام کامل:</td>
					<td><input type="text" name="fullname" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">محل سکونت:</td>
					<td><input type="text" name="land" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">آواتار (تصویر کاربری):</td>
					<td><input type="file" name="image" style="width:304px; height:18px" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">درباره من:</td>
					<td><textarea name="info" style="width: 98%;" rows="8" class="f_textarea" /></textarea></td>
				</tr>
				{xfields}
			[/validation]
			<tr>
				<td>&nbsp;</td>
				<td><button name="submit" class="submit" type="submit">[registration]ثبت نام[/registration][validation]ثبت پروفایل[/validation]</button></td>
			</tr>
		</table>

	</div>

</section>