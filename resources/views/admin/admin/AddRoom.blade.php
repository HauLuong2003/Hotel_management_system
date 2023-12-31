@extends('layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> </h1>
          </div>        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form method="POST" action="/room/add" enctype="multipart/form-data">
              {{csrf_field()}}
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Room ID</label>
                <input type="text" name="roomID" id="roomID" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Room Number</label>
                <input type="text" name="roomNumber" id="roomNumber" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Room Description</label>
                <textarea id="inputDescription" name="roomDescription" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select name ="status" id="inputStatus" class="form-control custom-select">
                  @foreach($Status as $value)
                  <option value="{{ $value }}">{{ $value }}</option>
              @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="inputPrice">Price</label>
                <input type="text" name="Price" id="inputPrice" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputPrice">Quantity</label>
                <input type="text" name="Quantity" id="inputPrice" class="form-control">
              </div>
              <label for="exampleInputFile">Room image</label>
                <div class="input-group">
                  <div class="custom-file">
                   <input type="file" name="image" id="inputimage" class="custom-file-input">
                   <label class="custom-file-label" for="exampleInputFile">Choose</label>
                  </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary">create new Room</button>
              </div>
            </div>

            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
 
          <!-- /.card -->
        </div>
      </div>
      
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection