<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-jet-label for="photo" value="{{ __('Photo') }}" />

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

        <!-- ??????????????? -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('???????????????') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- ???????????? -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="kana" value="{{ __('????????????') }}" />
            <x-jet-input id="kana" type="text" class="mt-1 block w-full" wire:model.defer="state.kana" />
            <x-jet-input-error for="kana" class="mt-2" />
        </div>

        <!-- ?????????/??????????????? -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name_bands" value="{{ __('?????????/???????????????') }}" />
            <x-jet-input id="name_bands" type="text" class="mt-1 block w-full" wire:model.defer="state.name_bands" />
            <x-jet-input-error for="name_bands" class="mt-2" />
        </div>

        <!-- ???????????? -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="kana_bands" value="{{ __('????????????') }}" />
            <x-jet-input id="kana_bands" type="text" class="mt-1 block w-full" wire:model.defer="state.kana_bands" />
            <x-jet-input-error for="kana_bands" class="mt-2" />
        </div>

        <!-- ????????????????????? -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('?????????????????????') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- ???????????? -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="tel" value="{{ __('????????????') }}" />
            <x-jet-input id="tel" type="text" class="mt-1 block w-full" wire:model.defer="state.tel" />
            <x-jet-input-error for="tel" class="mt-2" />
        </div>

        <!-- ?????????????????? -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="other_contact" value="{{ __('??????????????????') }}" />
            <x-jet-input id="other_contact" type="text" class="mt-1 block w-full" wire:model.defer="state.other_contact" />
            <x-jet-input-error for="other_contact" class="mt-2" />
        </div>

        <!-- ??????URL -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="audio_url" value="{{ __('??????URL') }}" />
            <x-jet-input id="audio_url" type="text" class="mt-1 block w-full" wire:model.defer="state.audio_url" />
            <x-jet-input-error for="audio_url" class="mt-2" />
        </div>

        <!-- ????????? -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('??????') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
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
