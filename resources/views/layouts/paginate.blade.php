<div class="flex justify-center mt-8">
    <ul class="pagination flex"> 
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <span class="relative block py-2 px-3 leading-tight text-gray-900 mr-2 cursor-not-allowed"
                    aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </span>
            </li>
        @else
            <li>
                <a class="relative block py-2 px-3 leading-tight pagination-link text-blue-500 cursor-pointer mr-2" data-page="{{ $paginator->currentPage() - 1 }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><span
                        class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-gray-500 mr-2 cursor-not-allowed">{{ $element }}</span>
                </li>
            @endif

            @if ($paginator->lastPage() > 1)
            @if ($paginator->currentPage() != 1)
                <li>
                    <a class="relative block pagination-link py-2 px-3 leading-tight cursor-pointer bg-white border rounded-md border-gray-300 text-blue-500 hover:bg-gray-200 mr-2" data-page="1">First Page</a>
                </li>
            @endif
        @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span
                                class="relative block py-2 px-3 leading-tight cursor-pointer rounded-md bg-blue-500 text-white mr-2">{{ $page }}</span>
                        </li>
                    @else
                        <li><a class="relative block py-2 px-3 pagination-link leading-tight cursor-pointer bg-white border rounded-md border-gray-300 text-blue-500 hover:bg-gray-200 mr-2"
                                 data-page="{{$page}}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->lastPage() > 1)
        @if ($paginator->currentPage() != $paginator->lastPage())
            <li><a class="relative block py-2 px-3 pagination-link leading-tight cursor-pointer bg-white border rounded-md border-gray-300 text-blue-500 hover:bg-gray-200 mr-2"
                     data-page="{{$paginator->lastPage()}}">Last Page</a></li>
        @endif
    @endif


        @if ($paginator->hasMorePages())
            <li>
                <a class="relative block py-2 px-3 pagination-link leading-tight text-blue-500 cursor-pointer hover:bg-gray-200 ml-2"
                     data-page="{{$paginator->currentPage() + 1}}"  aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @else
            <li class="disabled">
                <span class="relative block py-2 px-3 leading-tight text-gray-900 ml-2 cursor-not-allowed"
                    aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </span>
            </li>
        @endif
       

    </ul>
</div>
