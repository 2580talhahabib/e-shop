@extends('admin.layouts.app')
@section('admin-content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories Table</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{ route('category.create') }}" class="btn  btn-success float-right ">Add New Category</a>
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
                    @if ($categories->isNotEmpty())
                      @foreach ($categories as $category)
                           <tr>
                      <td>{{ $category ->id }}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->slug }}</td>
                      <td>{{ $category->meta_title }}</td>
                      <td>{{ $category->meta_descripation }}</td>
                      <td>{{ $category->meta_keywords }}</td>
                      <td>{{( $category->status == 1) ? 'Active' : 'Block' }}</td> 
                      <td>
                        <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                          @csrf
                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm  btn-secondary">Update</a>
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
         {{ $categories->links() }}
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