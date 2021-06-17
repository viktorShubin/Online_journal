@extends('layoutUser')

@section('contentt')
@foreach ($selectDiscipl as $itemDiscipl)
  {{-- <p>{{$itemDiscipl}}</p> --}}
  @foreach ($itemDiscipl->disciplinForGroup as $itemDis)
    <div class="card">
        <div class="card-body">
          <a href="{{url('myjournal/'.$item.'/'.$itemDis->id_discipl)}}">{{$itemDis->discipl_name}}</a>
        </div>
      </div>
      <br>
  @endforeach
@endforeach

@endsection
