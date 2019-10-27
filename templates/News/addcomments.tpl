<section class="section">

	<header class="section-main-title">
		<h3><span>ارسال نظر</span></h3>
	</header>

	<table class="tableform" width="100%">
			[not-logged]
			<tr>
				<td class="label">نام:<span class="impot">*</span></td>
				<td><input type="text" name="name" id="name" class="f_input" /></td>
			</tr>
			<tr>
				<td class="label">ایمیل:<span class="impot">*</span></td>
				<td><input type="text" name="mail" id="mail" dir="ltr" class="f_input" /></td>
			</tr>
			[/not-logged]
			<tr>
				<td valign="top" width="22%">متن نظر:</td>
				<td class="editorcomm" width="88%">{editor}</td>
			</tr>
			[question]  
			<tr>  
				<td class="label">سوال:</td>  
				<td>{question}</td>  
			</tr>
			<tr>  
				<td class="label">پاسخ:<span class="impot">*</span></td>
				<td><input type="text" name="question_answer" id="question_answer" class="f_input" /></td>
			</tr>
			[/question]
			[sec_code]
			<tr>
				<td class="label">کد را وارد کنید: <span class="impot">*</span></td>
				<td>
					<div>{sec_code}</div>
					<div><input type="text" name="sec_code" id="sec_code" style="width:160px; margin-top: 10px;" class="f_input ltr" /></div>
				</td>
			</tr>
			[/sec_code]
			[recaptcha]
			<tr>
				<td class="label">دو کلمه نمایش داده شده در تصویر را وارد کنید: <span class="impot">*</span></td>
				<td>{recaptcha}</td>
			</tr>
			[/recaptcha]
			<tr>
				<td>&nbsp;</td>
				<td><button type="submit" name="submit" class="submit">[not-aviable=comments]افزودن[/not-aviable][aviable=comments]ویرایش[/aviable]</button></td>
			</tr>
		</table>

</section>