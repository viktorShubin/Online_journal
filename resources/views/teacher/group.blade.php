@extends('layoutTeacher')

@section('content')

@foreach ($myGroup as $itemGroup)
    @foreach ($itemGroup->grnameForGroup as $itemGrn)

         <div class="card">
            <div class="card-body">
                <a href="{{url('myJournalTeacher/'.$itemDis.'/'.$itemGrn->id_grname)}}">{{$itemGrn->group_name}}</a>
            </div>
          </div>
    @endforeach

@endforeach

@endsection
