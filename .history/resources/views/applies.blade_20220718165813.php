<x-applies-layout>
<div class="flex items-top justify-center h-auto bg-white py-4">

<div class="mt-10 py-10 mx-auto xs:px-0 min:px-0 sm:px-4 md:px-6 lg:px-6">
    <div class="mt-8 bg-white border-01">
    <p class="flex justify-center mx-8 py-8 text-lg dark:text-gray-900">
        情報を入力してください
    </p>
        <div class="p-2 xs:w-full min:w-305px sm:w-500px md:w-600px lg:w-700px">
            <form form="submitApp" action="{{ url('/confirm_applies')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field()}}
            {{method_field('post')}}
            <div class="flex justify-center bg-gray-500 text-white text-base xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8 mb-16">エントリー情報</div>

            @if ($errors->any())
            <div class="p-4 border-red xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                <div class="ml-2 font-medium text-red-600 xs:text-xs min:text-xs sm:text-sm md:text-sm lg:text-sm">{{ __('Whoops! Something went wrong.') }}</div>

                <div class="mt-3 text-red-600 xs:text-xs min:text-xs sm:text-sm md:text-sm lg:text-sm">
                    @foreach ($errors->all() as $error)
                        <div class="mb-1">・{{ $error }}</div>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                <x-jet-label class="req" for="name" value="{{ __('代表者氏名') }}" />
                @auth
                    <x-jet-input value="{{ old('name', Auth::user()->name) }}" id="name" name="name" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）山田太郎" required autofocus autocomplete="name" />
                @else
                    <x-jet-input value="{{ old('name') }}" id="name" name="name" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）山田太郎" required autofocus autocomplete="name" />
                @endauth
            </div>

            <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                <x-jet-label class="req" for="kana" value="{{ __('ふりがな') }}" />
                @auth
                    <x-jet-input value="{{ old('kana', Auth::user()->kana) }}" id="kana" name="kana" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）やまだたろう" required autofocus autocomplete="kana" />
                @else
                    <x-jet-input value="{{ old('kana') }}" id="kana" name="kana" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）やまだたろう" required autofocus autocomplete="kana" />
                @endauth
            </div>

            <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                <x-jet-label class="req" for="name_bands" value="{{ __('バンド/ユニット名') }}" />
                @auth
                    <x-jet-input value="{{ old('name_bands', Auth::user()->name_bands) }}" id="name_bands" name="name_bands" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）山田太郎band" required autofocus autocomplete="name_bands" />
                @else
                    <x-jet-input value="{{ old('name_bands') }}" id="name_bands" name="name_bands" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）山田太郎band" required autofocus autocomplete="name_bands" />
                @endauth
            </div>

            <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                <x-jet-label class="req" for="kana_bands" value="{{ __('フリガナ') }}" />
                @auth
                    <x-jet-input value="{{ old('kana_bands', Auth::user()->kana_bands) }}" id="kana_bands" name="kana_bands" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）ヤマダタロウバンド" required autofocus autocomplete="kana_bands" />
                @else
                    <x-jet-input value="{{ old('kana_bands') }}" id="kana_bands" name="kana_bands" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）ヤマダタロウバンド" required autofocus autocomplete="kana_bands" />
                @endauth
            </div>

            <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                <x-jet-label class="req" for="email" value="{{ __('メールアドレス') }}" />
                @auth
                    <x-jet-input value="{{ old('email', Auth::user()->email) }}" id="email" name="email" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="email" required autofocus autocomplete="email" />
                @else
                    <x-jet-input value="{{ old('email') }}" id="email" name="email" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="email" required autofocus autocomplete="email" />
                @endauth
            </div>

            <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                <x-jet-label for="tel" value="{{ __('電話番号') }}" />
                @auth
                    <x-jet-input value="{{ old('tel', Auth::user()->tel) }}" id="tel" name="tel" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" autofocus autocomplete="tel" />
                @else
                    <x-jet-input value="{{ old('tel') }}" id="tel" name="tel" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" autofocus autocomplete="tel" />
                @endauth
            </div>

            <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                <x-jet-label for="other_contact" value="{{ __('その他連絡先') }}" />
                @auth
                    <x-jet-input value="{{ old('other_contact', Auth::user()->other_contact) }}" id="other_contact" name="other_contact" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）LINE IDなど" autofocus autocomplete="other_contact" />
                @else
                    <x-jet-input value="{{ old('other_contact') }}" id="other_contact" name="other_contact" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="例）LINE IDなど" autofocus autocomplete="other_contact" />
                @endauth
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
                        @auth
                            @if ($index == Auth::user()->vo_num)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->vo_inst)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
                    @endif
                @endforeach
                </select>
                @auth
                    <div id="instIsOpen"><x-jet-input value="{{ old('vo_inst_other', Auth::user()->vo_inst_other) }}" id="vo_inst_other" name="vo_inst_other" class="my-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" /></div>
                @else
                    <div id="instIsOpen"><x-jet-input value="{{ old('vo_inst_other') }}" id="vo_inst_other" name="vo_inst_other" class="my-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" /></div>
                @endauth
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
                        @auth
                            @if ($index == Auth::user()->elgt_num)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->elgt_mic)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->elba_num)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->elba_mic)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->dr_num)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->dr_mic)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->key_num)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->key_mic)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->acgt_type)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->acgt_num)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->acgt_mic)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
                    @endif
                @endforeach
                </select>
            </div>

            <div class="bands-info mx-auto xs:max-w-280 min:max-w-280 sm:max-w-450 md:max-w-450 lg:max-w-520">
                <x-jet-label for="other_contact" value="{{ __('アコースティックベース') }}" />
                <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">タイプ</div>
                <select id="acba_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" name="acba_type">
                @foreach(config('bands_type') as $index => $name)
                    @if (!is_null(old('acba_type')))
                        @if ($index == old('acba_type'))
                            <option value="{{ $index }}" selected>{{ $name }}</option>
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endif
                    @else
                        @auth
                            @if ($index == Auth::user()->acba_type)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->acba_num)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                        @auth
                            @if ($index == Auth::user()->acba_mic)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
                    @endif
                @endforeach
                </select>
            </div>

            <div class="bands-info mx-auto xs:max-w-280 min:max-w-280 sm:max-w-450 md:max-w-450 lg:max-w-520">
                <x-jet-label for="other_contact" value="{{ __('その他') }}" />
                <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">パート・人数</div>
                @auth
                    <x-jet-input id="composition_other" value="{{ old('other_part_num', Auth::user()->other_part_num) }}" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base max-w-450" type="text" name="other_part_num" placeholder="例）DJ：1人、パーカッション：1人" />
                @else
                    <x-jet-input id="composition_other" value="{{ old('other_part_num') }}" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base max-w-450" type="text" name="other_part_num" placeholder="例）DJ：1人、パーカッション：1人" />
                @endauth
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
                        @auth
                            @if ($index == Auth::user()->other_mic)
                                <option value="{{ $index }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endif
                        @else
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endauth
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
                            @auth
                                @if ($index == Auth::user()->genre)
                                    <option value="{{ $index }}" selected>{{ $name }}</option>
                                @else
                                    <option value="{{ $index }}">{{ $name }}</option>
                                @endif
                            @else
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endauth
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                <x-jet-label for="other_contact" value="{{ __('音源') }}" />
                <select id="audio_select" onchange="changeAudioView()" name="audio_select" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm focus:outline-none my-1 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 200px; height: 36px;">
                @if(isset(Auth::user()->audio_url) or !is_null(old('audio_url')))
                    <option value="">選択</option>
                    <option value="data">ファイルを送信</option>
                    <option selected value="url">動画などのURLを送信</option>
                @else
                    <option selected value="">選択</option>
                    <option value="data">ファイルを送信</option>
                    <option value="url">動画などのURLを送信</option>
                @endif
                </select>
                @auth
                    <div id="dataIsOpen"><input value="{{ old('audio_data', Auth::user()->audio_data) }}" id="audio_data" name="audio_data" class="my-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="max-width: 260px;" type="file" /></div>
                    <div id="urlIsOpen"><x-jet-input value="{{ old('audio_url', Auth::user()->audio_url) }}" id="audio_url" name="audio_url" class="my-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="youtubeのURLなど" /></div>
                @else
                    <div id="dataIsOpen"><input value="{{ old('audio_data') }}" id="audio_data" name="audio_data" class="my-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="max-width: 260px;" type="file" /></div>
                    <div id="urlIsOpen"><x-jet-input value="{{ old('audio_url') }}" id="audio_url" name="audio_url" class="my-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" placeholder="youtubeのURLなど" /></div>
                @endauth
            </div>

            <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
                <x-jet-label for="other_contact" value="{{ __('備考') }}" />
                @auth
                    <textarea type="text" id="remarks" name="remarks" rows="10" cols="40" style="height: 150px;" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">{{ old('remarks' , Auth::user()->remarks) }}</textarea>
                @else
                    <textarea type="text" id="remarks" name="remarks" rows="10" cols="40" style="height: 150px;" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">{{ old('remarks') }}</textarea>
                @endauth
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
                    {{ __('確認') }}
                </x-jet-button>
            </div>
            </form>
        </div><!-- p-2-->

    </div><!-- mt-8 -->
</div>
</div>
</x-applies-layout>
