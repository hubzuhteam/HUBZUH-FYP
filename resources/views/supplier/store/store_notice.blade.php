
{{-- Supplier Dashboard  --}}
@section('content')
@extends('layouts.supplierLayout.supplier_design')

{{--  /view_store/'.$supplierDetails->id  --}}

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<div id="content" class="content">
            <div align="center">
            <h1 style="text-align: center; color: cadetblue; margin-top: 15%; margin-bottom: 2%"><Strong>This is what your store looks like to Your Customers.</Strong></h1>
            <a style="width: 150px; height: 40px; align-self: center" href="{{ url('/view_store/'.$supplierDetails->id) }}"
                class="btn btn-success btn-large">View Store</a>
            </div>
        </div>
</div>

@endsection