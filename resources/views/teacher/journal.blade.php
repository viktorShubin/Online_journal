@extends('layoutTeacher')

@section('content')

<div class="dates">
    <label>выберите дату</label>
    {{-- <input type="text" autocomplete="off" id='date_pick' class="form-control datePick" placeholder="yyyy-mm-dd"/> --}}
    <p>Date: <input type="text" id="datepicker"></p>
    <br>
    <a class="btn btn-success" href="#" role="button" id="dateTest">Вывод по дате</a>
    <a class="btn btn-success" href="{{url('addScore'.'/'.$itemDis.'/'.$itemGrn)}}" role="button">Поставить оценку</a>
</div>


<br><br>
<div class="journal_grid">
    <table>
        {{-- {{$disName[0]->discipl_name}} --}}
        <h3></h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">студент :
            {{$groupName[0]->group_name}}
            : {{$disciplin[0]->discipl_name}}
            </th>
              <th scope="col">оценка</th>
              <th scope="col">Событие</th>
              <th scope="col">дата</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($journalForTeacher as $itemForUser)
            <tr>
                <th>
                   @foreach ($itemForUser->userForScore as $userItem)
                        {{$userItem->f_name}} {{$userItem->s_name}} {{$userItem->t_name}}
                   @endforeach
                </th>
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
            url:"{{url('myJournalTeacher/'.$itemDis.'/'.$itemGrn)}}",


            type:"get",
            data:{
                datecal: datecal,
                item:'{{$itemDis}}',
                item:'{{$itemGrn}}'
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
