@extends('layouts.main')
@section('content')
  
<div class="py-4 md:px-3">
  <h5 class="text-xl md:text-2xl mb-5 font-semibold text-gray-300">Klasemen Liga 1</h5>

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

  <div class="pb-4 flex items-center md:justify-end">
    
    <form id="search" class="pr-[1px]">
      <label for="search-table" class="sr-only">Search</label>
      <div class="relative mt-1">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input type="text" id="search-table" name="search" class="block p-2 pl-10 text-sm border rounded-lg w-80 bg-gray-800/40 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Cari siswa..." autocomplete="off">
      </div>
    </form>
  </div>
  <div class="relative overflow-x-auto rounded-md md:rounded-lg">
    <table id="tabless" class="w-full text-sm text-left text-gray-400">
      <thead class="text-xs uppercase bg-gray-800 text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            No
          </th>
          <th scope="col" class="px-6 py-3">
            Nama Klub
          </th>
          <th scope="col" class="px-6 py-3">
            Ma
          </th>
          <th scope="col" class="px-6 py-3">
            Me
          </th>
          <th scope="col" class="px-6 py-3">
            S
          </th>
          <th scope="col" class="px-6 py-3">
            K
          </th>
          <th scope="col" class="px-6 py-3">
            GM
          </th>
          <th scope="col" class="px-6 py-3">
            GK
          </th>
          <th scope="col" class="px-6 py-3">
            Point
          </th>
        </tr>
      </thead>
      <tbody id="result">
        @foreach ($klasemen as $item)
        <tr class="border-b bg-gray-800/40 border-gray-700 hover:bg-gray-900">
          <td class="px-6 py-4">
            {{ $loop->iteration }}
          </td>
          <th scope="row" class="flex items-center px-6 py-4 whitespace-nowrap text-white">
            <img class="w-8 h-8 rounded-full" src="/img/profile.jpg" alt="Jese image">
            <div class="pl-3">
              <div class="text-sm font-medium">{{ $item->nama_klub }}</div>
            </div>  
          </th>
          <td class="px-6 py-4">
            {{ $item->main }}
          </td>
          <td class="px-6 py-4">
            {{ $item->menang }}
          </td>
          <td class="px-6 py-4">
            {{ $item->seri }}
          </td>
          <td class="px-6 py-4">
            {{ $item->kalah }}
          </td>
          <td class="px-6 py-4">
            {{ $item->goal_menang }}
          </td>
          <td class="px-6 py-4">
            {{ $item->goal_kalah }}
          </td>
          <td class="px-6 py-4">
            {{ $item->point }}
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
@endsection