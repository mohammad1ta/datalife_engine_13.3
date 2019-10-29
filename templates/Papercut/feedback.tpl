<section class="section">

	<header class="section-main-title">
		<h3><span>تماس با ما</span></h3>
	</header>

	<div class="content">

		<div class="section-box">
		چنانچه در استفاده از خدمات سایت به مشکلی برخورد کردید و یا پیشنهاد، انتقاد و نظری دارید می توانید از طریق فرم زیر، با ما تماس بگیرید.<br/><br/>
		توجه داشته باشید همه پیام‌های رسیده به ما مورد بررسی قرار می گیرند ولی بر حسب نیاز و صلاحدید به آنها پاسخ داده خواهد شد.
		</div>

		<div class="feedback-form">

			<table class="tableform" width="100%">
				<tr>
					<td colspan="2">
						پر نمودن فیلدهای ستاره دار، الزامی می‌باشد.
					</td>
				</tr>
				[not-logged]
				<tr>
					<td class="label">نام شما: *</td>
					<td><input type="text" maxlength="35" name="name" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">ایمیل شما: *</td>
					<td><input type="text" maxlength="35" name="email" class="f_input" dir="ltr" /></td>
				</tr>
				[/not-logged]
				<tr>
					<td width="20%" class="label">ارسال به: *</td>
					<td width="80%">{recipient}</td>
				</tr>
				<tr>
					<td class="label">عنوان: *</td>
					<td><input type="text" maxlength="45" name="subject" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label" valign="top">متن پیغام: *</td>
					<td><textarea name="message" class="f_textarea" /></textarea></td>
				</tr>
				[attachments]
				<tr>
					<td class="label" valign="top">فایل ضمیمه:</td>
					<td><input name="attachments[]" type="file" multiple></td>
				</tr>
				[/attachments]
				[sec_code]
				<tr>
					<td class="label">کد را وارد کنید: *</td>
					<td>
						<div>{code}</div>
						<div><input type="text" maxlength="45" name="sec_code" style="width:160px; margin-top: 5px;" class="f_input" dir="ltr" /></div>
					</td>
				</tr>
				[/sec_code]
				[recaptcha]
				<tr>
					<td class="label">دو کلمه نمایش داده شده در تصویر را وارد کنید:<span class="impot">*</span></td>
					<td><div>{recaptcha}</div></td>
				</tr>
				[/recaptcha]
				[question]
					<tr>
						<td class="label">سوال امنیتی:</td>
						<td>{question}</td>
					</tr>
					<tr>
						<td class="label">پاسخ: *</td>
						<td><div><input type="text" name="question_answer" id="question_answer" class="f_input" /></div></td>
					</tr>
				[/question]
				<tr>
					<td>&nbsp;</td>
					<td><button name="send_btn" class="submit" type="submit">ارسال</button></td>
				</tr>
			</table>

		</div>

	</div>

</section>