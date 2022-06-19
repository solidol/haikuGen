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

    <script src="./js/jquery.min.js" defer=""></script>
    <script src="./js/p5.min.js" defer=""></script>
    <script src="./js/script.js" defer=""></script>



    <!-- Styles -->
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>
    <div class="mainpaper">
        <header>
            <h1><span class="cl-red">H</span>aikuGen</h1>
            <nav>
                <a href="http://levitsky.pp.ua/">UA</a>
                <a href="http://levitsky.pp.ua/ru">RU</a>
            </nav>
        </header>
        <main role="main">
            <div id="page1" class="page">
                <form>
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="inptext">Введіть текст</label>
                                <textarea class="form form-control  form-control-lg" id="inptext" rows="3"></textarea>
                            </div>


                        </div>
                        <div class="col-12">

                            <div class="form-group">
                                <label for="cr">Автор хайку</label>
                                <input type="text" name="cr" id="cr" value="Viktor Levytskyi" class="form form-control form-control-lg">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" id="btnchosebg" class="btn btn-primary btn-lg">Обрати фон</button>
                                <button type="button" id="btnresetform" class="btn btn-danger btn-lg">Очистити</button>
                            </div>




                        </div>

                    </div>
                </form>

                <div class=" row">
                    <div class="col-12">
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

                </div>

            </div>

            <div id="page2" class="page hidden">
                <h4 class="modal-title">Обрати фон</h4>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row-bg-pv">
                            <?php
                            for ($i = 1; $i <= 24; $i++) :
                            ?>
                                
                                    <img class="bg-preview" data-ind="<?= $i ?>" src="./assets/bg/<?= $i ?>.jpg">
                                
                            <?php
                            endfor;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer btn-group">
                    <button id="btnbacktoform1" type="button" class="btn btn-danger btn-lg">Назад</button>
                    <button id="btnprepare" type="button" class="btn btn-info btn-lg">Далі</button>
                </div>
            </div>

            <div id="page3" class="page hidden">
                <h4 class="modal-title">Завершити</h4>
                <div id="canvasdiv" class="modal-body">

                </div>
                <div class="modal-footer btn-group">
                    <button id="btnbacktoimages" type="button" class="btn btn-info btn-lg">Назад</button>
                    <button id="btndownload" type="button" class="btn btn-info btn-lg">Завантажити</button>

                    <button id="btnbacktoform2" type="button" class="btn btn-danger btn-lg">Закрити</button>
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

            <div class="footer-col"><span>HaikuGen 0.8.5 © Levytskyi Viktor</span></div>
            <div class="footer-col">
                <div class="social-bar-wrap">
                    <a title="Facebook" href="http://levitsky.pp.ua/" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a title="Twitter" href="http://levitsky.pp.ua/" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a title="Pinterest" href="http://levitsky.pp.ua/" target="_blank"><i class="fa fa-pinterest"></i></a>
                    <a title="Instagram" href="http://levitsky.pp.ua/" target="_blank"><i class="fa fa-instagram"></i></a>
                </div>
            </div>

        </footer>
    </div>

</body>

</html>