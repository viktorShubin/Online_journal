@extends('layout')

@section('content')

    <div class="container">
        <h1>Форма создания группы</h1>
    <form method="POST" action="{{url('addFinalStepGroup')}}">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">группа</label>
            <input type="text" class="form-control" id="group_name" name='group_name'>
            <div id="emailHelp" class="form-text">Введите название группы</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">курс</label>
            <input type="text" class="form-control" id="kurs" name="kurs">
            <div id="emailHelp" class="form-text">укажите курс</div>
          </div>
          <button type="submit" class="btn btn-primary">Добавить</button>
        </form>

    </div>


@endsection
