@foreach($products as $product)
<li class="product col-sm-6 col-md-4">
    <div class="product-thumb-wrap">
        @if(date('d-m-Y')==$product->updated_at->format('d-m-Y'))
        <span class="onsale">hoy!</span>
        @endif
        <div class="product-thumb">
            <a href="{{route('product',[$product->category_slug,$product->slug])}}">
                <img src='{{url("/segade/img/".$product->img)}}' style="height:260px;" alt="">
            </a>
            <a href="{{route('product',[$product->category_slug,$product->slug])}}" class="product-add-cart">
                <span class="pull-left">Añadir a la cesta</span>
                <i class="pull-right fa fa-shopping-cart"></i>
            </a>
        </div>
    </div>
    <div class="product-info">
        <a href="{{route('product',[$product->category_slug,$product->slug])}}">
            <h3 class="fw-600" title="{{$product->title}}">{{str_limit($product->title,25)}}</h3>
        </a>
        <div class="product-cate">
            <a href="{{route('product',[$product->category_slug]) }}">{{$product->category_name}}</a>
        </div>
    </div>
    <div class="price  fw-600">$&nbsp;{{$product->price}}</div>
</li>
@endforeach       