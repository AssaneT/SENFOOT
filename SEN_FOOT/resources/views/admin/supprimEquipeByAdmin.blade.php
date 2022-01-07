<?php use App\Models\Equipe; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <title>Supprimer une équipe</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarAdmin')

    <center class="mt-24">
        <form method="GET" action="">
            @csrf

            <div class="font-semibold text-4xl bg-clip-text text-transparent bg-gradient-to-r from-red-500 to-blue-500 mt-8 mb-6">
                Supprimer une équipe
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block text-2xl text-gray-700 font-semibold mt-5 mb-2">
                    Nom equipe
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="equipe" type="text" placeholder="Saisir le nom de l'équipe" value="{{ old('equipe') }}"/>
            </div>

            <div class="inline-block">
                <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" name="envoyer" type="submit">
                    Rechercher
                </button>
            </div>
        </form>

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-2xl text-green-500 mt-5">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($equipes->count() > 0)
        <table class="table-auto shadow-lg bg-white mt-10">
            <thead>
                <tr>
                    <th class="bg-blue-100 border text-left px-10 py-4">LOGO</th>
                    <th class="bg-blue-100 border text-left px-10 py-4">EQUIPE</th>
                    <th class="bg-blue-100 border text-left px-6 py-4">SIEGE</th>
                    <th class="bg-blue-100 border text-left px-6 py-4">DEVISE</th>
                    <th class="bg-blue-100 border text-left px-6 py-4">TERRAIN</th>
                    <th class="bg-blue-100 border text-left px-6 py-4">DATE DE CREATION</th>
                    <th class="bg-blue-100 border text-left px-10 py-4">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipes as $equipe)
                    <tr>
                        <td class="border px-10 py-5"><img class="object-scale-down w-20 h-10" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}"></td>
                        <td class="border px-10 py-5">{{ $equipe->nomequipe }}</td>
                        <td class="border px-6 py-5">{{ $equipe->siege }}</td>
                        <td class="border px-6 py-5">{{ $equipe->devise }}</td>
                        <td class="border px-6 py-5">{{ $equipe->terraindom }}</td>
                        <td class="border px-6 py-5">{{ $equipe->datedecreation }}</td>
                        <td class="border px-6 py-5">
                            <form action="{{ route('deleteEquipe',$equipe->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type='hidden' name='id' value='{{ $equipe->id }}'>
                                <button class="border bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
