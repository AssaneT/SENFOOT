<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <title>Gestion des Compétitions</title>
</head>
<body class="leading-normal tracking-normal" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarAdmin')

    <div class="w-full flex justify-center mt-14 items-center text-center">
        <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <a href="{{ route('pageCreerChampionnat') }}">Creer un championnat</a>
        </button>
    </div>

    <section class="border-b py-8">
        <div class="container mx-auto flex flex-wrap">
            @if ($championnats->count() > 0)
                @foreach ($championnats as $championnat)
                    <div class="w-full md:w-1/3 p-6 bg-blue-100 flex flex-col flex-grow flex-shrink">
                        <div class="flex-1 bg-gradient-to-r from-gray-400 to-blue-500 rounded-t rounded-b-none overflow-hidden shadow">
                            <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                                <div class="w-full font-bold text-center text-xl font-serif tracking-widest text-white mt-4 mb-4 px-6">
                                    {{ $championnat->nomchampionnat }}
                                </div>
                            </a>
                        </div>
                        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                            <div class="flex justify-center">
                                <span class="font-semibold uppercase">{{ $championnat->pays }}</span>
                            </div>
                            <div class="flex justify-center mt-1">
                                <span class="font-semibold">{{ $championnat->nombrequipe }} équipes</span>
                            </div>
                            <div class="flex justify-center mt-5 space-x-5">
                                <button class="mx-auto lg:mx-0 hover:underline bg-blue-500 text-white font-bold rounded-full py-2 px-2 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    <a href="{{ route('pageModifCompet',$championnat->id) }}">
                                        Editer
                                    </a>
                                </button>
                                <button class="mx-auto lg:mx-0 hover:underline bg-red-500 text-white font-bold rounded-full py-2 px-2 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    <a href="#">
                                        Delete
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>


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
    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
