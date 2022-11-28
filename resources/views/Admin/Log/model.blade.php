<form method="post" action="/Update_Log" enctype="multipart/form-data">
  @csrf
  <div class="col-xl-12">
      <div class="kt-section__body">

          <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label">@if(Request::segment(1) == 'ar') الاسم عربي   @else  Name Arabic @endif</label>
              <div class="col-lg-9 col-xl-9">
                  <input class="form-control" type="text" value="{{$Log->ar_name}}" name="ar_name">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label">@if(Request::segment(1) == 'ar') الاسم انجليزي   @else  Name English @endif</label>
              <div class="col-lg-9 col-xl-9">
                  <input class="form-control" type="text" value="{{$Log->en_name}}" name="en_name">
              </div>
            </div>
  
                <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label">@if(Request::segment(1) == 'ar') اسم الشاشه   @else  Name Arabic @endif</label>
                  <div class="col-lg-9 col-xl-9">
                      <input class="form-control" type="text" name="page_name" value="{{$Log->page_name}}">
                  </div>
                </div>
  
                <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label">@if(Request::segment(1) == 'ar') المعرف   @else  Name English @endif</label>
                  <div class="col-lg-9 col-xl-9">
                      <input class="form-control" type="text" name="slug" value="{{$Log->slug}}">
                  </div>
                </div>

                <input type="hidden" name="id" value="{{$Log->id}}" />
      </div>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>



