<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Oracle CRUD</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style>
        .container {
            padding: 0.5%;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 style="margin-top: 12px;" class="alert alert-success text-center">Tugas Pak Masmur</h2><br>
        <div class="row">
            <div class="col-12">
                <a href="javascript:void(0)" class="btn btn-success mb-2" id="create-new-product">Add product</a>
                <table class="table table-bordered" id="laravel_crud">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Buy Price</th>
                            <th>Sell Price</th>
                            <th>Product Image</th>
                            <th>Description</th>
                            <td colspan="2">Action</td>
                        </tr>
                    </thead>
                    <tbody id="products-crud">
                        @foreach($products as $product)
                        <tr id="product_id_{{ $product->productid }}">
                            <td>{{ $product->productid  }}</td>
                            <td>{{ $product->productname }}</td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->buyprice }}</td>
                            <td>{{ $product->sellprice }}</td>
                            <td>{{ $product->productimage }}</td>
                            <td>{{ $product->description }}</td>
                            <td><a href="javascript:void(0)" id="edit-product" data-id="{{ $product->productid }}"
                                    class="btn btn-info">Edit</a></td>
                            <td>
                                <a href="javascript:void(0)" id="delete-product" data-id="{{ $product->productid }}"
                                    class="btn btn-danger delete-product">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $products->links() }} --}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="productModal"></h4>
                </div>
                <div class="modal-body">
                    <form id="productForm" name="productForm" class="form-horizontal">
                        <input type="hidden" name="productid" id="productid">
                        <div class="form-group">
                            <label for="productname" class="col-sm-5 control-label">Product Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="productname" name="productname"
                                    placeholder="Enter Product Name" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-sm-5 control-label">Category</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="category" name="category"
                                    placeholder="Enter Category" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="buyprice" class="col-sm-5 control-label">Buy Price</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="buyprice" name="buyprice"
                                    placeholder="Enter Buy Price" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sellprice" class="col-sm-5 control-label">Sell Price</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="sellprice" name="sellprice"
                                    placeholder="Sell Price" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-5 control-label">Description</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Description" required="">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10 mt-5">
                            <button type="submit" class="btn btn-primary" id="btn-save">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ajax-crud-modal-update" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="productModalUpdate"></h4>
                </div>
                <div class="modal-body">
                    <form id="updateProductForm" name="updateProductForm" class="form-horizontal">
                        <input type="hidden" name="productid" id="productidUpdate">
                        <div class="form-group">
                            <label for="productnameUpdate" class="col-sm-5 control-label">Product Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="productnameUpdate" name="productname"
                                    placeholder="Enter Product Name" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoryUpdate" class="col-sm-5 control-label">Category</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="categoryUpdate" name="category"
                                    placeholder="Enter Category" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="buypriceUpdate" class="col-sm-5 control-label">Buy Price</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="buypriceUpdate" name="buyprice"
                                    placeholder="Enter Buy Price" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sellpriceUpdate" class="col-sm-5 control-label">Sell Price</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="sellpriceUpdate" name="sellprice"
                                    placeholder="Sell Price" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descriptionUpdate" class="col-sm-5 control-label">Description</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="descriptionUpdate" name="description"
                                    placeholder="Description" required="">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10 mt-5">
                            <button type="submit" class="btn btn-primary" id="btn-save">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      /*  When product click add product button */
      $('#create-new-product').click(function () {
          $('#btn-save').val("create-product");
          $('#productForm').trigger("reset");
          $('#productModal').html("Add New product");
          $('#ajax-crud-modal').modal('show');
      });
   
     /* When click Edit Product */
      $('body').on('click', '#edit-product', function () {
        var product_id = $(this).data('id');
        $.get('product/' + product_id +'/edit', function (data) {
           $('#productModalUpdate').html("Edit Product");
            $('#btn-save').val("edit-product");
            $('#ajax-crud-modal-update').modal('show');
            $('#productidUpdate').val(data.productid);
            $('#productnameUpdate').val(data.productname);
            $('#categoryUpdate').val(data.category);
            $('#buypriceUpdate').val(data.buyprice);
            $('#sellpriceUpdate').val(data.sellprice);
            $('#descriptionUpdate').val(data.description);
        })
     });

     // update product
     if ($("#updateProductForm").length > 0) {
         
         $("#updateProductForm").validate({
             
        submitHandler: function(form) {
            var product_id = $('#productidUpdate').val();
        
        var actionType = $('#btn-save').val();
        $('#btn-save').html('Sending..');
        
        $.ajax({
            data: $('#updateProductForm').serialize(),
            url: "{{ url('product') }}/" + product_id,
            type: "PUT",
            dataType: 'json',
            success: function (data) {
                $('#updateProductForm').trigger("reset");
                $('#ajax-crud-modal-update').modal('hide');
                $('#btn-save').html('Save Changes');
                window.location.reload();
                
            },
            error: function (data) {
                console.log('Error:', data);
                $('#btn-save').html('Save Changes');
            }
        });
      }
    })
  }

     //delete product
      $('body').on('click', '.delete-product', function () {
          var product_id = $(this).data("id");
          confirm("Are You sure want to delete !");
   
          $.ajax({
              type: "DELETE",
              url: "{{ url('product') }}"+'/'+product_id,
              success: function (data) {
                  $("#product_id_" + product_id).remove();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
      });   
    });
   
   if ($("#productForm").length > 0) {
        $("#productForm").validate({
   
       submitHandler: function(form) {
   
        var actionType = $('#btn-save').val();
        $('#btn-save').html('Sending..');
        
        $.ajax({
            data: $('#productForm').serialize(),
            url: "{{ route('product.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
   
                $('#productForm').trigger("reset");
                $('#ajax-crud-modal').modal('hide');
                $('#btn-save').html('Save Changes');
                window.location.reload();
                
            },
            error: function (data) {
                console.log('Error:', data);
                $('#btn-save').html('Save Changes');
            }
        });
      }
    })
  }
     
    
</script>

</html>