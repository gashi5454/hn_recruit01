<x-applies-layout>
<div class="flex items-top justify-center h-auto bg-white py-4">

<div class="max-w-7xl mt-10 py-10 mx-auto sm:px-6 lg:px-8">

    <div class="mt-8 bg-white border-01">
    <p class="flex justify-center mx-8 py-8 text-base dark:text-gray-900">
        送信内容の確認
    </p>
        <div class="p-6">
            <div class="items-center">

                <div class="applies-table w-full mx-auto" style="max-width:350px">
                    <div class="applies-table-title font-medium xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base text-gray-700" style="width: 140px;">代表者氏名</div>
                    <div class="applies-table-data">
                    @isset($applies['name'])
                        {{ old('name' , $applies['name']) }}
                    @endisset
                    </div>
                </div>

                <div class="applies-table w-full mx-auto" style="max-width:350px">
                    <div class="applies-table-title font-medium xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base text-gray-700" style="width: 140px;">ふりがな</div>
                    <div class="applies-table-data">
                    @isset($applies['kana'])
                        {{ old('kana' , $applies['kana']) }}
                    @endisset
                    </div>
                </div>

                <div class="applies-table w-full mx-auto" style="max-width:350px">
                    <div class="applies-table-title font-medium xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base text-gray-700" style="width: 140px;">バンド/ユニット名</div>
                    <div class="applies-table-data">
                    @isset($applies['name_bands'])
                        {{ old('name_bands' , $applies['name_bands']) }}
                    @endisset
                    </div>
                </div>

                <div class="applies-table w-full mx-auto" style="max-width:350px">
                    <div class="applies-table-title font-medium xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base text-gray-700" style="width: 140px;">フリガナ</div>
                    <div class="applies-table-data">
                    @isset($applies['kana_bands'])
                        {{ old('kana_bands' , $applies['kana_bands']) }}
                    @endisset
                    </div>
                </div>

                <div class="applies-table w-full mx-auto" style="max-width:350px">
                    <div class="applies-table-title font-medium xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base text-gray-700" style="width: 140px;">メールアドレス</div>
                    <div class="applies-table-data">
                    @isset($applies['email'])
                        {{ old('email' , $applies['email']) }}
                    @endisset
                    </div>
                </div>

                <div class="applies-table w-full mx-auto" style="max-width:350px">
                    <div class="applies-table-title font-medium xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base text-gray-700" style="width: 140px;">電話番号</div>
                    <div class="applies-table-data">
                    @isset($applies['tel'])
                        {{ old('tel' , $applies['tel']) }}
                    @endisset
                    </div>
                </div>

                <div class="applies-table w-full mx-auto" style="max-width:350px">
                    <div class="applies-table-title font-medium xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base text-gray-700" style="width: 140px;">その他連絡先</div>
                    <div class="applies-table-data">
                    @isset($applies['other_contact'])
                        {{ old('other_contact' , $applies['other_contact']) }}
                    @endisset
                    </div>
                </div>

                <x-jet-section-border />

                <div class="mt-4 mb-2 ml-8">
                    <x-jet-label for="composition" value="{{ __('バンド/ユニット編成') }}" />
                </div>

                @isset($applies['vo_num'])
                <div class="composition-table">
                    <div class="composition-table-title">ボーカル</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                            {{ old('vo_num' , $applies['vo_num']) }}
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">使用楽器：</div>
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
                @endisset

                @isset($applies['elgt_num'])
                <div class="composition-table">
                    <div class="composition-table-title">エレキギター</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                            {{ old('elgt_num' , $applies['elgt_num']) }}
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            @isset($applies['elgt_mic'])
                                {{ old('elgt_mic' , $applies['elgt_mic']) }}
                            @else
                                {{ old('elgt_mic' , "なし") }}
                            @endisset
                        </div>
                    </div>
                </div>
                @endisset

                @isset($applies['elba_num'])
                <div class="composition-table">
                    <div class="composition-table-title">エレキベース</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                            {{ old('elba_num' , $applies['elba_num']) }}
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
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
                    <div class="composition-table-title">ドラム</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                            {{ old('dr_num' , $applies['dr_num']) }}
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            @isset($applies['dr_mic'])
                                {{ old('dr_mic' , $applies['dr_mic']) }}
                            @else
                                {{ old('dr_mic' , "なし") }}
                            @endisset
                        </div>
                    </div>
                </div>
                @endisset

                @isset($applies['key_num'])
                <div class="composition-table">
                    <div class="composition-table-title">キーボード</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                            {{ old('key_num' , $applies['key_num']) }}
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            @isset($applies['key_mic'])
                                {{ old('key_mic' , $applies['key_mic']) }}
                            @else
                                {{ old('key_mic' , "なし") }}
                            @endisset
                        </div>
                    </div>
                </div>
                @endisset

                @isset($applies['acgt_num'])
                <div class="composition-table">
                    <div class="composition-table-title">アコースティック<br>ギター</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">タイプ：</div>
                            @isset($applies['acgt_type'])
                                {{ old('acgt_type' , $applies['acgt_type']) }}
                            @else
                                {{ old('acgt_type') }}
                            @endisset
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                            {{ old('acgt_num' , $applies['acgt_num']) }}
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            @isset($applies['acgt_mic'])
                                {{ old('acgt_mic' , $applies['acgt_mic']) }}
                            @else
                                {{ old('acgt_mic' , "なし") }}
                            @endisset
                        </div>
                    </div>
                </div>
                @endisset

                @isset($applies['acba_num'])
                <div class="composition-table">
                    <div class="composition-table-title">アコースティック<br>ベース</div>
                    <div class="composition-table-data">
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">タイプ：</div>
                            @isset($applies['acgt_type'])
                                {{ old('acgt_type' , $applies['acgt_type']) }}
                            @else
                                {{ old('acgt_type') }}
                            @endisset
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                            {{ old('acba_num' , $applies['acba_num']) }}
                        </div>
                        <div class="flex items-center justify-center my-1">
                            <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                            @isset($applies['acgt_mic'])
                                {{ old('acgt_mic' , $applies['acgt_mic']) }}
                            @else
                                {{ old('acgt_mic' , "なし") }}
                            @endisset
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

                <x-jet-section-border />

                <div class="applies-table w-full mx-auto" style="max-width:350px">
                    <div class="applies-table-title font-medium xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base text-gray-700" style="width: 140px;">ジャンル</div>
                    <div class="applies-table-data">
                        @isset($applies['genre'])
                            {{ old('genre' , $applies['genre']) }}
                        @endisset
                    </div>
                </div>

                <div class="applies-table w-full mx-auto" style="max-width:350px">
                    <div class="applies-table-title font-medium xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base text-gray-700" style="width: 140px;">音源</div>
                    <div class="applies-table-data">
                        @isset($applies['audio_data_name'])
                            <div class="mt-2">{{ old('audio_data_name' , $applies['audio_data_name']) }}</div>
                        @endisset
                        @isset($applies['audio_url'])
                            <div class="mt-2">{{ old('audio_url' , $applies['audio_url']) }}</div>
                        @endisset
                    </div>
                </div>

                <div class="applies-table w-full mx-auto" style="max-width:350px">
                    <div class="applies-table-title font-medium xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base text-gray-700" style="width: 140px;">備考</div>
                    <div class="applies-table-data">
                        @isset($applies['remarks'])
                            {{ old('remarks' , $applies['remarks']) }}
                        @endisset
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

            </div>
        </div>
    </div>
</div>
</div>
</x-applies-layout>