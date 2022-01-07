<!--Nav-->
{{--    <div class="bg-gradient-to-r from-green-500 to-blue-600 border-2 border-white-300 rounded-lg items-center mt-5">
    <ul class="flex items-center justify-between flex-wrap bg-teal-500 p-6 mt-5">
        <li class="mr-6"><a class="font-semibold text-white text-6xl" href="{{ route('pageAccueilAdmin') }}">Sen FOOT</a></li>
        <li class="mr-6"><a class="font-semibold text-white text-2xl" href="{{ route('equipeForAdmin') }}">Equipe</a></li>
        <li class="mr-6"><a class="font-semibold text-white text-2xl" href="{{ route('pageCompet') }}">Compétition</a></li>
        <li class="mr-6"><a class="font-semibold text-white text-2xl" href="{{ route('pageEffectifAdmin') }}">Effectif</a></li>
        <div>
            <div class="inline-block text-sm px-4 py-2 leading-none border rounded text-green border-green-800 hover:text-green-800 hover:bg-green">
                <button>
                    {{ $LoggedUserInfo['prenom'] }}
                    {{ $LoggedUserInfo['nom'] }}
                </button>
            </div>
            <a href="{{ route('deconnexion') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-green border-green-800 hover:text-green-800 hover:bg-green">Logout</a>
        </div>
    </ul>
</div>      --}}

<nav class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0 mb-24">

    <div class="flex flex-wrap justify-between items-center">
        <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white items-center">
            <svg class="ml-5 stroke-current text-white" id="_x33_0" enable-background="new 0 0 64 64" height="50" viewBox="0 0 64 64" width="50" xmlns="http://www.w3.org/2000/svg"><g><path d="m42 9c-7.168 0-13 5.832-13 13s5.832 13 13 13 13-5.832 13-13-5.832-13-13-13zm-11 13c0-.418.028-.828.074-1.234l3.132-2.068 2.794 1.841v2.923l-2.795 1.841-3.131-2.062c-.045-.408-.074-.821-.074-1.241zm17.762-5.017-2.83 1.865-2.932-1.466v-3.765l3.388-1.698c.766.335 1.481.759 2.145 1.252zm-6.762 7.899-3-1.5v-2.764l3-1.5 3 1.5v2.764zm-1-7.5-2.932 1.466-2.831-1.865.225-3.808c.663-.493 1.379-.918 2.145-1.253l3.393 1.696zm-5.762 9.635 2.83-1.865 2.932 1.466v3.765l-3.388 1.698c-.766-.335-1.481-.759-2.145-1.252zm7.762-.399 2.932-1.466 2.831 1.865-.225 3.808c-.663.493-1.379.918-2.145 1.253l-3.393-1.696zm6.794-1.316-2.794-1.841v-2.923l2.795-1.841 3.131 2.062c.045.408.074.821.074 1.241 0 .418-.028.828-.074 1.234zm.969-8.362-.102-1.699c.626.8 1.145 1.686 1.532 2.641zm-7.24-5.822-1.523.764-1.526-.763c.5-.07 1.007-.119 1.526-.119.518 0 1.024.048 1.523.118zm-10.186 4.127-.1 1.696-1.431.945c.387-.955.905-1.841 1.531-2.641zm-1.53 10.872 1.43.942.102 1.699c-.625-.8-1.145-1.685-1.532-2.641zm8.67 6.765 1.523-.764 1.526.763c-.5.07-1.007.119-1.526.119-.518 0-1.024-.048-1.523-.118zm10.186-4.127.1-1.696 1.431-.945c-.387.955-.905 1.841-1.531 2.641z"/><path d="m51.136 5.5h12.728v2h-12.728z" transform="matrix(.707 -.707 .707 .707 12.245 42.562)"/><path d="m53.586 2h2.828v2h-2.828z" transform="matrix(.707 -.707 .707 .707 13.988 39.77)"/><path d="m49.586 6h2.828v2h-2.828z" transform="matrix(.707 -.707 .707 .707 9.988 38.113)"/><path d="m54.757 10h8.485v2h-8.485z" transform="matrix(.707 -.707 .707 .707 9.503 44.941)"/><circle cx="18" cy="14" r="1"/><path d="m30.238 49.176.869-.87-1.499-5.997c-1.66-6.639-6.476-11.792-12.608-14.053v-3.256h2c2.206 0 4-1.794 4-4v-2.586l2.414-2.414-.707-.707c-1.101-1.101-1.707-2.564-1.707-4.122v-.272c2.279-.465 4-2.484 4-4.899v-5.618l-1.447.723c-1.202.601-2.491.936-3.832.997l-10.283.468c-5.853.266-10.438 5.064-10.438 10.924 0 3.795 1.921 7.262 5.14 9.273l2.86 1.787v3.065l-6.101 6.864c-1.224 1.377-1.899 3.152-1.899 4.996 0 4.147 3.374 7.521 7.521 7.521h1.612l1.073 7.515 2.749-1.375c-.074 1.898-.243 3.801-.511 5.679l-.597 4.181h22.434l-.896-3.585c-.899-3.594-2.305-7.029-4.147-10.239zm-9.238-31.59v1.414h-2c-1.103 0-2-.897-2-2h-2c0 2.206 1.794 4 4 4h2c0 1.103-.897 2-2 2h-6v2h2v2.626c-1.291-.328-2.632-.517-4-.584v-8.456l-1.707-1.707c-.189-.189-.293-.441-.293-.708v-.171c0-.551.449-1 1-1h1v-3c0-.551.449-1 1-1h9v.171c0 1.754.573 3.42 1.63 4.784zm-13.801 3.484c-2.629-1.643-4.199-4.475-4.199-7.576 0-4.788 3.747-8.708 8.529-8.926l10.282-.467c1.096-.05 2.164-.251 3.189-.601v2.5c0 1.654-1.346 3-3 3h-10c-1.654 0-3 1.346-3 3v1.171c-1.164.413-2 1.525-2 2.829v.171c0 .801.312 1.555.879 2.122l1.121 1.121v2.782zm-4.199 18.409c0-1.076.324-2.113.904-3.004l4.196 1.799-.581.726h-2.519v2h16c1.103 0 2 .897 2 2s-.897 2-2 2h-12.479c-3.044 0-5.521-2.477-5.521-5.521zm9.153 7.521h8.847c2.206 0 4-1.794 4-4s-1.794-4-4-4h-10.919l2.7-3.375-1.562-1.25-1.823 2.278-4.164-1.784 5.201-5.851c8.187.193 15.24 5.796 17.235 13.776l1.225 4.899-2.699 2.699c-.612.611-1.621.775-2.396.389l-2.528-1.265c-1.446-.722-3.236-.651-4.683.071l-3.793 1.897zm14.177 14c.439-1.685.67-3.415.67-5.162v-.838h-2v.838c0 1.752-.262 3.483-.751 5.162h-9.096l.271-1.898c.329-2.305.512-4.648.558-6.975l1.499-.75c.894-.447 2.002-.519 2.895-.071l2.529 1.266c1.525.759 3.5.438 4.703-.765l1.159-1.159c1.617 2.915 2.868 6.013 3.677 9.252l.275 1.1z"/></g></svg>
            <a class="font-semibold text-3xl text-white" href="{{ route('pageAccueilAdmin') }}">SENFOOT</a>
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
