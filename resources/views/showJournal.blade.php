
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Журнал</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Студенты</th>
                <th scope="col">Дисцпиплина</th>
                <th scope="col">Оценка</th>
                <th scope="col">Дата</th>
                <th scope="col">Тема</th>
                <th scope="col">Тип евента</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($selectScore as $item)

              <tr>
                @foreach ($item->userForScore as $userForScore)
                <th>{{$userForScore->f_name}} {{$userForScore->s_name}} {{$userForScore->l_name}}</th>
                @endforeach
                @foreach ($item->disciplinForScore as $disForScore)
                <th>{{$disForScore->discipl_name}}</th>
                @endforeach
                @foreach ($item->octypeForScore as $octypeScore)
                <th>{{$octypeScore->octype}}</th>
                @endforeach
                @foreach ($item->eventForScore as $eventScore)
                <th>{{$eventScore->data_ev}}</th>
                @endforeach
                @foreach ($item->eventForScore as $eventScore)
                <th>{{$eventScore->theme_ev}}</th>
                @foreach ($eventScore->typeEventForEvent as $item)
                <th> {{$item->evtype}}</th>
                @endforeach

                @endforeach

              @endforeach
            </tbody>
          </table>
    </div>
</body>
</html>




