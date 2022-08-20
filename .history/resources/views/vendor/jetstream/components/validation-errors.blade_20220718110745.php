@if ($errors->any())
    <div {{ $attributes }}>
        <div class="p-4 border-red xs:mx-2 min:mx-2 sm:mx-8 md:mx-8 lg:mx-8">
            <div class="ml-2 font-medium text-red-600 xs:text-xs min:text-xs sm:text-sm md:text-sm lg:text-sm">{{ __('Whoops! Something went wrong.') }}</div>
            <div class="mt-3 text-red-600 xs:text-xs min:text-xs sm:text-sm md:text-sm lg:text-sm">
                @foreach ($errors->all() as $error)
                    <div class="mb-1">・{{ $error }}</div>
                @endforeach
            </div>
        </div>
    </div>
@endif
