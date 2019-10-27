<article class="post static">
  <h1>Feedback</h1>
</article>
<div class="ux-form">
  <ul class="ui-form">
    [not-logged]
    <li><input placeholder="Your name" type="text" maxlength="35" name="name" class="f_input f_wide"></li>
    <li><input placeholder="Your e-mail" type="email" maxlength="35" name="email" class="f_input f_wide"></li>
    [/not-logged]
    <li><input placeholder="Topic" type="text" maxlength="45" name="subject" class="f_input f_wide"><div style="display: none">{recipient}</div></li>
    <li><textarea placeholder="Message" name="message" row="3" class="f_textarea f_wide"></textarea></li>
    [sec_code]
    <li>
      <div class="c-captcha-box">
        <label for="sec_code">Enter the code:</label>
        <div class="c-captcha">
          {code}
          <input title="¬ведите код указанный на картинке" type="text" name="sec_code" id="sec_code" class="f_input" >
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
    <button name="submit" class="btn f_wide" type="submit">Send</button>
  </div>
</div>