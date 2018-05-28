@if ($paginator->hasPages())
<div class="paginate mt-3 mb-6">
    <div class="paginate_links">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="prev page-numbers">
                <i class="fa fa-caret-left"></i>
            </span>                        
        @else
            <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}">
                <i class="fa fa-caret-left"></i>
            </a>
        @endif

        @foreach ($elements as $element)
            

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-numbers current">{{$page}}</span>
                    @else
                        <a class="page-numbers" href="{{ $url }}">{{$page}}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="next page-numbers" href="#">
                <i class="fa fa-caret-right"></i>
            </a>
        @else
            <span class="next page-numbers" >
                <i class="fa fa-caret-right"></i>
            </span>
        @endif
    </div>
</div>
@endif