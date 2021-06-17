



 {{-- <h1>{{$d}}</h1>
<h2>{{$item}}</h2>
<h3>{{$secItem}}</h3> --}}



<table class="table">
    <thead>
      <tr>
        <th scope="col">Студенты :  {{$SelectOneDisc}}</th>
        <th scope="col">Оценка</th>
        <th scope="col">Дата</th>
        <th scope="col">Тема</th>
        <th scope="col">Тип евента</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($sos as $itemSos)
        <tr>
            @foreach ($itemSos->userForScore as $userItem)
             <th>{{$userItem->f_name}}  {{$userItem->s_name}}   {{$userItem->t_name}}</th>
            @endforeach
            @foreach ($itemSos->octypeForScore as $octypeItem)
                <th>{{$octypeItem->octype}}</th>
            @endforeach
            @foreach ($itemSos->eventForScore as $eventItem)
            <th>{{$eventItem->theme_ev}}</th>

          @foreach ($eventItem->typeEventForEvent as $evtypeItem)
            <th>{{$evtypeItem->evtype}}</th>
          @endforeach
        @endforeach
    </tr>
        @endforeach

    </tbody>


