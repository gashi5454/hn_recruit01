<x-app-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

<div class="max-w-7xl mt-10 py-10 mx-auto sm:px-6 lg:px-8">
    <p class="text-2xl flex justify-center mx-4 pt-8 px-40 sm:pt-0 dark:text-gray-900">
        応募情報を入力してください
    </p>

    <div class="mt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
        <div class="p-6">
            <div class="items-center">
                <form action="{{ url('/mail_offers')}}" method="get">
                {{method_field('post')}}

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700">代表者氏名</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ Auth::user()->name }}" id="name" name="name" class="ml-2" style="width: 250px; height: 36px;" type="text" placeholder="例）山田太郎" />
                        @else
                        <x-jet-input id="name" name="name" class="ml-2" style="width: 65%; height: 36px;" type="text" placeholder="例）山田太郎" />
                        @endauth
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>
                </div>

                    <div class="mt-8 flex items-center justify-start">
                        <div class="flex">
                            <div class="mr-1 font-medium text-sm text-gray-700">代表者氏名</div>
                            <div class="mr-1 inline-block font-medium text-sm text-gray-700" style="color: #FF0000;">(必須)</div>
                        </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->name }}" id="name" name="name" class="ml-2" style="width: 65%; height: 36px;" type="text" placeholder="例）山田太郎" />
                        @else
                        <x-jet-input id="name" name="name" class="ml-2" style="width: 65%; height: 36px;" type="text" placeholder="例）山田太郎" />
                        @endauth
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>


                    <div class="mt-8 flex items-center justify-start">
                        <div class="flex">
                            <div class="mr-1 font-medium text-sm text-gray-700">ふりがな</div>
                            <div class="mr-1 inline-block font-medium text-sm text-gray-700" style="color: #FF0000;">(必須)</div>
                        </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->kana }}" id="kana" name="kana" class="ml-2" style="width: 65%; height: 36px;" type="text" placeholder="例）やまだたろう" />
                        @else
                        <x-jet-input id="kana" name="kana" class="ml-2" style="width: 65%; height: 36px;" type="text" placeholder="例）やまだたろう" />
                        @endauth
                        <x-jet-input-error for="kana" class="mt-2" />
                    </div>

                    <div class="mt-8 flex items-center justify-start">
                        <div class="flex">
                            <div class="mr-1 font-medium text-sm text-gray-700">バンド/ユニット名</div>
                            <div class="mr-1 inline-block font-medium text-sm text-gray-700" style="color: #FF0000;">(必須)</div>
                        </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->name_bands }}" id="name_bands" name="name_bands" class="ml-2" style="width: 65%; height: 36px;" type="text" placeholder="例）山田太郎band" />
                        @else
                        <x-jet-input id="name_bands" name="name_bands" class="ml-2" style="width: 65%; height: 36px;" type="text" placeholder="例）山田太郎band" />
                        @endauth
                        <x-jet-input-error for="name_bands" class="mt-2" />
                    </div>

                    <div class="mt-8 flex items-center justify-start">
                        <div class="flex">
                            <div class="mr-1 font-medium text-sm text-gray-700">フリガナ</div>
                            <div class="mr-1 inline-block font-medium text-sm text-gray-700" style="color: #FF0000;">(必須)</div>
                        </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->kana_bands }}" id="kana_bands" name="kana_bands" class="ml-2" style="width: 65%; height: 36px;" type="text" placeholder="例）ヤマダタロウバンド" />
                        @else
                        <x-jet-input id="kana_bands" name="kana_bands" class="ml-2" style="width: 65%; height: 36px;" type="text" placeholder="例）ヤマダタロウバンド" />
                        @endauth
                        <x-jet-input-error for="kana_bands" class="mt-2" />
                    </div>

                    <div class="mt-8 flex items-center justify-start">
                        <div class="flex">
                            <div class="mr-1 font-medium text-sm text-gray-700">メールアドレス</div>
                            <div class="mr-1 inline-block font-medium text-sm text-gray-700" style="color: #FF0000;">(必須)</div>
                        </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->email }}" id="email" name="email" class="ml-2" style="width: 65%; height: 36px;" type="email" />
                        @else
                        <x-jet-input id="email" name="email" class="ml-2" style="width: 65%; height: 36px;" type="email" />
                        @endauth
                        <x-jet-input-error for="email" class="mt-2" />
                    </div><!-- バリデーション未実装 -->

                    <div class="mt-8 flex items-center justify-start">
                        <div class="flex">
                            <div class="mr-1 font-medium text-sm text-gray-700">電話番号</div>
                        </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->tel }}" id="tel" name="tel" class="ml-2" style="width: 65%; height: 36px;" type="text" />
                        @else
                        <x-jet-input id="tel" name="tel" class="ml-2" style="width: 65%; height: 36px;" type="text" />
                        @endauth
                    </div>

                    <div class="mt-8 flex items-center justify-start">
                        <div class="flex">
                            <div class="mr-1 font-medium text-sm text-gray-700">その他連絡先</div>
                        </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->other_contact }}" id="other_contact" name="other_contact" class="ml-2" style="width: 65%; height: 36px;" type="text" placeholder="LINE ID、Skypeなど" />
                        @else
                        <x-jet-input id="other_contact" name="other_contact" class="ml-2" style="width: 65%; height: 36px;" type="text" placeholder="LINE ID、Skypeなど" />
                        @endauth
                    </div>

                    <x-jet-section-border />

                    <div class="mt-4 mb-2">
                        <x-jet-label for="composition" value="{{ __('バンド/ユニット編成') }}" />
                    </div>

                    <div class="composition-table">
                        <div class="composition-table-title">ボーカル</div>
                        <div class="composition-table-data">
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                <select id="vo_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="vo_num">
                                    <option selected value="">0人</option>
                                    <option value="ボーカル1人">1人</option>
                                    <option value="ボーカル2人">2人</option>
                                    <option value="ボーカル3人">3人</option>
                                    <option value="ボーカル4人">4人</option>
                                    <option value="ボーカル5人以上">5人以上</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">使用楽器(兼任ボーカルのみ)：</div>
                                <select id="vo_inst" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 180px; height: 40px;" name="vo_inst">
                                    <option selected value="">なし</option>
                                    <option value="エレキギター">エレキギター</option>
                                    <option value="アコースティックギター">アコースティックギター</option>
                                    <option value="エレキベース">ベース</option>
                                    <option value="アコースティックベース">アコースティックベース</option>
                                    <option value="ドラム">ドラム</option>
                                    <option value="キーボード">キーボード</option>
                                    <option value="その他">その他</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="composition-table">
                        <div class="composition-table-title">エレキギター</div>
                        <div class="composition-table-data">
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                <select id="elgt_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="elgt_num">
                                    <option selected value="">0人</option>
                                    <option value="エレキギター1人">1人</option>
                                    <option value="エレキギター2人">2人</option>
                                    <option value="エレキギター3人">3人</option>
                                    <option value="エレキギター4人">4人</option>
                                    <option value="エレキギター5人以上">5人以上</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                <select id="elgt_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="elgt_mic">
                                    <option selected value="">なし</option>
                                    <option value="1本">1本</option>
                                    <option value="2本">2本</option>
                                    <option value="3本">3本</option>
                                    <option value="4本">4本</option>
                                    <option value="5本以上">5本以上</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="composition-table">
                        <div class="composition-table-title">アコースティック<br>ギター</div>
                        <div class="composition-table-data">
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">タイプ：</div>
                                <select id="acgt_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 150px; height: 40px;" name="acgt_type">
                                    <option selected value="">選択</option>
                                    <option value="エレアコ">エレアコ</option>
                                    <option value="アコースティック">アコースティック</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                <select id="acgt_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="acgt_num">
                                    <option selected value="">0人</option>
                                    <option value="アコースティックギター1人">1人</option>
                                    <option value="アコースティックギター2人">2人</option>
                                    <option value="アコースティックギター3人">3人</option>
                                    <option value="アコースティックギター4人">4人</option>
                                    <option value="アコースティックギター5人以上">5人以上</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                <select id="acgt_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="acgt_mic">
                                    <option selected value="">なし</option>
                                    <option value="1本">1本</option>
                                    <option value="2本">2本</option>
                                    <option value="3本">3本</option>
                                    <option value="4本">4本</option>
                                    <option value="5本以上">5本以上</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="composition-table">
                        <div class="composition-table-title">エレキベース</div>
                        <div class="composition-table-data">
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                <select id="elba_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="elba_num">
                                    <option selected value="">0人</option>
                                    <option value="エレキベース1人">1人</option>
                                    <option value="エレキベース2人">2人</option>
                                    <option value="エレキベース3人">3人</option>
                                    <option value="エレキベース4人">4人</option>
                                    <option value="エレキベース5人以上">5人以上</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                <select id="elba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="elba_mic">
                                    <option selected value="">なし</option>
                                    <option value="1本">1本</option>
                                    <option value="2本">2本</option>
                                    <option value="3本">3本</option>
                                    <option value="4本">4本</option>
                                    <option value="5本以上">5本以上</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="composition-table">
                        <div class="composition-table-title">アコースティック<br>ベース</div>
                        <div class="composition-table-data">
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">タイプ：</div>
                                <select id="acba_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 150px; height: 40px;" name="acba_type">
                                    <option selected value="">選択</option>
                                    <option value="エレアコ">エレアコ</option>
                                    <option value="アコースティック">アコースティック</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                <select id="acba_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="acba_num">
                                    <option selected value="">0人</option>
                                    <option value="アコースティックベース1人">1人</option>
                                    <option value="アコースティックベース2人">2人</option>
                                    <option value="アコースティックベース3人">3人</option>
                                    <option value="アコースティックベース4人">4人</option>
                                    <option value="アコースティックベース5人以上">5人以上</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                <select id="acba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="acba_mic">
                                    <option selected value="">なし</option>
                                    <option value="1本">1本</option>
                                    <option value="2本">2本</option>
                                    <option value="3本">3本</option>
                                    <option value="4本">4本</option>
                                    <option value="5本以上">5本以上</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="composition-table">
                        <div class="composition-table-title">ドラム</div>
                        <div class="composition-table-data">
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                <select id="dr_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="dr_num">
                                    <option selected value="">0人</option>
                                    <option value="ドラム1人">1人</option>
                                    <option value="ドラム2人">2人</option>
                                    <option value="ドラム3人">3人</option>
                                    <option value="ドラム4人">4人</option>
                                    <option value="ドラム5人以上">5人以上</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                <select id="dr_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="dr_mic">
                                    <option selected value="">なし</option>
                                    <option value="1本">1本</option>
                                    <option value="2本">2本</option>
                                    <option value="3本">3本</option>
                                    <option value="4本">4本</option>
                                    <option value="5本以上">5本以上</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="composition-table">
                        <div class="composition-table-title">キーボード</div>
                        <div class="composition-table-data">
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                <select id="key_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="key_num">
                                    <option selected value="">0人</option>
                                    <option value="キーボード1人">1人</option>
                                    <option value="キーボード2人">2人</option>
                                    <option value="キーボード3人">3人</option>
                                    <option value="キーボード4人">4人</option>
                                    <option value="キーボード5人以上">5人以上</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                <select id="key_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="key_mic">
                                    <option selected value="">なし</option>
                                    <option value="1本">1本</option>
                                    <option value="2本">2本</option>
                                    <option value="3本">3本</option>
                                    <option value="4本">4本</option>
                                    <option value="5本以上">5本以上</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="composition-table">
                        <div class="composition-table-title">その他</div>
                        <div class="composition-table-data">
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">パート：</div>
                                <x-jet-input id="composition_other" style="width: 380px; height: 40px;" type="text" name="other_part_num" placeholder="例）DJ：1人、カホン：1人" />
                            </div>
                            <div class="flex items-center justify-end my-1">
                                <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                <select id="acba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="other_mic">
                                    <option selected value="">なし</option>
                                    <option value="1本">1本</option>
                                    <option value="2本">2本</option>
                                    <option value="3本">3本</option>
                                    <option value="4本">4本</option>
                                    <option value="5本以上">5本以上</option>
                                </select>
                            </div>
                        </div>
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
                            <option value="5piece">5人以上</option>
                            <option value="6piece">6人</option>
                            <option value="other">その他</option>
                            @else
                            <option selected value="0">人数を選択</option>
                            <option value="solo">ソロ</option>
                            <option value="2piece">2人</option>
                            <option value="3piece">3人</option>
                            <option value="3piece">3人</option>
                            <option value="4piece">4人</option>
                            <option value="5piece">5人以上</option>
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

                    <x-jet-section-border />

                    <div class="mt-4 flex items-center justify-start">
                        <div>
                            <div class="mr-1 ml-4 font-medium text-sm text-gray-700">ジャンル</div>
                        </div>
                        <select id="genre" name="genre" class="ml-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 140px; height: 40px;">
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

                    <div class="mt-8 flex items-center justify-start">
                        <div>
                            <div class="mr-1 ml-4 font-medium text-sm text-gray-700">音源</div>
                        </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->audio_data }}" id="audio_data" name="audio_data" class="ml-8" style="width: 200px; height: 36px;" type="text" />
                        @else
                        <x-jet-input id="audio_data" name="audio_data" class="ml-8" style="width: 200px; height: 36px;" type="text" />
                        @endauth
                    </div>

                    <div class="mt-8 flex items-center justify-start">
                        <div>
                            <div class="mr-1 ml-4 font-medium text-sm text-gray-700">備考</div>
                        </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->remarks }}" id="remarks" name="remarks" class="ml-8" style="width: 200px; height: 36px;" type="text" />
                        @else
                        <x-jet-input id="remarks" name="remarks" class="ml-8" style="width: 200px; height: 36px;" type="text" />
                        @endauth
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
