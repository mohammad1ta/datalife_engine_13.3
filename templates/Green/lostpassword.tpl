<div class="block story">
	<h1 class="title h2">بازیابی کلمه عبور</h1>
	<ul class="ui-form">
		<li class="form-group">
			<label for="lostname">ایمیل یا نام کاربری خود را وارد کنید:</label>
			<input type="text" name="lostname" id="lostname" class="wide" required>
		</li>
	[recaptcha]
		<li>{recaptcha}</li>
	[/recaptcha]
	</ul>
	<div class="form_submit">
		[sec_code]
			<div class="c-capcha">
				{code}
				<input placeholder="کد را وارد کنید" title="کد را وارد کنید" type="text" name="sec_code" id="sec_code" required>
			</div>
		[/sec_code]
		<button class="btn" name="submit" type="submit">ارسال</button>
	</div>
</div>