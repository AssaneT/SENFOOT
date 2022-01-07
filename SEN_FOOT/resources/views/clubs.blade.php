<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">   <!-- renvoie les fichiers css qui se trouve dans public -->
    <title>Equipe</title>
</head>
<body>
    @include('partiels.navBar')

    <div class="flex justify-center font-semibold font-serif tracking-widest text-gray-800 text-3xl mt-8 mb-4">
        Liste des equipes
    </div>

    <center>

        @php
            $ok = 0;
        @endphp

        @if ($equipes->count() > 0)
            @foreach ($championnats as $championnat)
                <div class="flex justify-center font-semibold text-gray-500 text-3xl mt-4 mb-4">{{ $championnat->nomchampionnat }}</div>
                @foreach ($competitions as $competition)
                    @if ($championnat->nomchampionnat == $competition->nomcompet)
                        @foreach ($equipes as $equipe)
                            @if ($equipe->nomequipe == $competition->equipe)
                                @php
                                    $ok = 1;
                                @endphp
                                <div class="inline-block box-border h-60 w-60 p-4 border-4 border-gray-400 mt-5 mx-10">
                                    <img class="object-scale-down w-30 h-20" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                    <div class="text-3xl uppercase text-black mt-3 mb-2 bg-gradient-to-r from-blue-300 to-black-500">
                                        {{ $equipe->nomequipe }}
                                    </div>
                                    <div class="mb-5">
                                        {{ $equipe->terraindom }}
                                    </div>
                                    <a href="{{ route('pageVoirClub',$equipe->id) }}" class="border rounded bg-purple-500 hover:bg-purple-700 p-2 text-white hover:shadow-lg text-xs font-thin">Voir</a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                <div class="flex justify-center text-gray-800 text-1xl">
                    @php
                        if($ok == 0){
                            echo 'Aucune équipe n\'est pour l\'instant dans ce championnat';
                        } else {
                            $ok = 0;
                        }
                    @endphp
                </div>
            @endforeach
        @endif
    </center>

    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
