@extends('layout')

@section('content')
{{-- .$item.'/'.$itemDis --}}
<a class="btn btn-success" href="{{url('groupex/'.$item.'/'.$itemDis)}}" role="button">Сгенерировать отчет</a>
<br>
<br>


<table class="table">
    <thead>
        <th>login</th>
        <th>octype</th>
        <th>id_discipl</th>
        <th>id_event</th>
        <th>datee_score</th>
        <th>id_grname</th>
    </thead>
    <tbody>
@foreach ($scoreOtchet as $scoreItem)
    <tr>
      @foreach ($scoreItem->userForScore as $usItem)
        <th>{{$usItem->name}}</th>
      @endforeach
      @foreach ($scoreItem->octypeForScore as $octypeItem)
        <th>{{$octypeItem->octype}}</th>
        @endforeach
        @foreach ($scoreItem->disciplinForScore as $disciplItem)
        <th>{{$disciplItem->discipl_name}}</th>
        @endforeach
        @foreach ($scoreItem->eventForScore as $eventItem)
        <th>{{$eventItem->theme_ev}}</th>
        @endforeach
        @foreach ($scoreItem->eventForScore as $eventItem)
        <th>{{$eventItem->theme_ev}}</th>
        @endforeach
        @foreach ($scoreItem->grnameForScore as $grnameItem)
        <th>{{$grnameItem->group_name}}</th>
        @endforeach
    </tr>
@endforeach
    </tbody>


</table>
@endsection
