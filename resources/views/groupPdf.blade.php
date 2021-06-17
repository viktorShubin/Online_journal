@extends('layout')

@section('content')
<style>
    *{ font-family: DejaVu Sans !important;}
  </style>
<table class="table">
    <thead>
        <th>Назва</th>
    </thead>
    <tbody>
        @foreach ($gr as $item)
        <tr>
            <th>{{$item->group_name}}</th>
        </tr>

        @endforeach
    </tbody>
</table>


@endsection
