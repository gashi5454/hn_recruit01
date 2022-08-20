<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('プロフィール情報とバンド/ユニット情報を編集できます') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="mt-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-jet-label for="photo" value="{{ __('プロフィール画像') }}" />

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
        <div class="mt-4">
            <x-jet-label for="name" value="{{ __('代表者氏名') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block" style="width: 370px;" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- ふりがな -->
        <div class="mt-4">
            <x-jet-label for="kana" value="{{ __('ふりがな') }}" />
            <x-jet-input id="kana" type="text" class="mt-1 block" style="width: 370px;" wire:model.defer="state.kana" />
            <x-jet-input-error for="kana" class="mt-2" />
        </div>

        <!-- バンド/ユニット名 -->
        <div class="mt-4">
            <x-jet-label for="name_bands" value="{{ __('バンド/ユニット名') }}" />
            <x-jet-input id="name_bands" type="text" class="mt-1 block" style="width: 370px;" wire:model.defer="state.name_bands" />
            <x-jet-input-error for="name_bands" class="mt-2" />
        </div>

        <!-- フリガナ -->
        <div class="mt-4">
            <x-jet-label for="kana_bands" value="{{ __('フリガナ') }}" />
            <x-jet-input id="kana_bands" type="text" class="mt-1 block" style="width: 370px;" wire:model.defer="state.kana_bands" />
            <x-jet-input-error for="kana_bands" class="mt-2" />
        </div>

        <!-- メールアドレス -->
        <div class="mt-4">
            <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block" style="width: 370px;" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- 電話番号 -->
        <div class="mt-4">
            <x-jet-label for="tel" value="{{ __('電話番号') }}" />
            <x-jet-input id="tel" type="text" class="mt-1 block" style="width: 370px;" wire:model.defer="state.tel" />
            <x-jet-input-error for="tel" class="mt-2" />
        </div>

        <!-- その他連絡先 -->
        <div class="mt-4">
            <x-jet-label for="other_contact" value="{{ __('その他連絡先') }}" />
            <x-jet-input id="other_contact" type="text" class="mt-1 block" style="width: 370px;" wire:model.defer="state.other_contact" />
            <x-jet-input-error for="other_contact" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-jet-section-border />
        </div>

        <div class="col-span-6 sm:col-span-4">

            <div class="mt-4 mb-2">
                <x-jet-label for="composition" value="{{ __('バンド/ユニット編成') }}" />
            </div>

            <div class="composition-table">
                <div class="composition-table-title">ボーカル</div>
                <div class="composition-table-data">
                    <div class="flex items-center justify-end my-1">
                        <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                        <select id="vo_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.vo_num">
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
                        <div class="text-gray-900 dark:text-gray-900 text-base">使用楽器：</div>
                        <select id="vo_inst" onchange="changeInstView()" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 180px; height: 40px;" wire:model.defer="state.vo_inst">
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
                        <div id="instIsOpen"><x-jet-input value="{{ old('vo_inst_other') }}" id="vo_inst_other" wire:model.defer="state.vo_inst_other" class="my-1" style="width: 345px; height: 36px;" type="text" /></div>
                    </div>
                    <div class="flex items-center justify-end my-1 text-gray-600 dark:text-gray-400 text-sm">
                        ※ボーカルと楽器を兼任される場合のみご記入ください
                    </div>
                </div>
            </div>

            <div class="composition-table">
                <div class="composition-table-title">エレキギター</div>
                <div class="composition-table-data">
                    <div class="flex items-center justify-end my-1">
                        <div class="text-gray-900 dark:text-gray-900 text-base">人数：</div>
                        <select id="elgt_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.elgt_num">
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
                        <select id="elgt_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.elgt_mic">
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
                        <select id="elba_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.elba_num">
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
                        <select id="elba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.elba_mic">
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
                        <select id="dr_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.dr_num">
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
                        <select id="dr_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.dr_mic">
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
                        <select id="key_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.key_num">
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
                        <select id="key_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.key_mic">
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
                        <select id="acgt_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 150px; height: 40px;" wire:model.defer="state.acgt_type">
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
                        <select id="acgt_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.acgt_num">
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
                        <select id="acgt_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.acgt_mic">
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
                        <select id="acba_type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 150px; height: 40px;" wire:model.defer="state.acba_type">
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
                        <select id="acba_num" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.acba_num">
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
                        <select id="acba_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.acba_mic">
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
                        <x-jet-input id="composition_other" value="{{ old('other_part_num') }}" style="width: 380px; height: 40px;" type="text" wire:model.defer="state.other_part_num" placeholder="例）DJ：1人、パーカッション：1人" />
                    </div>
                    <div class="flex items-center justify-end my-1">
                        <div class="text-gray-900 dark:text-gray-900 text-base">コーラスマイク本数：</div>
                        <select id="other_mic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" style="width: 120px; height: 40px;" wire:model.defer="state.other_mic">
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

            <div class="mt-4">
                <x-jet-section-border />
            </div>
        </div>

            <div class="mt-4">
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
        <div class="mt-4">
            <x-jet-label for="audio_url" value="{{ __('音源URL') }}" />
            <x-jet-input id="audio_url" type="text" class="mt-1 block" style="width: 370px;" wire:model.defer="state.audio_url" />
            <x-jet-input-error for="audio_url" class="mt-2" />
        </div>

        <!-- 備考欄 -->
        <div class="mt-4">
            <x-jet-label for="remarks" value="{{ __('備考') }}" />
            <x-jet-input id="remarks" type="text" class="mt-1 block" style="width: 370px;" wire:model.defer="state.remarks" />
            <x-jet-input-error for="remarks" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
