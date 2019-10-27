<article class="post static">
  <h1 class="title">Messages</h1>
  [inbox]Inbox[/inbox] <br /> [outbox]Sent[/outbox] <br /> [new_pm]New message[/new_pm]
</article>
[pmlist]
<div class="ux-form">
  <h3>Message list</h3>
  {pmlist}
</div>
[/pmlist]
[newpm]
<div class="ux-form">
  <h3>New message</h3>
  <ul class="ui-form">
    <li><input placeholder="To" type="text" name="name" value="{author}" class="f_input f_wide"></li>
    <li><input placeholder="Subject" type="text" name="subj" value="{subj}" class="f_input f_wide"></li>
    <li><textarea placeholder="Message" name="comments" id="comments" rows="2" class="f_textarea f_wide">{text}</textarea></li>
    <li><input type="checkbox" name="outboxcopy" value="1"> Save the message in the "Sent" folder</li>
    [sec_code]
    <li>
      <div class="c-captcha-box">
        <label for="sec_code">Enter the code:</label>
        <div class="c-captcha">
          {sec_code}
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
  </ul>
  <div class="submitline">
    <button class="btn f_wide" name="add" type="submit" name="submit">Send</button>
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
    <span class="arg">From <b class="fn">{author}</b></span>
    <span class="fast">[reply]<b class="thd">Reply</b>[/reply]</span>
    <span class="del">[del]<b class="thd">Delete</b>[/del]</span>
  </div>
</div>
[/readpm]