var currentPage = window.location.pathname.split('/');
currentPage = currentPage[currentPage.length - 1];

var activePage;
$("#about-nav > nav > a").each(function() {
  if ($(this).attr("href") == currentPage) { // find the link that matches the page you're on
    $(this).addClass("active-page"); // give it class active-page (styling)
    $(this).clone().attr('id','current-page').prependTo("#current-page-box"); // #current-page is copied into mobile #current-page-box
  }
});

if ($( window ).width() < 600) { // if mobile
  $("#about-nav").addClass('mobile-about-nav'); // add class 'mobile-about-nav' (used for a conditional later)
}

$( window ).resize(function() { // if window is resized, DOM needs manipulation
  if (($( window ).width() >= 600) && ($("#about-nav").hasClass('mobile-about-nav'))) {
    // if desktop mode and still is in "mobile mode"
    $("#about-nav").removeClass('mobile-about-nav'); // remove "mobile mode"
  }
  if (($( window ).width() < 600) && !($("#about-nav").hasClass('mobile-about-nav'))) {
    // if in mobile but still "desktop mode"
    $("#about-nav").addClass('mobile-about-nav'); // add "mobile mode"
  }
});

$("#current-page-box").click(function() { // toggles for the dropdown animation of menu in mobile
  $("#about-nav > nav").toggleClass("about-nav-slider");
  $("#current-page-box > img").toggleClass("rotate-arrow");
});

$("#current-page").click(function(event) {
  event.preventDefault();
});

$(".about-content").click(function() {
  if ($("#about-nav > nav").hasClass("about-nav-slider")) {
    $("#about-nav > nav").toggleClass("about-nav-slider");
    $("#current-page-box > img").toggleClass("rotate-arrow");
  }
});
