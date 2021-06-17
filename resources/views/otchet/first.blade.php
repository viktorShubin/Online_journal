@extends('layout')

@section('content')

@foreach ($grname as $item)
    <p><a href="{{url('firstDisc/'.$item->id_grname)}}">{{$item->group_name}}</a></p>
@endforeach








@endsection
