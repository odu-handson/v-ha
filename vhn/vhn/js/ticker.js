var ticker_msg_id = 0;
var ticker_msgs = new Array();
ticker_msgs[0] = "&quot;Tell me and I forget, teach me and I may remember, involve me and I learn.&quot; -Benjamin Franklin";
ticker_msgs[1] = "&quot;Our greatest weakness lies in giving up. The most certain way to succeed is always to try just one more time.&quot; -Thomas Edison";
ticker_msgs[2] = "&quot;One person caring about another represents life's greatest value.&quot; -Jim Rohn";
ticker_msgs[3] = "&quot;Things turn out best for those who make the best of the way things turn out.&quot; -Jack Buck";
ticker_msgs[4] = "&quot;The best and most beautiful things in the world cannot be seen or even touched. They must be felt with the heart.&quot; -Helen Keller";



$(document).ready(function() {
	var t = self.setInterval(function(){updateTicker()},20000);
});

function updateTicker() {
	ticker_msg_id++;
	if (ticker_msg_id == 5)
		ticker_msg_id = 0;
	$("#ticker_wrapper").fadeOut();
	var timer = setTimeout('$("#ticker_wrapper").html(ticker_msgs[ticker_msg_id]).fadeIn();', 1000);
}