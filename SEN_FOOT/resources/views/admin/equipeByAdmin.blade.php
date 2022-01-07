<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <title>Gestion des equipes</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarAdmin')

    <center class="mt-12">
        <div class="inline-flex mt-8 space-x-8">
            <form method="get" action="{{ route('ajouterEquipeByAdmin') }}">
                @csrf
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-12 rounded-full" type="submit" name="submit">Ajouter une equipe</button>
            </form>
            <form method="get" action="{{ route('suppEquipeByAdmin') }}">
                @csrf
                <button class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-12 rounded-full" type="submit" name="submit">Supprimer une equipe</button>
            </form>
        </div>

        <div class="font-semibold text-4xl font-serif tracking-widest mt-8 mb-6">
            Liste des equipes
        </div>

        {{--                        AFFICHAGE DES EQUIPES SOUS FORME DE TABLEAU
        66@if ($equipes->count() > 0)
        <table class="table-auto shadow-lg bg-white mt-12">
            <thead>
                <tr>
                    <th class="bg-blue-100 border text-left px-10 py-4">LOGO</th>
                    <th class="bg-blue-100 border text-left px-10 py-4">EQUIPE</th>
                    <th class="bg-blue-100 border text-left px-6 py-4">SIEGE</th>
                    <th class="bg-blue-100 border text-left px-6 py-4">DEVISE</th>
                    <th class="bg-blue-100 border text-left px-6 py-4">TERRAIN</th>
                    <th class="bg-blue-100 border text-left px-6 py-4">DATE DE CREATION</th>
                    <th class="bg-blue-100 border text-left px-6 py-4">ACTION</th>
                </tr>
            </thead>
            <tbody>
                66@foreach ($equipes as $equipe)
                    <tr >
                        <td class="border px-10 py-5"><img class="object-scale-down w-20 h-10" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}"></td>
                        <td class="border px-10 py-5">{{ $equipe->nomequipe }}</td>
                        <td class="border px-6 py-5">{{ $equipe->siege }}</td>
                        <td class="border px-6 py-5">{{ $equipe->devise }}</td>
                        <td class="border px-6 py-5">{{ $equipe->terraindom }}</td>
                        <td class="border px-6 py-5">{{ $equipe->datedecreation }}</td>
                        <td>
                            <form action="{{ route('deleteEquipe', $equipe->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                66@endforeach
            </tbody>
        </table>
        66@else
            <span class="mt-8">Aucune equipe en base de donnée</span>
        66@endif
        --}}

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-2xl text-green-500 mt-5">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if (Session::get('fail'))
            <div class="alert alert-danger text-2xl text-red-500 mt-5">
                {{ Session::get('fail') }}
            </div>
        @endif

        @if ($equipes->count() > 0)
                @foreach ($equipes as $equipe)
                    <div class="inline-block box-border h-60 w-60 p-4 border-4 border-gray-400 mt-5 mx-10">
                        <img class="object-scale-down w-20 h-20" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                            <div class="text-3xl text-black mt-3 uppercase mb-2 bg-gradient-to-r from-blue-300 to-black-500">
                                {{ $equipe->nomequipe }}
                            </div>
                            <div class="mb-5">
                                {{ $equipe->terraindom }}
                            </div>
                            <a href="{{ route('pageModifEquipe',$equipe->id) }}" class="border bg-green-500 hover:bg-green-700 p-2 text-white hover:shadow-lg rounded-lg text-xs font-thin">Edit</a>
                    </div>
                @endforeach
        @else
            <span class="mt-8">Aucune equipe en base de donnée</span>
        @endif

    </center>

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

{{--<div class="bg-no-repeat bg-bottom" style="background-image: url({{ asset('images/terrain_1.jpg') }});">--}}
