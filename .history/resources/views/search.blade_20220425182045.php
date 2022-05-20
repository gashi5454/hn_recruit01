<x-app-layout>
    <div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mt-10 py-10 mx-auto sm:px-6 lg:px-8">
            @if(isset($message))
            <p class="text-2xl flex justify-center pt-8 sm:pt-0 dark:text-gray-900">
                isset$message
            </p>
            @endif

            <x-jet-section-border />

            @if(isset($offers))
            @foreach($offers as $offer)
            <div class="max-w-3xl my-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <a href="https://google.com/" class="hover:underline text-gray-900 dark:text-gray-900">
                            {{ $offer->title }}
                            </a>
                        </div>
                    </div>

                    <div class="ml-4">
                        <div class="mt-2 text-gray-600 dark:text-gray-600 text-sm">
                        {{ $offer->appear_date }}
                        </div>
                        <div class="mt-1 text-gray-600 dark:text-gray-600 text-sm">
                        {{ $offer->address }}
                        </div>
                        <div class="mt-3 text-gray-900 dark:text-gray-900 text-sm">
                        {{ $offer->genre }}
                        </div>
                        <div class="mt-3 text-gray-900 dark:text-gray-900 text-sm word-wrap: break-word;">
                        qwertyuiop@[asdfgkl;:]zxcvbnm,./\aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
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

