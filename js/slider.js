var imgs = [];
var numObj = [];
var ind;
var offsets = [];
var widths = [];
var wth;
var offLft;

$(function() {
	getImgs();
	getObjs();
	insertImgs(imgs);
	
	$('.collection-container a').click(function(){
		widths.length = 0;
		getWidths();
		calcWidths(numObj, widths);
		clickedIndex($(this).parent());
		startOff(widths, ind);
		wth = wth - 700;
		console.log(wth);
	});
});

$(".prev img").click(function() {
	if ($("#modalMedia .imgsContainer").css("margin-left") != "0px") {
		$("#modalMedia .imgsContainer").animate({
			marginLeft: '+=700'
		}, 500);
	}
});

$(".next img").click({width:wth},function() {
	mgn = $("#modalMedia .imgsContainer").css("margin-left");
	mgn = parseInt(mgn);
	if (wth > -mgn ) {
		console.log("true");
		$("#modalMedia .imgsContainer").animate({
			marginLeft: '-=700'
		}, 500);
	}
});

function getImgs() {
	$(".collection-container").each(function() {
		var img = $(this).children().children().find("img");
		var src = img.attr("src");
		imgs.push(src);
	});
	return imgs;
}

function getObjs() {
	i = 0;
	$(".collection-container").each(function() {
		numObj.push(i);
		i++;
	});
	return numObj;
}

function getWidths() {
	$("#modalMedia .imgsContainer img").each(function() {
		nwidth = $(this).width();
		widths.push(nwidth);
	});
	return widths;
}

function calcWidths(objs, ws) {
	len = objs.length;
	wth = 700 * len;
	return wth;
}

function clickedIndex(target) {
	ind = $(".collection-container").index(target);
	return ind;
}

function insertImgs(imageList) {
	$("#modalMedia .imgsContainer").empty();
	for (i = 0; i < imageList.length; i++) {
		var imgHTML = '<img alt="media image" src="' + imageList[i] + '">';
		$("#modalMedia .imgsContainer").append(imgHTML);
	}
}

function startOff(wdths, index) {
	var startWdth = 700 * index;
	$("#modalMedia .imgsContainer").css("margin-left", -startWdth);
	
}
