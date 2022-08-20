<x-app-layout>
<div class="flex h-auto bg-gray-100 dark:bg-white py-4">
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
                        @isset($appear_date_start)
                            <x-jet-input id="appear_date_start" value="{{ old('appear_date_start', $appear_date_start) }}" class="block mt-1 mr-2 xs:text-xs min:text-xs sm:text-sm md:text-sm lg:text-sm w-full max-w-126" type="date" name="appear_date_start" />
                        @else
                            <x-jet-input id="appear_date_start" value="{{ old('appear_date_start') }}" class="block mt-1 mr-2 xs:text-xs min:text-xs sm:text-sm md:text-sm lg:text-sm w-full max-w-126" type="date" name="appear_date_start" />
                        @endisset
                        <div class="mt-3">～</div>
                        @isset($appear_date_end)
                            <x-jet-input id="appear_date_end" value="{{ old('appear_date_end', $appear_date_end) }}" class="block mt-1 ml-2 xs:text-xs min:text-xs sm:text-sm md:text-sm lg:text-sm w-full max-w-126" type="date" name="appear_date_end" />
                        @else
                            <x-jet-input id="appear_date_end" value="{{ old('appear_date_end') }}" class="block mt-1 ml-2 xs:text-xs min:text-xs sm:text-sm md:text-sm lg:text-sm w-full max-w-126" type="date" name="appear_date_end" />
                        @endisset
                    </div>
                </div>
                <div class="px-2 py-1 w-full">
                    <x-jet-label for="address" value="{{ __('都道府県') }}" />
                    <select id="address" style="width:120px;" class="xs:text-sm min:text-sm sm:text-base block mt-1 w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="address">
                    @foreach(config('address') as $index => $name)
                        @if (!is_null(old('address')))
                            @if ($index == old('address'))
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            @if ($index == $address)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @endif
                    @endforeach
                    </select>
                </div>
                <div class="px-2 py-1 w-full">
                    <x-jet-label for="genre" value="{{ __('ジャンル') }}" />
                    <select id="genre" style="width:180px;" class="xs:text-sm min:text-sm sm:text-base block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="genre">
                    @foreach(config('genre') as $index => $name)
                        @if (!is_null(old('genre')))
                            @if ($index == old('genre'))
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            @if ($index == $genre)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center xs:flex-wrap min:flex-wrap sm:flex-wrap md:flex-wrap lg:flex-nowrap">
                <div class="px-2 py-2">
                        <a id="ad_asc" class="text-sm underline text-gray-700" href="{{ $ad_sort }}asc">
                            出演日昇順
                            <i class="fa fa-sort"></i>
                        </a>
                </div>
                <div class="px-2 py-2">
                        <a id="ad_desc" class="text-sm underline text-gray-700" href="{{ $ad_sort }}desc">
                            出演日降順
                            <i class="fa fa-sort"></i>
                        </a>
                </div>
                <div class="px-2 py-2">
                    <select id="disp_list" name="disp_list" onchange="location.href=value;" class="xs:text-sm min:text-sm sm:text-base border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">選択してください</option>
                        <option value="{{ $disp_list }}5">5</option>
                        <option value="{{ $disp_list }}10">10</option>
                        <option value="{{ $disp_list }}20">20</option>
                        <option value="{{ $disp_list }}30">30</option>
                        <option value="{{ $disp_list }}50">50</option>
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
                <input id="clearBtn" class="text-xs text-gray-600" type="button" value="検索条件をクリア" onclick="clearSearchInfo()" />
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
        <div class="flex items-center">
        {{ $offers->appends(request()->all())->links() }}
        </div>
    </div>
</div>
</x-app-layout>

