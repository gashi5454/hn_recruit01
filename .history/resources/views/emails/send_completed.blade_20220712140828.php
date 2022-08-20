<x-app-layout>
    <div class="flex items-top justify-center h-auto bg-white">

        <div class="max-w-6xl mt-10 py-10 mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 border-01">
                <div class="p-8 text-base">
                    エントリーが完了しました
                </div>
                <form action="{{ url('/')}}" method="get">
                    <div class="p-8 flex items-center">
                        <x-jet-button class="mx-auto text-xl">
                            {{ __('トップへ戻る') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
