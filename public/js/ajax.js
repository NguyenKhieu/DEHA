$(document).ready(function(){

    $(document).on('click', '#add', function() {

        $('#addModal').modal('show');
    });

    $('.modal-footer').on('click', '.add', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:  'admincp/sanpham',
            type: 'POST',
            data: {
                'name'    : $('#name_add').val(),
                'id_type' : $('#typeAdd').val(),
                'tomtat'  : $('#tomtat_add').val(),
                'danhgia' : $('#danhgia_add').val(),
                'gia'     : $('#gia_add').val()
            },
            success:function(data){
                $('.errorName').addClass('hidden');
                $('.errorDanhgia').addClass('hidden');
                $('.errorGia').addClass('hidden');
                if(data.errors){
                    setTimeout(function () {
                        $('#addModal').modal('show');
                        toastr.error('Validation error!', 'Error Alert', {timeOut: 500});
                    }, 500);
                    if(data.errors.name){
                        $('.errorName').removeClass('hidden');
                        $('.errorName').text(data.errors.name);
                    }
                    if(data.errors.tomtat){
                        $('.errorTT').removeClass('hidden');
                        $('.errorTT').text(data.errors.tomtat);
                    }
                    if(data.errors.danhgia){
                        $('.errorDanhgia').removeClass('hidden');
                        $('.errorDanhgia').text(data.errors.danhgia);
                    }
                    if(data.errors.gia){
                        $('.errorGia').removeClass('hidden');
                        $('.errorGia').text(data.errors.gia);
                    }
                }else{
                    toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                    if(data.sanpham.id_type == data.type.id){
                        $('#postTable').append("<tr class='item" + data.sanpham.id + "'>" + "<td>" + data.sanpham.name + "</td><td>" + data.type.loaisanpham + "</td><td>" + data.sanpham.tomtat + "</td><td>" + data.sanpham.danhgia + "</td><td>" + data.sanpham.gia + " VNĐ</td><td><button data-id='" + data.sanpham.id + "' data-name='" + data.sanpham.name + "' data-tomtat='" + data.sanpham.tomtat + "' data-danhgia='" + data.sanpham.danhgia + "' data-gia='" + data.sanpham.gia + "' id='edit' " + " class='btn btn-primary'><span class='glyphicon glyphicon-edit'> Sửa </button><button data-id='" + data.sanpham.id + "' data-title='" + data.sanpham.name + "' class='btn btn-danger delete'><span class='glyphicon glyphicon-trash'> Xóa </button></td></tr>");
                    }

                }
            }
        });
    });

    //Modal Edit

    $(document).on('click', '#edit', function() {
        $('#name_edit').val($(this).data('name'));
        $('#tomtat_edit').val($(this).data('tomtat'));
        $('#danhgia_edit').val($(this).data('danhgia'));
        $('#gia_edit').val($(this).data('gia'));
        $('#editModal').modal('show');
        id = $(this).data('id');
    });
    $('.modal-footer').on('click', '.edit', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:  'admincp/sanpham/'+id ,
            type: 'PUT',
            data: {
                'name': $('#name_edit').val(),
                // 'anh' : $('#img_edit').val(),
                'id_type' : $('#typeEdit').val(),
                'tomtat' : $('#tomtat_edit').val(),
                'danhgia' : $('#danhgia_edit').val(),
                'gia'     : $('#gia_edit').val()
            },
            success:function(data){
                $('.errorName').addClass('hidden');
                $('.errorDanhgia').addClass('hidden');
                $('.errorGia').addClass('hidden');
                if(data.errors){
                    setTimeout(function () {
                        $('#editModal').modal('show');
                        toastr.error('Validation error!', 'Error Alert', {timeOut: 500});
                    }, 500);
                    if(data.errors.name){
                        $('.errorName').removeClass('hidden');
                        $('.errorName').text(data.errors.name);
                    }
                    if(data.errors.tomtat){
                        $('.errorTT').removeClass('hidden');
                        $('.errorTT').text(data.errors.tomtat);
                    }
                    if(data.errors.danhgia){
                        $('.errorDanhgia').removeClass('hidden');
                        $('.errorDanhgia').text(data.errors.danhgia);
                    }
                    if(data.errors.gia){
                        $('.errorGia').removeClass('hidden');
                        $('.errorGia').text(data.errors.gia);
                    }
                }else{
                    toastr.success('Successfully edited Product!', 'Success Alert', {timeOut: 5000});
                    if(data.sanpham.id_type == data.type.id){
                        $('.item' + data.sanpham.id).replaceWith("<tr class='item" + data.sanpham.id + "'>" + "<td>" + data.sanpham.name + "</td><td>" + data.type.loaisanpham + "</td><td>" + data.sanpham.tomtat + "</td><td>" + data.sanpham.danhgia + "</td><td>" + data.sanpham.gia + " VNĐ</td><td><button data-id='" + data.sanpham.id + "' data-name='" + data.sanpham.name + "' data-tomtat='" + data.sanpham.tomtat + "' data-danhgia='" + data.sanpham.danhgia + "' data-gia='" + data.sanpham.gia + "' id='edit' " + " class='btn btn-primary'><span class='glyphicon glyphicon-edit'> Sửa </button><button data-id='" + data.sanpham.id + "' data-title='" + data.sanpham.name + "' class='btn btn-danger delete'><span class='glyphicon glyphicon-trash'> Xóa </button></td></tr>");
                    }else{
                        alert('Error');
                    }
                }
            }
        });
    });
});

//Delete product

var id = 0;

$(document).on('click', '.delete', function() {
    // $('.modal-title').text('Add');
    $('#deleteModal').modal('show');
    id = $(this).data('id');
});

$('.xoa').click(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'DELETE',
        url: 'admincp/sanpham/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function(data) {
            toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 500});
            $('.item' + data['id']).remove();
        }
    });
});

//Tim kiem





