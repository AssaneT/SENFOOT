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
    <title>Classement</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarChampionnat')

    <!--     LORSQUE JE VEUX AJOUTER UNE EQUIPE AU CLASSEMENT       -->

    {{--    <form class="mt-8 flex justify-center" method="post" action="{{ route('ajoutEquipClassement',$championnats->id) }}">
        @csrf

        <label class="mt-2 text-2xl text-gray-700 mr-4">
            Ajoutez les équipes dans le classement
        </label>

        <div class="inline-flex">
            <select name="equipe" class="py-1 px-3 rounded-lg border-2 border-blue-300 mt-1">
                <option value="">--Choisissez une equipe--</option>
                @foreach ($competitions as $competition)
                    @if ($competition->nomcompet == $championnats->nomchampionnat)
                        <option class="uppercase"><?php //echo "$competition->equipe"; ?></option>
                    @endif
                @endforeach
            </select>
        </div>

        <button class="bg-transparent hover:bg-blue-400 text-gray-700 font-semibold hover:text-white px-4 border border-blue-500 hover:border-transparent rounded-lg ml-2 mt-1" type="submit" name="submit">Ajouter</button>
    </form> --}}

    <center>
        <span class="text-danger text-center text-red-500 mt-1">@error('equipe'){{ $message }}@enderror</span>
    </center>

    @if (Session::get('success'))
        <div class="mt-4 flex justify-center alert alert-success text-green-500 font-bold">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::get('fail'))
        <div class="mt-4 flex justify-center alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif

    <div class="mt-8 text-2xl font-serif tracking-widest text-center">CLASSEMENT</div>

    <center>
        <table class="table-auto shadow-lg bg-white mt-5">
            <thead>
                <tr>
                    <!--    <th class="bg-blue-100 border text-left px-10 py-4">LOGO</th>   -->
                    <th class="bg-blue-200 border text-center px-6 py-4">POSITION</th>
                    <th class="bg-blue-200 border text-center px-14 py-4">EQUIPE</th>
                    <th class="bg-blue-200 border text-center px-5 py-4">POINTS</th>
                    <th class="bg-blue-200 border text-center px-5 py-4">JOUÉS</th>
                    <th class="bg-blue-200 border text-center px-5 py-4">GAGNÉS</th>
                    <th class="bg-blue-200 border text-center px-5 py-4">NULS</th>
                    <th class="bg-blue-200 border text-center px-5 py-4">PERDUS</th>
                    <th class="bg-blue-200 border text-center px-5 py-4">BUTS POUR</th>
                    <th class="bg-blue-200 border text-center px-5 py-4">BUTS CONTRE</th>
                    <th class="bg-blue-200 border text-center px-5 py-4">DIFF.</th>
                    <th class="bg-blue-200 border text-center px-5 py-4">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i <= 20; $i++)
                    @foreach ($classements as $classement)
                        @if (($i == $classement->position) && ($classement->id_championnat == $championnats->id))
                            <tr>
                                {{--    <td class="border px-10 py-5"><img class="object-scale-down w-20 h-10" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}"></td>     --}}
                                <td class="text-center">{{ $classement->position }}</td>
                                <td class="inline-flex text-center px-12 py-1">
                                    @foreach ($equipes as $equipe)
                                        @if ($equipe->nomequipe == $classement->equipe)
                                            <img class="object-scale-down w-8 h-7 mr-1" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                        @endif
                                    @endforeach
                                    <span class="uppercase">{{ $classement->equipe }}</span>
                                </td>
                                <td class="text-center text-blue-900">{{ $classement->points }}</td>
                                <td class="text-center">{{ $classement->jouer }}</td>
                                <td class="text-center">{{ $classement->gagner }}</td>
                                <td class="text-center">{{ $classement->nuls }}</td>
                                <td class="text-center">{{ $classement->perdus }}</td>
                                <td class="text-center">{{ $classement->butpour }}</td>
                                <td class="text-center">{{ $classement->butcontre }}</td>
                                <td class="text-center">{{ $classement->diff }}</td>
                                <td class="inline-flex text-center space-x-8 ml-5">
                                    <a href="{{ route('pageModifClassement',[$championnats->id,$classement->id]) }}">
                                        <div class="w-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg class="stroke-current text-purple-600" height="18pt" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                    </a>
                                    <a href="{{ route('enleverEquipClassement',$classement->id) }}">
                                        <div class="w-2 transform hover:text-red-500 hover:scale-110">
                                            <svg class="stroke-current text-red-600" height="18pt" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endfor
            </tbody>
        </table>
    </center>

    <!--   D'abord la liste des compétitions   -->
    {{--    <section class="border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            @if ($championnats->count() > 0)
                @foreach ($championnats as $championnat)
                    <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                        <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                            <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                                <div class="w-full font-bold text-center text-xl text-gray-500 mt-4 mb-4 px-6">
                                    {{ $championnat->nomchampionnat }}
                                </div>
                            </a>
                        </div>
                        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                            <div class="flex justify-center">
                            <button class="mx-auto lg:mx-0 hover:underline bg-gradient-to-r from-green-400 to-blue-500 text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                <a href="#">
                                    Voir classement
                                </a>
                            </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>  --}}

    <!--  Ensuite une page spéciale pour la compétition choisit, dont je vais lui afficher le classement  -->

    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
