@php
    $ok = 0;

    $begin = new DateTime("2021-07-03");
    $end   = new DateTime("2022-01-01");
    $date;
    $date_match;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <title>Calendrier</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarChampionnat')

    <div class="mt-8 text-2xl font-serif tracking-widest text-center">CALENDRIER</div>

    <div class="flex justify-center mt-8">
        <form method="get" action="{{ route('pageAjoutMatch',$championnats->id) }}">
            @csrf
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-12 rounded-full" type="submit" name="submit">Ajouter un match</button>
        </form>
    </div>

    @if (Session::get('success'))
        <div class="flex justify-center alert alert-success text-green-500 font-bold mt-3">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::get('fail'))
        <div class="flex justify-center alert alert-danger mt-3">
            {{ Session::get('fail') }}
        </div>
    @endif

    @php
        $ok = 0;
    @endphp
    @if ($matches->count() > 0)
        @for ($i = $begin; $i <= $end; $i->modify('+1 day'))
            @foreach ($matches as $matche)
                @php
                    $date = new DateTime($matche->datematch);

                    $date_time_now = date('Y-m-d H:i:s', time());
                    $date_prevu = $matche->datematch." ".$matche->heurematch;
                    $date_fin = date('Y-m-d H:i:s',strtotime("+2 hours", strtotime($date_prevu)));
                @endphp
                @if ($i == $date)
                    @if ($matche->championnat_id == $championnats->id)
                        @php
                            $ok = 1;   //pour confirmer qu'il y'a match
                            $formatdate = $matche->datematch;
                        @endphp
                        <p class="w-1/3 text-5xl rounded-lg bg-gradient-to-r from-gray-500 to-gray-800 text-white mt-10">@php echo date("d-m-Y", strtotime($formatdate)); @endphp</p>
                        @foreach ($matches as $match)
                            @if (($matche->datematch == $match->datematch) && ($matche->championnat_id == $match->championnat_id))
                                <div class="border border-gray-300 py-3 flex items-center justify-center hover:bg-blue-200">
                                    <span class="text-3xl text-gray-600 uppercase mr-2">{{ $match->equipedom }}</span>
                                    @foreach ($equipes as $equipe)
                                        @if ($equipe->nomequipe == $match->equipedom)
                                            <img class="object-scale-down w-10 h-10" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                        @endif
                                    @endforeach
                                    <span class="box-border h-15 w-30 p-1 border border-gray-300 text-black mr-4 ml-4">{{ $match->heurematch }}</span>
                                    @foreach ($equipes as $equipe)
                                        @if ($equipe->nomequipe == $match->equipeadv)
                                            <img class="object-scale-down w-10 h-10" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                        @endif
                                    @endforeach
                                    <span class="text-3xl text-gray-600 uppercase ml-2 mr-24">{{ $match->equipeadv }}</span>
                                    <span class="ml-24 mr-2">
                                        <svg height="22pt" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg"><path d="m407.863281 80h.136719v-24h32c4.417969 0 8-3.582031 8-8v-32c0-4.417969-3.582031-8-8-8h-48v64.910156c-15.328125-5.859375-31.589844-8.878906-48-8.910156h-16v-16h32c4.417969 0 8-3.582031 8-8v-32c0-4.417969-3.582031-8-8-8h-48v64h-64v-16h32c4.417969 0 8-3.582031 8-8v-32c0-4.417969-3.582031-8-8-8h-48v64h-64v-16h32c4.417969 0 8-3.582031 8-8v-32c0-4.417969-3.582031-8-8-8h-48v64h-16c-16.410156.03125-32.671875 3.050781-48 8.910156v-16.910156h32c4.417969 0 8-3.582031 8-8v-32c0-4.417969-3.582031-8-8-8h-48v72h.136719c-44.355469 23.617188-72.089844 69.75-72.136719 120v112c.0820312 65.796875 47.238281 122.105469 112 133.734375v26.265625c0 4.417969 3.582031 8 8 8h240c4.417969 0 8-3.582031 8-8v-26.265625c64.761719-11.628906 111.917969-67.9375 112-133.734375v-112c-.046875-50.25-27.78125-96.382812-72.136719-120zm.136719-56h24v16h-24zm-80-8h24v16h-24zm-80 0h24v16h-24zm-80 0h24v16h-24zm-80 8h24v16h-24zm-24 383.878906c-21.507812-16.183594-36.96875-39.105468-43.910156-65.109375 11.011718 17.996094 26.042968 33.203125 43.910156 44.429688zm0-40.101562c-21.421875-16.113282-36.839844-38.921875-43.808594-64.800782 11.011719 17.910157 26 33.042969 43.808594 44.222657zm0-40c-16.726562-12.554688-29.898438-29.242188-38.222656-48.425782 10.3125 14.300782 23.292968 26.472657 38.222656 35.847657zm48 101.742187c-11.15625-2.246093-21.933594-6.078125-32-11.382812v-22.34375c10.210938 4.640625 20.960938 7.988281 32 9.960937zm0-39.917969c-11.164062-2.292968-21.941406-6.179687-32-11.539062v-22.269531c10.210938 4.640625 20.960938 7.988281 32 9.960937zm-32-51.539062v-14.269531c17.578125 8.027343 36.675781 12.191406 56 12.207031h96v16h-96c-19.527344.007812-38.757812-4.785156-56-13.953125zm104 125.9375h-16v-16c0-4.417969 3.582031-8 8-8s8 3.582031 8 8zm64 0h-16v-16c0-4.417969 3.582031-8 8-8s8 3.582031 8 8zm64 0h-16v-16c0-4.417969 3.582031-8 8-8s8 3.582031 8 8zm40 0h-24v-16c0-13.253906-10.746094-24-24-24s-24 10.746094-24 24v16h-16v-16c0-13.253906-10.746094-24-24-24s-24 10.746094-24 24v16h-16v-16c0-13.253906-10.746094-24-24-24s-24 10.746094-24 24v16h-24v-56h224zm0-72.40625c-2.65625.175781-5.296875.40625-8 .40625h-208c-2.703125 0-5.34375-.230469-8-.40625v-23.59375h224zm48 26.542969c-10.066406 5.304687-20.84375 9.136719-32 11.382812v-23.765625c11.039062-1.972656 21.789062-5.320312 32-9.960937zm0-40.089844c-10.058594 5.367187-20.835938 9.253906-32 11.554687v-23.847656c11.039062-1.972656 21.789062-5.320312 32-9.960937zm0-40c-17.242188 9.167969-36.472656 13.960937-56 13.953125h-96v-16h96c19.324219-.015625 38.421875-4.179688 56-12.207031zm16 69.832031v-20.679687c17.863281-11.214844 32.894531-26.410157 43.910156-44.398438-6.949218 25.992188-22.410156 48.90625-43.910156 65.078125zm43.808594-104.933594c-6.960938 25.890626-22.382813 48.710938-43.808594 64.832032v-20.578125c17.8125-11.1875 32.800781-26.332031 43.808594-44.253907zm-43.808594 24.832032v-12.578125c14.929688-9.367188 27.90625-21.527344 38.222656-35.816407-8.328125 19.171876-21.503906 35.847657-38.222656 48.394532zm-72-7.777344h-208c-66.273438 0-120-53.726562-120-120s53.726562-120 120-120h208c66.273438 0 120 53.726562 120 120s-53.726562 120-120 120zm0 0"/><path d="m344 96h-208c-55.410156.382812-100.789062 44.140625-103.183594 99.5-2.398437 55.359375 39.03125 102.875 94.199219 108.042969 2.984375.304687 5.984375.457031 8.984375.457031h208c3 0 6-.152344 8.984375-.457031 55.167969-5.167969 96.597656-52.683594 94.199219-108.042969-2.394532-55.359375-47.773438-99.117188-103.183594-99.5zm32 22.113281c5.601562 2.183594 10.960938 4.941407 16 8.222657v16c-5.039062-3.28125-10.398438-6.039063-16-8.222657zm0 33.488281c5.800781 2.890626 11.183594 6.550782 16 10.886719v16c-4.816406-4.335937-10.199219-7.996093-16-10.886719zm-32-39.601562c5.367188.019531 10.722656.53125 16 1.527344v16c-5.277344-.996094-10.632812-1.507813-16-1.527344zm0 32c5.386719.015625 10.753906.640625 16 1.855469v16c-5.246094-1.214844-10.613281-1.839844-16-1.855469zm-32-32h16v16h-16zm0 32h16v16h-16zm-32-32h16v16h-16zm0 32h16v16h-16zm-32-32h16v16h-16zm0 32h16v16h-16zm-32-32h16v16h-16zm0 32h16v16h-16zm-32-32h16v16h-16zm0 32h16v16h-16zm-32-32h16v16h-16zm0 32h16v16h-16zm-32-30.472656c5.277344-.996094 10.632812-1.507813 16-1.527344v16c-5.367188.019531-10.722656.53125-16 1.527344zm0 32.328125c5.246094-1.214844 10.613281-1.839844 16-1.855469v16c-5.386719.015625-10.753906.640625-16 1.855469zm-32-19.519531c5.039062-3.28125 10.398438-6.039063 16-8.222657v16c-5.601562 2.183594-10.960938 4.941407-16 8.222657zm0 36.152343c4.816406-4.335937 10.199219-7.996093 16-10.886719v16c-5.800781 2.890626-11.183594 6.550782-16 10.886719zm-16 36.710938c-4.003906 7.738281-6.558594 16.144531-7.527344 24.800781-1.625-14.046875.996094-28.257812 7.527344-40.800781zm0-43.375c-13.484375 14.257812-21.792969 32.632812-23.59375 52.175781-.238281-2.640625-.40625-5.296875-.40625-8 .007812-22.398438 8.59375-43.945312 24-60.207031zm160 130.703125c-9.585938-3.339844-16.007812-12.378906-16.007812-22.527344s6.421874-19.1875 16.007812-22.527344zm0-61.726563c-18.613281 3.828125-31.976562 20.199219-32 39.199219.03125 8.683594 2.914062 17.117188 8.207031 24h-56.207031v-80h80zm16 61.71875v-45.046875c9.585938 3.339844 16.007812 12.378906 16.007812 22.527344s-6.421874 19.1875-16.007812 22.527344zm80 1.480469h-56.207031c5.292969-6.882812 8.175781-15.316406 8.207031-24-.023438-19-13.386719-35.371094-32-39.199219v-16.800781h80zm21.71875-.289062c-1.894531.152343-3.789062.289062-5.71875.289062v-88c0-4.417969-3.582031-8-8-8h-192c-4.417969 0-8 3.582031-8 8v88c-1.929688 0-3.824219-.136719-5.71875-.289062-29.679688-3.019532-51.78125-28.78125-50.257812-58.574219 1.527343-29.792969 26.144531-53.164063 55.976562-53.136719h208c29.832031-.027344 54.449219 23.34375 55.976562 53.136719 1.523438 29.792969-20.578124 55.554687-50.257812 58.574219zm65.808594-63.710938c-.96875-8.65625-3.523438-17.0625-7.527344-24.800781v-16c6.53125 12.542969 9.152344 26.753906 7.527344 40.800781zm16.066406-16c-1.792969-19.554688-10.101562-37.941406-23.59375-52.207031v-16c15.40625 16.261719 23.992188 37.808593 24 60.207031 0 2.703125-.167969 5.359375-.40625 8zm0 0"/></svg>
                                    </span>
                                    <span class="text-1xl text-black mr-24">{{ $match->stade }}</span>
                                    <div class="inline-flex justify-end space-x-6 ml-24">
                                        <a href="{{ route('pageMatch',[$championnats->id,$match->id]) }}">
                                            <div class="w-2 transform hover:text-green-500 hover:scale-110">
                                                <svg class="stroke-current text-green-600" height="20pt" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                        </a>
                                        <a href="{{ route('PageModifMatch',[$championnats->id,$match->id]) }}">
                                            <div class="w-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg class="stroke-current text-purple-600" height="20pt" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        </a>
                                        <a href="{{ route('deleteMatch',$match->id) }}">
                                            <div class="w-2 transform hover:text-red-500 hover:scale-110">
                                                <svg class="stroke-current text-red-600" height="20pt" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @break
                    @endif
                @endif
            @endforeach
        @endfor
    @endif
    @if ($ok == 0)
        <div class="text-center text-gray-500 text-2xl mt-5">
            <h2>Pas de match disponible</h2>
        </div>
    @endif

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


