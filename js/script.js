let texts = [];
let images = [];
let imgSelectedIndex = 0;
let imgControls = [];
let imgCount = 24;
let selectedText = -1;
let ctx;

let stringArray = [];
let sch1 = false; /* 12 + 5 */
let sch2 = false; /* 5 + 12*/
let sch3 = false; /* 5 + 7 + 5*/
let imgFilePath = "./assets/bg/1.jpg";


let canvas;
let touchDistX;
let touchDistY;



function preload() {
    for (let i = 1; i <= imgCount; i++) {
        let fileName = './assets/bg/' + i + '.jpg';
        images.push(loadImage(fileName));
    }
    loadFont('/fonts/hanzi.ttf');
}

function setup() {

    canvas = createCanvas(width, width);
    background(0);
    canvas.parent('canvasdiv');
    inptext.onkeypress = function () {
        textCheck();
    };

    setEvents()

}
/*
ава вава вав
вава авава ыввава
выа ва а вавав  
*/
function draw() {
    if (texts.length > 0 && texts[0].text != undefined) {
        image(images[imgSelectedIndex], 0, 0);
        textFont('Han Zi');
        textAlign(LEFT, BOTTOM);

        for (let tItem of texts) {
            textSize(tItem.font);
            fill(0);
            text(tItem.text, tItem.x, tItem.y);
            fill(255, 0, 0);
            text(tItem.text[0], tItem.x, tItem.y);

        }
    }
}

function keyPressed() {

}

function touchMoved() {
    // Put your mousemove stuff here
    if (selectedText >= 0) {
        texts[selectedText].x = mouseX - touchDistX;
        texts[selectedText].y = mouseY - touchDistY;
    }
}

function touchStarted() {
    for (let i = 0; i < texts.length; i++) {
        if (textHittest(mouseX, mouseY, i)) {
            selectedText = i;
            touchDistX = mouseX - texts[selectedText].x;
            touchDistY = mouseY - texts[selectedText].y;
        }
    }
}

function touchEnded() {
    selectedText = -1;
}


function textCheck() {
    let wpHeaders = document.querySelectorAll(".table-header-line td");
    let wpStrings = document.querySelectorAll(".table-string-line td");
    for (item of wpHeaders) {
        item.texts = '-';
    }
    for (item of wpStrings) {
        item.texts = '.';
    }

    stringArray = $('#inptext').val().split('\n');

    if (!stringArray[0])
        stringArray[0] = '';
    if (!stringArray[1])
        stringArray[1] = '';
    if (!stringArray[2])
        stringArray[2] = '';

    let regexpUa = /[ЙЦКНГҐ\'ШЩЗХФВПРЛДЖЧСМТЬБ]*[ЇІУЕАОЄЯИЮ][ЙЦКНГҐ\'ШЩЗХФВПРЛДЖЧСМТЬБ]*?(?=$|[^А-ЯЇІ]|[ЦКНГҐШЩЗХФВПРЛДЖЧСМТБ]?[ЇІУЕИАОЄЯИЮ]|Й[АІУЄЕО])/ig;
    let regexpRu = /[ЙЦКНГШЩЗХЪФВПРЛДЖЧСМТЬБ]*[ЁУЕЫАОЭЯИЮ][ЙЦКНГШЩЗХЪФВПРЛДЖЧСМТЬБ]*?(?=$|[^А-ЯЁ]|[ЦКНГШЩЗХФВПРЛДЖЧСМТБ]?[ЁУЕЫАОЭЯИЮ]|Й[АИУЕО])/ig;
    let regexpRes;
    switch ($('html').first().attr('lang')) {
        case 'ua':
            regexpRes = regexpUa;
            break;
        case 'ru':
            regexpRes = regexpRu;
            break;
        default:
            regexpRes = regexpUa;
            break;
    }

    let line1 = stringArray[0].match(regexpRes) || [];
    let line2 = stringArray[1].match(regexpRes) || [];
    let line3 = stringArray[2].match(regexpRes) || [];


    let sch1 = sch2 = sch3 = false;
    if (line1.length === 12 && line2.length === 5 && line3.length === 0) {
        sch1 = true;
    } else
        if (line1.length === 5 && line2.length === 12 && line3.length === 0) {
            sch2 = true;
        } else
            if (line1.length === 5 && line2.length === 7 && line3.length === 5) {
                sch3 = true;
            } else {
                sch1 = sch2 = sch3 = false;
            }


    if (sch1 ^ sch2 ^ sch3) {
        $(".table-string-line").addClass("table-string-line-active");
    } else {
        $(".table-string-line").removeClass("table-string-line-active");
    }


    for (let i = line1.length - 1; i >= 0; i--) {
        str1.cells[i].innerHTML = line1[i];
        hd1.cells[i].innerHTML = i + 1;
    }
    for (let i = line2.length - 1; i >= 0; i--) {
        str2.cells[i].innerHTML = line2[i];
        hd2.cells[i].innerHTML = i + 1;
    }
    for (let i = line3.length - 1; i >= 0; i--) {
        str3.cells[i].innerHTML = line3[i];
        hd3.cells[i].innerHTML = i + 1;
    }
}

function prepareText() {

    //TODO

    texts = [];

    for (let i = 0; i < 3; i++) {
        if (i < 2 || sch3)
            texts.push(
                {
                    'text': stringArray[i],
                    'font': 24,
                    'x': 50 + i * 30,
                    'y': 80 + i * 40,
                    'width': 500,
                    'height': 24
                }
            );
    }
    texts.push(
        {
            'text': $('#cr').val(),
            'font': 18,
            'x': 300,
            'y': 450,
            'width': 500,
            'height': 24
        }
    );
}



function setEvents() {
    imgControls = document.querySelectorAll(".bg-preview");
    for (let element of imgControls) {
        element.onclick = function () {
            for (let element of imgControls) {
                element.classList.remove("active");
            }
            this.classList.add("active");
            imgSelectedIndex = this.dataset.ind - 1;
        };
    }


    btnchosebg.onclick = function(){
        page1.classList.add("hidden");
        page2.classList.remove("hidden");
    }
    btnprepare.onclick = function(){
        prepareText();
        page2.classList.add("hidden");
        page3.classList.remove("hidden");
    }
    btnbacktoform1.onclick = function(){
        page2.classList.add("hidden");
        page1.classList.remove("hidden");
    }
    btnbacktoimages.onclick = function(){
        page3.classList.add("hidden");
        page2.classList.remove("hidden");
    }
    btnbacktoform2.onclick = function(){
        page3.classList.add("hidden");
        page1.classList.remove("hidden");
    }
    btndownload.onclick = function(){
        saveCanvas(canvas, 'myCanvas', 'jpg');
    }
}

// test if x,y is inside the bounding box of texts[textIndex]
function textHittest(x, y, textIndex) {
    let text = texts[textIndex];
    return (x >= text.x && x <= text.x + text.width && y >= text.y - text.height && y <= text.y);
}