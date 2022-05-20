<x-app-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

<div class="max-w-6xl mt-10 py-10 mx-auto sm:px-6 lg:px-8">
    <p class="text-2xl flex justify-center pt-8 sm:pt-0 dark:text-gray-900">
        応募情報を入力してください
    </p>

    <div class="mt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
        <div class="p-6">
            <div class="flex items-center">
                <form action="{{ url('/mail_offers')}}" method="get">
                {{ csrf_field()}}
                {{method_field('post')}}

                    <div class="mt-6 flex">
                        <x-jet-label for="name" value="{{ __('代表者氏名') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->name }}" id="name_leader" class="block mt-1 w-full" style="height: 30px;" type="text" name="name" />
                        @else
                        <x-jet-input id="name" class="block mt-1 w-full" style="height: 30px;" type="text" name="name" />
                        @endauth
                        <x-jet-input-error for="name" class="mt-2" />

                    <div class="mt-6 flex">
                        <x-jet-label for="kana" value="{{ __('フリガナ') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->kana }}" id="kana" class="block mt-1 w-full" style="height: 30px;" type="text" name="kana" />
                        @else
                        <x-jet-input id="kana" class="block mt-1 w-full" style="height: 30px;" type="text" name="kana" />
                        @endauth
                        <x-jet-input-error for="kana" class="mt-2" />

                    <div class="mt-6 flex">
                        <x-jet-label for="name_bands" value="{{ __('バンド/ユニット名') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->name_bands }}" id="name_bands" class="block mt-1 w-full" style="height: 30px;" type="text" name="name_bands" />
                        @else
                        <x-jet-input id="name_bands" class="block mt-1 w-full" style="height: 30px;" type="text" name="name_bands" />
                        @endauth
                        <x-jet-input-error for="name" class="mt-2" />

                    <div class="mt-6 flex">
                        <x-jet-label for="kana_bands" value="{{ __('フリガナ') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->kana_bands }}" id="kana_bands" class="block mt-1 w-full" style="height: 30px;" type="text" name="kana_bands" />
                        @else
                        <x-jet-input id="kana_bands" class="block mt-1 w-full" style="height: 30px;" type="text" name="kana_bands" />
                        @endauth
                        <x-jet-input-error for="kana" class="mt-2" />

                    <div class="mt-6">
                        <x-jet-label for="tel" value="{{ __('電話番号') }}" />
                        @auth
                        <x-jet-input value="{{ Auth::user()->tel }}" id="tel" class="block mt-1 w-full" style="height: 30px;" type="text" name="tel" />
                        @else
                        <x-jet-input id="tel" class="block mt-1 w-full" style="height: 30px;" type="text" name="tel" />
                        @endauth
                    </div>

                    <div class="mt-6 flex">
                        <x-jet-label for="tel" value="{{ __('メールアドレス') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->email }}" id="email" class="block mt-1 w-full" style="height: 30px;" type="email" name="email" />
                        @else
                        <x-jet-input id="email" class="block mt-1 w-full" style="height: 30px;" type="email" name="email" />
                        @endauth
                        <x-jet-input-error for="email" class="mt-2" /><!-- バリデーション未実装 -->

                    <div class="mt-6">
                        <x-jet-label for="other_contact" value="{{ __('その他連絡先 （LINE、Skypeなど）') }}" />
                        @auth
                        <x-jet-input value="{{ Auth::user()->other_contact }}" id="other_contact" class="block mt-1 w-full" style="height: 30px;" type="text" name="other_contact" />
                        @else
                        <x-jet-input id="other_contact" class="block mt-1 w-full" style="height: 30px;" type="text" name="other_contact" />
                        @endauth
                    </div>

                    <div class="mt-6">
                        <x-jet-label for="genre" value="{{ __('ジャンル') }}" />
                        <select id="genre" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="height: 41px;" name="genre">
                            @auth
                            <option selected value="{{ Auth::user()->genre }}">{{ Auth::user()->genre }}</option>
                            @else
                            <option selected value="">選択</option>
                            @endauth
                            @foreach(config('genre') as $index => $name)
                            <option value="{{ $index }}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-6">
                        <x-jet-label for="composition" value="{{ __('バンド/ユニット編成') }}" />
                        <select id="composition_select" onchange="viewChange();" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="height: 41px;" name="composition_select">
                            @auth
                            <option disabled>人数を選択</option>
                            @else
                            <option disabled selected>人数を選択</option>
                            @endauth
                            <option value="solo">ソロ</option>
                            <option value="2piece">2人</option>
                            <option value="3piece">3人</option>
                            <option value="3piece">3人</option>
                            <option value="4piece">4人</option>
                            <option value="5piece">5人</option>
                            <option value="6piece">6人</option>
                            @auth
                            <option selected value="other"></option>
                            @else
                            <option value="other">その他</option>
                            @endauth
                        </select>
                        <select id="composition_solo" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="height: 41px;" name="composition">
                            <option disabled selected>編成を選択</option>
                            <option value="ボーカル">ボーカル</option>
                            <option value="ギター＆ボーカル">ギター＆ボーカル</option>
                            <option value="ベース＆ボーカル">ベース＆ボーカル</option>
                            <option value="キーボード＆ボーカル">キーボード＆ボーカル</option>
                            <option value="ウクレレ＆ボーカル">ウクレレ＆ボーカル</option>
                        </select>
                    </div>

                    <div class="mt-6">
                        <x-jet-label for="audio_data" value="{{ __('音源') }}" />
                        <x-jet-input id="audio_data" class="block mt-1 w-full" style="height: 30px;" type="text" name="audio_data" />
                    </div>

                    <div class="mt-6">
                        <x-jet-label for="remarks" value="{{ __('備考') }}" />
                        <x-jet-input id="remarks" class="block mt-1 w-full" style="height: 30px;" type="text" name="remarks" />
                    </div>

                    <div class="flex items-center justify-center mt-6">
                    <input type="hidden" value="{{ $eventers_email }}" name="eventers_email">
                    <input type="hidden" value="{{ $appear_date }}" name="appear_date">
                    <input type="hidden" value="{{ $title }}" name="title">
                    <input type="hidden" value="{{ $genre }}" name="genre">
                    <input type="hidden" value="{{ $place }}" name="place">
                        <x-jet-button class="m-4 text-base">
                            {{ __('応募') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>
