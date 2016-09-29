$(document).ready(function(){
	
	// twitter height is .main_columns height
	function twitter_height()	{
		if( $('#js_yardstick').height() > 768 )	{
			var twitter_height = $('.main_columns').height();
			$('.ghsa_tweet_container_inner').css('height', twitter_height);
		}
		else	{
			$('.ghsa_tweet_container_inner').css('height', 'auto');
		}
	}
	twitter_height();
	
	
	// tabbed content
	$('.js-tabbed-content-controls-1 li').hover(
		function() {
			$('.js-tabbed-content-controls-1 li').removeClass('tab-active');
			$('.view-programs-initiatives-tabbed-content .views-row').removeClass('tab-active');
			$(this).addClass('tab-active');
			$('.view-programs-initiatives-tabbed-content .views-row-' + ($(this).index() + 1) ).addClass('tab-active');
		}, function() {
			//
		}
	);
	
	
	// tweet pairs
	$('.ghsa_tweet_container_inner .ghsa_tweet:nth-child(even)').each(function(){
			$(this).next('.ghsa_tweet').add(this).wrapAll('<span class="tweet_row">');
	});
	

	
	// scroll effects
	$(window).scroll(function() {
	
		//
		
	});
	
	
	// resize effects
	$(window).resize(function() {

		twitter_height();
		
	});
	

});