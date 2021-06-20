
<!-- The Modal -->
<div class="modal" id="mdSelectImage">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('front_mainpage.selectimage') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
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
                <button type="button" class="btn btn-info btn-lg" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#mdEditRes">{{ trans('front_modal.next') }}</button>

                <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">{{ trans('front_modal.close') }}</button>
            </div>

        </div>
    </div>
</div>
