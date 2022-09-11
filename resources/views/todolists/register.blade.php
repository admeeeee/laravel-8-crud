@extends('todolists.layout')

@section('content')
<!-- <form action="{{ route('todolists.store') }}" method="POST">
  @csrf
  <div class="form-group">
  <div class="form-group">
    <label class="col-sm-2 col-form-label">To Do</label>
    <div class="col-sm-10">
      <input name="to_do" class="form-control" placeholder="To Do List">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea name="desc" class="text_form form-control" style="height:100px;resize:none;"></textarea>
    </div>
  </div>
  <div style="display:flex">
    <div class="col-sm-12">
      <label class="col-sm-2 col-form-label">Start Date</label>
      <div class="col-sm-4">
        <input type="text" class="form-control datepicker" name="start_date" placeholder="YYYY-MM-DD">
        <span class="text-danger error-text task_desc_error"></span>
      </div>
    </div>
    <div class="col-sm-12">
      <label class="col-sm-2 col-form-label">Due Date</label>
      <div class="col-sm-4">
        <input type="text" class="form-control datepicker" name="due_date" placeholder="YYYY-MM-DD">
        <span class="text-danger error-text task_desc_error"></span>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
  </div>
</form> -->
<div class="well well-sm well-light">
  <div class="card-header col-sm-10">
    <div style="display:flex">
        <div style="width:90%">
            <h3 class="card-title">Add New Task List</h3>
            <br>
            <p class="text-secondary"></p>
        </div>
        <div style="width:10%" class="pull-right">
            <a class="btn btn-secondary" href="{{ route('todolists.index') }}">Back</a>
        </div>
    </div>
  </div>
  <form action="{{ route('todolists.store') }}" method="POST">
  @csrf
  <div class='row'>
    <div class="col-sm-12">
      <div class="pull-left">
        <b>To DO :</b>
      </div>
    </div>
  </div>
  <div class='row'>
    <div class="col-sm-12">
      <!-- <div style="display:flex;"> -->
      <div style="padding-left: 0px;" class="col-sm-10">
        <input name="to_do" type="text" class="form-control" placeholder="To Do List">
      </div>
      <!-- </div> -->
    </div>
  </div>
  <div class='row'>
    <div class="col-sm-12">
      <div class="pull-left">
        <b>Desc :</b>
      </div>
    </div>
  </div>
  <div class='row'>
    <div class="col-sm-12">
      <!-- <div style="display:flex;"> -->
      <div style="padding-left: 0px;" class="col-sm-10">
        <input name="desc" type="text" class="form-control" placeholder="Desc">
      </div>
      <!-- </div> -->
    </div>
  </div>
  <div style="display:flex">
    <div style="width:50%">
      <div class='row'>
        <div class="col-sm-12">
          <div class="pull-left">
            <b>Start Date :</b>
          </div>
        </div>
      </div>
      <div class='row'>
        <div class="col-sm-12">
          <div style="display:flex;">
            <div style="padding-left: 0px;" class="col-sm-8">
              <input name="start_date" type="text" class="form-control datepicker" placeholder="Start Date">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div style="width:50%">
      <div class='row'>
        <div class="col-sm-12">
          <div class="pull-left">
            <b>Due Date :</b>
          </div>
        </div>
      </div>
      <div class='row'>
        <div class="col-sm-12">
          <div style="display:flex;">
            <div style="padding-left: 0px;" class="col-sm-8">
              <input name="due_date" type="text" class="form-control datepicker" placeholder="Due Date">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class='row'>
    <div class="col-sm-5">
    </div>
    <div class="col-sm-5">
      <div class="pull-left">
        <button type="submit" class="btn btn-sm btn-info">SAVE</button>
      </div>
    </div>
  </div>
  </form>
</div>
@endsection
@section('script')
<script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $( function() {
            $( ".datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd'
            });
        } );
</script>
@endsection