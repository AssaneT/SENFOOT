<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">   <!-- renvoie les fichiers css qui se trouve dans public -->
    <title>Creer un compte</title>
</head>
<body>
    <center>
        <div class="max-w-xs mt-5">
            <form class="bg-white shadow-md rounded px-3 pt-6 pb-8 mb-4" action="{{ route('saveForm') }}" method="post">
                @if (Session::get('success'))
                    <div class="alert alert-success text-green-800">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="prenom">
                        Prenom
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="prenom" type="text" placeholder="votre prenom" value="{{ old('prenom') }}">
                    <span class="text-danger text-red-500">@error('prenom'){{ $message }}@enderror</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                        Nom
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="nom" type="text" placeholder="votre nom" value="{{ old('nom') }}">
                    <span class="text-danger text-red-500">@error('nom'){{ $message }}@enderror</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="login">
                        Login
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="login" type="text" placeholder="votre identifiant" value="{{ old('login') }}">
                    <span class="text-danger text-red-500">@error('login'){{ $message }}@enderror</span>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border border-blue-500 rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="******************">
                    <span class="text-danger text-red-500">@error('password'){{ $message }}@enderror</span>
                </div>
                <div class="flex items-center border-b border-teal-500 py-2">
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded" type="submit">
                        S'inscrire
                    </button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <!-- Permet de creer autant d'espace que l'on veut -->
                    <button class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded ml-12" type="button">
                        Annuler
                    </button>
                </div>
            </form>
            <p class="text-center text-gray-500 text-xs">
                &copy;2021 SEN FOOT. All rights reserved.
            </p>

        </div>
    </center>
</body>
</html>

