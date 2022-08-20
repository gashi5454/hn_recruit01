<x-guest-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

<div class="max-w-7xl py-10 mx-auto sm:px-6 lg:px-8">
    <div class="shrink-0 flex items-center justify-center mb-8">
    <a href="{{ route('welcome') }}">
        <img style="width:50px; height:50px;" src="{{ asset('storage/profile-photos/Y6izViW3Ao34vZBlNyKDqs9zlyoZLhS32w5RjdT2.jpg') }}" alt="logo">
    </a>
    </div>

    <p class="text-xl flex justify-center mx-4 pt-6 px-40 sm:pt-0 dark:text-gray-900">
        新規会員登録
    </p>

    <div class="mt-6 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
        <div style="padding: 1.2rem;">
            <div class="items-center">
                <form wire:submit.prevent="updated" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
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
                        <x-jet-input wire:model.defer="name" value="{{ old('name') }}" id="name" name="name" style="width: 370px; height: 36px;" type="text" placeholder="例）山田太郎" autofocus autocomplete="name" />
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">ふりがな</div>
                    <div class="applies-table-data">
                        <x-jet-input wire:model.defer="kana" value="{{ old('kana') }}" id="kana" name="kana" style="width: 370px; height: 36px;" type="text" placeholder="例）やまだたろう" autofocus autocomplete="kana" />
                        @error('kana') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">メールアドレス</div>
                    <div class="applies-table-data">
                        <x-jet-input value="{{ old('email') }}" id="email" name="email" style="width: 370px; height: 36px;" type="email" autofocus autocomplete="email" />
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">パスワード</div>
                    <div class="applies-table-data">
                        <x-jet-input value="{{ old('password') }}" id="password" name="password" style="width: 370px; height: 36px;" type="password" autofocus autocomplete="new-password" />
                    </div>
                </div>

                <div class="applies-table">
                    <div class="applies-table-title req font-medium text-sm text-gray-700" style="width: 170px;">パスワード確認用</div>
                    <div class="applies-table-data">
                        <x-jet-input value="{{ old('password_confirmation') }}" id="password_confirmation" name="password_confirmation" style="width: 370px; height: 36px;" type="password" autofocus autocomplete="new-password" />
                    </div>
                </div>

                <div class="flex items-center justify-around mt-8">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>

                <div x-data="{isShow:false}" class="pt-3">
                    <div class="mt-4 flex justify-center">
                        <x-jet-secondary-button class="text-base" type="button" @click="isShow= !isShow">
                            {{ __('任意項目を表示') }}
                        </x-jet-secondary-button>
                    </div>
                    <div class="flex justify-center mb-2 mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        {{ __('バンド名、連絡先などさらに詳しい情報を記入できます') }}
                    </div>


                    <div x-show="isShow" x-cloak>

                        <div class="applies-table">
                            <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 170px;">バンド/ユニット名</div>
                            <div class="applies-table-data">
                                <x-jet-input value="{{ old('name_bands') }}" id="name_bands" name="name_bands" style="width: 370px; height: 36px;" type="text" placeholder="例）山田太郎band" autofocus autocomplete="name_bands" />
                            </div>
                        </div>

                        <div class="applies-table">
                            <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 170px;">フリガナ</div>
                            <div class="applies-table-data">
                                <x-jet-input value="{{ old('kana_bands') }}" id="kana_bands" name="kana_bands" style="width: 370px; height: 36px;" type="text" placeholder="例）ヤマダタロウバンド" autofocus autocomplete="kana_bands" />
                            </div>
                        </div>

                        <div class="applies-table">
                            <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 170px;">電話番号</div>
                            <div class="applies-table-data">
                                <x-jet-input value="{{ old('tel') }}" id="tel" name="tel" style="width: 370px; height: 36px;" type="text" autofocus autocomplete="tel" />
                            </div>
                        </div>

                        <div class="applies-table">
                            <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 170px;">その他連絡先</div>
                            <div class="applies-table-data">
                                <x-jet-input value="{{ old('other_contact') }}" id="other_contact" name="other_contact" style="width: 370px; height: 36px;" type="text" placeholder="LINE ID、Skypeなど" autofocus autocomplete="other_contact" />
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
                                </div>
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">使用楽器(兼任ボーカルのみ)：</div>
                                    <select id="vo_inst" onchange="changeInstView()" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 180px; height: 40px;" name="vo_inst">
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
                                </div>
                                <div class="flex items-center justify-end my-1">
                                    <div id="instIsOpen"><x-jet-input value="{{ old('vo_inst_other') }}" id="vo_inst_other" name="vo_inst_other" class="my-1" style="width: 345px; height: 36px;" type="text" /></div>
                                </div>
                            </div>
                        </div>

                        <div class="composition-table">
                            <div class="composition-table-title">エレキギター</div>
                            <div class="composition-table-data">
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                    <select id="elgt_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="elgt_num">
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
                                </div>
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                    <select id="elgt_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="elgt_mic">
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
                            </div>
                        </div>

                        <div class="composition-table">
                            <div class="composition-table-title">エレキベース</div>
                            <div class="composition-table-data">
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                    <select id="elba_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="elba_num">
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
                                </div>
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                    <select id="elba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="elba_mic">
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
                            </div>
                        </div>

                        <div class="composition-table">
                            <div class="composition-table-title">ドラム</div>
                            <div class="composition-table-data">
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                    <select id="dr_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="dr_num">
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
                                </div>
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                    <select id="dr_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="dr_mic">
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
                            </div>
                        </div>

                        <div class="composition-table">
                            <div class="composition-table-title">キーボード</div>
                            <div class="composition-table-data">
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                    <select id="key_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="key_num">
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
                                </div>
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                    <select id="key_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="key_mic">
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
                            </div>
                        </div>

                        <div class="composition-table">
                            <div class="composition-table-title">アコースティック<br>ギター</div>
                            <div class="composition-table-data">
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">タイプ：</div>
                                    <select id="acgt_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 150px; height: 40px;" name="acgt_type">
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
                                </div>
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                    <select id="acgt_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="acgt_num">
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
                                </div>
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                    <select id="acgt_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="acgt_mic">
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
                            </div>
                        </div>

                        <div class="composition-table">
                            <div class="composition-table-title">アコースティック<br>ベース</div>
                            <div class="composition-table-data">
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">タイプ：</div>
                                    <select id="acba_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 150px; height: 40px;" name="acba_type">
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
                                </div>
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                                    <select id="acba_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="acba_num">
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
                                </div>
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                    <select id="acba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="acba_mic">
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
                            </div>
                        </div>

                        <div class="composition-table">
                            <div class="composition-table-title">その他</div>
                            <div class="composition-table-data">
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">パート：</div>
                                    <x-jet-input id="composition_other" value="{{ old('other_part_num') }}" style="width: 380px; height: 40px;" type="text" name="other_part_num" placeholder="例）DJ：1人、パーカッション：1人" />
                                </div>
                                <div class="flex items-center justify-end my-1">
                                    <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                                    <select id="other_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" name="other_mic">
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
                            </div>
                        </div>

                        <x-jet-section-border />

                        <div class="applies-table">
                            <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 120px;">ジャンル</div>
                            <div class="applies-table-data">
                                <select id="genre" name="genre" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 200px; height: 36px;">
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
                        </div>

                        <div class="applies-table">
                            <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 120px;">音源</div>
                            <div class="applies-table-data">
                            <select id="audio_select" onchange="changeAudioView()" name="audio_select" class="my-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm focus:outline-none" style="width: 200px; height: 36px;">
                                <option selected value="">選択</option>
                                <option value="data">ファイルを送信する</option>
                                <option value="url">動画などのURLを送信する</option>
                            </select>
                                <div id="dataIsOpen"><input value="{{ old('audio_data') }}" id="audio_data" name="audio_data" class="my-1" type="file" /></div>
                                <div id="urlIsOpen"><x-jet-input value="{{ old('audio_url') }}" id="audio_url" name="audio_url" class="my-1" style="width: 395px; height: 36px;" type="text" placeholder="youtubeのURLなど" /></div>
                            </div>
                        </div>

                        <div class="applies-table">
                            <div class="applies-table-title font-medium text-sm text-gray-700" style="width: 120px;">備考</div>
                            <div class="applies-table-data">
                                <textarea type="text" id="remarks" name="remarks" rows="10" cols="40" style="height: 130px;" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('remarks') }}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-around mt-4">
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
            </div><!-- items-center -->
        </div><!-- p-6 -->
    </div><!-- mt-8 -->
</div>
</div>
</x-guest-layout>

