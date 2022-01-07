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
            $idAdom = $equipe->id;
        } elseif ($equipe->nomequipe == $matches->equipeadv) {
            $aext = $matches->equipeadv;
            $idAext = $equipe->id;
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
    <title>Compositions des équipes</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    @include('partiels.navBar')

    @include('partiels.navBarMatchPublic')

    <!-- This example requires Tailwind CSS v2.0+   -->
    <div class="mt-1 bg-white shadow-md">
        <div class="relative flex items-center h-12">
            <div class="flex-1 flex items-center justify-center">
                <div class="hidden sm:block sm:ml-6">
                    <ul class="justify-center items-center flex space-x-14">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white"     -->
                        <li>
                            <a href="{{ route('infoMatch',$matches->id) }}" class="no-underline text-grey-dark border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3">Effectif</a>
                        </li>
                        <li>
                            <a href="{{ route('infoMatchStatistique',$matches->id) }}" class="no-underline text-grey-dark border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3" aria-current="page">Statistique</a>
                        </li>
                        <li>
                            <a href="{{ route('infoMatchCompo',[$matches->championnat_id,$matches->id]) }}" class="no-underline text-teal-dark border-b-2 border-teal-dark uppercase tracking-wide font-bold text-xs py-3">Composition</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @php
        $date_time_now = date('Y-m-d H:i:s', time());
        $date_prevu = $matches->datematch." ".$matches->heurematch;
        $date_fin = date('Y-m-d H:i:s',strtotime("+2 hours", strtotime($date_prevu)));
    @endphp

    @if (Session::get('success'))
        <div class="flex justify-center mt-4 alert alert-success text-green-500 font-bold">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::get('fail'))
        <div class="flex justify-center mt-4 alert alert-danger text-red-500 font-bold">
            {{ Session::get('fail') }}
        </div>
    @endif

    <div class="w-full mt-5 mb-10">
        <div class="mb-10 md:flex md:justify-evenly">
            <div class="block mb-4 md:mr-2 md:mb-0">
                <div class="flex items-center justify-center">
                    @foreach ($equipes as $equipe)
                        @if ($equipe->nomequipe == $matches->equipedom)
                            <img class="object-scale-down w-15 h-15" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                        @endif
                    @endforeach
                </div>

                <div>
                    <span class="flex justify-center text-black uppercase">{{ $matches->equipedom }}</span>
                </div>
                <div class="mt-2">
                    <span class="flex justify-center">
                        @foreach ($formations as $formation)
                            <div class="ml-14">
                                @if (($formation->match_id == $matches->id) && ($formation->equipe_id == $idAdom))
                                    <span class="font-bold text-5xl text-blue-700">{{ $formation->formation }}</span>
                                @endif
                            </div>
                        @endforeach
                    </span>
                </div>
            </div>
            <div class="md:ml-2">
                <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                    COMPOSITION DES EQUIPES
                </span>
            </div>
            <div class="block md:ml-2">
                <div class="flex items-center justify-center">
                    @foreach ($equipes as $equipe)
                        @if ($equipe->nomequipe == $matches->equipeadv)
                            <img class="object-scale-down w-15 h-15" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                        @endif
                    @endforeach
                </div>

                <div>
                    <span class="flex justify-center text-black uppercase">{{ $matches->equipeadv }}</span>
                </div>
                <div class="mt-2">
                    <span class="flex justify-center">
                        @foreach ($formations as $formation)
                            <div class="mr-14">
                                @if (($formation->match_id == $matches->id) && ($formation->equipe_id == $idAext))
                                    <span class="font-bold text-5xl text-blue-700">{{ $formation->formation }}</span>
                                @endif
                            </div>
                        @endforeach
                    </span>
                </div>
            </div>
        </div>

        <div class="mt-5 flex justify-center text-1xl text-blue-900 underline font-bold mb-2">Gardien de but</div>
        <div class="block">
            <div class="flex justify-between items-center">
                <div class="block">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Gardien de but'))
                                @if ($effectif->club == $adom)
                                    <div class="ml-14 inline-flex space-x-2 items-center">
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>

                <div class="block">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Gardien de but'))
                                @if ($effectif->club == $aext)
                                    <div class="mr-14 inline-flex space-x-2 items-center">
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-center text-1xl text-blue-900 underline font-bold">Défenseur</div>
        <div class="block">
            <div class="flex justify-between">
                <div class="grid grid-flow-row auto-rows-max">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Défenseur'))
                                @if ($effectif->club == $adom)
                                    <div class="ml-14 inline-flex space-x-2 items-center">
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>

                <div class="grid grid-flow-row auto-rows-max">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Défenseur'))
                                @if ($effectif->club == $aext)
                                    <div class="flex justify-end mr-14 inline-flex space-x-2 items-center">
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-center text-1xl text-blue-900 underline font-bold mb-2">Milieu de terrain</div>
        <div class="block">
            <div class="flex justify-between">
                <div class="grid grid-flow-row auto-rows-max">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Milieu de terrain'))
                                @if ($effectif->club == $adom)
                                    <div class="ml-14 inline-flex space-x-2 items-center">
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>

                <div class="grid grid-flow-row auto-rows-max">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Milieu de terrain'))
                                @if ($effectif->club == $aext)
                                    <div class="flex justify-end mr-14 inline-flex space-x-2 items-center">
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-center text-1xl text-blue-900 underline font-bold mb-2">Attaquant</div>
        <div class="block">
            <div class="flex justify-between">
                <div class="grid grid-flow-row auto-rows-max">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Attaquant'))
                                @if ($effectif->club == $adom)
                                    <div class="ml-14 inline-flex space-x-2 items-center">
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>

                <div class="grid grid-flow-row auto-rows-max">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Attaquant'))
                                @if ($effectif->club == $aext)
                                    <div class="flex justify-end mr-14 inline-flex space-x-2 items-center">
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
