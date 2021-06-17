@extends('layout')

@section('content')

@foreach ($discForGroup as $item)
    {{-- <p>{{$item}}</p> --}}
    @foreach ($item->disciplinForGroup as $itemDis)
        <p><a href="{{url('generateOtchet'.'/'.$item->id_grname.'/'.$itemDis->id_discipl)}}">{{$itemDis->discipl_name}}</a></p>
    @endforeach
@endforeach


@endsection
