@extends('layoutUser')

@section('contentt')

<h3>Просмотр по дате</h3>

<div class="dates">
    <label>выберите дату</label>
    {{-- <input type="text" autocomplete="off" id='date_pick' class="form-control datePick" placeholder="yyyy-mm-dd"/> --}}
    <p>Date: <input type="text" id="datepicker"></p>
    <br>
    <a class="btn btn-success" href="#" role="button" id="dateTest">Вывод по дате</a>
</div>
<br><br>
<div class="journal_grid">
    <table>
        <h3>{{$disName[0]->discipl_name}}</h3>
        <table class="table">
          <thead>
            <tr>

              <th scope="col">оценка</th>
              <th scope="col">Событие</th>
              <th scope="col">дата</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($journalForUser as $itemForUser)
            <tr>

                <th>
                    @foreach ($itemForUser->octypeForScore as $itemoctype)
                        {{$itemoctype->octype}}
                    @endforeach
                </th>
                <th>
                    @foreach ($itemForUser->eventForScore as $itemEvent)
                        {{-- {{$itemEvent}}
                        {{$itemEvent->theme_ev}} --}}
                        @foreach ($itemEvent->typeEventForEvent as $itemEvtype)
                            {{$itemEvtype->evtype}}
                        @endforeach
                    @endforeach

                </th>
                <th>{{$itemForUser->datee_score}}</th>
            </tr>
            @endforeach
          </tbody>
        </table>
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
            url:"{{url('myjournal/'.$item.'/'.$itemDis)}}",


            type:"get",
            data:{
                datecal: datecal,
                item:'{{$item}}',
                item:'{{$itemDis}}'



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
