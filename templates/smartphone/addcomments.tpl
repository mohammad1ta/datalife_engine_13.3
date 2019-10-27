<div class="ux-form">
  <h3>{title}</h3>
  <ul class="ui-form">
    [not-logged]
    <li><input placeholder="نام" type="text" name="name" id="name" class="f_input f_wide"></li>
    <li><input placeholder="آدرس ايميل" type="email" name="mail" id="mail" class="f_input f_wide"></li>
    [/not-logged]
    <li><textarea placeholder="متن نظر" rows="3" name="comments" id="comments" class="f_textarea f_wide">{text}</textarea></li>
    [sec_code]
    <li>
      <div class="c-captcha-box">
        <label for="sec_code">تصوير کد امنيتی:</label>
        <div class="c-captcha">
          {sec_code}
          <input title="کد امنيتی داده شده را وارد نمائيد" type="text" name="sec_code" id="sec_code" class="f_input">
        </div>
      </div>
    </li>
    [/sec_code]
    [question]
    <li>
      سوال امنيتی: {question}
      <div><input placeholder="پاسخ" type="text" name="question_answer" id="question_answer" class="f_input f_wide" ></div>
    </li>
    [/question]
    [recaptcha]
    <li>
      <div>کد امنيتی</div>
      {recaptcha}
    </li>
    [/recaptcha]
  </ul>
  <div class="submitline">
    <button class="btn f_wide" type="submit" name="submit">ارسال</button>
  </div>
</div>