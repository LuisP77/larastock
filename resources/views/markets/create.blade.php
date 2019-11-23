@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card-header">Add market</div>
        <div class="card">
          @if (count($errors)>0)
            <div class="errors alert alert-danger">
              <b>Ha ocurrido un error</b>
              <ul>
                @foreach( $errors->all() as $error )
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form class="form-horizontal" action="{{route('markets.create')}}" method="post">
            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
              <div class="input">
                <label for="name" class="col-md-4 control-label">Name</label>
                <input type="text" name="name" id="market-name" value="{{old('name')}}" required>
              </div>
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
              <div class="input">
                <label for="description" class="col-md-4 control-label">Description</label>
                <input type="text" name="description" id="market-description" value="{{old('description')}}" required>
              </div>
            </div>

            <div class="form-group">
              <div class="checkbox">
                <label for="active" class="col-md-4 control-label">Active</label>
                <input type="checkbox" name="active" id="market-active" {{old('active') ? 'checked' : ''}} value="1">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
