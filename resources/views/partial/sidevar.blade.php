<div id="sidebar">
    <div class="widget widget_search">
        <form action="{{route('search')}}" method="get" id="searchform" class="form-search">
            <div class="">
                <input type="text" value="" name="search" required id="search" class="highlighted" placeholder="Buscar producto">                
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="widget widget_tags">
        <h3 class="widget-title">Categorias</h3>
        <div class="tagcloud">
            @foreach($categories as $category)
            <a href="{{route('categoria',[$category->category_slug])}}">{{$category->category_name}}</a>
            @endforeach
             <a href="{{url('/novedades')}}">Novedades</a>                                       
        </div>
    </div>
    <div class="widget widget_products">
        <h3 class="widget-title">Top económicos</h3>
        <ul class="product-list-widget">
            @include('partial.list_small',[$products])
        </ul>
    </div>
</div>