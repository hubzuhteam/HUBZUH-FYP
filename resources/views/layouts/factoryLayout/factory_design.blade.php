<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="author"/>
<meta content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons" name="description"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="website"/>
<meta property="og:title"
      content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons"/>
<meta property="og:description"
      content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons"/>
<meta property="og:image"
      content="../../cdn.dribbble.com/users/180706/screenshots/5424805/the_sceens_-_mobile_perspective_mockup_3_-_by_tranmautritam.jpg"/>
<meta property="og:site_name" content="atlas "/>
<title>HUBZUH Factory Site</title>
<link rel="icon" type="image/x-icon" href="assets/img/logo.png"/>
<link rel="icon" href="assets/img/logo.png" type="image/png" sizes="16x16">
<link rel='stylesheet' href="{{ asset('/factory/d33wubrfki0l68.cloudfront.net/css/478ccdc1892151837f9e7163badb055b8a1833a5/crisp/assets/vendor/pace/pace.css') }}"/>
{{--  <link rel='stylesheet' href='../factory/d33wubrfki0l68.cloudfront.net/css/478ccdc1892151837f9e7163badb055b8a1833a5/crisp/assets/vendor/pace/pace.css'/>  --}}
<script src="{{ asset('/factory/d33wubrfki0l68.cloudfront.net/js/3d1965f9e8e63c62b671967aafcad6603deec90c/js/pace.min.js') }}"></script>
<!--vendors-->
<link rel='stylesheet' type='text/css' href='../factory/d33wubrfki0l68.cloudfront.net/bundles/291bbeead57f19651f311362abe809b67adc3fb5.css') }}"/>

<link rel='stylesheet' href='../factory/d33wubrfki0l68.cloudfront.net/bundles/30bc673ce76f73ecf02568498f6b139269f6e4c7.css') }}"/>



<link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
<link rel='stylesheet' href="{{ asset('/factory/d33wubrfki0l68.cloudfront.net/css/04cc97dcdd1c8f6e5b9420845f0fac26b54dab84/default/assets/fonts/jost/jost.css') }}"/>
<!--Material Icons-->
<link rel='stylesheet' type='text/css' href="{{ asset('/factory/d33wubrfki0l68.cloudfront.net/css/548117a22d5d22545a0ab2dddf8940a2e32c04ed/default/assets/fonts/materialdesignicons/materialdesignicons.min.css') }}"/>
<!--Bootstrap + atmos Admin CSS-->
<link rel='stylesheet' type='text/css' href="{{ asset('/factory/d33wubrfki0l68.cloudfront.net/css/ed18bd005cf8b05f329fad0688d122e0515499ff/default/assets/css/atmos.min.css') }}"/>
<!-- Additional library for page -->
<!-- Additional library for page -->
    <link rel='stylesheet' href="{{ asset('/factory/d33wubrfki0l68.cloudfront.net/bundles/13fc3abb600e389b43865b1fa1697fc8f5ebf063.css') }}"/>


	{{--  <link href="{{ asset('css/factoryend_css/default/style.min.css')}}" rel="stylesheet" />     --}}

</head>

<body class="sidebar-pinned page-home">
    
@include('layouts.factoryLayout.factory_header')

@include('layouts.factoryLayout.factory_sidebar')

@yield('content');

@include('layouts.factoryLayout.factory_footer')

<script src="{{ asset('/factory/d33wubrfki0l68.cloudfront.net/bundles/9556cd6744b0b19628598270bd385082cda6a269.js') }}"></script>
<script src="{{ asset('/factory/d33wubrfki0l68.cloudfront.net/js/c36248babf70a3c7ad1dcd98d4250fa60842eea9/crisp/assets/vendor/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('/factory/d33wubrfki0l68.cloudfront.net/js/67749b6d46cf093e415d8107068c3c3ed64dc78e/default/assets/js/dashboard-01.js') }}"></script>
<script src="{{ asset('/factory/d33wubrfki0l68.cloudfront.net/bundles/ba78fede76f682cd388ed2abbfd1e1568e76f8a4.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="controls field_wrapper" style="margin-left:0px;margin-top:10px"><input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 140px;height: 30px"/>&nbsp;<input type="text" name="size[]" id="size" placeholder="Size" style="width: 140px;height: 30px"/>&nbsp;<input type="text" name="price[]" id="price" placeholder="Price" style="width: 140px;height: 30px"/>&nbsp;<input type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 140px;height: 30px"/><a href="javascript:void(0);" class="remove_button" title="Remove field">Remove</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1
        $(addButton).click(function() { //Once add button is clicked
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
        $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });        
</script>


<script src="{{ asset('js/supplierend_js/demo/login-v2.demo.min.js')}}"></script>
<script src="{{ asset('js/supplierend_js/demo/login-v2.demo.js')}}"></script>

</body>

</html>