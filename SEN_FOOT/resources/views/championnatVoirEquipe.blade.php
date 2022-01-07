@php
    $ok = 0;
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
                            <a class="inline-block hover:text-gray-300 hover:underline px-4" href="{{ route('voirChampionnatClassement',$championnats->id) }}">Classement</a>
                        </li>
                        <li class="mr-5">
                            <a class="inline-block bg-gray-700 text-white hover:underline px-4" href="{{ route('voirChampionnatEquipe',$championnats->id) }}">Equipe</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="bg-gray-800">
        <div class="rounded-tl-3xl bg-gradient-to-r from-gray-500 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold font-serif tracking-widest pl-2">Equipe</h3>
        </div>
    </div>


    <center>
        @if ($equipes->count() > 0)
            @foreach ($competitions as $competition)
                @if ($competition->nomcompet == $championnats->nomchampionnat)
                    @php
                        $ok = 1;
                    @endphp
                    @foreach ($equipes as $equipe)
                        @if ($competition->equipe == $equipe->nomequipe)
                            <div class="inline-block box-border h-60 w-60 p-4 border-4 border-gray-500 mt-5 mx-10">
                                <img class="object-scale-down w-20 h-20" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                <div class="text-3xl uppercase text-black mt-3 mb-2 bg-gradient-to-r from-blue-300 to-black-500">
                                    {{ $equipe->nomequipe }}
                                </div>
                                <div class="mb-5">
                                    {{ $equipe->terraindom }}
                                </div>
                                <a href="{{ route('pageVoirClub',$equipe->id) }}" class="border rounded bg-blue-500 hover:bg-blue-700 p-2 text-white hover:shadow-lg text-xs font-thin">Voir</a>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
        @if ($ok == 0)
            <div class="text-center text-gray-500 text-2xl mt-5">
                Aucun équipe dans ce championnat
            </div>
        @endif
    </center>


</body>
</html>
