/*==========================================================================
* 1) When site features are completed, remove class='openComingSoon' from
*    all relevant elements on page. Example: When technical.php is made,
*    remove the 'openComingSoon' class from the link to technical.php in
*    the aboutNav.php include.
* 2) When site is complete, delete this file, remove all includes of the
*    modals.php (should be one for every page), delete all modals.js
*    scripts (should be one for every page), remove relevant CSS section,
*    and clean up all 'openComingSoon' class instances.
* 3) Also: remove the js.cookie.js script from the head include
==========================================================================*/
/*==========================================================================
* Below is the code for opening and closing the comingSoon modal.
* Anything with class='openComingSoon' opens the modal on click event
* Anything with class='closeComingSoon' closes the modal on click event
* diplayModal is the CSS class that displays the modal (obvious, I know)
==========================================================================*/
$('#copyLink').click(function() {
	$('#modal').addClass('displayModal');
	$('body').addClass('modal-open');
	return false;
});


$('#modal-x-btn').click(function() {
	$('#modal').removeClass('displayModal');
	$('body').removeClass('modal-open');
});



$('.openModal').click(function() {
	$('#modal').addClass('displayModal');
	$('body').addClass('modal-open');
	return false;
});

$('.closeModal').click(function() {
	$('#modal').removeClass('displayModal');
	$('body').removeClass('modal-open');
});



$('.openModalMedia').click(function() {
	$('#modalMedia').addClass('displayModal');
	$('body').addClass('modal-open');
	return false;
});

$('.closeModalMedia').click(function() {
	$('#modalMedia').removeClass('displayModal');
	$('body').removeClass('modal-open');
});



/*$('.openModalStartConversation').click(function() {
	$('#modalLogInPrompt').addClass('displayModal');
	$('body').addClass('modal-open');
	return false;
});
*/
/*$('.closeModalLogInPrompt').click(function() {
	$('#modalLogInPrompt').removeClass('displayModal');
	$('body').removeClass('modal-open');
});*/

$('.openModalParticipateInConversation').click(function() {
	$('#modalParticipateInConversation').addClass('displayModal');
	$('body').addClass('modal-open');
	return false;
});

$('.closeModalParticipateInConversation').click(function() {
	$('#modalParticipateInConversation').removeClass('displayModal');
	$('body').removeClass('modal-open');
});

/*global document:false, $:false */
var txt = $('.textAdjust'),
    hiddenDiv = $(document.createElement('div')),
    content = null;

//txt.addClass('txtstuff');
hiddenDiv.addClass('hiddendiv common');

$('body').append(hiddenDiv);

txt.on('keyup', function () {
	wdth = $(this).width();
    content = $(this).val();
	hiddenDiv.width(wdth);
    content = content.replace(/\n/g, '<br>');
    hiddenDiv.html(content + '<br class="lbr">');

	if ( hiddenDiv.height() < 200) {
		$(this).css('height', hiddenDiv.height());
	} else {
		$(this).css('height', 200);
	}
    
});