@extends('admin.layouts.app')
@section('admin-content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Brands Table</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{ route('brand.create') }}" class="btn  btn-success float-right ">Add New Brand</a>
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
                      <th>Slug</th>
                      <th >Meta Titles</th>
                      <th >Meta Descripation</th>
                      <th >Meta Keywords</th>
                      <th >Status</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($brands->isNotEmpty())
                      @foreach ($brands as $brand)
                           <tr>
                      <td>{{$brand ->id }}</td>
                      <td>{{$brand->name }}</td>
                      <td>{{$brand->slug }}</td>
                      <td>{{$brand->meta_title }}</td>
                      <td>{{$brand->meta_descripation }}</td>
                      <td>{{$brand->meta_keywords }}</td>
                      <td>{{($brand->status == 1) ? 'Active' : 'Block' }}</td> 
                      <td>
                        <form action="{{ route('brand.destroy',$brand->id) }}" method="POST">
                          @csrf
                        <a href="{{ route('brand.edit',$brand->id) }}"class="text-default" ><i class="fa-solid fa-pencil" ></i></a>
                        <button type="submit" class="text-danger btn btn-none"><i class="fa-solid fa-trash"></i></button>
                        </form>
                      </td>

                      
                    </tr> 
                      @endforeach
                    @endif
                    
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
         {{ $brands->links() }}
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