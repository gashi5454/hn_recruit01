<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <p class="text-xl flex justify-center pt-8 sm:pt-0 dark:text-gray-900">
                {{ __('応募入力') }}
            </p>
        <x-jet-section-border />
            <div class="mt-10 sm:mt-0">
                <x-jet-form-section submit="updatePassword">
                    <x-slot name="title">
                        {{ __('名前') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('※必須') }}
                    </x-slot>

                    <x-slot name="form">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
                            <x-jet-input id="name" type="name" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>
                    </x-slot>

                    <x-slot name="actions">
                        <x-jet-button>
                            {{ __('Save') }}
                        </x-jet-button>
                    </x-slot>
                </x-jet-form-section>
            </div>
        </div>
    </div>
</x-app-layout>
