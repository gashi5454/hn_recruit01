<x-welcome-layout>
<div class="flex bg-01"><!-- pのコメント化を解いたらclassにrelative追加 -->
    <img class="w-full h-full" src="{{ asset('storage/icon/imvibes_welcome.svg') }}" alt="top">
    <!--<p class="absolute ml-44 text-sm text-white bg-01">ライブ出演エントリーサイト</p>-->
</div>
    <div class="bg-white flex items-top justify-center h-auto dark:bg-white sm:items-center py-4 sm:pt-0">
        <div class="max-w-5xl py-10 mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 mb-16 bg-white overflow-hidden shadow">
                <form action="{{ url('/search')}}" method="get">
                {{ csrf_field()}}
                {{method_field('post')}}
                    <div x-data="{isShow:false}" class="mx-auto border-01 shadow p-1 overflow-hidden xs:w-full min:w-305px sm:w-500px md:w-600px lg:w-700px">
                        <h1 class="flex justify-center text-gr my-4">検索条件を入力してください</h1>
                        <x-jet-label class="xs:px-2 min:px-2 sm:px-6 md:px-6 lg:px-6 mt-2" for="keyword" value="{{ __('フリーワード') }}" />
                        <div class="xs:px-2 min:px-2 sm:px-6 md:px-6 lg:px-6 pb-2 flex items-center">
                            @isset($keyword)
                                <x-jet-input id="keyword" value="{{ old('keyword', $keyword) }}" class="text-sm mt-1 w-full min-w-200" placeholder="キーワードを入力" type="text" name="keyword" />
                            @else
                                <x-jet-input id="keyword" value="{{ old('keyword') }}" class="text-sm mt-1 w-full min-w-200" placeholder="キーワードを入力" type="text" name="keyword" />
                            @endisset
                            <button style="height:38px; min-width:60.5px; max-width:61px;" @click="isShow= !isShow" type="button" class="text-sm ml-1 mt-1 w-full inline-flex items-center px-4 py-1 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
                                {{ __('絞込') }}
                            </button>
                        </div>
                        <div x-show="isShow" class="flex items-center flex-wrap w-full max-w-450" x-cloak>
                            <div class="xs:px-2 min:px-2 sm:px-6 md:px-6 lg:px-6 py-2 w-full">
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
                            </div>
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
                        <div class="flex items-center justify-end py-4">
                            <x-jet-button id="searchBtn" class="text-base w-full justify-center mr-2 xs:ml-2 min:ml-2 sm:ml-6 md:ml-6 lg:ml-6">
                                {{ __('検索') }}
                            </x-jet-button>
                            <input id="clearBtn" class="text-xs text-gray-600 mr-2" type="button" value="検索条件をクリア" onclick="clearSearchInfo()" />
                <?php
                    $func = function($x, $y){
                        return $x - $y;
                    };
                    echo $func(40, 35);
                ?>
                        </div>
                    </div>
                </form>
                @if(session('flash_message'))
                    <div class="alert alert-primary" role="alert" style="margin-top:50px;">{{ session('flash_message')}}</div>
                @endif
            </div>
        </div>
    </div>
</x-welcome-layout>
