<x-app-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

<div class="max-w-6xl mt-10 py-10 mx-auto sm:px-6 lg:px-8">
    <p class="text-2xl flex justify-center pt-8 px-6 sm:pt-0 dark:text-gray-900">
        応募情報を入力してください
    </p>

    <div class="mt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
        <div class="p-6">
            <div class="items-center">
                <form action="{{ url('/mail_offers')}}" method="get">
                {{ csrf_field()}}
                {{method_field('post')}}

                    <div class="mt-8 flex">
                        <x-jet-label for="name" value="{{ __('代表者氏名') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->name }}" id="name_leader" class="block mt-1 w-full" style="height: 36px;" type="text" name="name" />
                        @else
                        <x-jet-input id="name" class="block mt-1 w-full" style="height: 36px;" type="text" name="name" />
                        @endauth
                        <x-jet-input-error for="name" class="mt-2" />

                    <div class="mt-8 flex">
                        <x-jet-label for="kana" value="{{ __('フリガナ') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->kana }}" id="kana" class="block mt-1 w-full" style="height: 36px;" type="text" name="kana" />
                        @else
                        <x-jet-input id="kana" class="block mt-1 w-full" style="height: 36px;" type="text" name="kana" />
                        @endauth
                        <x-jet-input-error for="kana" class="mt-2" />

                    <div class="mt-8 flex">
                        <x-jet-label for="name_bands" value="{{ __('バンド/ユニット名') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->name_bands }}" id="name_bands" class="block mt-1 w-full" style="height: 36px;" type="text" name="name_bands" />
                        @else
                        <x-jet-input id="name_bands" class="block mt-1 w-full" style="height: 36px;" type="text" name="name_bands" />
                        @endauth
                        <x-jet-input-error for="name" class="mt-2" />

                    <div class="mt-8 flex">
                        <x-jet-label for="kana_bands" value="{{ __('フリガナ') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->kana_bands }}" id="kana_bands" class="block mt-1 w-full" style="height: 36px;" type="text" name="kana_bands" />
                        @else
                        <x-jet-input id="kana_bands" class="block mt-1 w-full" style="height: 36px;" type="text" name="kana_bands" />
                        @endauth
                        <x-jet-input-error for="kana" class="mt-2" />

                    <div class="mt-8">
                        <x-jet-label for="tel" value="{{ __('電話番号') }}" />
                        @auth
                        <x-jet-input value="{{ Auth::user()->tel }}" id="tel" class="block mt-1 w-full" style="height: 36px;" type="text" name="tel" />
                        @else
                        <x-jet-input id="tel" class="block mt-1 w-full" style="height: 36px;" type="text" name="tel" />
                        @endauth
                    </div>

                    <div class="mt-8 flex">
                        <x-jet-label for="tel" value="{{ __('メールアドレス') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->email }}" id="email" class="block mt-1 w-full" style="height: 36px;" type="email" name="email" />
                        @else
                        <x-jet-input id="email" class="block mt-1 w-full" style="height: 36px;" type="email" name="email" />
                        @endauth
                        <x-jet-input-error for="email" class="mt-2" /><!-- バリデーション未実装 -->

                    <div class="mt-8">
                        <x-jet-label for="other_contact" value="{{ __('その他連絡先 （LINE、Skypeなど）') }}" />
                        @auth
                        <x-jet-input value="{{ Auth::user()->other_contact }}" id="other_contact" class="block mt-1 w-full" style="height: 36px;" type="text" name="other_contact" />
                        @else
                        <x-jet-input id="other_contact" class="block mt-1 w-full" style="height: 36px;" type="text" name="other_contact" />
                        @endauth
                    </div>

                    <div class="mt-8">
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

                    <div class="mt-8">
                        <x-jet-label for="composition" value="{{ __('バンド/ユニット編成') }}" />
                    </div>

                    <div class="mt-5">
                        ボーカル
                    </div>
                    <div class="mt-1 flex items-center justify-between">
                        <div class="inline">
                            <div>人数</div>
                            <select id="vo_num" class="mr-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 80px; height: 36px;" name="vo_num">
                                <option selected value="">0人</option>
                                <option value="ボーカル1人">1人</option>
                                <option value="ボーカル2人">2人</option>
                                <option value="ボーカル3人">3人</option>
                                <option value="ボーカル4人">4人</option>
                                <option value="ボーカル5人">5人</option>
                            </select>
                        </div>
                        <div class="inline">
                            <div>使用楽器(兼任ボーカルのみ)</div>
                            <select id="vo_num" class="mr-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 80px; height: 36px;" name="vo_num">
                                <option selected value="">なし</option>
                                <option value="エレキギター">エレキギター</option>
                                <option value="エレアコ">エレアコ</option>
                                <option value="エレキベース">ベース</option>
                                <option value="キーボード">キーボード</option>
                                <option value="ドラム">ドラム</option>
                                <option value="アコースティックギター">アコースティックギター</option>
                                <option value="ウクレレ">ウクレレ</option>
                                <option value="パーカッション">パーカッション</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-5 flex items-center justify-between">
                        <div>ギター</div>
                        <select id="gt_num" class="mr-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 80px; height: 36px;" name="gt_num">
                            <option selected value="">0人</option>
                            <option value="1人">1人</option>
                            <option value="2人">2人</option>
                            <option value="3人">3人</option>
                            <option value="4人">4人</option>
                            <option value="5人">5人</option>
                        </select>
                    </div>
                    <div class="mt-5 flex items-center justify-between">
                        <div>ベース</div>
                        <select id="ba_num" class="mr-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 80px; height: 36px;" name="ba_num">
                            <option selected value="">0人</option>
                            <option value="1人">1人</option>
                            <option value="2人">2人</option>
                            <option value="3人">3人</option>
                            <option value="4人">4人</option>
                            <option value="5人">5人</option>
                        </select>
                    </div>
                    <div class="mt-5 flex items-center justify-between">
                        <div>ドラム</div>
                        <select id="dr_num" class="mr-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 80px; height: 36px;" name="dr_num">
                            <option selected value="">0人</option>
                            <option value="1人">1人</option>
                            <option value="2人">2人</option>
                            <option value="3人">3人</option>
                            <option value="4人">4人</option>
                            <option value="5人">5人</option>
                        </select>
                    </div>
                    <div class="mt-5 flex items-center justify-between">
                        <div>キーボード</div>
                        <select id="key_num" class="mr-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 80px; height: 36px;" name="key_num">
                            <option selected value="">0人</option>
                            <option value="1人">1人</option>
                            <option value="2人">2人</option>
                            <option value="3人">3人</option>
                            <option value="4人">4人</option>
                            <option value="5人">5人</option>
                        </select>
                    </div>
                    <div class="mt-5 flex items-center justify-between">
                        <div>パーカッション</div>
                        <select id="per_num" class="mr-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 80px; height: 36px;" name="per_num">
                            <option selected value="">0人</option>
                            <option value="1人">1人</option>
                            <option value="2人">2人</option>
                            <option value="3人">3人</option>
                            <option value="4人">4人</option>
                            <option value="5人">5人</option>
                        </select>
                    </div>
                    <div class="mt-5 block items-center justify-between">
                        <div>その他</div>
                        <x-jet-input id="other_contact" class="block mt-1 w-full" style="height: 36px;" type="text" placeholder="例）DJ：1人、" name="com_other" />
                    </div>

                    <!--
                    <div class="mt-8">
                        <x-jet-label for="composition_select" value="{{ __('バンド/ユニット編成') }}" />
                        <select id="composition_select" onchange="viewChange();" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="height: 41px;" name="composition_select">
                            @auth
                            <option selected value="registered_comp">登録時編成</option>
                            <option value="solo">ソロ</option>
                            <option value="2piece">2人</option>
                            <option value="3piece">3人</option>
                            <option value="3piece">3人</option>
                            <option value="4piece">4人</option>
                            <option value="5piece">5人</option>
                            <option value="6piece">6人</option>
                            <option value="other">その他</option>
                            @else
                            <option selected value="0">人数を選択</option>
                            <option value="solo">ソロ</option>
                            <option value="2piece">2人</option>
                            <option value="3piece">3人</option>
                            <option value="3piece">3人</option>
                            <option value="4piece">4人</option>
                            <option value="5piece">5人</option>
                            <option value="6piece">6人</option>
                            <option value="other">その他</option>
                            @endauth
                        </select>
                        @auth
                        <select id="composition_reg" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="height: 41px;" name="composition">
                            <option value="{{ Auth::user()->composition }}">{{ Auth::user()->composition }}aaa</option>
                        </select>
                        @endauth
                        <select id="composition_solo" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="height: 41px;" name="composition">
                            <option disabled selected>編成を選択</option>
                            <option value="ボーカル">ボーカル</option>
                            <option value="ギター＆ボーカル">ギター＆ボーカル</option>
                            <option value="ベース＆ボーカル">ベース＆ボーカル</option>
                            <option value="キーボード＆ボーカル">キーボード＆ボーカル</option>
                            <option value="ウクレレ＆ボーカル">ウクレレ＆ボーカル</option>
                        </select>
                        <select id="composition_2piece" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="height: 41px;" name="composition">
                            <option disabled selected>編成を選択</option>
                            <option value="ボーカル２人">ボーカル２人</option>
                            <option value="ギター２人">ギター２人</option>
                            <option value="ギター＆ボーカル２人">ギター＆ボーカル２人</option>
                            <option value="ギター＆ボーカル、ボーカル">ギター＆ボーカル、ボーカル</option>
                            <option value="キーボード２人">キーボード２人</option>
                            <option value="キーボード＆ボーカル２人">キーボード＆ボーカル２人</option>
                            <option value="キーボード＆ボーカル、ボーカル">キーボード＆ボーカル、ボーカル</option>
                            <option value="ウクレレ２人">ウクレレ２人</option>
                            <option value="ウクレレ＆ボーカル２人">ウクレレ＆ボーカル２人</option>
                            <option value="ウクレレ＆ボーカル、ボーカル">ウクレレ＆ボーカル、ボーカル</option>
                        </select>
                        <select id="composition_3piece" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="height: 41px;" name="composition">
                            <option disabled selected>編成を選択</option>
                            <option value="ギター＆ボーカル、ベース、ドラム">ギター＆ボーカル、ベース、ドラム</option>
                            <option value="ベース＆ボーカル、ギター、ドラム">ベース＆ボーカル、ギター、ドラム</option>
                            <option value="キーボード＆ボーカル、ベース、ドラム">キーボード＆ボーカル、ベース、ドラム</option>
                            <option value="ドラム＆ボーカル、ギター、ベース">ドラム＆ボーカル、ギター、ベース</option>
                            <option value="ボーカル、ギター、ドラム">ボーカル、ギター、ドラム</option>
                            <option value="ボーカル、ベース、ドラム">ボーカル、ベース、ドラム</option>
                            <option value="ギター、キーボード、ドラム">ギター、キーボード、ドラム</option>
                            <option value="キーボード、ベース、ドラム">キーボード、ベース、ドラム</option>
                        </select>
                        <select id="composition_4piece" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="height: 41px;" name="composition">
                            <option disabled selected>編成を選択</option>
                            <option value="ボーカル、ギター、ベース、ドラム">ボーカル、ギター、ベース、ドラム</option>
                            <option value="ボーカル、キーボード、ベース、ドラム">ボーカル、キーボード、ベース、ドラム</option>
                            <option value="ギター＆ボーカル、ギター、ベース、ドラム">ギター＆ボーカル、ギター、ベース、ドラム</option>
                            <option value="ギター＆ボーカル、キーボード、ベース、ドラム">ギター＆ボーカル、キーボード、ベース、ドラム</option>
                            <option value="ベース＆ボーカル、ギター２人、ドラム">ベース＆ボーカル、ギター２人、ドラム</option>
                            <option value="ベース＆ボーカル、ギター、キーボード、ドラム">ベース＆ボーカル、ギター、キーボード、ドラム</option>
                            <option value="キーボード＆ボーカル、ギター、ベース、ドラム">キーボード＆ボーカル、ギター、ベース、ドラム</option>
                            <option value="ドラム＆ボーカル、ギター２人、ベース">ドラム＆ボーカル、ギター２人、ベース</option>
                            <option value="ドラム＆ボーカル、ギター、キーボード、ベース">ドラム＆ボーカル、ギター、キーボード、ベース</option>
                        </select>
                        <select id="composition_5piece" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="height: 41px;" name="composition">
                            <option disabled selected>編成を選択</option>
                            <option value="ボーカル、ギター２人、ベース、ドラム">ボーカル、ギター２人、ベース、ドラム</option>
                            <option value="ボーカル、ギター、キーボード、ベース、ドラム">ボーカル、ギター、キーボード、ベース、ドラム</option>
                            <option value="ボーカル、ギター、ベース、ドラム、パーカッション">ボーカル、ギター、ベース、ドラム、パーカッション</option>
                            <option value="ギター＆ボーカル、ギター２人、ベース、ドラム">ボーカル、ギター２人、ベース、ドラム</option>
                        </select>
                        <select id="composition_6piece" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="height: 41px;" name="composition">
                            <option disabled selected>編成を選択</option>
                            <option value="ボーカル、ギター３人、ベース、ドラム">ボーカル、ギター３人、ベース、ドラム</option>
                            <option value="ボーカル、ギター２人、キーボード、ベース、ドラム">ボーカル、ギター２人、キーボード、ベース、ドラム</option>
                            <option value="ボーカル、ギター＆ボーカル、ギター２人、ベース、ドラム">ギター＆ボーカル、ギター２人、ベース、ドラム</option>
                            <option value="ボーカル、ギター２人、ベース、ドラム、パーカッション">ボーカル、ギター２人、ベース、ドラム、パーカッション</option>
                        </select>
                        <x-jet-input id="composition_other" type="text" name="composition_other" />
                    </div>
                    -->

                    <div class="mt-8">
                        <x-jet-label for="audio_data" value="{{ __('音源') }}" />
                        <x-jet-input id="audio_data" class="block mt-1 w-full" style="height: 36px;" type="text" name="audio_data" />
                    </div>

                    <div class="mt-8">
                        <x-jet-label for="remarks" value="{{ __('備考') }}" />
                        <x-jet-input id="remarks" class="block mt-1 w-full" style="height: 36px;" type="text" name="remarks" />
                    </div>

                    <div class="mt-8 flex items-center justify-center">
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
