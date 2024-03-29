{{-- Factory ADD COLOUR --}}
@section('content')
@extends('layouts.factoryLayout.factory_design')

<main class="admin-main">

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ url('/factory/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/factory/view-products') }}">View Products</a></li>
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
    <form action="{{ url('/factory/add-colours/'.$productDetails->id) }}" enctype="multipart/form-data" method="POST" name="add_colour" id="add_colour" class="form-control-with-bg">{{ csrf_field() }}
        <!-- begin wizard -->
        <input type="hidden" name="product_id" value={{$productDetails->id}}>

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
                                <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Add Colours</legend>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Product Name</label>
                                    <div class="col-md-6">
                                        <strong class="form-control">{{ $productDetails->product_name }}</strong>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Product Code</label>
                                    <div class="col-md-6">
                                            <strong class="form-control">{{ $productDetails->product_code }}</strong>
                                    </div>
                                </div>
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Product Color</label>
                                    <div class="col-md-6">
                                            <strong class="form-control">{{ $productDetails->product_color }}</strong>
                                    </div>
                                </div>
                                <div class="control-group">
                                        <label class="control-label"></label>
                                         <div class="field_wrapper" >
                                             <div>
                                                 <input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 140px;height: 30px" required/>
                                                 <input type="text" name="colour[]" id="colour" placeholder="Colour" style="width: 140px;height: 30px" required/>
                                                 <input type="text" name="price[]" id="price" placeholder="Price" style="width: 140px;height: 30px" required/>
                                                 <input type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 140px;height: 30px" required/>
                                             <a href="javascript:void(0);" class="add_button_color" title="Add field">Add</a>
                                             </div>
                                             </div>
                                </div>
                                <div class="jumbotron m-b-0 text-center" style="background-color: transparent">
                                        <input type="submit" value="Add Colours" class="btn btn-primary btn-lg">
                            </div>
                            <div class="alert alert-error alert-block alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Attributes having low quantity are in Red</strong>
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

    <div class="container  pull-up" style="margin-top: -1%">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive p-t-10">
                                    <form action="{{ url('/factory/edit-colour/'.$productDetails->id) }}" method="post">{{csrf_field()}}
                                <table id="example" class="table   " style="width:100%">
                                        <thead>
                                                <tr>
                                                    <th class="text-nowrap">Colour ID</th>
                                                    <th class="text-nowrap">SKU</th>
                                                    <th class="text-nowrap">Colour</th>
                                                    <th class="text-nowrap">Price</th>
                                                    <th class="text-nowrap">Stock</th>
                                                    <th class="text-nowrap">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($productDetails['colours'] as $colour)
                                                    @if ($colour->stock<=5)
                                                    <tr class="gradeX alert-danger" >
                                                      <td><input type="hidden" name="idAttr[]" value="{{ $colour->id }}">{{ $colour->id }}</td>
                                                      <td>{{ $colour->sku }}</td>
                                                      <td>{{ $colour->colour }}</td>
                                                      <td><input type="text"  name="price[]" value="{{ $colour->price }}"></td>
                                                      <td><input type="text" name="stock[]" value="{{ $colour->stock }}"></td>
                                                      <td class="center">
                                                          <input type="submit" value="Update" class="btn btn-info btn-mini">
                                                        <a id="delProduct"
                                                         href="{{ url('/factory/delete-colour/'.$colour->id) }}"
                                                        class="btn btn-warning btn-mini deleteRecord">Delete</a>
                                                    </td>
                                                    </tr>
                                                    @else
                                                    <tr class="gradeX" >
                                                            <td><input type="hidden" name="idAttr[]" value="{{ $colour->id }}">{{ $colour->id }}</td>
                                                            <td>{{ $colour->sku }}</td>
                                                            <td>{{ $colour->colour }}</td>
                                                            <td><input type="text"  name="price[]" value="{{ $colour->price }}"></td>
                                                            <td><input type="text" name="stock[]" value="{{ $colour->stock }}"></td>
                                                            <td class="center">
                                                                <input type="submit" value="Update" class="btn btn-info btn-mini">
                                                              <a id="delProduct"
                                                               href="{{ url('/factory/delete-colour/'.$colour->id) }}"
                                                              class="btn btn-warning btn-mini deleteRecord">Delete</a>
                                                          </td>
                                                          </tr>
                                                    @endif
                                                    @endforeach
                                            </tbody>
                                    <tfoot>
                                            <tr>
                                                    <th class="text-nowrap">Colour ID</th>
                                                    <th class="text-nowrap">SKU</th>
                                                    <th class="text-nowrap">Colour</th>
                                                    <th class="text-nowrap">Price</th>
                                                    <th class="text-nowrap">Stock</th>
                                                    <th class="text-nowrap">Actions</th>
                                                </tr>
                                    </tfoot>
                                </table>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- end #content -->
</form>
<!-- end wizard-form -->

</main>

@endsection
