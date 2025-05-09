@extends('admin.layouts.app')
@section('admin-content')
    @extends('admin-pannel.layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('admin-pannel.layouts.message')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products Table</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('prouducts.index') }}" class="text-gray">List</a></li>
            <li class="breadcrumb-item "><a href="{{ route('prouducts.create') }}" >Create</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Products</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">Id</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Image</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @if ($products->isNotEmpty())
                      @foreach ($products as $product)
                      <tr>
                        <td>{{ $product->id }}</td>
                        {{-- <td>{{ $subcategories->category?->name ?? 'No Category' }}</td> --}}
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->compare_price }}</td>
                        <td>{{ $product->productcategories->name }}</td>
                        <td>{{ $product->productsubcategories->name }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ url('storage/product/'.$product->image) }}" width="50" alt="Product Image">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                         <button class="btn btn-primary" >Update</button>
                         <button class="btn btn-danger" value="{{ $product->id }}" >Delete</button>
                        </td>
                       
                      </tr>
                     
                      @endforeach
                  @endif
                 
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            {{-- <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div> --}}
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
</div>
@endsection
@section('script')
<script>
$('.btn-danger').click(function (){
const delid=$(this).val();
 const url='{{ route('prouducts.destroy','id') }}'.replace('id',delid);
 $.ajax({
  url:url,
  type:'DELETE',
  data: {
          _token: '{{ csrf_token() }}'
        },
  success:function(response){
if(response.status == true){
  window.location.href="{{ route('prouducts.index') }}?status=success&message=Data Deleted successfully"
}else{
  window.location.href="{{ route('prouducts.index') }}?status=error&message=Data did not  Deleted successfully"
  
}

  }
 })
})
  

</script>
@endsection
@endsection