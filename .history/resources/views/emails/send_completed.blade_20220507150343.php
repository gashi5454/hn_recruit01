<x-app-layout>
    <div class="relative flex items-top justify-center h-auto bg-gray-100 dark:bg-white sm:items-center py-4 sm:pt-0">

        <div class="max-w-6xl mt-10 py-10 mx-auto sm:px-6 lg:px-8">
            <p class="text-2xl flex justify-center pt-8 sm:pt-0 dark:text-gray-900">
                応募完了
            </p>

            <div class="mt-8 bg-white dark:bg-gray-100 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    ライブオファーへの応募が完了しました
                </div>
                <form action="{{ url('/')}}" method="get">
                    <div class="p-6 items-center">
                        <x-jet-button class="text-xl">
                            {{ __('トップへ戻る') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
