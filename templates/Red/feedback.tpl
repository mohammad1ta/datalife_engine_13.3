<div class="block story shadow">
	<div class="wrp clrfix">
		<div class="head">
			<h1 class="title h2 ultrabold">Feedback</h1>
		</div>
		<div class="feedback clrfix">
			<div class="grid_1_4 right grid_last">
				<b>Adresse</b><br>
				660093, Krasnoyarsk, Kapitanskaya st., 12, office 43<br>
				<br>
				<b>Telefon</b><br>
				8 (391) <b>217-99-79</b><br>
			</div>
			<div class="grid_3_4">
				<ul class="ui-form">
					[not-logged]
					<li class="form-group combo">
						<div class="combo_field"><input placeholder="Your name" type="text" maxlength="35" name="name" id="name" class="wide" required></div>
						<div class="combo_field"><input placeholder="Your e-mail" type="email" maxlength="35" name="email" id="email" class="wide" required></div>
					</li>
					[/not-logged]
					<li class="form-group">
						<label>To</label>
						{recipient}
					</li>
					<li class="form-group">
						<input placeholder="Topic" type="text" maxlength="45" name="subject" id="subject" class="wide" required>
					</li>
					<li class="form-group">
						<textarea placeholder="Message" name="message" id="message" rows="8"[not-logged] style="height: 140px;"[/not-logged] class="wide" required></textarea>
					</li>
					[attachments]
						<li class="form-group">
							<label for="question_answer">Attachments:</label>
							<input name="attachments[]" type="file" multiple>
						</li>
					[/attachments]
					[recaptcha]
					<li class="form-group">{recaptcha}</li>
					[/recaptcha]
					[question]
					<li class="form-group">
						<label for="question_answer">Question: {question}</label>
						<input placeholder="Answer" type="text" name="question_answer" id="question_answer" class="wide" required>
					</li>
					[/question]
				</ul>
				<div class="form_submit">
					[sec_code]
						<div class="c-capcha">
							{code}
							<input placeholder="Enter the code" title="Enter the code" type="text" name="sec_code" id="sec_code" required>
						</div>
					[/sec_code]
					<button class="btn" type="submit" name="send_btn"><b class="ultrabold">Send</b></button>
				</div>
			</div>
		</div>
	</div>
</div>
{include file="modules/map.tpl"}