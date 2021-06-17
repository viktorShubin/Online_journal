@extends('layout')

@section('content')




@foreach ($groups as $item)
<p><a href="{{url(('form_disciple/'.$item->id_grname))}}">{{$item->group_name}}</a></p>
@endforeach






{{-- <script src="{{ asset('js/sidebar/main.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script>


    $(document).ready(function() {
    $('#id_grname').click(function() {

       let datecal = $("#id_grname").val()
        console.log(datecal)

        // let dateRestring = datecal.replace("/'//'/gi",'-')


        $.ajax({
            url:"#",


            type:"get",
            data:{




            },
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:(data)=>{
                // console.log(data);
                $('.journal_grid').html(data);

            },
        });


    })
}) --}}


{{-- </script> --}}


@endsection
