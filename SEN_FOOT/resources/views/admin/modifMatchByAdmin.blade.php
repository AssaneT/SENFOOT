<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <title>Modifier un match</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarChampionnat')

    <center>
    <!-- Container -->
		<div class="container"> <!-- mx-auto mofi nékone -->
			<div class="flex h-screen bg-gray-500 items-center justify-center mt-10 mb-32">
				<!-- Row -->
				<div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
                    <h3 class="pt-4 text-4xl text-center font-semibold text-purple-500 mt-8 mb-4">Modifier un match</h3>
                        <form class="px-8 pt-6 pb-8 bg-white rounded" action="{{ route('majMatch',$matches->id) }}" method="POST">
                            @csrf

                            @if (Session::get('success'))
                                <div class="flex justify-center alert alert-success text-green-500 font-bold mb-3">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if (Session::get('fail'))
                                <div class="flex justify-center alert alert-danger mb-3">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif

                            <div class="mb-4 md:flex md:justify-between">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Equipe domicile
                                    </label>
                                    <select name="equipedom" class="w-full px-10 py-2 leading-tight text-gray-700 border rounded">
                                        <option><?php echo "$matches->equipedom" ?></option>
                                        @if ($competitions->count() > 0)
                                            @foreach ($competitions as $competition)
                                                @if ($competition->nomcompet == $championnats->nomchampionnat)
                                                    <option><?php echo "$competition->equipe"; ?></option>
                                                @endif
                                            @endforeach
                                        @else
                                            <span class="mt-8">Aucune equipe en base de donnée</span>
                                        @endif
                                    </select>
                                    <span class="text-danger text-red-500">@error('equipedom'){{ $message }}@enderror</span>
                                </div>
                                <div class="md:ml-2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Equipe adverse
                                    </label>
                                    <select name="equipeadv" class="text-center w-full px-10 py-2 leading-tight text-gray-700 border rounded">
                                        <option><?php echo "$matches->equipeadv" ?></option>
                                        @if ($competitions->count() > 0)
                                            @foreach ($competitions as $competition)
                                                @if ($competition->nomcompet == $championnats->nomchampionnat)
                                                    <option><?php echo "$competition->equipe"; ?></option>
                                                @endif
                                            @endforeach
                                        @else
                                            <span class="mt-8">Aucune equipe en base de donnée</span>
                                        @endif
                                    </select>
                                    <span class="text-danger text-red-500">@error('equipeadv'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="mt-6 md:flex md:justify-between">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Date
                                    </label>
                                    <input
                                        class="w-full px-9 py-2 text-center leading-tight text-gray-700 border rounded"
                                        name="datematch"
                                        type="date"
                                        value="<?php echo "$matches->datematch"; ?>"
                                    />
                                    <span class="text-danger text-red-500">@error('datematch'){{ $message }}@enderror</span>
                                </div>
                                <div class="md:ml-2 mr-10">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Heure
                                    </label>
                                    <input
                                        class="w-full px-10 py-2 text-center leading-tight text-gray-700 border rounded"
                                        name="heurematch"
                                        type="time"
                                        value="<?php echo "$matches->heurematch"; ?>"
                                    />
                                    <span class="text-danger text-red-500">@error('heurematch'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="mt-6 md:flex md:justify-center">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Stade
                                    </label>
                                    <select name="stade" class="w-full text-center px-10 py-2 leading-tight text-gray-700 border rounded">
                                        <option><?php echo "$matches->stade" ?></option>
                                        @if ($competitions->count() > 0)
                                            @foreach ($competitions as $competition)
                                                @foreach ($equipes as $equipe)
                                                    @if ($competition->equipe == $equipe->nomequipe)
                                                        <option><?php echo "$equipe->terraindom"; ?></option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="text-danger text-red-500">@error('stade'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="mt-8 text-center">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </form>

                        <form action="{{ route('pageCalendCompet',$championnats->id) }}" method="get">
                            <button class="mb-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit">
                                Annuler
                            </button>
                        </form>
                    </div>
                </div>
            </div>
    </center>
</body>
</html>
