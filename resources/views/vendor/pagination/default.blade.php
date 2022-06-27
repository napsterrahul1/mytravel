@if ($paginator->hasPages())
    <nav>
        <ul class="list-pagination-1 pagination border border-color-4 rounded-sm overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2 mb-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link border-right rounded-0 text-gray-5" aria-label="Previous">
                        <i class="flaticon-left-direction-arrow font-size-10 font-weight-bold"></i>
                        <span class="sr-only">@lang('pagination.previous')</span>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link border-right rounded-0 text-gray-5" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                        <i class="flaticon-left-direction-arrow font-size-10 font-weight-bold"></i>
                        <span class="sr-only">@lang('pagination.previous')</span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><a class="page-link font-size-14" href="#">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link font-size-14 active" href="#">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link font-size-14" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link border-left rounded-0 text-gray-5" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                        <i class="flaticon-right-thin-chevron font-size-10 font-weight-bold"></i>
                        <span class="sr-only">@lang('pagination.next')</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="page-link border-left rounded-0 text-gray-5" href="#" aria-label="Next">
                        <i class="flaticon-right-thin-chevron font-size-10 font-weight-bold"></i>
                        <span class="sr-only">@lang('pagination.next')</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
