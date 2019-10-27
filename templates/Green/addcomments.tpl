<div id="addcomment" class="block">
	<h4 class="title">ارسال نظر</h4>
	<div class="box_in">
		<ul class="ui-form">
		[not-logged]
			<li class="form-group combo">
				<div class="combo_field"><input placeholder="نام شما" type="text" name="name" id="name" class="wide" required></div>
				<div class="combo_field"><input placeholder="ایمیل شما" type="email" name="mail" id="mail" class="wide"></div>
			</li>
		[/not-logged]
			<li id="comment-editor">{editor}</li>    
		[recaptcha]
			<li>{recaptcha}</li>
		[/recaptcha]
		[question]
			<li class="form-group">
				<label for="question_answer">{question}</label>
				<input placeholder="پاسخ" type="text" name="question_answer" id="question_answer" class="wide" required>
			</li>
		[/question]
		</ul>
		<div class="form_submit">
		[sec_code]
			<div class="c-capcha">
				{sec_code}
				<input placeholder="کد را وادر کنید" title="Enter the code" type="text" name="sec_code" id="sec_code" required>
			</div>
		[/sec_code]
			<button class="btn" type="submit" name="submit" title="Add comment"><b>ارسال</b></button>
		</div>
	</div>
</div>