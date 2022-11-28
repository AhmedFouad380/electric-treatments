
  <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
  <table class="table" id="kt_table_1">
                                   <thead>
                                   <tr>
                                       <th>{{__('lang.Identification')}}</th>
                                       <th>{{__('lang.Name_job')}} </th>
                                       <th> {{__('lang.Select_image')}} </th>
                                   </tr>
                                   </thead>
                                   <tbody >

@foreach($data as $members)
    @inject('job','App\Job')
<tr>
    <td>
        <label class="checkbox checkbox-single">
            <input type="checkbox" value="{{$members->id}}" class="checkable" name="sendMain[]"/>
            <span></span>
        </label>
    </td>
    <td> {{$members->name }} <br> @if($job->find($members->mainJob_id)) {{$job->find($members->mainJob_id)->name}}  @else تم حذف الوظيفة @endif</td>
    <td>
        <label class="checkbox checkbox-single">
            <input type="checkbox" value="{{$members->id}}" class="checkable" name="sendSub[]"/>
            <span></span>
        </label>
    </td>
</tr>
@endforeach

                                   </tbody>
                               </table>
                               
                               
<script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<script>
//DataTable
	var table = $('#kt_table_1').DataTable({
			dom: 'Bfrtip',
			"ordering":false,
			buttons: [
],
			@if( Request::segment(1) == "ar")
					"language": {
							"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
					}
			@endif
	});
</script>