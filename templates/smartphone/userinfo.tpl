<article class="post static">
  <h1 class="title">مشخصات کاربری: {usertitle}</h1>
  نام کامل: {fullname}<br />
  تاريخ عضويت: {registration}<br />
  آخرين بازديد از سايت: {lastdate}<br />
  گروه کاربری: <font color="red">{status}</font>[time_limit] گروه ارتقاء يافته: {time_limit}[/time_limit]<br /><br />
  محل سکونت: {land}<br />
  اطلاعات شخصی:<br />{info}<br /><br />
  تعداد مطالب: {news-num}<br />
  [ {news} ]<br /><br />
  تعداد نظرات: {comm-num}<br />
  [ {comments} ]<br /><br />
  [ {email} ]<br />
  [ {pm} ]<br />
  {edituser}
</article>
[not-logged]
<div id="options" style="display:none;">
  <div class="ux-form">
    <h3>ويرايش مشخصات</h3>
    <ul class="ui-form">
      <li><input placeholder="آدرس ايميل" type="email" name="email" value="{editmail}" class="f_input f_wide"><div>{hidemail}</div></li>
      <li><br /></li>
      <li><input placeholder="نام کامل" type="text" name="fullname" value="{fullname}" class="f_input f_wide"></li>
      <li><input placeholder="محل سکونت" type="text" name="land" value="{land}" class="f_input f_wide"></li>
      <li><br /></li>
      <li><input placeholder="رمز عبور فعلی" type="password" name="altpass" class="f_input f_wide"></li>
      <li><input placeholder="رمز عبور جديد" type="password" name="password1" class="f_input f_wide"></li>
      <li><input placeholder="تکرار رمز عبور جديد" type="password" name="password2" class="f_input f_wide"></li>
      <li><br /></li>
      <li><textarea name="allowed_ip" rows="2" class="f_textarea f_wide">{allowed-ip}</textarea><br />
        قفل کردن IP: <b>{ip}</b><br /><div style="color:red;font-size:11px;">* توجه! مراقب باشید زمانی که این قسمت را تغییر دهید.
دسترسی به حساب کابریتان فقط از آی پی مشخص شده امکان پذیر خواهد بود.
شما می توانید آدرس آی پی های مختلف را مشخص کنید، در هر خط یک آی پی مشخص کنید.<br />مثال: 192.48.25.71 و يا 129.42.*.*</div>
      </li>
      <li><br /></li>
      <li><label for="image">آواتار:</label><input type="file" name="image" class="f_input f_wide" dir="ltr"><p><input type="checkbox" name="del_foto" value="yes"> حذف آواتار</p></li>
      <li><label for="timezones">منطقه زمانی:</label>{timezones}</li>
      <li><br /></li>
      <li><textarea placeholder="اطلاعات شخصی" name="info" rows="2" class="f_textarea f_wide">{editinfo}</textarea></li>
      <li><textarea placeholder="امضاء" name="signature" rows="2" class="f_textarea f_wide">{editsignature}</textarea></li>
    </ul>
    <div class="submitline">
      <button name="submit" class="btn f_wide" type="submit">ويرايش</button>
      <input name="submit" type="hidden" id="submit" value="submit">
    </div>
  </div>
</div>
[/not-logged]