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

    $ok = 0;
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
    <title>Statistique match</title>
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

    <div class="w-full mt-8">
        <div class="mb-10 md:flex md:justify-evenly">
            <div class="mb-4 md:mr-2 md:mb-0">
                @foreach ($equipes as $equipe)
                    @if ($equipe->nomequipe == $matches->equipedom)
                        <img class="object-scale-down w-15 h-15" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                    @endif
                @endforeach
            </div>
            <div class="md:ml-2">
                <span class="block mb-2 text-2xl text-center font-bold text-gray-700">
                    Ajout buteur
                </span>
            </div>
            <div class="md:ml-2">
                @foreach ($equipes as $equipe)
                    @if ($equipe->nomequipe == $matches->equipeadv)
                        <img class="object-scale-down w-15 h-15" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                    @endif
                @endforeach
            </div>
        </div>
        <form action="{{ route('sauvegarderButeur',$stat->id) }}" method="POST">
            @csrf

            @if (Session::get('success'))
                <div class="alert alert-success text-center text-green-500 font-bold">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::get('fail'))
                <div class="alert alert-danger text-center">
                    {{ Session::get('fail') }}
                </div>
            @endif

            <div class="mb-6 md:flex md:justify-evenly">
                <div class="mb-4 md:mr-2 md:mb-0">
                    <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                        But
                    </label>
                    <select name="but_equipe" class="w-full px-8 py-2 text-sm leading-tight text-gray-700 text-center border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                        <option>--selectionner le joueur--</option>
                        <optgroup label="<?php echo"$adom"; ?>">
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->club == $adom)
                                    <option>{{ $effectif->numero }} {{ $effectif->prenom }} {{ $effectif->nom }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="<?php echo"$aext"; ?>">
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->club == $aext)
                                    <option>{{ $effectif->numero }} {{ $effectif->prenom }} {{ $effectif->nom }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="Aucun">
                            <option>Aucun</option>
                        </optgroup>
                    </select>
                </div>
                <div class="md:ml-2">
                    <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                        Contre son camp
                    </label>
                    <select name="but_contresoncamp" class="w-full px-8 py-2 text-sm leading-tight text-gray-700 text-center border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                        <option>--selectionner le joueur--</option>
                        <optgroup label="<?php echo"$adom"; ?>">
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->club == $adom)
                                    <option>{{ $effectif->numero }} {{ $effectif->prenom }} {{ $effectif->nom }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="<?php echo"$aext"; ?>">
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->club == $aext)
                                    <option>{{ $effectif->numero }} {{ $effectif->prenom }} {{ $effectif->nom }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="Aucun">
                            <option>Aucun</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="mb-6 md:flex md:justify-evenly">
                <div class="mb-4 md:mr-2 md:mb-0">
                    <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                        Passeur décisive
                    </label>
                    <select name="passdec_equipe" class="w-full px-8 py-2 text-sm leading-tight text-gray-700 text-center border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                        <option>--selectionner le passeur--</option>
                        <optgroup label="<?php echo"$adom"; ?>">
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->club == $adom)
                                    <option>{{ $effectif->numero }} {{ $effectif->prenom }} {{ $effectif->nom }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="<?php echo"$aext"; ?>">
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->club == $aext)
                                    <option>{{ $effectif->numero }} {{ $effectif->prenom }} {{ $effectif->nom }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="Aucun">
                            <option>Aucun</option>
                        </optgroup>
                    </select>
                </div>
                <div class="md:ml-2">
                    <label class="block mb-2 text-sm text-center font-bold text-gray-700">
                        Nom de l'équipe
                    </label>
                    <select name="nom_equipe" class="w-full px-8 py-2 text-sm leading-tight text-gray-700 text-center border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                        <option>--selectionner l'équipe--</option>
                        <option><?php echo"$adom"; ?></option>
                        <option><?php echo"$aext"; ?></option>
                    </select>
                </div>
            </div>
                <div class="mt-8 text-center space-x-12">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="submit">
                        Ajouter
                    </button>
                    <a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">
                        Annuler
                    </a>
                </div>
        </form>


    </div>

    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
