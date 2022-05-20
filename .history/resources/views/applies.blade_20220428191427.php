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
                            <x-jet-label for="name" value="{{ __('氏名') }}" />
                            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
                            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="birth" value="{{ __('生年月日') }}" />
                            <x-jet-input id="birth" type="date" class="mt-1 block w-full" wire:model.defer="state.birth" />
                            <x-jet-input-error for="birth" class="mt-2" />
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
