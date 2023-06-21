@extends('layouts.main')
@section('content')
  
<div class="py-4 md:px-3">
  <h5 class="text-xl md:text-2xl mb-5 font-semibold text-gray-300">Input Data Klub Sepak Bola</h5>

  <div class="pb-4 flex items-center md:justify-between">
    
  </div>
  <div class="">
      <form action="/klub/{{ $klub->id }}" method="POST">
         @csrf
         @method('PUT')
         <input type="text" id="nama_klub" name="nama_klub" class="block py-2 px-4 text-sm border rounded-lg w-80 bg-gray-800/40 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama klub" autocomplete="off" value="{{ $klub->nama_klub, old('nama_klub') }}">
         <input type="text" id="kota_klub" name="kota_klub" class="block py-2 px-4 text-sm border rounded-lg w-80 bg-gray-800/40 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama klub" autocomplete="off" value="{{ $klub->kota_klub, old('kota_klub') }}">
         @error('nama_klub')
            <div>error</div>
         @enderror
         <button type="submit" class="mt-1 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:outline-none font-medium rounded-md text-sm px-5 py-2 text-center hidden md:inline-flex items-center focus:ring-blue-800">
            Add <span class="md:hidden lg:flex lg:pl-1">Klub</span>
            <svg fill="none" class="w-5 h-5 p-0.5 text-blue-600 bg-blue-200 rounded-full ml-2 -mr-1" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
            </svg>
          </b>
      </form>
  </div>
</div>
@endsection