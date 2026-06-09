@if ($paginator->hasPages())
    <div class="page-nav-wrap text-center">
        <ul class="list-unstyled mb-0">
            {{-- Previous --}}
            <li class="d-inline-block">
                @if ($paginator->onFirstPage())
                    <span class="page-numbers opacity-50" aria-disabled="true" title="@lang('pagination.previous')">
                        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                    </span>
                @else
                    <a class="page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev" title="@lang('pagination.previous')">
                        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                    </a>
                @endif
            </li>

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="d-inline-block">
                        <span class="page-numbers page-numbers--ellipsis">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="d-inline-block">
                            @if ($page == $paginator->currentPage())
                                <span class="page-numbers active" aria-current="page">{{ $page }}</span>
                            @else
                                <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            <li class="d-inline-block">
                @if ($paginator->hasMorePages())
                    <a class="page-numbers style-2" href="{{ $paginator->nextPageUrl() }}" rel="next" title="@lang('pagination.next')">
                        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                    </a>
                @else
                    <span class="page-numbers style-2 opacity-50" aria-disabled="true" title="@lang('pagination.next')">
                        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                    </span>
                @endif
            </li>
        </ul>
    </div>
@endif
