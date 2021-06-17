@extends('layout')

@section('content')

<form action="{{url('allOtchetDb')}}" method="POST">
@csrf
<p>Выберите группу</p>
<select class="form-select" aria-label="Default select example" name="id_grname" id="id_grname">
    @foreach ($grname as $itemGroup)
        <option value="{{$itemGroup->id_grname}}" name ="id_grname">{{$itemGroup->group_name}}</option>
    @endforeach
</select>

<br>
<br>

<div class="dates">
    <label>выберите дату</label>
    {{-- <input type="text" autocomplete="off" id='date_pick' class="form-control datePick" placeholder="yyyy-mm-dd"/> --}}
    <p>Date: <input type="text" name="datee_score" id="datepicker"></p>
    <br>
    {{-- <a class="btn btn-success" href="#" role="button" id="dateTest">Вывод по дате</a> --}}

</div>

<button type="submit" class="btn btn-primary">Добавить</button>
</form>


<script src="{{ asset('js/sidebar/main.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>

<script>

    $(".dates #datepicker").datepicker({
        'autoclose': true,
        'dateFormat': 'yy-mm-dd'
    });
</script>
@endsection
