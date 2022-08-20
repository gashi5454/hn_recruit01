<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        <div class="shrink-0 flex items-center justify-center mb-8">
            <a href="{{ route('welcome') }}">
                <img style="width:50px; height:50px;" src="{{ asset('storage\icon\imvibes_icon.png') }}" alt="icon">
            </a>
        </div>
        <p class="text-lg flex justify-center mx-4 pt-6">
            パスワード再設定
        </p>
        </x-slot>

        <div class="flex items-center justify-center" >

        </div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('ご登録いただいたメールアドレスを入力してください。パスワード再設定用のURLをメールにてお送りします。') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
