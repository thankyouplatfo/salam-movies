@if ($paginator->hasPages())
    <div class="w3-center w3-padding-32">
        <div class="w3-bar">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <div href="#" class="w3-bar-item w3-button w3-hover-black">«</div>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    class="w3-bar-item w3-button w3-hover-black">«</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <div href="#" class="w3-bar-item w3-black w3-button">{{ $page }}</div>
                        @else
                            <a href="{{ $url }}"
                                class="w3-bar-item w3-button w3-hover-black">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                    class="w3-bar-item w3-button w3-hover-black">»</a>
            @else
                <div href="#" class="w3-bar-item w3-button w3-hover-black">»</div>
            @endif
        </div>
    </div>
@endif