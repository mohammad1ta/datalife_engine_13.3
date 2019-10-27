<div class="block story">
	<div class="wrp">
		<div class="grid_3_4 none">
			<div class="head">
				<h1 class="title h2 ultrabold">
					[registration]New user registration[/registration]
					[validation]User profile update[/validation]
				</h1>
			</div>
			<div class="text regtext">
				[registration]
					<b>Hello, dear visitor of our website!</b><br /><br />
					Registration on our site will allow you to become its full participant. 
					You will be able to add news on the website, write your comments, view the hidden text and more. In case of problems encountered during the registration process, please contact the website <a href="/index.php?do=feedback">Administrator</a>.
				[/registration]
				[validation]
					<b>Dear visitor,</b><br />
					Your account has been registered on our website, 
					but your profile information is incomplete. Please, fill in the additional fields of your profile.
				[/validation]
			</div>
			<ul class="ui-form">
				[registration]
					<li class="form-group imp">
						<label for="name">Login</label>
						<div class="login_check">
							<input type="text" name="name" id="name" class="wide" required>
							<button class="btn" title="Check" onclick="CheckLogin(); return false;">Check username</button>
						</div>
						<div id="result-registration"></div>
					</li>
					<li class="form-group imp">
						<label for="password1">Password</label>
						<input type="password" name="password1" id="password1" class="wide" required>
					</li>
					<li class="form-group imp">
						<label for="password2">Confirm password</label>
						<input type="password" name="password2" id="password2" class="wide" required>
					</li>
					<li class="form-group imp">
						<label for="email">E-mail</label>
						<input type="email" name="email" id="email" class="wide" required>
					</li>
				[question]
					<li class="form-group">
						<label for="question_answer">{question}</label>
						<input placeholder="Answer" type="text" name="question_answer" id="question_answer" class="wide" required>
					</li>
				[/question]
				[recaptcha]
					<li>{recaptcha}</li>
				[/recaptcha]
				[/registration]
				[validation]
					<li class="form-group">
						<label for="fullname">Your name</label>
						<input type="text" id="fullname" name="fullname" class="wide">
					</li>
					<li class="form-group">
						<label for="land">Place of residence</label>
						<input type="text" id="land" name="land" class="wide">
					</li>
					<li class="form-group">
						<label for="image">About me</label>
						<textarea id="info" name="info" rows="5" class="wide"></textarea>
					</li>
					<li class="form-group">
						<label for="image">Avatar</label>
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
						<input placeholder="Enter the code" title="Enter the code" type="text" name="sec_code" id="sec_code" required>
					</div>
				[/sec_code]
				[/registration]
				<button class="btn" name="submit" type="submit"><b class="ultrabold">Submit</b></button>
			</div>
		</div>
	</div>
</div>