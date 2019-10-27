<article class="block story">
	<div class="wrp">
		<div class="head">
			<h1 class="title h2 ultrabold">ارسال مطلب</h1>
		</div>
		<div class="addnews clrfix">
		<div class="grid_1_4 left grid_last">
			<h5 class="ultrabold">راهنما</h5>
			<p>لطفا فیلد های موجود را به دقت تکمیل نمایید.</p>
			<p>در صورتی که سوالی دارید با <a href="#">مدیریت سایت</a> تماس بگیرید. </p>
		</div>
		<div class="grid_3_4">
			<ul class="ui-form">
				<li class="form-group imp">
					<label for="title">عنوان مطلب</label>
					<input type="text" name="title" id="title" value="{title}" class="wide" required>
				</li>
				[urltag]
				<li class="form-group imp">
					<label for="alt_name">آدرس URL</label>
					<input type="text" name="alt_name" id="alt_name" value="{alt-name}" class="wide">
				</li>
				[/urltag]
				<li class="form-group imp">
					<label for="category">موضوع</label>
					{category}
				</li>
				<li class="form-group">
					<a class="btn btn_border" href="#" onclick="$('.addvote').toggle();return false;">افزودن نظرسنجی</a>
				</li>
				<li class="form-group addvote" style="display:none;" >
					<label for="vote_title">عنوان</label>
					<input type="text" name="vote_title" id="vote_title" value="{votetitle}" maxlength="150" class="wide">
				</li>
				<li class="form-group addvote" style="display:none;" >
					<label for="frage">سوال</label>
					<input type="text" name="frage" id="frage" value="{frage}" maxlength="150" class="wide">
				</li>
				<li class="form-group addvote" style="display:none;" >
					<label for="vote_body">گزینه های انتخابی</label>
					<p class="grey">هر گزینه را در یک خط وارد نمایید</p>
					<textarea name="vote_body" id="vote_body" rows="10" class="wide" >{votebody}</textarea>
					<div class="checkbox">
						<input type="checkbox" name="allow_m_vote" id="allow_m_vote" value="1" {allowmvote}>
						<label for="allow_m_vote">امکان انتخاب چند گزینه</label>
					</div>
				</li>
				<li class="form-group imp">
					<label for="short_story">خلاصه مطلب</label>
					[not-wysywyg]
					<div class="bb-editor">
						{bbcode}
						<textarea name="short_story" id="short_story" onfocus="setFieldName(this.name)" rows="8" class="wide" required>{short-story}</textarea>
					</div>
					[/not-wysywyg]
					{shortarea}
				</li>
				<li class="form-group">
					<label for="full_story">ادامه مطلب</label>
					[not-wysywyg]
					<div class="bb-editor">
						{bbcode}
						<textarea name="full_story" id="full_story" onfocus="setFieldName(this.name)" rows="18" class="wide" >{full-story}</textarea>
					</div>
					[/not-wysywyg]
					{fullarea}
				</li>
				<li class="form-group">
					<label for="alt_name">برچسب ها</label>
					<input placeholder="عبارات را با کاما از هم جدا نمایید" type="text" name="tags" id="tags" value="{tags}" maxlength="150" autocomplete="off" class="wide">
				</li>
				<li class="form-group">
					<table class="xfields">
						{xfields}
					</table>
				</li>
			[group=1,2]
				<li class="form-group">
					<div class="admin_checkboxs">{admintag}</div>
				</li>
			[/group]
			[recaptcha]
				<li class="form-group">{recaptcha}</li>
			[/recaptcha]
			[question]
				<li class="form-group">
					<label for="question_answer">{question}</label>
					<input placeholder="پاسخ" type="text" name="question_answer" id="question_answer" class="wide" required>
				</li>
			[/question]
			</ul>
			<p style="margin: 20px 0 0 0;" class="grey"><span style="color: #e85319">*</span> تکمیل فیلد های ستاره دار الزامی است.</p>
			<div class="form_submit">
				[sec_code]
					<div class="c-capcha">
						{sec_code}
						<input placeholder="کاراکترها را وارد نمایید" title="کاراکترهای موجود در تصویر را وارد نمایید" type="text" name="sec_code" id="sec_code" required>
					</div>
				[/sec_code]
				<button class="btn" type="submit" name="add"><b class="ultrabold">ارسال</b></button>
				<button id="add_news_preview" class="btn btn_border" onclick="preview()" type="submit" name="nview"><b class="ultrabold">پیش نمایش</b></button>
			</div>
		</div>
	</div>
</article>