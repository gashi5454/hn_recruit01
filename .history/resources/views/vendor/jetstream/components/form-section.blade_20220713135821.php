@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    <div class="mt-8 bg-white border-01">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="xs:px-0 min:px-0 sm:px-4 md:px-6 lg:px-6 xs:w-full min:w-305px sm:w-500px md:w-600px lg:w-700px">
                {{ $form }}
            </div>

            @if (isset($actions))
                <div class="block">
                    <div class="py-8">
                        <div class="border-t border-gray-300"></div>
                    </div>
                </div>

                <div class="flex items-center justify-center px-4 py-3 text-right">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
