
    @extends('layout')

    @section('content')

    <form method="POST" action="{{url('addDisciplGr')}}">
        @csrf
    <label> выберите дисциплину которую хотите добавить в группу</label>
    <select class="form-select" aria-label="Default select example" name="id_disciplin" id="id_disciplin">
        @foreach ($discipSelect as $itemDisciplin)
        <option value="{{$itemDisciplin->id_discipl}}">{{$itemDisciplin->discipl_name}}</option>
        @endforeach
    </select>

    <br>
    <br>




<label>выберите группу</label>
    <select class="form-select" aria-label="Default select example" name="id_grname" id="id_grname">
        @foreach ($grnameSelect as $itemGrname)
        <option value="{{$itemGrname->id_grname}}">{{$itemGrname->group_name}}</option>
        @endforeach
    </select>
    <br>

    <button type="submit" class="btn btn-primary">Добавить</button>
    </form>



    @endsection
