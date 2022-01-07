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
    <title>Gestion des effectifs</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarAdmin')

    <div class="flex justify-center mt-24">
        <form method="get" action="{{ route('pageAjouterJoueur') }}">
            @csrf
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-12 rounded-full" type="submit" name="submit">Ajouter un joueur</button>
        </form>
    </div>

    <center>
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

        <form class="" method="GET" action="">
            @csrf

            <div class="font-semibold text-4xl bg-clip-text text-transparent bg-gradient-to-r from-red-500 to-blue-500 mt-8 mb-6">
                Rechercher un joueur
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="nomjoueur" type="text" placeholder="Saisir le nom du joueur" value="{{ old('nomjoueur') }}"/>
            </div>

            <div class="inline-block">
                <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" name="envoyer" type="submit">
                    Rechercher
                </button>
            </div>
        </form>

        @if ($effectifs->count() > 0)
            <div class="flex justify-center font-semibold text-3xl font-serif tracking-widest mt-8 mb-6">
                Liste des joueurs
            </div>
            <table class="table-auto shadow-lg bg-white mt-10">
                <thead>
                    <tr>
                        <th class="bg-purple-300 border text-center px-6 py-4">PRENOM</th>
                        <th class="bg-purple-300 border text-center px-6 py-4">NOM</th>
                        <th class="bg-purple-300 border text-center px-6 py-4">DATE DE NAISSANCE</th>
                        <th class="bg-purple-300 border text-center px-6 py-4">LIEU DE NAISSANCE</th>
                        <th class="bg-purple-300 border text-center px-6 py-4">NATIONALITE</th>
                        <th class="bg-purple-300 border text-center px-12 py-4">CLUB</th>
                        <th class="bg-purple-300 border text-center px-6 py-4">NUMERO</th>
                        <th class="bg-purple-300 border text-center px-10 py-4">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($effectifs as $effectif)
                        <tr>
                            <td class="border px-6 py-3">{{ $effectif->prenom }}</td>
                            <td class="border px-6 py-3">{{ $effectif->nom }}</td>
                            <td class="border px-6 py-3 text-center">{{ $effectif->datenaissance }}</td>
                            <td class="border px-6 py-3 text-center">{{ $effectif->lieunaissance }}</td>
                            <td class="border px-6 py-3 text-center">{{ $effectif->nationalite }}</td>
                            <td class="border px-12 py-3">{{ $effectif->club }}</td>
                            <td class="border px-6 py-3 text-center">{{ $effectif->numero }}</td>
                            <td class="border px-10 py-3">
                                <a href="{{ route('pageModifJoueur',$effectif->id) }}" class="border bg-green-500 hover:bg-green-700 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                                <a href="{{ route('deleteJoueur',$effectif->id) }}" class="border bg-red-500 hover:bg-red-700 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span class="mt-8">Aucun joueur en base de donnée</span>
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
