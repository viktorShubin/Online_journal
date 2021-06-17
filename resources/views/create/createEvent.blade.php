@extends('layoutTeacher')

@section('content')

<div class="container">
    <h1>Форма добавления евента</h1>
<form method="POST" action="{{url('addFinalStepEvent')}}">
    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">дата евента</label>
        <input type="text" class="form-control" id="data_ev" name='data_ev'>
        <div id="emailHelp" class="form-text">Укажите дату проведения евента</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Тип евента</label>
             <select class="form-select" aria-label="Default select example" name="id_evtype" id="id_evtype">
            @foreach ($selectEvtype as $item)
                <option value="{{$item->id_evtype}}" name="id_evtype" id="id_evtype"> {{$item->evtype}}</option>
            @endforeach
    </select>
        <div id="emailHelp" class="form-text">выберите тип евента</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">тема евента</label>
        <input type="text" class="form-control" id="theme_ev" name='theme_ev'>
        <div id="emailHelp" class="form-text">Укажите тему евента</div>
      </div>
      <div class="mb-3">

      <button type="submit" class="btn btn-primary">Добавить</button>
    </form>

</div>

@endsection
