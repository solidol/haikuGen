<!DOCTYPE html>
<!-- saved from url=(0022)http://levitsky.pp.ua/ -->
<html lang="uk">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="3ReSYi59fsAN3FihB06r1kG8kd8JXEkPbTki5jnB">

    <title>HaikuGen - генератор хайку для Instagram</title>

    <!-- Scripts -->

    <script src="./js/p5.min.js" defer=""></script>
    <script src="./js/script.js" defer=""></script>
    <script src="./js/chief-slider.min.js" defer=""></script>



    <!-- Styles -->
    <link href="./css/all.min.css" rel="stylesheet">
    <link href="./css/chief-slider.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>
    <div class="mainpaper">
        <header>
            <h1><span class="cl-red">H</span>aikuGen</h1>
            <!--
            <nav>
                <a href="http://levitsky.pp.ua/">UA</a>
                <a href="http://levitsky.pp.ua/ru">RU</a>
            </nav>
            -->
        </header>
        <main role="main">


            <div id="page1" class="page">
                <h2>Обреріть фон</h2>


                <div class="container">

                    <div class="slider">
                        <div class="slider__container">
                            <div class="slider__wrapper">
                                <div class="slider__items">
                                    <?php for ($sl = 0; $sl < 6; $sl++) : ?>
                                        <div class="slider__item">

                                            <?php for ($im = 1; $im <= 4; $im++) : ?>
                                                <img class="bg-preview" data-ind="<?= $im + ($sl * 4) ?>" src="./assets/bg/<?= $im + ($sl * 4) ?>.jpg">
                                            <?php endfor; ?>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="slider__control" data-slide="prev"></a>
                        <a href="#" class="slider__control" data-slide="next"></a>
                    </div>

                    <div class="modal-footer btn-group">
                        <button id="btnupload" type="button" class="btn col-6"><i class="fa-solid fa-plus"></i></button>
                        <button id="btntoform" type="button" class="btn col-6"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div id="page2" class="page hidden">
                <h2>Введіть текст</h2>
                <div class="row">
                    <form>
                        <div class="form-group">
                            <label for="inptext">Текст</label>
                            <textarea class="form form-control  form-control-lg" id="inptext" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="cr">Автор</label>
                            <input type="text" name="cr" id="cr" placeholder="Your Name" class="form form-control form-control-lg">
                        </div>



                    </form>
                </div>
                <div class="row">
                    <table id="parts" class="table-striped">
                        <tbody>
                            <tr id="hd1" class="table-header-line">
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr id="str1" class="table-string-line">
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                            </tr>
                            <tr id="hd2" class="table-header-line">
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr id="str2" class="table-string-line">
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                            </tr>
                            <tr id="hd3" class="table-header-line">
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr id="str3" class="table-string-line">
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                                <td>.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" id="btnchosebg1" class="btn col-4"><i class="fa-solid fa-arrow-left"></i></button>
                        <button type="button" id="btnresetform" class="btn col-4"><i class="fa-solid fa-recycle"></i></button>
                        <button type="button" id="btnedit" class="btn col-4"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>

            <div id="page3" class="page hidden">
                <h2>Збережіть</h2>
                <div id="canvasdiv" class="modal-body">

                </div>
                <div class="modal-footer btn-group">
                    <button id="btnbacktoform" type="button" class="btn col-4"><i class="fa-solid fa-arrow-left"></i></button>
                    <button id="btnchosebg2" type="button" class="btn col-4"><i class="fa-solid fa-arrows-rotate"></i></button>
                    <button id="btndownload" type="button" class="btn col-4"><i class="fa-solid fa-angles-down"></i></button>
                </div>
            </div>

            <div class="page hidden" id="mdHelp">

                <h4 class="modal-title">Довідка</h4>


                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row row-bg-pv">
                            <div class="col-12">
                                <div>
                                    Регулярний вираз налаштовано під український алфавіт. Обробляються схеми 12 + 5, 5 + 12, 5 + 7 + 5.
                                </div>


                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </main>

        <footer>

            <div class="footer-col"><span>HaikuGen 0.8.9 © Levytskyi Viktor</span></div>
            <div class="footer-col">
                <div class="social-bar-wrap">
                    <a title="Facebook" href="http://levitsky.pp.ua/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a title="Twitter" href="http://levitsky.pp.ua/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <a title="Pinterest" href="http://levitsky.pp.ua/" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a>
                    <a title="Instagram" href="http://levitsky.pp.ua/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>

        </footer>
    </div>

</body>

</html>