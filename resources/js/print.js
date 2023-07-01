import $ from "jquery";

GetData(1)
function GetData(page){
    $.ajax({
        url:'/print?page='+page,
        type:'GET',
        data:{
            search: $('#search').val()
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
                                            <a href="/print-depan/`+data.id+`" class="text-white flex gap-1 p-2 mr-1 cursor-pointer bg-blue-500 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1s1 .45 1 1s-.45 1-1 1zm-1-9H6v4h12V3z"/></svg>
                                                Cetak Depan
                                            </a>
                                            <a href="/print-belakang/`+data.id+`" class="bg-blue-500 cursor-pointer text-white p-2 flex gap-1  rounded-md">
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
