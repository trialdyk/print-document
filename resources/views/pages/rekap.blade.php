@extends('layouts.app')

@section('content')
<div class="m-6">
    <div class=" flex">
        <div class="flex w-full">
            <select name="" id="search-classroom" style="width:40%;" placeholder="Pilih Kelas">
                <option value="" ></option>
                @foreach ($classrooms as $classroom)
                    <option value="{{$classroom->id}}">{{$classroom->name}} Tahun Ajaran {{$classroom->year->year}}</option>
                @endforeach
            </select>     
        </div>
    </div>
    <div class="w-full text-center mt-32" id="pilih">
        Pilih Kelas Terlebih Dahulu..
    </div>
    <div class="mt-2 rounded-md overflow-x-auto pb-2 hidden bg-white" id="data">
        <table class="min-w-full text-left text-sm font-light">
            <thead class="w-auto font-medium">
              <tr>
                <th scope="col" class="px-12 py-4">No</th>
                <th scope="col" class="px-12 py-4">Nama</th>
                <th scope="col" class="px-12 py-4">Juli</th>
                <th scope="col" class="px-12 py-4">Agustus</th>
                <th scope="col" class="px-12 py-4">September</th>
                <th scope="col" class="px-12 py-4">Oktober</th>
                <th scope="col" class="px-12 py-4">November</th>
                <th scope="col" class="px-12 py-4">Desember</th>
                <th scope="col" class="px-12 py-4">Januari</th>
                <th scope="col" class="px-12 py-4">Februari</th>
                <th scope="col" class="px-12 py-4">Maret</th>
                <th scope="col" class="px-12 py-4">April</th>
                <th scope="col" class="px-12 py-4">Mei</th>
                <th scope="col" class="px-12 py-4">Juni</th>
              </tr>
            </thead>
            <tbody id="table" class=" pb-2"> 
            </tbody>
          </table>
          <div class="w-full flex justify-center" id="empty">
            
          </div>
    </div>

    <div class="mt-2 flex justify-center" id="paginate">

    </div>
</div>



<!--Verically centered modal-->
<form data-id="" data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="addModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
    @csrf
  <div data-te-modal-dialog-ref class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
    <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none ">
      <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 ">
        <!--Modal title-->
        <h5 class="text-xl font-medium leading-normal text-neutral-800 " id="exampleModalScrollableLabel">
            Bayar Spp
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
            <label for="input-date" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal Pembayaran</label>
            <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" id="input-date"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Nama...">
            <input type="hidden" name="bulan" value="" id="input-bulan">
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

  <button
  type="button"
  id="open-modal"
  class=" items-center hidden rounded bg-primary px-6 max-h-10 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] "
  data-te-toggle="modal"
  data-te-target="#addModal"
  data-te-ripple-init
  data-te-ripple-color="light">
  </button>
@endsection

@section('script')
    @vite('resources/js/rekap.js')
@endsection