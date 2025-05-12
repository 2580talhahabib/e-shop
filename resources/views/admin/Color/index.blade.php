@extends('admin.layouts.app')
@section('admin-content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Color Table</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{ route('color.create') }}" class="btn  btn-success float-right ">Add New Color</a>
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
                     
                      <th >Color Code</th>
                  
                      <th >Status</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($colors->isNotEmpty())
                      @foreach ($colors as $color)
                           <tr>
                      <td>{{$color ->id }}</td>
                      <td>{{$color->name }}</td>
                      <td>{{$color->code }}</td>
                      <td>{{($color->status == 1) ? 'Active' : 'Block' }}</td> 
                      <td>
                        <form action="{{ route('color.destroy',$color->id) }}" method="POST">
                          @csrf
                        <a href="{{ route('color.edit',$color->id) }}"class="text-default" ><i class="fa-solid fa-pencil" ></i></a>
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
         {{ $colors->links() }}
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