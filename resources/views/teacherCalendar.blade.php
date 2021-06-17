
<table class="table">
    <thead>
        <tr>
          <th scope="col">студент :
        {{$groupName[0]->group_name}}
        : {{$disciplin[0]->discipl_name}}
        </th>
          <th scope="col">оценка</th>
          <th scope="col">Событие</th>
          <th scope="col">дата</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($journalForTeacher as $itemForUser)
        <tr>
            <th>
               @foreach ($itemForUser->userForScore as $userItem)
                    {{$userItem->f_name}} {{$userItem->s_name}} {{$userItem->t_name}}
               @endforeach
            </th>
            <th>
                @foreach ($itemForUser->octypeForScore as $itemoctype)
                    {{$itemoctype->octype}}
                @endforeach
            </th>
            <th>
                @foreach ($itemForUser->eventForScore as $itemEvent)
                    {{-- {{$itemEvent}}
                    {{$itemEvent->theme_ev}} --}}
                    @foreach ($itemEvent->typeEventForEvent as $itemEvtype)
                        {{$itemEvtype->evtype}}
                    @endforeach
                @endforeach

            </th>
            <th>{{$itemForUser->datee_score}}</th>
        </tr>
        @endforeach
      </tbody>
</table>
