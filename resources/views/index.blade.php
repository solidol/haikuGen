@extends('app')

@section('content')

<form>
    <div class="row">

        <div class="col-12">
            <div class="form-group">
                <label for="inptext">{{ trans('front_mainpage.inputhaiku') }}</label>
                <textarea class="form form-control  form-control-lg" id="inptext" rows="3"></textarea>
            </div>


        </div>
        <div class="col-12">

            <div class="form-group">
                <label for="cr">Автор хайку</label>
                <input type="text" name="cr" id="cr" value="Viktor Levytskyi" class="form form-control form-control-lg">
                <small id="emailHelp" class="form-text text-muted">Підпис буде доданий внизу</small>
            </div>
        </div>
        <div class="col-12">
            <div class="btn-group" role="group" aria-label="Basic example">
                <!--<button type="button" id="render" class="btn btn-primary">Створити</button>-->
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#mdSelectImage">Обрати фон</button>
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#mdEditRes">Редагувати</button>
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




@include('select_image')
@include('drag_text')
@include('short_help')

@endsection
