@if(\Route::current()->getName() === 'home')
    @foreach($mas_apartados as $product)
    <li class="product">
        <div class="product-thumb-wrap">
            <div class="product-thumb">
                {{$product->slug}}
                <a href="{{route('product',[$product->category,$product->slug])}}">
                    <img src="{{url('/segade/img/'.$product->img)}}" alt="">
                </a>
            </div>
        </div>
        <div class="product-info">
            <a href="shop-detail.html">
                <h3 class="os-font  fw-600">{{$product->title}}</h3>
            </a>
        </div>
        <div class="os-font price  fw-600">$&nbsp;{{number_format($product->price,2)}}</div>
    </li>
    @endforeach

@else

    @foreach($mas_apartados as $product)
    <li>
        <a href="{{route('product',[$product->category,$product->slug])}}" class="dark-color">
            <img src="{{url('/segade/img/'.$product->img)}}" alt="{{$product->title}}">
            <span class="product-title">{{$product->title}}</span>
        </a>
        <div class="price">
            $&nbsp;{{number_format($product->price,2)}}
        </div>
    </li>
    @endforeach

@endif
