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

let offsetX;
let offsetY;
let scrollX;
let scrollY;
let canvas;
let canvasOffset;
let startX;
let startY;



function preload() {
    for (let i = 1; i <= imgCount; i++) {
        let fileName = './assets/bg/' + i + '.jpg';
        images.push(loadImage(fileName));
    }

}

function setup() {

    const canvas = createCanvas(500, 500);
    background(0);
    canvas.parent('canvasdiv');
    inptext.onkeypress = function () {
        textCheck();
    };

    setEvents()

}

function draw() {
    image(images[imgSelectedIndex], 0, 0);

}

function keyPressed() {

}

function mouseMoved() {

}


function textCheck() {
    let wpHeaders = document.querySelectorAll(".table-header-line td");
    let wpStrings = document.querySelectorAll(".table-string-line td");
    for(item of wpHeaders){
        item.texts = '-';
    }
    for(item of wpStrings){
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
}