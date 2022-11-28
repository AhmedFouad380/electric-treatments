<form method="post" action="/Update_Job">
    @csrf
    <div class="col-xl-12">
        <div class="kt-section__body">



            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_Name')}} </label>
                <div class="col-lg-9 col-xl-9">
                    <input class="form-control form-control-solid" type="text" required name="name" value="{{$Job->name}}">
                    <input class="form-control" type="hidden" required name="id" value="{{$Job->id}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_number')}} </label>
                <div class="col-lg-9 col-xl-9">
                    <input class="form-control form-control-solid" type="number"  name="job_num" value="{{$Job->job_num}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_description')}} </label>
                <div class="col-lg-9 col-xl-9">
                    <textarea class="form-control form-control-solid" name="job_description">  {{$Job->job_description}} </textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_Section')}} </label>
                <div class="col-lg-9 col-xl-9">
                    @inject('AttachmentCategory','App\Category')
                    <select class="form-control form-control-lg form-control-solid" id="kt_select2_1"  name="category_id" required>
                        @foreach($AttachmentCategory->all() as $data)
                            @if($data->id == $Job->category_id)
                                <option selected value="{{$data->id}}"> {{$data->name}}</option>
                            @else
                                <option value="{{$data->id}}"> {{$data->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_Type')}} </label>
                <div class="col-lg-9 col-xl-9">
                    @inject('AttachmentCategory','App\JobType')
                    <select class="form-control form-control-lg form-control-solid" id="kt_select2_1"  name="job_type" required>
                        @foreach($AttachmentCategory->all() as $data)
                            @if($data->id == $Job->job_type)
                                <option selected value="{{$data->id}}"> {{$data->name}}</option>
                            @else
                                <option value="{{$data->id}}"> {{$data->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.Jobs_degree')}} </label>
                <div class="col-lg-9 col-xl-9">
                    <input class="form-control form-control-solid" type="number" required name="job_degree" value="{{$Job->job_degree}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 col-form-label">{{__('lang.Jobs_validity')}}</label>
                <div class="col-9 col-form-label">
                    <div class="radio-list">
                        <label class="radio">
                            <input type="radio" value="1" name="job_role" @if($Job->job_role == 1) checked="checked" @endif />
                            <span></span>
                            وظيفة لمدير
                        </label>
                        <label class="radio">
                            <input type="radio" value="2" name="job_role" @if($Job->job_role == 2) checked="checked" @endif />
                            <span></span>
                            وظيفة لموظف
                        </label>

                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Jobs_Close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('lang.Jobs_Save')}}</button>
    </div>
</form>



