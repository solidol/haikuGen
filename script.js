let texts = [];
let selectedText = -1;
let canvas;
let ctx;

let stringArray = [];
let sch1 = false; /* 12 + 5 */
let sch2 = false; /* 5 + 12*/
let sch3 = false; /* 5 + 7 + 5*/
let imgFilePath = "bg/1.jpg";
let offsetX ;
let offsetY ;
let scrollX;
let scrollY;

$(document).ready(function(){
canvas = document.getElementById("canvas");
ctx = canvas.getContext("2d");

// letiables used to get mouse position on the canvas
let $canvas = $("#canvas");
let canvasOffset = $canvas.offset();
offsetX = canvasOffset.left;
offsetY = canvasOffset.top;
scrollX = $canvas.scrollLeft();
scrollY = $canvas.scrollTop();

// letiables to save last mouse position
// used to see how far the user dragged the mouse
// and then move the text by that distance
let startX;
let startY;
// an array to hold text objects


// this let will hold the index of the hit-selected text


// clear the canvas & redraw all texts
function draw() {
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	
	
	for (let i = 0; i < texts.length; i++) {
		let text = texts[i];
		ctx.font = '24px "Han Zi"';
		ctx.fillText(text.text, text.x, text.y);
	}

}

function drawWithImage(){

	imgBg = new Image(500,500);
	imgBg.onload = function(){
		canvas.width = this.naturalWidth;
		canvas.height = this.naturalHeight;
		ctx.drawImage(this, 0, 0);
		ctx.drawImage(this, 0, 0, this.width, this.height);


	for (let i = 0; i < texts.length; i++) {
		let text = texts[i];
		ctx.font = '24px "Han Zi"';
		ctx.fillText(text.text, text.x, text.y);
	}


	};	
	imgBg.src = imgFilePath;
	
}


// test if x,y is inside the bounding box of texts[textIndex]
function textHittest(x, y, textIndex) {
	let text = texts[textIndex];
	return (x >= text.x && x <= text.x + text.width && y >= text.y - text.height && y <= text.y);
}


function prepareText(){
		ctx.textBaseline = "bottom";
		ctx.font = '24px "Han Zi"';
		texts = [];
		text={};
		text.text=stringArray[0];
		text.x=50;
		text.y=80;
		text.width = ctx.measureText(text.text).width;
		text.height = 24;
		texts.push(text);
		text={};
		text.text=stringArray[1];
		text.x=90;
		text.y=130;
		text.width = ctx.measureText(text.text).width;
		text.height = 24;
		texts.push(text);

		if (sch3){
			text={};
			text.text=stringArray[2];
			text.x=150;
			text.y=180;
			text.width = ctx.measureText(text.text).width;
			text.height = 24;
			texts.push(text);
		}
}


// listen for mouse events
$("#canvas").mousedown(function (e) {
	e.preventDefault();
	//console.dir(e);
	startX = parseInt(e.pageX - offsetX);
	startY = parseInt(e.pageY - offsetY);


//console.log(startX + ' ' + startY);


    for (let i = 0; i < texts.length; i++) {
    	if (textHittest(startX, startY, i)) {
    		selectedText = i;
    		
    	}
    }
});
$("#canvas").mousemove(function (e) {
	if (selectedText < 0) {
		return;
	}
	e.preventDefault();
	mouseX = parseInt(e.pageX - offsetX);
	mouseY = parseInt(e.pageY - offsetY);

    // Put your mousemove stuff here
    let dx = mouseX - startX;
    let dy = mouseY - startY;
    startX = mouseX;
    startY = mouseY;

    let text = texts[selectedText];
    text.x += dx;
    text.y += dy;
    draw();
});
$("#canvas").mouseup(function (e) {
	e.preventDefault();
	selectedText = -1;
	drawWithImage();
});
$("#canvas").mouseout(function (e) {
	e.preventDefault();
	selectedText = -1;
});






$("#download").click(function(){
	let link = document.createElement('a');
	link.download = 'filename.png';
	link.href = canvas.toDataURL()
	link.click();
});



$(".bg-preview").on("click", function(){
	imgFilePath = $(this).attr("src");
	$("#render").click();
});

$("#render").on("click", function(){
	$("#inptext").keyup();

prepareText();
drawWithImage();

});
$("#inptext").on("keyup", function(){

	for (let i = 15 - 1; i >= 0; i--) {
		str1.cells[i].innerHTML='.';
		str2.cells[i].innerHTML='.';
		str3.cells[i].innerHTML='.';
		hd1.cells[i].innerHTML='-';
		hd2.cells[i].innerHTML='-';
		hd3.cells[i].innerHTML='-';
	}	

	stringArray = document.getElementById('inptext').value.split('\n');

	if (!stringArray[0]) stringArray[0]='';
	if (!stringArray[1]) stringArray[1]='';
	if (!stringArray[2]) stringArray[2]='';

	let line1 = stringArray[0].match(/[ЙЦКНГҐ\'ШЩЗХФВПРЛДЖЧСМТЬБ]*[ЇІУЕАОЄЯИЮ][ЙЦКНГҐ\'ШЩЗХФВПРЛДЖЧСМТЬБ]*?(?=$|[^А-ЯЇІ]|[ЦКНГҐШЩЗХФВПРЛДЖЧСМТБ]?[ЇІУЕИАОЄЯИЮ]|Й[АІУЄЕО])/ig) || [];
	let line2 = stringArray[1].match(/[ЙЦКНГҐ\'ШЩЗХФВПРЛДЖЧСМТЬБ]*[ЇІУЕАОЄЯИЮ][ЙЦКНГҐ\'ШЩЗХФВПРЛДЖЧСМТЬБ]*?(?=$|[^А-ЯЇІ]|[ЦКНГҐШЩЗХФВПРЛДЖЧСМТБ]?[ЇІУЕИАОЄЯИЮ]|Й[АІУЄЕО])/ig) || [];
	let line3 = stringArray[2].match(/[ЙЦКНГҐ\'ШЩЗХФВПРЛДЖЧСМТЬБ]*[ЇІУЕАОЄЯИЮ][ЙЦКНГҐ\'ШЩЗХФВПРЛДЖЧСМТЬБ]*?(?=$|[^А-ЯЇІ]|[ЦКНГҐШЩЗХФВПРЛДЖЧСМТБ]?[ЇІУЕИАОЄЯИЮ]|Й[АІУЄЕО])/ig) || [];



	if (line1.length==12 && line2.length==5 && line3.length==0) {
		sch1 = true;
		sch2 = false;
		sch3 = false;
	}
	if (line1.length==5 && line2.length==12 && line3.length==0)  {
		sch1 = false;
		sch2 = true;
		sch3 = false;
	}
	if (line1.length==5 && line2.length==7 && line3.length==5)  {
		sch1 = false;
		sch2 = false;
		sch3 = true;
	}


	if (sch1 ^ sch2 ^ sch3){
		str1.style="background-color: #d1f0a5";
		str2.style="background-color: #d1f0a5";
		str3.style="background-color: #d1f0a5";
	}else{
		str1.style="background-color: #f0e3a5";
		str2.style="background-color: #f0e3a5";
		str3.style="background-color: #f0e3a5";
	}


	for (let i = line1.length - 1; i >= 0; i--) {
		str1.cells[i].innerHTML=line1[i];
		hd1.cells[i].innerHTML=i+1;
	}
	for (let i = line2.length - 1; i >= 0; i--) {
		str2.cells[i].innerHTML=line2[i];
		hd2.cells[i].innerHTML=i+1;
	}
	for (let i = line3.length - 1; i >= 0; i--) {
		str3.cells[i].innerHTML=line3[i];
		hd3.cells[i].innerHTML=i+1;
	}

});


});