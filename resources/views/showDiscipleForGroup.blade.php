@extends('layout')

@section('content')


    @foreach ($disciplinsSelect as $discipForGroup)

    @foreach ($discipForGroup->disciplinForGroup as $discItem)


      <div class="card">
        <div class="card-body">
            <a href="{{url('showJournal/'.$item.'/'.$discItem->id_discipl)}}">{{$discItem->discipl_name }}</a>
        </div>
      </div>
      <br>
    @endforeach
    @endforeach
    @endsection

