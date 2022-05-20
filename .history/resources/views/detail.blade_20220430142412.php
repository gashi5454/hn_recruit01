<x-app-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

<div class="max-w-7xl mt-10 py-10 mx-auto sm:px-6 lg:px-8">
    <p class="text-2xl flex justify-center pt-8 sm:pt-0 dark:text-gray-900">
        title
    </p>

    <div class="mt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
        <div class="p-6">
            <h1>応募情報を入力してください</h1>
            <div class="flex items-center">
                <form action="{{ url('/search')}}" method="post">
                {{ csrf_field()}}
                {{method_field('post')}}
                    <div class="mt-4 inline-flex items-center">
                        <x-jet-label class="justify-start mr-16" for="keyword" value="{{ __('フリーワード') }}" />
                        <x-jet-input id="keyword" class="block mt-1 w-48" placeholder="キーワードを入力" type="text" name="keyword" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="appear_date" value="{{ __('出演日') }}" />
                    </div>

                    <div class="flex">
                        <x-jet-input id="appear_date_start" class="block mt-1 mr-2 w-full" type="date" name="appear_date_start" />
                        <div class="mt-4">～</div>
                        <x-jet-input id="appear_date_end" class="block mt-1 ml-2 w-full" type="date" name="appear_date_end" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="address" value="{{ __('都道府県') }}" />
                        <select id="address" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="address">
                            <option selected value="">選択</option>
                            @foreach(config('address') as $index => $name)
                            <option value="{{ $index }}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="genre" value="{{ __('ジャンル') }}" />
                        <select id="genre" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="genre">
                            <option selected value="">選択</option>
                            @foreach(config('genre') as $index => $name)
                            <option value="{{ $index }}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('検索') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>
