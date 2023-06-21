@extends('layouts.main')
@section('content')
  
<div class="py-4 md:px-3">
  <h5 class="text-xl md:text-2xl mb-5 font-semibold text-gray-300">Edit Skor Pertandingan</h5>

  <div class="pb-4 flex items-center md:justify-between">
    
  </div>

  @if (session()->has('info'))
  <div id="alert-1" class="flex p-4 mb-4 rounded-lg bg-gray-800 text-blue-400" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium">
      {{ session('info') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 inline-flex h-8 w-8 bg-gray-800 text-blue-400 hover:bg-gray-700" data-dismiss-target="#alert-1" id="closebtn" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </div>
  @endif
  <div class="">
      <form action="/skor-pertandingan/{{ $skor->id }}" method="POST">
         @csrf
         @method('PUT')
         <label for="countries" class="block mb-2 text-sm font-medium text-white">Tim Klub 1</label>
        <select id="countries" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" name="id_klub1">
          <option disabled value>Pilih tim klub</option>
          @foreach ($klub as $item)
          <option value="{{ $item->id }}" {{ $item->id == $skor->id_klub1 ? 'selected' : '' }}>{{ $item->nama_klub }}</option>
          @endforeach
        </select>
         <label for="countries" class="block mb-2 text-sm font-medium text-white">Tim Klub 2</label>
        <select id="countries" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" name="id_klub2">
          <option selected disabled value>Pilih tim klub</option>
          @foreach ($klub as $item)
          <option value="{{ $item->id }}" {{ $item->id == $skor->id_klub2 ? 'selected' : '' }}>{{ $item->nama_klub }}</option>
          @endforeach
        </select>
         <input type="text" id="skor_1" name="skor_1" class="block py-2 px-4 text-sm border rounded-lg w-80 bg-gray-800/40 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama klub" autocomplete="off" value="{{ $skor->skor_1, old('skor_1') }}">
         <input type="text" id="skor_2" name="skor_2" class="block py-2 px-4 text-sm border rounded-lg w-80 bg-gray-800/40 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama klub" autocomplete="off" value="{{ $skor->skor_2, old('skor_2') }}">
         @error('id_klub1')
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