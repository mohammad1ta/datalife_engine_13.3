<article class="block story shadow">
	<div class="wrp">
		<div class="head">
			<h1 class="title h2 ultrabold">Personal messages</h1>
		</div>
		<div class="pm-box">
			<nav id="pm-menu">
				[inbox]<span>Inbox</span>[/inbox]
				[outbox]<span>Sent</span>[/outbox]
				[new_pm]<span>New message</span>[/new_pm]
			</nav>
			<div class="pm_status">
				{pm-progress-bar}
				<div class="grey">{proc-pm-limit} % / ({pm-limit} messages)</div>
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
		<h4 class="block_title ultrabold">New message</h4>
		<ul class="ui-form">
			<li class="form-group combo">
				<div class="combo_field">
					<input placeholder="Recipient name" type="text" name="name" value="{author}" class="wide" required>
				</div>
				<div class="combo_field">
					<input placeholder="Subject" type="text" name="subj" value="{subj}" class="wide" required>
				</div>
			</li>
			<li id="comment-editor">{editor}</li>
			<li><input type="checkbox" id="outboxcopy" name="outboxcopy" value="1" /> <label for="outboxcopy">Save the message in the Sent items folder</label></li>  
		[recaptcha]
			<li>{recaptcha}</li>
		[/recaptcha]
		[question]
			<li class="form-group">
				<label for="question_answer">Question: {question}</label>
				<input placeholder="Answer" type="text" name="question_answer" id="question_answer" class="wide" required>
			</li>
		[/question]
		</ul>
		<div class="form_submit">
			[sec_code]
				<div class="c-capcha">
					{sec_code}
					<input placeholder="Enter the code" title="Enter the code" type="text" name="sec_code" id="sec_code" required>
				</div>
			[/sec_code]
			<button class="btn" type="submit" name="add"><b class="ultrabold">Send</b></button>
			<button class="btn btn_border" type="button" onclick="dlePMPreview()"><b class="ultrabold">Preview</b></button>
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
					[online]<span title="Online" class="status online">Online</span>[/online]
					[offline]<span title="Offline" class="status offline">Offline</span>[/offline]
					<span class="grey date">{date}</span>
				</div>
				<div class="text">
					<h5 class="title">{subj}</h5>
					{text}
					[signature]<div class="signature">--------------------<br />{signature}</div>[/signature]
				</div>
				<div class="com_tools">
					<div class="com_tools_links grey">
						[reply]<svg class="icon icon-meta_reply"><use xlink:href="#icon-meta_reply"></use></svg><span>Reply</span>[/reply]
						[complaint]<svg class="icon icon-compl"><use xlink:href="#icon-compl"></use></svg><span>Complain</span>[/complaint]
						[del]<svg class="icon icon-cross"><use xlink:href="#icon-cross"></use></svg><span>Delete</span>[/del]
						[ignore]<svg class="icon icon-meta_views"><use xlink:href="#icon-meta_views"></use></svg><span>Ignore</span>[/ignore]
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
[/readpm]