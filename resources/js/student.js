import $ from "jquery";
import TomSelect from "tom-select";
import Swal from "sweetalert2";
var select = '<select name="classroom_id" value="" id="edit-classroom-select"></select>';
new TomSelect('#search-classroom')
var option = '';
GetData(1);
GetClassroom();

$('#search-classroom').change(function(){
    GetData(1)
})
function GetData(page){
    $.ajax({
        url:'/student?page='+page,
        type:'GET',
        data:{
            search: $('#search').val(),
            classroom: $('#search-classroom').val(),
        },
        success:function(response){
            $('#table').html('')
            $('#empty').html('')
            if(response.data.data.length > 0){
                $.each(response.data.data, function(index,data){
                    var row =   `<tr class="">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">`+(response.pagination.from + index)+`</td>
                                    <td class="whitespace-nowrap px-6 py-4">`+data.name+`</td>
                                    <td class="whitespace-nowrap px-6 py-4">`+data.classroom.name+`</td>
                                    <td class="whitespace-nowrap px-6 py-4">`+data.nis+`</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <button data-nis="`+data.nis+`" data-name="`+data.name+`" data-classroom="`+data.classroom_id+`" data-id="`+data.id+`" style="background-color:#E2CB19; " class="text-white p-2 mr-1 rounded-md btn-edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M20.71 7.04c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.37-.39-1.02-.39-1.41 0l-1.84 1.83l3.75 3.75M3 17.25V21h3.75L17.81 9.93l-3.75-3.75L3 17.25Z"/></svg>
                                            </button>
                                            <button data-id="`+data.id+`" class="bg-red-600 text-white p-2 rounded-md btn-delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M9 3v1H4v2h1v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1V4h-5V3H9M7 6h10v13H7V6m2 2v9h2V8H9m4 0v9h2V8h-2Z"/></svg>
                                            </button>
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
                $('.btn-edit').click(function(){
                    $('#edit-classroom').html('')
                    var name = $(this).data('name');
                    var classroom = $(this).data('classroom')
                    var nis = $(this).data('nis')
                    $('#edit-nis').val(nis)
                    $('#edit-name').val(name)
                    $('#edit-classroom').html(select)
                    $('#edit-classroom-select').html(option)
                    $('#edit-classroom-select').val(classroom)
                    new TomSelect('#edit-classroom-select')
                    var id = $(this).data('id')
                    $('#editModal').data('id',id)
                    $('#open-edit-modal').click();
                })
            }else{
                var src = "src='../empty_data.png'";
                var row =   '<img '+src+' width="400px" class="w-44 mt-4" alt="">'
                $('#empty').html(row)
            }
            $('.btn-edit').click(function(){
            var year = $(this).data('year');
            $('#edit-year').val(year)
            $('#open-edit-modal').click();
    })
        },
        error:function(request, status, error){
            console.log(error)
        }
    })
    
}

function GetClassroom(){
    $.ajax({
        url:'/data/classroom',
        type:'GET',
        success:function(response){
            $.each(response,function(index,data){
                var row = '<option value="'+data.id+'">'+data.name+' Tahun Ajaran ' +data.year.year+'</option>'
                option += row;
            })
            $('#create-classroom-select').append(option)
            new TomSelect('#create-classroom-select')
        }
    })
}
$(document).ready(function(){
    $('#addModal').submit(function(e){
        e.preventDefault();
        
        $.ajax({
           url: $(this).attr('action'),
           type: 'POST',
           data: $(this).serialize(),
           success: function(response){
                GetData(1)
                Swal.fire({
                    title:'Berhasil!',
                    icon:'success',
                    text: response
                })
                $('#create-nis').val('')
                $('#create-name').val('')
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
    });
})


$(document).ready(function(){
    $('#editModal').submit(function(e){
        e.preventDefault();
        var id = $(this).data('id')
        $.ajax({
           url: '/student/'+id,
           type: 'PUT',
           data: $(this).serialize(),
           success: function(response){
                GetData(1)
                Swal.fire({
                    title:'Berhasil!',
                    icon:'success',
                    text: response
                })
                $('#btn-close-modal-edit').click();
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
    });
})


$(document).on('click', '.btn-delete', function(){
    var id = $(this).data('id');
    Swal.fire({
        title: 'Apakah Anda yakin ingin menghapus data ini?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/student/' + id,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    Swal.fire({
                        title:'Berhasil!',
                        icon:'success',
                        text: response
                    })
                    GetData(1);
                },
                error: function(request, status, error){
                    Swal.fire({
                        title:'Gagal!',
                        icon:'error',
                        text:error
                    })
                }
            });
        }
    })
})
$(document).ready(function(){
    $('#btn-search').click(function(){
        GetData(1)
    })
})
