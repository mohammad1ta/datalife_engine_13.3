<article class="post static">
  <h1 class="title">
    [registration]عضويت در سايت[/registration]
    [validation]بروزرسانی مشخصات کاربری[/validation]
  </h1>
    [registration]
     <b> سلام, به وبسایت ما خوش آمدید! </b> <br/>
	با عضویت در سایت ما سطح دسترسی شما به امکانات سایت افزایش خواهد داشت.
	می توانید در سایت مطالب خود را انتشار دهید، ارسال نطر، مشاهده نوشته های پنهان، و به خیلی امکانات بیشتری دسترسی خواهید داشت.
	<br/> اگر شما با هرگونه مشکلی در عضویت مواجه شدید، لطفا به <a href="/index.php?do=feedback"> مدیریت </a> سایت اطلاع دهید.
    [/registration]
    [validation]
      <b> بازدید کننده عزیز, </b> <br/>
	حساب کاربری شما با موفقیت در سایت ما ایجاد شد.
	با این حال ، اطلاعات مربوط به شما ناقص است، بنابراین باید فیلد های زیر را باید پر کنید.
    [/validation]
</article>
<div class="ux-form">
  <ul class="ui-form">
    [registration]
      <li>
        <div class="combofield">
          <input placeholder="نام کاربری" type="text" name="name" id="name" class="f_input f_wide">
          <input class="bbcodes" title="Check" onclick="CheckLogin(); return false;" type="button" value="چک کردن">
        </div>
        <div class="clr" id='result-registration'></div>
      </li>
      <li>
        <input placeholder="رمز عبور" type="password" name="password1" id="password1" class="f_input f_wide">
      </li>
      <li>
        <input placeholder="تکرار رمز عبور" type="password" name="password2" id="password2" class="f_input f_wide">
      </li>
      <li>
        <input placeholder="آدرس ايميل" type="email" name="email" id="email" class="f_input f_wide">
      </li>
      [question]
      <li>
        سوال امنيتی: <b>{question}</b>
        <div><input placeholder="جواب" type="text" name="question_answer" id="question_answer" class="f_input f_wide" ></div>
      </li>
      [/question]
      [sec_code]
      <li>
        <div class="c-captcha-box">
          <label for="sec_code">تصوير کد امنيتی:</label>
          <div class="c-captcha">
            {reg_code}
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
      [/registration]
      [validation]
      <li><input placeholder="نام کامل" type="text" id="fullname" name="fullname" class="f_input f_wide"></li>
      <li><input placeholder="محل سکونت" type="text" id="land" name="land" class="f_input f_wide"></li>
      <li><input placeholder="ID ياهو" type="text" id="yahoo" name="yahoo" class="f_input f_wide"></li>
      <li><textarea placeholder="توضيحات شخصی" id="info" name="info" rows="3" class="f_textarea f_wide"></textarea></li>
      <li><label for="image">آواتار:</label><input type="file" id="image" name="image" class="f_input f_wide"></li>
      [/validation]
  </ul>
  <div class="submitline">
    <button name="submit" class="btn f_wide" type="submit">ارسال</button>
  </div>
</div>