
<table class="table">
    <thead>
        <tr>

            <th scope="col">оценка</th>
            <th scope="col">Событие</th>
            <th scope="col">дата</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($journalForUserForDate as $item)
        <tr>
        <th>
            {{-- {{$item}} --}}
            @foreach ($item->octypeForScore as $itemOctype)
            {{$itemOctype->octype}}
            @endforeach
        </th>
        <th>
            @foreach ($item->eventForScore as $itemEvent)
            {{$itemEvent->theme_ev}}
            @foreach ($itemEvent->typeEventForEvent as $itemEvtype)
                {{$itemEvtype->evtype}}
            @endforeach
        </th>

            @endforeach
            <th>{{$item->datee_score}}</th>

        </tr>
        @endforeach
    </tbody>
</table>
