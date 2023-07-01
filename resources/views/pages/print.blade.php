@extends('layouts.app')

@section('content')
<div class="m-6">
    <div class="flex w-full justify-end">
        <div class="">
            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
              <input
                type="search"
                id="search"
                class="relative m-0 -mr-0.5 block min-w-0 flex-auto rounded-l border-2 border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:lue-400 focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none"
                placeholder="Search"
                aria-label="Search"
                aria-describedby="btn-search" />
              <!--Search button-->
              <button id="btn-search" class="relative btn-search z-[2] flex items-center rounded-r bg-blue-400 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-400-700 hover:shadow-lg focus:bg-blue-400-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg"
                type="button">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="h-5 w-5">
                  <path
                    fill-rule="evenodd"
                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                    clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          </div>
    </div>

    <div class="mt-1 rounded-md w-full bg-white">
        <table class="min-w-full text-left text-sm font-light">
            <thead class=" font-medium">
              <tr>
                <th scope="col" class="px-6 py-4">No</th>
                <th scope="col" class="px-6 py-4">Nama</th>
                <th scope="col" class="px-6 py-4">Jumlah Siswa</th>
                <th scope="col" class="px-6 py-4">Aksi</th>
              </tr>
            </thead>
            <tbody id="table">

            </tbody>
          </table>
          <div class="w-full flex justify-center" id="empty">

          </div>
    </div>

    <div class="mt-2 flex justify-center" id="paginate">

    </div>
</div>
@endsection

@section('script')
    @vite('resources/js/print.js')
@endsection