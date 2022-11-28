<form method="post" action="/shiftsetting/update">
    @csrf
    <div class="col-xl-12">
        <div class="kt-section__body">


            <div class="card-title">{{$shiftsetting->day}}</div>
            <div class="form-group">
                <strong>{{trans('lang.attendancetime')}}</strong>
                {{ Form::time('time_attendance',$shiftsetting->time_attendance,["class"=>"form-control" ]) }}
                <input class="form-control" type="hidden" name="id" value="{{$shiftsetting->id}}">

            </div>
            <div class="form-group">
                <strong>{{trans('lang.start_attendance')}}</strong>
                {{ Form::time('start_attendance',$shiftsetting->start_attendance,["class"=>"form-control" ]) }}
            </div>
            <div class="form-group">
                <strong>{{trans('lang.end_attendance')}}</strong>
                {{ Form::time('end_attendance',$shiftsetting->end_attendance,["class"=>"form-control" ]) }}
            </div>


            <div class="card-title">{{trans('lang.leaves')}}</div>
            <div class="form-group">
                <strong
                    style="padding-left: 25px">{{trans('lang.leavenextday')}}</strong>
                <input type="hidden" name="nextday" id='nextday' value="no">
                {{ Form::checkbox('nextday','yes',  $shiftsetting->nextday=="yes"?true:false) }}
            </div>
            <div class="form-group">
                <strong>{{trans('lang.time_leave')}}</strong>
                {{ Form::time('time_leave',$shiftsetting->time_leave,["class"=>"form-control" ]) }}
            </div>
            <div class="form-group">
                <strong>{{trans('lang.start_leave')}}</strong>
                {{ Form::time('start_leave',$shiftsetting->start_leave,["class"=>"form-control" ]) }}
            </div>
            <div class="form-group">
                <strong>{{trans('lang.end_leave')}}</strong>
                {{ Form::time('end_leave',$shiftsetting->end_leave,["class"=>"form-control" ]) }}
            </div>

            <div class="form-group">
                <strong>{{trans('lang.vacation')}}</strong>
                {!! Form::select('vacation', ['yes'=>trans('lang.yes') , 'no'=>trans('lang.no')] , $shiftsetting->vacation, ['class'=>'form-control',null]) !!}

            </div>
            <div class="form-group">
                <strong
                    style="padding-left: 50px">{{trans('lang.addAll')}}</strong>
                <label class="switch switch-lg switch-icon switch-dark">
                    <input type="hidden" name="addAll" id='addAll' value="no">
                    {{ Form::checkbox('addAll', 'yes') }}

                    <span class="slider round"></span>
                </label>
            </div>



        </div>
    </div>
    <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Banks_Close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('lang.Banks_Save')}}</button>
     </div>
</form>



