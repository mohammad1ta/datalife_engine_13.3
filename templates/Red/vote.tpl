<div class="vote_line">
	<div class="wrp">
		<h4 class="vote_line_title ultrabold">
			Poll
			<span class="vote_icon">
				<i class="i1"></i><i class="i2"></i><i class="i3"></i><i class="i4"></i>
			</span>
		</h4>
		<p class="vtitle">{title}</p>
		<div class="vote_line_form">
			<div class="dropdown">
				<button data-toggle="dropdown" class="btn btn_white"><b class="ultrabold">Vote</b></button>
				<div class="dropdown-form">
					[votelist]
					<form method="post" name="vote">
					[/votelist]
						<div class="vote_list">
							{list}
						</div>
					[voteresult]
						<div class="vote_votes grey">Total votes: {votes}</div>
					[/voteresult]
					[votelist]
						<input type="hidden" name="vote_action" value="vote">
						<input type="hidden" name="vote_id" id="vote_id" value="{vote_id}">
						<button title="Vote" class="btn wide" type="submit" onclick="doVote('vote'); return false;" ><b class="ultrabold">Vote</b></button>
						<button title="Results" class="btn btn_border wide" type="button" onclick="doVote('results'); return false;" >
							<b class="ultrabold">Results</b>
						</button>
					</form>
					[/votelist]
				</div>
			</div>
			<a class="more_votes" href="#" onclick="ShowAllVotes(); return false;">Other polls...</a>
		</div>
	</div>
</div>