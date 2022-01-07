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
    <title>Match</title>
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
                            <a href="{{ route('pageMatch',[$championnats->id,$matches->id]) }}" class="no-underline text-teal-dark border-b-2 border-teal-dark uppercase tracking-wide font-bold text-xs py-3" aria-current="page">Effectif</a>
                        </li>
                        <li>
                            <a href="{{ route('pageStatMatch',[$championnats->id,$matches->id]) }}" class="no-underline text-grey-dark border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3">Statistique</a>
                        </li>
                        <li>
                            <a href="{{route('pageCompoMatch',[$championnats->id,$matches->id])}}" class="no-underline text-grey-dark border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3">Composition</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="mt-8 flex justify-center text-1xl underline font-bold mb-2">Gardien de but</div>
    @foreach ($effectifs as $effectif)
        @if ($effectif->poste == 'Gardien de but')
            <div class="flex-1 flex justify-between inline-block items-center">
                <div>
                    @if ($effectif->club == $adom)
                        <span class="ml-14">{{ $effectif->numero }}</span>
                        <span class="font-bold">{{ $effectif->prenom }}</span>
                        <span class="font-bold">{{ $effectif->nom }}</span>
                    @endif
                </div>

                <div class="mr-2">
                    @if ($effectif->club == $aext)
                        <span>{{ $effectif->numero }}</span>
                        <span class="font-bold">{{ $effectif->prenom }}</span>
                        <span class="mr-14 font-bold">{{ $effectif->nom }}</span>
                    @endif
                </div>
            </div>
        @endif
    @endforeach

    <div class="mt-8 flex justify-center text-1xl underline font-bold mb-2">Défenseur</div>
    <div class="block">
        <div class="flex justify-between">
            <div class="grid grid-flow-row auto-rows-max">
                @foreach ($effectifs as $effectif)
                    @if ($effectif->poste == 'Défenseur')
                            @if ($effectif->club == $adom)
                                <div class="ml-14 inline-flex space-x-2 items-center">
                                    <span>{{ $effectif->numero }}</span>
                                    <span class="font-bold">{{ $effectif->prenom }}</span>
                                    <span class="font-bold">{{ $effectif->nom }}</span>
                                </div>
                            @endif
                    @endif
                @endforeach
            </div>

            <div class="grid grid-flow-row auto-rows-max">
                @foreach ($effectifs as $effectif)
                    @if ($effectif->poste == 'Défenseur')
                        @if ($effectif->club == $aext)
                                <div class="flex justify-end mr-14 inline-flex space-x-2 items-center">
                                    <span>{{ $effectif->numero }}</span>
                                    <span class="font-bold">{{ $effectif->prenom }}</span>
                                    <span class="font-bold">{{ $effectif->nom }}</span>
                                </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="mt-8 flex justify-center text-1xl underline font-bold mb-2">Milieu de terrain</div>
    @foreach ($effectifs as $effectif)
        @if ($effectif->poste == 'Milieu de terrain')
            <div class="flex-1 flex justify-between inline-block items-center">
                <div>
                    @if ($effectif->club == $adom)
                        <span class="ml-14">{{ $effectif->numero }}</span>
                        <span class="font-bold">{{ $effectif->prenom }}</span>
                        <span class="font-bold">{{ $effectif->nom }}</span>
                    @endif
                </div>

                <div class="mr-2">
                    @if ($effectif->club == $aext)
                        <span>{{ $effectif->numero }}</span>
                        <span class="font-bold">{{ $effectif->prenom }}</span>
                        <span class="mr-14 font-bold">{{ $effectif->nom }}</span>
                    @endif
                </div>
            </div>
        @endif
    @endforeach

    <div class="mt-8 flex justify-center text-1xl underline font-bold mb-2">Attaquant</div>
    @foreach ($effectifs as $effectif)
        @if ($effectif->poste == 'Attaquant')
            <div class="flex-1 flex justify-between inline-block items-center">
                <div>
                    @if ($effectif->club == $adom)
                        <span class="ml-14">{{ $effectif->numero }}</span>
                        <span class="font-bold">{{ $effectif->prenom }}</span>
                        <span class="font-bold">{{ $effectif->nom }}</span>
                    @endif
                </div>

                <div class="mr-2">
                    @if ($effectif->club == $aext)
                        <span>{{ $effectif->numero }}</span>
                        <span class="font-bold">{{ $effectif->prenom }}</span>
                        <span class="mr-14 font-bold">{{ $effectif->nom }}</span>
                    @endif
                </div>
            </div>
        @endif
    @endforeach


    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
