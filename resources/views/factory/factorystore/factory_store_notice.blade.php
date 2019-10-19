
{{-- Factory Dashboard  --}}
@section('content')
@extends('layouts.factoryLayout.factory_design')

<main class="admin-main">
		<div id="content" class="content">
            <div align="center">
            <h1 style="text-align: center; color: cornflowerblue; margin-top: 15%; margin-bottom: 2%"><Strong>This is what your Factory store looks like to Your Customers.</Strong></h1>
            <a target="_black" style="width: 150px; height: 35px; align-self: center" href="{{ url('/view_factory/'.$factoryDetails->id) }}"
                class="btn btn-primary btn-large">View Store</a>
            </div>
</div>
</main>
@endsection
