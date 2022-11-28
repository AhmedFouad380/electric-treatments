<script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>

<?php
$message=session()->get("message");
?>
@if( session()->has("message"))
    @if( $message == "Failed")
        <script>
            Swal.fire({
                icon: 'warning',
                title: "{{__('lang.Sorry')}}",
                text: "{{__('lang.operation_failed')}}",
                type:"error" ,
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
     
@endif

@if(session()->has('errors'))
        @foreach ($errors->all() as  $value)
            <script>
            Swal.fire({
            icon: 'warning',
            title: "{{__('lang.Sorry')}}",
            text: "{{ $value }}",
            type:"error" ,
            timer: 2000,
            showConfirmButton: false
            });
            </script>
            <p></p>

        @endforeach
@endif



@if(session('error'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: "{{__('lang.Sorry')}}",
                text: "{{session('error')}}",
                type:"error" ,
                timer: 2000,
                showConfirmButton: false
            });
        </script>
@endif


