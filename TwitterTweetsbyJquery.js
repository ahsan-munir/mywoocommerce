	   // Tweeter Function
	  var twitterUsername = "@LeanBodyMD";
	  var url = "https://twitter.com/status/user_timeline/" + twitterUsername + "?count=2&format=json&callback=?"
	  jQuery.getJSON(url, function(data) {
	      var twitterList = jQuery("<ul />");
	      jQuery.each(data, function(index, item) {
	          jQuery("<li />", {
	              "text": item.text
	          }).appendTo(twitterList);
	      });
	      jQuery("#output").fadeOut("fast", function() {
	          jQuery(this).empty().append(twitterList).fadeIn(3000);
	      });
	  }); < div id = "output" > < /div>