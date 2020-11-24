@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium dark:text-gray-400 dark:border-transparent dark:bg-gray-300 text-blue-300 bg-white border border-blue-300 cursor-default leading-5 rounded-md">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium dark:bg-gray-400 dark:hover:bg-gray-600 dark:text-gray-900 dark:border-transparent dark:hover:text-white dark:focus:bg-gray-600 dark:active:bg-gray-600 hover:text-white hover:bg-blue-500 text-blue-700 bg-white border border-blue-500 hover:border-transparent leading-5 rounded-md focus:outline-none focus:shadow-outline-blue  focus:bg-blue-500 focus:shadow-outline-blue active:bg-blue-500 active:text-white transition ease-in-out duration-150">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium dark:bg-gray-400 dark:hover:bg-gray-600 dark:text-gray-900 dark:border-transparent dark:hover:text-white dark:focus:bg-gray-600 dark:active:bg-gray-600 hover:text-white hover:bg-blue-500 text-blue-700 bg-white border border-blue-500 hover:border-transparent leading-5 rounded-md focus:outline-none focus:shadow-outline-blue  focus:bg-blue-500 focus:shadow-outline-blue active:bg-blue-500 active:text-white transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium dark:text-gray-400 dark:border-transparent dark:bg-gray-300 text-blue-700 bg-white border border-blue-500 cursor-default leading-5 rounded-md">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 dark:text-gray-200 leading-5">
                    {!! __('Mostrando de') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('até') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('de') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('resultados') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium dark:text-gray-400 dark:border-transparent dark:bg-gray-300 text-blue-300 bg-white border border-blue-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium dark:bg-gray-400 dark:hover:bg-gray-600 dark:text-gray-900 dark:border-transparent dark:hover:text-white dark:focus:bg-gray-600 dark:active:bg-gray-600 text-blue-500 bg-white border border-blue-400 hover:text-white hover:bg-blue-500  rounded-l-md leading-5 focus:z-10 focus:outline-none focus:bg-blue-500 focus:shadow-outline-blue active:bg-blue-500 active:text-white transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium dark:bg-gray-600 dark:text-white dark:border-transparent text-blue-500 bg-white border border-blue-500 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium dark:text-gray-400 dark:border-transparent dark:bg-gray-300 text-blue-300 bg-white border border-blue-300 cursor-default leading-5">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium dark:bg-gray-400 dark:hover:bg-gray-600 dark:text-gray-900 dark:border-transparent dark:hover:text-white dark:focus:bg-gray-600 dark:active:bg-gray-600 hover:bg-blue-500 text-blue-700 bg-white border border-blue-500 hover:border-transparent leading-5 focus:z-10 focus:outline-none focus:bg-blue-500 focus:shadow-outline-blue active:bg-blue-500 active:text-white transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium dark:bg-gray-400 dark:hover:bg-gray-600 dark:text-gray-900 dark:border-transparent dark:focus:bg-gray-600 dark:active:bg-gray-600 dark:hover:text-white hover:bg-blue-500 text-blue-700 bg-white border border-blue-500 hover:border-transparent rounded-r-md leading-5 focus:z-10 focus:outline-none focus:bg-blue-500 focus:shadow-outline-blue active:bg-blue-500 active:text-white transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium dark:text-gray-400 dark:border-transparent dark:bg-gray-300 text-blue-300 bg-white border border-blue-300 cursor-default rounded-r-md leading-5" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
