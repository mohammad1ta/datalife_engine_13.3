<section class="section">

	<header class="section-main-title">
		<h3><span>ارسال مطلب</span></h3>
	</header>

	<div class="content">
		
		<table class="tableform" width="100%">
			<tr>
				<td colspan="3">
					<i class="fa fa-star important"></i> &nbsp; پر نمودن فیلدهای ستاره دار، الزامی می‌باشد.
				</td>
			</tr>
			<tr>
				<td width="30%">عنوان: <i class="fa fa-star important"></i></td>
				<td width="70%" colspan="2">
					<input type="text" id="title" name="title" value="{title}" maxlength="150" class="f_input" style="width: 200px" />&nbsp;
					<input class="bbcodes" title="جستجوی مطالب مشابه" onclick="find_relates(); return false;" type="button" value="مطالب مشابه" /><span id="related_news"></span>
				</td>
			</tr>
			[urltag]
			<tr>
				<td>عنوان لاتین (جهت SEO):</td>
				<td colspan="2"><input type="text" name="alt_name" dir="ltr" value="{alt-name}" maxlength="150" class="f_input" /></td>
			</tr>
			[/urltag]
			<tr>
				<td>موضوع: <i class="fa fa-star important"></i></td>
				<td colspan="2">{category}</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="2"><a href="#" onclick="$('.addvote').toggle();return false;">اضافه کردن نظرسنجی</a></td>
			</tr>
			<tr  class="addvote" style="display:none;" >
				<td>عنوان:</td>
				<td colspan="2"><input type="text" name="vote_title" value="{votetitle}" maxlength="150" class="f_input" /></td>
			</tr>
			<tr  class="addvote" style="display:none;" >
				<td>سوال:</td>
				<td colspan="2"><input type="text" name="frage" value="{frage}" maxlength="150" class="f_input" /></td>
			</tr>
			<tr  class="addvote" style="display:none;" >
				<td>جواب:<br /><br />در هر خط، یک جواب وارد نمائید</td>
				<td colspan="2"><textarea name="vote_body" rows="10" class="f_textarea" >{votebody}</textarea><br /><input type="checkbox" name="allow_m_vote" value="1" {allowmvote}> امکان انتخاب چندین گزینه برای رأی</td>
			</tr>
			<tr>
				<td colspan="3">
					<b>متن مطلب: <i class="fa fa-star important"></i></b> (اجباری)
					<div>
						[not-wysywyg]
						<div class="bb-editor">
							{bbcode}
							<textarea name="short_story" id="short_story" onfocus="setFieldName(this.name)" rows="15" class="f_textarea" >{short-story}</textarea>
						</div>
						[/not-wysywyg]
						{shortarea}
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<b>متن کامل:</b> (اختیاری)
					<div>
						[not-wysywyg]
						<div class="bb-editor">
							{bbcode}
							<textarea name="full_story" id="full_story" onfocus="setFieldName(this.name)" rows="20" class="f_textarea" >{full-story}</textarea>
						</div>
						[/not-wysywyg]
						{fullarea}
					</div>
				</td>
			</tr>
			<tr>
				<td>تگ های مطلب:</td>
				<td colspan="2"><input type="text" name="tags" id="tags" value="{tags}" maxlength="150"  class="f_input" autocomplete="off" /></td>
			</tr>
			{xfields}
			[question]  
				<tr>  
					<td>سوال امنیتی:</td>  
					<td colspan="2"><div>{question}</div></td>  
				</tr>  
				<tr>
					<td>پاسخ: <i class="fa fa-star important"></i></td>  
					<td colspan="2"><div><input type="text" name="question_answer" id="question_answer" class="f_input" /></div></td>
				</tr>  
			[/question]
			[sec_code]
			<tr>
				<td>
					کد موجود در تصویر <br/> را وارد کنید: <i class="fa fa-star important"></i>
				</td>
				<td colspan="2">
					<div>{sec_code}</div>
					<div><input type="text" name="sec_code" id="sec_code" style="width:115px" class="f_input" /></div>
				</td>
			</tr>
			[/sec_code]
			[recaptcha]
			<tr>
				<td>
					دو کلمه نمایش داده شده، <br/>در تصویر را وارد کنید: <i class="fa fa-star important"></i>
				</td>
				<td colspan="2">
					<div>{recaptcha}</div>
				</td>
			</tr>
			[/recaptcha]
			<tr>
				<td>&nbsp;</td>
				<td colspan="2">{admintag}</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="2">
					<button name="add" class="submit" type="submit"><span>ارسال</span></button>
					<button name="nview" onclick="preview()" class="submit blue" type="submit"><span>پیش نمایش</span></button></td>
				</td>
			</tr>
		</table>
	</div>
</section>