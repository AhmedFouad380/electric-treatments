<form method="post" action="/Update_Category">
    @csrf
    <div class="col-xl-12">
        <div class="kt-section__body">

            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Categories_Name')}}</label>
                <div class="col-lg-9 col-xl-9">
                    <input class="form-control" type="text" name="name" value="{{$Category->name}}">
                    <input class="form-control" type="hidden" name="id" value="{{$Category->id}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.network_name')}}</label>
                <div class="col-lg-9 col-xl-9">
                    <input class="form-control form-control-solid" type="text"
                           name="network_name" value="{{$Category->network_name}}">
                </div>
            </div>
            <div class="form-group row">
                <label
                    class="col-xl-3 col-lg-3 col-form-label">{{__('lang.mac_address')}}</label>
                <div class="col-lg-9 col-xl-9">
                    <input class="form-control form-control-solid" type="text"
                           name="mac_address" value="{{$Category->mac_address}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Categories_structure')}}</label>
                <div class="col-lg-9 col-xl-9">
                    @inject('CategoryUnits','App\Category')
                    <select class="form-control form-control-lg"  id="kt_select2_1"  name="sub_id" required>
                        <option value="0">رئيسي </option>
                    @foreach($CategoryUnits->all() as $data)
                            @if($data->id == $Category->sub_id)
                                <option selected value="{{$data->id}}"> {{$data->name}}</option>

                            @else
                                <option value="{{$data->id}}"> {{$data->name}}</option>

                            @endif

                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Categories_Unit')}}</label>
                <div class="col-lg-9 col-xl-9">
                    @inject('AttachmentCategory','App\CategoryUnits')
                    <select class="form-control kt-select2"  name="type" required>
                        @foreach($AttachmentCategory->all() as $data)
                            @if($data->id == $Category->type)
                                <option selected value="{{$data->id}}"> {{$data->name}}</option>
                            @else
                                <option value="{{$data->id}}"> {{$data->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Categories_Close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('lang.Categories_Save')}}</button>
    </div>
</form>



