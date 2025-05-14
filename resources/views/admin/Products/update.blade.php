@extends('admin.layouts.app')
@section('admin-content')
 
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Category</h1>
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
              <form  action="{{ route('product.update',$edit->id) }}" method="POST" enctype="multipart/form-data" > 
                 @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" value="{{ old('title',$edit->title) }}" class="form-control ">
                  </div>
                       <div class="form-group">
                    <label for="exampleInputEmail1">SKU</label>
                    <input type="text" name="sku" value="{{ old('sku') }}" class="form-control ">
                  </div>
              <div class="field d-flex">
                     <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Category</label>
                   <select name="category_id" id="cat_id" class="form-control">
                    @if ($categories->isNotEmpty())
                    <option value="">Select a Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option> 
                    @endforeach
                    @endif
                   </select>
                  </div>
                        <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Sub Category</label>
                   <select name="subcategory_id" id="subcategories" class="form-control">
             
                   </select>
                  </div>
              </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Brands</label>
                   <select name="brand_id" id="" class="form-control">
                    @if ($brands->isNotEmpty())
                    <option value="">Select a Brand</option>
                        @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            
                        @endforeach
                    @endif
                   </select>
                  </div>

                 <div class="prices d-flex">
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Price</label>
                   <input type="number" name="price" class="form-control">
                  </div>
                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Old Price</label>
                   <input type="number" name="old_price" class="form-control">
                  </div>
                 </div>
                  
                   <div class="form-group">
                    <label for="exampleInputEmail1">Color</label>
                  @if ($colors->isNotEmpty())
                      @foreach ($colors as $color)
                  <div class="check-fields">
                          <input type="checkbox" id="{{ $color->id }}" class="mr-1">
                    <label for=" {{ $color->id }}">{{ $color->name }}</label>                            
                  </div>
                      @endforeach
                  @endif

        
                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Size</label>
                   <table class="table">
                    <thead>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Action</th>
                    </thead>
                    <tbody >
                      <tr>
                      <td><input type="text" name="sizes[0][name]" class="form-control"></td>
                      <td><input type="text" name="sizes[0][price]" class="form-control"></td>
                      <td>
                        <button class="btn btn-secondary addsize" >Add</button>
                        {{-- <button class="btn btn-danger">Delete</button> --}}
                      </td>
                      </tr>
                    </tbody>
                   <tbody  id="appendsize">

                   </tbody>
                   </table>
                  </div>
                  <div class="form-group ">
                    <label for="exampleInputEmail1">Image</label>
                 <input type="file" class="form-control" style="padding: 5px;" name="image[]" multiple></input>
                  </div>
                 <div class="display-image">
                  <img src="{{ url(public_path('/storage/product'.)) }}" alt="">
                 </div>
                  <div class="form-group ">
                    <label for="exampleInputEmail1">Short Descripation</label>
                 <textarea class="summernote" name="short_desc"></textarea>
                  </div>
                     <div class="form-group ">
                    <label for="exampleInputEmail1"> Descripation</label>
                   <textarea class="summernote" name="descripation"></textarea>
                  </div>
                     <div class="form-group ">
                    <label for="exampleInputEmail1">Additional  Information</label>
                 <textarea class="summernote" name="additional_information"></textarea>
                  </div>
                     <div class="form-group ">
                    <label for="exampleInputEmail1">Shipping Returns</label>
                  <textarea class="summernote" name="shipping_returns"></textarea>
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
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          
        </div>
        <!-- /.row -->
      </div>
    </section>
  

@endsection
@section('script-content')
<script>
  let priceIndex=1;
$(".addsize").click(function(e){
  e.preventDefault();
var html=`   <tr>
                      <td><input type="text" name="sizes[${priceIndex}][name]" class="form-control"></td>
                      <td><input type="text"  name="sizes[${priceIndex}][price]" class="form-control"></td>
                      <td>
                      
                         <button class="btn btn-danger remove-size">Delete</button>
                      </td>
                      </tr>`
$('#appendsize').append(html);
priceIndex ++;

})

    $(document).on('click', '.remove-size', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });






  $(document).ready(function () {
      $('.summernote').summernote();
    $("#cat_id").change(function () {
      let cat_id = $(this).val();
      console.log(cat_id);

      $.ajax({
        url: '{{ route('productSubcategory') }}',
        type: 'GET',
        dataType: 'json',
        data: { cat_id: cat_id },
        success: function (response) {
          // $('#subcategories').append('<option> Select a SubCategory</option>'); 
          response.message.forEach(function (subcategories) {
            $('#subcategories').append("<option value=" + subcategories.id + ">" + subcategories.name + "</option>");
          });
        }
      });
    });
  });

  // tiymc editor 
   $('.editor').tinymce({
        height: 500,
        menubar: false,
        plugins: [
          'a11ychecker', 'accordion', 'advlist', 'anchor', 'autolink', 'autosave',
          'charmap', 'code', 'codesample', 'directionality', 'emoticons', 'exportpdf',
          'exportword', 'fullscreen', 'help', 'image', 'importcss', 'importword',
          'insertdatetime', 'link', 'lists', 'markdown', 'math', 'media', 'nonbreaking',
          'pagebreak', 'preview', 'quickbars', 'save', 'searchreplace', 'table',
          'visualblocks', 'visualchars', 'wordcount'
        ],
        toolbar: 'undo redo | accordion accordionremove | ' +
          'importword exportword exportpdf | math | ' +
          'blocks fontfamily fontsize | bold italic underline strikethrough | ' +
          'align numlist bullist | link image | table media | ' +
          'lineheight outdent indent | forecolor backcolor removeformat | ' +
          'charmap emoticons | code fullscreen preview | save print | ' +
          'pagebreak anchor codesample | ltr rtl',
        menubar: 'file edit view insert format tools table help'
      });
</script>


@endsection