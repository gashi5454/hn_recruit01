<x-applies-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

<div class="max-w-7xl mt-10 py-10 mx-auto sm:px-6 lg:px-8">
    <p class="text-2xl flex justify-center mx-4 pt-8 px-40 sm:pt-0 dark:text-gray-900">
        応募情報を入力してください
    </p>

    <div class="mt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
        <div class="p-6">
            <div class="items-center">
                <form action="{{ url('/send_applies')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field()}}
                {{method_field('post')}}

                @if ($errors->any())
                        <div class="font-medium text-red-600 text-center">{{ __('Whoops! Something went wrong.') }}</div>

                        <ul class="mt-3 ml-56 list-disc list-inside text-sm text-red-600 text-left">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                @endif

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">代表者氏名</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ old('name', Auth::user()->name) }}" id="name" name="name" style="width: 370px; height: 36px;" type="text" placeholder="例）山田太郎" autofocus autocomplete="name" />
                        @else
                        <x-jet-input value="{{ old('name') }}" id="name" name="name" style="width: 370px; height: 36px;" type="text" placeholder="例）山田太郎" autofocus autocomplete="name" />
                        @endauth
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">ふりがな</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ old('kana', Auth::user()->kana) }}" id="kana" name="kana" style="width: 370px; height: 36px;" type="text" placeholder="例）やまだたろう" autofocus autocomplete="kana" />
                        @else
                        <x-jet-input value="{{ old('kana') }}" id="kana" name="kana" style="width: 370px; height: 36px;" type="text" placeholder="例）やまだたろう" autofocus autocomplete="kana" />
                        @endauth
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">バンド/ユニット名</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ old('name_bands', Auth::user()->name_bands) }}" id="name_bands" name="name_bands" style="width: 370px; height: 36px;" type="text" placeholder="例）山田太郎band" autofocus autocomplete="name_bands" />
                        @else
                        <x-jet-input value="{{ old('name_bands') }}" id="name_bands" name="name_bands" style="width: 370px; height: 36px;" type="text" placeholder="例）山田太郎band" autofocus autocomplete="name_bands" />
                        @endauth
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">フリガナ</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ old('kana_bands', Auth::user()->kana_bands) }}" id="kana_bands" name="kana_bands" style="width: 370px; height: 36px;" type="text" placeholder="例）ヤマダタロウバンド" autofocus autocomplete="kana_bands" />
                        @else
                        <x-jet-input value="{{ old('kana_bands') }}" id="kana_bands" name="kana_bands" style="width: 370px; height: 36px;" type="text" placeholder="例）ヤマダタロウバンド" autofocus autocomplete="kana_bands" />
                        @endauth
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">メールアドレス</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ old('email', Auth::user()->email) }}" id="email" name="email" style="width: 370px; height: 36px;" type="email" autofocus autocomplete="email" />
                        @else
                        <x-jet-input value="{{ old('email') }}" id="email" name="email" style="width: 370px; height: 36px;" type="email" autofocus autocomplete="email" />
                        @endauth
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 170px;">電話番号</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ old('tel', Auth::user()->tel) }}" id="tel" name="tel" style="width: 370px; height: 36px;" type="text" autofocus autocomplete="tel" />
                        @else
                        <x-jet-input value="{{ old('tel') }}" id="tel" name="tel" style="width: 370px; height: 36px;" type="text" autofocus autocomplete="tel" />
                        @endauth
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 170px;">その他連絡先</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ old('other_contact', Auth::user()->other_contact) }}" id="other_contact" name="other_contact" style="width: 370px; height: 36px;" type="text" placeholder="LINE ID、Skypeなど" autofocus autocomplete="other_contact" />
                        @else
                        <x-jet-input value="{{ old('other_contact') }}" id="other_contact" name="other_contact" style="width: 370px; height: 36px;" type="text" placeholder="LINE ID、Skypeなど" autofocus autocomplete="other_contact" />
                        @endauth
                    </div>
                </div>

                <x-jet-section-border />

                <div class="mt-4 mb-2 ml-8">
                    <x-jet-label for="composition" value="{{ __('バンド/ユニット編成') }}" />
                </div>

                <div class="composition-table">
                    <div class="composition-table-title">ボーカル</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                            <select id="vo_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="vo_num">
                                <option value="0人" @if(old('vo_num') === "0人") selected @endif @if("Auth::user()->vo_num" === "0人") selected @endif >0人</option>
                                <option value="1人" @if(old('vo_num') === "1人") selected @endif >1人</option>
                                <option value="2人" @if(old('vo_num') === "2人") selected @endif >2人</option>
                                <option value="3人" @if(old('vo_num') === "3人") selected @endif >3人</option>
                                <option value="4人" @if(old('vo_num') === "4人") selected @endif >4人</option>
                                <option value="5人以上" @if(old('vo_num') === "5人以上") selected @endif >5人以上</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">使用楽器(兼任ボーカルのみ)：</div>
                            <select id="vo_inst" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 180px; height: 40px;" name="vo_inst">
                                @auth
                                <option value="{{ Auth::user()->vo_inst }}" @if(old('vo_inst') === "Auth::user()->vo_inst") selected @endif >{{ Auth::user()->vo_inst }}</option>
                                @endauth
                                <option value="なし" @if(old('vo_inst') === "なし") selected @endif >なし</option>
                                <option value="エレキギター" @if(old('vo_inst') === "エレキギター") selected @endif >エレキギター</option>
                                <option value="エレキベース" @if(old('vo_inst') === "エレキベース") selected @endif >ベース</option>
                                <option value="ドラム" @if(old('vo_inst') === "ドラム") selected @endif >ドラム</option>
                                <option value="キーボード" @if(old('vo_inst') === "キーボード") selected @endif >キーボード</option>
                                <option value="アコースティックギター" @if(old('vo_inst') === "アコースティックギター") selected @endif >アコースティックギター</option>
                                <option value="アコースティックベース" @if(old('vo_inst') === "アコースティックベース") selected @endif >アコースティックベース</option>
                                <option value="その他" @if(old('vo_inst') === "その他") selected @endif >その他</option>
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
                                @auth
                                <option value="{{ Auth::user()->elgt_num }}" @if(old('elgt_num') === "Auth::user()->elgt_num") selected @endif >{{ Auth::user()->elgt_num }}</option>
                                @endauth
                                <option value="0人" @if(old('elgt_num') === "0人") selected @endif >0人</option>
                                <option value="1人" @if(old('elgt_num') === "1人") selected @endif >1人</option>
                                <option value="2人" @if(old('elgt_num') === "2人") selected @endif >2人</option>
                                <option value="3人" @if(old('elgt_num') === "3人") selected @endif >3人</option>
                                <option value="4人" @if(old('elgt_num') === "4人") selected @endif >4人</option>
                                <option value="5人以上" @if(old('elgt_num') === "5人以上") selected @endif >5人以上</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            <select id="elgt_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="elgt_mic">
                                @auth
                                <option value="{{ Auth::user()->elgt_mic }}" @if(old('elgt_mic') === "Auth::user()->elgt_mic") selected @endif >{{ Auth::user()->elgt_mic }}</option>
                                @endauth
                                <option value="なし" @if(old('elgt_mic') === "なし") selected @endif >なし</option>
                                <option value="1本" @if(old('elgt_mic') === "1本") selected @endif >1本</option>
                                <option value="2本" @if(old('elgt_mic') === "2本") selected @endif >2本</option>
                                <option value="3本" @if(old('elgt_mic') === "3本") selected @endif >3本</option>
                                <option value="4本" @if(old('elgt_mic') === "4本") selected @endif >4本</option>
                                <option value="5本以上" @if(old('elgt_mic') === "5本以上") selected @endif >5本以上</option>
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
                                @auth
                                <option value="{{ Auth::user()->elba_num }}" @if(old('elba_num') === "Auth::user()->elba_num") selected @endif >{{ Auth::user()->elba_num }}</option>
                                @endauth
                                <option value="0人" @if(old('elba_num') === "0人") selected @endif >0人</option>
                                <option value="1人" @if(old('elba_num') === "1人") selected @endif >1人</option>
                                <option value="2人" @if(old('elba_num') === "2人") selected @endif >2人</option>
                                <option value="3人" @if(old('elba_num') === "3人") selected @endif >3人</option>
                                <option value="4人" @if(old('elba_num') === "4人") selected @endif >4人</option>
                                <option value="5人以上" @if(old('elba_num') === "5人以上") selected @endif >5人以上</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            <select id="elba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="elba_mic">
                                @auth
                                <option value="{{ Auth::user()->elba_mic }}" @if(old('elba_mic') === "Auth::user()->elba_mic") selected @endif >{{ Auth::user()->elba_mic }}</option>
                                @endauth
                                <option value="なし" @if(old('elba_mic') === "なし") selected @endif >なし</option>
                                <option value="1本" @if(old('elba_mic') === "1本") selected @endif >1本</option>
                                <option value="2本" @if(old('elba_mic') === "2本") selected @endif >2本</option>
                                <option value="3本" @if(old('elba_mic') === "3本") selected @endif >3本</option>
                                <option value="4本" @if(old('elba_mic') === "4本") selected @endif >4本</option>
                                <option value="5本以上" @if(old('elba_mic') === "5本以上") selected @endif >5本以上</option>
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
                                @auth
                                <option value="{{ Auth::user()->dr_num }}" @if(old('dr_num') === "Auth::user()->dr_num") selected @endif >{{ Auth::user()->dr_num }}</option>
                                @endauth
                                <option value="0人" @if(old('dr_num') === "0人") selected @endif >0人</option>
                                <option value="1人" @if(old('dr_num') === "1人") selected @endif >1人</option>
                                <option value="2人" @if(old('dr_num') === "2人") selected @endif >2人</option>
                                <option value="3人" @if(old('dr_num') === "3人") selected @endif >3人</option>
                                <option value="4人" @if(old('dr_num') === "4人") selected @endif >4人</option>
                                <option value="5人以上" @if(old('dr_num') === "5人以上") selected @endif >5人以上</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            <select id="dr_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="dr_mic">
                                @auth
                                <option value="{{ Auth::user()->dr_mic }}" @if(old('dr_mic') === "Auth::user()->dr_mic") selected @endif >{{ Auth::user()->dr_mic }}</option>
                                @endauth
                                <option value="なし" @if(old('dr_mic') === "なし") selected @endif >なし</option>
                                <option value="1本" @if(old('dr_mic') === "1本") selected @endif >1本</option>
                                <option value="2本" @if(old('dr_mic') === "2本") selected @endif >2本</option>
                                <option value="3本" @if(old('dr_mic') === "3本") selected @endif >3本</option>
                                <option value="4本" @if(old('dr_mic') === "4本") selected @endif >4本</option>
                                <option value="5本以上" @if(old('dr_mic') === "5本以上") selected @endif >5本以上</option>
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
                                @auth
                                <option value="{{ Auth::user()->key_num }}" @if(old('key_num') === "Auth::user()->key_num") selected @endif >{{ Auth::user()->key_num }}</option>
                                @endauth
                                <option value="0人" @if(old('key_num') === "0人") selected @endif >0人</option>
                                <option value="1人" @if(old('key_num') === "1人") selected @endif >1人</option>
                                <option value="2人" @if(old('key_num') === "2人") selected @endif >2人</option>
                                <option value="3人" @if(old('key_num') === "3人") selected @endif >3人</option>
                                <option value="4人" @if(old('key_num') === "4人") selected @endif >4人</option>
                                <option value="5人以上" @if(old('key_num') === "5人以上") selected @endif >5人以上</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            <select id="key_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="key_mic">
                                @auth
                                <option value="{{ Auth::user()->key_mic }}" @if(old('key_mic') === "Auth::user()->key_mic") selected @endif >{{ Auth::user()->key_mic }}</option>
                                @endauth
                                <option value="なし" @if(old('key_mic') === "なし") selected @endif >なし</option>
                                <option value="1本" @if(old('key_mic') === "1本") selected @endif >1本</option>
                                <option value="2本" @if(old('key_mic') === "2本") selected @endif >2本</option>
                                <option value="3本" @if(old('key_mic') === "3本") selected @endif >3本</option>
                                <option value="4本" @if(old('key_mic') === "4本") selected @endif >4本</option>
                                <option value="5本以上" @if(old('key_mic') === "5本以上") selected @endif >5本以上</option>
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
                                @auth
                                <option value="{{ Auth::user()->acgt_type }}" @if(old('acgt_type') === "Auth::user()->acgt_type") selected @endif >{{ Auth::user()->acgt_type }}</option>
                                @endauth
                                <option value="選択" @if(old('acgt_type') === "選択") selected @endif >選択</option>
                                <option value="エレアコ" @if(old('acgt_type') === "エレアコ") selected @endif >エレアコ</option>
                                <option value="アコースティック" @if(old('acgt_type') === "アコースティック") selected @endif >アコースティック</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                            <select id="acgt_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="acgt_num">
                                @auth
                                <option value="{{ Auth::user()->acgt_num }}" @if(old('acgt_num') === "Auth::user()->acgt_num") selected @endif >{{ Auth::user()->acgt_num }}</option>
                                @endauth
                                <option value="0人" @if(old('acgt_num') === "0人") selected @endif >0人</option>
                                <option value="1人" @if(old('acgt_num') === "1人") selected @endif >1人</option>
                                <option value="2人" @if(old('acgt_num') === "2人") selected @endif >2人</option>
                                <option value="3人" @if(old('acgt_num') === "3人") selected @endif >3人</option>
                                <option value="4人" @if(old('acgt_num') === "4人") selected @endif >4人</option>
                                <option value="5人以上" @if(old('acgt_num') === "5人以上") selected @endif >5人以上</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            <select id="acgt_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="acgt_mic">
                                @auth
                                <option value="{{ Auth::user()->acgt_mic }}" @if(old('acgt_mic') === "Auth::user()->acgt_mic") selected @endif >{{ Auth::user()->acgt_mic }}</option>
                                @endauth
                                <option value="なし" @if(old('acgt_mic') === "なし") selected @endif >なし</option>
                                <option value="1本" @if(old('acgt_mic') === "1本") selected @endif >1本</option>
                                <option value="2本" @if(old('acgt_mic') === "2本") selected @endif >2本</option>
                                <option value="3本" @if(old('acgt_mic') === "3本") selected @endif >3本</option>
                                <option value="4本" @if(old('acgt_mic') === "4本") selected @endif >4本</option>
                                <option value="5本以上" @if(old('acgt_mic') === "5本以上") selected @endif >5本以上</option>
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
                                @auth
                                <option value="{{ Auth::user()->acba_type }}" @if(old('acba_type') === "Auth::user()->acba_type") selected @endif >{{ Auth::user()->acba_type }}</option>
                                @endauth
                                <option value="選択" @if(old('acba_type') === "選択") selected @endif >選択</option>
                                <option value="エレアコ" @if(old('acba_type') === "エレアコ") selected @endif >エレアコ</option>
                                <option value="アコースティック" @if(old('acba_type') === "アコースティック") selected @endif >アコースティック</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                            <select id="acba_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="acba_num">
                                @auth
                                <option value="{{ Auth::user()->acba_num }}" @if(old('acba_num') === "Auth::user()->acba_num") selected @endif >{{ Auth::user()->acba_num }}</option>
                                @endauth
                                <option value="0人" @if(old('acba_num') === "0人") selected @endif >0人</option>
                                <option value="1人" @if(old('acba_num') === "1人") selected @endif >1人</option>
                                <option value="2人" @if(old('acba_num') === "2人") selected @endif >2人</option>
                                <option value="3人" @if(old('acba_num') === "3人") selected @endif >3人</option>
                                <option value="4人" @if(old('acba_num') === "4人") selected @endif >4人</option>
                                <option value="5人以上" @if(old('acba_num') === "5人以上") selected @endif >5人以上</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            <select id="acba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="acba_mic">
                                @auth
                                <option value="{{ Auth::user()->acba_mic }}" @if(old('acba_mic') === "Auth::user()->acba_mic") selected @endif >{{ Auth::user()->acba_mic }}</option>
                                @endauth
                                <option value="なし" @if(old('acba_mic') === "なし") selected @endif >なし</option>
                                <option value="1本" @if(old('acba_mic') === "1本") selected @endif >1本</option>
                                <option value="2本" @if(old('acba_mic') === "2本") selected @endif >2本</option>
                                <option value="3本" @if(old('acba_mic') === "3本") selected @endif >3本</option>
                                <option value="4本" @if(old('acba_mic') === "4本") selected @endif >4本</option>
                                <option value="5本以上" @if(old('acba_mic') === "5本以上") selected @endif >5本以上</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="composition-table">
                    <div class="composition-table-title">その他</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">パート：</div>
                            <x-jet-input id="composition_other" value="{{ old('other_part_num', Auth::user()->other_part_num) }}" style="width: 380px; height: 40px;" type="text" name="other_part_num" placeholder="例）DJ：1人、パーカッション：1人" />
                        </div>
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            <select id="other_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="other_mic">
                                @auth
                                <option value="{{ Auth::user()->other_mic }}" @if(old('other_mic') === "Auth::user()->other_mic") selected @endif >{{ Auth::user()->other_mic }}</option>
                                @endauth
                                <option value="なし" @if(old('other_mic') === "なし") selected @endif >なし</option>
                                <option value="1本" @if(old('other_mic') === "1本") selected @endif >1本</option>
                                <option value="2本" @if(old('other_mic') === "2本") selected @endif >2本</option>
                                <option value="3本" @if(old('other_mic') === "3本") selected @endif >3本</option>
                                <option value="4本" @if(old('other_mic') === "4本") selected @endif >4本</option>
                                <option value="5本以上" @if(old('other_mic') === "5本以上") selected @endif >5本以上</option>
                            </select>
                        </div>
                    </div>
                </div>

                <x-jet-section-border />

                <div class="applies-table">
                    <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 120px;">ジャンル</div>
                    <div class="applies-table-data">
                        <select id="genre" name="genre" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 200px; height: 36px;">
                            @auth
                            <option value="{{ Auth::user()->genre }}" @if(old('genre') === "Auth::user()->genre") selected @endif >{{ Auth::user()->genre }}</option>
                            @else
                            <option value="" @if(old('genre') === '') selected @endif >選択</option>
                            @endauth
                            @foreach(config('genre') as $index => $name)
                            <option value="{{ $index }}" @if(old('genre') === $index) selected @endif >{{ $name }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 120px;">音源</div>
                    <div class="applies-table-data">
                    <select id="audio_select" onchange="changeAudioView()" name="audio_select" class="my-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm focus:outline-none" style="width: 200px; height: 36px;">
                        <option selected value="">選択</option>
                        <option value="data">ファイルを送信する</option>
                        <option value="url">動画などのURLを送信する</option>
                    </select>
                        @auth
                            <div id="dataIsOpen"><input id="audio_data" name="audio_data" class="my-1" type="file" /></div>
                            <div id="urlIsOpen"><x-jet-input value="{{ old('audio_url', Auth::user()->audio_url) }}" id="audio_url" name="audio_url" class="my-1" style="width: 395px; height: 36px;" type="text" placeholder="youtubeのURLなど" /></div>
                            @else
                            <div id="dataIsOpen"><input value="{{ old('audio_data') }}" id="audio_data" name="audio_data" class="my-1" type="file" /></div>
                            <div id="urlIsOpen"><x-jet-input value="{{ old('audio_url') }}" id="audio_url" name="audio_url" class="my-1" style="width: 395px; height: 36px;" type="text" placeholder="youtubeのURLなど" /></div>
                        @endauth
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 120px;">備考</div>
                    <div class="applies-table-data">
                        @auth
                        <textarea value="{{ old('remarks', Auth::user()->remarks) }}" id="remarks" name="remarks" rows="10" cols="40" style="height: 130px;" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ Auth::user()->remarks }}</textarea>
                        @else
                        <textarea value="{{ old('remarks') }}" id="remarks" name="remarks" rows="10" cols="40" style="height: 130px;" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                        @endauth
                    </div>
                </div>

                <div class="mt-8 flex items-center justify-center">
                @auth
                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                @endauth
                <input type="hidden" value="{{ $eventer_id }}" name="eventer_id">
                <input type="hidden" value="{{ $eventer_email }}" name="eventer_email">
                <input type="hidden" value="{{ $offer_id }}" name="offer_id">
                <input type="hidden" value="{{ $appear_date }}" name="appear_date">
                <input type="hidden" value="{{ $title }}" name="title">
                <input type="hidden" value="{{ $eventer_genre }}" name="eventer_genre">
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
</x-applies-layout>
