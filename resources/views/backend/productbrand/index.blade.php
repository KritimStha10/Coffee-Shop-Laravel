@extends('backend.components.container')
@section('dynamicdata')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Product Brand List
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            @include('backend.components.alert')
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-body">
                        <h3><a href="javascript:;" class="add-productbrand-table btn btn-sm btn-primary">Add New &nbsp;<i class="fa fa-plus"></i></a></h3>
                        <table id="dataTable" class="table table-bordered table-striped show-search-bar">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Category Name</th>
                                    <th>SubCategory Name</th>
                                    <th>Product Brand Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tablebody">
                                @foreach($productbrands as $productbrand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $productbrand->category->name }}</td>
                                    <td>{{ $productbrand->subcategory->name}}</td>
                                    <td>{{ $productbrand->name }}</td>

                                    <td>
                                        <img src="{{ asset('uploads/productbrands/' . $productbrand->image) }}" alt="productbrand_img" width="100" height="80">
                                    </td>
                                    <td> @if($productbrand->status == 1)
                                        <small class="label btn-sm  bg-green">Active</small>
                                        @else
                                        <small class="label btn-sm  bg-red">Deactive</small>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.productbrand.edit',$productbrand->id) }}" title="Edit productbrand">
                                            <button type="button" class="btn btn-sm  bg-green btn-circle waves-effect waves-circle waves-float">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>&nbsp;

                                        <a href="javascript:;" title="Delete productbrand" class="delete-productbrand" id="{{ $productbrand->id }}"><button class="btn btn-sm bg-red btn-circle waves-effect waves-circle waves-float"><i class="fa fa-trash"></i></button></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SN</th>
                                    <th>Category Name</th>
                                    <th>SubCategory Name</th>
                                    <th>Product Brand Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Add Form Start -->
                    <div class="modal fade" id="addproductbrandForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="card-header">
                                    <h3 class="card-title" id="myModalLabel">Add Product brand</h3>
                                </div>
                             
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.productbrand.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                        <div class="form-group">
                                            <label for="cat_id">Category Name <span class="text-danger">*</span></label>
                                            <select name="cat_id" id="cat_id" class="form-control" required>
                                                <option value="">--Select Category--</option>
                                                @foreach($categories as $key=>$category)
                                            
                                                    <option value='{{$category->id}}'>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="subcat_id">Sub Category Name <span class="text-danger">*</span></label>
                                            <select name="subcat_id" id="subcat_id" class="form-control" required>
                                                <option value="">--Select Sub Category--</option>
                                                @foreach($subcategories as $key=>$subcategory)
                                            
                                                    <option value='{{$category->id}}'>{{$subcategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="name">Product Brand Name <span style="color: red;"> *</span> </label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter product brand Name" required/>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="image">Image </label>
                                                <input type="file" name="image" class="form-control" id="image" required/>
                                                <span style="color: red;">Image Upload Maximum 2MB</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control m-bot15" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary waves-effect">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Add Form -->

                </div>

            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('footer_js')

<script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '.add-productbrand-table', function(e) {
        e.preventDefault();
        $('#addproductbrandForm').modal('show');
      });
    });
  </script>

<script type="text/javascript">
    $(document).ready(function() {
        var oTable = $('.show-search-bar').dataTable();

        $('#tablebody').on('click', '.delete-product', function(e) {
            e.preventDefault();
            $object = $(this);
            var id = $object.attr('id');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'red',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }, function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}",
                    },
                    type: "DELETE",
                    url: "{{ url('/dashboard/product/') }}" + "/" + id,
                    dataType: 'json',
                    success: function(response) {
                        var nRow = $($object).parents('tr')[0];
                        oTable.fnDeleteRow(nRow);
                        swal('success', response.message, 'success');
                    },
                    error: function(e) {
                        swal('Oops...', 'Something went wrong!', 'error');
                    }
                });
            });
        });
    });
</script>
@endsection