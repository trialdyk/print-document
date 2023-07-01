@extends('layouts.app')

@section('content')
<div class="m-6">
    <div class="flex w-full justify-between">
        <!-- Required font awesome -->
        <button
        type="button"
        class="flex items-center rounded bg-primary px-6 max-h-10 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] "
        data-te-toggle="modal"
        data-te-target="#addModal"
        data-te-ripple-init
        data-te-ripple-color="light">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24"><path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2Z"/></svg>
        Tambah Data
        </button>
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
                <th scope="col" class="px-6 py-4">Kelas</th>
                <th scope="col" class="px-6 py-4">NIS</th>
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



<!--Verically centered modal-->
<form action="{{Route('student.store')}}" data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="addModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
    @csrf
  <div data-te-modal-dialog-ref class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
    <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none ">
      <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 ">
        <!--Modal title-->
        <h5 class="text-xl font-medium leading-normal text-neutral-800 " id="exampleModalScrollableLabel">
            Tambah Siswa
        </h5>
        <!--Close button-->
        <button id="btn-close-modal-create" type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss  aria-label="Close">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!--Modal body-->
      <div class="relative p-4">
        <div class="mb-1.5">
            <label for="create-name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
            <input type="text" name="name" id="create-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Nama..." required>
        </div>
        <div class="mb-1.5">
            <label for="create-nis" class="block mb-2 text-sm font-medium text-gray-900 ">Nis</label>
            <input type="text" name="nis" id="create-nis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Nis..." required>
        </div>
        <label for="create-classroom-select" class="block mb-2 text-sm font-medium text-gray-900 ">Kelas</label>
        <div id="create-classroom">
            <select name="classroom_id" id="create-classroom-select" placeholder="kelas">
                <option value=""></option>
            </select>
        </div>
      </div>

      <!--Modal footer-->
      <div
        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 ">
        <button type="button" class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
          Batal
        </button>
        <button type="submit" class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] " >
          Simpan
        </button>
      </div>
    </div>
  </div>
</form>


<!--Verically centered modal-->
<form data-id="" data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="editModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
    @csrf
    <div data-te-modal-dialog-ref class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
      <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none ">
        <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 ">
          <!--Modal title-->
          <h5 class="text-xl font-medium leading-normal text-neutral-800 " id="exampleModalScrollableLabel">
              Edit Siswa
          </h5>
          <!--Close button-->
          <button id="btn-close-modal-edit" type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss  aria-label="Close">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-6 w-6">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
  
        <!--Modal body-->
        <div class="relative p-4">
          <div class="mb-1.5">
              <label for="edit-name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
              <input type="text" name="name" id="edit-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Nama..." required>
          </div>
          <div class="mb-1.5">
            <label for="edit-nis" class="block mb-2 text-sm font-medium text-gray-900 ">Nis</label>
            <input type="text" name="nis" id="edit-nis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Nis..." required>
          </div>
          <label for="edit-classroom-select" class="block mb-2 text-sm font-medium text-gray-900 ">Kelas</label>
          <div id="edit-classroom">
            
          </div>
        </div>
  
        <!--Modal footer-->
        <div
          class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 ">
          <button type="button" class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
            Batal
          </button>
          <button type="submit" class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] "  data-te-ripple-init data-te-ripple-color="light">
            Simpan
          </button>
        </div>
      </div>
    </div>
</form>

  <button
  type="button"
  id="open-edit-modal"
  class=" items-center hidden rounded bg-primary px-6 max-h-10 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] "
  data-te-toggle="modal"
  data-te-target="#editModal"
  data-te-ripple-init
  data-te-ripple-color="light">
  </button>
@endsection

@section('script')
    @vite('resources/js/student.js')
@endsection