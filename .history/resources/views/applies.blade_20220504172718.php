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
                    <div class="mt-4 flex">
                        <x-jet-label for="name" value="{{ __('代表者氏名') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        @auth
                        <x-jet-input value="{{ Auth::user()->name }}" id="name_leader" class="block mt-1 w-full" style="height: 30px;" type="text" name="name_leader" />
                        @else
                        <x-jet-input id="name" class="block mt-1 w-full" style="height: 30px;" type="text" name="name_leader" />
                        @endauth
                        <x-jet-input-error for="name" class="mt-2" />

                    <div class="mt-4 flex">
                        <x-jet-label for="name_bands" value="{{ __('バンド/ユニット名') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        <x-jet-input id="name_bands" class="block mt-1 w-full" style="height: 30px;" type="text" name="name_bands" />
                        <x-jet-input-error for="name" class="mt-2" />

                    <div class="mt-4">
                        <x-jet-label for="kana" value="{{ __('読み仮名') }}" />
                        <x-jet-input id="kana" class="block mt-1 w-full" style="height: 30px;" type="text" name="kana" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="tel" value="{{ __('電話番号 （※ 必須）') }}" />
                        @auth
                        <x-jet-input value="{{ Auth::user()->tel }}" id="tel" class="block mt-1 w-full" style="height: 30px;" type="text" name="tel" />
                        @else
                        <x-jet-input id="tel" class="block mt-1 w-full" style="height: 30px;" type="text" name="tel" />
                        @endauth
                        <x-jet-input-error for="tel" class="mt-2" /><!-- バリデーション未実装 -->
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="tel" value="{{ __('メールアドレス （※ 必須）') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" style="height: 30px;" type="email" name="email" />
                        <x-jet-input-error for="email" class="mt-2" /><!-- バリデーション未実装 -->
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="other_contact" value="{{ __('その他連絡先 （LINE、Skypeなど）') }}" />
                        <x-jet-input id="other_contact" class="block mt-1 w-full" style="height: 30px;" type="text" name="other_contact" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="genre" value="{{ __('ジャンル') }}" />
                            <select id="genre" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="genre">
                                <option selected value="">選択</option>
                                @foreach(config('genre') as $index => $name)
                                <option value="{{ $index }}">{{$name}}</option>
                                @endforeach
                            </select>

                        <x-jet-input id="genre" class="block mt-1 w-full" style="height: 30px;" type="text" name="genre" />
                        <x-jet-input-error for="genre" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="composition" value="{{ __('バンド/ユニット編成') }}" />
                        <select id="composition" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="composition">
                            <option selected value="">選択</option>
                            <option value=""></option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="audio_data" value="{{ __('音源') }}" />
                        <x-jet-input id="audio_data" class="block mt-1 w-full" style="height: 30px;" type="text" name="audio_data" />
                        <x-jet-input-error for="audio_data" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="genre" value="{{ __('備考') }}" />
                        <x-jet-input id="genre" class="block mt-1 w-full" style="height: 30px;" type="text" name="genre" />
                        <x-jet-input-error for="genre" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-center mt-6">
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
