<div class="poll_block">
	<div class="poll_block_in">
	<h4 class="title">{question}</h4>
		<div class="vote_list">
			{list}
		</div>
	[voted]
		<div class="vote_votes grey">کل آرا: {votes}</div>
	[/voted]
	[not-voted]
		<button title="Vote" class="btn" type="submit" onclick="doPoll('vote', '{news-id}'); return false;" ><b>ثبت</b></button>
		<button title="Results" class="btn" type="button" onclick="doPoll('results', '{news-id}'); return false;" ><b>نتایج</b></button>
	[/not-voted]
	</div>
</div>