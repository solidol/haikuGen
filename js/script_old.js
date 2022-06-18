

$(document).ready(function () {

    let texts = [];
    let selectedText = -1;
    let ctx;

    let stringArray = [];
    let sch1 = false; /* 12 + 5 */
    let sch2 = false; /* 5 + 12*/
    let sch3 = false; /* 5 + 7 + 5*/
    let imgFilePath = "bg/1.jpg";
    let offsetX;
    let offsetY;
    let scrollX;
    let scrollY;
    let $canvas;
    let canvasOffset;



    $canvas = $("#canfinal");
    ctx = $canvas[0].getContext("2d");

// letiables used to get mouse position on the canvas
    canvasOffset = $canvas.offset();
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
        ctx.clearRect(0, 0, $canvas.width(), $canvas.height());

        ctx.textBaseline = "bottom";
        for (let i = 0; i < texts.length; i++) {
            let text = texts[i];
            ctx.font = text.font;
            ctx.fillStyle = 'black';
            ctx.fillText(text.text, text.x, text.y);
            ctx.fillStyle = 'red';
            ctx.fillText(text.text[0], text.x, text.y);
        }

    }

    function drawWithImage() {

        imgBg = new Image(500, 500);
        imgBg.onload = function () {
            ctx.canvas.width = this.naturalWidth;
            ctx.canvas.height = this.naturalHeight;
            ctx.drawImage(this, 0, 0);
            ctx.drawImage(this, 0, 0, this.width, this.height);

            ctx.textBaseline = "bottom";

            for (let i = 0; i < texts.length; i++) {
                let text = texts[i];
                ctx.font = text.font;
                ctx.fillStyle = 'black';
                ctx.fillText(text.text, text.x, text.y);
                ctx.fillStyle = 'red';
                ctx.fillText(text.text[0], text.x, text.y);
            }


        };
        imgBg.src = imgFilePath;

    }


// test if x,y is inside the bounding box of texts[textIndex]
    function textHittest(x, y, textIndex) {
        let text = texts[textIndex];
        return (x >= text.x && x <= text.x + text.width && y >= text.y - text.height && y <= text.y);
    }


    function prepareText() {

        //TODO
        // решить костыль //ctx.measureText(text.text).width;
        texts = [];
        text = {};
        text.text = stringArray[0];
        text.font = '24px "Han Zi"';
        text.x = 50;
        text.y = 80;
        text.width = 500; //ctx.measureText(text.text).width;
        text.height = 24;
        texts.push(text);
        text = {};
        text.text = stringArray[1];
        text.x = 90;
        text.y = 130;
        text.width = 500; //ctx.measureText(text.text).width;
        text.height = 24;
        texts.push(text);

        if (sch3) {
            text = {};
            text.text = stringArray[2];
            text.font = '24px "Han Zi"';
            text.x = 150;
            text.y = 180;
            text.width = 500; //ctx.measureText(text.text).width;
            text.height = 24;
            texts.push(text);
        }

        text = {};
        text.text = $('#cr').val();
        text.font = '18px "Han Zi"';
        text.x = 300;
        text.y = 450;
        text.width = 500; //ctx.measureText(text.text).width;
        text.height = 24;
        texts.push(text);
    }


    $("#mdEditRes").on('scroll shown.bs.modal', function () {
        canvasOffset = $canvas.offset();
        offsetX = canvasOffset.left;
        offsetY = canvasOffset.top;
        //console.log(offsetX + ' ' + offsetX);
    });

// listen for mouse events
    $canvas.on("mousedown touchstart", function (e) {
        e.preventDefault();
        //console.dir(e);
        if (e.type === 'touchstart') {
            startX = parseInt(e.touches[0].pageX - offsetX);
            startY = parseInt(e.touches[0].pageY - offsetY);
        } else {
            startX = parseInt(e.pageX - offsetX);
            startY = parseInt(e.pageY - offsetY);
        }

        //console.log(startX + ' ' + startY);


        for (let i = 0; i < texts.length; i++) {
            if (textHittest(startX, startY, i)) {
                selectedText = i;

            }
        }
    });
    $canvas.on("mousemove touchmove", function (e) {
        if (selectedText < 0) {
            return;
        }
        e.preventDefault();


        if (e.type === 'touchmove') {
            mouseX = parseInt(e.touches[0].pageX - offsetX);
            mouseY = parseInt(e.touches[0].pageY - offsetY);
        } else {
            mouseX = parseInt(e.pageX - offsetX);
            mouseY = parseInt(e.pageY - offsetY);
        }


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
    $canvas.on("mouseup touchend", function (e) {
        e.preventDefault();
        selectedText = -1;
        drawWithImage();
    });
    $canvas.mouseout(function (e) {
        e.preventDefault();
        selectedText = -1;
    });






    $("#download").click(function () {
        let link = document.createElement('a');
        link.download = 'filename.png';
        link.href = $canvas[0].toDataURL();
        link.click();
    });



    $(".bg-preview").on("click", function () {
        imgFilePath = $(this).attr("src");
        $("#inptext").keyup();
        prepareText();
        drawWithImage();
        $(".row-bg-pv div").removeClass("active");
        $(this).parent().addClass("active");
    });

    $("#render").on("click", function () {
        $("#inptext").keyup();

        prepareText();
        drawWithImage();

    });
    $("#inptext").on("keyup", function () {

        $(".table-header-line td").text("-");
        $(".table-string-line td").text(".");

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

    });


});