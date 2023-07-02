@extends('layouts.app')

@section('content')
<div class="m-6">
    <div class="flex w-full justify-between">
      <div class="">
        <select name="" id="search-year" class="w-64" placeholder="Pilih Kelas">
            <option value="" ></option>
            @foreach ($years as $year)
                <option value="{{$year->id}}" {{$year->id == $lastYear->id ? 'selected' : ''}}>Tahun Ajaran {{$year->year}}</option>
            @endforeach
        </select>     
      </div>
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
              <button id="btn-search" class="relative btn-search z-[2] flex items-center rounded-r bg-blue-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-400-700 hover:shadow-lg focus:bg-blue-400-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg"
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
    <script>
      new TomSelect('#search-year')
      GetData(1)
      $('#search-year').change(function(){
          GetData(1)
      })
      function GetData(page){
    $.ajax({
        url:'/print?page='+page,
        type:'GET',
        data:{
            search: $('#search').val(),
            year: $('#search-year').val()
        },
        success:function(response){
            $('#table').html('')
            $('#empty').html('')
            if(response.data.data.length > 0){
                $.each(response.data.data, function(index,data){
                    var row =   `<tr class="">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">`+(response.pagination.from + index)+`</td>
                                    <td class="whitespace-nowrap px-6 py-4">`+data.name+`</td>
                                    <td class="whitespace-nowrap px-6 py-4">`+data.student_count+`</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <a href="/print-depan/`+data.id+`" class="text-white flex gap-1 p-2 mr-1 cursor-pointer bg-blue-600 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1s1 .45 1 1s-.45 1-1 1zm-1-9H6v4h12V3z"/></svg>
                                                Cetak Depan
                                            </a>
                                            <a href="/print-belakang/`+data.id+`" class="bg-blue-600 cursor-pointer text-white p-2 flex gap-1  rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1s1 .45 1 1s-.45 1-1 1zm-1-9H6v4h12V3z"/></svg>
                                                Cetak Belakang
                                            </a>
                                        </div>
                                    </td>
                                </tr>`
                    $('#table').append(row)
                })
                $('#paginate').html(response.links)
                $('.pagination-link').click(function(){
                    var page = $(this).data('page')
                    GetData(page)
                })
            }else{
                var src = "src='../empty_data.png'";
                var row =   '<img '+src+' width="400px" class="w-44 mt-4" alt="">'
                $('#empty').html(row)
            }
        },
        error:function(request, status, error){
            console.log(error)
        }
    })
}

$(document).ready(function(){
    $('#btn-search').click(function(){
        GetData(1)
    })
})

    </script>
@endsection