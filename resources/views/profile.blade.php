@extends('layouts.main')
@section('container')
<div class="grid ml-10 mr-10 ml-20 mr-20 mt-20 no-select max-w-screen-xl mx-auto no-select">
    <div class="relative max-w-[60rem] ml-20 mr-20">
        <div class="bg-slate-700 p-2 sm:h-[calc(10vh)] md:h-[calc(8vh)] lg:h-[calc(7vh)] w-full rounded-t-md relative flex items-center">
            <div class="text-white ml-5" style="font-size:1.5vw;">Profile</div>
        </div>

        <div class="bg-slate-200 p-4 sm:h-[calc(75vh)] md:h-[calc(70vh)] lg:h-[calc(65vh)] w-full rounded-b-md relative flex flex-col sm:flex-row">

            <!-- Kolom Kiri -->
            <div class="flex-1 border-b sm:border-b-0 sm:border-r lg:border-r-0 border-gray-300 pr-4">

                <div class="mt-10 sm:mt-16" style="display: flex; justify-content: center; align-items: center;">
                    <img src="img/azzahra.png" style="width: 200px; height:200px;" class="rounded-lg">
                </div>

                <div role="button" class="mx-auto mt-8 max-w-[8rem] bg-slate-700 inline-block p-3 rounded-full" style="display: flex; justify-content: center; align-items: center;">
                    <div class="text-white text-sm">Edit Image</div>
                </div>

            </div>

            <!-- Kolom Kanan -->
            <div class="flex-1 pl-4">
                <div class="flex flex-col mt-8 mr-9">
                    <label for="adminId">Admin ID:</label>
                    <input type="text" id="adminId" name="adminId" class=" max-w-[28rem] p-2 border border-gray-300 rounded-full mb-2">

                    <label for="adminName">Admin Name:</label>
                    <input type="text" id="adminName" name="adminName" class="max-w-[28rem] p-2 border border-gray-300 rounded-full mb-2">

                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" class="max-w-[28rem] p-2 border border-gray-300 rounded-full mb-2">

                    <label for="oldPassword">Old Password:</label>
                    <input type="password" id="oldPassword" name="oldPassword" class="max-w-[28rem] p-2 border border-gray-300 rounded-full mb-2">

                    <label for="newPassword">New Password:</label>
                    <input type="password" id="newPassword" name="newPassword" class="max-w-[28rem] p-2 border border-gray-300 rounded-full mb-2">
                </div>
            </div>
        </div>
    </div>

    <div class="flex mt-8 ml-auto mr-24">
        <div role="button" class="bg-slate-700 inline-block p-3 rounded-full" style="display: flex; justify-content: center; align-items: center;">
            <div class="text-white text-sm">Kembali</div>
        </div>

        <div role="button" class="ml-4 bg-slate-700 inline-block p-3 rounded-full" style="display: flex; justify-content: center; align-items: center;">
            <div class="text-white text-sm">Save Changes</div>
        </div>
    </div>




</div>
@endsection