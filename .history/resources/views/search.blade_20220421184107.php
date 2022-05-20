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
                <td>{{$offer->title}}</td><td>{{$offer->genre}}</td><td>{{$offer->appear_date}}</td><td>{{$offer->requirement}}</td>
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


            <div class="mt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
            @if(isset($message))
            <x-jet-section-border />
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://google.com/" class="text-gray-900 dark:text-gray-900"></a>{{$offer->title}}</div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                        </div>
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

