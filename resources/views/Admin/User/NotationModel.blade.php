<link rel="stylesheet" href="{{asset('dashboard/dropify/dist/css/dropify.min.css')}}">

<form method="post" action="/Update_User_Notation" enctype="multipart/form-data">
    @csrf
    <div class="col-xl-12">
        <div class="kt-section__body">
            <input type="hidden" name="id" value="{{$User->id}}">
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">@if(Request::segment(1) == 'ar') التوقيع   @else  image @endif</label>
                <div class="col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title"></h4>
                            <div class="controls">
                                <input type="file" id="input-file-now" class="dropify"  data-default-file="{{asset('Upload/UserFiles/'.$User->signature_img)}}"name="signature_img" required data-validation-required-message="{{trans('word.This field is required')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">@if(Request::segment(1) == 'ar') التاشيرة    @else  image @endif</label>
                <div class="col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title"></h4>
                            <div class="controls">
                                <input type="file" id="input-file-now" class="dropify"  data-default-file="{{asset('Upload/UserFiles/'.$User->notation_img)}}"name="notation_img" required data-validation-required-message="{{trans('word.This field is required')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>



<script src="{{asset('dashboard/dropify/dist/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>

