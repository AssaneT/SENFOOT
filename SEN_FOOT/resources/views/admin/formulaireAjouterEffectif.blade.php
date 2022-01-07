<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <title>Ajouter un joueur</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarAdmin')

    <!--	<div class="flex justify-center font-semibold text-4xl bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-black-500 mt-8 mb-6">
        Ajouter un joueur
    </div>	-->

    <!-- Container -->
		<div class="container"> <!-- mx-auto mofi nékone -->
			<div class="flex justify-center my-8">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex">
					<!-- Col -->
					<div
						class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
						style="background-image: url({{ asset('images/joueur_2_2.jpg') }})"
					></div>
					<!-- Col -->
					<div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
						<h3 class="pt-4 text-4xl text-center font-semibold text-blue-500 mt-8 mb-4">Ajouter un joueur</h3>
						<form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="{{ route('sauvegarderJoueur') }}" method="POST">
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
										Prenom
									</label>
									<input
										class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										name="prenom"
										type="text"
										placeholder="Prénom du joueur"
									/>
                                    <span class="text-danger text-red-500">@error('prenom'){{ $message }}@enderror</span>
								</div>
								<div class="md:ml-2">
									<label class="block mb-2 text-sm font-bold text-gray-700">
										Nom
									</label>
									<input
										class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										name="nom"
										type="text"
										placeholder="Nom du joueur"
									/>
                                    <span class="text-danger text-red-500">@error('nom'){{ $message }}@enderror</span>
								</div>
							</div>
							<div class="mt-6 md:flex md:justify-between">
								<div class="mb-4 md:mr-2 md:mb-0">
									<label class="block mb-2 text-sm font-bold text-gray-700">
										Date de naissance
									</label>
									<input
										class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										name="datenaissance"
										type="date"
									/>
                                    <span class="text-danger text-red-500">@error('datenaissance'){{ $message }}@enderror</span>
								</div>
								<div class="md:ml-2">
									<label class="block mb-2 text-sm font-bold text-gray-700">
										Lieu de naissance
									</label>
									<input
										class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										name="lieunaissance"
										type="text"
										placeholder="Mamelle"
									/>
                                    <span class="text-danger text-red-500">@error('lieunaissance'){{ $message }}@enderror</span>
								</div>
							</div>
                            <div class="mt-6 md:flex md:justify-between">
								<div class="mb-4 md:mr-2 md:mb-0">
									<label class="block mb-2 text-sm font-bold text-gray-700">
										Nationalite
									</label>
									<input
										class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										name="nationalite"
										type="text"
                                        placeholder="Senegalaise"
									/>
                                    <span class="text-danger text-red-500">@error('nationalite'){{ $message }}@enderror</span>
								</div>
								<div class="md:ml-2">
									<label class="block mb-2 text-sm font-bold text-gray-700">
										Club
									</label>
                                    <select name="club" class="w-full px-7 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                        <option value="">--Choisissez une equipe--</option>
                                        @if ($equipes->count() > 0)
                                            @foreach ($equipes as $equipe)
                                                <option><?php echo "$equipe->nomequipe"; ?></option>
                                            @endforeach
                                        @else
                                            <span class="mt-8">Aucune equipe en base de donnée</span>
                                        @endif
                                    </select>
                                    <span class="text-danger text-red-500">@error('club'){{ $message }}@enderror</span>
								</div>
							</div>
                            <div class="mt-6 md:flex md:justify-between">
								<div class="mb-4 md:mr-2 md:mb-0">
									<label class="block mb-2 text-sm font-bold text-gray-700">
										Poste
									</label>
                                    <select name="poste"
                                        class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                        <option value="">--Choisissez une poste--</option>
                                        <option>Gardien de but</option>
                                        <option>Défenseur</option>
                                        <option>Milieu de terrain</option>
                                        <option>Attaquant</option>
                                    </select>
                                    <span class="text-danger text-red-500">@error('poste'){{ $message }}@enderror</span>
								</div>
								<div class="md:ml-2">
									<label class="block mb-2 text-sm font-bold text-gray-700">
										Age
									</label>
									<input
										class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										name="age"
										type="number"
										placeholder="18 ans"
									/>
                                    <span class="text-danger text-red-500">@error('age'){{ $message }}@enderror</span>
								</div>
							</div>
                            <div class="mt-6 md:flex md:justify-between">
								<div class="mb-4 md:mr-2 md:mb-0">
									<label class="block mb-2 text-sm font-bold text-gray-700">
										Numéro
									</label>
									<input
										class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										name="numero"
										type="number"
                                        placeholder="7"
									/>
                                    <span class="text-danger text-red-500">@error('numero'){{ $message }}@enderror</span>
								</div>
								<div class="md:ml-2">
									<label class="block mb-2 text-sm font-bold text-gray-700">
										Taille
									</label>
									<input
										class="w-full px-8 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										name="taille"
										type="text"
										placeholder="1m80"
									/>
                                    <span class="text-danger text-red-500">@error('taille'){{ $message }}@enderror</span>
								</div>
							</div>

							<div class="mt-8 text-center">
								<button
									class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
									type="submit"
								>
									Enregistrer le joueur
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
