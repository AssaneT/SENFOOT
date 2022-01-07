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



    $championnat_nom = "null";

    $ok = 0;

    $begin = new DateTime(date('Y-m-d'));
    $end   = new DateTime("2022-01-01");
    $date;
    $date_match;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">   <!-- renvoie les fichiers css qui se trouve dans public -->
    <style>
        .carousel-open:checked + .carousel-item {
            position: static;
            opacity: 100;
        }
        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }
        #carousel-1:checked ~ .control-1,
        #carousel-2:checked ~ .control-2,
        #carousel-3:checked ~ .control-3 {
            display: block;
        }
        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }
        #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #2b6cb0;  /*Set to match the Tailwind colour you want the active one to be */
        }
    </style>
</head>
<body>

    @include('partiels.navBar')

    <div class="carousel relative shadow-2xl bg-white">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:70vh;">
                <div class="bg-cover bg-no-repeat w-full h-full" style="background-image: url({{ asset('images/imag1.jpg') }})">
                    <div class="absolute inset-x-6 top-6 text-white text-4xl">Un nouveau ballon pour le championnat</div>
                </div>
            </div>
            <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:70vh;">
                <div class="bg-cover bg-no-repeat w-full h-full" style="background-image: url({{ asset('images/img6.png') }})">
                    <div class="absolute inset-x-6 top-6 text-white text-4xl">JANT BI vs ZOU FC s'est terminé par un match nul</div>
                </div>
            </div>
            <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:70vh;">
                <div class="bg-cover bg-no-repeat w-full h-full" style="background-image: url({{ asset('images/img3.jpg') }})">
                    <div class="absolute inset-x-6 top-6 text-white text-4xl">There</div>
                </div>
            </div>
            <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                </li>
            </ol>

        </div>
    </div>

    @php
        $ok = 0;
    @endphp

    <div class="w-full inline-flex bg-white">
        <div class="w-2/5">
            @if ($matches->count() > 0)
                <div class="w-80 py-3 ml-6 text-gray-800 text-2xl mt-4"><span class="flex justify-center">MATCH A VENIR</span></div>
                @for ($i = $begin; $i <= $end; $i->modify('+1 day'))
                    @foreach ($matches as $matche)
                        @php
                            $date = new DateTime($matche->datematch);

                            $date_now = date('Y-m-d H:i:s', time());
                            $date_prevu_match = $matche->datematch." ".$matche->heurematch;
                            $date_fin_match = date('Y-m-d H:i:s',strtotime("+2 hours", strtotime($date_prevu_match)));
                        @endphp

                        @if (($i == $date) && ($date_now <= $date_fin_match))
                            <div class="flex justify-between w-80 py-1 ml-6 rounded-lg text-2xl bg-gray-800 text-white">
                                <span class="ml-4">@php echo strftime("%a $format_jour %b %Y", strtotime($matche->datematch)); @endphp</span>
                                {{--<span class="mr-4">@php echo $championnat_nom; @endphp</span>--}}
                            </div>
                            @foreach ($matches as $matc)
                                @php
                                    $date_match = new DateTime($matc->datematch);
                                @endphp
                                @if ($date == $date_match)
                                        @php
                                            $ok = 1;   //pour confirmer qu'il y'a match
                                        @endphp
                                        {{--@foreach ($championnats as $championnat)
                                            @if ($championnat->id == $matc->championnat_id)
                                                @php
                                                    $championnat_nom = $championnat->nomchampionnat;
                                                @endphp
                                            @endif
                                        @endforeach --}}

                                        <div class="flex justify-start">
                                            <div class="px-10 py-2 ml-10 border border-gray-300 flex items-center justify-center bg-purple-100 hover:bg-blue-100">
                                                <span class="mr-1 text-1xl font-bold uppercase text-gray-800">{{ $matc->equipedom }}</span>
                                                @foreach ($equipes as $equipe)
                                                    @if ($equipe->nomequipe == $matc->equipedom)
                                                        <img class="object-scale-down w-8 h-8" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                                    @endif
                                                @endforeach
                                                <span class="box-border h-15 w-30 px-3 py-1 border bg-white text-black mr-4 ml-4">@php echo date("H:i", strtotime($matc->heurematch)); @endphp</span>
                                                @foreach ($equipes as $equipe)
                                                    @if ($equipe->nomequipe == $matc->equipeadv)
                                                        <img class="object-scale-down w-8 h-8" src="http://localhost/SEN_FOOT/storage/app/public/{{ $equipe->logo }}">
                                                    @endif
                                                @endforeach
                                                <span class="ml-1 text-1xl font-bold uppercase text-gray-800">{{ $matc->equipeadv }}</span>
                                                <div class="ml-6 flex justify-end">
                                                    <a href="{{ route('infoMatch',$matc->id) }}">
                                                        <div class="w-2 transform hover:text-blue-500 hover:scale-110">
                                                            <svg class="stroke-current text-blue-700" height="20pt" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                            @endforeach
                            @break
                        @endif
                    @endforeach
                @endfor
            @endif
        </div>

        <div class="w-3/5 mt-2 space-x-5 space-y-5 mr-8">
            <div class="py-3 text-gray-800 text-2xl"><span class="flex justify-center">ACTUALITE</span></div>
            <a href="#" class="inline-block box-border h-80 w-60 p-6 bg-gray-100 border-2 border-gray-700">
                <img class="object-scale-down w-60 h-48" src="http://localhost/SEN_FOOT/public/images/ballon.jpg">
                <div class="mb-1 italic">
                    l'incroyable but marquait par Papa Demba
                </div>
            </a>

            <a href="#" class="inline-block box-border h-80 w-60 p-6 bg-gray-100 border-2 border-gray-700">
                <img class="object-scale-down w-60 h-48" src="http://localhost/SEN_FOOT/public/images/foot/image4.jpg">
                <div class="mb-1 italic">
                    l'incroyable but marquait par Papa Demba
                </div>
            </a>

            <a href="#" class="inline-block box-border h-80 w-60 p-6 bg-gray-100 border-2 border-gray-700">
                <img class="object-scale-down w-60 h-48" src="http://localhost/SEN_FOOT/public/images/foot/image1.jpg">
                <div class="italic">
                    ASSANEFC vs ASCNABOU finit par un match nul
                </div>
            </a>

            <a href="#" class="inline-block box-border h-80 w-60 p-6 bg-gray-100 border-2 border-gray-700">
                <img class="object-scale-down w-60 h-48" src="http://localhost/SEN_FOOT/public/images/foot/image9.jpg">
                <div class="italic">
                    victoire du FC GOSSAS sur DEGGO : 2 - 0
                </div>
            </a>

            <a href="#" class="inline-block box-border h-80 w-60 p-6 bg-gray-100 border-2 border-gray-700">
                <img class="object-scale-down w-60 h-48" src="http://localhost/SEN_FOOT/public/images/foot/image10.jpg">
                <div class="italic">
                    Abdoulaye meilleur joueur de la saison 2020/2021
                </div>
            </a>

            <a href="#" class="inline-block box-border h-80 w-60 p-6 bg-gray-100 border-2 border-gray-700">
                <img class="object-scale-down w-60 h-48" src="http://localhost/SEN_FOOT/public/images/foot/image6.jpg">
                <div class="italic">
                    Le 12e gaindé toujours derrière les lions
                </div>
            </a>

            <a href="#" class="inline-block box-border h-80 w-60 p-6 bg-gray-100 border-2 border-gray-700">
                <img class="object-scale-down w-60 h-48" src="http://localhost/SEN_FOOT/public/images/foot/image8.jpg">
                <div class="italic">
                    La composition d'équipe de DEGGO sans Mendy
                </div>
            </a>

            <a href="#" class="inline-block box-border h-80 w-60 p-6 bg-gray-100 border-2 border-gray-700">
                <img class="object-scale-down w-60 h-48" src="http://localhost/SEN_FOOT/public/images/foot/image5.jpg">
                <div class="italic text-center">
                    Aly NIANG meilleur dribleur de la saison20/21
                </div>
            </a>

            <a href="#" class="inline-block box-border h-80 w-60 p-6 bg-gray-100 border-2 border-gray-700">
                <img class="object-scale-down w-60 h-48" src="http://localhost/SEN_FOOT/public/images/foot/image3.jpg">
                <div class="italic text-center">
                    match fou entre OUAKAM FC vs CHELSEA SN
                </div>
            </a>
        </div>
    </div>

    @if ($ok == 0)
        <div class="text-center text-gray-500 text-2xl mt-5">
            <span>Pas de match disponible</span>
        </div>
    @endif

    <section class="container mx-auto text-center py-6 mb-12">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
            SEN FOOT
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <h3 class="my-4 text-3xl leading-tight">
            Vivez le, pour de vrai !
        </h3>
    </section>
    <!--Footer-->
    <footer class="bg-blue-100">
        <div class="container mx-auto px-8">
            <div class="w-full flex flex-col md:flex-row py-6">
                <div class="flex-1 mb-6 text-black">
                    <a class="text-blue-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                        <!--Icon from: http://www.potlabicons.com/ -->
                        <svg class="ml-5 stroke-current text-white" id="_x33_0" enable-background="new 0 0 64 64" height="50" viewBox="0 0 64 64" width="50" xmlns="http://www.w3.org/2000/svg"><g><path d="m42 9c-7.168 0-13 5.832-13 13s5.832 13 13 13 13-5.832 13-13-5.832-13-13-13zm-11 13c0-.418.028-.828.074-1.234l3.132-2.068 2.794 1.841v2.923l-2.795 1.841-3.131-2.062c-.045-.408-.074-.821-.074-1.241zm17.762-5.017-2.83 1.865-2.932-1.466v-3.765l3.388-1.698c.766.335 1.481.759 2.145 1.252zm-6.762 7.899-3-1.5v-2.764l3-1.5 3 1.5v2.764zm-1-7.5-2.932 1.466-2.831-1.865.225-3.808c.663-.493 1.379-.918 2.145-1.253l3.393 1.696zm-5.762 9.635 2.83-1.865 2.932 1.466v3.765l-3.388 1.698c-.766-.335-1.481-.759-2.145-1.252zm7.762-.399 2.932-1.466 2.831 1.865-.225 3.808c-.663.493-1.379.918-2.145 1.253l-3.393-1.696zm6.794-1.316-2.794-1.841v-2.923l2.795-1.841 3.131 2.062c.045.408.074.821.074 1.241 0 .418-.028.828-.074 1.234zm.969-8.362-.102-1.699c.626.8 1.145 1.686 1.532 2.641zm-7.24-5.822-1.523.764-1.526-.763c.5-.07 1.007-.119 1.526-.119.518 0 1.024.048 1.523.118zm-10.186 4.127-.1 1.696-1.431.945c.387-.955.905-1.841 1.531-2.641zm-1.53 10.872 1.43.942.102 1.699c-.625-.8-1.145-1.685-1.532-2.641zm8.67 6.765 1.523-.764 1.526.763c-.5.07-1.007.119-1.526.119-.518 0-1.024-.048-1.523-.118zm10.186-4.127.1-1.696 1.431-.945c-.387.955-.905 1.841-1.531 2.641z"/><path d="m51.136 5.5h12.728v2h-12.728z" transform="matrix(.707 -.707 .707 .707 12.245 42.562)"/><path d="m53.586 2h2.828v2h-2.828z" transform="matrix(.707 -.707 .707 .707 13.988 39.77)"/><path d="m49.586 6h2.828v2h-2.828z" transform="matrix(.707 -.707 .707 .707 9.988 38.113)"/><path d="m54.757 10h8.485v2h-8.485z" transform="matrix(.707 -.707 .707 .707 9.503 44.941)"/><circle cx="18" cy="14" r="1"/><path d="m30.238 49.176.869-.87-1.499-5.997c-1.66-6.639-6.476-11.792-12.608-14.053v-3.256h2c2.206 0 4-1.794 4-4v-2.586l2.414-2.414-.707-.707c-1.101-1.101-1.707-2.564-1.707-4.122v-.272c2.279-.465 4-2.484 4-4.899v-5.618l-1.447.723c-1.202.601-2.491.936-3.832.997l-10.283.468c-5.853.266-10.438 5.064-10.438 10.924 0 3.795 1.921 7.262 5.14 9.273l2.86 1.787v3.065l-6.101 6.864c-1.224 1.377-1.899 3.152-1.899 4.996 0 4.147 3.374 7.521 7.521 7.521h1.612l1.073 7.515 2.749-1.375c-.074 1.898-.243 3.801-.511 5.679l-.597 4.181h22.434l-.896-3.585c-.899-3.594-2.305-7.029-4.147-10.239zm-9.238-31.59v1.414h-2c-1.103 0-2-.897-2-2h-2c0 2.206 1.794 4 4 4h2c0 1.103-.897 2-2 2h-6v2h2v2.626c-1.291-.328-2.632-.517-4-.584v-8.456l-1.707-1.707c-.189-.189-.293-.441-.293-.708v-.171c0-.551.449-1 1-1h1v-3c0-.551.449-1 1-1h9v.171c0 1.754.573 3.42 1.63 4.784zm-13.801 3.484c-2.629-1.643-4.199-4.475-4.199-7.576 0-4.788 3.747-8.708 8.529-8.926l10.282-.467c1.096-.05 2.164-.251 3.189-.601v2.5c0 1.654-1.346 3-3 3h-10c-1.654 0-3 1.346-3 3v1.171c-1.164.413-2 1.525-2 2.829v.171c0 .801.312 1.555.879 2.122l1.121 1.121v2.782zm-4.199 18.409c0-1.076.324-2.113.904-3.004l4.196 1.799-.581.726h-2.519v2h16c1.103 0 2 .897 2 2s-.897 2-2 2h-12.479c-3.044 0-5.521-2.477-5.521-5.521zm9.153 7.521h8.847c2.206 0 4-1.794 4-4s-1.794-4-4-4h-10.919l2.7-3.375-1.562-1.25-1.823 2.278-4.164-1.784 5.201-5.851c8.187.193 15.24 5.796 17.235 13.776l1.225 4.899-2.699 2.699c-.612.611-1.621.775-2.396.389l-2.528-1.265c-1.446-.722-3.236-.651-4.683.071l-3.793 1.897zm14.177 14c.439-1.685.67-3.415.67-5.162v-.838h-2v.838c0 1.752-.262 3.483-.751 5.162h-9.096l.271-1.898c.329-2.305.512-4.648.558-6.975l1.499-.75c.894-.447 2.002-.519 2.895-.071l2.529 1.266c1.525.759 3.5.438 4.703-.765l1.159-1.159c1.617 2.915 2.868 6.013 3.677 9.252l.275 1.1z"/></g></svg>
                        SENFOOT
                    </a>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Links</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">FAQ</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Help</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Support</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Legal</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Terms</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Social</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Facebook</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Linkedin</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Company</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Official Blog</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">About Us</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>    <!-- renvoie les fichiers js qui se trouve dans public -->
</body>
</html>
