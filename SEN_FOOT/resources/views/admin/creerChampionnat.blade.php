<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      Accueil ADMINISTRATEUR
    </title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
      .gradient {
        background: linear-gradient(90deg, green 0%, rgb(0, 153, 255) 100%);
      }
    </style>
  </head>
  <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarAdmin')

    <center>
        <!-- Container -->
		<div class="container"> <!-- mx-auto mofi nékone -->
			<div class="flex h-screen bg-gray-200 items-center justify-center mt-20 mb-32">
				<!-- Row -->
				<div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
                        <h3 class="pt-4 text-4xl text-center font-semibold text-gray-400 mt-8 mb-2">Creer un championnat</h3>
                            <form class="px-8 pt-6 pb-8 bg-white rounded" action="{{ route('sauvegarderChampionnat') }}" method="POST">
                                @csrf

                                @if (Session::get('success'))
                                    <div class="flex justify-center alert alert-success text-green-500 font-bold mb-1">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                @if (Session::get('fail'))
                                    <div class="flex justify-center alert alert-danger mb-1">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif

                                <div class="mb-4 md:flex md:justify-between">
                                    <div class="md:ml-2">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Nom championnat
                                        </label>
                                        <input
                                            class="w-full px-8 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            name="nomchampionnat"
                                            type="text"
                                        />
                                            <span class="text-danger text-red-500">@error('nomchampionnat'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="mb-4 md:mr-2 md:mb-0">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Nombre d'équipe
                                        </label>
                                        <input
                                            class="w-full px-8 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            name="nombrequipe"
                                            type="int"
                                        />
                                        <span class="text-danger text-red-500">@error('nom'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="mt-6 md:flex md:justify-between">
                                    <div class="md:ml-2">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Slogan
                                        </label>
                                        <input
                                            class="w-full px-8 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            name="slogan"
                                            type="text"
                                        />
                                        <span class="text-danger text-red-500">@error('nom'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="mb-4 md:mr-2 md:mb-0">
                                        <label class="block mb-2 text-sm font-bold text-gray-700">
                                            Pays
                                        </label>
                                        <input
                                            class="w-full px-8 py-2 text-center text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            name="pays"
                                            type="text"
                                        />
                                        <span class="text-danger text-red-500">@error('datenaissance'){{ $message }}@enderror</span>
                                    </div>
                                </div>

                                <div class="mt-8 text-center">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="submit">
                                        Enregistrer
                                    </button>
                                </div>
                            </form>
                            <form action="{{ route('pageAccueilAdmin') }}" method="get">
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
