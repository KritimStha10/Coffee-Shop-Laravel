@extends('backend.components.container')

@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Product Detail
                </h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary card-outline card-tabs">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category Name</th>
                                    <th>SubCategory Name</th>
                                    <th>Product Brand Name</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Condition</th>
                                    <th>Size</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                              
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->subcategory->name }}</td>
                                    <td>{{ $product->productbrand->name }}</td>
                                  
                                
                                    <td>Rs. {{$product->price}} /-</td>
                                    <td>  {{$product->discount}}% OFF</td>
                                    <td>{{$product->condition}}</td>

                                    <td>{{$product->size}}</td>
                                    <td>
                                    @if($product->stock>0)
                                    <span class="badge badge-primary">{{$product->stock}}</span>
                                    @else
                                    <span class="badge badge-danger">{{$product->stock}}</span>
                                    @endif
                                    </td>
                                    <td> @if($product->status == 1)
                                        <small class="label btn-sm  bg-green">Active</small>
                                        @else
                                        <small class="label btn-sm  bg-red">Deactive</small>
                                        @endif
                                    </td>
                                </tr>

                            </tbody>
                          
                        </table>
                    </div>

                </div>

            </div>
        </div>
        <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
               
                <a class="nav-item nav-link" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="false">Description</a>
                <a class="nav-item nav-link" id="product-photo-tab" data-toggle="tab" href="#product-photo" role="tab" aria-controls="product-photo" aria-selected="false">Photo</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {!! $product->description !!}</div>
                <div class="tab-pane fade" id="product-photo" role="tabpanel" aria-labelledby="product-photo-tab">     
                    <div class="col-12">
                        <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                        <div class="col-12 col-sm-6">
                            <img src="{{ asset('uploads/products/' . $product->image) }}" class="product-image" alt="Product Image" style="width: 250; height: 200px;" >
                        </div>
                        <div class="col-12 product-image-thumbs">
                            @foreach($product_photos as $photo)
                            <div class="product-image-thumb"> <img src="{{ asset('uploads/products/photos/' . $photo->attachment) }}"  ></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
    </div>
</section>
<!-- /.content -->

@endsection


@section('footer_js')


@endsection