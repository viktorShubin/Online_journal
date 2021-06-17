@extends('layoutUser')

@section('contentt')

    <h2>Группа</h2>
    <br><br>
    @foreach ($groupForUsers as $itemGroupUser)
      {{-- <p>{{$itemGroupUser}}</p> --}}
      @foreach ($itemGroupUser->groupForUs as $itemGr)

        <div class="card">
            <div class="card-body">
                <a href="{{url('mydiscipl/'.$itemGr->id_grname)}}">{{$itemGr->group_name}}</a>
            </div>
          </div>
          <br>
      @endforeach
    @endforeach
@endsection
