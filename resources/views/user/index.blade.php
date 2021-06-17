@extends('layout')

@section('content')

{{-- @foreach ($modelHasRoles as $rr)
{{-- {{$rr}} --}}



{{-- @foreach ($modelHasRolesDelete as $itemd)
<p>{{$itemd->model_id}}</p>
@endforeach --}}
<h1>пользователи</h1>
{{-- {{$UserSelect}} --}}
<table class="table">
    <thead>
      <tr>
        <th scope="col">login</th>
        <th scope="col">email</th>
        <th scope="col">Дата создания</th>
        <th scope="col">Дата обновления</th>
        <th scope="col">Роль</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($UserSelect as $item)
        @if ($item->id_role!=4)
        <tr>
        <th>{{$item->name}}</th>
        <th>{{$item->email}}</th>
        <th>{{$item->created_at}}</th>
        <th>{{$item->updated_at}}</th>
        <th> <a class="btn btn-success" href="{{url('addRole/'.$item->id)}}" role="button">Изменить роль</a></th>
        <th> <a class="btn btn-danger" href="{{url('deleteUser/'.$item->id)}}" role="button">Удалить пользователя</a></th>
    </tr>
        @else




        @endif

        @endforeach

    </tbody>
  </table>
@endsection
