@extends('admin.layouts.app')
@section('admin-content')
 
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Color</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
            
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('color.store') }}" method="POST" >
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control ">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Color Code</label>
                    <input type="color" name="code" value="{{ old('code') }}" class="form-control ">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">status</label>
                   <select name="status" class="form-control">
                    <option value="1" >Active</option>
                    <option value="0">InActive</option>
                   </select>
                  </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  

@endsection