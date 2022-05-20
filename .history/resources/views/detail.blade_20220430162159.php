<x-app-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

<div class="max-w-6xl m-16 px-6 mx-auto sm:px-6 lg:px-8">
    <p class="text-2xl flex justify-center pt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg sm:pt-0 dark:text-gray-900">
        {{ $offers->title }}
    </p>

    <div class="mt-16 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
        <div class="p-8">
            <div class="flex items-center">
                <form action="{{ url('/applies')}}" method="post">
                {{ csrf_field()}}
                {{method_field('post')}}
                    <div class="mt-4 inline-flex items-center">
                        <x-jet-label class="justify-start mr-16 text-base" for="keyword" value="{{ __('フリーワード') }}" />
                        <div class="mt-3 text-gray-600 dark:text-gray-600 text-sm">
                            @if(isset($offers->contents))
                            {{ $offers->contents }}
                            @else
                            ご応募お待ちしております！
                            @endif
                        </div>
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

                    <div class="flex items-center justify-center mt-6">
                        <x-jet-button class="m-4 text-xl">
                            {{ __('応募画面へ進む') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>
