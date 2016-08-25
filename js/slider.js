var imgs = [];
var numObj = [];
var ind;
var offsets = [];
var widths = [];
var wth;
var offLft;
var h3 = [];
var p = [];
var currIndex = 0;

$(function() {
	getImgs();
	getObjs();
    getTitles();
    getDesc();
	
    insertImgs(imgs);
    /*insertTitles(h3);
    insertDesc(p);*/
    
	$('.collection-container a').click(function(){        
        widths.length = 0;
		getWidths();
		calcWidths(numObj, widths);
		currIndex = clickedIndex($(this).parent());
		startOff(widths, ind);
		wth = wth - 700;
		console.log(wth);
                
        console.log($("#modalMedia .mediaCont p").remove());
        console.log($("#modalMedia .mediaCont h3").remove());
        var DescHTML = "<p>"+getDesc()[currIndex]+"</p>";
        var TitleHTML = "<h3>"+getTitles()[currIndex]+"</h3>";
        $("#modalMedia .mediaCont").append(TitleHTML+DescHTML);
    });    
});

$(".prev img").click(function() {
	if ($("#modalMedia .imgsContainer").css("margin-left") != "0px") {
		$("#modalMedia .imgsContainer").animate({
			marginLeft: '+=700'
		}, 500);
        
        currIndex--;
        console.log($("#modalMedia .mediaCont p").remove());
        console.log($("#modalMedia .mediaCont h3").remove());
        var DescHTML = "<p>"+getDesc()[currIndex]+"</p>";
        var TitleHTML = "<h3>"+getTitles()[currIndex]+"</h3>";
        $("#modalMedia .mediaCont").append(TitleHTML+DescHTML);        
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
	
        currIndex++;
        console.log($("#modalMedia .mediaCont p").remove());
        console.log($("#modalMedia .mediaCont h3").remove());
        var DescHTML = "<p>"+getDesc()[currIndex]+"</p>";
        var TitleHTML = "<h3>"+getTitles()[currIndex]+"</h3>";
        $("#modalMedia .mediaCont").append(TitleHTML+DescHTML); 

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

function getTitles() {
	$(".collection-container").each(function() {
		var h3v = $(this).children().children().find("h3");
		h3.push(h3v.text());
	});
	return h3;
}

function getDesc() {
	$(".collection-container").each(function() {
		var pv = $(this).children().children().find("p");
		p.push(pv.text());
	});
	return p;
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

function insertTitles(titleList) {
	$("#modalMedia .mediaCont").empty();
	for (i = 0; i < titleList.length; i++) {
		var titlesHTML = '<h3>'+titleList[i]+'</h3>';
		$("#modalMedia .mediaCont").append(titlesHTML);
	}
}

function insertDesc(descList) {
	$("#modalMedia .mediaCont").empty();
	for (i = 0; i < descList.length; i++) {
		var descHTML = '<p>'+descList[i]+'</p>';
		$("#modalMedia .mediaCont").append(descHTML);
	}	
}

function startOff(wdths, index) {
	var startWdth = 700 * index;
	$("#modalMedia .imgsContainer").css("margin-left", -startWdth);
	
}
