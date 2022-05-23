@if ($paginator->hasPages())
<div class="row mt-5">
    <div class="col text-center">
        <div class="block-27">
            <ul>
                @if ($paginator->onFirstPage())
                    <li class="disabled">
                        <span>&lt;</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}">&lt;</a>
                    </li>
                @endif
                @foreach ($elements as $e)
                    @if (is_string($e))
                        <li class="disabled"><span>{{ $e }}</span></li>
                    @endif

                    @if (is_array($e))
                        @foreach ($e as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active"><span>{{ $page }}</span></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageurl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
               
                
                @endif
            </ul>
        </div>
    </div>
</div>
    
@endif