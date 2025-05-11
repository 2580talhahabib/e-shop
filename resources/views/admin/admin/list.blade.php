@extends('admin.layouts.app')
@section('admin-content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admins Table</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{ route('admin.create') }}" class="btn  btn-success float-right ">Add New Admins</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      @include('admin.layouts.message')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
          
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th >Status</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($admins->isNotEmpty())
                      @foreach ($admins as $admin)
                           <tr>
                      <td>{{ $admin ->id }}</td>
                      <td>{{ $admin->name }}</td>
                      <td>{{ $admin->email }}</td>
                      <td>{{( $admin->status == 1) ? 'Active' : 'Block' }}</td>
                      <td>
                        <form action="{{ route('admin.destroy',$admin->id) }}" method="POST">
                          @csrf
                        <a href="{{ route('admin.edit',$admin->id) }}" class="btn btn-sm  btn-secondary">Update</a>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                      </td>

                      
                    </tr> 
                      @endforeach
                    @endif
                    
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

       
            <!-- /.card -->
          </div>
          <!-- /.col -->
         
          <!-- /.col -->
        </div>
        <!-- /.row -->
       
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
@endsection