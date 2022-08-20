<x-applies-layout>
<div class="flex items-top justify-center h-auto bg-white py-4">
    <div class="mt-10 py-10 mx-auto">
        <div class="mt-8 bg-white border-01">
            <p class="flex justify-center py-8 text-lg dark:text-gray-900">
                送信内容の確認
            </p>

            <div class="p-2 line-break items-center xs:w-full min:w-305px sm:w-500px md:w-600px lg:w-700px">

                <div class="flex justify-center bg-gray-500 text-white text-base xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8 mb-16">エントリー情報</div>

                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">代表者氏名</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">
                            @isset($applies['name'])
                                {{ old('name' , $applies['name']) }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>

                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">ふりがな</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">
                            @isset($applies['kana'])
                                {{ old('kana' , $applies['kana']) }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>

                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">バンド/ユニット名</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">
                            @isset($applies['name_bands'])
                                {{ old('name_bands' , $applies['name_bands']) }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>

                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">フリガナ</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">
                            @isset($applies['kana_bands'])
                                {{ old('kana_bands' , $applies['kana_bands']) }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>

                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">メールアドレス</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">
                            @isset($applies['email'])
                                {{ old('email' , $applies['email']) }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>

                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">その他連絡先</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">
                            @isset($applies['other_contact'])
                                {{ old('other_contact' , $applies['other_contact']) }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center bg-gray-500 text-white text-base xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8 my-16">バンド/ユニット情報</div>

                @isset($applies['vo_num'])
                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">ボーカル</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数：
                                {{ old('vo_num' , $applies['vo_num']) }}
                            </div>
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">使用楽器：
                            @isset($applies['vo_inst'])
                                @if($applies['vo_inst'] == 'その他')
                                    @isset($applies['vo_inst_other'])
                                        その他({{ old('vo_inst_other' , $applies['vo_inst_other']) }})
                                    @else
                                        {{ old('vo_inst_other' , "") }}
                                    @endisset
                                @else
                                {{ old('vo_inst' , $applies['vo_inst']) }}
                                @endif
                            @else
                                {{ old('vo_inst' , "なし") }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>
                @endisset

                @isset($applies['elgt_num'])
                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">エレキギター</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数：
                                {{ old('elgt_num' , $applies['elgt_num']) }}
                            </div>
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数：
                            @isset($applies['elgt_mic'])
                                {{ old('elgt_mic' , $applies['elgt_mic']) }}
                            @else
                                {{ old('elgt_mic' , "なし") }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>
                @endisset

                @isset($applies['elba_num'])
                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">エレキベース</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数：
                            {{ old('elba_num' , $applies['elba_num']) }}
                        </div>
                        <div class="flex items-center justify-center my-1 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数：
                        @isset($applies['elba_mic'])
                            {{ old('elba_mic' , $applies['elba_mic']) }}
                        @else
                            {{ old('elba_mic' , "なし") }}
                        @endisset
                        </div>
                    </div>
                </div>
                @endisset

                @isset($applies['dr_num'])
                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">ドラム</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数：
                                {{ old('dr_num' , $applies['dr_num']) }}
                            </div>
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数：
                            @isset($applies['dr_mic'])
                                {{ old('dr_mic' , $applies['dr_mic']) }}
                            @else
                                {{ old('dr_mic' , "なし") }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>
                @endisset

                @isset($applies['key_num'])
                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">キーボード</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数：
                                {{ old('key_num' , $applies['key_num']) }}
                            </div>
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数：
                            @isset($applies['key_mic'])
                                {{ old('key_mic' , $applies['key_mic']) }}
                            @else
                                {{ old('key_mic' , "なし") }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>
                @endisset

                @isset($applies['acgt_num'])
                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">アコースティック<br>ギター</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">タイプ：
                            @isset($applies['acgt_type'])
                                {{ old('acgt_type' , $applies['acgt_type']) }}
                            @else
                                {{ old('acgt_type') }}
                            @endisset
                            </div>
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数：
                                {{ old('acgt_num' , $applies['acgt_num']) }}
                            </div>
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数：
                            @isset($applies['acgt_mic'])
                                {{ old('acgt_mic' , $applies['acgt_mic']) }}
                            @else
                                {{ old('acgt_mic' , "なし") }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>
                @endisset

                @isset($applies['acba_num'])
                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">アコースティック<br>ベース</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">タイプ：
                            @isset($applies['acba_type'])
                                {{ old('acba_type' , $applies['acba_type']) }}
                            @else
                                {{ old('acba_type') }}
                            @endisset
                            </div>
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数：
                                {{ old('acba_num' , $applies['acba_num']) }}
                            </div>
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数：
                            @isset($applies['acgt_mic'])
                                {{ old('acba_mic' , $applies['acba_mic']) }}
                            @else
                                {{ old('acba_mic' , "なし") }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>
                @endisset

                @isset($applies['other_part_num'])
                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">その他</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">パート：</div>
                            {{ old('other_part_num' , $applies['other_part_num']) }}
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数：
                            @isset($applies['other_mic'])
                                {{ old('other_mic' , $applies['other_mic']) }}
                            @else
                                {{ old('other_mic' , "なし") }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>
                @endisset

                @isset($applies['other_part_num'])
                <div class="composition-table">
                    <div class="composition-table-title">その他</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">パート：</div>
                            {{ old('other_part_num' , $applies['other_part_num']) }}
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            @isset($applies['other_mic'])
                                {{ old('other_mic' , $applies['other_mic']) }}
                            @else
                                {{ old('other_mic' , "なし") }}
                            @endisset
                        </div>
                    </div>
                </div>
                @endisset

                <div class="block">
                    <div class="py-8">
                        <div class="border-t border-gray-300"></div>
                    </div>
                </div>

                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">ジャンル</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">
                            @isset($applies['genre'])
                                {{ old('genre' , $applies['genre']) }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>

                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">音源</div>
                    <div class="composition-table-data">
                        <div class="my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">
                            @isset($applies['audio_data_name'])
                                <div class="flex items-center justify-center">ファイル名：{{ old('audio_data_name' , $applies['audio_data_name']) }}</div>
                            @endisset
                            @isset($applies['audio_url'])
                                <div class="flex items-center justify-center">URL：{{ old('audio_url' , $applies['audio_url']) }}</div>
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>

                <div class="composition-table">
                    <div class="composition-table-title xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">備考</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">
                            @isset($applies['remarks'])
                                {{ old('remarks' , $applies['remarks']) }}
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex items-center justify-center">
                    <form action="{{ url('/send_applies')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    {{method_field('post')}}

                    @foreach($applies as $name => $value)
                    <input type="hidden" value="{{ $value }}" name="{{ $name }}">
                    @endforeach

                    <x-jet-button id="openModal" class="m-4 text-base">
                        {{ __('送信') }}
                    </x-jet-button>

                    </form>
                </div><!-- mt-8 -->
            </div><!-- p-2 -->
        </div><!-- mt-8 -->
    </div><!-- max-w-7xl -->
</div><!-- flex items-top -->
</x-applies-layout>
