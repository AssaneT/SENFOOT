<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <title>modifier une compétition</title>
</head>
<body class="leading-normal tracking-normal" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarChampionnat')

    <!--    Par     défaut   c'est      la      page    des     equipe de ce ligue-->
    <center>
        {{--<form class="mt-8" method="post" action="{{ route('sauvegarderEquipeCompet',$championnats->nomchampionnat) }}">
            @csrf

            <label class="block text-semi-bold text-3xl font-serif tracking-widest text-gray-700">
                Club
            </label>

            <div class="inline-flex">
                <select name="equipe" class="py-2 px-3 rounded-lg border-2 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
                    <option value="">--Choisissez une equipe--</option>
                    @if ($equipes->count() > 0)
                        @foreach ($equipes as $equipe)
                            <option><?php //echo "$equipe->nomequipe"; ?></option>
                        @endforeach
                    @else
                        <span class="mt-8">Aucune equipe en base de donnée</span>
                    @endif
                </select>
            </div>

            <button class="bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-1 px-4 border border-gray-500 hover:border-transparent rounded" type="submit" name="submit">Ajouter</button>
        </form>

        <span class="text-danger text-red-500 mt-1">@error('club'){{ $message }}@enderror</span>    --}}

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

        <table class="table-auto shadow-lg bg-white mt-12">
            <thead>
                <tr>
                    <th class="bg-blue-200 border text-1xl text-center px-16 py-4">LOGO</th>
                    <th class="bg-blue-200 border text-1xl text-center px-16 py-4">EQUIPE</th>
                    <th class="bg-blue-200 border text-1xl text-center px-16 py-4">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($competitions as $competition)
                    @if ($competition->nomcompet == $championnats->nomchampionnat)
                        <tr>
                            <td class="border px-16 py-3">
                                @foreach ($equipes as $equipe)
                                    @if ($equipe->nomequipe == $competition->equipe)
                                        <img class="object-scale-down w-20 h-10" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                    @endif
                                @endforeach
                            </td>
                            <td class="border px-16 py-3 text-3xl uppercase">{{ $competition->equipe }}</td>
                            <td class="border px-16 py-3">
                                <div class="flex item-center">
                                    <div class="hover:text-red-500 hover:scale-110">
                                        <a href="{{ route('deleteEquipeCompet',$competition->id) }}">
                                            <svg height="25pt" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </center>

    <!-- pour les boutons
        <div class="flex item-center justify-center">
            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </div>
            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </div>
            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                <svg height="25pt" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </div>
        </div>
    -->
    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>

