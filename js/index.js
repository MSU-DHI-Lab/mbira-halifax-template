/**********Global Variables**********/
var collectionsLayout = $('#collections-layout');
var gridButton = $('#grid-button');
var listButton = $('#list-button');
/**********Function definitions**********/
var setCollectionGrid = function() {
	gridButton.toggleClass('view-active');
	collectionsLayout.toggleClass('collections-grid');
};
var setCollectionList = function() {
	listButton.toggleClass('view-active');
	collectionsLayout.toggleClass('collections-list');
};
var wrapCollection = function() {
	if (collectionsLayout.hasClass('collections-grid')) {
		$('.collection-info').each(function() {
			collectionLink = $(this).find('.collection-link').attr("href");
			$(this).wrap( "<a href='" + collectionLink + "'></div>" );
		});
	}
	else {
		$('.collection-info').each(function() {
			if ($('.collection-info').parent().is("a")) {
				$(this).unwrap();
			}
		});
	}
};
var refreshCollectionLayout = function() {
	if (collectionsLayout.hasClass('collections-grid')) {
		setCollectionGrid();
		setCollectionList();
		wrapCollection();
	}
	else {
		setCollectionList();
		setCollectionGrid();
		wrapCollection();
	}
};
/*
var setCaptionHeight = function() {
	var windowWidth = $(window).width();
	var figCaption = $('#featured-images figure > figcaption');
	if (windowWidth < 600) {
		var figWindowHeight = $('#featured-window').height();
		figCaption.css('height', figWindowHeight);
	}
	else {
		figCaption.removeAttr('style');
	}
}
*/
/**********Initial load calls**********/
wrapCollection();
/**********Upon resize calls**********/
$(window).resize(function() {
	var windowWidth = $(window).width();
	if ((windowWidth < 700) && collectionsLayout.hasClass('collections-list')) {
		refreshCollectionLayout();
	}
});
/**********Page interactions**********/
//Clicking the arrow at the bottom of landing image scrolls down to the summary
//$('#landing').height() - 42  <-- 42 is the height of header
$('#landing-arrow').click(function(){
	$('html, body').animate({scrollTop : $('#landing').height() - 42},600);
	return false;
});
//If the window is towards top of page, do not show scroll-to-top arrow
$(window).scroll(function(){
	if ($(this).scrollTop() > 200) {
		$('#scroll-to-top').addClass('show-scroll-to-top');
	}
	else {
		$('#scroll-to-top').removeClass('show-scroll-to-top');
	}
});
//When the scroll-to-top arrow is clicked...
$('#scroll-to-top').click(function(){
	$('html, body').animate({scrollTop : 0},600);
	return false;
});

$('#collections > .section-banner > div > img').click(function() {
	refreshCollectionLayout();
});
