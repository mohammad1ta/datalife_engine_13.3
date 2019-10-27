<article class="post static">
	<h1>Recover password</h1>
</article>
<div class="ux-form">
	<ul class="ui-form">
		<li><input placeholder="Your login or e-mail on the website" class="f_input f_wide" type="text" name="lostname" id="lostname"></li>
		[sec_code]
		<li>
			<div class="c-captcha-box">
				<label for="sec_code">Enter the code:</label>
				<div class="c-captcha">
					{code}
					<input title="Enter the code" type="text" name="sec_code" id="sec_code" class="f_input" >
				</div>
			</div>
		</li>
		[/sec_code]
		[recaptcha]
		<li>
			<div>Confirm that you are not a robot</div>
			{recaptcha}
		</li>
		[/recaptcha]
	<div class="submitline">
		<button name="submit" class="btn f_wide" type="submit">Submit</button>
	</div>
</div>