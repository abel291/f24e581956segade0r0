<div id="sidebar">
    <div class="widget widget_search">
        <form action="{{route('search')}}" method="get" id="searchform" class="form-search">
            <div class="">
                <input type="text" value="" name="search" required id="search" class="highlighted" placeholder="Search this website...">                
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="widget widget_tags">
        <h3 class="widget-title">Tag categorias</h3>
        <div class="tagcloud">
            <a href="{{route('product',['anillos'])}}">anillos</a>
            <a href="{{route('product',['pulseras'])}}">pulseras</a>
            <a href="{{route('product',['collares'])}}">collares</a>
            <a href="{{route('product',['cadenas'])}}">cadenas</a>
            <a href="{{route('product',['colgantes'])}}">colgantes</a>
            <a href="{{route('product',['pendientes'])}}">pendientes</a>
            <a href="{{route('product',['joyas'])}}">joyas</a>                                           
        </div>
    </div>
    <div class="widget widget_products">
        <h3 class="widget-title">Top mas apartados</h3>
        <ul class="product-list-widget">
            @include('partial.mas_apartados',[$mas_apartados])
        </ul>
    </div>
</div>