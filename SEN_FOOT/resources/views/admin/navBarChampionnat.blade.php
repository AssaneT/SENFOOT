<div class="box-border h-60 w-full bg-gray-800">
    <div class="flex justify-between">
        <div class="mt-1 ml-6"><a class="font-semibold text-white text-6xl leading-tight" href="{{ route('pageAccueilAdmin') }}">SENFOOT</a></div>
        <div class="mt-4 mr-5">
            <div class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-blue-300 hover:text-white hover:bg-blue-300">
                <button>
                    {{ $LoggedUserInfo['prenom'] }}
                    {{ $LoggedUserInfo['nom'] }}
                </button>
            </div>
            <a href="{{ route('deconnexion') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-blue-300 hover:text-white hover:bg-blue-300">Logout</a>
        </div>
    </div>
    <h1 class="w-full text-5xl font-bold leading-tight text-center text-white">
        {{ $championnats->nomchampionnat }}
    </h1>
    <nav class="mt-12 w-full">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between py-2">
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:mt-0 bg-white lg:bg-transparent text-center p-4 lg:p-0">
                <ul class="list-reset lg:flex justify-center text-white text-2xl flex-1 items-center">
                  <li class="mr-5">
                    <a class="inline-block no-underline hover:text-gray-300 hover:text-underline py-2 px-4" href="{{ route('pageCalendCompet',$championnats->id) }}">Calendrier</a>
                  </li>
                  <li class="mr-5">
                    <a class="inline-block no-underline hover:text-gray-300 hover:text-underline py-2 px-4" href="{{ route('pageClassement',$championnats->id) }}">Classement</a>
                  </li>
                  <li class="mr-5">
                    <a class="inline-block no-underline hover:text-gray-300 hover:text-underline py-2 px-4" href="{{ route('pageModifCompet',$championnats->id) }}">Equipe</a>
                  </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
