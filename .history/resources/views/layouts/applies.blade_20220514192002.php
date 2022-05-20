<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/composition.js') }}" async></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script>
            $('select').change(function () {
                var val = $('select option:selected').val();
                if (val == 'select') return;
                $('section').fadeOut();
                $('section#' + val ).fadeIn();
            });

            $(".extraction").change(function() {

            var audio_val = $(".audio").val();

            if(audio_val == "ファイルを送信する") {
                $('#audio_data').css('display', 'block');
                $('#audio_url').css('display', 'none');
            }else if(audio_val == "動画などのURLを送信する") {
                $('#audio_data').css('display', 'none');
                $('#audio_url').css('display', 'block');
            }

            });
        </script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
