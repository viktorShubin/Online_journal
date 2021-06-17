@extends('layout')

@section('content')

<form action="{{url('addOtchResult')}}" method="POST">
    @csrf
    <select  class="form-select" aria-label="Default select example" name="id_grname" id="id_grname">
        <option id="id_grname" value="{{$GroupItem[0]->id_grname}}">{{$GroupItem[0]->group_name}}</option>
        </select>

        <br>


        <select  class="form-select" aria-label="Default select example" name="id_discipl" id="id_discipl">
        @foreach ($dis as $itemDis)
            @foreach ($itemDis->disciplinForGroup as $itemdiscipl)
            <option id="id_discipl" value="{{$itemdiscipl->id_discipl}}">{{$itemdiscipl->discipl_name}}</option>
            @endforeach
        @endforeach
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Отчет</button>
</form>


@endsection
