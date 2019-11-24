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
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                {{$market->name}} - {{$market->description}} - {{$market->status ? 'activo' : 'inactivo'}}
              </div>
              <div class="col-lg-6 col-xs-6">
                <a href="markets/{{$market->id}}" class="btn btn-info">Ver</a>
                <a href="markets/{{$market->id}}/edit" class="btn btn-warning">Editar</a>
                <form action="{{route('markets.destroy',[$market->id])}}" method="post" style="display:inline-block;">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button class="btn btn-danger" type="submit">Borrar</button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      </div>
  </div>
  </div>
@endsection
