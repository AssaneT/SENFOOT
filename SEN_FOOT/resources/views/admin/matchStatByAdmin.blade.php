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
    <div class="mt-1 bg-white shadow-md">
        <div class="relative flex items-center h-12">
            <div class="flex-1 flex items-center justify-center">
                <div class="hidden sm:block sm:ml-6">
                    <ul class="justify-center items-center flex space-x-14">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white"     -->
                        <li>
                            <a href="{{ route('pageMatch',[$championnats->id,$matches->id]) }}" class="no-underline text-grey-dark border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3">Effectif</a>
                        </li>
                        <li>
                            <a href="{{ route('pageStatMatch',[$championnats->id,$matches->id]) }}" class="no-underline text-teal-dark border-b-2 border-teal-dark uppercase tracking-wide font-bold text-xs py-3" aria-current="page">Statistique</a>
                        </li>
                        <li>
                            <a href="{{route('pageCompoMatch',[$championnats->id,$matches->id])}}" class="no-underline text-grey-dark border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3">Composition</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

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
                <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                    STATISTIQUES DE L'EQUIPE
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

        @php
            $date_time_now = date('Y-m-d H:i:s', time());
            $date_prevu = $matches->datematch." ".$matches->heurematch;
            $date_fin = date('Y-m-d H:i:s',strtotime("+2 hours", strtotime($date_prevu)));
        @endphp
        @foreach ($statistiques as $statistique)
            @if ($statistique->matche_id == $matches->id)
                @php
                    $ok = 1;
                @endphp
                <div>
                    <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                        Buteur
                    </span>
                </div>
                <div class="mb-6">
                    @foreach ($but as $bu)
                        @if ($bu->stat_id == $statistique->id)
                            @if ($bu->nom_equipe == $adom)
                                <div class="flex justify-start ml-72">
                                    <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                                        {{ $bu->but_equipe}}
                                    </span>
                                </div>
                            @endif

                            @if ($bu->nom_equipe == $aext)
                                <div class="flex justify-end mr-72">
                                    <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                                        {{ $bu->but_equipe}}
                                    </span>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="mb-6 md:flex md:justify-evenly">
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->tir_equipe_dom}}
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            Tir
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->tir_equipe_adv }}
                        </span>
                    </div>
                </div>
                <div class="mb-6 md:flex md:justify-evenly">
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->tircadre_equipe_dom }}
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            Tir cadrés
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->tircadre_equipe_adv }}
                        </span>
                    </div>
                </div>
                <div class="mb-6 md:flex md:justify-evenly">
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->possession_equipe_dom }}
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            Possession
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->possession_equipe_adv }}
                        </span>
                    </div>
                </div>
                <div class="mb-6 md:flex md:justify-evenly">
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->passe_equipe_dom }}
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            Passes
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->passe_equipe_adv }}
                        </span>
                    </div>
                </div>
                <div class="mb-6 md:flex md:justify-evenly">
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->faute_equipe_dom }}
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            Fautes
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->faute_equipe_adv }}
                        </span>
                    </div>
                </div>
                <div class="mb-6 md:flex md:justify-evenly">
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->cartonjaune_equipe_dom }}
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            Carton jaune
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->cartonjaune_equipe_adv }}
                        </span>
                    </div>
                </div>
                <div class="mb-6 md:flex md:justify-evenly">
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->cartonrouge_equipe_dom }}
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            Carton rouge
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->cartonrouge_equipe_adv }}
                        </span>
                    </div>
                </div>
                <div class="mb-6 md:flex md:justify-evenly">
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->horsjeu_equipe_dom }}
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            Hors jeu
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->horsjeu_equipe_adv }}
                        </span>
                    </div>
                </div>
                <div class="mb-6 md:flex md:justify-evenly">
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->corners_equipe_dom }}
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            Corners
                        </span>
                    </div>
                    <div>
                        <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                            {{ $statistique->corners_equipe_adv }}
                        </span>
                    </div>
                </div>

                <div class="mt-8 text-center space-x-12">
                    <a href="{{ route('pageModifStatMatch',[$championnats->id,$matches->id,$statistique->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">
                        Modifier
                    </a>
                    <a href="{{ route('pageAjoutButeur',[$championnats->id,$matches->id,$statistique->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">
                        Ajouter buteur
                    </a>
                </div>
            @endif
        @endforeach
        @if ($ok == 0)
            <span class="flex justify-center text-2xl text-gray-500">Pas de stat disponible</span>
            @if ($date_time_now >= $date_prevu)
                <div class="mt-6 text-center">
                    <a href="{{ route('pageAjoutStatMatch',[$championnats->id,$matches->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">
                        Ajouter stat
                    </a>
                </div>
            @endif
        @endif
    </div>

    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
