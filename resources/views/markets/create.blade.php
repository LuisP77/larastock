@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card-header">Add market</div>
        <div class="card">
          <form class="form-horizontal" action="{{route('markets.create')}}" method="post">
            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
              <div class="input">
                <label for="name" class="col-md-4 control-label">Name</label>
                <input type="text" name="name" id="market-name" required>
              </div>
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
              <div class="input">
                <label for="description" class="col-md-4 control-label">Description</label>
                <input type="text" name="description" id="market-description" required>
              </div>
            </div>

            <div class="input">
              <label for="active" class="col-md-4 control-label">Active</label>
              <input type="checkbox" name="active" id="market-active">
            </div>

            <div class="input">
              <button type="submit">Submit</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
