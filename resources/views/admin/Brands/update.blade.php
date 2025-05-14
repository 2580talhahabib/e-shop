@extends('admin.layouts.app')
@section('admin-content')
 
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Brand</h1>
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
              <form  action="{{ route('brand.update',$edit->id) }}" method="POST"  >
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Name</label>
                    <input type="text" name="name" value="{{ old('name',$edit->name) }}" class="form-control ">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title',$edit->meta_title) }}" class="form-control ">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Meta Descripation</label>
                   <textarea name="meta_descripation" class="form-control" id="meta_descripation" cols="130" rows="5">{{ isset($edit->meta_descripation) ? $edit->meta_descripation : ' ' }}</textarea>
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords',$edit->meta_keywords) }}" class="form-control ">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">status</label>
                   <select name="status" class="form-control">
                  <option value="1" {{ ($edit->status == 1) ? 'Active' : 'Inactive' }} >Active</option>
                    <option value="0"  {{ ($edit->status == 0) ? 'Active' : 'Inactive' }}>InActive</option>
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