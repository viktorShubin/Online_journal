@extends('layout')

@section('content')

<h1>Выберите группу</h1>

@foreach ($selectGroup as $group)
<p><a href="{{route('group.show',$group->id_group)}}">{{$group->name_group}}</a></p>
@endforeach
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



</body>
</html> --}}
