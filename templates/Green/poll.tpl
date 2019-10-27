<div class="poll_block">
	<div class="poll_block_in">
	<h4 class="title">{question}</h4>
		<div class="vote_list">
			{list}
		</div>
	[voted]
		<div class="vote_votes grey">Total votes: {votes}</div>
	[/voted]
	[not-voted]
		<button title="Vote" class="btn" type="submit" onclick="doPoll('vote', '{news-id}'); return false;" ><b>Vote</b></button>
		<button title="Results" class="btn" type="button" onclick="doPoll('results', '{news-id}'); return false;" ><b>Results</b></button>
	[/not-voted]
	</div>
</div>