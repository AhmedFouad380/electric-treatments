

<form method="post" action="/Update_UserinboxGroup">
    @csrf
    <div class="col-xl-12">
        <input name="id" type="hidden" value="{{$user->id}}">
        <?php
        $explode = explode(',',$user->groups_id);
        ?>
        <label class="col-xl-12 col-lg-12 col-form-label">    {{__('lang.InboxGroup_Title')}}
            :</label>

        <div class="kt-section__body">

            @inject('InboxGroup','App\InboxGroup')
            @foreach($InboxGroup->all() as $data)
                <div class="form-group">
                    <strong>{{$data->name}}</strong>
                    <div style="padding-right: 50px">
                        <label class="switch">

                            <input class="form-control" type="checkbox" @if(in_array($data->id,$explode)) checked @endif name="groups_id[]" value="{{$data->id}}">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.InboxGroup_Close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('lang.InboxGroup_Save')}}</button>
    </div>
</form>






