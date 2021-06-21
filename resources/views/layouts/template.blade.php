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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

    </head>
    <body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

    <!--Nav-->
    <nav class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink content-center md:w-1/3 md:justify-start text-white text-2xl">
                <a href="#" class="ml-4">
                    Rekam Medis
                </a>
            </div>
            <div class="flex flex-shrink content-center md:w-2/3 md:justify-end">
                @livewire('navigation-menu')
            </div>
            <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                <span class="relative w-full">
                </span>
            </div>
        </div>
    </nav>


    <div class="flex flex-col md:flex-row">

        <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

            <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-3 flex-1">
                        <a href="{{route('transaksi.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                           <span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block ">Transaksi</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="{{route('datahewan.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-yellow-500">
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block ">Data Hewan</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="{{route('datapemilik.index')}}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                           <span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block ">Data Pemilik</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="{{route('datadokter.index')}}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-green-500">
                            <span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block ">Data Dokter</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--Konten-->
        <div class="main-content flex-1 bg-white mt-12 md:mt-2 pb-24 md:pb-5">
            {{$slot}}
        </div>
    <script>
        /*Toggle dropdown list*/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /*Filter dropdown options*/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>
    @stack('modals')
    @livewireScripts
    </body>
</html>
