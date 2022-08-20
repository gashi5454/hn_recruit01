<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
    </x-slot>

    <x-slot name="description">
    </x-slot>

    <x-slot name="form">
        <h3 class="flex justify-center text-lg font-medium text-gray-900">
            プロフィール編集
        </h3>

        <div class="flex justify-center bg-gray-500 text-white text-base xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8 my-16">プロフィール情報</div>

        @if ($errors->any())
        <div class="p-4 border-red xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <div class="mt-2" x-show="! photoPreview">
                <div class="ml-2 font-medium text-red-600 xs:text-xs min:text-xs sm:text-sm md:text-sm lg:text-sm">
                    エラーの内容を確認してください。
                </div>
            </div>

            <div class="mt-3 text-red-600 xs:text-xs min:text-xs sm:text-sm md:text-sm lg:text-sm">
                @foreach ($errors->all() as $error)
                    <div class="mb-1">・{{ $error }}</div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-jet-label for="photo" value="{{ __('画像') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center" x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-jet-secondary-button>

            @if ($this->user->profile_photo_path)
            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-jet-secondary-button>
            @endif

            <x-jet-input-error for="photo" class="mt-2" />
        </div>
        @endif

        <!-- 代表者氏名 -->
        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <x-jet-label for="name" value="{{ __('代表者氏名') }}" />
            <x-jet-input id="name" type="text" class="mt-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:model.defer="state.name" autocomplete="name" />
        </div>

        <!-- ふりがな -->
        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <x-jet-label for="kana" value="{{ __('ふりがな') }}" />
            <x-jet-input id="kana" type="text" class="mt-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:model.defer="state.kana" />
        </div>

        <!-- バンド/ユニット名 -->
        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <x-jet-label for="name_bands" value="{{ __('バンド/ユニット名') }}" />
            <x-jet-input id="name_bands" type="text" class="mt-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:model.defer="state.name_bands" />
        </div>

        <!-- フリガナ -->
        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <x-jet-label for="kana_bands" value="{{ __('フリガナ') }}" />
            <x-jet-input id="kana_bands" type="text" class="mt-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:model.defer="state.kana_bands" />
        </div>

        <!-- メールアドレス -->
        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
            <x-jet-input id="email" type="email" class="mt-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:model.defer="state.email" />
        </div>

        <!-- 電話番号 -->
        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <x-jet-label for="tel" value="{{ __('電話番号') }}" />
            <x-jet-input id="tel" type="text" class="mt-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:model.defer="state.tel" />
        </div>

        <!-- その他連絡先 -->
        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <x-jet-label for="other_contact" value="{{ __('その他連絡先') }}" />
            <x-jet-input id="other_contact" type="text" class="mt-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:model.defer="state.other_contact" />
        </div>

        <div class="flex justify-center bg-gray-500 text-white text-base xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8 my-16">バンド/ユニット情報</div>

        <div class="bands-info mx-auto xs:max-w-280 min:max-w-280 sm:max-w-450 md:max-w-450 lg:max-w-520">
            <x-jet-label for="other_contact" value="{{ __('ボーカル') }}" />
            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数</div>
            <select id="vo_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.vo_num">
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
            <div id="instIsOpen" style="display:none;"><x-jet-input value="{{ old('vo_inst_other') }}" id="vo_inst_other" wire:model.defer="state.vo_inst_other" class="my-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" type="text" /></div>
            <div class="flex items-center justify-start my-1 text-gray-600 dark:text-gray-400 text-xs">
                    ボーカルと楽器を兼任される場合のみご記入ください
            </div>
        </div>

        <div class="bands-info mx-auto xs:max-w-280 min:max-w-280 sm:max-w-450 md:max-w-450 lg:max-w-520">
            <x-jet-label for="other_contact" value="{{ __('エレキギター') }}" />
            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数</div>
            <select id="elgt_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.elgt_num">
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
            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数：</div>
            <select id="elgt_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.elgt_mic">
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
            <select id="elba_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.elba_num">
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
            <select id="elba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.elba_mic">
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
            <select id="dr_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.dr_num">
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
            <select id="dr_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.dr_mic">
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
            <select id="key_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.key_num">
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
            <select id="key_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.key_mic">
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
            <select id="acgt_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.acgt_type">
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
            <select id="acgt_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.acgt_num">
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
            <select id="acgt_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.acgt_mic">
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
            <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">タイプ</div>
            <select id="acba_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.acba_type">
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
            <select id="acba_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.acba_num">
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
            <select id="acba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.acba_mic">
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
                <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">人数</div>
                <x-jet-input id="composition_other" value="{{ old('other_part_num') }}" class="w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base max-w-450" type="text" wire:model.defer="state.other_part_num" placeholder="例）DJ：1人、パーカッション：1人" />
                <div class="mt-4 text-gray-900 dark:text-gray-900 xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">コーラスマイク本数</div>
                <select id="other_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" style="width: 150px; height: 40px;" wire:model.defer="state.other_mic">
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
                <select id="genre" wire:model.defer="state.genre" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 200px; height: 36px;">
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

        <!-- 音源URL -->
        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <x-jet-label for="audio_url" value="{{ __('音源URL') }}" />
            <x-jet-input id="audio_url" type="text" class="mt-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:model.defer="state.audio_url" />
            <x-jet-input-error for="audio_url" class="mt-2" />
        </div>

        <!-- 備考欄 -->
        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <x-jet-label for="remarks" value="{{ __('備考') }}" />
            <textarea type="text" id="remarks" wire:model.defer="state.remarks" rows="10" cols="40" style="height: 150px;" class="mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base"></textarea>
            <x-jet-input id="remarks" type="text" class="mt-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:model.defer="state.remarks" />
            <x-jet-input-error for="remarks" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button class="xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
