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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">   <!-- renvoie les fichiers css qui se trouve dans public -->
    <title>Match</title>
</head>
<body>
    @include('partiels.navBar')
    <div class="flex justify-center mt-8">
        <span class="text-4xl font-bold font-serif tracking-widest text-gray-800">MATCH A VENIR</span>
    </div>

    @if ($matches->count() > 0)
        @for ($i = $begin; $i <= $end; $i->modify('+1 day'))
            @foreach ($matches as $matche)
                @php
                    $date = new DateTime($matche->datematch);

                    $date_time_now = date('Y-m-d H:i:s', time());
                    $date_prevu = $matche->datematch." ".$matche->heurematch;
                    $date_fin = date('Y-m-d H:i:s',strtotime("+2 hours", strtotime($date_prevu)));
                @endphp
                @if (($i == $date) && ($date_time_now <= $date_fin))
                    @php
                        $ya_match = 1;
                    @endphp
                    <div class="w-1/3 ml-24 text-2xl rounded-lg bg-gray-500 text-white py-2 mt-6"><span class="ml-6">@php echo strftime("%a $format_jour %b %Y", strtotime($matche->datematch)); @endphp</span></div>
                    @foreach ($matches as $match)
                        @php
                            $date_match = new DateTime($match->datematch);
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
                                        <span class="box-border h-15 w-30 px-4 py-1 border text-black mr-4 ml-4">@php echo date("H:i", strtotime($match->heurematch)); @endphp</span>
                                    @else
                                        @foreach ($statistiques as $statistique)
                                            @if ($statistique->matche_id == $match->id)
                                                @php
                                                    $ok = 1;
                                                @endphp
                                                <div class="block text-4xl text-center text-black ml-5">
                                                    {{ $statistique->but_equipe_dom }}
                                                </div>

                                                <div class="box-border h-15 w-30 px-4 py-1 border border-gray-300 text-white mr-5 ml-5">Terminé</div>

                                                <div class="block text-4xl text-center text-black mr-5">
                                                    {{ $statistique->but_equipe_adv }}
                                                </div>
                                                @break
                                            @endif
                                        @endforeach
                                        @if ($ok == 0)
                                            <div class="box-border h-15 w-30 p-1 border border-gray-300 text-white mr-10 ml-10">Terminé</div>
                                        @endif
                                    @endif
                                    @foreach ($equipes as $equipe)
                                        @if ($equipe->nomequipe == $match->equipeadv)
                                            <img class="object-scale-down w-10 h-8" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                        @endif
                                    @endforeach
                                    <span class="ml-1 text-1xl font-bold uppercase text-gray-600">{{ $match->equipeadv }}</span>
                                    <a href="{{ route('infoMatch',$match->id) }}" class="ml-24 flex justify-end">
                                        {{--<div class="w-2 transform hover:text-blue-500 hover:scale-110">
                                            <svg class="stroke-current text-blue-700" height="20pt" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>  --}}
                                        <span class="underline">En savoir plus</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                        @php
                            $ok = 0;
                        @endphp
                    @endforeach
                    @break
                @endif
            @endforeach
        @endfor
    @endif

    @if ($ya_match == 0)
        <div class="flex justify-center mt-8">
            <span>Pas de match à venir</span>
        </div>
    @endif
</body>
</html>
