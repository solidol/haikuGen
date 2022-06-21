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


    <script src="./js/glide.min.js"></script>

    <!-- Styles -->
    <link href="./css/all.min.css" rel="stylesheet">
    <link href="./css/glide.core.min.css" rel="stylesheet">
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
            <h2>Введіть текст</h2>
                <div class="row">
                    <form>
                        <textarea class="form form-control  form-control-lg" id="inptext" rows="3"></textarea>
                        <h3>Автор</h3>
                        <input type="text" name="cr" id="cr" placeholder="Your Name" class="form form-control form-control-lg">
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
                <h2>Обреріть фон</h2>
                <div id="bgcar">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <?php for ($im = 1; $im <= 24; $im++) : ?>
                                <li class="glide__slide">
                                    <img class="bg-preview" data-ind="<?= $im ?>" src="./assets/bg/<?= $im ?>.jpg">
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <button id="btnupload" type="button" class="btn col-4"><i class="fa-solid fa-plus"></i></button>
                    <button type="button" id="btnresetform" class="btn col-4"><i class="fa-solid fa-recycle"></i></button>
                    <button type="button" id="btnedit" class="btn col-4"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>


            <div id="page2" class="page hidden">
                <h2>Збережіть</h2>
                <div id="canvasdiv" class="row">

                </div>
                <div class="row">
                    <h3>Фільтри</h3>
                    <div id="filters">
                        <button id="btngrayscale" type="button" class="btn col-3">Ggray</button>
                        <button id="btnblur" type="button" class="btn col-3">Blur</button>
                        <button id="btnposterize" type="button" class="btn col-3">Poster</button>
                        <button id="btnreduce" type="button" class="btn col-3">Reduce</button>

                    </div>
                    <div class="row">
                        <button id="btnchosebg" type="button" class="btn col-6"><i class="fa-solid fa-arrow-left"></i></button>
                        <button id="btndownload" type="button" class="btn col-6"><i class="fa-solid fa-angles-down"></i></button>
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

            <div class="footer-col"><span>HaikuGen 0.9.1 © Levytskyi Viktor</span></div>
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