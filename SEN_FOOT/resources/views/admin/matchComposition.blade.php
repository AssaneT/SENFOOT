@php
/*---------------------------------------------------------------*/
/*
    Titre : Affiche une date avec le nom du jour et du mois

    URL   : https://phpsources.net/code_s.php?id=469
    Auteur           : forty
    Website auteur   : http://www.toplien.fr/
    Date édition     : 20 Nov 2008
    Date mise à jour : 13 Aout 2019
    Rapport de la maj:
    - fonctionnement du code vérifié
*/
/*---------------------------------------------------------------*/
    if (setlocale(LC_TIME, 'fr_FR') == '') {
        setlocale(LC_TIME, 'FRA');  //correction problème pour windows
        $format_jour = '%#d';
    } else {
        $format_jour = '%e';
    }

    $ok = 0;
    $adom = '';
    $aext = '';

    foreach ($equipes as $equipe) {
        if ($equipe->nomequipe == $matches->equipedom) {
            $adom = $matches->equipedom;
            $idAdom = $equipe->id;
        } elseif ($equipe->nomequipe == $matches->equipeadv) {
            $aext = $matches->equipeadv;
            $idAext = $equipe->id;
        } else {
            continue;
        }
    }
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
    <title>Composition des équipes</title>
</head>
<body style="font-family: 'Source Sans Pro', sans-serif;">
    <!--NavBar-->
    @include('admin.navBarChampionnat')

    {{--    NavBar Match  --}}
    @include('admin.navBarMatch')

    <!-- This example requires Tailwind CSS v2.0+   -->
    <div class="mt-1 bg-white shadow-md">
        <div class="relative flex items-center h-12">
            <div class="flex-1 flex items-center justify-center">
                <div class="hidden sm:block sm:ml-6">
                    <ul class="justify-center items-center flex space-x-14">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white"     -->
                        <li>
                            <a href="{{ route('pageMatch',[$championnats->id,$matches->id]) }}" class="no-underline text-grey-dark border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3">Effectif</a>
                        </li>
                        <li>
                            <a href="{{ route('pageStatMatch',[$championnats->id,$matches->id]) }}" class="no-underline text-grey-dark border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3" aria-current="page">Statistique</a>
                        </li>
                        <li>
                            <a href="{{route('pageCompoMatch',[$championnats->id,$matches->id])}}" class="no-underline text-teal-dark border-b-2 border-teal-dark uppercase tracking-wide font-bold text-xs py-3">Composition</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @php
        $date_time_now = date('Y-m-d H:i:s', time());
        $date_prevu = $matches->datematch." ".$matches->heurematch;
        $date_fin = date('Y-m-d H:i:s',strtotime("+2 hours", strtotime($date_prevu)));
    @endphp

    @if (Session::get('success'))
        <div class="flex justify-center mt-4 alert alert-success text-green-500 font-bold">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::get('fail'))
        <div class="flex justify-center mt-4 alert alert-danger text-red-500 font-bold">
            {{ Session::get('fail') }}
        </div>
    @endif

    <div class="w-full mt-5 mb-10">
        <div class="mb-10 md:flex md:justify-evenly">
            <div class="block mb-4 md:mr-2 md:mb-0">
                <div class="flex items-center justify-center">
                    @foreach ($equipes as $equipe)
                        @if ($equipe->nomequipe == $matches->equipedom)
                            <img class="object-scale-down w-15 h-15" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                        @endif
                    @endforeach
                </div>
                <form action="{{route('sauvegarderFormation1',[$matches->id,$idAdom])}}" method="post">
                    @csrf

                    <div>
                        <span class="text-black uppercase">{{ $matches->equipedom }}</span>
                        <select class="font-semibold" name="compodom">
                            <option class="font-semibold">3-4-2-1</option>
                            <option class="font-semibold">3-4-3</option>
                            <option class="font-semibold">3-5-2</option>
                            <option class="font-semibold">4-5-1</option>
                            <option class="font-semibold">4-4-2</option>
                            <option class="font-semibold">4-4-1-1</option>
                            <option class="font-semibold">4-3-3</option>
                            <option class="font-semibold">4-3-2-1</option>
                            <option class="font-semibold">4-3-1-2</option>
                            <option class="font-semibold">4-2-3-1</option>
                            <option class="font-semibold">5-3-2</option>
                            <option class="font-semibold">5-4-1</option>
                        </select>
                    </div>

                    <div class="flex justify-center mt-2">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold px-2 rounded-full" type="submit">SAVE</button>
                    </div>
                </form>
            </div>
            <div class="md:ml-2">
                <span class="block mb-2 text-sm text-center font-bold text-gray-700">
                    COMPOSITION DES EQUIPES
                </span>
            </div>
            <div class="block md:ml-2">
                <div class="flex items-center justify-center">
                    @foreach ($equipes as $equipe)
                        @if ($equipe->nomequipe == $matches->equipeadv)
                            <img class="object-scale-down w-15 h-15" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                        @endif
                    @endforeach
                </div>
                <form action="{{route('sauvegarderFormation2',[$matches->id,$idAext])}}" method="post">
                    @csrf

                    <div>
                        <span class="text-black uppercase">{{ $matches->equipeadv }}</span>
                        <select class="font-semibold" name="compoadv">
                            <option class="font-semibold">3-4-2-1</option>
                            <option class="font-semibold">3-4-3</option>
                            <option class="font-semibold">3-5-2</option>
                            <option class="font-semibold">4-5-1</option>
                            <option class="font-semibold">4-4-2</option>
                            <option class="font-semibold">4-4-1-1</option>
                            <option class="font-semibold">4-3-3</option>
                            <option class="font-semibold">4-3-2-1</option>
                            <option class="font-semibold">4-3-1-2</option>
                            <option class="font-semibold">4-2-3-1</option>
                            <option class="font-semibold">5-3-2</option>
                            <option class="font-semibold">5-4-1</option>
                        </select>
                    </div>

                    <div class="flex justify-center mt-2">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold px-2 rounded-full" type="submit">SAVE</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-8 flex justify-center text-1xl text-blue-900 underline font-bold mb-2">Formation</div>
        <div class="block flex justify-around">
            @foreach ($formations as $formation)
                <div class="ml-14">
                    @if (($formation->match_id == $matches->id) && ($formation->equipe_id == $idAdom))
                        <span class="font-bold text-3xl text-blue-700">{{ $formation->formation }}</span>
                    @endif
                </div>

                <div class="mr-14">
                    @if (($formation->match_id == $matches->id) && ($formation->equipe_id == $idAext))
                        <span class="font-bold text-3xl text-blue-700">{{ $formation->formation }}</span>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="mt-8 flex justify-center text-1xl text-blue-900 underline font-bold mb-2">Gardien de but</div>
        <div class="block">
            @foreach ($titulaires as $titulaire)
                @foreach ($effectifs as $effectif)
                    @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Gardien de but'))
                        <div class="flex-1 flex justify-between inline-block items-center">
                            <div class="ml-14 inline-flex space-x-2 items-center">
                                @if ($effectif->club == $adom)
                                    <span>{{ $effectif->numero }}</span>
                                    <span class="font-bold">{{ $effectif->prenom }}</span>
                                    <span class="font-bold">{{ $effectif->nom }}</span>
                                    <a href="{{route('deleteTitulaire',$titulaire->id)}}">
                                        <svg width="15px" height="15px" viewBox="0 0 29 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <!-- Generator: Sketch 44.1 (41455) - http://www.bohemiancoding.com/sketch -->
                                            <title>delete player</title>
                                            <defs></defs>
                                            <g id="Page-2-Copy" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="178" stroke="#979797" transform="translate(-3.000000, 0.000000)">
                                                    <path d="M26.0523906,27.0654225 L21.8426586,31.2751545 C21.4586565,31.6591566 20.8247306,31.6599176 20.4342063,31.2693933 C20.0409593,30.8761463 20.0428749,30.2465111 20.4324036,29.8569823 L24.638177,25.6512089 L20.3937337,21.4067656 C20.0017565,21.0147883 20.0050121,20.384879 20.3955364,19.9943547 C20.7887833,19.6011077 21.4189786,19.6035834 21.8091982,19.9938029 L22.8397676,21.0243724 L26.0523906,24.2369954 L30.2968339,19.9925521 C30.6888112,19.6005748 31.3187206,19.6038304 31.7092449,19.9943547 C32.1024918,20.3876016 32.1000162,21.0177969 31.7097966,21.4080165 L30.6792271,22.438586 L27.4666042,25.6512089 L31.6763361,29.8609409 C32.0603383,30.244943 32.0610992,30.878869 31.670575,31.2693933 C31.277328,31.6626402 30.6476927,31.6607246 30.258164,31.2711959 L26.0523906,27.0654225 L26.0523906,27.0654225 Z" id="Rectangle-348" stroke="none" fill="#2A2630" fill-rule="evenodd"></path>
                                                    <path d="M16.0016135,14 C8.83504285,14 3,19.6024712 3,26.5208645 L3,31 C3,31.5522847 3.44771525,32 4,32 C4.55228475,32 5,31.5522847 5,31 L5,26.5208645 C5,20.7256497 9.92182241,16 16.0016135,16 C17.3223103,16 18.6094757,16.2222643 19.8203399,16.651035 C20.340949,16.8353842 20.9124306,16.5627918 21.0967799,16.0421827 C21.2811291,15.5215737 21.0085367,14.950092 20.4879276,14.7657428 C19.0632005,14.2612426 17.5503059,14 16.0016135,14 L16.0016135,14 Z M23,7 C23,3.13400675 19.8659932,0 16,0 C12.1340068,0 9,3.13400675 9,7 C9,10.8659932 12.1340068,14 16,14 C19.8659932,14 23,10.8659932 23,7 L23,7 Z M11,7 C11,4.23857625 13.2385763,2 16,2 C18.7614237,2 21,4.23857625 21,7 C21,9.76142375 18.7614237,12 16,12 C13.2385763,12 11,9.76142375 11,7 L11,7 Z" id="Rectangle-875" stroke="none" fill="#95909E" fill-rule="nonzero"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                @endif
                            </div>

                            <div class="mr-14 inline-flex space-x-2 items-center">
                                @if ($effectif->club == $aext)
                                    <a href="{{ route('deleteTitulaire',$titulaire->id) }}">
                                        <svg width="15px" height="15px" viewBox="0 0 29 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <!-- Generator: Sketch 44.1 (41455) - http://www.bohemiancoding.com/sketch -->
                                            <title>delete player</title>
                                            <defs></defs>
                                            <g id="Page-2-Copy" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="178" stroke="#979797" transform="translate(-3.000000, 0.000000)">
                                                    <path d="M26.0523906,27.0654225 L21.8426586,31.2751545 C21.4586565,31.6591566 20.8247306,31.6599176 20.4342063,31.2693933 C20.0409593,30.8761463 20.0428749,30.2465111 20.4324036,29.8569823 L24.638177,25.6512089 L20.3937337,21.4067656 C20.0017565,21.0147883 20.0050121,20.384879 20.3955364,19.9943547 C20.7887833,19.6011077 21.4189786,19.6035834 21.8091982,19.9938029 L22.8397676,21.0243724 L26.0523906,24.2369954 L30.2968339,19.9925521 C30.6888112,19.6005748 31.3187206,19.6038304 31.7092449,19.9943547 C32.1024918,20.3876016 32.1000162,21.0177969 31.7097966,21.4080165 L30.6792271,22.438586 L27.4666042,25.6512089 L31.6763361,29.8609409 C32.0603383,30.244943 32.0610992,30.878869 31.670575,31.2693933 C31.277328,31.6626402 30.6476927,31.6607246 30.258164,31.2711959 L26.0523906,27.0654225 L26.0523906,27.0654225 Z" id="Rectangle-348" stroke="none" fill="#2A2630" fill-rule="evenodd"></path>
                                                    <path d="M16.0016135,14 C8.83504285,14 3,19.6024712 3,26.5208645 L3,31 C3,31.5522847 3.44771525,32 4,32 C4.55228475,32 5,31.5522847 5,31 L5,26.5208645 C5,20.7256497 9.92182241,16 16.0016135,16 C17.3223103,16 18.6094757,16.2222643 19.8203399,16.651035 C20.340949,16.8353842 20.9124306,16.5627918 21.0967799,16.0421827 C21.2811291,15.5215737 21.0085367,14.950092 20.4879276,14.7657428 C19.0632005,14.2612426 17.5503059,14 16.0016135,14 L16.0016135,14 Z M23,7 C23,3.13400675 19.8659932,0 16,0 C12.1340068,0 9,3.13400675 9,7 C9,10.8659932 12.1340068,14 16,14 C19.8659932,14 23,10.8659932 23,7 L23,7 Z M11,7 C11,4.23857625 13.2385763,2 16,2 C18.7614237,2 21,4.23857625 21,7 C21,9.76142375 18.7614237,12 16,12 C13.2385763,12 11,9.76142375 11,7 L11,7 Z" id="Rectangle-875" stroke="none" fill="#95909E" fill-rule="nonzero"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <span>{{ $effectif->numero }}</span>
                                    <span class="font-bold">{{ $effectif->prenom }}</span>
                                    <span class="font-bold">{{ $effectif->nom }}</span>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="block flex justify-between">
            <form class="ml-14 inline-block items-center" method="post" action="{{route('sauvegarderJoueurTitul',[$matches->id,$adom])}}">
                @csrf

                <div class="inline-flex">
                    <select name="joueur" class="py-1">
                        <option value="">selectionner le gardien de but</option>
                        @if ($effectifs->count() > 0)
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->poste == 'Gardien de but')
                                    <div class="py-1">
                                        @if ($effectif->club == $adom)
                                            <option value="{{$effectif->id}}">
                                                <span>{{ $effectif->numero }}</span>
                                                <span class="font-bold">{{ $effectif->prenom }}</span>
                                                <span class="font-bold">{{ $effectif->nom }}</span>
                                            </option>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <span class="mt-4">Pas de joueur</span>
                        @endif
                    </select>
                </div>

                <button class="bg-transparent hover:bg-gray-500 py-1 px-2 border border-gray-500 hover:border-transparent rounded" type="submit" name="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve" width="20" height="25">
                        <g>
                            <path style="fill:#C2E8FF;" d="M4.506,73C4.778,61.375,14.54,52,26.5,52h15c11.96,0,21.722,9.375,21.994,21H4.506z"/>
                            <g>
                                <path style="fill:#7496C4;" d="M41.5,52.5c11.512,0,20.94,8.883,21.476,20l-57.952,0c0.536-11.117,9.964-20,21.476-20H41.5     M41.5,51.5h-15C14.074,51.5,4,61.35,4,73.5v0h60v0C64,61.35,53.926,51.5,41.5,51.5L41.5,51.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#E8D47B;" d="M34,59c-6.685,0-9.192-5.859-9.5-6.648V40.819h19v11.533C43.192,53.141,40.685,59,34,59z"/>
                            <path style="fill:#BA9B48;" d="M43,41.319v10.936c-0.407,0.994-2.849,6.245-9,6.245c-6.154,0-8.596-5.257-9-6.245V41.319H43    M44,40.319H24v12.124c0,0,2.534,7.057,10,7.057s10-7.057,10-7.057V40.319L44,40.319z"/>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#E8D47B;" d="M46.857,37.286c-2.561,0-4.644-2.083-4.644-4.643S44.297,28,46.857,28    c3.298,0,4.643,0.849,4.643,2.929C51.5,33.439,49.42,37.286,46.857,37.286z M21.143,37.286c-2.562,0-4.643-3.847-4.643-6.357    c0-2.08,1.345-2.929,4.643-2.929c2.561,0,4.644,2.083,4.644,4.643S23.703,37.286,21.143,37.286z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M46.857,28.5c3.45,0,4.143,0.929,4.143,2.429c0,2.503-2.048,5.857-4.143,5.857    c-2.284,0-4.143-1.858-4.143-4.143C42.714,30.358,44.573,28.5,46.857,28.5 M21.143,28.5c2.284,0,4.143,1.858,4.143,4.143    c0,2.284-1.858,4.143-4.143,4.143c-2.095,0-4.143-3.354-4.143-5.857C17,29.429,17.693,28.5,21.143,28.5 M46.857,27.5    c-2.84,0-5.143,2.302-5.143,5.143s2.303,5.143,5.143,5.143c2.84,0,5.143-4.017,5.143-6.857C52,28.088,49.697,27.5,46.857,27.5    L46.857,27.5z M21.143,27.5c-2.84,0-5.143,0.588-5.143,3.429c0,2.84,2.303,6.857,5.143,6.857c2.84,0,5.143-2.303,5.143-5.143    S23.983,27.5,21.143,27.5L21.143,27.5z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#FFEEA3;" d="M34,51c-1.3,0-2.534-0.498-3.477-1.403l-0.091-0.086l-0.119-0.034    C24.535,47.838,20.5,42.501,20.5,36.5V20.228c0-3.403,2.769-6.172,6.172-6.172h14.656c3.403,0,6.172,2.769,6.172,6.172V36.5    c0,6.001-4.035,11.338-9.813,12.977l-0.119,0.034l-0.091,0.086C36.534,50.502,35.3,51,34,51z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M41.328,14.556c3.128,0,5.672,2.545,5.672,5.672V36.5c0,5.779-3.886,10.918-9.449,12.496    l-0.24,0.068l-0.18,0.173C36.282,50.051,35.17,50.5,34,50.5s-2.282-0.449-3.131-1.263l-0.18-0.173l-0.24-0.068    C24.886,47.418,21,42.279,21,36.5V20.228c0-3.128,2.545-5.672,5.672-5.672H41.328 M41.328,13.556H26.672    c-3.685,0-6.672,2.987-6.672,6.672V36.5c0,6.405,4.306,11.793,10.177,13.458C31.17,50.911,32.515,51.5,34,51.5    s2.83-0.589,3.823-1.542C43.694,48.293,48,42.905,48,36.5V20.228C48,16.543,45.013,13.556,41.328,13.556L41.328,13.556z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#FFC49C;" d="M47.5,33v-8.5c0-6.66-5.292-8.458-5.346-8.476l-0.326-0.106l-0.217,0.267   C41.564,16.243,36.814,22,30,22c-0.521,0-1.062-0.017-1.608-0.033c-0.569-0.017-1.146-0.035-1.711-0.035   c-2.006,0-6.181,0-6.181,4.568V33h-0.218c-0.7-1.192-3.782-6.755-3.782-12.348C16.5,10.848,23.696,4,34,4   c6.472,0,9.527,5.675,9.557,5.732l0.119,0.226l0.253,0.037c5.166,0.74,7.571,4.396,7.571,11.505c0,5.077-3.073,10.359-3.776,11.5   H47.5z"/>
                            <g>
                                <path style="fill:#A16A4A;" d="M34,4.5c6.155,0,8.997,5.242,9.114,5.463l0.237,0.454l0.507,0.073C46.924,10.929,51,12.548,51,21.5    c0,3.895-1.872,7.936-3,10.018V24.5c0-3.644-1.526-5.878-2.807-7.111c-1.4-1.347-2.824-1.821-2.884-1.84l-0.653-0.211    l-0.433,0.532c-0.046,0.056-4.658,5.63-11.224,5.63c-0.516,0-1.052-0.016-1.594-0.033c-0.574-0.017-1.155-0.035-1.725-0.035    c-1.999,0-6.681,0-6.681,5.068v4.944c-1.132-2.203-3-6.489-3-10.792C17,11.142,23.991,4.5,34,4.5 M34,3.5    c-10.719,0-18,7.333-18,17.152c0,6.504,4,12.848,4,12.848h1c0,0,0-5.211,0-7c0-3.582,2.701-4.068,5.681-4.068    c1.109,0,2.257,0.067,3.319,0.067c7.146,0,12-5.999,12-5.999s5,1.626,5,8c0,1.968,0,9,0,9h1c0,0,4-6.073,4-12    c0-8.322-3.405-11.342-8-12C44,9.5,40.868,3.5,34,3.5L34,3.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#BAE0BD;" d="M62,80.5c-9.649,0-17.5-7.851-17.5-17.5S52.351,45.5,62,45.5S79.5,53.351,79.5,63   S71.649,80.5,62,80.5z"/>
                            <g>
                                <path style="fill:#5E9C76;" d="M62,46c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S52.626,46,62,46 M62,45    c-9.941,0-18,8.059-18,18s8.059,18,18,18s18-8.059,18-18S71.941,45,62,45L62,45z"/>
                            </g>
                        </g>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="62" y1="73.001" x2="62" y2="53.001"/>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="52" y1="63.001" x2="72" y2="63.001"/>
                    </svg>
                </button>
            </form>
            <form class="mr-14 inline-block items-center" method="post" action="{{route('sauvegarderJoueurTitul',[$matches->id,$adom])}}">
                @csrf

                <button class="bg-transparent hover:bg-gray-500 py-1 px-2 border border-gray-500 hover:border-transparent rounded" type="submit" name="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve" width="20" height="25">
                        <g>
                            <path style="fill:#C2E8FF;" d="M4.506,73C4.778,61.375,14.54,52,26.5,52h15c11.96,0,21.722,9.375,21.994,21H4.506z"/>
                            <g>
                                <path style="fill:#7496C4;" d="M41.5,52.5c11.512,0,20.94,8.883,21.476,20l-57.952,0c0.536-11.117,9.964-20,21.476-20H41.5     M41.5,51.5h-15C14.074,51.5,4,61.35,4,73.5v0h60v0C64,61.35,53.926,51.5,41.5,51.5L41.5,51.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#E8D47B;" d="M34,59c-6.685,0-9.192-5.859-9.5-6.648V40.819h19v11.533C43.192,53.141,40.685,59,34,59z"/>
                            <path style="fill:#BA9B48;" d="M43,41.319v10.936c-0.407,0.994-2.849,6.245-9,6.245c-6.154,0-8.596-5.257-9-6.245V41.319H43    M44,40.319H24v12.124c0,0,2.534,7.057,10,7.057s10-7.057,10-7.057V40.319L44,40.319z"/>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#E8D47B;" d="M46.857,37.286c-2.561,0-4.644-2.083-4.644-4.643S44.297,28,46.857,28    c3.298,0,4.643,0.849,4.643,2.929C51.5,33.439,49.42,37.286,46.857,37.286z M21.143,37.286c-2.562,0-4.643-3.847-4.643-6.357    c0-2.08,1.345-2.929,4.643-2.929c2.561,0,4.644,2.083,4.644,4.643S23.703,37.286,21.143,37.286z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M46.857,28.5c3.45,0,4.143,0.929,4.143,2.429c0,2.503-2.048,5.857-4.143,5.857    c-2.284,0-4.143-1.858-4.143-4.143C42.714,30.358,44.573,28.5,46.857,28.5 M21.143,28.5c2.284,0,4.143,1.858,4.143,4.143    c0,2.284-1.858,4.143-4.143,4.143c-2.095,0-4.143-3.354-4.143-5.857C17,29.429,17.693,28.5,21.143,28.5 M46.857,27.5    c-2.84,0-5.143,2.302-5.143,5.143s2.303,5.143,5.143,5.143c2.84,0,5.143-4.017,5.143-6.857C52,28.088,49.697,27.5,46.857,27.5    L46.857,27.5z M21.143,27.5c-2.84,0-5.143,0.588-5.143,3.429c0,2.84,2.303,6.857,5.143,6.857c2.84,0,5.143-2.303,5.143-5.143    S23.983,27.5,21.143,27.5L21.143,27.5z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#FFEEA3;" d="M34,51c-1.3,0-2.534-0.498-3.477-1.403l-0.091-0.086l-0.119-0.034    C24.535,47.838,20.5,42.501,20.5,36.5V20.228c0-3.403,2.769-6.172,6.172-6.172h14.656c3.403,0,6.172,2.769,6.172,6.172V36.5    c0,6.001-4.035,11.338-9.813,12.977l-0.119,0.034l-0.091,0.086C36.534,50.502,35.3,51,34,51z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M41.328,14.556c3.128,0,5.672,2.545,5.672,5.672V36.5c0,5.779-3.886,10.918-9.449,12.496    l-0.24,0.068l-0.18,0.173C36.282,50.051,35.17,50.5,34,50.5s-2.282-0.449-3.131-1.263l-0.18-0.173l-0.24-0.068    C24.886,47.418,21,42.279,21,36.5V20.228c0-3.128,2.545-5.672,5.672-5.672H41.328 M41.328,13.556H26.672    c-3.685,0-6.672,2.987-6.672,6.672V36.5c0,6.405,4.306,11.793,10.177,13.458C31.17,50.911,32.515,51.5,34,51.5    s2.83-0.589,3.823-1.542C43.694,48.293,48,42.905,48,36.5V20.228C48,16.543,45.013,13.556,41.328,13.556L41.328,13.556z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#FFC49C;" d="M47.5,33v-8.5c0-6.66-5.292-8.458-5.346-8.476l-0.326-0.106l-0.217,0.267   C41.564,16.243,36.814,22,30,22c-0.521,0-1.062-0.017-1.608-0.033c-0.569-0.017-1.146-0.035-1.711-0.035   c-2.006,0-6.181,0-6.181,4.568V33h-0.218c-0.7-1.192-3.782-6.755-3.782-12.348C16.5,10.848,23.696,4,34,4   c6.472,0,9.527,5.675,9.557,5.732l0.119,0.226l0.253,0.037c5.166,0.74,7.571,4.396,7.571,11.505c0,5.077-3.073,10.359-3.776,11.5   H47.5z"/>
                            <g>
                                <path style="fill:#A16A4A;" d="M34,4.5c6.155,0,8.997,5.242,9.114,5.463l0.237,0.454l0.507,0.073C46.924,10.929,51,12.548,51,21.5    c0,3.895-1.872,7.936-3,10.018V24.5c0-3.644-1.526-5.878-2.807-7.111c-1.4-1.347-2.824-1.821-2.884-1.84l-0.653-0.211    l-0.433,0.532c-0.046,0.056-4.658,5.63-11.224,5.63c-0.516,0-1.052-0.016-1.594-0.033c-0.574-0.017-1.155-0.035-1.725-0.035    c-1.999,0-6.681,0-6.681,5.068v4.944c-1.132-2.203-3-6.489-3-10.792C17,11.142,23.991,4.5,34,4.5 M34,3.5    c-10.719,0-18,7.333-18,17.152c0,6.504,4,12.848,4,12.848h1c0,0,0-5.211,0-7c0-3.582,2.701-4.068,5.681-4.068    c1.109,0,2.257,0.067,3.319,0.067c7.146,0,12-5.999,12-5.999s5,1.626,5,8c0,1.968,0,9,0,9h1c0,0,4-6.073,4-12    c0-8.322-3.405-11.342-8-12C44,9.5,40.868,3.5,34,3.5L34,3.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#BAE0BD;" d="M62,80.5c-9.649,0-17.5-7.851-17.5-17.5S52.351,45.5,62,45.5S79.5,53.351,79.5,63   S71.649,80.5,62,80.5z"/>
                            <g>
                                <path style="fill:#5E9C76;" d="M62,46c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S52.626,46,62,46 M62,45    c-9.941,0-18,8.059-18,18s8.059,18,18,18s18-8.059,18-18S71.941,45,62,45L62,45z"/>
                            </g>
                        </g>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="62" y1="73.001" x2="62" y2="53.001"/>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="52" y1="63.001" x2="72" y2="63.001"/>
                    </svg>
                </button>
                <div class="inline-flex">
                    <select name="joueur" class="py-1">
                        <option value="">selectionner le gardien de but</option>
                        @if ($effectifs->count() > 0)
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->poste == 'Gardien de but')
                                    <div class="py-1">
                                        @if ($effectif->club == $aext)
                                            <option value="{{$effectif->id}}">
                                                <span>{{ $effectif->numero }}</span>
                                                <span class="font-bold">{{ $effectif->prenom }}</span>
                                                <span class="font-bold">{{ $effectif->nom }}</span>
                                            </option>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <span class="mt-4">Pas de joueur</span>
                        @endif
                    </select>
                </div>
            </form>
        </div>

        <div class="mt-8 flex justify-center text-1xl text-blue-900 underline font-bold">Défenseur</div>
        <div class="block">
            <div class="flex justify-between">
                <div class="grid grid-flow-row auto-rows-max">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Défenseur'))
                                @if ($effectif->club == $adom)
                                    <div class="ml-14 inline-flex space-x-2 items-center">
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                        <a href="{{ route('deleteTitulaire',$titulaire->id) }}">
                                            <svg width="15px" height="15px" viewBox="0 0 29 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <!-- Generator: Sketch 44.1 (41455) - http://www.bohemiancoding.com/sketch -->
                                                <title>delete player</title>
                                                <defs></defs>
                                                <g id="Page-2-Copy" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="178" stroke="#979797" transform="translate(-3.000000, 0.000000)">
                                                        <path d="M26.0523906,27.0654225 L21.8426586,31.2751545 C21.4586565,31.6591566 20.8247306,31.6599176 20.4342063,31.2693933 C20.0409593,30.8761463 20.0428749,30.2465111 20.4324036,29.8569823 L24.638177,25.6512089 L20.3937337,21.4067656 C20.0017565,21.0147883 20.0050121,20.384879 20.3955364,19.9943547 C20.7887833,19.6011077 21.4189786,19.6035834 21.8091982,19.9938029 L22.8397676,21.0243724 L26.0523906,24.2369954 L30.2968339,19.9925521 C30.6888112,19.6005748 31.3187206,19.6038304 31.7092449,19.9943547 C32.1024918,20.3876016 32.1000162,21.0177969 31.7097966,21.4080165 L30.6792271,22.438586 L27.4666042,25.6512089 L31.6763361,29.8609409 C32.0603383,30.244943 32.0610992,30.878869 31.670575,31.2693933 C31.277328,31.6626402 30.6476927,31.6607246 30.258164,31.2711959 L26.0523906,27.0654225 L26.0523906,27.0654225 Z" id="Rectangle-348" stroke="none" fill="#2A2630" fill-rule="evenodd"></path>
                                                        <path d="M16.0016135,14 C8.83504285,14 3,19.6024712 3,26.5208645 L3,31 C3,31.5522847 3.44771525,32 4,32 C4.55228475,32 5,31.5522847 5,31 L5,26.5208645 C5,20.7256497 9.92182241,16 16.0016135,16 C17.3223103,16 18.6094757,16.2222643 19.8203399,16.651035 C20.340949,16.8353842 20.9124306,16.5627918 21.0967799,16.0421827 C21.2811291,15.5215737 21.0085367,14.950092 20.4879276,14.7657428 C19.0632005,14.2612426 17.5503059,14 16.0016135,14 L16.0016135,14 Z M23,7 C23,3.13400675 19.8659932,0 16,0 C12.1340068,0 9,3.13400675 9,7 C9,10.8659932 12.1340068,14 16,14 C19.8659932,14 23,10.8659932 23,7 L23,7 Z M11,7 C11,4.23857625 13.2385763,2 16,2 C18.7614237,2 21,4.23857625 21,7 C21,9.76142375 18.7614237,12 16,12 C13.2385763,12 11,9.76142375 11,7 L11,7 Z" id="Rectangle-875" stroke="none" fill="#95909E" fill-rule="nonzero"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>

                <div class="grid grid-flow-row auto-rows-max">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Défenseur'))
                                @if ($effectif->club == $aext)
                                    <div class="flex justify-end mr-14 inline-flex space-x-2 items-center">
                                        <a href="{{ route('deleteTitulaire',$titulaire->id) }}">
                                            <svg width="15px" height="15px" viewBox="0 0 29 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <!-- Generator: Sketch 44.1 (41455) - http://www.bohemiancoding.com/sketch -->
                                                <title>delete player</title>
                                                <defs></defs>
                                                <g id="Page-2-Copy" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="178" stroke="#979797" transform="translate(-3.000000, 0.000000)">
                                                        <path d="M26.0523906,27.0654225 L21.8426586,31.2751545 C21.4586565,31.6591566 20.8247306,31.6599176 20.4342063,31.2693933 C20.0409593,30.8761463 20.0428749,30.2465111 20.4324036,29.8569823 L24.638177,25.6512089 L20.3937337,21.4067656 C20.0017565,21.0147883 20.0050121,20.384879 20.3955364,19.9943547 C20.7887833,19.6011077 21.4189786,19.6035834 21.8091982,19.9938029 L22.8397676,21.0243724 L26.0523906,24.2369954 L30.2968339,19.9925521 C30.6888112,19.6005748 31.3187206,19.6038304 31.7092449,19.9943547 C32.1024918,20.3876016 32.1000162,21.0177969 31.7097966,21.4080165 L30.6792271,22.438586 L27.4666042,25.6512089 L31.6763361,29.8609409 C32.0603383,30.244943 32.0610992,30.878869 31.670575,31.2693933 C31.277328,31.6626402 30.6476927,31.6607246 30.258164,31.2711959 L26.0523906,27.0654225 L26.0523906,27.0654225 Z" id="Rectangle-348" stroke="none" fill="#2A2630" fill-rule="evenodd"></path>
                                                        <path d="M16.0016135,14 C8.83504285,14 3,19.6024712 3,26.5208645 L3,31 C3,31.5522847 3.44771525,32 4,32 C4.55228475,32 5,31.5522847 5,31 L5,26.5208645 C5,20.7256497 9.92182241,16 16.0016135,16 C17.3223103,16 18.6094757,16.2222643 19.8203399,16.651035 C20.340949,16.8353842 20.9124306,16.5627918 21.0967799,16.0421827 C21.2811291,15.5215737 21.0085367,14.950092 20.4879276,14.7657428 C19.0632005,14.2612426 17.5503059,14 16.0016135,14 L16.0016135,14 Z M23,7 C23,3.13400675 19.8659932,0 16,0 C12.1340068,0 9,3.13400675 9,7 C9,10.8659932 12.1340068,14 16,14 C19.8659932,14 23,10.8659932 23,7 L23,7 Z M11,7 C11,4.23857625 13.2385763,2 16,2 C18.7614237,2 21,4.23857625 21,7 C21,9.76142375 18.7614237,12 16,12 C13.2385763,12 11,9.76142375 11,7 L11,7 Z" id="Rectangle-875" stroke="none" fill="#95909E" fill-rule="nonzero"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>

        <div class="block flex justify-between">
            <form class="mt-2 ml-14 inline-block items-center" method="post" action="{{route('sauvegarderJoueurTitul',[$matches->id,$adom])}}">
                @csrf

                <div class="inline-flex">
                    <select name="joueur" class="py-1">
                        <option value="">--selectionner les defenseurs--</option>
                        @if ($effectifs->count() > 0)
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->poste == 'Défenseur')
                                    <div class="py-1">
                                        @if ($effectif->club == $adom)
                                            <option value="{{$effectif->id}}">
                                                <span>{{ $effectif->numero }}</span>
                                                <span class="font-bold">{{ $effectif->prenom }}</span>
                                                <span class="font-bold">{{ $effectif->nom }}</span>
                                            </option>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <span class="mt-4">Pas de joueur</span>
                        @endif
                    </select>
                </div>

                <button class="bg-transparent hover:bg-gray-500 py-1 px-2 border border-gray-500 hover:border-transparent rounded" type="submit" name="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve" width="20" height="25">
                        <g>
                            <path style="fill:#C2E8FF;" d="M4.506,73C4.778,61.375,14.54,52,26.5,52h15c11.96,0,21.722,9.375,21.994,21H4.506z"/>
                            <g>
                                <path style="fill:#7496C4;" d="M41.5,52.5c11.512,0,20.94,8.883,21.476,20l-57.952,0c0.536-11.117,9.964-20,21.476-20H41.5     M41.5,51.5h-15C14.074,51.5,4,61.35,4,73.5v0h60v0C64,61.35,53.926,51.5,41.5,51.5L41.5,51.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#E8D47B;" d="M34,59c-6.685,0-9.192-5.859-9.5-6.648V40.819h19v11.533C43.192,53.141,40.685,59,34,59z"/>
                            <path style="fill:#BA9B48;" d="M43,41.319v10.936c-0.407,0.994-2.849,6.245-9,6.245c-6.154,0-8.596-5.257-9-6.245V41.319H43    M44,40.319H24v12.124c0,0,2.534,7.057,10,7.057s10-7.057,10-7.057V40.319L44,40.319z"/>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#E8D47B;" d="M46.857,37.286c-2.561,0-4.644-2.083-4.644-4.643S44.297,28,46.857,28    c3.298,0,4.643,0.849,4.643,2.929C51.5,33.439,49.42,37.286,46.857,37.286z M21.143,37.286c-2.562,0-4.643-3.847-4.643-6.357    c0-2.08,1.345-2.929,4.643-2.929c2.561,0,4.644,2.083,4.644,4.643S23.703,37.286,21.143,37.286z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M46.857,28.5c3.45,0,4.143,0.929,4.143,2.429c0,2.503-2.048,5.857-4.143,5.857    c-2.284,0-4.143-1.858-4.143-4.143C42.714,30.358,44.573,28.5,46.857,28.5 M21.143,28.5c2.284,0,4.143,1.858,4.143,4.143    c0,2.284-1.858,4.143-4.143,4.143c-2.095,0-4.143-3.354-4.143-5.857C17,29.429,17.693,28.5,21.143,28.5 M46.857,27.5    c-2.84,0-5.143,2.302-5.143,5.143s2.303,5.143,5.143,5.143c2.84,0,5.143-4.017,5.143-6.857C52,28.088,49.697,27.5,46.857,27.5    L46.857,27.5z M21.143,27.5c-2.84,0-5.143,0.588-5.143,3.429c0,2.84,2.303,6.857,5.143,6.857c2.84,0,5.143-2.303,5.143-5.143    S23.983,27.5,21.143,27.5L21.143,27.5z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#FFEEA3;" d="M34,51c-1.3,0-2.534-0.498-3.477-1.403l-0.091-0.086l-0.119-0.034    C24.535,47.838,20.5,42.501,20.5,36.5V20.228c0-3.403,2.769-6.172,6.172-6.172h14.656c3.403,0,6.172,2.769,6.172,6.172V36.5    c0,6.001-4.035,11.338-9.813,12.977l-0.119,0.034l-0.091,0.086C36.534,50.502,35.3,51,34,51z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M41.328,14.556c3.128,0,5.672,2.545,5.672,5.672V36.5c0,5.779-3.886,10.918-9.449,12.496    l-0.24,0.068l-0.18,0.173C36.282,50.051,35.17,50.5,34,50.5s-2.282-0.449-3.131-1.263l-0.18-0.173l-0.24-0.068    C24.886,47.418,21,42.279,21,36.5V20.228c0-3.128,2.545-5.672,5.672-5.672H41.328 M41.328,13.556H26.672    c-3.685,0-6.672,2.987-6.672,6.672V36.5c0,6.405,4.306,11.793,10.177,13.458C31.17,50.911,32.515,51.5,34,51.5    s2.83-0.589,3.823-1.542C43.694,48.293,48,42.905,48,36.5V20.228C48,16.543,45.013,13.556,41.328,13.556L41.328,13.556z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#FFC49C;" d="M47.5,33v-8.5c0-6.66-5.292-8.458-5.346-8.476l-0.326-0.106l-0.217,0.267   C41.564,16.243,36.814,22,30,22c-0.521,0-1.062-0.017-1.608-0.033c-0.569-0.017-1.146-0.035-1.711-0.035   c-2.006,0-6.181,0-6.181,4.568V33h-0.218c-0.7-1.192-3.782-6.755-3.782-12.348C16.5,10.848,23.696,4,34,4   c6.472,0,9.527,5.675,9.557,5.732l0.119,0.226l0.253,0.037c5.166,0.74,7.571,4.396,7.571,11.505c0,5.077-3.073,10.359-3.776,11.5   H47.5z"/>
                            <g>
                                <path style="fill:#A16A4A;" d="M34,4.5c6.155,0,8.997,5.242,9.114,5.463l0.237,0.454l0.507,0.073C46.924,10.929,51,12.548,51,21.5    c0,3.895-1.872,7.936-3,10.018V24.5c0-3.644-1.526-5.878-2.807-7.111c-1.4-1.347-2.824-1.821-2.884-1.84l-0.653-0.211    l-0.433,0.532c-0.046,0.056-4.658,5.63-11.224,5.63c-0.516,0-1.052-0.016-1.594-0.033c-0.574-0.017-1.155-0.035-1.725-0.035    c-1.999,0-6.681,0-6.681,5.068v4.944c-1.132-2.203-3-6.489-3-10.792C17,11.142,23.991,4.5,34,4.5 M34,3.5    c-10.719,0-18,7.333-18,17.152c0,6.504,4,12.848,4,12.848h1c0,0,0-5.211,0-7c0-3.582,2.701-4.068,5.681-4.068    c1.109,0,2.257,0.067,3.319,0.067c7.146,0,12-5.999,12-5.999s5,1.626,5,8c0,1.968,0,9,0,9h1c0,0,4-6.073,4-12    c0-8.322-3.405-11.342-8-12C44,9.5,40.868,3.5,34,3.5L34,3.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#BAE0BD;" d="M62,80.5c-9.649,0-17.5-7.851-17.5-17.5S52.351,45.5,62,45.5S79.5,53.351,79.5,63   S71.649,80.5,62,80.5z"/>
                            <g>
                                <path style="fill:#5E9C76;" d="M62,46c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S52.626,46,62,46 M62,45    c-9.941,0-18,8.059-18,18s8.059,18,18,18s18-8.059,18-18S71.941,45,62,45L62,45z"/>
                            </g>
                        </g>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="62" y1="73.001" x2="62" y2="53.001"/>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="52" y1="63.001" x2="72" y2="63.001"/>
                    </svg>
                </button>
            </form>
            <form class="mt-2 mr-14 inline-block items-center" method="post" action="{{route('sauvegarderJoueurTitul',[$matches->id,$adom])}}">
                @csrf

                <button class="bg-transparent hover:bg-gray-500 py-1 px-2 border border-gray-500 hover:border-transparent rounded" type="submit" name="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve" width="20" height="25">
                        <g>
                            <path style="fill:#C2E8FF;" d="M4.506,73C4.778,61.375,14.54,52,26.5,52h15c11.96,0,21.722,9.375,21.994,21H4.506z"/>
                            <g>
                                <path style="fill:#7496C4;" d="M41.5,52.5c11.512,0,20.94,8.883,21.476,20l-57.952,0c0.536-11.117,9.964-20,21.476-20H41.5     M41.5,51.5h-15C14.074,51.5,4,61.35,4,73.5v0h60v0C64,61.35,53.926,51.5,41.5,51.5L41.5,51.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#E8D47B;" d="M34,59c-6.685,0-9.192-5.859-9.5-6.648V40.819h19v11.533C43.192,53.141,40.685,59,34,59z"/>
                            <path style="fill:#BA9B48;" d="M43,41.319v10.936c-0.407,0.994-2.849,6.245-9,6.245c-6.154,0-8.596-5.257-9-6.245V41.319H43    M44,40.319H24v12.124c0,0,2.534,7.057,10,7.057s10-7.057,10-7.057V40.319L44,40.319z"/>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#E8D47B;" d="M46.857,37.286c-2.561,0-4.644-2.083-4.644-4.643S44.297,28,46.857,28    c3.298,0,4.643,0.849,4.643,2.929C51.5,33.439,49.42,37.286,46.857,37.286z M21.143,37.286c-2.562,0-4.643-3.847-4.643-6.357    c0-2.08,1.345-2.929,4.643-2.929c2.561,0,4.644,2.083,4.644,4.643S23.703,37.286,21.143,37.286z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M46.857,28.5c3.45,0,4.143,0.929,4.143,2.429c0,2.503-2.048,5.857-4.143,5.857    c-2.284,0-4.143-1.858-4.143-4.143C42.714,30.358,44.573,28.5,46.857,28.5 M21.143,28.5c2.284,0,4.143,1.858,4.143,4.143    c0,2.284-1.858,4.143-4.143,4.143c-2.095,0-4.143-3.354-4.143-5.857C17,29.429,17.693,28.5,21.143,28.5 M46.857,27.5    c-2.84,0-5.143,2.302-5.143,5.143s2.303,5.143,5.143,5.143c2.84,0,5.143-4.017,5.143-6.857C52,28.088,49.697,27.5,46.857,27.5    L46.857,27.5z M21.143,27.5c-2.84,0-5.143,0.588-5.143,3.429c0,2.84,2.303,6.857,5.143,6.857c2.84,0,5.143-2.303,5.143-5.143    S23.983,27.5,21.143,27.5L21.143,27.5z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#FFEEA3;" d="M34,51c-1.3,0-2.534-0.498-3.477-1.403l-0.091-0.086l-0.119-0.034    C24.535,47.838,20.5,42.501,20.5,36.5V20.228c0-3.403,2.769-6.172,6.172-6.172h14.656c3.403,0,6.172,2.769,6.172,6.172V36.5    c0,6.001-4.035,11.338-9.813,12.977l-0.119,0.034l-0.091,0.086C36.534,50.502,35.3,51,34,51z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M41.328,14.556c3.128,0,5.672,2.545,5.672,5.672V36.5c0,5.779-3.886,10.918-9.449,12.496    l-0.24,0.068l-0.18,0.173C36.282,50.051,35.17,50.5,34,50.5s-2.282-0.449-3.131-1.263l-0.18-0.173l-0.24-0.068    C24.886,47.418,21,42.279,21,36.5V20.228c0-3.128,2.545-5.672,5.672-5.672H41.328 M41.328,13.556H26.672    c-3.685,0-6.672,2.987-6.672,6.672V36.5c0,6.405,4.306,11.793,10.177,13.458C31.17,50.911,32.515,51.5,34,51.5    s2.83-0.589,3.823-1.542C43.694,48.293,48,42.905,48,36.5V20.228C48,16.543,45.013,13.556,41.328,13.556L41.328,13.556z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#FFC49C;" d="M47.5,33v-8.5c0-6.66-5.292-8.458-5.346-8.476l-0.326-0.106l-0.217,0.267   C41.564,16.243,36.814,22,30,22c-0.521,0-1.062-0.017-1.608-0.033c-0.569-0.017-1.146-0.035-1.711-0.035   c-2.006,0-6.181,0-6.181,4.568V33h-0.218c-0.7-1.192-3.782-6.755-3.782-12.348C16.5,10.848,23.696,4,34,4   c6.472,0,9.527,5.675,9.557,5.732l0.119,0.226l0.253,0.037c5.166,0.74,7.571,4.396,7.571,11.505c0,5.077-3.073,10.359-3.776,11.5   H47.5z"/>
                            <g>
                                <path style="fill:#A16A4A;" d="M34,4.5c6.155,0,8.997,5.242,9.114,5.463l0.237,0.454l0.507,0.073C46.924,10.929,51,12.548,51,21.5    c0,3.895-1.872,7.936-3,10.018V24.5c0-3.644-1.526-5.878-2.807-7.111c-1.4-1.347-2.824-1.821-2.884-1.84l-0.653-0.211    l-0.433,0.532c-0.046,0.056-4.658,5.63-11.224,5.63c-0.516,0-1.052-0.016-1.594-0.033c-0.574-0.017-1.155-0.035-1.725-0.035    c-1.999,0-6.681,0-6.681,5.068v4.944c-1.132-2.203-3-6.489-3-10.792C17,11.142,23.991,4.5,34,4.5 M34,3.5    c-10.719,0-18,7.333-18,17.152c0,6.504,4,12.848,4,12.848h1c0,0,0-5.211,0-7c0-3.582,2.701-4.068,5.681-4.068    c1.109,0,2.257,0.067,3.319,0.067c7.146,0,12-5.999,12-5.999s5,1.626,5,8c0,1.968,0,9,0,9h1c0,0,4-6.073,4-12    c0-8.322-3.405-11.342-8-12C44,9.5,40.868,3.5,34,3.5L34,3.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#BAE0BD;" d="M62,80.5c-9.649,0-17.5-7.851-17.5-17.5S52.351,45.5,62,45.5S79.5,53.351,79.5,63   S71.649,80.5,62,80.5z"/>
                            <g>
                                <path style="fill:#5E9C76;" d="M62,46c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S52.626,46,62,46 M62,45    c-9.941,0-18,8.059-18,18s8.059,18,18,18s18-8.059,18-18S71.941,45,62,45L62,45z"/>
                            </g>
                        </g>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="62" y1="73.001" x2="62" y2="53.001"/>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="52" y1="63.001" x2="72" y2="63.001"/>
                    </svg>
                </button>
                <div class="inline-flex">
                    <select name="joueur" class="py-1">
                        <option value="">--selectionner les defenseurs--</option>
                        @if ($effectifs->count() > 0)
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->poste == 'Défenseur')
                                    <div class="py-1">
                                        @if ($effectif->club == $aext)
                                            <option value="{{$effectif->id}}">
                                                <span>{{ $effectif->numero }}</span>
                                                <span class="font-bold">{{ $effectif->prenom }}</span>
                                                <span class="font-bold">{{ $effectif->nom }}</span>
                                            </option>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <span class="mt-4">Pas de joueur</span>
                        @endif
                    </select>
                </div>
            </form>
        </div>


        <div class="mt-8 flex justify-center text-1xl text-blue-900 underline font-bold mb-2">Milieu de terrain</div>
        <div class="block">
            <div class="flex justify-between">
                <div class="grid grid-flow-row auto-rows-max">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Milieu de terrain'))
                                @if ($effectif->club == $adom)
                                    <div class="ml-14 inline-flex space-x-2 items-center">
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                        <a href="{{ route('deleteTitulaire',$titulaire->id) }}">
                                            <svg width="15px" height="15px" viewBox="0 0 29 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <!-- Generator: Sketch 44.1 (41455) - http://www.bohemiancoding.com/sketch -->
                                                <title>delete player</title>
                                                <defs></defs>
                                                <g id="Page-2-Copy" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="178" stroke="#979797" transform="translate(-3.000000, 0.000000)">
                                                        <path d="M26.0523906,27.0654225 L21.8426586,31.2751545 C21.4586565,31.6591566 20.8247306,31.6599176 20.4342063,31.2693933 C20.0409593,30.8761463 20.0428749,30.2465111 20.4324036,29.8569823 L24.638177,25.6512089 L20.3937337,21.4067656 C20.0017565,21.0147883 20.0050121,20.384879 20.3955364,19.9943547 C20.7887833,19.6011077 21.4189786,19.6035834 21.8091982,19.9938029 L22.8397676,21.0243724 L26.0523906,24.2369954 L30.2968339,19.9925521 C30.6888112,19.6005748 31.3187206,19.6038304 31.7092449,19.9943547 C32.1024918,20.3876016 32.1000162,21.0177969 31.7097966,21.4080165 L30.6792271,22.438586 L27.4666042,25.6512089 L31.6763361,29.8609409 C32.0603383,30.244943 32.0610992,30.878869 31.670575,31.2693933 C31.277328,31.6626402 30.6476927,31.6607246 30.258164,31.2711959 L26.0523906,27.0654225 L26.0523906,27.0654225 Z" id="Rectangle-348" stroke="none" fill="#2A2630" fill-rule="evenodd"></path>
                                                        <path d="M16.0016135,14 C8.83504285,14 3,19.6024712 3,26.5208645 L3,31 C3,31.5522847 3.44771525,32 4,32 C4.55228475,32 5,31.5522847 5,31 L5,26.5208645 C5,20.7256497 9.92182241,16 16.0016135,16 C17.3223103,16 18.6094757,16.2222643 19.8203399,16.651035 C20.340949,16.8353842 20.9124306,16.5627918 21.0967799,16.0421827 C21.2811291,15.5215737 21.0085367,14.950092 20.4879276,14.7657428 C19.0632005,14.2612426 17.5503059,14 16.0016135,14 L16.0016135,14 Z M23,7 C23,3.13400675 19.8659932,0 16,0 C12.1340068,0 9,3.13400675 9,7 C9,10.8659932 12.1340068,14 16,14 C19.8659932,14 23,10.8659932 23,7 L23,7 Z M11,7 C11,4.23857625 13.2385763,2 16,2 C18.7614237,2 21,4.23857625 21,7 C21,9.76142375 18.7614237,12 16,12 C13.2385763,12 11,9.76142375 11,7 L11,7 Z" id="Rectangle-875" stroke="none" fill="#95909E" fill-rule="nonzero"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>

                <div class="grid grid-flow-row auto-rows-max">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Milieu de terrain'))
                                @if ($effectif->club == $aext)
                                    <div class="flex justify-end mr-14 inline-flex space-x-2 items-center">
                                        <a href="{{ route('deleteTitulaire',$titulaire->id) }}">
                                            <svg width="15px" height="15px" viewBox="0 0 29 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <!-- Generator: Sketch 44.1 (41455) - http://www.bohemiancoding.com/sketch -->
                                                <title>delete player</title>
                                                <defs></defs>
                                                <g id="Page-2-Copy" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="178" stroke="#979797" transform="translate(-3.000000, 0.000000)">
                                                        <path d="M26.0523906,27.0654225 L21.8426586,31.2751545 C21.4586565,31.6591566 20.8247306,31.6599176 20.4342063,31.2693933 C20.0409593,30.8761463 20.0428749,30.2465111 20.4324036,29.8569823 L24.638177,25.6512089 L20.3937337,21.4067656 C20.0017565,21.0147883 20.0050121,20.384879 20.3955364,19.9943547 C20.7887833,19.6011077 21.4189786,19.6035834 21.8091982,19.9938029 L22.8397676,21.0243724 L26.0523906,24.2369954 L30.2968339,19.9925521 C30.6888112,19.6005748 31.3187206,19.6038304 31.7092449,19.9943547 C32.1024918,20.3876016 32.1000162,21.0177969 31.7097966,21.4080165 L30.6792271,22.438586 L27.4666042,25.6512089 L31.6763361,29.8609409 C32.0603383,30.244943 32.0610992,30.878869 31.670575,31.2693933 C31.277328,31.6626402 30.6476927,31.6607246 30.258164,31.2711959 L26.0523906,27.0654225 L26.0523906,27.0654225 Z" id="Rectangle-348" stroke="none" fill="#2A2630" fill-rule="evenodd"></path>
                                                        <path d="M16.0016135,14 C8.83504285,14 3,19.6024712 3,26.5208645 L3,31 C3,31.5522847 3.44771525,32 4,32 C4.55228475,32 5,31.5522847 5,31 L5,26.5208645 C5,20.7256497 9.92182241,16 16.0016135,16 C17.3223103,16 18.6094757,16.2222643 19.8203399,16.651035 C20.340949,16.8353842 20.9124306,16.5627918 21.0967799,16.0421827 C21.2811291,15.5215737 21.0085367,14.950092 20.4879276,14.7657428 C19.0632005,14.2612426 17.5503059,14 16.0016135,14 L16.0016135,14 Z M23,7 C23,3.13400675 19.8659932,0 16,0 C12.1340068,0 9,3.13400675 9,7 C9,10.8659932 12.1340068,14 16,14 C19.8659932,14 23,10.8659932 23,7 L23,7 Z M11,7 C11,4.23857625 13.2385763,2 16,2 C18.7614237,2 21,4.23857625 21,7 C21,9.76142375 18.7614237,12 16,12 C13.2385763,12 11,9.76142375 11,7 L11,7 Z" id="Rectangle-875" stroke="none" fill="#95909E" fill-rule="nonzero"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="block flex justify-between">
            <form class="mt-2 ml-14 inline-block items-center" method="post" action="{{route('sauvegarderJoueurTitul',[$matches->id,$adom])}}">
                @csrf

                <div class="inline-flex">
                    <select name="joueur" class="py-1">
                        <option value="">--selectionner les milieux--</option>
                        @if ($effectifs->count() > 0)
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->poste == 'Milieu de terrain')
                                    <div class="py-1">
                                        @if ($effectif->club == $adom)
                                            <option value="{{$effectif->id}}">
                                                <span>{{ $effectif->numero }}</span>
                                                <span class="font-bold">{{ $effectif->prenom }}</span>
                                                <span class="font-bold">{{ $effectif->nom }}</span>
                                            </option>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <span class="mt-4">Pas de joueur</span>
                        @endif
                    </select>
                </div>

                <button class="bg-transparent hover:bg-gray-500 py-1 px-2 border border-gray-500 hover:border-transparent rounded" type="submit" name="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve" width="20" height="25">
                        <g>
                            <path style="fill:#C2E8FF;" d="M4.506,73C4.778,61.375,14.54,52,26.5,52h15c11.96,0,21.722,9.375,21.994,21H4.506z"/>
                            <g>
                                <path style="fill:#7496C4;" d="M41.5,52.5c11.512,0,20.94,8.883,21.476,20l-57.952,0c0.536-11.117,9.964-20,21.476-20H41.5     M41.5,51.5h-15C14.074,51.5,4,61.35,4,73.5v0h60v0C64,61.35,53.926,51.5,41.5,51.5L41.5,51.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#E8D47B;" d="M34,59c-6.685,0-9.192-5.859-9.5-6.648V40.819h19v11.533C43.192,53.141,40.685,59,34,59z"/>
                            <path style="fill:#BA9B48;" d="M43,41.319v10.936c-0.407,0.994-2.849,6.245-9,6.245c-6.154,0-8.596-5.257-9-6.245V41.319H43    M44,40.319H24v12.124c0,0,2.534,7.057,10,7.057s10-7.057,10-7.057V40.319L44,40.319z"/>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#E8D47B;" d="M46.857,37.286c-2.561,0-4.644-2.083-4.644-4.643S44.297,28,46.857,28    c3.298,0,4.643,0.849,4.643,2.929C51.5,33.439,49.42,37.286,46.857,37.286z M21.143,37.286c-2.562,0-4.643-3.847-4.643-6.357    c0-2.08,1.345-2.929,4.643-2.929c2.561,0,4.644,2.083,4.644,4.643S23.703,37.286,21.143,37.286z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M46.857,28.5c3.45,0,4.143,0.929,4.143,2.429c0,2.503-2.048,5.857-4.143,5.857    c-2.284,0-4.143-1.858-4.143-4.143C42.714,30.358,44.573,28.5,46.857,28.5 M21.143,28.5c2.284,0,4.143,1.858,4.143,4.143    c0,2.284-1.858,4.143-4.143,4.143c-2.095,0-4.143-3.354-4.143-5.857C17,29.429,17.693,28.5,21.143,28.5 M46.857,27.5    c-2.84,0-5.143,2.302-5.143,5.143s2.303,5.143,5.143,5.143c2.84,0,5.143-4.017,5.143-6.857C52,28.088,49.697,27.5,46.857,27.5    L46.857,27.5z M21.143,27.5c-2.84,0-5.143,0.588-5.143,3.429c0,2.84,2.303,6.857,5.143,6.857c2.84,0,5.143-2.303,5.143-5.143    S23.983,27.5,21.143,27.5L21.143,27.5z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#FFEEA3;" d="M34,51c-1.3,0-2.534-0.498-3.477-1.403l-0.091-0.086l-0.119-0.034    C24.535,47.838,20.5,42.501,20.5,36.5V20.228c0-3.403,2.769-6.172,6.172-6.172h14.656c3.403,0,6.172,2.769,6.172,6.172V36.5    c0,6.001-4.035,11.338-9.813,12.977l-0.119,0.034l-0.091,0.086C36.534,50.502,35.3,51,34,51z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M41.328,14.556c3.128,0,5.672,2.545,5.672,5.672V36.5c0,5.779-3.886,10.918-9.449,12.496    l-0.24,0.068l-0.18,0.173C36.282,50.051,35.17,50.5,34,50.5s-2.282-0.449-3.131-1.263l-0.18-0.173l-0.24-0.068    C24.886,47.418,21,42.279,21,36.5V20.228c0-3.128,2.545-5.672,5.672-5.672H41.328 M41.328,13.556H26.672    c-3.685,0-6.672,2.987-6.672,6.672V36.5c0,6.405,4.306,11.793,10.177,13.458C31.17,50.911,32.515,51.5,34,51.5    s2.83-0.589,3.823-1.542C43.694,48.293,48,42.905,48,36.5V20.228C48,16.543,45.013,13.556,41.328,13.556L41.328,13.556z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#FFC49C;" d="M47.5,33v-8.5c0-6.66-5.292-8.458-5.346-8.476l-0.326-0.106l-0.217,0.267   C41.564,16.243,36.814,22,30,22c-0.521,0-1.062-0.017-1.608-0.033c-0.569-0.017-1.146-0.035-1.711-0.035   c-2.006,0-6.181,0-6.181,4.568V33h-0.218c-0.7-1.192-3.782-6.755-3.782-12.348C16.5,10.848,23.696,4,34,4   c6.472,0,9.527,5.675,9.557,5.732l0.119,0.226l0.253,0.037c5.166,0.74,7.571,4.396,7.571,11.505c0,5.077-3.073,10.359-3.776,11.5   H47.5z"/>
                            <g>
                                <path style="fill:#A16A4A;" d="M34,4.5c6.155,0,8.997,5.242,9.114,5.463l0.237,0.454l0.507,0.073C46.924,10.929,51,12.548,51,21.5    c0,3.895-1.872,7.936-3,10.018V24.5c0-3.644-1.526-5.878-2.807-7.111c-1.4-1.347-2.824-1.821-2.884-1.84l-0.653-0.211    l-0.433,0.532c-0.046,0.056-4.658,5.63-11.224,5.63c-0.516,0-1.052-0.016-1.594-0.033c-0.574-0.017-1.155-0.035-1.725-0.035    c-1.999,0-6.681,0-6.681,5.068v4.944c-1.132-2.203-3-6.489-3-10.792C17,11.142,23.991,4.5,34,4.5 M34,3.5    c-10.719,0-18,7.333-18,17.152c0,6.504,4,12.848,4,12.848h1c0,0,0-5.211,0-7c0-3.582,2.701-4.068,5.681-4.068    c1.109,0,2.257,0.067,3.319,0.067c7.146,0,12-5.999,12-5.999s5,1.626,5,8c0,1.968,0,9,0,9h1c0,0,4-6.073,4-12    c0-8.322-3.405-11.342-8-12C44,9.5,40.868,3.5,34,3.5L34,3.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#BAE0BD;" d="M62,80.5c-9.649,0-17.5-7.851-17.5-17.5S52.351,45.5,62,45.5S79.5,53.351,79.5,63   S71.649,80.5,62,80.5z"/>
                            <g>
                                <path style="fill:#5E9C76;" d="M62,46c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S52.626,46,62,46 M62,45    c-9.941,0-18,8.059-18,18s8.059,18,18,18s18-8.059,18-18S71.941,45,62,45L62,45z"/>
                            </g>
                        </g>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="62" y1="73.001" x2="62" y2="53.001"/>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="52" y1="63.001" x2="72" y2="63.001"/>
                    </svg>
                </button>
            </form>
            <form class="mt-2 mr-14 inline-block items-center" method="post" action="{{route('sauvegarderJoueurTitul',[$matches->id,$adom])}}">
                @csrf

                <div class="inline-flex">
                    <button class="bg-transparent hover:bg-gray-500 py-1 px-2 border border-gray-500 hover:border-transparent rounded" type="submit" name="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve" width="20" height="25">
                            <g>
                                <path style="fill:#C2E8FF;" d="M4.506,73C4.778,61.375,14.54,52,26.5,52h15c11.96,0,21.722,9.375,21.994,21H4.506z"/>
                                <g>
                                    <path style="fill:#7496C4;" d="M41.5,52.5c11.512,0,20.94,8.883,21.476,20l-57.952,0c0.536-11.117,9.964-20,21.476-20H41.5     M41.5,51.5h-15C14.074,51.5,4,61.35,4,73.5v0h60v0C64,61.35,53.926,51.5,41.5,51.5L41.5,51.5z"/>
                                </g>
                            </g>
                            <g>
                                <path style="fill:#E8D47B;" d="M34,59c-6.685,0-9.192-5.859-9.5-6.648V40.819h19v11.533C43.192,53.141,40.685,59,34,59z"/>
                                <path style="fill:#BA9B48;" d="M43,41.319v10.936c-0.407,0.994-2.849,6.245-9,6.245c-6.154,0-8.596-5.257-9-6.245V41.319H43    M44,40.319H24v12.124c0,0,2.534,7.057,10,7.057s10-7.057,10-7.057V40.319L44,40.319z"/>
                            </g>
                            <g>
                                <g>
                                    <path style="fill:#E8D47B;" d="M46.857,37.286c-2.561,0-4.644-2.083-4.644-4.643S44.297,28,46.857,28    c3.298,0,4.643,0.849,4.643,2.929C51.5,33.439,49.42,37.286,46.857,37.286z M21.143,37.286c-2.562,0-4.643-3.847-4.643-6.357    c0-2.08,1.345-2.929,4.643-2.929c2.561,0,4.644,2.083,4.644,4.643S23.703,37.286,21.143,37.286z"/>
                                </g>
                                <g>
                                    <path style="fill:#BA9B48;" d="M46.857,28.5c3.45,0,4.143,0.929,4.143,2.429c0,2.503-2.048,5.857-4.143,5.857    c-2.284,0-4.143-1.858-4.143-4.143C42.714,30.358,44.573,28.5,46.857,28.5 M21.143,28.5c2.284,0,4.143,1.858,4.143,4.143    c0,2.284-1.858,4.143-4.143,4.143c-2.095,0-4.143-3.354-4.143-5.857C17,29.429,17.693,28.5,21.143,28.5 M46.857,27.5    c-2.84,0-5.143,2.302-5.143,5.143s2.303,5.143,5.143,5.143c2.84,0,5.143-4.017,5.143-6.857C52,28.088,49.697,27.5,46.857,27.5    L46.857,27.5z M21.143,27.5c-2.84,0-5.143,0.588-5.143,3.429c0,2.84,2.303,6.857,5.143,6.857c2.84,0,5.143-2.303,5.143-5.143    S23.983,27.5,21.143,27.5L21.143,27.5z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path style="fill:#FFEEA3;" d="M34,51c-1.3,0-2.534-0.498-3.477-1.403l-0.091-0.086l-0.119-0.034    C24.535,47.838,20.5,42.501,20.5,36.5V20.228c0-3.403,2.769-6.172,6.172-6.172h14.656c3.403,0,6.172,2.769,6.172,6.172V36.5    c0,6.001-4.035,11.338-9.813,12.977l-0.119,0.034l-0.091,0.086C36.534,50.502,35.3,51,34,51z"/>
                                </g>
                                <g>
                                    <path style="fill:#BA9B48;" d="M41.328,14.556c3.128,0,5.672,2.545,5.672,5.672V36.5c0,5.779-3.886,10.918-9.449,12.496    l-0.24,0.068l-0.18,0.173C36.282,50.051,35.17,50.5,34,50.5s-2.282-0.449-3.131-1.263l-0.18-0.173l-0.24-0.068    C24.886,47.418,21,42.279,21,36.5V20.228c0-3.128,2.545-5.672,5.672-5.672H41.328 M41.328,13.556H26.672    c-3.685,0-6.672,2.987-6.672,6.672V36.5c0,6.405,4.306,11.793,10.177,13.458C31.17,50.911,32.515,51.5,34,51.5    s2.83-0.589,3.823-1.542C43.694,48.293,48,42.905,48,36.5V20.228C48,16.543,45.013,13.556,41.328,13.556L41.328,13.556z"/>
                                </g>
                            </g>
                            <g>
                                <path style="fill:#FFC49C;" d="M47.5,33v-8.5c0-6.66-5.292-8.458-5.346-8.476l-0.326-0.106l-0.217,0.267   C41.564,16.243,36.814,22,30,22c-0.521,0-1.062-0.017-1.608-0.033c-0.569-0.017-1.146-0.035-1.711-0.035   c-2.006,0-6.181,0-6.181,4.568V33h-0.218c-0.7-1.192-3.782-6.755-3.782-12.348C16.5,10.848,23.696,4,34,4   c6.472,0,9.527,5.675,9.557,5.732l0.119,0.226l0.253,0.037c5.166,0.74,7.571,4.396,7.571,11.505c0,5.077-3.073,10.359-3.776,11.5   H47.5z"/>
                                <g>
                                    <path style="fill:#A16A4A;" d="M34,4.5c6.155,0,8.997,5.242,9.114,5.463l0.237,0.454l0.507,0.073C46.924,10.929,51,12.548,51,21.5    c0,3.895-1.872,7.936-3,10.018V24.5c0-3.644-1.526-5.878-2.807-7.111c-1.4-1.347-2.824-1.821-2.884-1.84l-0.653-0.211    l-0.433,0.532c-0.046,0.056-4.658,5.63-11.224,5.63c-0.516,0-1.052-0.016-1.594-0.033c-0.574-0.017-1.155-0.035-1.725-0.035    c-1.999,0-6.681,0-6.681,5.068v4.944c-1.132-2.203-3-6.489-3-10.792C17,11.142,23.991,4.5,34,4.5 M34,3.5    c-10.719,0-18,7.333-18,17.152c0,6.504,4,12.848,4,12.848h1c0,0,0-5.211,0-7c0-3.582,2.701-4.068,5.681-4.068    c1.109,0,2.257,0.067,3.319,0.067c7.146,0,12-5.999,12-5.999s5,1.626,5,8c0,1.968,0,9,0,9h1c0,0,4-6.073,4-12    c0-8.322-3.405-11.342-8-12C44,9.5,40.868,3.5,34,3.5L34,3.5z"/>
                                </g>
                            </g>
                            <g>
                                <path style="fill:#BAE0BD;" d="M62,80.5c-9.649,0-17.5-7.851-17.5-17.5S52.351,45.5,62,45.5S79.5,53.351,79.5,63   S71.649,80.5,62,80.5z"/>
                                <g>
                                    <path style="fill:#5E9C76;" d="M62,46c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S52.626,46,62,46 M62,45    c-9.941,0-18,8.059-18,18s8.059,18,18,18s18-8.059,18-18S71.941,45,62,45L62,45z"/>
                                </g>
                            </g>
                            <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="62" y1="73.001" x2="62" y2="53.001"/>
                            <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="52" y1="63.001" x2="72" y2="63.001"/>
                        </svg>
                    </button>
                    <select name="joueur" class="py-1">
                        <option value="">--selectionner les milieux--</option>
                        @if ($effectifs->count() > 0)
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->poste == 'Milieu de terrain')
                                    <div class="py-1">
                                        @if ($effectif->club == $aext)
                                            <option value="{{$effectif->id}}">
                                                <span>{{ $effectif->numero }}</span>
                                                <span class="font-bold">{{ $effectif->prenom }}</span>
                                                <span class="font-bold">{{ $effectif->nom }}</span>
                                            </option>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <span class="mt-4">Pas de joueur</span>
                        @endif
                    </select>
                </div>
            </form>
        </div>

        <div class="mt-8 flex justify-center text-1xl text-blue-900 underline font-bold mb-2">Attaquant</div>
        <div class="block">
            <div class="flex justify-between">
                <div class="grid grid-flow-row auto-rows-max">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Attaquant'))
                                @if ($effectif->club == $adom)
                                    <div class="ml-14 inline-flex space-x-2 items-center">
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                        <a href="{{ route('deleteTitulaire',$titulaire->id) }}">
                                            <svg width="15px" height="15px" viewBox="0 0 29 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <!-- Generator: Sketch 44.1 (41455) - http://www.bohemiancoding.com/sketch -->
                                                <title>delete player</title>
                                                <defs></defs>
                                                <g id="Page-2-Copy" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="178" stroke="#979797" transform="translate(-3.000000, 0.000000)">
                                                        <path d="M26.0523906,27.0654225 L21.8426586,31.2751545 C21.4586565,31.6591566 20.8247306,31.6599176 20.4342063,31.2693933 C20.0409593,30.8761463 20.0428749,30.2465111 20.4324036,29.8569823 L24.638177,25.6512089 L20.3937337,21.4067656 C20.0017565,21.0147883 20.0050121,20.384879 20.3955364,19.9943547 C20.7887833,19.6011077 21.4189786,19.6035834 21.8091982,19.9938029 L22.8397676,21.0243724 L26.0523906,24.2369954 L30.2968339,19.9925521 C30.6888112,19.6005748 31.3187206,19.6038304 31.7092449,19.9943547 C32.1024918,20.3876016 32.1000162,21.0177969 31.7097966,21.4080165 L30.6792271,22.438586 L27.4666042,25.6512089 L31.6763361,29.8609409 C32.0603383,30.244943 32.0610992,30.878869 31.670575,31.2693933 C31.277328,31.6626402 30.6476927,31.6607246 30.258164,31.2711959 L26.0523906,27.0654225 L26.0523906,27.0654225 Z" id="Rectangle-348" stroke="none" fill="#2A2630" fill-rule="evenodd"></path>
                                                        <path d="M16.0016135,14 C8.83504285,14 3,19.6024712 3,26.5208645 L3,31 C3,31.5522847 3.44771525,32 4,32 C4.55228475,32 5,31.5522847 5,31 L5,26.5208645 C5,20.7256497 9.92182241,16 16.0016135,16 C17.3223103,16 18.6094757,16.2222643 19.8203399,16.651035 C20.340949,16.8353842 20.9124306,16.5627918 21.0967799,16.0421827 C21.2811291,15.5215737 21.0085367,14.950092 20.4879276,14.7657428 C19.0632005,14.2612426 17.5503059,14 16.0016135,14 L16.0016135,14 Z M23,7 C23,3.13400675 19.8659932,0 16,0 C12.1340068,0 9,3.13400675 9,7 C9,10.8659932 12.1340068,14 16,14 C19.8659932,14 23,10.8659932 23,7 L23,7 Z M11,7 C11,4.23857625 13.2385763,2 16,2 C18.7614237,2 21,4.23857625 21,7 C21,9.76142375 18.7614237,12 16,12 C13.2385763,12 11,9.76142375 11,7 L11,7 Z" id="Rectangle-875" stroke="none" fill="#95909E" fill-rule="nonzero"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>

                <div class="grid grid-flow-row auto-rows-max">
                    @foreach ($titulaires as $titulaire)
                        @foreach ($effectifs as $effectif)
                            @if (($titulaire->joueur_id == $effectif->id) && ($effectif->poste == 'Attaquant'))
                                @if ($effectif->club == $aext)
                                    <div class="flex justify-end mr-14 inline-flex space-x-2 items-center">
                                        <a href="{{ route('deleteTitulaire',$titulaire->id) }}">
                                            <svg width="15px" height="15px" viewBox="0 0 29 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <!-- Generator: Sketch 44.1 (41455) - http://www.bohemiancoding.com/sketch -->
                                                <title>delete player</title>
                                                <defs></defs>
                                                <g id="Page-2-Copy" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="178" stroke="#979797" transform="translate(-3.000000, 0.000000)">
                                                        <path d="M26.0523906,27.0654225 L21.8426586,31.2751545 C21.4586565,31.6591566 20.8247306,31.6599176 20.4342063,31.2693933 C20.0409593,30.8761463 20.0428749,30.2465111 20.4324036,29.8569823 L24.638177,25.6512089 L20.3937337,21.4067656 C20.0017565,21.0147883 20.0050121,20.384879 20.3955364,19.9943547 C20.7887833,19.6011077 21.4189786,19.6035834 21.8091982,19.9938029 L22.8397676,21.0243724 L26.0523906,24.2369954 L30.2968339,19.9925521 C30.6888112,19.6005748 31.3187206,19.6038304 31.7092449,19.9943547 C32.1024918,20.3876016 32.1000162,21.0177969 31.7097966,21.4080165 L30.6792271,22.438586 L27.4666042,25.6512089 L31.6763361,29.8609409 C32.0603383,30.244943 32.0610992,30.878869 31.670575,31.2693933 C31.277328,31.6626402 30.6476927,31.6607246 30.258164,31.2711959 L26.0523906,27.0654225 L26.0523906,27.0654225 Z" id="Rectangle-348" stroke="none" fill="#2A2630" fill-rule="evenodd"></path>
                                                        <path d="M16.0016135,14 C8.83504285,14 3,19.6024712 3,26.5208645 L3,31 C3,31.5522847 3.44771525,32 4,32 C4.55228475,32 5,31.5522847 5,31 L5,26.5208645 C5,20.7256497 9.92182241,16 16.0016135,16 C17.3223103,16 18.6094757,16.2222643 19.8203399,16.651035 C20.340949,16.8353842 20.9124306,16.5627918 21.0967799,16.0421827 C21.2811291,15.5215737 21.0085367,14.950092 20.4879276,14.7657428 C19.0632005,14.2612426 17.5503059,14 16.0016135,14 L16.0016135,14 Z M23,7 C23,3.13400675 19.8659932,0 16,0 C12.1340068,0 9,3.13400675 9,7 C9,10.8659932 12.1340068,14 16,14 C19.8659932,14 23,10.8659932 23,7 L23,7 Z M11,7 C11,4.23857625 13.2385763,2 16,2 C18.7614237,2 21,4.23857625 21,7 C21,9.76142375 18.7614237,12 16,12 C13.2385763,12 11,9.76142375 11,7 L11,7 Z" id="Rectangle-875" stroke="none" fill="#95909E" fill-rule="nonzero"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                        <span>{{ $effectif->numero }}</span>
                                        <span class="font-bold">{{ $effectif->prenom }}</span>
                                        <span class="font-bold">{{ $effectif->nom }}</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="block flex justify-between">
            <form class="mt-2 ml-14 inline-block items-center" method="post" action="{{route('sauvegarderJoueurTitul',[$matches->id,$adom])}}">
                @csrf

                <div class="inline-flex">
                    <select name="joueur" class="py-1">
                        <option value="">--selectionner les attaquants--</option>
                        @if ($effectifs->count() > 0)
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->poste == 'Attaquant')
                                    <div class="py-1">
                                        @if ($effectif->club == $adom)
                                            <option value="{{$effectif->id}}">
                                                <span>{{ $effectif->numero }}</span>
                                                <span class="font-bold">{{ $effectif->prenom }}</span>
                                                <span class="font-bold">{{ $effectif->nom }}</span>
                                            </option>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <span class="mt-4">Pas de joueur</span>
                        @endif
                    </select>
                </div>

                <button class="bg-transparent hover:bg-gray-500 py-1 px-2 border border-gray-500 hover:border-transparent rounded" type="submit" name="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve" width="20" height="25">
                        <g>
                            <path style="fill:#C2E8FF;" d="M4.506,73C4.778,61.375,14.54,52,26.5,52h15c11.96,0,21.722,9.375,21.994,21H4.506z"/>
                            <g>
                                <path style="fill:#7496C4;" d="M41.5,52.5c11.512,0,20.94,8.883,21.476,20l-57.952,0c0.536-11.117,9.964-20,21.476-20H41.5     M41.5,51.5h-15C14.074,51.5,4,61.35,4,73.5v0h60v0C64,61.35,53.926,51.5,41.5,51.5L41.5,51.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#E8D47B;" d="M34,59c-6.685,0-9.192-5.859-9.5-6.648V40.819h19v11.533C43.192,53.141,40.685,59,34,59z"/>
                            <path style="fill:#BA9B48;" d="M43,41.319v10.936c-0.407,0.994-2.849,6.245-9,6.245c-6.154,0-8.596-5.257-9-6.245V41.319H43    M44,40.319H24v12.124c0,0,2.534,7.057,10,7.057s10-7.057,10-7.057V40.319L44,40.319z"/>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#E8D47B;" d="M46.857,37.286c-2.561,0-4.644-2.083-4.644-4.643S44.297,28,46.857,28    c3.298,0,4.643,0.849,4.643,2.929C51.5,33.439,49.42,37.286,46.857,37.286z M21.143,37.286c-2.562,0-4.643-3.847-4.643-6.357    c0-2.08,1.345-2.929,4.643-2.929c2.561,0,4.644,2.083,4.644,4.643S23.703,37.286,21.143,37.286z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M46.857,28.5c3.45,0,4.143,0.929,4.143,2.429c0,2.503-2.048,5.857-4.143,5.857    c-2.284,0-4.143-1.858-4.143-4.143C42.714,30.358,44.573,28.5,46.857,28.5 M21.143,28.5c2.284,0,4.143,1.858,4.143,4.143    c0,2.284-1.858,4.143-4.143,4.143c-2.095,0-4.143-3.354-4.143-5.857C17,29.429,17.693,28.5,21.143,28.5 M46.857,27.5    c-2.84,0-5.143,2.302-5.143,5.143s2.303,5.143,5.143,5.143c2.84,0,5.143-4.017,5.143-6.857C52,28.088,49.697,27.5,46.857,27.5    L46.857,27.5z M21.143,27.5c-2.84,0-5.143,0.588-5.143,3.429c0,2.84,2.303,6.857,5.143,6.857c2.84,0,5.143-2.303,5.143-5.143    S23.983,27.5,21.143,27.5L21.143,27.5z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#FFEEA3;" d="M34,51c-1.3,0-2.534-0.498-3.477-1.403l-0.091-0.086l-0.119-0.034    C24.535,47.838,20.5,42.501,20.5,36.5V20.228c0-3.403,2.769-6.172,6.172-6.172h14.656c3.403,0,6.172,2.769,6.172,6.172V36.5    c0,6.001-4.035,11.338-9.813,12.977l-0.119,0.034l-0.091,0.086C36.534,50.502,35.3,51,34,51z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M41.328,14.556c3.128,0,5.672,2.545,5.672,5.672V36.5c0,5.779-3.886,10.918-9.449,12.496    l-0.24,0.068l-0.18,0.173C36.282,50.051,35.17,50.5,34,50.5s-2.282-0.449-3.131-1.263l-0.18-0.173l-0.24-0.068    C24.886,47.418,21,42.279,21,36.5V20.228c0-3.128,2.545-5.672,5.672-5.672H41.328 M41.328,13.556H26.672    c-3.685,0-6.672,2.987-6.672,6.672V36.5c0,6.405,4.306,11.793,10.177,13.458C31.17,50.911,32.515,51.5,34,51.5    s2.83-0.589,3.823-1.542C43.694,48.293,48,42.905,48,36.5V20.228C48,16.543,45.013,13.556,41.328,13.556L41.328,13.556z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#FFC49C;" d="M47.5,33v-8.5c0-6.66-5.292-8.458-5.346-8.476l-0.326-0.106l-0.217,0.267   C41.564,16.243,36.814,22,30,22c-0.521,0-1.062-0.017-1.608-0.033c-0.569-0.017-1.146-0.035-1.711-0.035   c-2.006,0-6.181,0-6.181,4.568V33h-0.218c-0.7-1.192-3.782-6.755-3.782-12.348C16.5,10.848,23.696,4,34,4   c6.472,0,9.527,5.675,9.557,5.732l0.119,0.226l0.253,0.037c5.166,0.74,7.571,4.396,7.571,11.505c0,5.077-3.073,10.359-3.776,11.5   H47.5z"/>
                            <g>
                                <path style="fill:#A16A4A;" d="M34,4.5c6.155,0,8.997,5.242,9.114,5.463l0.237,0.454l0.507,0.073C46.924,10.929,51,12.548,51,21.5    c0,3.895-1.872,7.936-3,10.018V24.5c0-3.644-1.526-5.878-2.807-7.111c-1.4-1.347-2.824-1.821-2.884-1.84l-0.653-0.211    l-0.433,0.532c-0.046,0.056-4.658,5.63-11.224,5.63c-0.516,0-1.052-0.016-1.594-0.033c-0.574-0.017-1.155-0.035-1.725-0.035    c-1.999,0-6.681,0-6.681,5.068v4.944c-1.132-2.203-3-6.489-3-10.792C17,11.142,23.991,4.5,34,4.5 M34,3.5    c-10.719,0-18,7.333-18,17.152c0,6.504,4,12.848,4,12.848h1c0,0,0-5.211,0-7c0-3.582,2.701-4.068,5.681-4.068    c1.109,0,2.257,0.067,3.319,0.067c7.146,0,12-5.999,12-5.999s5,1.626,5,8c0,1.968,0,9,0,9h1c0,0,4-6.073,4-12    c0-8.322-3.405-11.342-8-12C44,9.5,40.868,3.5,34,3.5L34,3.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#BAE0BD;" d="M62,80.5c-9.649,0-17.5-7.851-17.5-17.5S52.351,45.5,62,45.5S79.5,53.351,79.5,63   S71.649,80.5,62,80.5z"/>
                            <g>
                                <path style="fill:#5E9C76;" d="M62,46c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S52.626,46,62,46 M62,45    c-9.941,0-18,8.059-18,18s8.059,18,18,18s18-8.059,18-18S71.941,45,62,45L62,45z"/>
                            </g>
                        </g>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="62" y1="73.001" x2="62" y2="53.001"/>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="52" y1="63.001" x2="72" y2="63.001"/>
                    </svg>
                </button>
            </form>
            <form class="mt-2 mr-14 inline-block items-center" method="post" action="{{route('sauvegarderJoueurTitul',[$matches->id,$adom])}}">
                @csrf

                <button class="bg-transparent hover:bg-gray-500 py-1 px-2 border border-gray-500 hover:border-transparent rounded" type="submit" name="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve" width="20" height="25">
                        <g>
                            <path style="fill:#C2E8FF;" d="M4.506,73C4.778,61.375,14.54,52,26.5,52h15c11.96,0,21.722,9.375,21.994,21H4.506z"/>
                            <g>
                                <path style="fill:#7496C4;" d="M41.5,52.5c11.512,0,20.94,8.883,21.476,20l-57.952,0c0.536-11.117,9.964-20,21.476-20H41.5     M41.5,51.5h-15C14.074,51.5,4,61.35,4,73.5v0h60v0C64,61.35,53.926,51.5,41.5,51.5L41.5,51.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#E8D47B;" d="M34,59c-6.685,0-9.192-5.859-9.5-6.648V40.819h19v11.533C43.192,53.141,40.685,59,34,59z"/>
                            <path style="fill:#BA9B48;" d="M43,41.319v10.936c-0.407,0.994-2.849,6.245-9,6.245c-6.154,0-8.596-5.257-9-6.245V41.319H43    M44,40.319H24v12.124c0,0,2.534,7.057,10,7.057s10-7.057,10-7.057V40.319L44,40.319z"/>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#E8D47B;" d="M46.857,37.286c-2.561,0-4.644-2.083-4.644-4.643S44.297,28,46.857,28    c3.298,0,4.643,0.849,4.643,2.929C51.5,33.439,49.42,37.286,46.857,37.286z M21.143,37.286c-2.562,0-4.643-3.847-4.643-6.357    c0-2.08,1.345-2.929,4.643-2.929c2.561,0,4.644,2.083,4.644,4.643S23.703,37.286,21.143,37.286z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M46.857,28.5c3.45,0,4.143,0.929,4.143,2.429c0,2.503-2.048,5.857-4.143,5.857    c-2.284,0-4.143-1.858-4.143-4.143C42.714,30.358,44.573,28.5,46.857,28.5 M21.143,28.5c2.284,0,4.143,1.858,4.143,4.143    c0,2.284-1.858,4.143-4.143,4.143c-2.095,0-4.143-3.354-4.143-5.857C17,29.429,17.693,28.5,21.143,28.5 M46.857,27.5    c-2.84,0-5.143,2.302-5.143,5.143s2.303,5.143,5.143,5.143c2.84,0,5.143-4.017,5.143-6.857C52,28.088,49.697,27.5,46.857,27.5    L46.857,27.5z M21.143,27.5c-2.84,0-5.143,0.588-5.143,3.429c0,2.84,2.303,6.857,5.143,6.857c2.84,0,5.143-2.303,5.143-5.143    S23.983,27.5,21.143,27.5L21.143,27.5z"/>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path style="fill:#FFEEA3;" d="M34,51c-1.3,0-2.534-0.498-3.477-1.403l-0.091-0.086l-0.119-0.034    C24.535,47.838,20.5,42.501,20.5,36.5V20.228c0-3.403,2.769-6.172,6.172-6.172h14.656c3.403,0,6.172,2.769,6.172,6.172V36.5    c0,6.001-4.035,11.338-9.813,12.977l-0.119,0.034l-0.091,0.086C36.534,50.502,35.3,51,34,51z"/>
                            </g>
                            <g>
                                <path style="fill:#BA9B48;" d="M41.328,14.556c3.128,0,5.672,2.545,5.672,5.672V36.5c0,5.779-3.886,10.918-9.449,12.496    l-0.24,0.068l-0.18,0.173C36.282,50.051,35.17,50.5,34,50.5s-2.282-0.449-3.131-1.263l-0.18-0.173l-0.24-0.068    C24.886,47.418,21,42.279,21,36.5V20.228c0-3.128,2.545-5.672,5.672-5.672H41.328 M41.328,13.556H26.672    c-3.685,0-6.672,2.987-6.672,6.672V36.5c0,6.405,4.306,11.793,10.177,13.458C31.17,50.911,32.515,51.5,34,51.5    s2.83-0.589,3.823-1.542C43.694,48.293,48,42.905,48,36.5V20.228C48,16.543,45.013,13.556,41.328,13.556L41.328,13.556z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#FFC49C;" d="M47.5,33v-8.5c0-6.66-5.292-8.458-5.346-8.476l-0.326-0.106l-0.217,0.267   C41.564,16.243,36.814,22,30,22c-0.521,0-1.062-0.017-1.608-0.033c-0.569-0.017-1.146-0.035-1.711-0.035   c-2.006,0-6.181,0-6.181,4.568V33h-0.218c-0.7-1.192-3.782-6.755-3.782-12.348C16.5,10.848,23.696,4,34,4   c6.472,0,9.527,5.675,9.557,5.732l0.119,0.226l0.253,0.037c5.166,0.74,7.571,4.396,7.571,11.505c0,5.077-3.073,10.359-3.776,11.5   H47.5z"/>
                            <g>
                                <path style="fill:#A16A4A;" d="M34,4.5c6.155,0,8.997,5.242,9.114,5.463l0.237,0.454l0.507,0.073C46.924,10.929,51,12.548,51,21.5    c0,3.895-1.872,7.936-3,10.018V24.5c0-3.644-1.526-5.878-2.807-7.111c-1.4-1.347-2.824-1.821-2.884-1.84l-0.653-0.211    l-0.433,0.532c-0.046,0.056-4.658,5.63-11.224,5.63c-0.516,0-1.052-0.016-1.594-0.033c-0.574-0.017-1.155-0.035-1.725-0.035    c-1.999,0-6.681,0-6.681,5.068v4.944c-1.132-2.203-3-6.489-3-10.792C17,11.142,23.991,4.5,34,4.5 M34,3.5    c-10.719,0-18,7.333-18,17.152c0,6.504,4,12.848,4,12.848h1c0,0,0-5.211,0-7c0-3.582,2.701-4.068,5.681-4.068    c1.109,0,2.257,0.067,3.319,0.067c7.146,0,12-5.999,12-5.999s5,1.626,5,8c0,1.968,0,9,0,9h1c0,0,4-6.073,4-12    c0-8.322-3.405-11.342-8-12C44,9.5,40.868,3.5,34,3.5L34,3.5z"/>
                            </g>
                        </g>
                        <g>
                            <path style="fill:#BAE0BD;" d="M62,80.5c-9.649,0-17.5-7.851-17.5-17.5S52.351,45.5,62,45.5S79.5,53.351,79.5,63   S71.649,80.5,62,80.5z"/>
                            <g>
                                <path style="fill:#5E9C76;" d="M62,46c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S52.626,46,62,46 M62,45    c-9.941,0-18,8.059-18,18s8.059,18,18,18s18-8.059,18-18S71.941,45,62,45L62,45z"/>
                            </g>
                        </g>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="62" y1="73.001" x2="62" y2="53.001"/>
                        <line style="fill:none;stroke:#FFFFFF;stroke-width:4;stroke-miterlimit:10;" x1="52" y1="63.001" x2="72" y2="63.001"/>
                    </svg>
                </button>
                <div class="inline-flex">
                    <select name="joueur" class="py-1">
                        <option value="">--selectionner les attaquants--</option>
                        @if ($effectifs->count() > 0)
                            @foreach ($effectifs as $effectif)
                                @if ($effectif->poste == 'Attaquant')
                                    <div class="py-1">
                                        @if ($effectif->club == $aext)
                                            <option value="{{$effectif->id}}">
                                                <span>{{ $effectif->numero }}</span>
                                                <span class="font-bold">{{ $effectif->prenom }}</span>
                                                <span class="font-bold">{{ $effectif->nom }}</span>
                                            </option>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <span class="mt-4">Pas de joueur</span>
                        @endif
                    </select>
                </div>
            </form>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
