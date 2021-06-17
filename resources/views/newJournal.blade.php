@extends('layout')

@section('content')



    {{-- {{$item}}
    {{$secItem}} --}}
    {{-- @foreach ($selectScore as $selIt)
       <p>{{$selIt}}</p>
    @endforeach --}}

    <h4>{{$selectDisc[0]->discipl_name}}</h4>
    <br>

        <div class="dates">
            <label>выберите дату</label>
            {{-- <input type="text" autocomplete="off" id='date_pick' class="form-control datePick" placeholder="yyyy-mm-dd"/> --}}
            <p>Date: <input type="text" id="datepicker"></p>
            <br>
            <a class="btn btn-success" href="#" role="button" id="dateTest">Вывод по дате</a>

        </div>

        <br>
        <br>
        <div class="journal_grid">


        </div>








    <script src="{{ asset('js/sidebar/main.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script>
        $(".dates #datepicker").datepicker({
            'autoclose': true,
            'dateFormat': 'yy-mm-dd'
        });



        $(document).ready(function() {
        $('#dateTest').click(function() {

            let selDate = $('.datePick').data()
            let tytyt = 'tutut'
            console.log(tytyt)
           let datecal = $("#datepicker").val()
            console.log(datecal)

            // let dateRestring = datecal.replace("/'//'/gi",'-')


            $.ajax({
                url:"{{url('showJournal/'.$item.'/'.$secItem)}}",


                type:"get",
                data:{
                    datecal: datecal,
                    item:'{{$item}}',
                    item:'{{$secItem}}'



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
    })


    </script>
@endsection
