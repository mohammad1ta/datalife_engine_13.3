<article class="block story shadow">
	<div class="wrp">
		<div class="head">
			<h1 class="title h2 ultrabold">پیام های خصوصی</h1>
		</div>
		<div class="pm-box">
			<nav id="pm-menu">
				[inbox]<span>صندوق دریافتی</span>[/inbox]
				[outbox]<span>صندوق ارسالی</span>[/outbox]
				[new_pm]<span>ایجاد پیام</span>[/new_pm]
			</nav>
			<div class="pm_status">
				{pm-progress-bar}
				<div class="grey">{proc-pm-limit} % / ({pm-limit} پیام)</div>
			</div>
		</div>
		[pmlist]
		<div class="pmlist">
			{pmlist}
		</div>
		[/pmlist]
	</div>
</article>
[newpm]
<div class="block">
	<div class="wrp">
		<h4 class="block_title ultrabold">ارسال پیام</h4>
		<ul class="ui-form">
			<li class="form-group combo">
				<div class="combo_field">
					<input placeholder="گیرنده" type="text" name="name" value="{author}" class="wide" required>
				</div>
				<div class="combo_field">
					<input placeholder="موضوع" type="text" name="subj" value="{subj}" class="wide" required>
				</div>
			</li>
			<li id="comment-editor">{editor}</li>    
		[recaptcha]
			<li>{recaptcha}</li>
		[/recaptcha]
		[question]
			<li class="form-group">
				<label for="question_answer">سوال امنیتی: {question}</label>
				<input placeholder="پاسخ" type="text" name="question_answer" id="question_answer" class="wide" required>
			</li>
		[/question]
		</ul>
		<div class="form_submit">
			[sec_code]
				<div class="c-capcha">
					{sec_code}
					<input placeholder="کاراکترها را وارد نمایید" title="کاراکترها را وارد نمایید" type="text" name="sec_code" id="sec_code" required>
				</div>
			[/sec_code]
			<button class="btn" type="submit" name="add"><b class="ultrabold">ارسال</b></button>
			<button class="btn btn_border" type="button" onclick="dlePMPreview()"><b class="ultrabold">پیش نمایش</b></button>
		</div>
	</div>
</div>
[/newpm]
[readpm]
<div class="block">
	<div class="wrp">
		<div class="comment" style="margin-bottom: 0;">
			<div class="avatar">
				<span class="cover" style="background-image: url({foto});">{login}</span>
				<span class="com_decor"></span>
			</div>
			<div class="com_content">
				<div class="com_info">
					<b class="name">{author}</b>
					[online]<span title="Online" class="status online">آنلاین</span>[/online]
					[offline]<span title="Offline" class="status offline">آفلاین</span>[/offline]
					<span class="grey date">{date}</span>
				</div>
				<div class="text">
					<h5 class="title">{subj}</h5>
					{text}
					[signature]<div class="signature">--------------------<br />{signature}</div>[/signature]
				</div>
				<div class="com_tools">
					<div class="com_tools_links grey">
						[reply]<svg class="icon icon-meta_reply"><use xlink:href="#icon-meta_reply"></use></svg><span>پاسخ</span>[/reply]
						[complaint]<svg class="icon icon-compl"><use xlink:href="#icon-compl"></use></svg><span>گزارش تخلف</span>[/complaint]
						[del]<svg class="icon icon-cross"><use xlink:href="#icon-cross"></use></svg><span>حذف</span>[/del]
						[ignore]<svg class="icon icon-meta_views"><use xlink:href="#icon-meta_views"></use></svg><span>افزودن به لیست سیاه</span>[/ignore]
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
[/readpm]