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
                <div class="detail-table-title">収容人数</div>
                <div class="detail-table-data">
                @if(isset($offers->capacity))
                    {{ $offers->capacity }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="detail-table">
                <div class="detail-table-title">ノルマ</div>
                <div class="detail-table-data">
                @if(isset($offers->quota))
                    {{ $offers->quota }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="detail-table">
                <div class="detail-table-title">出演条件</div>
                <div class="detail-table-data">
                @if(isset($offers->requirement))
                    {{ $offers->requirement }}
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
                @if(isset($offers->postal_code) and isset($offers->address))
                    {{ $offers->postal_code }} </br> {{ $offers->address }}
                @elseif(isset($offers->postal_code))
                    {{ $offers->postal_code }}
                @elseif(isset($offers->address))
                    {{ $offers->address }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="detail-table">
                <div class="detail-table-title">連絡先</div>
                <div class="detail-table-data">
                @if(isset($offers->tel))
                    {{ $offers->tel }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="detail-table">
                <div class="detail-table-title">その他連絡先</br>(メール、LINE、Skypeなど)</div>
                <div class="detail-table-data">
                @if(isset($offers->other_contact))
                    {{ $offers->other_contact }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="detail-table">
                <div class="detail-table-title">代表者氏名</div>
                <div class="detail-table-data">
                @if(isset($offers->name))
                    {{ $offers->name }}
                @else
                    null
                @endif
                </div>
            </div>

            <form action="{{ url('/applies')}}" method="get">
                <input type="hidden" value="{{ $eventers->email }}" name="email">
                <div class="flex items-center justify-center mt-6">
                    <x-jet-button class="m-4 text-xl">
                        <a href="{{ url('/applies')}}" style="text-decoration:none;">{{ __('応募画面へ進む') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</x-app-layout>
