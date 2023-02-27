@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-content-between">
        <div class="d-flex justify-content-between">
            <div class="col-sm-auto col-md-auto col-lg-3">
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Showing') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div class="col-md-12 col-lg-9 text-right d-flex justify-content-end" id="number-pagination">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif
        
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)        
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @if ( count($element) < 5)
                                @for($x = 1; $x <= count($element); $x++)
                                    <li class="page-item {{$paginator->currentPage()== $x ?'active':''}}"><a class="page-link" href="{{ $element[$x] }}">{{ $x }}</a></li>
                                @endfor
                            @else
                                @if ( count($element) <=5)
                                    @for($x = 1; $x < count($element); $x++)
                                        <li class="page-item {{$paginator->currentPage()== $x ?'active':''}}"><a class="page-link" href="{{ $element[$paginator->currentPage()] }}">{{ $paginator->currentPage() }}</a></li>
                                    @endfor
                                @else
                                    @if($paginator->currentPage() > 3)
                                        <li class="page-item {{$paginator->currentPage() == 1 ?'active':''}}"><a class="page-link" href="{{ $element[1] }}">{{ 1 }}</a></li>
                                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                                    @endif
                                    
                                    @if($paginator->currentPage() <= 3)
                                        @for ($x = 1; $x < 5; $x++)
                                            <li class="page-item {{$paginator->currentPage()== $x ?'active':''}}"><a class="page-link" href="{{ $element[$x] }}">{{ $x }}</a></li>
                                        @endfor
                                    @else
                                        @php($diff = count($element) - $paginator->currentPage())
                                        @if($diff < 4)
                                            @for ($x = ($paginator->currentPage() - (5- $diff)); $x < ($paginator->currentPage() + $diff); $x++)
                                                <li class="page-item {{$paginator->currentPage()== $x+1 ?'active':''}}"><a class="page-link" href="{{ $element[$x+1] }}">{{ $x+1 }}</a></li>
                                            @endfor
                                        @else
                                            @for($x = ($paginator->currentPage() - 3); $x < ($paginator->currentPage() + 2); $x++)
                                                <li class="page-item {{$paginator->currentPage()== $x+1 ?'active':''}}"><a class="page-link" href="{{ $element[$x+1] }}">{{ $x+1 }}</a></li>
                                            @endfor
                                        @endif
                                    @endif
                                        
                                    @if ($paginator->currentPage() < count($element) - 3)
                                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                                        <li class="page-item {{$paginator->currentPage() == count($element) ?'active':''}}"><a class="page-link" href="{{ $element[count($element)] }}">{{ count($element) }}</a></li>
                                    @endif
                                @endif
                            @endif
                        @endif
                    @endforeach
        
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- <div class="flex justify-between flex-1 col-md-8 text-right" id="prev-next-pagination">
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {!! __('pagination.previous') !!}
                    </a>
                @endif
    
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {!! __('pagination.next') !!}
                    </a>
                @else
                    <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </div> -->
        </div>
    </nav>
@endif