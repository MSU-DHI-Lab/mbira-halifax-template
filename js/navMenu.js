jQuery(document).ready(function(){
	if( $('.cd-stretchy-nav').length > 0 ) {
		var stretchyNavs = $('.cd-stretchy-nav');

		stretchyNavs.each(function(){
			var stretchyNav = $(this),
				stretchyNavTrigger = stretchyNav.find('.cd-nav-trigger');

			stretchyNavTrigger.on('click', function(event){
				event.preventDefault();
				stretchyNav.toggleClass('nav-is-visible');
			});
		});

		$(document).on('click', function(event){
			( !$(event.target).is('.cd-nav-trigger') && !$(event.target).is('.cd-nav-trigger span') ) && stretchyNavs.removeClass('nav-is-visible');
		});
	}
});

jQuery(document).ready(function(){
	if( $('.cd-stretchy-nav-share').length > 0 ) {
		var stretchyNavsShare = $('.cd-stretchy-nav-share');

		stretchyNavsShare.each(function(){
			var stretchyNavShare = $(this),
				stretchyNavTriggerShare = stretchyNavShare.find('.cd-nav-trigger-share');

			stretchyNavTriggerShare.on('click', function(event){
				event.preventDefault();
				stretchyNavShare.toggleClass('nav-is-visible');
			});
		});

		$(document).on('click', function(event){
			( !$(event.target).is('.cd-nav-trigger-share') && !$(event.target).is('.cd-nav-trigger-share span') ) && stretchyNavsShare.removeClass('nav-is-visible');
		});
	}
});

jQuery(document).ready(function(){
	if( $('.cd-stretchy-nav-search').length > 0 ) {
		var stretchyNavsSearch = $('.cd-stretchy-nav-search');

		stretchyNavsSearch.each(function(){
			console.log('click 1');
			var stretchyNavSearch = $(this),
				stretchyNavTriggerSearch = stretchyNavSearch.find('.cd-nav-trigger-search');

			stretchyNavTriggerSearch.on('click', function(event){
				event.preventDefault();
				stretchyNavSearch.toggleClass('nav-is-visible');
			});
		});

		$(document).on('click', function(event){
			if($(event.target).is('#header_search')){
				console.log('search clicked');
				return;
			}
			if ($(event.target).is('.findMyLocation')) {
		    $.getJSON("http://jsonip.com/?callback=?", function (data) {
		        $.getJSON("http://freegeoip.net/json/"+data.ip, function (data) {
		        	console.log(data);
					    var m = L.marker([data.latitude, data.longitude], {icon: iconPerson}).addTo(map)
								.bindPopup("<h2>Your Location</h2><br /><p>This is approximately where you are relative to everything!</p>");
		        	map.setView([data.latitude, data.longitude],15)
		        });
		        
		    });
			}
			( !$(event.target).is('.cd-nav-trigger-search') && !$(event.target).is('.cd-nav-trigger-search span') ) && stretchyNavsSearch.removeClass('nav-is-visible');
			if(stretchyNavsSearch.hasClass('nav-is-visible')){
				console.log('focus on text');
				setTimeout(function() { $('#header_search').focus() }, 100);
			}
		});
	}
});
