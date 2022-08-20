<x-app-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl py-6 mx-auto xs:px-4 min:px-4 sm:px-6 md:px-6 lg:px-8">
        <div class="max-w-760 bg-white dark:bg-gray-100 overflow-hidden shadow min:rounded-lg">
            <div class="p-2 text-sm">
                <div class="flex justify-between items-center xs:flex-wrap min:flex-wrap">
                    <div class="my-2 mx-4">
                        <x-jet-label for="keyword" value="{{ __('フリーワード') }}" />
                        <x-jet-input id="keyword" class="xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base mt-1 w-full max-w-text-res" placeholder="キーワードを入力" type="text" name="keyword" />
                    </div>
                    <div class="my-2 mx-4">
                        <x-jet-label for="keyword" value="{{ __('フリーワード') }}" />
                        <x-jet-input id="keyword" class="xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base mt-1 w-full max-w-text-res" placeholder="キーワードを入力" type="text" name="keyword" />
                    </div>
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

