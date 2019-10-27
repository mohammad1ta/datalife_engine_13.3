<div id="pollbox" class="gr-box">
	<h4 class="vtitle">{question}</h4>
	<div class="vlist">
		{list}
	</div>
	<div class="vfoot">
		[voted]<span class="small">Total votes {votes}</span>[/voted]
		[not-voted]
			<button class="btn" type="submit" onclick="doPoll('vote', '{news-id}'); return false;" >Vote</button>
			<button class="btn" type="submit" onclick="doPoll('results', '{news-id}'); return false;">Results</button>
		[/not-voted]
	</div>
</div>