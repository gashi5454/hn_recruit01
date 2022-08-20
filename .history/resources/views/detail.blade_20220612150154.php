<x-app-layout>
<div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

<div class="max-w-5xl m-16 px-6 mx-auto sm:px-6 lg:px-8">
    <p class="text-xl flex justify-center pt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg sm:pt-0 dark:text-gray-900">
        {{ $offers->title }}
    </p>

    <div class="mt-16 flex justify-center">
        <img style="width:auto; height:auto;" src="{{ asset($offers->detail_photo) }}" alt="image">
    </div>

    <div class="mt-16 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
        <div class="p-6 line-break">
            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />
                <div class="mt-1">
                @if(isset($offers->contents))
                    <?php print_r ($offers->contents); ?>
                @else
                    null
                @endif
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />出演日
                <div class="mt-1">
                <?php
                $date = $offers->appear_date;
                $datetime = new DateTime($date);
                $week = array("日", "月", "火", "水", "木", "金", "土");
                $w = (int)$datetime->format('w');
                ?>
                @if(isset($offers->appear_date))
                    {{ $offers->appear_date }} ( {{ $week[$w] }} )
                @else
                    null
                @endif
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />ジャンル
                <div class="mt-1">
                @if(isset($offers->genre))
                    {{ $offers->genre }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />会場
                <div class="mt-1">
                @if(isset($offers->place))
                    {{ $offers->place }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />収容人数
                <div class="mt-1">
                @if(isset($offers->capacity))
                    {{ $offers->capacity }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />ノルマ
                <div class="mt-1">
                @if(isset($offers->quota))
                    {{ $offers->quota }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />出演条件
                <div class="mt-1">
                @if(isset($offers->requirement))
                    {{ $offers->requirement }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />募集バンド数
                <div class="mt-1">
                @if(isset($offers->number_of_bands))
                    {{ $offers->number_of_bands }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />住所
                <div class="mt-1">
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

            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />連絡先
                <div class="mt-1">
                @if(isset($offers->tel))
                    {{ $offers->tel }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />その他連絡先</br>(メール、LINE、Skypeなど)
                <div class="mt-1">
                @if(isset($offers->other_contact))
                    {{ $offers->other_contact }}
                @else
                    null
                @endif
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />代表者氏名
                <div class="mt-1">
                @if(isset($offers->name))
                    {{ $offers->name }}
                @else
                    null
                @endif
                </div>
            </div>

            <form action="{{ url('/applies')}}" method="get">
                {{ csrf_field()}}
                <input type="hidden" value="{{ $eventers->id }}" name="eventer_id">
                <input type="hidden" value="{{ $eventers->email }}" name="eventer_email">
                <input type="hidden" value="{{ $offers->id }}" name="offer_id">
                <input type="hidden" value="{{ $offers->appear_date }}" name="appear_date">
                <input type="hidden" value="{{ $offers->title }}" name="title">
                <input type="hidden" value="{{ $offers->genre }}" name="eventer_genre">
                <input type="hidden" value="{{ $offers->place }}" name="place">
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
</x-app-layout>
