

<!-- The Modal -->
<div class="modal" id="mdEditRes">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('front_mainpage.finish') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <canvas id="canvas"></canvas>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer btn-group">
                <button type="button" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#mdSelectImage" class="btn btn-info btn-lg">{{ trans('front_modal.back') }}</button>
                <button type="button" id="download" data-dismiss="modal" class="btn btn-info btn-lg">{{ trans('front_modal.download') }}</button>

                <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">{{ trans('front_modal.close') }}</button>
            </div>

        </div>
    </div>
</div>