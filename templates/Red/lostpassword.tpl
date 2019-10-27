<div class="block story">
	<div class="wrp">
		<div class="head">
			<h1 class="title h2 ultrabold">Recover password</h1>
		</div>
		<ul class="ui-form">
			<li class="form-group">
				<label for="lostname">Your login or e-mail on the website:</label>
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
					<input placeholder="Enter the code" title="Enter the code" type="text" name="sec_code" id="sec_code" required>
				</div>
			[/sec_code]
			<button class="btn" name="submit" type="submit"><b class="ultrabold">Submit</b></button>
		</div>
	</div>
</div>