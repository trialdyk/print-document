import $ from "jquery";
import TomSelect from "tom-select";
import Swal from "sweetalert2";
var select = '<select name="classroom_id" value="" id="edit-classroom-select"></select>';
var option = '';
new TomSelect('#search-classroom')

$('#search-classroom').change(function(){
    $('#pilih').remove();
    $('#data').removeClass('hidden')
    GetData(1)
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
                                        <button class="`+(data.rekap.juli ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="juli">`+(data.rekap.juli ? data.rekap.juli : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.agustus ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="agustus">`+(data.rekap.agustus ? data.rekap.agustus : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.september ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="september">`+(data.rekap.september ? data.rekap.september : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.oktober ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="oktober">`+(data.rekap.oktober ? data.rekap.oktober : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.november ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="november">`+(data.rekap.november ? data.rekap.november : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.desember ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="desember">`+(data.rekap.desember ? data.rekap.desember : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.januari ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="januari">`+(data.rekap.januari ? data.rekap.januari : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.februari ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="februari">`+(data.rekap.februari ? data.rekap.februari : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.maret ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="maret">`+(data.rekap.maret ? data.rekap.maret : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.april ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="april">`+(data.rekap.april ? data.rekap.april : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.mei ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="mei">`+(data.rekap.mei ? data.rekap.mei : 'bayar')+`</button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 text-center py-4">
                                        <button class="`+(data.rekap.juni ? 'bg-green-500' : 'bg-red-600 btn-bayar')+`  px-3 py-1 rounded-md text-white" data-id="`+data.id+`" data-bulan="juni">`+(data.rekap.juni ? data.rekap.juni : 'bayar')+`</button>
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



