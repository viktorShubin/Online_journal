@extends('layout')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Дисциплинна </th>
        <th scope="col">Преподаватель</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($discipSelect as $item)

        <tr>
            {{$item}}
            <th>{{$item->id_discipl}}</th>
            <th>{{$item->discipl_name}}</th>
            <th>{{$item->id_user}}</th>
            <th> <a class="btn btn-danger" href="{{url('disciplDelete/'.$item->id_discipl)}}" role="button">Удалить дисциплину</a></th>
        </tr>
    @endforeach

    </tbody>







@endsection
