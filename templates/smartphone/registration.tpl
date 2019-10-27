<article class="post static">
  <h1 class="title">
    [registration]New user registration[/registration]
    [validation]User profile update[/validation]
  </h1>
    [registration]
      <b>Hello, dear visitor of our website!</b><br />
      Registration on our site will allow you to become its full participant. 
      You will be able to add news on the website, write your comments, view the hidden text and more.
      <br />In case of problems encountered during the registration process, please contact the website <a href="/index.php?do=feedback">Administrator</a>.
    [/registration]
    [validation]
      <b>Dear visitor,</b><br />
      Your account has been registered on our website, 
      but your profile information is incomplete. Please, fill in the additional fields of your profile.
    [/validation]
</article>
<div class="ux-form">
  <ul class="ui-form">
    [registration]
      <li>
        <div class="combofield">
          <input placeholder="Login" type="text" name="name" id="name" class="f_input f_wide">
          <input class="bbcodes" title="Check" onclick="CheckLogin(); return false;" type="button" value="Check">
        </div>
        <div class="clr" id='result-registration'></div>
      </li>
      <li>
        <input placeholder="Password" type="password" name="password1" id="password1" class="f_input f_wide">
      </li>
      <li>
        <input placeholder="Confirm password" type="password" name="password2" id="password2" class="f_input f_wide">
      </li>
      <li>
        <input placeholder="Your e-mail" type="email" name="email" id="email" class="f_input f_wide">
      </li>
      [question]
      <li>
        Question: <b>{question}</b>
        <div><input placeholder="Answer" type="text" name="question_answer" id="question_answer" class="f_input f_wide" ></div>
      </li>
      [/question]
      [sec_code]
      <li>
        <div class="c-captcha-box">
          <label for="sec_code">Enter the code:</label>
          <div class="c-captcha">
            {reg_code}
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
      [/registration]
      [validation]
      <li><input placeholder="Your nameÿ" type="text" id="fullname" name="fullname" class="f_input f_wide"></li>
      <li><input placeholder="Place of residence" type="text" id="land" name="land" class="f_input f_wide"></li>
      <li><textarea placeholder="About me" id="info" name="info" rows="3" class="f_textarea f_wide"></textarea></li>
      <li><label for="image">Photo:</label><input type="file" id="image" name="image" class="f_input f_wide"></li>
      [/validation]
  </ul>
  <div class="submitline">
    <button name="submit" class="btn f_wide" type="submit">Submit</button>
  </div>
</div>