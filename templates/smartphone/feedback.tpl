<article class="post static">
  <h1>تماس با ما</h1>
</article>
<div class="ux-form">
  <ul class="ui-form">
    [not-logged]
    <li><input placeholder="نام شما" type="text" maxlength="35" name="name" class="f_input f_wide"></li>
    <li><input placeholder="آدرس ايميل" type="email" maxlength="35" name="email" class="f_input f_wide"></li>
    [/not-logged]
    <li><input placeholder="گيرنده" type="text" maxlength="45" name="subject" class="f_input f_wide"><div style="display: none">{recipient}</div></li>
    <li><textarea placeholder="متن پيام" name="message" row="3" class="f_textarea f_wide"></textarea></li>
    [sec_code]
    <li>
      <div class="c-captcha-box">
        <label for="sec_code">تصوير کد امنيتی:</label>
        <div class="c-captcha">
          {code}
          <input title="کد امنيتی داده شده را وارد نمائيد" type="text" name="sec_code" id="sec_code" class="f_input" >
        </div>
      </div>
    </li>
    [/sec_code]
    [recaptcha]
    <li>
      <div>کد امنيتی</div>
      {recaptcha}
    </li>
    [/recaptcha]
  <div class="submitline">
    <button name="submit" class="btn f_wide" type="submit">ارسال</button>
  </div>
</div>