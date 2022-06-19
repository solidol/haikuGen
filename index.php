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
    <script src="./js/bootstrap.min.js" defer=""></script>
    <script src="./js/p5.min.js" defer=""></script>
    <script src="./js/script.js" defer=""></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="http://fonts.gstatic.com/">
    <link href="./css" rel="stylesheet">

    <!-- Styles -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>
    <div class="mainpaper container">
        <header>
            <h1>HaikuGen</h1>
            <nav>
                <a href="http://levitsky.pp.ua/">UA</a>
                <a href="http://levitsky.pp.ua/ru">RU</a>
            </nav>
        </header>
        <main role="main">

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
                            <!--<button type="button" id="render" class="btn btn-primary">Створити</button>-->
                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#mdSelectImage">Обрати фон</button>
                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#mdEditRes">Завершити</button>
                            <button type="button" id="reset" class="btn btn-danger btn-lg">Очистити</button>
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




            <!-- The Modal -->
            <div class="modal" id="mdSelectImage">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Обрати фон</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">×</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="container-fluid">
                            <div class="row row-bg-pv">
                                    <?php
                                    for ($i = 1; $i <= 24; $i++):
                                    ?>
                                    <div class="col-3">
                                        <img class="bg-preview" data-ind="<?=$i?>" src="./assets/bg/<?=$i?>.jpg">
                                    </div>
                                    <?php
                                    endfor;
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer btn-group">
                            <button id="btnprepare" type="button" class="btn btn-info btn-lg" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#mdEditRes">Далі</button>

                            <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Закрити</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- The Modal -->
            <div class="modal" id="mdEditRes">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Завершити</h4>
                            <button id="btnfinish" type="button" class="close" data-bs-dismiss="modal">×</button>
                        </div>

                        <!-- Modal body -->
                        <div id="canvasdiv" class="modal-body">
                            
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer btn-group">
                            <button type="button" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#mdSelectImage" class="btn btn-info btn-lg">Назад</button>
                            <button type="button" id="btndownload" data-dismiss="modal" class="btn btn-info btn-lg">Завантажити</button>

                            <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Закрити</button>
                        </div>

                    </div>
                </div>
            </div><!-- The Modal -->
            <div class="modal" id="mdHelp">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Довідка</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">×</button>
                        </div>

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

                        <!-- Modal footer -->
                        <div class="modal-footer btn-group">

                            <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
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