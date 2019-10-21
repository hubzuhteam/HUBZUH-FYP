<?php use App\Product; ?>
<form action="{{ url('/products-filter') }}" method="post">{{ csrf_field() }}
    @if(!empty($url))
	<input name="url" value="{{ $url }}" type="hidden">
	@endif
<div class="left-sidebar" style="padding-top: 6%">
    <h2>Category</h2>
        <div class="panel-group category-products" id="accordian" style="border-color: transparent">
            <!--category-productsr-->
            <div class="panel panel-default">
                @foreach ($categories as $cat)
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            {{$cat->name}}
                        </a>
                    </h4>
                </div>
                <div id="{{$cat->id}}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach ($cat->categories as $subcat)
                            <?php $productCount = Product::productCount($subcat->id); ?>
                            <li><a href="{{url('products/'.$subcat->url)}}">
                                {{$subcat->name}}</a> ({{ $productCount }})</a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    @if(!empty($url))

    <h2>Colors</h2>
    <div class="panel-group">
        @foreach($colorArray as $color)
            @if(!empty($_GET['color']))
                <?php $colorArr = explode('-',$_GET['color']) ?>
				@if(in_array($color,$colorArr))
        		    <?php $colorcheck="checked"; ?>
				@else
				    <?php $colorcheck=""; ?>
				@endif
			@else
			    <?php $colorcheck=""; ?>
			@endif
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <input name="colorFilter[]" id="{{$color}}" value="{{$color}}"
                                onchange="javascript:this.form.submit();"
                                type="checkbox" {{$colorcheck}} >&nbsp;&nbsp;<span class="
                                products-colors">{{$color}}</span>
                        </h4>
                    </div>
                </div>
                @endforeach
    </div>
    <div>&nbsp;</div>

    <h2>Sleeves</h2>
    <div class="panel-group">
        @foreach($sleeveArray as $sleeve)
            @if(!empty($_GET['sleeve']))
                <?php $sleeveArr = explode('-',$_GET['sleeve']) ?>
				@if(in_array($sleeve,$sleeveArr))
        		    <?php $sleevecheck="checked"; ?>
				@else
				    <?php $sleevecheck=""; ?>
				@endif
			@else
			    <?php $sleevecheck=""; ?>
			@endif
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <input name="sleeveFilter[]" id="{{$sleeve}}" value="{{$sleeve}}"
                                onchange="javascript:this.form.submit();"
                                type="checkbox" {{$sleevecheck}} >&nbsp;&nbsp;<span class="
                                products-sleeves">{{$sleeve}}</span>
                        </h4>
                    </div>
                </div>
                @endforeach
    </div>
    <div>&nbsp;</div>

    <h2>Pattern</h2>
    <div class="panel-group">
        @foreach($patternArray as $pattern)
            @if(!empty($_GET['pattern']))
                <?php $patternArr = explode('-',$_GET['pattern']) ?>
				@if(in_array($pattern,$patternArr))
        		    <?php $patterncheck="checked"; ?>
				@else
				    <?php $patterncheck=""; ?>
				@endif
			@else
			    <?php $patterncheck=""; ?>
			@endif
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <input name="patternFilter[]" id="{{$pattern}}" value="{{$pattern}}"
                                onchange="javascript:this.form.submit();"
                                type="checkbox" {{$patterncheck}} >&nbsp;&nbsp;<span class="
                                products-patterns">{{$pattern}}</span>
                        </h4>
                    </div>
                </div>
                @endforeach
    </div>
    <div>&nbsp;</div>

    <h2>Size</h2>
    <div class="panel-group" style="padding-bottom: 5%">
        @foreach($sizesArray as $size)
            @if(!empty($_GET['size']))
                <?php $sizeArr = explode('-',$_GET['size']) ?>
				@if(in_array($size,$sizeArr))
        		    <?php $sizecheck="checked"; ?>
				@else
				    <?php $sizecheck=""; ?>
				@endif
			@else
			    <?php $sizecheck=""; ?>
			@endif
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <input name="sizeFilter[]" id="{{$size}}" value="{{$size}}"
                                onchange="javascript:this.form.submit();"
                                type="checkbox" {{$sizecheck}} >&nbsp;&nbsp;<span class="
                                products-sizes">{{$size}}</span>
                        </h4>
                    </div>
                </div>
                @endforeach
    </div>
    @endif
</div>


                    <!--/category-products-->

                    <!--/brands_products-->

                    {{-- <div class="price-range">
                        <!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div> --}}
                    <!--/price-range-->

                    {{-- <div class="shipping text-center">
                        <!--shipping-->

                        <img src="{{ asset('images/frontend_images/banner/sale3.png') }}" alt="" />
                    </div> --}}
                    <!--/shipping-->

</form>

