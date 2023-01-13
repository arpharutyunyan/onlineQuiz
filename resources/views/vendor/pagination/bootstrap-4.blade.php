{{--@if ($paginator->hasPages())--}}
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link link-dark btn-outline-dark" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled link-dark" aria-disabled="true"><span class="page-link bg-dark">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active link-dark" aria-current="page"><span class="page-link bg-dark">{{ $page }}</span></li>
                        @else
                            <li class="page-item link-dark"><a class="page-link link-dark btn-outline-dark" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item link-dark">
                    <a class="page-link link-dark btn-outline-dark" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled link-dark" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link link-dark" aria-hidden="true">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
{{--@endif--}}
