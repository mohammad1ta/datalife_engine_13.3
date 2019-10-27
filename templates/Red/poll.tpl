<div class="poll_block">
	<div class="poll_title">
		<b>{question}</b>
	</div>
	<div class="vote_list">
		{list}
	</div>
[voted]
	<div class="vote_votes grey">Total votes: {votes}</div>
[/voted]
[not-voted]
	<button title="Vote" class="btn" type="submit" onclick="doPoll('vote', '{news-id}'); return false;" >
		<b class="ultrabold">Vote</b>
	</button>
[/not-voted]
</div>