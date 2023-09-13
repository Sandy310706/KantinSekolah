@extends('layouts.app')
@section('title', 'Registrasi')

@section('registrasi')
    <div class="container w-screen h-screen bg-slate-400 flex">
        <div class="container m-auto w-96 rounded-lg bg-slate-100 shadow-xl flex flex-col">
            <form action="" method="POST" class="mx-auto m-10 w-3/4 flex flex-col">
                @csrf
                <div class="mb-2">
                    <label for="Nama" class="block text-sm mb-1 font-medium">Nama<span class="text-pink-600">*</span></label>
                    <input type="text" name="nama" id="Nama" placeholder="" class="bg-white ring-1 ring-slate-300 rounded-md p-2 font-sans text-sm font-medium text-slate-500 w-full focus:outline outline-blue-800 focus:border border-blue-700">
                    <span class="block text-xs font-semibold text-pink-600 mt-[2px]">Nama Wajib di isi</span>
                </div>
                <div class="mb-2">
                    <label for="Email" class="block text-sm mb-1 font-medium">Email</label>
                    <input type="email" name="email" id="Email" placeholder="" class="bg-white ring-1 ring-slate-300 rounded-md p-2 font-sans text-sm w-full focus:outline outline-blue-800 focus:border border-blue-700">
                </div>
                <div class="mb-2">
                    <label for="Password" class="block text-sm mb-1 font-medium w-full">Password</label>
                    <input type="password" name="password" id="Password" placeholder="" class="bg-white ring-1 ring-slate-300 rounded-md p-2 font-sans text-sm w-full focus:outline outline-blue-800 focus:border border-blue-700">
                </div>
                <button class="w-full bg-blue-500 text-white p-1 rounded-sm mx-auto" style="border-radius: 5px">Registrasi</button>
                <span class="text-sm mt-1">Sudah punya akun? hfhddhbdhd<a href="#" class="text-blue-600 cursor-pointer hover:underline">Login</a></span>
            </form>
        </div>
    </div>
@endsection
