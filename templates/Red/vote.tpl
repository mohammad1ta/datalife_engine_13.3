<div class="vote_line">
	<div class="wrp">
		<h4 class="vote_line_title ultrabold">
			<span class="vote_icon">
				<i class="i1"></i><i class="i2"></i><i class="i3"></i><i class="i4"></i>
			</span>
			نظرسنجی
		</h4>
		<p class="vtitle">{title}</p>
		<div class="vote_line_form">
			<div class="dropdown">
				<button data-toggle="dropdown" class="btn btn_white"><b class="ultrabold">مشاهده</b></button>
				<div class="dropdown-form">
					[votelist]
					<form method="post" name="vote">
					[/votelist]
						<div class="vote_list">
							{list}
						</div>
					[voteresult]
						<div class="vote_votes grey">تعداد کل آراء: {votes}</div>
					[/voteresult]
					[votelist]
						<input type="hidden" name="vote_action" value="vote">
						<input type="hidden" name="vote_id" id="vote_id" value="{vote_id}">
						<button title="Vote" class="btn wide" type="submit" onclick="doVote('vote'); return false;" ><b class="ultrabold">ثبت</b></button>
						<button title="Results" class="btn btn_border wide" type="button" onclick="doVote('results'); return false;" >
							<b class="ultrabold">نتایج</b>
						</button>
					</form>
					[/votelist]
				</div>
			</div>
			<a class="more_votes" href="#" onclick="ShowAllVotes(); return false;">مشاهده همه...</a>
		</div>
	</div>
</div>