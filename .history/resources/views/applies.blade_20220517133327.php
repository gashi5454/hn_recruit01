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

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">代表者氏名</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ old('name', Auth::user()->name) }}" id="name" name="name" style="width: 370px; height: 36px;" type="text" placeholder="例）山田太郎" required autofocus autocomplete="name" />
                        @else
                        <x-jet-input value="{{ old('name') }}" id="name" name="name" style="width: 370px; height: 36px;" type="text" placeholder="例）山田太郎" required autofocus autocomplete="name" />
                        @endauth
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">ふりがな</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ old('kana', Auth::user()->kana) }}" id="kana" name="kana" style="width: 370px; height: 36px;" type="text" placeholder="例）やまだたろう" required autofocus autocomplete="kana" />
                        @else
                        <x-jet-input value="{{ old('kana') }}" id="kana" name="kana" style="width: 370px; height: 36px;" type="text" placeholder="例）やまだたろう" required autofocus autocomplete="kana" />
                        @endauth
                        <x-jet-input-error for="kana" class="mt-2" />
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">バンド/ユニット名</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ old('name_bands', Auth::user()->name_bands) }}" id="name_bands" name="name_bands" style="width: 370px; height: 36px;" type="text" placeholder="例）山田太郎band" required autofocus autocomplete="name_bands" />
                        @else
                        <x-jet-input value="{{ old('name_bands') }}" id="name_bands" name="name_bands" style="width: 370px; height: 36px;" type="text" placeholder="例）山田太郎band" required autofocus autocomplete="name_bands" />
                        @endauth
                        <x-jet-input-error for="name_bands" class="mt-2" />
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">フリガナ</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ old('kana_bands', Auth::user()->kana_bands) }}" id="kana_bands" name="kana_bands" style="width: 370px; height: 36px;" type="text" placeholder="例）ヤマダタロウバンド" required autofocus autocomplete="kana_bands" />
                        @else
                        <x-jet-input value="{{ old('kana_bands') }}" id="kana_bands" name="kana_bands" style="width: 370px; height: 36px;" type="text" placeholder="例）ヤマダタロウバンド" required autofocus autocomplete="kana_bands" />
                        @endauth
                        <x-jet-input-error for="kana_bands" class="mt-2" />
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">メールアドレス</div>
                    <div class="applies-table-data">
                        @auth
                        <x-jet-input value="{{ old('email', Auth::user()->email) }}" id="email" name="email" style="width: 370px; height: 36px;" type="email" required autofocus autocomplete="email" />
                        @else
                        <x-jet-input value="{{ old('email') }}" id="email" name="email" style="width: 370px; height: 36px;" type="email" required autofocus autocomplete="email" />
                        @endauth
                        <x-jet-input-error for="email" class="mt-2" />
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
                    <div class="composition-table-title">その他</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-end my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">パート：</div>
                            <x-jet-input id="composition_other" style="width: 380px; height: 40px;" type="text" name="other_part_num" placeholder="例）DJ：1人、パーカッション：1人" />
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

                <x-jet-section-border />

                <div class="applies-table">
                    <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 120px;">ジャンル</div>
                    <div class="applies-table-data">
                        <select id="genre" name="genre" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 200px; height: 36px;">
                            @auth
                            <option value="{{ Auth::user()->genre }}" {{ old('genre') === 'red' ? 'selected' : '' }} >{{ old('genre' , Auth::user()->genre) }}</option>
                            @else
                            <option selected value="" @if(old('genre') === '') selected @endif >{{ old('genre', '選択') }}</option>
                            @endauth
                            @foreach(config('genre') as $index => $name)
                            <option value="{{ $index }}" @if(old('genre') === $index) selected @endif >{{ old('genre', $name) }}</option>

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
                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
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
