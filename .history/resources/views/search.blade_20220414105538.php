<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <h1>検索結果</h1>
            @if(isset($offers))
            <x-jet-section-border />
            <table class="table">
            <tr>
                <th>タイトル</th><th>ジャンル</th><th>出演日</th><th>出演条件</th>
            </tr>
            @foreach($offers as $offer)
            <tr>
                <td>{{$offer->title}}</td><td>{{$offer->genre}}</td><td>{{$offer->appear_date}}</td><td>{{$offer->}}</td>
            </tr>
            <x-jet-section-border />
            @endforeach
            </table>
            @endif
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

        <div class="max-w-6xl mt-10 py-10 mx-auto sm:px-6 lg:px-8">
            <p class="text-2xl flex justify-center pt-8 sm:pt-0 dark:text-gray-900">
                検索結果
            </p>

            @if(isset($offers))
            <x-jet-section-border />
            <div class="mt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-gray-900">Documentation</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>

