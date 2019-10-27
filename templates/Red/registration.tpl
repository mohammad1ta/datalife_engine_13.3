<div class="block story">
	<div class="wrp">
		<div class="grid_3_4 none">
			<div class="head">
				<h1 class="title h2 ultrabold">
					[registration]ثبت نام کاربر جدید[/registration]
					[validation]بروزرسانی مشخصات کاربر[/validation]
				</h1>
			</div>
			<div class="text regtext">
				[registration]
					<b> سلام, به وبسایت ما خوش آمدید! </b> <br/>
با عضویت در سایت ما سطح دسترسی شما به امکانات سایت افزایش خواهد داشت.
می توانید در سایت مطالب خود را انتشار دهید، ارسال نطر، مشاهده نوشته های پنهان، و به خیلی امکانات بیشتری دسترسی خواهید داشت.
<br/> اگر شما با هرگونه مشکلی در عضویت مواجه شدید، لطفا به <a href="/index.php?do=feedback"> مدیریت </a> سایت اطلاع دهید.
				[/registration]
				[validation]
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
							<button class="btn" title="بررسی آزاد بودن نام کاربری" onclick="CheckLogin(); return false;">چک کردن</button>
						</div>
						<div id="result-registration"></div>
					</li>
					<li class="form-group imp">
						<label for="password1">رمز عبور</label>
						<input type="password" name="password1" id="password1" class="wide" required>
					</li>
					<li class="form-group imp">
						<label for="password2">تکرار رمز عبور</label>
						<input type="password" name="password2" id="password2" class="wide" required>
					</li>
					<li class="form-group imp">
						<label for="email">ایمیل</label>
						<input type="email" name="email" id="email" class="wide" required>
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
						<label for="fullname">نام کامل</label>
						<input type="text" id="fullname" name="fullname" class="wide">
					</li>
					<li class="form-group">
						<label for="land">زادگاه</label>
						<input type="text" id="land" name="land" class="wide">
					</li>
					<li class="form-group">
						<label for="image">درباره من</label>
						<textarea id="info" name="info" rows="5" class="wide"></textarea>
					</li>
					<li class="form-group">
						<label for="image">آواتار</label>
						<input type="file" id="image" name="image" class="wide">
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
						<input placeholder="کاراکترها را وارد نمایید" title="کاراکترهای موجود در تصویر را وارد نمایید" type="text" name="sec_code" id="sec_code" required>
					</div>
				[/sec_code]
				[/registration]
				<button class="btn" name="submit" type="submit"><b class="ultrabold">[registration]ثبت[/registration][validation]بروزرسانی[/validation]</b></button>
			</div>
		</div>
	</div>
</div>