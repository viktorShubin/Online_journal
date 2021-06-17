@extends('layout')

@section('content')
<form action="{{url('ekzOtchetCreate')}}" method="POST">
    @csrf
    <select class="form-select" aria-label="Default select example" name="id_user" id="id_user">
        @foreach ($user as $itemUser)
            <option value="{{$itemUser->id}}"> {{$itemUser->f_name}} {{$itemUser->s_name}} {{$itemUser->t_name}}</option>
        @endforeach
    </select>
    <br>

    <button type="submit" class="btn btn-primary">Добавить</button>
</form>


@endsection
