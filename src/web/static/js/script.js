

var zegar = document.getElementById('zegar');
var dataPrzypomnienia="";

var switchdiv = false;
var removed = true;



function zmieniaj_postep(){
	if(sessionStorage.clickCount){
		if (sessionStorage.clickCount < 8848){
			$('#p2').html('Postęp: '+sessionStorage.clickCount+' z 8848');
		}
		else{
			if(document.getElementById('switchdiv')) document.getElementById('switchdiv').parentNode.removeChild(document.getElementById('switchdiv'));
			switchdiv = false;
			removed = true;
			checkswitch();
		}
	}	
	else $('#p2').html('Postęp: 0 z 8848');
}

function checkswitch(){
	var toggleswitch = document.getElementById('checkswitch');
	if (toggleswitch.checked){
		if(!switchdiv){
			var div = document.createElement('div');
			var h2  = document.createElement('h2');
			var p1 = document.createElement('p');
			var p2 = document.createElement('p');
			var button = document.createElement('button');
			var text = document.createTextNode('Wysokość Ewerestu wynosi 8848,86m');
			h2.appendChild(text);
			h2.setAttribute('style', 'font-size: 20px;')
			div.appendChild(h2);
			text = document.createTextNode('Żeby dotrzeć na szczyt ma Pan zrobić 8848 kliknięć myszą');
			p1.appendChild(text);
			div.appendChild(p1);
			if(sessionStorage.clickCount){
				if(sessionStorage.clickCount < 8848){
					text= document.createTextNode('Postęp: '+sessionStorage.clickCount+' z 8848');
				}
				else{
					text= document.createTextNode('Gratulacje! Pan dotarł na szczyt!');
				}
			}
			else text = document.createTextNode('Postęp: 0 z 8848');
			p2.appendChild(text);
			p2.setAttribute('id', 'p2');
			div.appendChild(p2);
			if(sessionStorage.clickCount){
				if(sessionStorage.clickCount < 8848){
					button.setAttribute('id', 'buttonsession');
					text = document.createTextNode("Zrobić kliknięcie")
					button.appendChild(text);
					div.appendChild(button);
				}
			}else{
				button.setAttribute('id', 'buttonsession');
					text = document.createTextNode("Zrobić kliknięcie")
					button.appendChild(text);
					div.appendChild(button);
			}

			document.getElementById('containerswitchdiv').appendChild(div);
			div.setAttribute('id', 'switchdiv');
			$("#buttonsession").button();
			$("#buttonsession").click(function(){
				if(sessionStorage.clickCount){
					sessionStorage.clickCount++;
				}
				else{
					sessionStorage.clickCount = 1;
				}
			});
			switchdiv = true;
			removed = false;
		}
	}else {
		if(!removed){
			document.getElementById('switchdiv').parentNode.removeChild(document.getElementById('switchdiv'));
			switchdiv = false;
			removed = true;
		}
	}
	
}

function changeTime(){
	
	var czas = new Date();
	
	var hour = czas.getHours();
	var minute = czas.getMinutes();
	var second = czas.getSeconds();
	
	if (hour<10) hour = '0'+hour;
	if(minute<10) minute = '0'+minute;
	if(second<10) second = '0'+second;
	zegar.innerHTML = hour+":"+minute+":"+second;
}


function changePrzypominacz(){
	if(window.localStorage && localStorage.dataPrzypomnienia){
		dataPrzypomnienia = localStorage.dataPrzypomnienia;
	}
	document.getElementById('przypominacz').innerHTML = 'Planujesz podróż w góry: '+dataPrzypomnienia;
}


function changeDate(){
	var data = new Date();
	
	var dzien = data.getDate();
	var miesiac = data.getMonth()+1;
	var rok = data.getFullYear();
	
	if (dzien<10) dzien = '0' + dzien;
	if (miesiac<10) miesiac = '0' + miesiac;
	
	$('#kalendarz').html('Dzisiejsza data: '+dzien+'.'+miesiac+'.'+rok);
	changeTime();
	setTimeout('changeTime()', 1000);
	setTimeout('changeDate()', 100);
	setTimeout('changePrzypominacz()', 100);
	setTimeout('checkswitch()', 10);
	setTimeout('zmieniaj_postep()', 100);
}

function close_photo() {
	document.getElementById('expanddiv').parentNode.removeChild(document.getElementById('expanddiv'));
	document.getElementById('expandimg').parentNode.removeChild(document.getElementById('expandimg'));
	document.getElementById('closebutton').parentNode.removeChild(document.getElementById('closebutton'));
	jQuery('body').css("overflow", "auto");
}

function expand_photo(photo) {
	// var div = document.createElement('div');
	// var img = document.createElement('img');
	// var button = document.createElement('img');
	// $(button).attr('id', 'closebutton');
	// $(button).attr('src', 'static/img/close.png');
	// $(img).attr('src', 'images/watermarks/'+photo);
	// $(img).attr('alt', 'img');
	// $(img).attr('id', 'expandimg');
	// $(div).attr('id', 'expanddiv');
	// document.getElementById('idmain').appendChild(div);
	// document.getElementById('idmain').appendChild(img);
	// document.getElementById('idmain').appendChild(button);
	// jQuery('body').css("overflow", "hidden");
	// jQuery('#closebutton').click(function () {
	// 	close_photo()
	// });
	window.location.href = "images/watermarks/"+photo;
}



window.onload = function() {changeDate();};

jQuery( function() {
	
    $( "#datepicker" ).datepicker({
		dateFormat: "dd.mm.yy"
	});

	$("#datepicker").on("change", function(){
		if(window.localStorage){
			localStorage.dataPrzypomnienia = $(this).val();
			dataPrzypomnienia = localStorage.dataPrzypomnienia;
		}
		else dataPrzypomnienia = $(this).val();
	});
	

	$.scrollTo(0);
	
	$('.expand').click(function () {
		$('header nav').slideToggle(300);
	});

	$('.hoverli').hover(function () {
		$('.hovera').css('color', "#fff");
	}, function () {
		$('.hovera').css('color', "#000");
	});

	jQuery('.forasid').click(function (e) {
		e.preventDefault();
		if (jQuery('.asid').is(":visible")) {
			jQuery('.asid').stop(true, true).hide("slide", { direction: "right" }, 200);
			jQuery('body').css("overflow", "auto");
			jQuery('.asid').css("overflow", "hidden");
			document.getElementById("forasid").classList.remove('forasid_unhidden');
		} else {
			jQuery('.asid').stop(true, true).show("slide", { direction: "right" }, 200);
			jQuery('body').css("overflow", "hidden");
			jQuery('.asid').css("overflow", "auto");
			document.getElementById("forasid").classList.toggle('forasid_unhidden');
		}
	});

	jQuery('.explicphoto').click(function () {
		var photo = $(this).attr('alt');
		expand_photo(photo);
	})

	
	

	$('#nawwar').click(function(){ $.scrollTo($('#warunki'), 500); });
	$('#nawplan').click(function(){ $.scrollTo($('#planowanie'), 500); });
	$('#nawwyp').click(function() {$.scrollTo ($('#wyposazenie'), 500); });
	$('#nawtrudn').click(function() {$.scrollTo ($('#trudnosc'), 500); });
	$('#nawwskaz').click(function() {$.scrollTo ($('#wskazowki'), 500); });
	$('#scrollUp').click(function(){ $.scrollTo(0, 1000);});
 } );
 
 

 $(window).scroll(function()
	{
		if($(this).scrollTop()>500) $('#scrollUp').fadeIn();
		else $('#scrollUp').fadeOut();
	}
	);
	
	