@extends('layout')

@section('content')


<div class="container">
    <h1>Форма добавления пользователя в группу</h1>
<form method="POST" action="{{url('addUserForGroupDB')}}">
    @csrf

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Укажите группу в которую хотите занести студента</label>
        <select class="form-select" aria-label="Default select example" name="id_grname" id="id_grname">
            @foreach ($grnameSelect as $group)
            <option value="{{$group->id_grname}}" name="id_grname" id="id_grname"> {{$group->group_name}}</option>
            @endforeach
        </select>
      </div>


      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Укажите студента которого хотите занести в группу</label>
        <select class="form-select" aria-label="Default select example" name="id_user" id="id_user">
            @foreach ($users as $usItem)
            <option value="{{$usItem->id}}" name="id_user" id="id_user">{{$usItem->t_name}} {{$usItem->f_name}} {{$usItem->s_name}} </option>
            @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Добавить</button>
    </form>

</div>


@endsection
