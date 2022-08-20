<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
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

            window.onload = ()=>{
                const loader = document.getElementById('loader');
                loader.classList.add('loaded');
            }

            function changeListView() {
                const disp_list = document.getElementById("disp_list");
                const disp_value = disp_list.value;

                if(disp_value !== null){
                    location.href=disp_value;
                }

                const searchButton = document.getElementById("searchBtn");
                searchButton.disabled = true;
            }

            function changeSortView() {
                const ad_sort = document.getElementById("ad_sort");
                const ad_sort_value = ad_sort.value;

                if(ad_sort_value !== null){
                    location.href=ad_sort_value;
                }

                const searchButton = document.getElementById("searchBtn");
                searchButton.disabled = true;
            }

            function clearSearchInfo() {
                var keyword = document.getElementById("keyword");
                keyword.value = '';
                var appear_date_start = document.getElementById("appear_date_start");
                appear_date_start.value = '';
                var appear_date_end = document.getElementById("appear_date_end");
                appear_date_end.value = '';
                var address = document.getElementById("address");
                address.value = '';
                var genre = document.getElementById("genre");
                genre.value = '';
            }
        </script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-white">

        <div id="loader">
            <div class="spinner">
                <div class="cube1"></div>
                <div class="cube2"></div>
            </div>
        </div>

            <div class="fixed pl-36 text-sm bg-01 text-white">ライブ出演エントリーサイト</div>

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
