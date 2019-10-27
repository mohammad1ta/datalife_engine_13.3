<article class="post static">
  <h1 class="title">پيغام خصوصی</h1>
  [inbox]صندوق ورودی[/inbox] <br /> [outbox]صندوق خروجی[/outbox] <br /> [new_pm]ارسال پيام[/new_pm]
</article>
[pmlist]
<div class="ux-form">
  <h3>ليست پيام ها</h3>
  {pmlist}
</div>
[/pmlist]
[newpm]
<div class="ux-form">
  <h3>ارسال پيام جديد</h3>
  <ul class="ui-form">
    <li><input placeholder="گيرنده" type="text" name="name" value="{author}" class="f_input f_wide"></li>
    <li><input placeholder="عنوان پيام" type="text" name="subj" value="{subj}" class="f_input f_wide"></li>
    <li><textarea placeholder="متن پيام" name="comments" id="comments" rows="2" class="f_textarea f_wide">{text}</textarea></li>
    <li><input type="checkbox" name="outboxcopy" value="1"> ذخيره اين پيام در صندوق خروجی</li>
    [sec_code]
    <li>
      <div class="c-captcha-box">
        <label for="sec_code">تصوير کد امنيتی:</label>
        <div class="c-captcha">
          {sec_code}
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
  </ul>
  <div class="submitline">
    <button class="btn f_wide" name="add" type="submit" name="submit">ارسال</button>
  </div>
</div>
[/newpm]
[readpm]
<div class="comment vcard">
  <div class="com-cont clrfix">
    <strong>{subj}</strong><br />
    {text}
  </div>
  <div class="com-inf">
    <span class="arg">فرستنده <b class="fn">{author}</b></span>
    <span class="fast">[reply]<b class="thd">پاسخ</b>[/reply]</span>
    <span class="del">[del]<b class="thd">حذف</b>[/del]</span>
  </div>
</div>
[/readpm]