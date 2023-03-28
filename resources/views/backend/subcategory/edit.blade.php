@extends('backend.components.container')
@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Edit Subcategory
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

                    <form id="EditForm" action="{{ route('admin.subcategory.update', $subcategory->id) }}" method="post" enctype="multipart/form-data">
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
                                                <option value="{{$category->id}}" {{(($subcategory->cat_id==$category->id)? 'selected':'')}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                      
                                                                       
                                       <div class="form-group">
                                            <div class="form-line">
                                                <label for="name">SubCategory Name <span style="color: red;"> *</span> </label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $subcategory->name }}" required/>
                                            </div>
                                        </div>

                                 

                                    <div class="form-group">
                                        <label for="image">Image <span style="color: red;"> *</span></label>
                                        <input type="file" name="image" class="form-control" id="image" accept="image/png, image/jpeg" />
                                        <span style="color: red;">Image Upload Maximum 2MB</span>
                                        <img src="{{ asset('uploads/subcategories/'.$subcategory->image) }}" height="80" width="100">

                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control m-bot15" name="status">
                                            <option value="1" {{ ($subcategory->status == 1) ? 'selected="selected"' : '' }}>Active</option>
                                            <option value="0" {{ ($subcategory->status == 0) ? 'selected="selected"' : '' }}>Deactive</option>
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