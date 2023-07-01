@extends('layouts.app')


@section('content')
<!-- component -->
<!-- This is an example component -->
<div class="py-5">
    <main class="h-full overflow-y-auto">
        <div class="container  mx-auto grid">
          <!-- Cards -->
          <div class="grid gap-6 mb-8 grid-cols-3">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
              <div class="p-3 mr-4 rounded-full text-orange-100 bg-orange-500">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20v16M10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16c1.3 0 2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71Z"/></svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  Kelas
                </p>
                <p class="text-lg font-semibold text-gray-700 ">
                  {{$classroom}}
                </p>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
              <div class="p-3 mr-4 rounded-full text-green-100 bg-green-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 ">
                   Siswa
                </p>
                <p class="text-lg font-semibold text-gray-700 ">
                   {{$student}}
                </p>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                <div class="p-3 mr-4  rounded-full text-teal-100 bg-teal-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M7 11h2v2H7v-2m14-6v14c0 1.11-.89 2-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h1V1h2v2h8V1h2v2h1a2 2 0 0 1 2 2M5 7h14V5H5v2m14 12V9H5v10h14m-4-6v-2h2v2h-2m-4 0v-2h2v2h-2m-4 2h2v2H7v-2m8 2v-2h2v2h-2m-4 0v-2h2v2h-2Z"/></svg>
                </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 ">
                  Tahun Ajaran
                </p>
                <p class="text-lg font-semibold text-gray-700 ">
                  {{$year}}
                </p>
              </div>
            </div>
        </div>
    </main>
</div>
@endsection