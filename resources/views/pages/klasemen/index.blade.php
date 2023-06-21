@extends('layouts.main')
@section('content')
  
<div class="py-4 md:px-3">
  <h5 class="md:hidden text-xl md:text-2xl mb-5 font-semibold text-gray-300">Klasemen Liga 1</h5>
  
  <div class="pb-4 flex items-center md:justify-between">
    <h5 class="max-md:hidden text-xl md:text-2xl mb-5 font-semibold text-gray-300">Klasemen Liga 1</h5>
    
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
          <td class="px-6 py-4 font-medium text-gray-300">
            {{ $item->nama_klub }}
          </td>
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