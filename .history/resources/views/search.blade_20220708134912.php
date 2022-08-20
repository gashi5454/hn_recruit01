<x-app-layout>
<div class="flex h-auto bg-white py-4">
    <div class="pt-2 pb-6 mx-auto xs:px-2 min:px-2 sm:px-4 md:px-6 lg:px-6">

    <form action="{{ url('/search')}}" method="get">
    {{ csrf_field()}}
    {{method_field('post')}}
        <div x-data="{isShow:false}" class="mx-auto w-full max-w-760 border-01 shadow p-1 overflow-hidden">
            <div class="xs:px-2 min:px-2 sm:px-6 md:px-6 lg:px-6 py-2 mt-2 flex items-center">
                @isset($keyword)
                    <x-jet-input id="keyword" value="{{ old('keyword', $keyword) }}" class="text-sm w-full min-w-200" placeholder="キーワードを入力" type="text" name="keyword" />
                @else
                    <x-jet-input id="keyword" value="{{ old('keyword') }}" class="text-sm w-full min-w-200" placeholder="キーワードを入力" type="text" name="keyword" />
                @endisset
                <button style="height:38px; min-width:60.5px; max-width:61px;" @click="isShow= !isShow" type="button" class="text-sm ml-1 w-full inline-flex items-center px-4 py-1 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
                        {{ __('絞込') }}
                </button>
            </div>
            <div x-show="isShow" class="flex items-center flex-wrap" x-cloak>
                <!--<div class="xs:px-2 min:px-2 sm:px-6 md:px-6 lg:px-6 py-2 w-full">
                    <x-jet-label for="appear_date" value="{{ __('出演日') }}" />
                    <div class="flex">
                        @isset($appear_date_start)
                            <x-jet-input id="appear_date_start" value="{{ old('appear_date_start', $appear_date_start) }}" class="block mt-1 mr-2 w-full xs:text-xs xs:max-w-120 min:text-xs min:max-w-120 sm:text-sm sm:max-w-130 md:text-sm md:max-w-130 lg:text-sm lg:max-w-130" type="date" name="appear_date_start" />
                        @else
                            <x-jet-input id="appear_date_start" value="{{ old('appear_date_start') }}" class="block mt-1 mr-2 w-full xs:text-xs xs:max-w-120 min:text-xs min:max-w-120 sm:text-sm sm:max-w-130 md:text-sm md:max-w-130 lg:text-sm lg:max-w-130" type="date" name="appear_date_start" />
                        @endisset
                        <div class="mt-3">～</div>
                        @isset($appear_date_end)
                            <x-jet-input id="appear_date_end" value="{{ old('appear_date_end', $appear_date_end) }}" class="block mt-1 ml-2 w-full xs:text-xs xs:max-w-120 min:text-xs min:max-w-120 sm:text-sm sm:max-w-130 md:text-sm md:max-w-130 lg:text-sm lg:max-w-130" type="date" name="appear_date_end" />
                        @else
                            <x-jet-input id="appear_date_end" value="{{ old('appear_date_end') }}" class="block mt-1 ml-2 w-full xs:text-xs xs:max-w-120 min:text-xs min:max-w-120 sm:text-sm sm:max-w-130 md:text-sm md:max-w-130 lg:text-sm lg:max-w-130" type="date" name="appear_date_end" />
                        @endisset
                    </div>
                </div>-->
                <div class="xs:px-2 min:px-2 sm:px-6 md:px-6 lg:px-6 py-2 w-full">
                    <x-jet-label for="address" value="{{ __('都道府県') }}" />
                    <select id="address" class="xs:text-sm min:text-sm sm:text-base block mt-1 w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="address">
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
                <div class="xs:px-2 min:px-2 sm:px-6 md:px-6 lg:px-6 py-2 w-full">
                    <x-jet-label for="genre" value="{{ __('ジャンル') }}" />
                    <select id="genre" class="xs:text-sm min:text-sm sm:text-base mt-1 w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="genre">
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
            <div class="xs:px-2 min:px-2 sm:px-6 md:px-6 lg:px-6 py-2">
                <x-jet-label for="genre" value="{{ __('表示件数') }}" />
                <select id="disp_list" name="disp_list" onchange="changeListView();" class="xs:text-sm min:text-sm sm:text-base mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">表示件数を選択</option>
                    <option value="{{ $disp_list }}5">5</option>
                    <option value="{{ $disp_list }}10">10</option>
                    <option value="{{ $disp_list }}20">20</option>
                    <option value="{{ $disp_list }}30">30</option>
                    <option value="{{ $disp_list }}50">50</option>
                </select>
            </div>
            <div class="xs:px-2 min:px-2 sm:px-6 md:px-6 lg:px-6 pt-2 w-full">
                <x-jet-label for="genre" value="{{ __('並び替え') }}" />
                <div class="flex items-center mt-1">
                    <div class="mr-2">
                        <a id="ad_asc" class="text-sm underline text-gray-700" href="{{ $ad_sort }}asc">
                            出演日昇順
                            <i class="fa fa-sort"></i>
                        </a>
                    </div>
                    <div class="ml-2">
                        <a id="ad_desc" class="text-sm underline text-gray-700" href="{{ $ad_sort }}desc">
                            出演日降順
                            <i class="fa fa-sort"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="py-4">
                <div class="border-t border-gray-300"></div>
            </div>

            <div class="flex items-center justify-end pb-4">
                <x-jet-button id="searchBtn" class="text-base">
                    {{ __('検索') }}
                </x-jet-button>
                <input id="clearBtn" class="text-xs text-gray-600 mx-2" type="button" value="検索条件をクリア" onclick="clearSearchInfo()" />
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
        <div class="w-full max-w-700 p-2 my-8 bg-white border-01 shadow overflow-hidden">
            <div class="xs:p-1 min:p-1 sm:p-2 md:p-4 lg:p-4 line-break">
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
                </div>

                <div class="ml-4">
                    <div class="mb-6 text-lg xs:text-sm min:text-sm sm:text-base leading-7 font-semibold">
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
                        <div class="border-t border-gray-300"></div>
                    </div>
                </div>

                <div class="flex justify-center">
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

