@extends('layout')

@section('content')

<div class="container">
    <h1>Форма Добавления специальности</h1>
<form method="POST" action="{{url('addFinalStepSpecial')}}">
    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Специальность</label>
        <input type="text" class="form-control" id="specialName" name='specialName'>
        <div id="emailHelp" class="form-text">Укажите специальность</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Укажите группу относящуюся к данной специальности</label>
        <select class="form-select" aria-label="Default select example" name="id_grname" id="id_grname">
            @foreach ($groupSelect as $item)
            <option value="{{$item->id_grname}}" name="id_grname" id="id_grname"> {{$item->group_name}}</option>
            @endforeach
        </select>
        <div id="emailHelp" class="form-text">укажите курс</div>
      </div>
      <button type="submit" class="btn btn-primary">Добавить</button>
    </form>

</div>



@endsection
