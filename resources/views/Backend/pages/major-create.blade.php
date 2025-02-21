@extends('Backend.layouts.master')

@section('title', 'Create Major')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Major info</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ url('/backend/majors') }}" method="POST">
        @csrf
        @method('POST')
      <div class="card-body">
        <div class="form-group">
          <label for="major-name">Major name</label>
          <input type="text" class="form-control" name="major_name" id="major-name" placeholder="Enter major name">
          @error('major_name')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="major-desc">Description</label>
          <input type="text" class="form-control" name="major_descrition" id="major-desc" placeholder="Descrition">
          @error('major_descrition')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
       
        <div class="form-check">
          <input type="checkbox" class="form-check-input" checked name="active" id="active">
          <label class="form-check-label" for="active">Active</label>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
