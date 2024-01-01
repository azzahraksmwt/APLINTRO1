@extends('layouts.main')
@section('container')


<div class="flex justify-right items-center p-3">
    
    <!-- Search -->
    <div class="relative group ml-auto mr-2">
        <input type="text" class="border border-slate-700 rounded-full bg-gray-200 px-5 py-2 focus:outline-none focus:border-blue-900 transition duration-150 ease-in-out" placeholder="Search...">
        <button class="absolute right-0 top-0 mt-3 mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 376 376" fill="none">
                <path d="M400.553 379.633L288.819 267.899C315.67 235.665 329.059 194.32 326.202 152.465C323.345 110.611 304.462 71.4687 273.48 43.1821C242.499 14.8955 201.805 -0.357896 159.864 0.595088C117.922 1.54807 77.9632 18.634 48.2986 48.2986C18.634 77.9632 1.54807 117.922 0.595088 159.864C-0.357896 201.805 14.8955 242.499 43.1821 273.48C71.4687 304.462 110.611 323.345 152.465 326.202C194.32 329.059 235.665 315.67 267.899 288.819L379.633 400.553L400.553 379.633ZM30.6725 163.829C30.6725 137.493 38.482 111.749 53.1135 89.8514C67.745 67.9539 88.5412 50.8868 112.872 40.8085C137.204 30.7301 163.977 28.0932 189.807 33.2311C215.637 38.369 239.363 51.0509 257.986 69.6733C276.608 88.2956 289.29 112.022 294.428 137.852C299.566 163.682 296.929 190.455 286.85 214.786C276.772 239.118 259.705 259.914 237.808 274.545C215.91 289.177 190.165 296.986 163.829 296.986C128.526 296.947 94.6798 282.906 69.7165 257.942C44.7532 232.979 30.7117 199.133 30.6725 163.829Z" fill="black" />
            </svg>
        </button>
    </div>

    <!-- Notifikasi -->
    <div class="relative group ml-6 no-select">
        <button class="text-white hover:text-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 400 400" fill="none">
                <g clip-path="url(#clip0_467_8176)">
                    <path d="M365 312.555L361.222 309.222C350.505 299.673 341.124 288.723 333.333 276.667C324.824 260.028 319.725 241.858 318.333 223.222V168.333C318.407 139.062 307.789 110.772 288.475 88.7774C269.16 66.783 242.479 52.5984 213.444 48.8888V34.5555C213.444 30.6215 211.881 26.8485 209.1 24.0668C206.318 21.285 202.545 19.7222 198.611 19.7222C194.677 19.7222 190.904 21.285 188.122 24.0668C185.34 26.8485 183.778 30.6215 183.778 34.5555V49.1111C155.003 53.088 128.644 67.3583 109.583 89.2789C90.523 111.199 80.0523 139.285 80.1109 168.333V223.222C78.7193 241.858 73.6195 260.028 65.1109 276.667C57.454 288.693 48.2242 299.641 37.6665 309.222L33.8887 312.555V343.889H365V312.555Z" fill="black" />
                    <path d="M170.222 355.556C171.197 362.599 174.687 369.051 180.048 373.722C185.409 378.392 192.279 380.965 199.389 380.965C206.499 380.965 213.369 378.392 218.73 373.722C224.091 369.051 227.581 362.599 228.556 355.556H170.222Z" fill="black" />
                </g>
                <defs>
                    <clipPath id="clip0_467_8176">
                        <rect width="400" height="400" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </button>
        <div class="text-center hidden group-hover:block absolute right-0 w-48 bg-white border border-gray-200 shadow-lg rounded-md">
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Return Validation</a>
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Usage Validation</a>
        </div>
    </div>

    <!-- Profil -->
    <div class="relative group ml-6 mr-6 no-select text-center">
        <button class="text-white hover:text-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 400 400" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M111.111 88.8889C111.111 65.3141 120.476 42.7048 137.146 26.0349C153.816 9.36505 176.425 0 200 0C223.575 0 246.184 9.36505 262.854 26.0349C279.524 42.7048 288.889 65.3141 288.889 88.8889C288.889 112.464 279.524 135.073 262.854 151.743C246.184 168.413 223.575 177.778 200 177.778C176.425 177.778 153.816 168.413 137.146 151.743C120.476 135.073 111.111 112.464 111.111 88.8889ZM111.111 222.222C81.6426 222.222 53.3811 233.929 32.5437 254.766C11.7063 275.603 0 303.865 0 333.333C0 351.014 7.02379 367.971 19.5262 380.474C32.0286 392.976 48.9856 400 66.6667 400H333.333C351.014 400 367.971 392.976 380.474 380.474C392.976 367.971 400 351.014 400 333.333C400 303.865 388.294 275.603 367.456 254.766C346.619 233.929 318.357 222.222 288.889 222.222H111.111Z" fill="black" />
            </svg>
        </button>
        <div class="hidden group-hover:block absolute right-0 w-48 bg-white border border-gray-200 shadow-lg rounded-md">
            <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Edit Profil</a>
            <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">
                @csrf
                <button type="submit">Logout</button>
            </form>
            
            
        </div>
    </div>
</div>

<h1 style="font-size:30px; font:bold;" class="ml-8 no-select"> Dashboard </h1>
<h2 style="font-size:15px; font:bold;" class="ml-8 mt-1 no-select">Hello {{Auth::user()->username}}! What do you want to see today?</h2>

<div class="grid ml-5 mr-5 mt-4 space-x-4 relative no-select">
    <div class="relative">
        <div class="bg-slate-700 p-4 h-[calc(25vh)] w-full max-w-[80rem] rounded-t-md relative">
        </div>

        <div class="absolute left-6 top-1/2 transform -translate-y-1/2 mt-10 z-10">
            <div class="w-32 h-32 bg-white rounded-full overflow-hidden">
                <img src="img/azzahra.png" alt="Your Image" class="hover:bg-opacity-90 object-cover w-full h-full">
            </div>
        </div>

        <div class="bg-slate-200 p-4 h-[calc(15vh)] w-full max-w-[80rem] rounded-b-md relative" style="box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2);">
            <div class="text-gray-800 ml-36" style=" font-size:25px; font:bold;">{{Auth::user()->username}}</div>
        </div>
    </div>
</div>

<div class="grid ml-5 mr-5 mt-6 space-x-4 relative rounded-md no-select" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);">
    <div class="bg-slate-200 p-4 h-[calc(42vh)] w-full max-w-[80rem] rounded-md relative" style="margin-top: -1px;">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            <div class="bg-white p-4 rounded-md mt-5 mb-5 sm:h-[calc(30vh)] flex flex-col items-center justify-start">
                <img src="img/besi.png" style="width: 100px;" class="rounded-md ">
                <p class="mt-2" style=" font-size:15px;">Besi S45C 35x55x1OO mm</p>
                <div role="button" class="hover:bg-opacity-90 mt-3 bg-neutral-500 p-4 rounded-md w-full flex flex-col items-center justify-start">
                    <div class="text-white text-sm" style="font:bold;">More Detail</div>
                </div>
            </div>

            <div class="bg-white p-4 rounded-md mt-5 mb-5 sm:h-[calc(30vh)] flex flex-col items-center justify-start">
                <img src="img/besi.png" style="width: 100px;" class="rounded-md ">
                <p class="mt-2" style=" font-size:15px;">Besi S45C 35x55x1OO mm</p>
                <div role="button" class="hover:bg-opacity-90 mt-3 bg-neutral-500 p-4 rounded-md w-full flex flex-col items-center justify-start">
                    <div class="text-white text-sm" style="font:bold;">More Detail</div>
                </div>
            </div>

            <div class="bg-white p-4 rounded-md mt-5 mb-5 sm:h-[calc(30vh)] flex flex-col items-center justify-start">
                <img src="img/besi.png" style="width: 100px;" class="rounded-md ">
                <p class="mt-2" style=" font-size:15px;">Besi S45C 35x55x1OO mm</p>
                <div role="button" class="hover:bg-opacity-90 mt-3 bg-neutral-500 p-4 rounded-md w-full flex flex-col items-center justify-start">
                    <div class="text-white text-sm" style="font:bold;">More Detail</div>
                </div>
            </div>

            <div class="bg-white p-4 rounded-md mt-5 mb-5 sm:h-[calc(30vh)] flex flex-col items-center justify-start">
                <img src="img/besi.png" style="width: 100px;" class="rounded-md ">
                <p class="mt-2" style=" font-size:15px;">Besi S45C 35x55x1OO mm</p>
                <div role="button" class="hover:bg-opacity-90 mt-3 bg-neutral-500 p-4 rounded-md w-full flex flex-col items-center justify-start">
                    <div class="text-white text-sm" style="font:bold;">More Detail</div>
                </div>
            </div>

        </div>
        <div role="button" class="text-slate-600 text-right" style="font-size:15px; font-weight:bold;">More Info >></div>
    </div>
</div>

@endsection