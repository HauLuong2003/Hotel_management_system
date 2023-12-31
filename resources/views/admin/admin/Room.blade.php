@extends('layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Room</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;" >
            <a  href="/room/add" class="btn btn-primary">Add New Room</a>
             </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                    <th style="width: 5%">RoomID</th>
                    <th style="width: 15%" class="text-center">Status</th>
                    <th style="width: 20%">Describe</th>
                    <th style="width: 15%">Room Number</th>
                    <th style="width: 10%">Price</th>
                    <th style="width: 10%">Quantity</th>
                    <th style="width: 20%">Room Image</th>
                    <th style="width: 20%">Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($getRecord as $item)
                  <tr>
                      <td>{{$item->Room_ID}}</td>
                      <td>{{$item->Status}}</td>
                      <td>{{$item->Describe}}</td>
                      <td>{{$item->Number}}</td>
                      <td>{{$item->Price}}$</td>
                      <td>{{$item->Quantity}}</td>
                      <div class="col-sm-6">
                      <td > <img class="img-fluid mb-3" <img src="{{ Storage::url('app/'.$item->image) }}" alt="Room Image"></td>
                      </div>
                      <td class="project-actions text-right">

                          <a class="btn btn-info btn-sm" href="{{url('room/edit/'.$item->Room_ID)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{url('room/delete/'.$item->Room_ID)}}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                    @endforeach

              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection