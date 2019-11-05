
{{-- Supplier ADD product  --}}
@section('content')
@extends('layouts.supplierLayout.supplier_design')

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ url('/supplier/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/supplier/view-products') }}">View Products</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <!-- end page-header -->
    <!-- begin wizard-form -->
    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif
    <form action="{{ url('/supplier/add-product') }}" enctype="multipart/form-data" method="POST" name="add_product" class="form-control-with-bg">{{ csrf_field() }}
        <!-- begin wizard -->
        <div id="wizard">
            <!-- begin wizard-content -->
            <div>
                <!-- begin step-1 -->
                <div id="step-1">
                        <!-- begin row -->
                        <div class="row">
                            <!-- begin col-8 -->
                            {{-- begin personal information --}}
                            <div class="col-md-8 offset-md-2">
                                <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Add Product</legend>
                                <!-- begin form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Category Lavel</label>
                                    <div class="col-md-6">
                                        <select name="category_id" id="category_id" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-info">
                                            <?php echo $categories_dropdown; ?>
                                          </select>
                                    </div>
                                </div>
                                <!-- end form-group row -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Product Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="product_name" name="product_name" placeholder="Product Name"  class="form-control" required/>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Product Code</label>
                                    <div class="col-md-6">
                                        <input type="text" id="product_code" name="product_code" placeholder="Product Code"  class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Product Color</label>
                                    <div class="col-md-6">
                                        <input type="text" id="product_color" name="product_color" placeholder="Product Color"  class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Discription</label>
                                    <div class="col-md-6">
                                        <textarea cols="40" rows="6" id="description" name="description" placeholder="Description"  class="form-control" /></textarea>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Material and Care</label>
                                    <div class="col-md-6">
                                        <textarea cols="40" rows="6" id="care" name="care" placeholder="Material and Care"  class="form-control" /></textarea>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Sleeve</label>
                                    <div class="col-md-6">
                                        <select name="sleeve" id="sleeve" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-info">
                                            <option value="">Select Sleeve</option>
                                            @foreach($sleeveArray as $sleeve)
                                            <option value="{{ $sleeve }}">{{ $sleeve }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Pattern</label>
                                    <div class="col-md-6">
                                        <select name="pattern" id="pattern" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-info">
                                            <option value="">Select Pattern</option>
                                            @foreach($patternArray as $pattern)
                                            <option value="{{ $pattern }}">{{ $pattern }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Price</label>
                                    <div class="col-md-6">
                                        <input type="text" id="price" name="price" placeholder="Price"  class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Image</label>
                                    <div class="col-md-6" id="uniform-undefined" >
                                         <input type="file" name="image" id="image"/>
                                        </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Video</label>
                                    <div class="col-md-6" id="uniform-undefined" >
                                         <input type="file" size="19" name="video" id="image"/>
                                        </div>
                                </div>
                                <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Enable</label>
                                        <div class="col-md-6">
                                                <input type="checkbox" name="status" class="form-control m-b-10" id="status" value="1" checked>
                                        </div>
                                </div>
                                <div class="jumbotron m-b-0 text-center" style="background-color: transparent">
                                        <input type="submit" value="Add Product" class="btn btn-primary btn-lg">
                            </div>
                            </div>
                            {{-- end personal info --}}
                            <!-- end col-8 -->
                        </div>
                        <!-- end row -->
                </div>
                <!-- end step-1 -->
            </div>
            <!-- end wizard-content -->
        </div>
        <!-- end wizard -->
    </form>
    <!-- end wizard-form -->
</div>
<!-- end #content -->

@endsection
