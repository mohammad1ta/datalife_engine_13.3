<div class="block story">
	<h1 class="title h2">
		[registration]ثبت نام کاربر جدید[/registration]
		[validation] بروزرسانی مشخصات کاربری [/validation]
	</h1>
	<div class="text regtext">
	[registration]
	<b> سلام, به وبسایت ما خوش آمدید! </b> <br/>
	با عضویت در سایت ما سطح دسترسی شما به امکانات سایت افزایش خواهد داشت.
	می توانید در سایت مطالب خود را انتشار دهید، ارسال نطر، مشاهده نوشته های پنهان، و به خیلی امکانات بیشتری دسترسی خواهید داشت.
	<br/> اگر شما با هرگونه مشکلی در عضویت مواجه شدید، لطفا به <a href="/index.php?do=feedback"> مدیریت </a> سایت اطلاع دهید.
	[/registration]	[validation]
	<b> بازدید کننده عزیز, </b> <br/>
	حساب کاربری شما با موفقیت در سایت ما ایجاد شد.
	با این حال ، اطلاعات مربوط به شما ناقص است، بنابراین باید فیلد های زیر را باید پر کنید.
	[/validation]
	</div>
	<ul class="ui-form">
		[registration]
			<li class="form-group imp">
				<label for="name">نام کاربری</label>
				<div class="login_check">
					<input type="text" name="name" id="name" class="wide" required>
					<button class="btn" title="چک کردن نام کاربری" onclick="CheckLogin(); return false;">چک کردن نام کاربری</button>
				</div>
				<div id="result-registration"></div>
			</li>
			<li class="form-group imp">
				<label for="password1">کلمه عبور</label>
				<input type="password" name="password1" id="password1" class="wide ltr" required>
			</li>
			<li class="form-group imp">
				<label for="password2">تکرار کلمه عبور</label>
				<input type="password" name="password2" id="password2" class="wide ltr" required>
			</li>
			<li class="form-group imp">
				<label for="email">ایمیل</label>
				<input type="email" name="email" id="email" class="wide ltr" required>
			</li>
		[question]
			<li class="form-group">
				<label for="question_answer">{question}</label>
				<input placeholder="پاسخ" type="text" name="question_answer" id="question_answer" class="wide" required>
			</li>
		[/question]
		[recaptcha]
			<li>{recaptcha}</li>
		[/recaptcha]
		[/registration]
		[validation]
			<li class="form-group">
				<label for="fullname">نام شما</label>
				<input type="text" id="fullname" name="fullname" class="wide">
			</li>
			<li class="form-group">
				<label for="land">محل سکونت</label>
				<input type="text" id="land" name="land" class="wide">
			</li>
			<li class="form-group">
				<label for="image">درباره من</label>
				<textarea id="info" name="info" rows="5" class="wide"></textarea>
			</li>
			<li class="form-group">
				<label for="image">آواتار</label>
				<input type="file" id="image" name="image" class="wide ltr">
			</li>
			<li class="form-group">
				<table class="xfields">
					{xfields}
				</table>
			</li>
		[/validation]
	</ul>
	<div class="form_submit">
		[registration]
		[sec_code]
			<div class="c-capcha">
				{reg_code}
				<input placeholder="کد را وارد کنید" title="کد را وارد کنید" type="text" name="sec_code" id="sec_code" required>
			</div>
		[/sec_code]
		[/registration]
		<button class="btn" name="submit" type="submit">ثبت</button>
	</div>
</div>