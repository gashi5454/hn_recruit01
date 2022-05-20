<x-app-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

<div class="max-w-5xl m-16 px-6 mx-auto sm:px-6 lg:px-8">
    <p class="text-2xl flex justify-center pt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg sm:pt-0 dark:text-gray-900">
        {{ $offers->title }}
    </p>

    <div class="mt-16 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
        <div class="p-6 line-break">
            <div class="detail-table">
                <div class="detail-table-title">内容</div>
                <div class="detail-table-data">
                @if(isset($offers->contents))
                    {{ $offers->contents }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="detail-table">
                <div class="detail-table-title">出演日</div>
                <div class="detail-table-data">
                @if(isset($offers->appear_date))
                    {{ $offers->appear_date }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="detail-table">
                <div class="detail-table-title">ジャンル</div>
                <div class="detail-table-data">
                @if(isset($offers->genre))
                    {{ $offers->genre }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="detail-table">
                <div class="detail-table-title">会場</div>
                <div class="detail-table-data">
                @if(isset($offers->place))
                    {{ $offers->place }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="detail-table">
                <div class="detail-table-title">ノルマ</div>
                <div class="detail-table-data">
                @if(isset($offers->quota))
                    {{ $offers->place }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="detail-table">
                <div class="detail-table-title">出演条件</div>
                <div class="detail-table-data">
                @if(isset($offers->requirement))
                    {{ $offers->place }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="detail-table">
                <div class="detail-table-title">募集バンド数</div>
                <div class="detail-table-data">
                @if(isset($offers->number_of_bands))
                    {{ $offers->number_of_bands }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="detail-table">
                <div class="detail-table-title">住所</div>
                <div class="detail-table-data">
                @if(isset($offers->address)) or isset($offers->postal_code))
                    {{ $offers->postal_code }} &#010; {{ $offers->address }}
                @else
                    null
                @endif
                </div>
            </div>

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
