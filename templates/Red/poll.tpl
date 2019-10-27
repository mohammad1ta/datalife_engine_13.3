<div class="poll_block">
	<div class="poll_title">
		<b>{question}</b>
	</div>
	<div class="vote_list">
		{list}
	</div>
[voted]
	<div class="vote_votes grey">تعداد کل آراء: {votes}</div>
[/voted]
[not-voted]
	<button title="ثبت" class="btn" type="submit" onclick="doPoll('vote', '{news-id}'); return false;" >
		<b class="ultrabold">ثبت</b>
	</button>
[/not-voted]
</div>