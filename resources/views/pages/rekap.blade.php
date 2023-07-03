@extends('layouts.app')

@section('content')
<div class="m-6">
    <div class="flex gap-2">
        <select name="" id="search-year" class="w-64" placeholder="Pilih Tahun Ajaran">
            @foreach ($years as $year)
                <option value="{{$year->id}}">Tahun Ajaran {{$year->year}}</option>
            @endforeach
        </select>
        <div id="classroom">
          <select name="" id="search-classroom" class="w-64" placeholder="Pilih Kelas">
            <option value=""></option>
            @foreach ($classrooms as $classroom)
                  <option value="{{$classroom->id}}">{{$classroom->name}}</option>
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
        <button type="button" class="inline-block rounded bg-blue-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-blue-600 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
          Batal
        </button>
        <button type="submit" class="ml-1 inline-block rounded bg-blue-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] " >
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
      let inputTanggal = document.getElementById("input-date");
      inputTanggal.addEventListener("change", function() {
        let tanggal = moment(inputTanggal.value).format("DD/MM/YYYY");
        inputTanggal.value = tanggal;
      });
    </script>
    <script>
      new TomSelect('#search-classroom')
      new TomSelect('#search-year')
      var select_search = '<select class="w-64" name="search_classroom" placeholder="Cari Kelas" id="search-classroom"><option value=""></option></select>'

$('#search-classroom').change(function(){
    $('#pilih').remove();
    $('#data').removeClass('hidden')
    GetData(1)
})

$('#search-year').change(function(){
    $.ajax({
      url:'/data/classroom',
      type:'GET',
      data:{
          year: $('#search-year').val() 
      },
      success:function(response){
          option = '';
          var last;
          console.log(response)
          $.each(response,function(index,data){
            if(index == 0){
              last = data.id
            }
            var row = '<option value="'+data.id+'">'+data.name+'</option>'
            option += row;
          })
          $('#classroom').html('')
          $('#classroom').html(select_search)
          $('#search-classroom').append(option)
          new TomSelect('#search-classroom')
          GetData(1)
      },
      error:function(response){

      }
    })
})

function GetData(page){
    $.ajax({
        url:'/rekap-spp?page='+page,
        type:'GET',
        data:{
            classroom: $('#search-classroom').val()
        },
        success:function(response){
            $('#table').html('')
            $('#empty').html('')
            if(response.data.data.length > 0){
                $.each(response.data.data, function(index,data){
                    var row =   `<tr class="">
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        `+(response.pagination.from + index)+`
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        `+data.name+`
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.juli ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="juli">`+(data.rekap.juli ? formatDate(data.rekap.juli) : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.agustus ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="agustus">`+(data.rekap.agustus ? formatDate(data.rekap.agustus) : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.september ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="september">`+(data.rekap.september ? formatDate(data.rekap.september) : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.oktober ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="oktober">`+(data.rekap.oktober ? formatDate(data.rekap.oktober) : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.november ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="november">`+(data.rekap.november ? formatDate(data.rekap.november) : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.desember ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="desember">`+(data.rekap.desember ? formatDate(data.rekap.desember) : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.januari ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="januari">`+(data.rekap.januari ? formatDate(data.rekap.januari) : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.februari ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="februari">`+(data.rekap.februari ? formatDate(data.rekap.februari) : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.maret ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="maret">`+(data.rekap.maret ? formatDate(data.rekap.maret) : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.april ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="april">`+(data.rekap.april ? formatDate(data.rekap.april) : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.mei ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="mei">`+(data.rekap.mei ? formatDate(data.rekap.mei) : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.juni ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="juni">`+(data.rekap.juni ? formatDate(data.rekap.juni) : 'bayar')+`</button>
                                    </td>
                                </tr>`
                    $('#table').append(row)
                })
                $('#paginate').html(response.links)
                $('.pagination-link').click(function(){
                    var page = $(this).data('page')
                    GetData(page)
                })
                $('.btn-bayar').click(function(){
                    var id = $(this).data('id')
                    var bulan = $(this).data('bulan')
                
                    $('#addModal').data('id',id)
                    $('#input-bulan').val(bulan)
                    $('#open-modal').click();
                })
            }else{
                var src = "src='../empty_data.png'";
                var row =   '<img '+src+' width="400px" class="w-44 mt-4" alt="">'
                $('#empty').html(row)
            }
        },
        error:function(response){
            console.log(response.responseText)
        }
    })   
}

$(document).ready(function(){
    $('#addModal').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/rekap-spp/'+($(this).data('id')),
            type: 'PUT',
            data: $(this).serialize(),
            success: function(response){
                 GetData(1)
                 Swal.fire({
                     title:'Berhasil!',
                     icon:'success',
                     text: response
                 })
                 $('#btn-close-modal-create').click();
            },
            error: function(response){
                 var errors = response.responseJSON.errors;
                 var errorMessage = '';
 
                 $.each(errors, function(key, value) {
                     errorMessage += '<p class="text-red-500">' + value + '</p>';
                 });
 
                 Swal.fire({
                     title: 'Gagal!',
                     html: errorMessage,
                     icon: 'error',
                 })
            }
         });
    })
})

function formatDate(date) {
  let parts = date.split("-"); 
  let formattedDate = parts[2] + "/" + parts[1] + "/" + parts[0]; 
  return formattedDate; 
}
    </script>
@endsection