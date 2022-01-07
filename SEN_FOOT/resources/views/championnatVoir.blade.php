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
    $ya_match = 0;

    $begin = new DateTime("2021-07-03");
    $end   = new DateTime("2022-01-01");
    $date;
    $date_match;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">   <!-- renvoie les fichiers css qui se trouve dans public -->
    <title>{{ $championnats->nomchampionnat }}</title>
</head>
<body>
    {{-- @include('partiels.navBarChampionnatPublic')   --}}

    <div class="box-border h-60 w-full relative bg-gray-800">
        <div class="flex justify-start">
            <div class="mt-1 ml-6"><a class="font-semibold text-white text-6xl leading-tight" href="{{ route('Accueil') }}">Sen FOOT</a></div>
        </div>
        <div class="w-full text-5xl font-bold leading-tight text-center text-white">
            {{ $championnats->nomchampionnat }}
        </div>
        <nav class="absolute inset-x-0 bottom-0">
            <div class="container mx-auto flex flex-wrap items-center justify-between py-2">
                <div class="flex-grow lg:flex lg:items-center lg:w-auto hidden lg:mt-0 bg-white lg:bg-transparent text-center p-4 lg:p-0">
                    <ul class="list-reset lg:flex justify-center text-white text-2xl flex-1 items-center">
                      <li class="mr-5">
                        <a class="inline-block bg-gray-700 text-white hover:underline px-4" href="{{ route('voirChampionnat',$championnats->id ) }}">Calendrier</a>
                      </li>
                      <li class="mr-5">
                        <a class="inline-block hover:text-gray-300 hover:underline px-4" href="{{ route('voirChampionnatClassement',$championnats->id) }}">Classement</a>
                      </li>
                      <li class="mr-5">
                        <a class="inline-block hover:text-gray-300 hover:underline px-4" href="{{ route('voirChampionnatEquipe',$championnats->id) }}">Equipe</a>
                      </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="main-content flex-1 bg-gray-100 pb-24 md:pb-5">

        <div class="bg-gray-800">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h3 class="font-bold font-serif tracking-widest pl-2">Calendrier</h3>
            </div>
        </div>

        <div>
            @if ($matches->count() > 0)
                @for ($i = $begin; $i <= $end; $i->modify('+1 day'))
                    @foreach ($matches as $matche)
                        @php
                            $date = new DateTime($matche->datematch);

                            $date_time_now = date('Y-m-d H:i:s', time());
                            $date_prevu = $matche->datematch." ".$matche->heurematch;
                            $date_fin = date('Y-m-d H:i:s',strtotime("+2 hours", strtotime($date_prevu)));
                        @endphp
                        @if (($i == $date) && ($matche->championnat_id == $championnats->id))
                            <div class="w-1/3 ml-24 rounded-lg text-2xl bg-blue-900 text-white py-2 mt-6"><span class="ml-6">@php echo strftime("%a $format_jour %b %Y", strtotime($matche->datematch)); @endphp</span></div>
                            @foreach ($matches as $match)
                                @php
                                    $date_match = new DateTime($match->datematch);
                                    $ya_match = 1;
                                @endphp
                                @if ($date_match == $date)
                                    <div class="flex justify-center">
                                        <div class="w-2/3 ml-6 border border-gray-300 py-3 flex items-center justify-center hover:bg-blue-100">
                                            <span class="mr-1 text-1xl font-bold uppercase text-gray-600">{{ $match->equipedom }}</span>
                                            @foreach ($equipes as $equipe)
                                                @if ($equipe->nomequipe == $match->equipedom)
                                                    <img class="object-scale-down w-10 h-8" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                                @endif
                                            @endforeach
                                            @if ($date_time_now <= $date_fin)
                                                <span class="box-border h-15 w-30 py-1 px-4 border text-black mr-4 ml-4">@php echo date("H:i", strtotime($match->heurematch)); @endphp</span>
                                            @else
                                                @foreach ($statistiques as $statistique)
                                                    @if ($statistique->matche_id == $match->id)
                                                        @php
                                                            $ok = 1;
                                                        @endphp
                                                        <div class="block text-4xl text-center text-black ml-5">
                                                            {{ $statistique->but_equipe_dom }}
                                                        </div>

                                                        <div class="box-border h-15 w-30 p-1 border border-gray-300 mr-10 ml-10">Terminé</div>

                                                        <div class="block text-4xl text-center text-black mr-5">
                                                            {{ $statistique->but_equipe_adv }}
                                                        </div>
                                                        @break
                                                    @endif
                                                @endforeach
                                                @if ($ok == 0)
                                                    <div class="box-border h-15 w-30 p-1 border border-gray-300 mr-10 ml-10">Terminé</div>
                                                @endif
                                            @endif
                                            @foreach ($equipes as $equipe)
                                                @if ($equipe->nomequipe == $match->equipeadv)
                                                    <img class="object-scale-down w-10 h-8" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                                @endif
                                            @endforeach
                                            <span class="ml-1 text-1xl font-bold uppercase text-gray-600">{{ $match->equipeadv }}</span>
                                            <div class="ml-24 flex justify-end">
                                                <button>
                                                    <a href="{{ route('infoMatch',$matche->id) }}" class="ml-24 flex justify-end">
                                                        <span class="underline">En savoir plus</span>
                                                    </a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @break
                        @endif
                    @endforeach
                @endfor
            @endif
        </div>
    </div>
    @if ($ya_match == 0)
        <div class="text-center text-blue-800 text-2xl mt-5">
            Aucun matche n'a été planifié dans ce championnat
        </div>
    @endif

    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
