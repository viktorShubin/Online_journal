@extends('layoutTeacher')

@section('content')
    @foreach ($myDisciplins as $itemDis)
      <div class="card">
        <div class="card-body">
            <a href="{{url('myGroup/'.$itemDis->id_discipl)}}">{{$itemDis->discipl_name}}</a>
        </div>
      </div>
    @endforeach
@endsection
