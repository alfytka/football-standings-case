@extends('layouts.main')
@section('content')
  
<div class="py-4 md:px-3">
  <h5 class="text-xl md:text-2xl mb-5 font-semibold text-gray-300">Input Data Klub Sepak Bola</h5>
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
    <p class="text-base text-gray-300 max-w-sm lg:max-w-md">
      Perlu diperhatikan, masukkan data klub yang semestinya dan data tidak boleh duplikat.
      <a href="/klub" class="flex items-center mt-2 text-blue-500">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
        </svg>
        back
      </a>
    </p>
    <form action="/klub" method="POST" class="">
      @csrf
      <div class="block mb-5">
        <label for="nama_klub" class="block text-base text-gray-300 mb-1">Nama Klub</label>
        <input type="text" id="nama_klub" name="nama_klub" class="block py-2 px-4 text-sm border rounded-lg w-full bg-gray-800/40 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama klub" autocomplete="off">
        @error('nama_klub')
          <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div class="block mb-5">
        <label for="kota" class="block text-base text-gray-300 mb-1">Kota Klub</label>
        <input type="text" id="kota" name="kota" class="block py-2 px-4 text-sm border rounded-lg w-full bg-gray-800/40 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan kota" autocomplete="off">
        @error('kota')
          <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" class="mt-1 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:outline-none font-medium rounded-md text-sm px-5 py-2 text-center inline-flex items-center focus:ring-blue-800">
        Tambah <span class="flex pl-1">Klub</span>
        <svg fill="none" class="w-5 h-5 p-0.5 text-blue-600 bg-blue-200 rounded-full ml-2 -mr-1" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
        </svg>
      </button>
    </form>
  </div>
</div>
@endsection