<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <title>Modifier classement</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarChampionnat')

    <center>
        <h3 class="pt-4 text-4xl text-center font-semibold bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-blue-500 mt-4 mb-4">Modifier</h3>
    <!-- Container -->
		<div class="container"> <!-- mx-auto mofi nékone -->
			<div class="flex bg-gray-200 items-center justify-center mt-8 mb-32">
				<!-- Row -->
				<div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">

                        <div>
                            @foreach ($equipes as $equipe)
                                @if ($equipe->nomequipe == $classements->equipe)
                                    <img class="object-scale-down w-20 h-20 mr-2" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                @endif
                            @endforeach
                            <span class="text-2xl text-gray-600">{{ $classements->equipe }}</span>
                        </div>
                        <form class="px-8 pt-6 pb-8 bg-white rounded" action="{{ route('updatClassement',$classements->id) }}" method="POST">
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

                            <div class="mb-4 md:flex md:justify-evenly">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Position
                                    </label>
                                    <input
                                        class="w-full px-5 py-2 text-center leading-tight text-gray-700 border rounded"
                                        name="position"
                                        type="number"
                                        min="1" max="50"
                                        value="<?php echo "$classements->position"; ?>"
                                    />
                                    <span class="text-danger text-red-500">@error('position'){{ $message }}@enderror</span>
                                </div>
                                <div class="md:ml-2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Point
                                    </label>
                                    <input
                                        class="w-full px-5 py-2 text-center leading-tight text-gray-700 border rounded"
                                        name="points"
                                        type="number"
                                        min="0" max="150"
                                        value="<?php echo "$classements->points"; ?>"
                                    />
                                    <span class="text-danger text-red-500">@error('points'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="mt-6 md:flex md:justify-evenly">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Joués
                                    </label>
                                    <input
                                        class="w-full px-5 py-2 text-center leading-tight text-gray-700 border rounded"
                                        name="jouer"
                                        type="number"
                                        min="0" max="150"
                                        value="<?php echo "$classements->jouer"; ?>"
                                    />
                                    <span class="text-danger text-red-500">@error('jouer'){{ $message }}@enderror</span>
                                </div>
                                <div class="md:ml-2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Gagnés
                                    </label>
                                    <input
                                        class="w-full px-5 py-2 text-center leading-tight text-gray-700 border rounded"
                                        name="gagner"
                                        type="number"
                                        min="0" max="150"
                                        value="<?php echo "$classements->gagner"; ?>"
                                    />
                                    <span class="text-danger text-red-500">@error('gagner'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="mt-6 md:flex md:justify-evenly">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Nuls
                                    </label>
                                    <input
                                        class="w-full px-5 py-2 text-center leading-tight text-gray-700 border rounded"
                                        name="nuls"
                                        type="number"
                                        min="0" max="150"
                                        value="<?php echo "$classements->nuls"; ?>"
                                    />
                                    <span class="text-danger text-red-500">@error('nuls'){{ $message }}@enderror</span>
                                </div>
                                <div class="md:ml-2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Perdus
                                    </label>
                                    <input
                                        class="w-full px-5 py-2 text-center leading-tight text-gray-700 border rounded"
                                        name="perdus"
                                        type="number"
                                        min="0" max="150"
                                        value="<?php echo "$classements->perdus"; ?>"
                                    />
                                    <span class="text-danger text-red-500">@error('perdus'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="mt-6 md:flex md:justify-evenly">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Buts pour
                                    </label>
                                    <input
                                        class="w-full px-5 py-2 text-center leading-tight text-gray-700 border rounded"
                                        name="butpour"
                                        type="number"
                                        min="0" max="300"
                                        value="<?php echo "$classements->butpour"; ?>"
                                    />
                                    <span class="text-danger text-red-500">@error('butpour'){{ $message }}@enderror</span>
                                </div>
                                <div class="md:ml-2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Buts contre
                                    </label>
                                    <input
                                        class="w-full px-5 py-2 text-center leading-tight text-gray-700 border rounded"
                                        name="butcontre"
                                        type="number"
                                        min="0" max="300"
                                        value="<?php echo "$classements->butcontre"; ?>"
                                    />
                                    <span class="text-danger text-red-500">@error('butcontre'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="mt-6 md:flex md:justify-evenly">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">
                                        Différence
                                    </label>
                                    <input
                                        class="w-full py-2 text-center leading-tight text-gray-700 border rounded"
                                        name="diff"
                                        type="number"
                                        value="<?php echo "$classements->diff"; ?>"
                                    />
                                    <span class="text-danger text-red-500">@error('diff'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="mt-8 text-center">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </center>
</body>
</html>
