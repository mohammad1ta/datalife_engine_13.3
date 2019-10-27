<div id="votes" class="block" style="margin-bottom: 6px;">
	<p class="vtitle"><b>{title}</b></p>
	[votelist]<form method="post" name="vote" action=''>[/votelist]
	{list}
	<br />
	[voteresult]<div><small>رای دهندگان: {votes}</small></div>[/voteresult]
	[votelist]
		<input type="hidden" name="vote_action" value="vote" />
		<input type="hidden" name="vote_id" id="vote_id" value="1" />
		<button class="fbutton" type="submit" onclick="doVote('vote'); return false;" ><span>ارسال نظر</span></button>&nbsp;<button class="fbutton" type="button" onclick="doVote('results'); return false;" ><span>نتایج</span></button>
	</form>
	[/votelist]
</div>