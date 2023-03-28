@extends('backend.components.container')

@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Add Product
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

                    <form id="EditForm" action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        @include('backend.components.alert')
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel" aria-labelledby="custom-tabs-three-general-tab">
                                 
                                    <div class="form-group">
                                    <label for="cat_id">Category <span class="text-danger">*</span></label>
                                    <select name="cat_id" id="cat-dropdown" class="form-control">
                                        <option value="">--Select any category--</option>
                                        @foreach($categories as $key=>$category)
                                            <option value='{{$category->id}}'>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                    <div class="form-group">
                                    <label for="subcat_id">Sub Category <span class="text-danger">*</span></label>
                                    <select name="subcat_id" id="cat-dropdown" class="form-control">
                                        <option value="">--Select any sub category--</option>
                                        @foreach($subcategories as $key=>$subcategory)
                                            <option value='{{$subcategory->id}}'>{{$subcategory->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                    <div class="form-group">
                                    <label for="productbrand_id">Product Brands <span class="text-danger">*</span></label>
                                    <select name="productbrand_id" id="cat-dropdown" class="form-control">
                                        <option value="">--Select any Product Brands--</option>
                                        @foreach($productbrands as $key=>$productbrand)
                                            <option value='{{$productbrand->id}}'>{{$productbrand->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="brand_id">Brand</label>
                                        <select id="brand-dropdown" name="brand_id" class="form-control"></select>
                                    </div> -->
                                    
                                    <div class="form-group">
                                        <label for="title">Product Name <span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Title">
                                        @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description </label>
                                        <textarea class="form-control" id="summernote1" rows="4" name="description"> </textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="price" class="col-form-label">Price(NRS) <span class="text-danger">*</span></label>
                                        <input id="price" type="number" name="price" placeholder="Enter price"  value="{{old('price')}}" class="form-control">
                                        @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="discount" class="col-form-label">Discount(%) <span class="text-danger">*</span></label>
                                        <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Enter discount"  value="{{old('discount')}}" class="form-control">
                                        @error('discount')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="size">Size</label>
                                        <select name="size[]" class="form-control selectpicker"  multiple data-live-search="true">
                                            <option value="">--Select any size--</option>
                                            <option value="Small">Small (S)</option>
                                            <option value="Medium">Medium (M)</option>
                                            <option value="Large">Large (L)</option>
                                            <option value="ExtraLarge">Extra Large (XL)</option>
                                        </select>
                                    </div>

                              

                                    <div class="form-group">
                                        <label for="condition">Condition <span class="text-danger">*</span></label>
                                        <select name="condition" class="form-control">
                                            <option value="">--Select Condition--</option>
                                            <option value="default">Default</option>
                                            <option value="new">New</option>
                                            <option value="hot">Hot</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="stock">Quantity <span class="text-danger">*</span></label>
                                        <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"  value="{{old('stock')}}" class="form-control">
                                        @error('stock')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="photo">Image <span class="text-danger">*</span></label>
                                            <input type="file" name="image" class="form-control" id="photo" accept="image/png, image/jpeg" />
                                            <span style="color: red;">Maximum Limit 2MB</span>
                                        </div>
                                            @error('photo')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="attachment">Multiple Image </label>
                                            <input type="file" name="attachment[]" class="form-control" id="attachment"  multiple />
                                            <span style="color: red;">You can upload multiple Image Here, Upload Maximum 2MB Each</span>
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
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

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
<script>
$(document).ready(function() {
    $('#cat-dropdown').on('change', function() {
        var cat_id = this.value;
        $("#brand-dropdown").html('');
        $.ajax({
            url:"{{url('/dashboard/product/')}}",
            type: "POST",
            data: {
            cat_id: cat_id,
            _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
                $('#brand-dropdown').html('<option value="">Select Brand</option>'); 
                $.each(result.states,function(key,value){
                $("#brand-dropdown").append('<option value="'+value.id+'">'+value.title+'</option>');
                });
            }
        });
    });

});
</script>


@endsection