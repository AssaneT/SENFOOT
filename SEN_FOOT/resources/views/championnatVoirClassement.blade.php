@php
    $ekip = 0;
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
                            <a class="inline-block hover:text-gray-300 hover:underline px-4" href="{{ route('voirChampionnat',$championnats->id ) }}">Calendrier</a>
                        </li>
                        <li class="mr-5">
                            <a class="inline-block bg-gray-700 text-white hover:underline px-4" href="{{ route('voirChampionnatClassement',$championnats->id) }}">Classement</a>
                        </li>
                        <li class="mr-5">
                            <a class="inline-block hover:text-gray-300 hover:underline px-4" href="{{ route('voirChampionnatEquipe',$championnats->id) }}">Equipe</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="bg-gray-800">
        <div class="rounded-tl-3xl bg-gradient-to-r from-green-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold font-serif tracking-widest pl-2">Classement</h3>
        </div>
    </div>

    <div class="flex justify-center">
        <table class="table-auto shadow-lg bg-white mt-2">
            <thead>
                <tr>
                    <!--    <th class="bg-blue-100 border text-left px-10 py-4">LOGO</th>   -->
                    <th class="bg-green-100 border text-center px-6 py-2">POSITION</th>
                    <th class="bg-green-100 border text-center px-14 py-2">EQUIPE</th>
                    <th class="bg-green-100 border text-center px-6 py-2">POINTS</th>
                    <th class="bg-green-100 border text-center px-6 py-2">JOUÉS</th>
                    <th class="bg-green-100 border text-center px-6 py-2">GAGNÉS</th>
                    <th class="bg-green-100 border text-center px-6 py-2">NULS</th>
                    <th class="bg-green-100 border text-center px-6 py-2">PERDUS</th>
                    <th class="bg-green-100 border text-center px-6 py-2">BUTS POUR</th>
                    <th class="bg-green-100 border text-center px-6 py-2">BUTS CONTRE</th>
                    <th class="bg-green-100 border text-center px-6 py-2">DIFF.</th>
                    <th class="bg-green-100 border text-center px-6 py-2">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0 ; $i<=20 ; $i++)
                    @foreach ($classements as $classement)
                        @if ($classement->id_championnat == $championnats->id)
                            @if ($i == $classement->position)
                                <tr>
                                    {{--    <td class="border px-10 py-5"><img class="object-scale-down w-20 h-10" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}"></td>     --}}
                                    <td class="text-center py-2">{{ $classement->position }}</td>
                                    <td class="inline-flex text-center px-12 py-2">
                                        @foreach ($equipes as $equipe)
                                            @if ($equipe->nomequipe == $classement->equipe)
                                                @php
                                                    $ekip = $equipe->id;
                                                @endphp
                                                <img class="object-scale-down w-8 h-7 mr-1" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                            @endif
                                        @endforeach
                                        <span class="uppercase">{{ $classement->equipe }}</span>
                                    </td>
                                    <td class="text-center">{{ $classement->points }}</td>
                                    <td class="text-center">{{ $classement->jouer }}</td>
                                    <td class="text-center">{{ $classement->gagner }}</td>
                                    <td class="text-center">{{ $classement->nuls }}</td>
                                    <td class="text-center">{{ $classement->perdus }}</td>
                                    <td class="text-center">{{ $classement->butpour }}</td>
                                    <td class="text-center">{{ $classement->butcontre }}</td>
                                    <td class="text-center">{{ $classement->diff }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('pageVoirClub',$ekip) }}" class="flex justify-center mr-5">
                                            <div class="w-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg class="stroke-current text-blue-700" height="20pt" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                @endfor
            </tbody>
        </table>
    </div>
</body>
</html>
