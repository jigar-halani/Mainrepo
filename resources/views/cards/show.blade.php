@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6 ">
                <h1>{{$card->title}}</h1>
                <h1>{{$card->description}}</h1>

                <ul class="list-group">
                @foreach($card->notes as $note)
                        <li class="list-group-item">{{$note->body}}</li>
                @endforeach
                </ul>

                <hr>
                <h3>Add A new Note</h3>

                <form action="{{url('/cards/'.$card->cards_id.'/notes')}}" method="post">
                        {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add" class="btn-primary form-control">
                    </div>

                </form>
        </div>


        <div class="col-md-6" style="margin-top: 10%">

                <div class="row">
                        <div class="col-md-12">
                                <ul style="display: inline-block;list-style-type: none  ">
                                @foreach($card->cardimages as $img)
                                    <li style="float: left">
                                        <form action="{{url('demo/'.$img->card_image_id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" value="delete" class="btn-danger">
                                        </form>
                                        <a href="../uploads/{{$img->image}}" data-lity>
                                            <img src="../uploads/th{{$img->image}}" style="margin: 10px;">
                                        </a>
                                    </li>
                                @endforeach
                                </ul>
                        </div>

                        <div class="col-md-12">
                            <form
                                    action="{{route('storephoto',[$card->cards_id])}}"
                                    class="dropzone"
                                    id="myAwesomeDropzone"
                                    >
                                {{csrf_field()}}
                            </form>
                        </div>
                 </div>
        </div>
    </div>
@stop