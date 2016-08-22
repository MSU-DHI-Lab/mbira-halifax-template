$(document).ready(function() {
	var searchLink = $('header > nav > ul > li:last-child > a');
	var searchForm = $('header > form');
	var noSearchReset = function() {
		// Below is specific page styling for search box to disappear
		$('header > form').toggleClass('search-toggle');
		$('header > nav').css('width', '100%');
		$('header > nav > ul > li:last-child').toggleClass('hide-search');
		/*$('header > form > input').val(''); <--- Remove if text field should be deleted upon collapse */
	};
	$(document).click(function(e) {
		if (!searchForm.hasClass('search-toggle')) { // If the search box is hidden...
			// If the user has clicked on "Search" and the page width is greater than 600 pixels
			if($(e.target).is(searchLink) && ($( window ).width() >= 600)) {
				e.preventDefault();
				// Below is specific page styling for search box to appear
				$('header > nav > ul > li:last-child').toggleClass('hide-search');
				$('header > nav').css('width', 'auto');
				$('header > form').toggleClass('search-toggle');
				$('header > form > input').focus(); // Automatically places cursor in text box
			}
		}
		else { // If the search box is currently visible
			// If the user has clicked on any page element besides the search box (form & children included)
			// then collapse the search box
			if(!$(e.target).is(searchForm) && !$(e.target).is(searchForm.children())) {
				noSearchReset();
			}
		}
	});
	var addSearchAnchor = function() {
		if ($(window).width() < 600) {
			$('header > nav > ul > li:last-child > a').attr('href','#comingSoon');
		}
		else {
			//REPLACE LINE BELOW WITH THE LINE THAT IS COMMENTED UNDERNEATH IT WHEN SEARCH FUNCTIONALITY IS COMPLETE
			$('header > nav > ul > li:last-child > a').attr('href','#comingSoon');
			//$('header > nav > ul > li:last-child > a').attr('href','#');
		}
	};
	addSearchAnchor();
	$( window ).resize(function() {
		/* If the search bar is opened in desktop and the window
		enters mobile mode, the nav needs width: auto -> width: 100% */
		if ($(window).width() < 600 && searchForm.hasClass('search-toggle')) {
			noSearchReset();
		}
		addSearchAnchor();
	});
	$(function(){
       $("header a").each(function(){
       		var currentPage = window.location.pathname.split('/');
       		if ($(this)['context']['innerText'].toLowerCase() == 'about') {
       			if (currentPage[currentPage.length-1] == 'purpose.php' ||
       				currentPage[currentPage.length-1] == 'history.php' ||
       				currentPage[currentPage.length-1] == 'funders.php' ||
       				currentPage[currentPage.length-1] == 'contributors.php' ||
       				currentPage[currentPage.length-1] == 'technical.php' ||
							currentPage[currentPage.length-1] == 'contact.php')
						{$(this).addClass("active-page");}
       		}
			if ($(this).attr("href") == currentPage[currentPage.length-1]) {
				$(this).addClass("active-page");
			}
       });
	});
});
