@inject('country','App\Http\utilities\Country')
@extends('layout')
@section('content')
<div class="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger msg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-offset-4">

                <form action="{{url('demo')}}" method="POST" class="col-md-6">
                    {{csrf_field() }}
                    <div class="form-group">
                        <label>Cards title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Cards Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>

                    <div class="form-group">
                            <label>Cards Country </label>
                           <select id="country" name="country" class="form-control">
                                @foreach($country::all() as $key=>$c)
                                    <option value="{{$c}}">{{$key}}</option>
                                @endforeach
                            </select>
                    </div>
{{--
                    <div class="form-group">
                           <label>Cards Images</label>
                           <input type="file" name="image"  >
                    </div>--}}

                    <div class="form-group">
                        <input type="submit" value="Add" class="form-control btn-primary" >
                    </div>

                </form>
            </div>
    </div>
@endsection