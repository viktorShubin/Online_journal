@extends('layout')

@section('content')

<h1>Выберите группу</h1>
<br>
<br>
@foreach ($newSelectGroup as $item)

<div class="card">
    <div class="card-body">
        <a href="{{url('showDisciplForGroup/'.$item->id_grname)}}">{{$item->group_name}}</a>
    </div>
  </div>
  <br>
  @foreach ($item->groupAll as $groupItem)

  @endforeach
@endforeach


@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



</body>
</html> --}}









{{-- @extends('layout')

@section('content')


@foreach ($newSelectGroup as $item)
  <p><a href="{{url('showDisciplForGroup/'.$item->id_grname)}}">{{$item->group_name}}</a></p>
  @foreach ($item->groupAll as $groupItem) --}}
{{-- <p>{{$groupItem}}</p> --}}
{{-- @foreach ($groupItem->disciplinForGroup as $groupDiscipl)
   <p>{{$groupDiscipl->discipl_name}}</p>
@endforeach --}}
  {{-- @endforeach
@endforeach --}}
