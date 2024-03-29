<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo class="mt-8" />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4 flex">
                <x-jet-label for="name" value="{{ __('代表者氏名') }}" />
                <x-jet-label for="name" style="color: #FF0000;" value="{{ __('（必須）') }}" />
            </div>
                <x-jet-input id="name" class="block mt-1 w-full" style="height: 30px;" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />

            <div class="mt-4 flex">
                <x-jet-label for="kana" value="{{ __('ふりがな') }}" />
                <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
            </div>
                <x-jet-input id="kana" class="block mt-1 w-full" style="height: 30px;" type="text" name="kana" :value="old('kana')" autofocus autocomplete="kana" />


            <div class="mt-4 flex">
                <x-jet-label for="name_bands" value="{{ __('バンド/ユニット名') }}" />
                <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
            </div>
                <x-jet-input id="name_bands" class="block mt-1 w-full" style="height: 30px;" type="text" name="name_bands" :value="old('name_bands')" autofocus autocomplete="name_bands" />

            <div class="mt-4 flex">
                <x-jet-label for="kana" value="{{ __('フリガナ') }}" />
                <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
            </div>
                <x-jet-input id="kana_bands" class="block mt-1 w-full" style="height: 30px;" type="text" name="kana_bands" :value="old('kana_bands')" autofocus autocomplete="kana_bands" />

            <div class="mt-4 flex">
                <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
                <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
            </div>
                <x-jet-input id="email" class="block mt-1 w-full" style="height: 30px;" type="email" name="email" :value="old('email')" autofocus autocomplete="email" />

            <div class="mt-4 flex">
                <x-jet-label for="password" value="{{ __('パスワード') }}" />
                <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
            </div>
                <x-jet-input id="password" class="block mt-1 w-full" style="height: 30px;" type="password" name="password" autocomplete="new-password" />

            <div class="mt-4 flex">
                <x-jet-label for="password_confirmation" value="{{ __('パスワード確認用') }}" />
                <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
            </div>
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" style="height: 30px;" type="password" name="password_confirmation" autocomplete="new-password" />

            <!-- 利用規約とプライバシーポリシー...使わない
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif
            -->

            <div class="flex items-center justify-around mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>

            <div x-data="{isShow:false}" class="pt-3">
                <div class="mt-4 flex justify-center">
                    <x-jet-secondary-button type="button" @click="isShow= !isShow">
                        <div class="text-base">{{ __('任意項目を表示') }}</div>
                        <div class="test-sm">aaa</div>
                    </x-jet-secondary-button>
                </div>

                <div x-show="isShow">
                    <div class="mt-4 flex">
                        <x-jet-label for="name" value="{{ __('代表者氏名') }}" />
                        <x-jet-label for="name" style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        <x-jet-input id="name" class="block mt-1 w-full" style="height: 30px;" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />

                    <div class="mt-4 flex">
                        <x-jet-label for="kana" value="{{ __('ふりがな') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        <x-jet-input id="kana" class="block mt-1 w-full" style="height: 30px;" type="text" name="kana" :value="old('kana')" autofocus autocomplete="kana" />


                    <div class="mt-4 flex">
                        <x-jet-label for="name_bands" value="{{ __('バンド/ユニット名') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        <x-jet-input id="name_bands" class="block mt-1 w-full" style="height: 30px;" type="text" name="name_bands" :value="old('name_bands')" autofocus autocomplete="name_bands" />

                    <div class="mt-4 flex">
                        <x-jet-label for="kana" value="{{ __('フリガナ') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        <x-jet-input id="kana_bands" class="block mt-1 w-full" style="height: 30px;" type="text" name="kana_bands" :value="old('kana_bands')" autofocus autocomplete="kana_bands" />

                    <div class="mt-4 flex">
                        <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        <x-jet-input id="email" class="block mt-1 w-full" style="height: 30px;" type="email" name="email" :value="old('email')" autofocus autocomplete="email" />

                    <div class="mt-4 flex">
                        <x-jet-label for="password" value="{{ __('パスワード') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        <x-jet-input id="password" class="block mt-1 w-full" style="height: 30px;" type="password" name="password" autocomplete="new-password" />

                    <div class="mt-4 flex">
                        <x-jet-label for="password_confirmation" value="{{ __('パスワード確認用') }}" />
                        <x-jet-label style="color: #FF0000;" value="{{ __('（必須）') }}" />
                    </div>
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" style="height: 30px;" type="password" name="password_confirmation" autocomplete="new-password" />
                </div>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
