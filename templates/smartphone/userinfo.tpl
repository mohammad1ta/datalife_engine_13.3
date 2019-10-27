<article class="post static">
  <h1 class="title">User: {usertitle}</h1>
  Full name: {fullname}<br />
  Registration date: {registration}<br />
  Last visit: {lastdate}<br />
  Group: <font color="red">{status}</font>[time_limit] In the group until: {time_limit}[/time_limit]<br /><br />
  Place of residence: {land}<br />
  Something about myself:<br />{info}<br /><br />
  Number of publications: {news-num}<br />
  [ {news} ]<br /><br />
  Number of comments: {comm-num}<br />
  [ {comments} ]<br /><br />
  [ {email} ]<br />
  [ {pm} ]<br />
  {edituser}
</article>
[not-logged]
<div id="options" style="display:none;">
  <div class="ux-form">
    <h3>Edit profile</h3>
    <ul class="ui-form">
      <li><input placeholder="Your e-mail" type="email" name="email" value="{editmail}" class="f_input f_wide"><div>{hidemail}</div></li>
      <li><br /></li>
      <li><input placeholder="Your name" type="text" name="fullname" value="{fullname}" class="f_input f_wide"></li>
      <li><input placeholder="Place of residence" type="text" name="land" value="{land}" class="f_input f_wide"></li>
      <li><br /></li>
      <li><input placeholder="Old password" type="password" name="altpass" class="f_input f_wide"></li>
      <li><input placeholder="New password" type="password" name="password1" class="f_input f_wide"></li>
      <li><input placeholder="Repeat" type="password" name="password2" class="f_input f_wide"></li>
      <li><br /></li>
      <li><textarea name="allowed_ip" rows="2" class="f_textarea f_wide">{allowed-ip}</textarea><br />
        Your IP: <b>{ip}</b><br /><div style="color:red;font-size:11px;">* Warning! Be careful when changing this setting.
          Your account will be available only from the IP-addresses or subnets that you specify.
          You can specify several IP addresses. One address per line.
          <br />
          Example: 192.48.25.71 or 129.42.*.*</div>
      </li>
      <li><br /></li>
      <li><label for="image">Avatar:</label><input type="file" name="image" class="f_input f_wide"><p><input type="checkbox" name="del_foto" value="yes">  Remove avatar</p></li>
      <li><br /></li>
      <li><textarea placeholder="About me" name="info" rows="2" class="f_textarea f_wide">{editinfo}</textarea></li>
      <li><textarea placeholder="Signature" name="signature" rows="2" class="f_textarea f_wide">{editsignature}</textarea></li>
    </ul>
    <div class="submitline">
      <button name="submit" class="btn f_wide" type="submit">Submit</button>
      <input name="submit" type="hidden" id="submit" value="submit">
    </div>
  </div>
</div>
[/not-logged]