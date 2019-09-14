
{{-- Supplier edit product  --}}
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
    <form action="{{ url('supplier/edit-product/'.$productDetails->id) }}" enctype="multipart/form-data" method="POST" name="edit_product" class="form-control-with-bg">{{ csrf_field() }}
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
                                <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Edit Product</legend>
                                <!-- begin form-group row -->
                                <!-- end form-group row -->
                                <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Sleeve</label>
                                        <div class="col-md-6">
                                            <select name="category_id" id="category_id" class="form-control selectpicker" data-size="10"  data-live-search="true" data-style="btn-info">
                                                    <?php echo $categories_drop_down; ?>
                                              </select>
                                        </div>
                                    </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Product Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="product_name" value="{{ $productDetails->product_name }}" name="product_name" placeholder="Product Name"  class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Product Code</label>
                                    <div class="col-md-6">
                                        <input type="text" id="product_code" name="product_code" value="{{ $productDetails->product_code }}" placeholder="Product Code"  class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Product Color</label>
                                    <div class="col-md-6">
                                        <input type="text" id="product_color" name="product_color" value="{{ $productDetails->product_color }}" placeholder="Product Color"  class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Description</label>
                                    <div class="col-md-6">
                                        <textarea cols="40" rows="6" id="description" name="description" placeholder="Description"  class="form-control" />{{ $productDetails->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Material and Care</label>
                                    <div class="col-md-6">
                                        <textarea cols="40" rows="6" id="care" name="care" placeholder="Material and Care" class="form-control" />{{ $productDetails->care }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Sleeve</label>
                                    <div class="col-md-6">
                                        <select name="sleeve" id="sleeve" class="form-control selectpicker" data-size="10"  data-live-search="true" data-style="btn-info">
                                            <option value="">Select Sleeve</option>
                                            @foreach($sleeveArray as $sleeve)
                                                <option value="{{ $sleeve }}" @if(!empty($productDetails->sleeve) && $productDetails->sleeve==$sleeve) selected @endif>{{ $sleeve }}</option>
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
                                            <option value="{{ $pattern }}" @if(!empty($productDetails->pattern) && $productDetails->pattern==$pattern) selected @endif>{{ $pattern }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Price</label>
                                    <div class="col-md-6">
                                        <input type="text" id="price" name="price" placeholder="Price" value="{{ $productDetails->price }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Image</label>
                                    <div class="col-md-6" id="uniform-undefined" >
                                         {{-- <input type="file" name="image" id="image"/> --}}
                                         <div id="uniform-undefined">
                                            <table>
                                              <tr>
                                                <td>
                                                  <input name="image" id="image" type="file">
                                                  @if(!empty($productDetails->image))
                                                    <input type="hidden" name="current_image" value="{{ $productDetails->image }}">
                                                  @endif
                                                </td>
                                                <td>
                                                  @if(!empty($productDetails->image))
                                                    <img style="width:30px;" src="{{ asset('/images/supplierend_images/products/small/'.$productDetails->image) }}"> | <a href="{{ url('/supplier/delete-product-image/'.$productDetails->id) }}">Delete</a>
                                                  @endif
                                                </td>
                                              </tr>
                                            </table>
                                        </div>
                                        </div>

                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Video</label>
                                    <div class="col-md-6" id="uniform-undefined" >
                                        <div id="uniform-undefined">
                                            <input name="video" id="video" type="file">
                                            @if(!empty($productDetails->video))
                                              <input type="hidden" name="current_video" value="{{ $productDetails->video }}">
                                              <a target="_blank" href="{{ url('videos/'.$productDetails->video) }}">View</a> |
                                              <a href="{{ url('/supplier/delete-product-video/'.$productDetails->id) }}">Delete</a>
                                            @endif
                                          </div>
                                        </div>
                                </div>
                                <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Enable</label>
                                        <div class="col-md-6">
                                                <input type="checkbox" name="status" class="form-control m-b-10" id="status" @if($productDetails->status == "1") checked @endif value="1">

                                        </div>
                                </div>
                                <div class="jumbotron m-b-0 text-center" style="background-color: transparent">
                                        <input type="submit" value="Update Product" class="btn btn-primary btn-lg">
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
