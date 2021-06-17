
<style>
    *{ font-family: DejaVu Sans !important;
        font-size: 10px;
    }

    .otch {
        white-space:nowrap;
    }
    .blockInfo {
        display: inline-block;
        /* border: 1px solid; */
    }

    li {
        list-style: none;
    }




  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <div class="otch">
        <div class="blockInfo">
            <div class="info">
                <span>ФИО</span>
            </div>
            <div class="items">
                <ul>
                    @foreach ($selScore as $itemEv)
                    @foreach ($itemEv->userForScore as $itemus)
                            <li>{{$itemus->f_name}} {{$itemus->s_name}} {{$itemus->t_name}}</li>
                            @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="blockInfo">
            <div class="info">
                <span>Оценка</span>
            </div>
            <div class="items">
                <ul>
                    @foreach ($selScore as $itemEv)
                    @foreach ($itemEv->octypeForScore as $itemok)
                            <li>{{$itemok->octype}}</li>
                            @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="blockInfo">
            <div class="info">
                <span>Дисциплинна</span>
            </div>
            <div class="items">
                <ul>
                    @foreach ($selScore as $itemEv)
                    @foreach ($itemEv->disciplinForScore as $itemdis)
                            <li>{{$itemdis->discipl_name}}</li>
                            @endforeach
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="blockInfo">
            <div class="info">
                <span>событие</span>
            </div>
            <div class="items">
                <ul>
                    @foreach ($selScore as $itemEv)
                            @foreach ($itemEv->eventForScore as $itemevent)
                                    <li>{{$itemevent->theme_ev}}</li>
                                {{-- @foreach ($itemevent->typeEventForEvent as $evtype)
                                    <li>{{$evtype->evtype}}</li>
                                @endforeach --}}
                            @endforeach

                    @endforeach
                </ul>
            </div>
        </div>

        {{-- <div class="blockInfo">
            <div class="info">
                <h3>Событие</h3>
            </div>
            <div class="items">
                <ul>
                    @foreach ($selScore as $itemEv)
                    @foreach ($itemEv->eventForScore as $iteme)
                            <li>{{$itemev->theme_ev}}</li>
                            @endforeach
                    @endforeach
                </ul>
            </div>
        </div> --}}
    </div>




<a href="{{url('addekzOtchetCreate/'.$userId)}}">загрузить отчет</a>





