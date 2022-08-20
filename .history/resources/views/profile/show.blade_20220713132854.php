<x-app-layout>
    <div class="flex items-top justify-start h-auto bg-white">
        <div class="mt-10 py-10 mx-auto xs:px-0 min:px-0 sm:px-4 md:px-6 lg:px-6">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <div class="block">
                    <div class="py-8">
                        <div class="border-t border-gray-300"></div>
                    </div>
                </div>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10">
                    @livewire('profile.update-password-form')
                </div>

            @endif

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <div class="block">
                    <div class="py-8">
                        <div class="border-t border-gray-300"></div>
                    </div>
                </div>

                <div class="mt-10">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
