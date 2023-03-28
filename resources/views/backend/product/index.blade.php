@extends('backend.components.container')

@section('dynamicdata')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Product List
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
                        <h3><a href="{{ route('admin.product.create') }}" class="add-product-table btn btn-sm btn-primary">Add New &nbsp;<i class="fa fa-plus"></i></a></h3>
                        <table id="dataTable" class="table table-bordered table-striped show-search-bar">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Category Name</th>
                                    <th>SubCategory Name</th>
                                    <th>Product Brand Name</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th style="width: 13%;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tablebody">
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->subcategory->name }}</td>
                                    <td>{{ $product->productbrand->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>Rs. {{$product->price}} /-</td>
                                    <td>
                                    @if($product->stock>0)
                                    <span class="badge badge-primary">{{$product->stock}}</span>
                                    @else
                                    <span class="badge badge-danger">{{$product->stock}}</span>
                                    @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="product_img" width="100" height="80">
                                    </td>
                                    <td> @if($product->status == 1)
                                        <small class="label btn-sm  bg-green">Active</small>
                                        @else
                                        <small class="label btn-sm  bg-red">Deactive</small>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.product.show',$product->id) }}" title="View product" ><button type="button" class="btn btn-sm bg-purple btn-circle waves-effect waves-circle waves-float"><i class="fa fa-eye"></i></button></a>&nbsp;
                                        <a href="{{ route('admin.product.edit',$product->id) }}" title="Edit product">
                                            <button type="button" class="btn btn-sm  bg-green btn-circle waves-effect waves-circle waves-float">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>

                                        <a href="javascript:;" title="Delete product" class="delete-product" id="{{ $product->id }}"><button class="btn btn-sm bg-red btn-circle waves-effect waves-circle waves-float"><i class="fa fa-trash"></i></button></a>

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
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th style="width: 13%;">Action</th>
                                </tr>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

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