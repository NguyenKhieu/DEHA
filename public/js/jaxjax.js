
$(document).ready(function(){
    $('.sua').click(function(){
        $('.error').hide();
        $('.error_gia').hide();
        var id = $(this).attr('data-id');
        $.ajax({
            url: 'admincp/product/'+id+ '/edit',
            dataType: 'json',
            type: 'get',
            success:function($results){
                console.log($results);
                $('.name').val($results.name);
                // $('.img').val($results.anh);
                $('.gia').val($results.gia);
                $('.danhgia').val($results.danhgia);
            }
        });

        // Delete
        $('.delete').click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id = $(this).attr('data-id'); 
            $.ajax({
                url : 'admincp/product/' +id,
                dataType: 'json',
                type: 'delete',
                success: function($results){
                    toastr.success($results.success, 'Thông báo', {timeOut: 5000});
                    $('#myModal').modal('hide');
                    // location.reload();
                }
            });
        });

        $('.edit').click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id = $(this).attr('data-id');
            // alert(id);
            let name = $('.name').val();
            let anh = $('.img').val();
            // console.log(anh);
            let gia = $('.gia').val();
            let danhgia = $('.danhgia').val();
            $.ajax({
                url : 'admincp/product/' +id,
                data : {
                    id: id,
                    name: name,
                    anh: anh,
                    gia: gia,
                    danhgia: danhgia
                },
                type: 'put',
                dataType: 'json',
                success: function($results){
                    console.log($results);
                    if($results.error == 'true'){
                        $('.error').show();
                        $('.error').text($results.message.name[0]);
                        // $('.error_gia').show();
                        // $('.error_gia').text($results.message.gia[0]);
                    } 
                    else{
                        toastr.success($results.success, 'Thông báo', {timeOut: 3000});
                        $('.item' + $results.id).replaceWith("<tr class='item" + $results.id + "'><td>" + $results.name + "</td><td><img <img width='180px' height='180px'"+ "src='{{ asset('images') . '/'"  + $results.anh + "'" +"</td><td>" + $results.danhgia + "</td><td>" + $results.gia + "</td><td>" + "<button class='btn btn-info btn-lg sua' type='button'" + "data-id='" + $results.id+ "'" + "data-toggle='modal' data-target='#myModal'>" + "Edit" + "</button><td>" + "<button type='submit' data-id='" +$results.id + "'" + "id='delete' class='fa fa-trash btn btn-default delete' title='Xóa'>" + "</button></td>"); 
                        $('#myModal').modal('hide');
                    }
                }
            });
        });

        //Delete 

        
    });
});