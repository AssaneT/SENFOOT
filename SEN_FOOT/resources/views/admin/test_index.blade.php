<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrateur</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>


<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

    <!--Nav-->
    <nav class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white items-center">
                <svg class="ml-5 stroke-current text-white" id="_x33_0" enable-background="new 0 0 64 64" height="50" viewBox="0 0 64 64" width="50" xmlns="http://www.w3.org/2000/svg"><g><path d="m42 9c-7.168 0-13 5.832-13 13s5.832 13 13 13 13-5.832 13-13-5.832-13-13-13zm-11 13c0-.418.028-.828.074-1.234l3.132-2.068 2.794 1.841v2.923l-2.795 1.841-3.131-2.062c-.045-.408-.074-.821-.074-1.241zm17.762-5.017-2.83 1.865-2.932-1.466v-3.765l3.388-1.698c.766.335 1.481.759 2.145 1.252zm-6.762 7.899-3-1.5v-2.764l3-1.5 3 1.5v2.764zm-1-7.5-2.932 1.466-2.831-1.865.225-3.808c.663-.493 1.379-.918 2.145-1.253l3.393 1.696zm-5.762 9.635 2.83-1.865 2.932 1.466v3.765l-3.388 1.698c-.766-.335-1.481-.759-2.145-1.252zm7.762-.399 2.932-1.466 2.831 1.865-.225 3.808c-.663.493-1.379.918-2.145 1.253l-3.393-1.696zm6.794-1.316-2.794-1.841v-2.923l2.795-1.841 3.131 2.062c.045.408.074.821.074 1.241 0 .418-.028.828-.074 1.234zm.969-8.362-.102-1.699c.626.8 1.145 1.686 1.532 2.641zm-7.24-5.822-1.523.764-1.526-.763c.5-.07 1.007-.119 1.526-.119.518 0 1.024.048 1.523.118zm-10.186 4.127-.1 1.696-1.431.945c.387-.955.905-1.841 1.531-2.641zm-1.53 10.872 1.43.942.102 1.699c-.625-.8-1.145-1.685-1.532-2.641zm8.67 6.765 1.523-.764 1.526.763c-.5.07-1.007.119-1.526.119-.518 0-1.024-.048-1.523-.118zm10.186-4.127.1-1.696 1.431-.945c-.387.955-.905 1.841-1.531 2.641z"/><path d="m51.136 5.5h12.728v2h-12.728z" transform="matrix(.707 -.707 .707 .707 12.245 42.562)"/><path d="m53.586 2h2.828v2h-2.828z" transform="matrix(.707 -.707 .707 .707 13.988 39.77)"/><path d="m49.586 6h2.828v2h-2.828z" transform="matrix(.707 -.707 .707 .707 9.988 38.113)"/><path d="m54.757 10h8.485v2h-8.485z" transform="matrix(.707 -.707 .707 .707 9.503 44.941)"/><circle cx="18" cy="14" r="1"/><path d="m30.238 49.176.869-.87-1.499-5.997c-1.66-6.639-6.476-11.792-12.608-14.053v-3.256h2c2.206 0 4-1.794 4-4v-2.586l2.414-2.414-.707-.707c-1.101-1.101-1.707-2.564-1.707-4.122v-.272c2.279-.465 4-2.484 4-4.899v-5.618l-1.447.723c-1.202.601-2.491.936-3.832.997l-10.283.468c-5.853.266-10.438 5.064-10.438 10.924 0 3.795 1.921 7.262 5.14 9.273l2.86 1.787v3.065l-6.101 6.864c-1.224 1.377-1.899 3.152-1.899 4.996 0 4.147 3.374 7.521 7.521 7.521h1.612l1.073 7.515 2.749-1.375c-.074 1.898-.243 3.801-.511 5.679l-.597 4.181h22.434l-.896-3.585c-.899-3.594-2.305-7.029-4.147-10.239zm-9.238-31.59v1.414h-2c-1.103 0-2-.897-2-2h-2c0 2.206 1.794 4 4 4h2c0 1.103-.897 2-2 2h-6v2h2v2.626c-1.291-.328-2.632-.517-4-.584v-8.456l-1.707-1.707c-.189-.189-.293-.441-.293-.708v-.171c0-.551.449-1 1-1h1v-3c0-.551.449-1 1-1h9v.171c0 1.754.573 3.42 1.63 4.784zm-13.801 3.484c-2.629-1.643-4.199-4.475-4.199-7.576 0-4.788 3.747-8.708 8.529-8.926l10.282-.467c1.096-.05 2.164-.251 3.189-.601v2.5c0 1.654-1.346 3-3 3h-10c-1.654 0-3 1.346-3 3v1.171c-1.164.413-2 1.525-2 2.829v.171c0 .801.312 1.555.879 2.122l1.121 1.121v2.782zm-4.199 18.409c0-1.076.324-2.113.904-3.004l4.196 1.799-.581.726h-2.519v2h16c1.103 0 2 .897 2 2s-.897 2-2 2h-12.479c-3.044 0-5.521-2.477-5.521-5.521zm9.153 7.521h8.847c2.206 0 4-1.794 4-4s-1.794-4-4-4h-10.919l2.7-3.375-1.562-1.25-1.823 2.278-4.164-1.784 5.201-5.851c8.187.193 15.24 5.796 17.235 13.776l1.225 4.899-2.699 2.699c-.612.611-1.621.775-2.396.389l-2.528-1.265c-1.446-.722-3.236-.651-4.683.071l-3.793 1.897zm14.177 14c.439-1.685.67-3.415.67-5.162v-.838h-2v.838c0 1.752-.262 3.483-.751 5.162h-9.096l.271-1.898c.329-2.305.512-4.648.558-6.975l1.499-.75c.894-.447 2.002-.519 2.895-.071l2.529 1.266c1.525.759 3.5.438 4.703-.765l1.159-1.159c1.617 2.915 2.868 6.013 3.677 9.252l.275 1.1z"/></g></svg>
                <a class="font-semibold text-3xl text-white" href="{{ route('pageAccueilAdmin') }}">SENFOOT</a>
            </div>

            <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                <span class="relative w-full">
                    <input type="search" placeholder="Search" class="w-full bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
                    <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                        <svg class="fill-current pointer-events-none text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                        </svg>
                    </div>
                </span>
            </div>

            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="flex-1 md:flex-none md:mr-3">
                        <div class="relative inline-block">
                            <button onclick="toggleDD('myDropdown')" class="drop-button text-white focus:outline-none"> <span class="pr-2"><i class="em em-robot_face"></i></span> Hi, {{ $LoggedUserInfo['prenom'] }} {{ $LoggedUserInfo['nom'] }}
                                <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg></button>
                            <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                                <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profile</a>
                                <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-cog fa-fw"></i> Settings</a>
                                <div class="border border-gray-800"></div>
                                <a href="{{ route('deconnexion') }}" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>


    <div class="flex flex-col md:flex-row">

        <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

            <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600">
                            <i class="fas fa-chart-area pr-0 md:pr-3 text-blue-600"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Dashboard</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                            <i class="fas fa-calendar pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Calendrier</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                            <i class="fas fa-exchange-alt pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Transfert</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-gray-500">
                            <i class="fa fa-user pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Entraineur</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-600">
                            <i class="fas fa-sign-out-alt fa-fw pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Log out</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-gray-800 pt-3">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                    <h3 class="font-bold pl-2">Dashboard</h3>
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-600 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-blue-600">
                                    <svg class="stroke-current stroke-2 text-white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        height="35" width="35" viewBox="0 0 429.905 429.905" style="enable-background:new 0 0 429.905 429.905;" xml:space="preserve">
                                        <g>
                                            <path d="M372.06,65.082V0.266H57.675v64.816H0v78.239c0,23.965,19.498,43.463,43.463,43.463h28.814
                                                c23.262,50.015,72.056,85.809,129.546,90.558v94.563h-47.497v31.645h-24.001v26.088h169.077V403.55h-23.993v-31.645h-47.499
                                                v-94.563c57.489-4.75,106.284-40.544,129.546-90.558h28.98c23.969,0,43.467-19.498,43.467-43.463V65.082H372.06z M249.322,403.55
                                                h-68.907v-5.556h68.907V403.55z M43.463,160.696c-9.582,0-17.375-7.795-17.375-17.375V91.171h31.587v29.561
                                                c0,13.807,1.805,27.197,5.164,39.965H43.463z M345.972,120.732c0,72.292-58.815,131.106-131.104,131.106
                                                c-72.292,0-131.104-58.815-131.104-131.106V26.355h262.209V120.732z M403.817,143.321c0,9.58-7.795,17.375-17.379,17.375h-19.541
                                                c3.359-12.767,5.164-26.158,5.164-39.965V91.171h31.756V143.321z"/>
                                            <polygon points="182.528,177.647 214.865,160.647 247.201,177.647 241.025,141.64 267.186,116.14 231.033,110.886 214.865,78.126
                                                198.696,110.886 162.543,116.14 188.704,141.64 	"/>
                                        </g>
                                        <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                    </svg>
                                </div>
                            </div>
                            <a href="{{ route('pageCompet') }}" class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Compétition</h5>
                                <h3 class="font-bold text-3xl">
                                    @php
                                        $nbrChamp = 0;
                                        foreach ($championnats as $championnat) {
                                            $nbrChamp++;
                                        }
                                        echo "$nbrChamp";
                                    @endphp
                                    <span class="text-blue-500">
                                        <i class="fas fa-caret-up"></i>
                                    </span>
                                </h3>
                            </a>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-500 rounded-lg shadow-xl p-5">
                        <a href="{{ route('equipeForAdmin') }}" class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Equipes</h5>
                                <h3 class="font-bold text-3xl">
                                    @php
                                        $nbrEquipe = 0;
                                        foreach ($equipes as $equipe) {
                                            $nbrEquipe++;
                                        }
                                        echo "$nbrEquipe";
                                    @endphp
                                    <span class="text-green-500">
                                        <i class="fas fa-caret-up"></i>
                                    </span>
                                </h3>
                            </div>
                        </a>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                        <a href="{{ route('pageEffectifAdmin') }}" class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Joueurs</h5>
                                <h3 class="font-bold text-3xl">
                                    @php
                                        $nbrJoueur = 0;
                                        foreach ($effectifs as $effectif) {
                                            $nbrJoueur++;
                                        }
                                        echo "$nbrJoueur";
                                    @endphp
                                    <span class="text-yellow-600">
                                        <i class="fas fa-caret-up"></i>
                                    </span>
                                </h3>
                            </div>
                        </a>
                    </div>
                    <!--/Metric Card-->
                </div>
                {{--    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
                        <a href="#" class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve" width="40" height="40">
                                        <g>
                                            <rect x="8.5" y="12.5" style="fill:#FFFFFF;" width="35" height="30"/>
                                            <g>
                                                <path style="fill:#788B9C;" d="M77,13v64H9V13H77 M78,12H8v66h70V12L78,12z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <rect x="8.5" y="12.5" style="fill:#F78F8F;" width="35" height="13"/>
                                            <g>
                                                <path style="fill:#C74343;" d="M77,13v12H9V13H77 M78,12H8v14h70V12L78,12z"/>
                                            </g>
                                        </g>
                                        <rect x="60" y="34" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="50" y="34" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="40" y="34" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="30" y="34" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="60" y="44" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="50" y="44" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="40" y="44" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="30" y="44" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="20" y="44" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="50" y="54" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="40" y="54" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="30" y="54" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="20" y="54" style="fill:#C5D4DE;" width="6" height="6"/>
                                        <rect x="9" y="71" style="fill:#E1EBF2;" width="68" height="6"/>
                                        <g>
                                            <path style="fill:#8BB7F0;" d="M23,43.5C11.696,43.5,2.5,34.304,2.5,23S11.696,2.5,23,2.5S43.5,11.696,43.5,23S34.304,43.5,23,43.5   z"/>
                                            <g>
                                                <path style="fill:#4E7AB5;" d="M23,3c11.028,0,20,8.972,20,20s-8.972,20-20,20S3,34.028,3,23S11.972,3,23,3 M23,2    C11.402,2,2,11.402,2,23s9.402,21,21,21s21-9.402,21-21S34.598,2,23,2L23,2z"/>
                                            </g>
                                        </g>
                                        <circle style="fill:#FFFFFF;" cx="23" cy="23" r="16"/>
                                        <circle style="fill:#36404D;" cx="23" cy="23" r="1.5"/>
                                        <polyline style="fill:none;stroke:#36404D;stroke-miterlimit:10;" points="29,30.5 23,23 27.5,11 "/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Calendrier</h5>
                                <h3 class="font-bold text-3xl">
                                    @php
                                        $nbrMatch = 0;
                                        foreach ($matches as $matche) {
                                            $nbrMatch++;
                                        }
                                        echo "$nbrMatch";
                                    @endphp
                                    matches
                                </h3>
                            </div>
                        </a>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">      <!--    A   REVOIR     -->
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-gray-200 to-gray-100 border-b-4 border-gray-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-gray-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Entraineur</h5>
                                <h3 class="font-bold text-3xl">7</h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-purple-200 to-purple-100 border-b-4 border-purple-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-purple-600"><i class="fas fa-inbox fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Transfert</h5>
                                <h3 class="font-bold text-3xl">3 <span class="text-purple-500"><i class="fas fa-exchange-alt"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
            </div>      --}}

            @php
                $i = 0;
            @endphp
            <div class="flex flex-row flex-wrap flex-grow mt-2">

                @if ($championnats->count() > 0)
                    @foreach ($championnats as $championnat)
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Table Card-->
                            <div class="bg-white border-transparent rounded-lg shadow-xl">
                                <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                    <h5 class="font-bold uppercase text-center text-gray-600">{{ $championnat->nomchampionnat }}</h5>
                                </div>
                                <div class="p-5">
                                    <table class="w-full p-5 text-gray-700">
                                        <thead>
                                            <tr>
                                                <th class="text-left text-blue-900">Pos</th>
                                                <th class="text-left text-blue-900">Team</th>
                                                <th class="text-left text-blue-900">Pts</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($classements->count() > 0)
                                                @for ($i=0 ; $i<=5 ; $i++)
                                                    @foreach ($classements as $classement)
                                                        @if ($i == $classement->position)
                                                            @if ($classement->id_championnat == $championnat->id)
                                                                <tr>
                                                                    <td>{{ $classement->position }}</td>
                                                                    <td>{{ $classement->equipe }}</td>
                                                                    <td class="font-bold">{{ $classement->points }}</td>
                                                                </tr>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endfor
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex justify-center py-3">
                                    <button class="mx-auto lg:mx-0 hover:underline bg-gradient-to-r from-green-400 to-blue-500 text-white font-bold rounded-full py-1 px-2 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        <a href="#">Editer</a>
                                    </button>
                                </div>
                            </div>
                            <!--/table Card-->
                        </div>
                    @endforeach
                @endif

                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-xl">
                        <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-1"), {
                                    "type": "bar",
                                    "data": {
                                        "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                        "datasets": [{
                                            "label": "Likes",
                                            "data": [100, 59, 80, 81, 56, 55, 40],
                                            "fill": false,
                                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                            "borderWidth": 1
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-xl">
                        <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-4"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["P1", "P2", "P3"],
                                        "datasets": [{
                                            "label": "Issues",
                                            "data": [300, 50, 100],
                                            "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Advert Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-xl">
                        <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Advert</h5>
                        </div>
                        <div class="p-5 text-center">


                            <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CK7D52JJ&placement=wwwtailwindtoolboxcom" id="_carbonads_js"></script>


                        </div>
                    </div>
                    <!--/Advert Card-->
                </div>

            </div>
        </div>
    </div>




    <script>
        /*Toggle dropdown list*/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /*Filter dropdown options*/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>


</body>

</html>
