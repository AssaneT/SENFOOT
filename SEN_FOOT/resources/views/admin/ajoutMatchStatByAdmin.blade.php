@php
/*---------------------------------------------------------------*/
/*
    Titre : Affiche une date avec le nom du jour et du mois

    URL   : https://phpsources.net/code_s.php?id=469
    Auteur           : forty
    Website auteur   : http://www.toplien.fr/
    Date édition     : 20 Nov 2008
    Date mise à jour : 13 Aout 2019
    Rapport de la maj:
    - fonctionnement du code vérifié
*/
/*---------------------------------------------------------------*/
    if (setlocale(LC_TIME, 'fr_FR') == '') {
        setlocale(LC_TIME, 'FRA');  //correction problème pour windows
        $format_jour = '%#d';
    } else {
        $format_jour = '%e';
    }


    $adom = '';
    $aext = '';

    foreach ($equipes as $equipe) {
        if ($equipe->nomequipe == $matches->equipedom) {
            $adom = $matches->equipedom;
        } elseif ($equipe->nomequipe == $matches->equipeadv) {
            $aext = $matches->equipeadv;
        } else {
            continue;
        }
    }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <title>Mettre à jour statistique match</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarChampionnat')

    {{--    NavBar Match  --}}
    @include('admin.navBarMatch')

    <!-- This example requires Tailwind CSS v2.0+   -->
    <nav class="mt-1 bg-white shadow-md">
        <div class="relative flex items-center h-12">
            <div class="flex-1 flex items-center justify-center">
                <div class="hidden sm:block sm:ml-6">
                    <ul class="justify-center items-center flex space-x-14">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white"     -->
                        <li>
                            <a href="{{ route('pageMatch',[$championnats->id,$matches->id]) }}" class="no-underline text-grey-dark border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3">Effectif</a>
                        </li>
                        <li>
                            <a href="{{ route('pageStatMatch',[$championnats->id,$matches->id]) }}" class="no-underline text-teal-dark border-b-2 border-teal-dark uppercase tracking-wide font-bold text-xs py-3"  aria-current="page">Statistique</a>
                        </li>
                        <li>
                            <a href="#" class="no-underline text-grey-dark border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3">Composition</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <form class="w-full mt-8" action="{{ route('sauvegarderModifStatMatch',$matches->id) }}" method="POST">
        @csrf

        @if (Session::get('success'))
            <div class="flex justify-center alert alert-success text-green-500 font-bold mb-3">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::get('fail'))
            <div class="flex justify-center alert alert-danger mb-3">
                {{ Session::get('fail') }}
            </div>
        @endif

        <div class="mb-6 md:flex md:justify-evenly">
            <div class="mb-4 md:mr-2 md:mb-0">
                @foreach ($equipes as $equipe)
                    @if ($equipe->nomequipe == $matches->equipedom)
                        <img class="object-scale-down w-15 h-15" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                    @endif
                @endforeach
            </div>
            <div class="md:ml-2">
                @foreach ($equipes as $equipe)
                    @if ($equipe->nomequipe == $matches->equipeadv)
                        <img class="object-scale-down w-15 h-15" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                    @endif
                @endforeach
            </div>
        </div>
        <div class="mb-6 md:flex md:justify-evenly">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    But
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="but_equipe_dom"
                    type="number"
                    min="0" max="50"
                />
            </div>
            <div class="md:ml-2">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    But
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="but_equipe_adv"
                    type="number"
                    min="0" max="50"
                />
            </div>
        </div>
        <div class="mb-6 md:flex md:justify-evenly">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Tir
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="tir_equipe_dom"
                    type="number"
                    min="0" max="100"
                />
            </div>
            <div class="md:ml-2">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Tir
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="tir_equipe_adv"
                    type="number"
                    min="0" max="100"
                />
            </div>
        </div>
        <div class="mb-6 md:flex md:justify-evenly">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Tir cadrés
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="tir_cadre_equipe_dom"
                    type="number"
                    min="0" max="100"
                />
            </div>
            <div class="md:ml-2">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Tir cadrés
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="tir_cadre_equipe_adv"
                    type="number"
                    min="0" max="100"
                />
            </div>
        </div>
        <div class="mb-6 md:flex md:justify-evenly">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Possession
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="possession_equipe_dom"
                    type="number"
                    min="0" max="100"
                />
            </div>
            <div class="md:ml-2">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Possession
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="possession_equipe_adv"
                    type="number"
                    min="0" max="100"
                />
            </div>
        </div>
        <div class="mb-6 md:flex md:justify-evenly">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Passes
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="passe_equipe_dom"
                    type="number"
                    min="0" max="1000"
                />
            </div>
            <div class="md:ml-2">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Passes
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="passe_equipe_adv"
                    type="number"
                    min="0" max="1000"
                />
            </div>
        </div>
        <div class="mb-6 md:flex md:justify-evenly">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Fautes
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="faute_equipe_dom"
                    type="number"
                    min="0" max="100"
                />
            </div>
            <div class="md:ml-2">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Fautes
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="faute_equipe_adv"
                    type="number"
                    min="0" max="100"
                />
            </div>
        </div>
        <div class="mb-6 md:flex md:justify-evenly">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Carton jaune
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="carton_jaune_equipe_dom"
                    type="number"
                    min="0" max="22"
                />
            </div>
            <div class="md:ml-2">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Carton jaune
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="carton_jaune_equipe_adv"
                    type="number"
                    min="0" max="22"
                />
            </div>
        </div>
        <div class="mb-6 md:flex md:justify-evenly">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Carton rouge
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="carton_rouge_equipe_dom"
                    type="number"
                    min="0" max="22"
                />
            </div>
            <div class="md:ml-2">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Carton rouge
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="carton_rouge_equipe_adv"
                    type="number"
                    min="0" max="22"
                />
            </div>
        </div>
        <div class="mb-6 md:flex md:justify-evenly">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Hors jeu
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="hors_jeu_equipe_dom"
                    type="number"
                    min="0" max="100"
                />
            </div>
            <div class="md:ml-2">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Hors jeu
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="hors_jeu_equipe_adv"
                    type="number"
                    min="0" max="100"
                />
            </div>
        </div>
        <div class="mb-6 md:flex md:justify-evenly">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Corners
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="corners_equipe_dom"
                    type="number"
                    min="0" max="50"
                />
            </div>
            <div class="md:ml-2">
                <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                    Corners
                </label>
                <input
                    class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="corners_equipe_adv"
                    type="number"
                    min="0" max="50"
                />
            </div>
        </div>
        <div class="mt-8 text-center space-x-12">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded-full focus:outline-none focus:shadow-outline" type="submit">
                Enregistrer
            </button>
            <a href="{{ route('pageStatMatch',[$championnats->id,$matches->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                Annuler
            </a>
        </div>
    </form>

    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
