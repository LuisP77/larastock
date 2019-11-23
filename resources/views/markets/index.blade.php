@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @if (Session::has('status_message'))
          <p class="alert alert-success">{{Session::get('status_message')}}</p>
        @endif
        <div class="card-header">{{$title ?? 'Markets'}}</div>
        <div class="card-body">
          @foreach($markets as $market)
            <p>{{$market->name}} - {{$market->description}}</p>
          @endforeach
        </div>
      </div>
  </div>
  </div>
@endsection
