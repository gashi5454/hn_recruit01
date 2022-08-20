<x-applies-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

<div class="max-w-5xl mt-10 py-10 mx-auto xs:px-0 min:px-0 sm:px-4 md:px-6 lg:px-6">
    <p class="text-xl flex justify-center mx-8 xs:pt-0 min:pt-0 sm:pt-0 md:pt-8 lg:pt-8 xs:text-lg min:text-lg sm:text-xl md:text-xl lg:text-xl dark:text-gray-900">
    送信内容の確認
    </p>

    <div class="mt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">

        <!-- 小画面 -->
        <div class="p-2 xs:block min:block sm:hidden md:hidden lg:hidden" style="min-width:300px;">

            <div class="flex justify-center text-center">
                <div class="bg-blue-400 text-white text-base w-full mb-6" style="max-width:280px;">エントリー情報</div>
            </div>

            <div class="mt-6 mx-2">
                <x-jet-label for="name" value="{{ __('代表者氏名') }}" />
                    @isset($applies['name'])
                        {{ old('name' , $applies['name']) }}
                    @endisset
            </div>

            <div class="mt-6 mx-2">
                <x-jet-label for="kana" value="{{ __('ふりがな') }}" />
                @isset($applies['kana'])
                        {{ old('kana' , $applies['kana']) }}
                    @endisset
            </div>

            <div class="mt-6 mx-2">
                <x-jet-label for="name_bands" value="{{ __('バンド/ユニット名') }}" />
                @isset($applies['name_bands'])
                        {{ old('name_bands' , $applies['name_bands']) }}
                    @endisset
            </div>

            <div class="mt-6 mx-2">
                <x-jet-label for="kana_bands" value="{{ __('フリガナ') }}" />
                @isset($applies['kana_bands'])
                        {{ old('kana_bands' , $applies['kana_bands']) }}
                    @endisset
            </div>

            <div class="mt-6 mx-2">
                <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
                @isset($applies['email'])
                        {{ old('email' , $applies['email']) }}
                    @endisset
            </div>

            <div class="mt-6 mx-2">
                <x-jet-label for="tel" value="{{ __('電話番号') }}" />
                @isset($applies['tel'])
                        {{ old('tel' , $applies['tel']) }}
                    @endisset
            </div>

            <div class="mt-6 mx-2">
                <x-jet-label for="other_contact" value="{{ __('その他連絡先') }}" />
                @isset($applies['other_contact'])
                        {{ old('other_contact' , $applies['other_contact']) }}
                    @endisset
            </div>

            <x-jet-section-border />

            <div class="flex justify-center text-center">
                <div class="bg-gray-500 text-white text-base mt-16 mb-6 w-full" style="max-width:280px;">バンド/ユニット編成</div>
            </div>

            <div class="responsive-composition-table-data mx-2" style="max-width:266px;">
                <x-jet-label for="other_contact" value="{{ __('ボーカル') }}" />
                <div class="mt-4 text-gray-900 dark:text-gray-900 text-sm">人数：1人</div>

                <div class="mt-4 text-gray-900 dark:text-gray-900 text-sm">使用楽器：ギター</div>
            </div>

            <div class="responsive-composition-table-data mx-2" style="max-width:266px;">
                <x-jet-label for="other_contact" value="{{ __('エレキギター') }}" />
                <div class="mt-4 text-gray-900 dark:text-gray-900 text-sm">人数：1人</div>
                <div class="mt-4 text-gray-900 dark:text-gray-900 text-sm">コーラスマイク本数：1本</div>
            </div>

            <div class="responsive-composition-table-data mx-2" style="max-width:266px;">
                <x-jet-label for="other_contact" value="{{ __('エレキベース') }}" />
                <div class="mt-4 text-gray-900 dark:text-gray-900 text-sm">人数：1人</div>
                <div class="mt-4 text-gray-900 dark:text-gray-900 text-sm">コーラスマイク本数：なし</div>
            </div>

            <div class="responsive-composition-table-data mx-2" style="max-width:266px;">
                <x-jet-label for="other_contact" value="{{ __('ドラム') }}" />
                <div class="mt-4 text-gray-900 dark:text-gray-900 text-sm">人数：1人</div>
                <div class="mt-4 text-gray-900 dark:text-gray-900 text-sm">コーラスマイク本数：なし</div>
            </div>

            <x-jet-section-border />

            <div class="mt-6 mx-2">
                <x-jet-label for="other_contact" value="{{ __('ジャンル') }}" />
                メタルコア
            </div>

            <div class="mt-6 mx-2">
                <x-jet-label for="other_contact" value="{{ __('音源') }}" />
                新曲.mp3
            </div>

            <div class="mt-6 mx-2">
                <x-jet-label for="other_contact" value="{{ __('備考') }}" />
                社会人
            </div>

            <div class="mt-8 flex items-center justify-center">
                <x-jet-button class="m-4 text-base">
                    {{ __('確認') }}
                </x-jet-button>
            </div>
            </form>
        </div><!-- p-6 小画面-->

    </div><!-- mt-8 -->
</div>
</div>
</x-applies-layout>
