<ul class="product-list">
    @foreach($products as $product)
 <li class="product ">
    <div class="product-thumb-wrap">
        <div class="product-thumb">            
            <a href="{{route('product',[$product->category_slug,$product->slug])}}">
                <img src="{{$product->img}}" alt="">
            </a>
        </div>
    </div>
    <div class="product-info">
        <a href="{{route('product',[$product->category_slug,$product->slug])}}">
            <h3 class="os-font  fw-600">{{$product->title}}</h3>
        </a>
        <div class="os-font price  fw-600">€{{number_format($product->price,2)}}</div>
    </div>
    
</li>
@endforeach                    
</ul>