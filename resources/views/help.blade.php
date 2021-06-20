@extends('layouts.app')

@section('content')
<h1>HaikuGen</h1>
<form>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div>
                Регулярний вираз налаштовано під український алфавіт. Обробляються схеми 12 + 5, 5 + 12, 5 + 7 + 5.
            </div>


        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="form-group">
                <label for="inptext">Введіть текст</label>
                <textarea class="form form-control  form-control-lg" id="inptext" rows="3"></textarea>
            </div>


        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">

            <div class="form-group">
                <label for="cr">Автор хайку</label>
                <input type="text" name="cr" id="cr" value="Viktor Levytskyi" class="form form-control form-control-lg">
                <small id="emailHelp" class="form-text text-muted">Підпис буде доданий внизу</small>
            </div>

            <div class="btn-group" role="group" aria-label="Basic example">
                <!--<button type="button" id="render" class="btn btn-primary">Створити</button>-->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#bgModal">Обрати фон</button>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editRes">Редагувати</button>
                <button type="button" id="reset" class="btn btn-danger btn-lg">Очистити</button>
            </div>




        </div>

    </div>
</form>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <table id="parts" class="table-striped" >
            <tr id="hd1" class="table-header-line">
                <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
                <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
            </tr>
            <tr id="str1" class="table-string-line">
                <td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td>
                <td>.</td><td>.</td><td>.</td><td>.</td><td>.</td>
            </tr>
            <tr id="hd2" class="table-header-line">
                <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
                <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
            </tr>
            <tr id="str2" class="table-string-line">
                <td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td>
                <td>.</td><td>.</td><td>.</td><td>.</td><td>.</td>
            </tr>
            <tr id="hd3" class="table-header-line">
                <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
                <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
            </tr>
            <tr id="str3" class="table-string-line">
                <td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td><td>.</td>
                <td>.</td><td>.</td><td>.</td><td>.</td><td>.</td>
            </tr>

        </table>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

        </button>
    </div>
</div>





<!-- The Modal -->
<div class="modal" id="bgModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Оберіть фон</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row row-bg-pv">
                        <div class="col-3">
                            <img id="im[0]" class="bg-preview" src="bg/1.jpg">
                        </div>
                        <div class="col-3">
                            <img id="im[1]" class="bg-preview" src="bg/2.jpg">
                        </div>
                        <div class="col-3">
                            <img id="im[2]" class="bg-preview" src="bg/3.jpg">
                        </div>
                        <div class="col-3">
                            <img id="im[3]" class="bg-preview" src="bg/4.jpg">
                        </div>
                        <div class="col-3">
                            <img id="im[4]" class="bg-preview" src="bg/5.jpg">
                        </div>
                        <div class="col-3">
                            <img id="im[5]" class="bg-preview" src="bg/6.jpg">
                        </div>
                        <div class="col-3">
                            <img id="im[6]" class="bg-preview" src="bg/7.jpg">
                        </div>
                        <div class="col-3">
                            <img id="im[7]" class="bg-preview" src="bg/8.jpg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer btn-group">
                <button type="button" class="btn btn-info btn-lg" data-dismiss="modal" data-toggle="modal" data-target="#editRes">Далі</button>

                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="editRes">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Редагувати</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <canvas id="canvas"></canvas>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer btn-group">
                <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#bgModal" class="btn btn-info btn-lg">Назад</button>
                <button type="button" id="download" data-dismiss="modal" class="btn btn-info btn-lg">Завантажити</button>

                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@endsection
