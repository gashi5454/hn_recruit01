<x-app-layout>
    <div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mt-10 py-10 mx-auto sm:px-6 lg:px-8">
            @if(isset($message))
            <p class="text-xl flex justify-center pt-8 sm:pt-0 dark:text-gray-900">
                {{ $message }}
            </p>
            @endif

            <x-jet-section-border />

            @if(isset($offers))
            @foreach($offers as $offer)
            <div class="max-w-3xl my-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 line-break">
                    <div class="flex items-center">
                        <div class="ml-4 text-lg leading-7 font-semibold">
                        <?php
                        $date = $offer->appear_date;
                        $datetime = new DateTime($date);
                        $week = array("日", "月", "火", "水", "木", "金", "土");
                        $w = (int)$datetime->format('w');
                        ?>
                        {{ $offer->appear_date }} ( {{ $week[$w] }} )
                        </div>
                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <a href="{{ route('detail' , ['id' => $offer->id]) }}" class="hover:underline text-gray-900 dark:text-gray-900">
                            {{ $offer->title }}
                            </a>
                        </div>
                    </div>

                    <div class="ml-4">
                        <div class="mt-3 text-gray-900 dark:text-gray-900 text-sm">
                        {{ $offer->genre }}
                        </div>
                        <div class="mt-3 text-gray-900 dark:text-gray-900 text-sm">
                        {{ $offer->place }}
                        </div>
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

