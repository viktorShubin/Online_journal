<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{$group}}
    @foreach ($disciplinsSelect as $disciplin)
        <p><a href="{{url('groupJournal/'.$disciplin->id_discipl.'/'.$group)}}">{{$disciplin->discipl_name}}</a></p>
    @endforeach
</body>
</html>
