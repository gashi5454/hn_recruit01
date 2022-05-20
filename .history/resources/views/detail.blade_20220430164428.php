<x-app-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

<div class="max-w-5xl m-16 px-6 mx-auto sm:px-6 lg:px-8">
    <p class="text-2xl flex justify-center pt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg sm:pt-0 dark:text-gray-900">
        {{ $offers->title }}
    </p>

    <div class="mt-16 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
        <div class="p-6 line-break">
            <div class="flex items-center">
                <form action="{{ url('/applies')}}" method="post">
                {{ csrf_field()}}
                {{method_field('post')}}
                    <div class="inline-flex items-center">
                        <x-jet-label class="justify-start w-48 mx-16 mr-8 text-lg" for="keyword" value="{{ __('フリーワード') }}" />
                        <div class="m-8 w-auto inline-flex text-gray-600 dark:text-gray-600 text-base">
                            @if(isset($offers->contents))
                            {{ $offers->contents }}
                            @else
                            ご応募お待ちしております！
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center justify-center mt-6">
                        <x-jet-button class="m-4 text-xl">
                            {{ __('応募画面へ進む') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>
