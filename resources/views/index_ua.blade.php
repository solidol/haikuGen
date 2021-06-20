@extends('app')

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
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#bgModal">Обрати фон</button>
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#editRes">Редагувати</button>
                <button type="button" id="reset" class="btn btn-danger btn-lg">Очистити</button>
            </div>




        </div>

    </div>
</form>

<div class=" row">
    <div class="col-12">
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

</div>




@include('modals')

@endsection
