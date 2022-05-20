<x-app-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

<div class="max-w-6xl m-16 px-6 mx-auto sm:px-6 lg:px-8">
    <p class="text-2xl flex justify-center pt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg sm:pt-0 dark:text-gray-900">
        {{ $offers->title }}
    </p>

    <div class="mt-16 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
        <div class="p-6">
            <table class="detail-table">
                <div class="detail-table-title">内容</div>
                <div class="detail-table-data">
                @if(isset($offers->contents))
                    {{ $offers->contents }}
                @else
                    null
                @endif
                </div>
            </table>

            <table class="detail-table">
                <div class="detail-table-title">フリーワード</div>
                <div class="detail-table-data">
                @if(isset($offers->contents))
                    {{ $offers->contents }}
                @else
                    null
                @endif
                </div>
            </table>

            <table class="detail-table">
                <div class="detail-table-title">フリーワード</div>
                <div class="detail-table-data">
                @if(isset($offers->contents))
                    {{ $offers->contents }}
                @else
                    null
                @endif
                </div>
            </table>

            <div class="flex items-center justify-center mt-6">
                <x-jet-button class="m-4 text-xl">
                    {{ __('応募画面へ進む') }}
                </x-jet-button>
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>
