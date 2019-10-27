<div class="section">

	<header class="section-main-title">
		<h3><span>پیغام خصوصی</span></h3>
	</header>

	<div class="content">

		<div class="pm_status">
			<div class="pm_status_head">وضعیت پیغام ها</div>
			<div class="pm_status_content">
				میزان پیغام خصوصی های ذخیره شده شما:
				{pm-progress-bar}
				حجم پیام های شما <b>{proc-pm-limit}%</b> پر شده است. (حداکثر {pm-limit} پیام)
			</div>
		</div>

		<div class="pm_status" style="float: right;">
			<div class="pm_status_head">پیغام خصوصی</div>
			<div class="pm_status_content">
				[inbox]صندوق ورودی[/inbox]
				[outbox]صندوق ارسالی[/outbox]
				[new_pm]ارسال پیام جدید[/new_pm]
			</div>
		</div>
		<div class="clear"></div>

		[pmlist]{pmlist}[/pmlist]

	</div>

</div>

[newpm]
<div class="section">

	<header class="section-main-title">
		<h3><span>ارسال پیغام خصوصی جدید</span></h3>
	</header>

	<div class="content">

		<table class="tableform no-margin" width="100%">
			<tr>
				<td width="25%" class="label">گیرنده:</td>
				<td width="75%"><input type="text" name="name" value="{author}" class="f_input" dir="ltr" /></td>
			</tr>
			<tr>
				<td class="label">موضوع: <i class="fa fa-star important"></i></td>
				<td><input type="text" name="subj" value="{subj}" class="f_input" /></td>
			</tr>
			<tr>
				<td class="label">پیام: <i class="fa fa-star important"></i></td>
				<td class="editorcomm">
					{editor}<br />
					<div class="checkbox"><input type="checkbox" id="outboxcopy" name="outboxcopy" value="1" /> <label for="outboxcopy">ذخیره پیام در پیام های ارسالی</label></div>
				</td>
			</tr>
			[sec_code]
			<tr>
				<td class="label">کد امنیتی: <i class="fa fa-star important"></i></td>
				<td>
					<div>{sec_code}</div>
					<div><input type="text" name="sec_code" id="sec_code" style="width:115px" class="f_input" /></div>
				</td>
			</tr>
			[/sec_code]
			[recaptcha]
			<tr>
				<td class="label">دو کلمه نمایش داده شده در تصویر را وارد کنید: <i class="fa fa-star important"></i></td>
				<td><div>{recaptcha}</div></td>
			</tr>
			[/recaptcha]
			[question]
				<tr>
					<td class="label">سوال امنیتی:</td>
					<td><div>{question}</div></td>
				</tr>
				<tr>
					<td class="label">پاسخ: <i class="fa fa-star important"></i></td>
					<td><div><input type="text" name="question_answer" id="question_answer" class="f_input" /></div></td>
				</tr>
			[/question]
			<tr>
				<td>&nbsp;</td>
				<td>
					<button type="submit" name="add" class="submit"><span>ارسال</span></button>
					<input type="button" class="submit blue" onclick="dlePMPreview()" title="پیش نمایش" value="پیش نمایش" />
				</td>
			</tr>
		</table>

	</div>

</div>
[/newpm]

[readpm]
<div class="comments">
	
	<div class="cm-info">
		<div class="avatar"><img src="{foto}" alt=""/></div>
		<span>{group-name}</span>
	</div>

	<div class="section">
		<span class="delete">[del]<i class="fa fa-times"></i>[/del]</span>
		<span class="date"><i class="fa fa-calendar-o"></i> {date}</span>
		<span class="author"><i class="fa fa-user"></i> {author}</span>
		<div class="clear"></div>
		{text}
		[signature]<br clear="all" /><div class="signature">--------------------</div><div class="slink">{signature}</div>[/signature]
	</div>

	<div class="pm_info">
		[reply]<span class="replys">پاسخ</span>[/reply]
		[complaint]<span class="complaint">گزارش</span>[/complaint]
		[ignore]<span class="ignore">افزودن به لیست سیاه</span>[/ignore]
	</div>

</div>
[/readpm]