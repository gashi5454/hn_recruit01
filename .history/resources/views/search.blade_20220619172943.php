<x-app-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">
    <div class="pt-2 pb-6 mx-auto xs:px-0 min:px-2 sm:px-4 md:px-6 lg:px-6">

        <div class="w-full bg-white p-1 dark:bg-gray-100 overflow-hidden shadow xs:flex-wrap min:flex-wrap sm:flex-wrap md:flex-nowrap lg:flex-nowrap">
            <div class="flex items-center">
                <div class="mx-2 my-1 w-full">
                    <x-jet-label for="keyword" value="{{ __('フリーワード') }}" />
                    <x-jet-input id="keyword" class="mt-1 text-sm w-full min-w-280" placeholder="キーワードを入力" type="text" name="keyword" />
                </div>
                <div class="mx-2 my-1 w-full">
                    <x-jet-label for="appear_date" value="{{ __('出演日') }}" />
                    <div class="flex">
                        <x-jet-input id="appear_date_start" class="block mt-1 mr-2 text-sm w-full max-w-140" type="date" name="appear_date_start" />
                        <div class="mt-3">～</div>
                        <x-jet-input id="appear_date_end" class="block mt-1 ml-2 text-sm w-full max-w-140" type="date" name="appear_date_end" />
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <div class="mx-2 my-1 w-full">
                    <x-jet-label for="address" value="{{ __('都道府県') }}" />
                    <select id="address" style="width:120px;" class="xs:text-sm min:text-sm sm:text-base block mt-1 w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="address">
                        <option selected value="">選択</option>
                        @foreach(config('address') as $index => $name)
                        <option value="{{ $index }}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mx-2 my-1 w-full">
                    <x-jet-label for="genre" value="{{ __('ジャンル') }}" />
                    <select id="genre" style="width:180px;" class="xs:text-sm min:text-sm sm:text-base block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="genre">
                        <option selected value="">選択</option>
                        @foreach(config('genre') as $index => $name)
                        <option value="{{ $index }}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        @if(isset($message))
        <p class="text-xl flex justify-center mt-8 sm:pt-0 dark:text-gray-900">
            {{ $message }}
        </p>
        @endif

        <x-jet-section-border />

        @if(isset($offers))
        @foreach($offers as $offer)
        <div class="max-w-3xl my-8 bg-white dark:bg-gray-100 overflow-hidden shadow min:rounded-lg">
            <div class="p-6 line-break">
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
                    <div class="py-4">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mr-4 flex sm:justify-end min:justify-center">
                    <x-jet-button class="text-base">
                        <a href="{{ route('detail' , ['id' => $offer->id]) }} " class="no-underline">
                            {{ __('詳細を見る') }}
                        </a>
                    </x-jet-button>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        <div class="flex items-center">
        {{ $offers->appends(request()->input())->links() }}
        </div>
    </div>
</div>
</x-app-layout>

