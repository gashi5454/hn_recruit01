<x-applies-layout>
    <div class="flex items-top justify-start h-auto bg-white">
        <div class="mt-10 py-10 mx-auto">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-20">
                    @livewire('profile.update-password-form')
                </div>
            @endif

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <div class="mt-20">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-applies-layout>
