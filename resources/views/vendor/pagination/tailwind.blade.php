@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">

        {{-- Tampilan Mobile --}}
        <div class="flex flex-1 justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-bold text-gray-300 bg-white border border-emerald-100 rounded-2xl cursor-default uppercase tracking-wider">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-bold text-emerald-600 bg-white border border-emerald-100 rounded-2xl hover:bg-emerald-50 transition-all shadow-sm uppercase tracking-wider">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-bold text-emerald-600 bg-white border border-emerald-100 rounded-2xl hover:bg-emerald-50 transition-all shadow-sm uppercase tracking-wider">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-bold text-gray-300 bg-white border border-emerald-100 rounded-2xl cursor-default uppercase tracking-wider">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        {{-- Tampilan Desktop --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium">
                    Menampilkan <span class="text-emerald-700 font-bold">{{ $paginator->firstItem() }}</span> - <span class="text-emerald-700 font-bold">{{ $paginator->lastItem() }}</span> dari <span class="text-emerald-700 font-bold">{{ $paginator->total() }}</span> berita
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-2xl overflow-hidden border border-emerald-100">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" class="relative inline-flex items-center px-3 py-2 bg-white text-gray-300 cursor-default">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-3 py-2 bg-white text-emerald-600 hover:bg-emerald-50 transition-colors">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span aria-disabled="true" class="relative inline-flex items-center px-4 py-2 bg-white text-sm font-bold text-gray-400 cursor-default">{{ $element }}</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page" class="relative inline-flex items-center px-4 py-2 bg-emerald-600 text-sm font-black text-white z-10 shadow-inner">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 bg-white text-sm font-bold text-emerald-700 hover:bg-emerald-50 transition-all" aria-label="Halaman {{ $page }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-3 py-2 bg-white text-emerald-600 hover:bg-emerald-50 transition-colors">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </a>
                    @else
                        <span aria-disabled="true" class="relative inline-flex items-center px-3 py-2 bg-white text-gray-300 cursor-default">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
