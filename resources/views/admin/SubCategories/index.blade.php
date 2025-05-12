@extends('admin.layouts.app')
@section('admin-content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub Categories Table</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{ route('subcategory.create') }}" class="btn  btn-success float-right ">Add New SubCategory</a>
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
                      <th>Category</th>
                      <th>Slug</th>
                      <th >Meta Titles</th>
                      <th >Meta Descripation</th>
                      <th >Meta Keywords</th>
                      <th >Status</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($subcategories->isNotEmpty())
                      @foreach ($subcategories as $subcategory)
                           <tr>
                      <td>{{$subcategory ->id }}</td>
                      <td>{{$subcategory->name }}</td>
                      <td>{{isset($subcategory->category->name) ? $subcategory->category->name : 'No Category' }}</td>
                 
                      <td>{{$subcategory->slug }}</td>
                      <td>{{$subcategory->meta_title }}</td>
                      <td>{{$subcategory->meta_descripation }}</td>
                      <td>{{$subcategory->meta_keywords }}</td>
                      <td>{{($subcategory->status == 1) ? 'Active' : 'Block' }}</td> 
                   <td>
                        <form action="{{ route('subcategory.destroy',$subcategory->id) }}" method="POST">
                          @csrf
                          <div class="d-flex">
  <a href="{{ route('subcategory.edit',$subcategory->id) }}"class="text-default mt-2" ><i class="fa-solid fa-pencil" ></i></a>
                        <button type="submit" class="text-danger btn btn-none "><i class="fa-solid fa-trash"></i></button>
                          </div>
                      
                        </form>
                      </td>

                      
                    </tr> 
                      @endforeach
                    @endif
                    
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
         {{ $subcategories->links() }}
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