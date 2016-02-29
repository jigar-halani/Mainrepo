@extends('layout')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
                      <h1>  All Cards</h1>

                      <ul class="list-group">
                        @foreach($data as $d)
        <li class="list-group-item"><a href="cards/{!! $d->cards_id !!}">{{$d->title}}</a></li>
                        @endforeach
                      </ul>
        </div>
@stop