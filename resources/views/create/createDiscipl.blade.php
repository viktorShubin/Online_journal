@extends('layout')

@section('content')

<div class="container">
    <h1>Форма создания дисциплинны</h1>
<form method="POST" action="{{url('addFinalStepDiscipl')}}">
    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Дисциплинна</label>
        <input type="text" class="form-control" id="discipl_name" name='discipl_name'>
        <div id="emailHelp" class="form-text">Введите название группы</div>
      </div>

      <select class="form-select" aria-label="Default select example" name="id_user" id="id_user">
        @foreach ($userSelect as $item)
        <option value="{{$item->id}}" name="id_user" id="id"> {{$item->f_name}} {{$item->s_name}} {{$item->l_name}}</option>
        @endforeach
    </select>
    <div id="kuratorHelp" class="form-text">Выберите куратора</div>

        <br>
        <br>
      <button type="submit" class="btn btn-primary">Добавить</button>
    </form>

</div>

@endsection
