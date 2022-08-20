<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'imvibes') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('storage\icon\imvibes_favicon.png') }}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script type="text/javascript" defer>
            const audio_select = document.getElementById("audio_select");

            window.onload = function() {
                document.getElementById('instIsOpen').style.display="none";
                const audio_select = document.getElementById('audio_select').value;

				if (audio_select == 'data') {
					document.getElementById('dataIsOpen').style.display="";
                    document.getElementById('urlIsOpen').style.display="none";
				} else if (audio_select == 'url') {
					document.getElementById('dataIsOpen').style.display="none";
                    document.getElementById('urlIsOpen').style.display="";
				} else {
					document.getElementById('dataIsOpen').style.display="none";
                    document.getElementById('urlIsOpen').style.display="none";
                }
			}

            function changeInstView() {
				let id = document.getElementById('vo_inst').value;

				if (id=='その他') {
					document.getElementById('instIsOpen').style.display="";
				} else {
					document.getElementById('instIsOpen').style.display="none";
				}
			}

			function changeAudioView() {
                let id = document.getElementById('audio_select').value;

				if (id=='data') {
					document.getElementById('dataIsOpen').style.display="";
                    document.getElementById('urlIsOpen').style.display="none";
				} else if (id=='url') {
					document.getElementById('dataIsOpen').style.display="none";
                    document.getElementById('urlIsOpen').style.display="";
				} else {
					document.getElementById('dataIsOpen').style.display="none";
                    document.getElementById('urlIsOpen').style.display="none";
				}
			}
		</script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-white">
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
