@foreach($products as $product)
<li class="product col-sm-6 col-md-4">
    <div class="product-thumb-wrap">
        @if(date('d-m-Y')==$product->updated_at->format('d-m-Y'))
        <span class="onsale">nuevo!</span>
        @endif
        <div class="product-thumb">
            <a href="{{route('product',[$product->category_slug,$product->slug])}}">
                <img src='{{$product->img}}' alt="">
            </a>
            <a href="{{route('product',[$product->category_slug,$product->slug])}}" class="product-add-cart">
                <span class="pull-left">Añadir a la cesta</span>
                <i class="pull-right fa fa-shopping-cart"></i>
            </a>
        </div>
    </div>
    <div class="product-info">
        <a href="{{route('product',[$product->category_slug,$product->slug])}}">
            <div class="fw-600" title="{{$product->title}}">{{str_limit($product->title,55)}}</div>
        </a>
        <div class="product-cate">
            <a href="{{route('product',[$product->category_slug]) }}">{{$product->category_name}}</a>
            <div class="price  fw-600">${{number_format($product->price,2)}}</div>
        </div>
    </div>
    
</li>
@endforeach       