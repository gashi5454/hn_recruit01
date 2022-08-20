<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'imvibes') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script type="text/javascript" defer>
		window.onload = function() {
			document.getElementById('dataIsOpen').style.display="none";
            document.getElementById('urlIsOpen').style.display="none";
            document.getElementById('instIsOpen').style.display="none";
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

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    @livewireScripts
</body>

</html>
