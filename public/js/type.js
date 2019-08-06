$(document).ready(function(){
    $(document).on('click', '#addType', function() {
        // $('.modal-title').text('Add');
        $('#addModal').modal('show');
    });

    $('.modal-footer').on('click', '.addType', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:  'admincp/loaisanpham',
            type: 'POST',
            data: {
                'loaisanpham'    : $('#loaisanpham_add').val(),
                //   'anh'     : $('#img_add').val(),
                'noidung'  : $('#noidung_add').val(),
                'thuonghieu' : $('#thuonghieu_add').val(),
            },
            success:function(data){
                // alert(data.id);
                console.log(data);
                $('.errorName').addClass('hidden');
                $('.errorNoidung').addClass('hidden');
                $('.errorThuonghieu').addClass('hidden');
                if(data.errors){
                    setTimeout(function () {
                        $('#addModal').modal('show');
                        toastr.error('Validation error!', 'Error Alert', {timeOut: 500});
                    }, 500);
                    if(data.errors.loaisanpham){
                        $('.errorName').removeClass('hidden');
                        $('.errorName').text(data.errors.loaisanpham);
                    }
                    if(data.errors.noidung){
                        $('.errorNoidung').removeClass('hidden');
                        $('.errorNoidung').text(data.errors.noidung);
                    }
                    if(data.errors.thuonghieu){
                        $('.errorThuonghieu').removeClass('hidden');
                        $('.errorThuonghieu').text(data.errors.thuonghieu);
                    }
                }else{
                    toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                // <form action='route({{ loaisanpham.timkiem }})' method='post' class='navbar-form navbar-left' role='search'><input type='hidden' name='_token' value='{{ csrf_token() }}';><button type='submit' class='btn btn-success' name='keyword'  value='{{ $loaisp->loaisanpham }}'> <span class='glyphicon glyphicon-eye-open'></span> Xem </button></form>
                    $('#postTable').append("<tr class='item" + data.id + "'>" + "<td>" + data.loaisanpham + "</td><td>" + data.noidung + "</td><td>" + data.thuonghieu + "</td><td><form action='admincp/show' method='post' class='navbar-form navbar-left' role='search'><input type='hidden' name='_token' value='2kSO9N5jCmyIodBUuu96FMiY5Py0XiU2kDHFg7Q0'><button type='submit' class='btn btn-success' name='keyword' value='"+ data.loaisanpham+ "' ><span class='glyphicon glyphicon-eye-open'></span> Xem </button></form><button style='margin-top:8px;' data-id='" + data.id + "' data-loaisp='" + data.loaisanpham + "' data-thuonghieu='"+ data.thuonghieu + "' data-noidung='" + data.noidung +"' id='edit' " + " class='btn btn-primary'><span class='glyphicon glyphicon-edit'> Sửa </button><button style='margin-top:8px;' data-id='" + data.id + "' data-title='" + data.l + "' class='btn btn-danger delete'><span class='glyphicon glyphicon-trash'> Xóa </button></td></tr>");
                }
            }
        });
    });

    //Modal Edit

    $(document).on('click', '#edit', function() {
        $('#loaisp_edit').val($(this).data('loaisp'));
        $('#noidung_edit').val($(this).data('noidung'));
        $('#thuonghieu_edit').val($(this).data('thuonghieu'));
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
            url:  'admincp/loaisanpham/'+id ,
            type: 'PUT',
            data: {
                'loaisanpham': $('#loaisp_edit').val(),
                // 'anh' : $('#img_edit').val(),
                'noidung' : $('#noidung_edit').val(),
                'thuonghieu' : $('#thuonghieu_edit').val(),
            },
            success:function(data){
                // alert(data.id);
                console.log(data);
                $('.errorName').addClass('hidden');
                $('.errorThuonghieu').addClass('hidden');
                $('.errorNoidung').addClass('hidden');
                if(data.errors){
                    setTimeout(function () {
                        $('#editModal').modal('show');
                        toastr.error('Validation error!', 'Error Alert', {timeOut: 500});
                    }, 500);
                    if(data.errors.loaisanpham){
                        $('.errorName').removeClass('hidden');
                        $('.errorName').text(data.errors.loaisanpham);
                    }
                    if(data.errors.noidung){
                        $('.errorNoidung').removeClass('hidden');
                        $('.errorTT').text(data.errors.noidung);
                    }
                    if(data.errors.thuonghieu){
                        $('.errorThuonghieu').removeClass('hidden');
                        $('.errorThuonghieu').text(data.errors.thuonghieu);
                    }
                }else{
                    toastr.success('Successfully edited Product!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'>" + "<td>" + data.loaisanpham + "</td><td>" + data.noidung + "</td><td>" + data.thuonghieu + "</td><td><button data-id='" + data.id + "' data-loaisp='" + data.loaisanpham + "' data-thuonghieu='"+ data.thuonghieu + "' data-noidung='" + data.noidung +"' id='edit' " + " class='btn btn-primary'><span class='glyphicon glyphicon-edit'> Sửa </button><button data-id='" + data.id + "' data-title='" + data.l + "' class='btn btn-danger delete'><span class='glyphicon glyphicon-trash'> Xóa </button></td></tr>");
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
        url: 'admincp/loaisanpham/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function(data) {
            toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 500});
            $('.item' + data['id']).remove();
        }
    });
});

