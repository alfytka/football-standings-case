@extends('layouts.main')
@section('content')
  
<div class="py-4 md:px-3 mb-24">
  <h5 class="text-xl md:text-2xl mb-5 font-semibold text-gray-300">Atur Skor Pertandingan</h5>

  <p class="text-base text-gray-300 max-w-sm lg:max-w-md">
    Pastikan kedua tim klub yang berlawanan/bertanding tidak berada divalue yang sama.
    <a href="/skor-pertandingan" class="flex items-center mt-2 text-blue-500">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
      </svg>
      back
    </a>
  </p>

  @if (session()->has('info'))
  <div id="alert-1" class="flex p-4 my-4 rounded-lg bg-gray-800 text-blue-400" role="alert">
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
  <form action="/skor-pertandingan" method="POST">
    @csrf
    <div class="block lg:flex items-center justify-center gap-x-2 lg:gap-x-5 xl:gap-x-10 mt-20 mb-10">
      <select id="countries" class="border text-sm rounded-lg block w-full py-2 px-3 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" name="id_klub1" required>
        <option selected disabled value>Tim klub 1</option>
        @foreach ($klub as $item)
        <option value="{{ $item->id }}">{{ $item->nama_klub }}</option>
        @endforeach
      </select>
      <input type="number" id="skor_1" name="skor_1" class="block py-2 px-4 max-lg:my-5 text-center text-sm border rounded-lg w-full bg-gray-800/40 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 placeholder:text-center" placeholder="0" autocomplete="off" required>
      <span class="flex text-3xl justify-center font-bold text-gray-200">Vs</span>
      <input type="number" id="skor_2" name="skor_2" class="block py-2 px-4 max-lg:my-5 text-center text-sm border rounded-lg w-full bg-gray-800/40 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 placeholder:text-center" placeholder="0" autocomplete="off" required>
      <select id="countries" class="border text-sm rounded-lg block w-full py-2 px-3 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" name="id_klub2" required>
        <option selected disabled value>Tim klub 2</option>
        @foreach ($klub as $item)
        <option value="{{ $item->id }}">{{ $item->nama_klub }}</option>
        @endforeach
      </select>
    </div>
    <div class="flex justify-center mb-2">
      <button type="submit" class="mt-1 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:outline-none font-medium rounded-md text-sm pl-5 py-2 text-center inline-flex items-center focus:ring-blue-800">
        Simpan
        <svg class="w-4 h-4 ml-1 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
        </svg>
      </button>
    </div>
    @error('id_klub1')
      <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
    @error('id_klub2')
      <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
    @error('skor_1')
      <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
    @error('id_klub2')
      <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
  </form>
</div>
@endsection