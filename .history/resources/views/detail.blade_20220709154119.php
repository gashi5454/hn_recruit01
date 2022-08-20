<x-app-layout>
<div class="flex items-top justify-center h-auto bg-white py-4">

<div class="mt-8 mb-16 px-6 mx-auto xs:px-0 min:px-0 sm:px-2 md:px-4 lg:px-4">
    <p class="mt-8 px-2 line-break xs:w-full min:w-305px sm:w-500px md:w-600px lg:w-700px xs:text-base min:text-base sm:text-lg md:text-lg lg:text-lg flex justify-center bg-white border-01">
    @if(isset($offers->title))
        <?php print_r ($offers->title); ?>
    @else
        タイトルなし
    @endif
    </p>

    <div class="mt-16 flex-1 justify-center">
    @if(isset($offers->detail_photo))
        <img class="mx-auto xs:w-full min:w-305px sm:w-500px md:w-600px lg:w-700px h-full" src="{{ asset($offers->detail_photo) }}" alt="image">
    @else
        <img class="mx-auto xs:w-full min:w-305px sm:w-500px md:w-600px lg:w-700px h-full" src="{{ asset('storage/datail-photos/default.jpg') }}" alt="image">
    @endif
    </div>

    <div class="mt-16 xs:w-full min:w-305px sm:w-500px md:w-600px lg:w-700px bg-white border-01">
        <div class="p-8 line-break">

            <div class="flex justify-center bg-gray-500 text-white text-base mt-8 mb-16">募集情報</div>

            <div class="mt-8">
                <x-jet-label for="genre" value="{{ __('内容') }}" />
                <div class="mt-1 text-sm">
                @if(isset($offers->contents))
                    <?php print_r ($offers->contents); ?>
                @else
                    情報なし
                @endif
                </div>
            </div>

            <div class="mt-8">
                <x-jet-label for="genre" value="{{ __('出演日') }}" />
                <div class="mt-1 text-sm">
                <?php
                $date = $offers->appear_date;
                $datetime = new DateTime($date);
                $week = array("日", "月", "火", "水", "木", "金", "土");
                $w = (int)$datetime->format('w');
                ?>
                @if(isset($offers->appear_date))
                    {{ $offers->appear_date }} ( {{ $week[$w] }} )
                @else
                    情報なし
                @endif
                </div>
            </div>

            <div class="mt-8">
                <x-jet-label for="genre" value="{{ __('ジャンル') }}" />
                <div class="mt-1 text-sm">
                @if(isset($offers->genre))
                    {{ $offers->genre }}
                @else
                    情報なし
                @endif
                </div>
            </div>

            <div class="mt-8">
                <x-jet-label for="genre" value="{{ __('ノルマ') }}" />
                <div class="mt-1 text-sm">
                @if(isset($offers->quota))
                    {{ $offers->quota }}
                @else
                    情報なし
                @endif
                </div>
            </div>

            <div class="mt-8">
                <x-jet-label for="genre" value="{{ __('出演条件') }}" />
                <div class="mt-1 text-sm">
                @if(isset($offers->requirement))
                    {{ $offers->requirement }}
                @else
                    情報なし
                @endif
                </div>
            </div>

            <div class="mt-8">
                <x-jet-label for="genre" value="{{ __('募集バンド数') }}" />
                <div class="mt-1 text-sm">
                @if(isset($offers->number_of_bands))
                    {{ $offers->number_of_bands }}
                @else
                    情報なし
                @endif
                </div>
            </div>

            <form action="{{ url('/applies')}}" method="get">

            <div class="flex items-center justify-center mt-6">
                <x-jet-button class="m-4 text-base">
                    {{ __('応募画面へ進む') }}
                </x-jet-button>
            </div>

            <div class="flex justify-center bg-gray-500 text-white text-base my-16">会場情報</div>

            <div class="mt-8">
                <x-jet-label for="genre" value="{{ __('会場') }}" />
                <div class="mt-1 text-sm">
                @if(isset($offers->place))
                    {{ $offers->place }}
                @else
                    情報なし
                @endif
                </div>
            </div>

            <div class="mt-8">
                <x-jet-label for="genre" value="{{ __('収容人数') }}" />
                <div class="mt-1 text-sm">
                @if(isset($offers->capacity))
                    {{ $offers->capacity }}
                @else
                    情報なし
                @endif
                </div>
            </div>

            <div class="mt-8">
                <x-jet-label for="genre" value="{{ __('住所') }}" />
                <div class="mt-1 text-sm">
                @if(isset($offers->postal_code) and isset($offers->address))
                    {{ $offers->postal_code }} </br> {{ $offers->address }}
                @elseif(isset($offers->postal_code))
                    {{ $offers->postal_code }}
                @elseif(isset($offers->address))
                    {{ $offers->address }}
                @else
                    情報なし
                @endif
                </div>
            </div>

            <div class="mt-8">
                <x-jet-label for="genre" value="{{ __('連絡先') }}" />
                <div class="mt-1 text-sm">
                @if(isset($offers->tel))
                    {{ $offers->tel }}
                @else
                    情報なし
                @endif
                </div>
            </div>

            <div class="mt-8">
                <div class="flex">
                    <x-jet-label for="genre" value="{{ __('その他連絡先') }}" />
                    <div class="ml-1 text-gray-600 dark:text-gray-400 text-xs">(メールアドレス、LINE IDなど)</div>
                </div>
                <div class="mt-1 text-sm">
                @if(isset($offers->other_contact))
                    {{ $offers->other_contact }}
                @else
                    情報なし
                @endif
                </div>
            </div>

            <div class="mt-8">
                <x-jet-label for="genre" value="{{ __('代表者氏名') }}" />
                <div class="mt-1 text-sm">
                @if(isset($offers->name))
                    {{ $offers->name }}
                @else
                    情報なし
                @endif
                </div>
            </div>


                {{ csrf_field()}}
                <input type="hidden" value="{{ $eventers->id }}" name="eventer_id">
                <input type="hidden" value="{{ $eventers->email }}" name="eventer_email">
                <input type="hidden" value="{{ $offers->id }}" name="offer_id">
                <input type="hidden" value="{{ $offers->appear_date }}" name="appear_date">
                <input type="hidden" value="{{ $offers->title }}" name="title">
                <input type="hidden" value="{{ $offers->genre }}" name="eventer_genre">
                <input type="hidden" value="{{ $offers->place }}" name="place">
                <div class="flex items-center justify-center mt-6">
                    <x-jet-button class="m-4 text-base">
                        {{ __('応募画面へ進む') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</x-app-layout>
