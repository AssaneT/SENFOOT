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
    <title>Modifier un joueur</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarAdmin')

    <center>
        <!-- Container -->
		<div class="container"> <!-- mx-auto mofi nékone -->
			<div class="flex h-screen bg-gray-200 items-center justify-center mt-20 mb-32">
				<!-- Row -->
				<div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
                        <h3 class="pt-4 text-4xl text-center font-semibold text-green-500 mt-8 mb-4">Mettre à jour le joueur</h3>
                            <form class="px-8 pt-6 pb-8 bg-white rounded" action="{{ route('majJoueur',$effectifs->id) }}" method="POST">
                                @csrf

                                @if (Session::get('success'))
                                    <div class="flex justify-center alert alert-success text-green-500 font-bold">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                @if (Session::get('fail'))
                                    <div class="flex justify-center alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif

                                <div class="mb-4 md:flex md:justify-between">
                                    <div class="mb-4 md:mr-2 md:mb-0">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Prenom
                                        </label>
                                        <input
                                            class="w-full px-8 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            name="prenom"
                                            type="text"
                                            value="<?php echo "$effectifs->prenom"; ?>"
                                        />
                                            <span class="text-danger text-red-500">@error('prenom'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="md:ml-2">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Nom
                                        </label>
                                        <input
                                            class="w-full px-8 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            name="nom"
                                            type="text"
                                            value="<?php echo "$effectifs->nom"; ?>"
                                        />
                                        <span class="text-danger text-red-500">@error('nom'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="mt-6 md:flex md:justify-between">
                                    <div class="mb-4 md:mr-2 md:mb-0">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Date de naissance
                                        </label>
                                        <input
                                            class="w-full px-8 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            name="datenaissance"
                                            type="date"
                                            value="<?php echo "$effectifs->datenaissance"; ?>"
                                        />
                                        <span class="text-danger text-red-500">@error('datenaissance'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="md:ml-2">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Lieu de naissance
                                        </label>
                                        <input
                                            class="w-full px-8 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            name="lieunaissance"
                                            type="text"
                                            value="<?php echo "$effectifs->lieunaissance"; ?>"
                                        />
                                        <span class="text-danger text-red-500">@error('lieunaissance'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="mt-6 md:flex md:justify-between">
                                    <div class="mb-4 md:mr-2 md:mb-0">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Nationalite
                                        </label>
                                        <input
                                            class="w-full px-8 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            name="nationalite"
                                            type="text"
                                            value="<?php echo "$effectifs->nationalite"; ?>"
                                        />
                                        <span class="text-danger text-red-500">@error('nationalite'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="md:ml-2">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Club
                                        </label>
                                        <select name="club" class="w-full px-16 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                            <option><?php echo "$effectifs->club"; ?></option>
                                            @if ($equipes->count() > 0)
                                                @foreach ($equipes as $equipe)
                                                    <option><?php echo "$equipe->nomequipe"; ?></option>
                                                @endforeach
                                            @else
                                                <span class="mt-8">Aucune equipe en base de donnée</span>
                                            @endif
                                        </select>
                                        <span class="text-danger text-red-500">@error('club'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="mt-6 md:flex md:justify-between">
                                    <div class="mb-4 md:mr-2 md:mb-0">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Poste
                                        </label>
                                        <select name="poste"
                                            class="text-center w-full px-14 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                            <option><?php echo "$effectifs->poste"; ?></option>
                                            <option>Gardien de but</option>
                                            <option>Défenseur</option>
                                            <option>Milieu de terrain</option>
                                            <option>Attaquant</option>
                                        </select>
                                        <span class="text-danger text-red-500">@error('poste'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="md:ml-2">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Age
                                        </label>
                                        <input
                                            class="w-full px-8 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            name="age"
                                            type="number"
                                            value="<?php echo "$effectifs->age"; ?>"
                                        />
                                        <span class="text-danger text-red-500">@error('age'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="mt-6 md:flex md:justify-between">
                                    <div class="mb-4 md:mr-2 md:mb-0">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Numéro
                                        </label>
                                        <input
                                            class="w-full px-8 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            name="numero"
                                            type="number"
                                            value="<?php echo "$effectifs->numero" ?>"
                                        />
                                        <span class="text-danger text-red-500">@error('numero'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="md:ml-2">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Taille
                                        </label>
                                        <input
                                            class="w-full px-8 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            name="taille"
                                            type="text"
                                            value="<?php echo "$effectifs->taille" ?>"
                                        />
                                        <span class="text-danger text-red-500">@error('taille'){{ $message }}@enderror</span>
                                    </div>
                                </div>

                                <div class="mt-8 text-center">
                                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="submit">
                                        Enregistrer les modifications
                                    </button>
                                </div>
                            </form>
                            <form action="{{ route('pageEffectifAdmin') }}" method="get">
                                <button class="mb-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="submit">
                                    Annuler
                                </button>
                            </form>
                    </div>
                </div>
            </div>


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
