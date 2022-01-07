<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">   <!-- renvoie les fichiers css qui se trouve dans public -->
    <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
    <title>Connexion</title>
</head>
<body class="bg-cover bg-no-repeat h-screen flex items-center justify-center" style="background-image: url({{ asset('images/cristiano.jpg') }})">


        <div class="absolute bg-black opacity-10 inset-0 z-0"></div>
        <div class="items-center z-10">
            <form class="p-14 bg-white max-w-sm mx-auto rounded-xl shadow-xl overflow-hidden p-6 space-y-10" action="{{ route('checkConnexion') }}" method="post">
                @if (Session::get('fail'))
                    <div class="alert alert-danger text-red-500">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="login">
                        Login
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="login" type="text" placeholder="votre identifiant" value="{{ old('login') }}">
                    <span class="text-danger text-red-500">@error('login'){{ $message }}@enderror</span>
                </div>
                <div class="mb-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="**************">
                    <span class="text-danger text-red-500">@error('password'){{ $message }}@enderror</span>
                </div>
                <div class="flex items-center border-b border-teal-500 py-2">
                    <button class="bg-blue-400 w-full mt-4 text-white py-1 px-2 rounded" type="submit">
                        Connexion
                    </button>
                    <br>
                </div>
                <a href="{{ route('Accueil') }}" class="text-blue-400">Pour les adminstrateur uniquement</a>
            </form>
            <p class="text-center text-gray-500 text-xs">
                &copy;2021 SEN FOOT. All rights reserved.
            </p>
        </div>



    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        .f-outline input:focus-within ~ label,
        .f-outline input:not(:placeholder-shown) ~ label {
            transform: translateY(-1.5rem) translatex(-1rem) scaleX(0.80) scaleY(0.80);
        }
    </style>
</body>
</html>


