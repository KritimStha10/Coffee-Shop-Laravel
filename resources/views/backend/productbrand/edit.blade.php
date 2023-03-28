@extends('backend.components.container')
@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Edit Product Brands
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

                    <form id="EditForm" action="{{ route('admin.productbrand.update', $productbrand->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        @include('backend.components.alert')
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel" aria-labelledby="custom-tabs-three-general-tab">
                                    
                                       <div class="form-group">
                                            <label for="cat_id">Category Name <span class="text-danger">*</span></label>
                                            <select name="cat_id" id="cat_id" class="form-control" required>
                                                <option value="">--Select Category--</option>
                                                @foreach($categories as $key=>$category)
                                                <option value="{{$category->id}}" {{(($productbrand->cat_id==$category->id)? 'selected':'')}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="subcat_id">SubCategory Name <span class="text-danger">*</span></label>
                                            <select name="subcat_id" id="subcat_id" class="form-control" required>
                                                <option value="">--Select Sub Category--</option>
                                                @foreach($subcategories as $key=>$subcategory)
                                                <option value="{{$subcategory->id}}" {{(($productbrand->subcat_id==$subcategory->id)? 'selected':'')}}>{{$subcategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                      
                                                                       
                                       <div class="form-group">
                                            <div class="form-line">
                                                <label for="name">Product Brand Name <span style="color: red;"> *</span> </label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $productbrand->name }}" required/>
                                            </div>
                                        </div>

                                 

                                    <div class="form-group">
                                        <label for="image">Image <span style="color: red;"> *</span></label>
                                        <input type="file" name="image" class="form-control" id="image" accept="image/png, image/jpeg" />
                                        <span style="color: red;">Image Upload Maximum 2MB</span>
                                        <img src="{{ asset('uploads/productbrands/'.$productbrand->image) }}" height="80" width="100">

                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control m-bot15" name="status">
                                            <option value="1" {{ ($productbrand->status == 1) ? 'selected="selected"' : '' }}>Active</option>
                                            <option value="0" {{ ($productbrand->status == 0) ? 'selected="selected"' : '' }}>Deactive</option>
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