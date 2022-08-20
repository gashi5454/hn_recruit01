<x-app-layout>
    <div class="flex items-top justify-center h-auto bg-white">

        <div class="mt-10 py-10 mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 border-01">
                <div class="p-4 pb-4 text-base text-center">
                    エントリーが完了しました。<br>
                    ご登録のメールアドレスに確認メールを送信しましたのでご確認ください。
                </div>
                <form action="{{ url('/')}}" method="get">
                    <div class="pb-8 flex items-center">
                        <x-jet-button class="mx-auto text-xl">
                            {{ __('トップへ戻る') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
