<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
    </x-slot>

    <x-slot name="description">
    </x-slot>

    <x-slot name="form">
        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <x-jet-label for="password" value="{{ __('New Password') }}" />
            <x-jet-input id="password" type="password" class="mt-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="mt-6 xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 w-full xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button class="xs:text-sm min:text-sm sm:text-base md:text-base lg:text-base">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
