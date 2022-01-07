<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <title>Ajouter un match</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarChampionnat')

    <center>
    <!-- Container -->
		<div class="container"> <!-- mx-auto mofi nékone -->
			<div class="flex h-screen bg-gradient-to-r from-green-200 to-blue-200 items-center justify-center mt-10 mb-32">
				<!-- Row -->
				<div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
                    <h3 class="pt-4 text-4xl text-center font-semibold text-gray-600 mt-8 mb-4">Ajouter un match</h3>
                        <form class="px-8 pt-6 pb-8 bg-white rounded" action="{{ route('sauvegarderMatch',$championnats->id) }}" method="POST">
                            @csrf

                            @if (Session::get('success'))
                                <div class="flex justify-center alert alert-success text-green-500 font-bold">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if (Session::get('fail'))
                                <div class="flex justify-center alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif

                            <div class="mb-4 md:flex md:justify-between">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Equipe domicile
                                    </label>
                                    <select name="equipedom" class="w-full text-center px-10 py-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                        <option value="">--Choisissez une equipe--</option>
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
                                    <select name="equipeadv" class="text-center w-full px-10 py-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                        <option value="">--Choisissez une equipe--</option>
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
                                        class="w-full px-11 py-3 text-center leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        name="datematch"
                                        type="date"
                                        value="{{ old('datematch') }}"
                                    />
                                    <span class="text-danger text-red-500">@error('datematch'){{ $message }}@enderror</span>
                                </div>
                                <div class="md:ml-2 mr-10">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Heure
                                    </label>
                                    <input
                                        class="w-full px-10 py-3 text-center leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        name="heurematch"
                                        type="time"
                                        value="{{ old('heurematch') }}"
                                    />
                                    <span class="text-danger text-red-500">@error('heurematch'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="mt-6 md:flex md:justify-center">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Stade
                                    </label>
                                    <select name="stade" class="w-full text-center px-11 py-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                        <option value="">--Choisissez le terrain--</option>
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
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="submit">
                                    Enregistrer le match
                                </button>
                            </div>
                        </form>

                        <form action="{{ route('pageCalendCompet',$championnats->id) }}" method="get">
                            <button class="mb-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="submit">
                                Annuler
                            </button>
                        </form>
                    </div>
                </div>
            </div>
    </center>
</body>
</html>
