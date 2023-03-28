@extends('backend.components.container')

@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Edit Product
                </h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- ./row -->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">

                    <form id="EditForm" action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="card-body">
                        @include('backend.components.alert')
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel" aria-labelledby="custom-tabs-three-general-tab">

                                <div class="form-group">
                                <label for="cat_id">Category <span class="text-danger">*</span></label>
                                    <select name="cat_id" id="cat-dropdown" class="form-control">
                                        <option value="">--Select any category--</option>
                                        @foreach($categories as $key=>$category)
                                            <option value='{{$category->id}}' {{(($product->cat_id==$category->id)? 'selected' : '')}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                        <div class="form-group">
                                            <label for="subcat_id">SubCategory Name <span class="text-danger">*</span></label>
                                            <select name="subcat_id" id="subcat_id" class="form-control" required>
                                                <option value="">--Select Sub Category--</option>
                                                @foreach($subcategories as $key=>$subcategory)
                                                <option value="{{$subcategory->id}}" {{(($product->subcat_id==$subcategory->id)? 'selected':'')}}>{{$subcategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                <div class="form-group">
                                    <label for="productbrand_id">Product Brand</label>
                                    <select name="productbrand_id" class="form-control">
                                        <option value="">--Select Brand--</option>
                                        @foreach($productbrands as $productbrand)
                                        <option value="{{$productbrand->id}}" {{(($product->productbrand_id==$productbrand->id)? 'selected':'')}}>{{$productbrand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="inputTitle" class="col-form-label">Product Name <span class="text-danger">*</span></label>
                                <input id="inputTitle" type="text" name="name" placeholder="Enter Name"  value="{{$product->name}}" class="form-control">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>

                                <div class="form-group">
                                <label for="summary" class="col-form-label">Description </label>
                                <textarea class="form-control" id="summernote" name="description">{{$product->description}}</textarea>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>

                                <!-- <div class="form-group">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea class="form-control" id="summernote1" name="description">{{$product->description}}</textarea>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>


                                <div class="form-group">
                                <label for="is_featured">Is Featured</label><br>
                                <input type="checkbox" name='is_featured' id='is_featured' value="1" {{(($product->is_featured) ? 'checked' : '')}}> Yes                        
                                </div> -->


                                <div class="form-group">
                                <label for="price" class="col-form-label">Price(NRS) <span class="text-danger">*</span></label>
                                <input id="price" type="number" name="price" placeholder="Enter price"  value="{{$product->price}}" class="form-control">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>

                                <div class="form-group">
                                <label for="discount" class="col-form-label">Discount(%)</label>
                                <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Enter discount"  value="{{$product->discount}}" class="form-control">
                                @error('discount')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="size">Size</label>
                                <select name="size[]" class="form-control selectpicker"  multiple data-live-search="true">
                                    <option value="">--Select any size--</option>
                                    @foreach($items as $item)              
                                        @php 
                                        $data=explode(',',$item->size);
                                        // dd($data);
                                        @endphp
                                    <option value="Small"  @if( in_array( "Small",$data ) ) selected @endif>Small</option>
                                    <option value="Medium"  @if( in_array( "Medium",$data ) ) selected @endif>Medium</option>
                                    <option value="Large"  @if( in_array( "Large",$data ) ) selected @endif>Large</option>
                                    <option value="ExtraLarge"  @if( in_array( "ExtraLarge",$data ) ) selected @endif>Extra Large</option>
                                    @endforeach
                                </select>
                                </div>
                            

                                <div class="form-group">
                                <label for="condition">Condition <span class="text-danger">*</span></label>
                                <select name="condition" class="form-control">
                                    <option value="">--Select Condition--</option>
                                    <option value="default" {{(($product->condition=='default')? 'selected':'')}}>Default</option>
                                    <option value="new" {{(($product->condition=='new')? 'selected':'')}}>New</option>
                                    <option value="hot" {{(($product->condition=='hot')? 'selected':'')}}>Hot</option>
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="stock">Quantity <span class="text-danger">*</span></label>
                                <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"  value="{{$product->stock}}" class="form-control">
                                @error('stock')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>

                                    <div class="form-group">
                                        <label for="photo">Image <span class="text-danger">*</span></label>
                                        <input type="file" name="photo" class="form-control" id="photo" accept="image/png, image/jpeg" />
                                        <span style="color: red;">Image Upload Maximum 2MB</span>
                                        <img src="{{ asset('uploads/products/'. $product->photo) }}" height="80" width="100">

                                    </div>

                                    

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control m-bot15" name="status">
                                            <option value="1" {{ ($product->status == 1) ? 'selected="selected"' : '' }}>Active</option>
                                            <option value="0" {{ ($product->status == 0) ? 'selected="selected"' : '' }}>Deactive</option>
                                        </select>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <input type="hidden" name="_method" value="PUT">

                    </form>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('footer_js')


@endsection