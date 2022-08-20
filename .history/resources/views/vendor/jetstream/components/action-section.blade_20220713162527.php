<div {{ $attributes->merge(['class' => '']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    <div class="mt-8 bg-white border-01 py-6 xs:px-0 min:px-0 sm:px-12 md:px-12 lg:px-12">
        {{ $content }}
    </div>
</div>
