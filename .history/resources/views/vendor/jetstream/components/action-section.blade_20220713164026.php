<div {{ $attributes->merge(['class' => '']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    <div class="mt-8 bg-white border-01 py-6 xs:px-0 min:px-0 sm:px-6 md:px-6 lg:px-6">
        <div class="xs:w-full min:w-305px sm:w-500px md:w-600px lg:w-700px">
            {{ $content }}
        </div>
    </div>
</div>
