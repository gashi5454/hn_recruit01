<x-app-layout>
<div class="relative flex h-auto bg-gray-100 dark:bg-white py-4">
    <div class="pt-2 pb-6 mx-auto xs:px-0 min:px-2 sm:px-4 md:px-6 lg:px-6">

    <form action="{{ url('/search')}}" method="get">
    {{ csrf_field()}}
    {{method_field('post')}}
        <div class="mx-auto w-full bg-white p-1 dark:bg-gray-100 overflow-hidden shadow">
            <div class="flex items-center xs:flex-wrap min:flex-wrap sm:flex-wrap md:flex-wrap lg:flex-nowrap">
                <div class="px-2 py-1 w-full">
                    <x-jet-label for="keyword" value="{{ __('フリーワード') }}" />
                    @isset($keyword)
                        <x-jet-input id="keyword" value="{{ old('keyword', $keyword) }}" class="mt-1 text-sm w-full min-w-200" placeholder="キーワードを入力" type="text" name="keyword" />
                    @else
                        <x-jet-input id="keyword" value="{{ old('keyword') }}" class="mt-1 text-sm w-full min-w-200" placeholder="キーワードを入力" type="text" name="keyword" />
                    @endisset
                </div>
                <div class="px-2 py-1 w-full">
                    <x-jet-label for="appear_date" value="{{ __('出演日') }}" />
                    <div class="flex">
                        <x-jet-input id="appear_date_start" class="block mt-1 mr-2 xs:text-xs min:text-xs sm:text-sm md:text-sm lg:text-sm w-full max-w-126" type="date" name="appear_date_start" />
                        <div class="mt-3">～</div>
                        <x-jet-input id="appear_date_end" class="block mt-1 ml-2 xs:text-xs min:text-xs sm:text-sm md:text-sm lg:text-sm w-full max-w-126" type="date" name="appear_date_end" />
                    </div>
                </div>
                <div class="px-2 py-1 w-full">
                    <x-jet-label for="address" value="{{ __('都道府県') }}" />
                    <select id="address" style="width:120px;" class="xs:text-sm min:text-sm sm:text-base block mt-1 w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="address">
                        <option selected value="">選択</option>
                        @foreach(config('address') as $index => $name)
                        <option value="{{ $index }}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="px-2 py-1 w-full">
                    <x-jet-label for="genre" value="{{ __('ジャンル') }}" />
                    <select id="genre" style="width:180px;" class="xs:text-sm min:text-sm sm:text-base block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="genre">
                        <option selected value="">選択</option>
                        @foreach(config('genre') as $index => $name)
                        <option value="{{ $index }}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center xs:flex-wrap min:flex-wrap sm:flex-wrap md:flex-wrap lg:flex-nowrap">
                <div class="px-2 py-2">
                    <x-jet-button class="text-sm">
                        <a id="ad_asc" href="{{ $adSort_asc }}">
                            出演日昇順
                            <i class="fa fa-sort"></i>
                        </a>
                    </x-jet-button>
                </div>
                <div class="px-2 py-2">
                    <x-jet-button class="text-sm">
                        <a id="ad_desc" href="{{ $adSort_desc }}">
                            出演日降順
                            <i class="fa fa-sort"></i>
                        </a>
                    </x-jet-button>
                </div>
                <div class="px-2 py-2">
                    <select id="disp_list" name="disp_list" onchange="submit();">
                        <option value="">選択してください</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>

            <div class="py-4">
                <div class="border-t border-gray-200"></div>
            </div>

            <div class="flex items-center justify-center pb-4">
                <x-jet-button class="text-base">
                    {{ __('検索') }}
                </x-jet-button>
            </div>
        </div>
    </form>

        <p class="xs:text-lg min:text-lg sm:text-xl md:text-xl lg:text-xl flex justify-center mt-12 mb-4 dark:text-gray-900">
        @if($counts > 0)
            {{ $message }}
        @else
            募集情報は見つかりませんでした
        @endif

        <x-jet-section-border />

        @isset($offers)
        @foreach($offers as $offer)
        <div class="w-full p-2 my-8 bg-white dark:bg-gray-100 overflow-hidden shadow min:rounded-lg">
            <div class="xs:p-2 min:p-2 sm:p-2 md:p-4 lg:p-4 line-break">
                <div class="flex items-center xs:flex-wrap min:flex-wrap">

                <?php
                    $date = $offer->appear_date;
                    $datetime = new DateTime($date);
                    $week = array("日", "月", "火", "水", "木", "金", "土");
                    $w = (int)$datetime->format('w');
                ?>

                    <div class="ml-4 mb-4 text-lg xs:text-sm min:text-sm sm:text-base leading-7 font-semibold">
                        {{ $offer->appear_date }} ( {{ $week[$w] }} )
                    </div>
                    <div class="ml-4 mb-4 text-lg xs:text-sm min:text-sm sm:text-base leading-7 font-semibold">
                        {{ $offer->title }}
                    </div>
                </div>

                <div class="ml-4">
                    <div class="mt-3 text-gray-900 dark:text-gray-900 xs:text-xs min:text-xs sm:text-sm">
                    {{ $offer->genre }}
                    </div>
                </div>

                <div class="ml-4">
                    <div class="mt-3 text-gray-900 dark:text-gray-900 xs:text-xs min:text-xs sm:text-sm">
                    {{ $offer->place }}
                    </div>
                </div>

                <div class="sm:block">
                    <div class="pt-2 pb-4">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mr-4 flex sm:justify-end min:justify-center xs:justify-center">
                    <x-jet-button class="xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">
                        <a href="{{ route('detail' , ['id' => $offer->id]) }} " class="no-underline">
                            {{ __('詳細を見る') }}
                        </a>
                    </x-jet-button>
                </div>
            </div>
        </div>
        @endforeach
        @endisset
        <div class="flex items-center hidden">
        {{ $offers->appends(request()->input())->links() }}
        </div>


        <div class="flex items-center">
        @if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
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
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    件中
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    件 ~
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    件 を表示
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
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
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5" aria-hidden="true">
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

        </div>


    </div>
</div>
</x-app-layout>

