@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <p>{{$market->name}} - {{$market->description}} - {{$market->status}}</p>
      </div>
    </div>
  </div>
@endsection
