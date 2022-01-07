<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">   <!-- renvoie les fichiers css qui se trouve dans public -->
    <title>Championnats</title>
</head>
<body>
    @include('partiels.navBar')

    <section class="border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            @if ($championnats->count() > 0)
                @foreach ($championnats as $championnat)
                    <div class="w-full md:w-1/3 px-6 flex flex-col flex-grow flex-shrink rounded">
                        <div class="flex-1 bg-blue-900 rounded-t rounded-b-none overflow-hidden shadow">
                            <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                                <div class="w-full font-bold text-center text-xl font-serif tracking-widest text-white mt-4 mb-4 px-6">
                                    {{ $championnat->nomchampionnat }}
                                </div>
                            </a>
                        </div>
                        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-5">
                            <div class="flex justify-center">
                                <span class="font-semibold uppercase">{{ $championnat->pays }}</span>
                            </div>
                            <div class="flex justify-center mt-1">
                                <span class="font-semibold">{{ $championnat->nombrequipe }} équipes</span>
                            </div>
                            <div class="flex justify-center">
                                <button class="mx-auto lg:mx-0 hover:underline bg-blue-900 text-white font-bold rounded-full my-6 py-3 px-5 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    <a href="{{ route('voirChampionnat',$championnat->id ) }}">
                                        Voir
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
