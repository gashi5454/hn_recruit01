<x-guest-layout>
<div class="flex items-top justify-center h-auto bg-white">

<div class="mt-10 py-10 mx-auto sm:px-6 lg:px-8">
    <div class="shrink-0 flex items-center justify-center mb-8">
        <a href="{{ route('welcome') }}">
            <img style="width:50px; height:50px;" src="{{ asset('storage\icon\imvibes_icon.png') }}" alt="icon">
        </a>
    </div>

    <p class="text-xl flex justify-center mx-4 pt-6 px-40 sm:pt-0 dark:text-gray-900">
        新規会員登録
    </p>

    <div class="mt-8 border-01">
        <div class="p-2 xs:w-full min:w-305px sm:w-500px md:w-600px lg:w-700px">
                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field()}}
                {{method_field('post')}}
                <div class="flex justify-center bg-gray-500 text-white text-base xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8 my-16">エントリー情報</div>

                @if ($errors->any())
                    <div class="font-medium text-red-600 text-center">{{ __('Whoops! Something went wrong.') }}</div>

                    <ul class="mt-3 ml-56 list-disc list-inside text-sm text-red-600 text-left">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                    <x-jet-label class="req" for="name" value="{{ __('代表者氏名') }}" />
                    <x-jet-input value="{{ old('name') }}" id="name" name="name" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）山田太郎" autofocus autocomplete="name" />
                </div>

                <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                    <x-jet-label class="req" for="kana" value="{{ __('ふりがな') }}" />
                    <x-jet-input value="{{ old('kana') }}" id="kana" name="kana" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）山田太郎" autofocus autocomplete="kana" />
                </div>

                <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                    <x-jet-label class="req" for="email" value="{{ __('メールアドレス') }}" />
                    <x-jet-input value="{{ old('email') }}" id="email" name="email" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="email" autofocus autocomplete="email" />
                </div>

                <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                    <x-jet-label class="req" for="password" value="{{ __('パスワード') }}" />
                    <x-jet-input value="{{ old('password') }}" id="password" name="password" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="password" autofocus autocomplete="new-password" />
                </div>

                <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                    <x-jet-label class="req" for="password_confirmation" value="{{ __('パスワード確認用') }}" />
                    <x-jet-input value="{{ old('password_confirmation') }}" id="password_confirmation" name="password_confirmation" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="password" autofocus autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-around mt-8">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>

                <div x-data="{isShow:false}" class="pt-6">
                    <div class="mt-4 flex justify-center">
                        <x-jet-secondary-button class="text-base" type="button" @click="isShow= !isShow">
                            {{ __('任意項目を表示') }}
                        </x-jet-secondary-button>
                    </div>
                    <div class="flex justify-center my-2 mb-4 text-gray-600 dark:text-gray-400 text-sm">
                        {{ __('バンド名、連絡先などさらに詳しい情報を記入できます') }}
                    </div>


                    <div x-show="isShow" x-cloak>

                        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                            <x-jet-label for="tel" value="{{ __('電話番号') }}" />
                            <x-jet-input value="{{ old('tel') }}" id="tel" name="tel" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" autofocus autocomplete="tel" />
                        </div>

                        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                            <x-jet-label for="other_contact" value="{{ __('その他連絡先') }}" />
                            <x-jet-input value="{{ old('other_contact') }}" id="other_contact" name="other_contact" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="LINE ID、Skypeなど" autofocus autocomplete="other_contact" />
                        </div>

                        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                            <x-jet-label for="name_bands" value="{{ __('バンド/ユニット名') }}" />
                            <x-jet-input value="{{ old('name_bands') }}" id="name_bands" name="name_bands" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）山田太郎band" autofocus autocomplete="name_bands" />
                        </div>

                        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                            <x-jet-label for="kana_bands" value="{{ __('フリガナ') }}" />
                            <x-jet-input value="{{ old('kana_bands') }}" id="kana_bands" name="kana_bands" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）ヤマダタロウバンド" autofocus autocomplete="kana_bands" />
                        </div>

                        <div class="flex justify-center bg-gray-500 text-white text-base xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8 my-16">バンド/ユニット情報</div>

                        <div class="bands-info mx-auto xs:max-w-280 min:max-w-280 sm:max-w-450 md:max-w-450 lg:max-w-520">
                            <x-jet-label for="other_contact" value="{{ __('ボーカル') }}" />
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数</div>
                            <select id="vo_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="vo_num">
                            @foreach(config('bands_num') as $index => $name)
                                @if (!is_null(old('vo_num')))
                                    @if ($index == old('vo_num'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">使用楽器</div>
                            <select id="vo_inst" onchange="changeInstView()" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 180px; height: 40px;" name="vo_inst">
                            @foreach(config('bands_inst') as $index => $name)
                                @if (!is_null(old('vo_inst')))
                                    @if ($index == old('vo_inst'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                            <div id="instIsOpen"><x-jet-input value="{{ old('vo_inst_other') }}" id="vo_inst_other" name="vo_inst_other" class="my-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" /></div>
                            <div class="flex items-center justify-start my-1 text-gray-600 dark:text-gray-400 text-xs">
                                ボーカルと楽器を兼任される場合のみご記入ください
                            </div>
                        </div>

                        <div class="bands-info mx-auto xs:max-w-280 min:max-w-280 sm:max-w-450 md:max-w-450 lg:max-w-520">
                            <x-jet-label for="other_contact" value="{{ __('エレキギター') }}" />
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数</div>
                            <select id="elgt_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="elgt_num">
                            @foreach(config('bands_num') as $index => $name)
                                @if (!is_null(old('elgt_num')))
                                    @if ($index == old('elgt_num'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数</div>
                            <select id="elgt_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="elgt_mic">
                            @foreach(config('bands_mic') as $index => $name)
                                @if (!is_null(old('elgt_mic')))
                                    @if ($index == old('elgt_mic'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="bands-info mx-auto xs:max-w-280 min:max-w-280 sm:max-w-450 md:max-w-450 lg:max-w-520">
                            <x-jet-label for="other_contact" value="{{ __('エレキベース') }}" />
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数</div>
                            <select id="elba_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="elba_num">
                            @foreach(config('bands_num') as $index => $name)
                                @if (!is_null(old('elba_num')))
                                    @if ($index == old('elba_num'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数</div>
                            <select id="elba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="elba_mic">
                            @foreach(config('bands_mic') as $index => $name)
                                @if (!is_null(old('elba_mic')))
                                    @if ($index == old('elba_mic'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="bands-info mx-auto xs:max-w-280 min:max-w-280 sm:max-w-450 md:max-w-450 lg:max-w-520">
                            <x-jet-label for="other_contact" value="{{ __('ドラム') }}" />
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数</div>
                            <select id="dr_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="dr_num">
                            @foreach(config('bands_num') as $index => $name)
                                @if (!is_null(old('dr_num')))
                                    @if ($index == old('dr_num'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数</div>
                            <select id="dr_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="dr_mic">
                            @foreach(config('bands_mic') as $index => $name)
                                @if (!is_null(old('dr_mic')))
                                    @if ($index == old('dr_mic'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="bands-info mx-auto xs:max-w-280 min:max-w-280 sm:max-w-450 md:max-w-450 lg:max-w-520">
                            <x-jet-label for="other_contact" value="{{ __('キーボード') }}" />
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数</div>
                            <select id="key_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="key_num">
                            @foreach(config('bands_num') as $index => $name)
                                @if (!is_null(old('key_num')))
                                    @if ($index == old('key_num'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数</div>
                            <select id="key_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="key_mic">
                            @foreach(config('bands_mic') as $index => $name)
                                @if (!is_null(old('key_mic')))
                                    @if ($index == old('key_mic'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="bands-info mx-auto xs:max-w-280 min:max-w-280 sm:max-w-450 md:max-w-450 lg:max-w-520">
                            <x-jet-label for="other_contact" value="{{ __('アコースティックギター') }}" />
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">タイプ</div>
                            <select id="acgt_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="acgt_type">
                            @foreach(config('bands_type') as $index => $name)
                                @if (!is_null(old('acgt_type')))
                                    @if ($index == old('acgt_type'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数</div>
                            <select id="acgt_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="acgt_num">
                            @foreach(config('bands_num') as $index => $name)
                                @if (!is_null(old('acgt_num')))
                                    @if ($index == old('acgt_num'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数</div>
                            <select id="acgt_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="acgt_mic">
                            @foreach(config('bands_mic') as $index => $name)
                                @if (!is_null(old('acgt_mic')))
                                    @if ($index == old('acgt_mic'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>


                        <div class="bands-info mx-auto xs:max-w-280 min:max-w-280 sm:max-w-450 md:max-w-450 lg:max-w-520">
                            <x-jet-label for="other_contact" value="{{ __('アコースティックベース') }}" />
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数</div>
                            <select id="acba_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="acba_type">
                            @foreach(config('bands_type') as $index => $name)
                                @if (!is_null(old('acba_type')))
                                    @if ($index == old('acba_type'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数</div>
                            <select id="acba_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="acba_num">
                            @foreach(config('bands_num') as $index => $name)
                                @if (!is_null(old('acba_num')))
                                    @if ($index == old('acba_num'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数</div>
                            <select id="acba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="acba_mic">
                            @foreach(config('bands_mic') as $index => $name)
                                @if (!is_null(old('acba_mic')))
                                    @if ($index == old('acba_mic'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="bands-info mx-auto xs:max-w-280 min:max-w-280 sm:max-w-450 md:max-w-450 lg:max-w-520">
                            <x-jet-label for="other_contact" value="{{ __('その他') }}" />
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">パート</div>
                            <x-jet-input id="composition_other" value="{{ old('other_part_num') }}" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base max-w-450" type="text" name="other_part_num" placeholder="例）DJ：1人、パーカッション：1人" />
                            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数</div>
                            <select id="other_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="other_mic">
                            @foreach(config('bands_mic') as $index => $name)
                                @if (!is_null(old('other_mic')))
                                    @if ($index == old('other_mic'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="mt-16 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                            <x-jet-label for="genre" value="{{ __('ジャンル') }}" />
                            <select id="genre" name="genre" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 200px; height: 36px;">
                            @foreach(config('genre') as $index => $name)
                                @if (!is_null(old('genre')))
                                    @if ($index == old('genre'))
                                        <option value="{{ $index }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                            <x-jet-label for="genre" value="{{ __('音源') }}" />
                            <select id="audio_select" onchange="changeAudioView()" name="audio_select" class="my-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm focus:outline-none" style="width: 200px; height: 36px;">
                                <option selected value="">選択</option>
                                <option value="data">ファイルを送信する</option>
                                <option value="url">動画などのURLを送信する</option>
                            </select>
                            <div id="dataIsOpen"><input value="{{ old('audio_data') }}" id="audio_data" name="audio_data" class="my-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="max-width: 260px;" type="file" /></div>
                            <div id="urlIsOpen"><x-jet-input value="{{ old('audio_url') }}" id="audio_url" name="audio_url" class="my-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="youtubeのURLなど" /></div>
                        </div>

                        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                            <x-jet-label for="other_contact" value="{{ __('備考') }}" />
                            <textarea type="text" id="remarks" name="remarks" rows="10" cols="40" style="height: 150px;" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">{{ old('remarks') }}</textarea>
                        </div>

                        <div class="flex items-center justify-around my-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-jet-button class="ml-4">
                                {{ __('Register') }}
                            </x-jet-button>
                        </div>

                    </div><!-- x-show="isShow" -->
                </div><!-- x-data="{isShow:false}" -->

                </form>
        </div><!-- p-2 -->
    </div><!-- mt-8 -->
</div>
</div>
</x-guest-layout>

