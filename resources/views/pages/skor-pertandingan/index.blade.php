@extends('layouts.main')
@section('content')
  
<div class="py-4 md:px-3">
  <h5 class="text-xl md:text-2xl mb-5 font-semibold text-gray-300">Skor Pertandingan</h5>

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

  <div class="pb-4 flex items-center md:justify-between">
    <div>
      <a href="/skor-pertandingan/create" type="button" class="mt-1 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:outline-none font-medium rounded-md text-sm px-5 py-2 text-center hidden md:inline-flex items-center focus:ring-blue-800">
        Atur <span class="md:hidden lg:flex lg:pl-1">Skor</span>
        <svg fill="none" class="w-5 h-5 p-0.5 text-blue-600 bg-blue-200 rounded-full ml-2 -mr-1" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
        </svg>
      </a>
    </div>
    <form id="search" class="pr-[1px]">
      <label for="search-table" class="sr-only">Search</label>
      <div class="relative mt-1">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input type="text" id="search-table" name="search" class="block p-2 pl-10 text-sm border rounded-lg w-80 bg-gray-800/40 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Cari pertandingan..." autocomplete="off">
      </div>
    </form>
  </div>
  <div class="relative overflow-x-auto rounded-md md:rounded-lg">
    <table id="tabless" class="w-full text-sm text-left text-gray-400">
      <thead class="text-xs uppercase bg-gray-800 text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            Nama Klub
          </th>
          <th scope="col" class="px-6 py-3">
            
          </th>
          <th scope="col" class="px-6 py-3">
            Vs
          </th>
          <th scope="col" class="px-6 py-3">
            
          </th>
          <th scope="col" class="px-6 py-3">
            Nama Klub
          </th>
        </tr>
      </thead>
      <tbody id="result">
        @foreach ($skor as $item)
        <tr class="border-b bg-gray-800/40 border-gray-700 hover:bg-gray-900">
          <td class="px-6 py-4 font-medium text-gray-300">
            {{ $item->klub1->nama_klub }}
          </td>
          <td class="px-6 py-4">
            {{ $item->skor_1 }}
          </td>
          <td class="px-6 py-4">
            -
          </td>
          <td class="px-6 py-4">
            {{ $item->skor_2 }}
          </td>
          <td class="px-6 py-4 font-medium text-gray-300">
            {{ $item->klub2->nama_klub }}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="datanotfound">
      <p id="notFound" class="hidden text-sm text-center m-5 text-slate-400">Maaf, data tidak ditemukan.</p>
    </div>
  </div>
</div>
<div class="fixed right-6 bottom-6 group flex md:hidden">
  <a href="/skor-pertandingan/create" data-tooltip-target="btninfo" data-tooltip-placement="left" type="button" class="flex items-center justify-center text-white bg-blue-600 rounded-full w-12 h-12 hover:bg-blue-700 focus:ring-2 focus:ring-blue-800 focus:outline-none">
    <svg aria-hidden="true" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
    <span class="sr-only">Open actions menu</span>
  </a>
  <div id="btninfo" role="tooltip" class="absolute z-10 invisible inline-block whitespace-nowrap px-3 py-2 text-xs font-medium transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip dark:border-none dark:text-slate-200 dark:bg-gray-700">
    Atur Pertandingan
    <div class="tooltip-arrow" data-popper-arrow></div>
  </div>
</div>
@endsection