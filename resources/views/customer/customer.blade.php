@extends('layout.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer List</h1>
          </div>         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

          <div class="col-md-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                     
                      <th> Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <!--dien vao
                      foreach
                      -->
                      @foreach($getRecord as $value)

                    <tr>                      
                           <td>{{$value->Cus_ID}}</td>
                           <td>{{$value->Cus_Name}}</td>
                           <td>{{$value->Cus_Phone}}</td>
                           <td>{{$value->Cus_Email}}</td>                       
                      <td>
                        <a href="{{url('customer/edit/'.$value->Cus_ID)}}" class="btn btn-primary"> Update </a>
                      <a href="{{url('customer/delete/'.$value->Cus_ID)}}" class="btn btn-danger"> Delete </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
     
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
