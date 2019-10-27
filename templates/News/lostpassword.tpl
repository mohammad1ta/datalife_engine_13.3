<section class="section">

	<header class="section-main-title">
		<h3><span>بازیابی رمز عبور</span></h3>
	</header>

	<div class="content">

		در صورتی که رمز عبور خود را فراموش کرده اید، با استفاده از فرم زیر می توانید رمز عوبر خود را مجدد تنظیم نمائید:

		<table class="tableform" width="100%">
			<tr>
				<td colspan="2">
					* &nbsp; پر نمودن فیلدهای ستاره دار، الزامی می‌باشد.
				</td>
			</tr>
			<tr>
				<td width="30%" class="label">نام کاربری یا ایمیل: *</td>
				<td width="70%"><input class="f_input" type="text" name="lostname" dir="ltr" /></td>
			</tr>
			[sec_code]
			<tr>
				<td class="label">کد تصویری موجود <br/> در تصویر را وارد نماييد: *</td>
				<td>
					<div>{code}</div>
					<div><input class="f_input" style="margin-top: 6px" dir="ltr" maxlength="45" name="sec_code" size="14" /></div>
				</td>
			</tr>
			[/sec_code]
			[recaptcha]
			<tr>
				<td class="label">دو کد تصویری موجود <br/> در تصویر را وارد نماييد: *</td>
				<td><div>{recaptcha}</div></td>
			</tr>
			[/recaptcha]
			<tr>
				<td class="label">&nbsp;</td>
				<td><button name="submit" class="submit" type="submit">ارسال</button></td>
			</tr>
		</table>

	</div>

</section>