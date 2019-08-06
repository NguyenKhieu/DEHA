<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khoa Phạm - Quản Lý Học Sinh</title>
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="{{asset('restful/css/bootstrap.min.css')}}" rel="stylesheet">
    <style type="text/css">
      .btn {padding:0px;font-weight:bold}
    </style>
    <script type="text/javascript">
        function xacnhanxoa(msg) {
            if (window.confirm(msg)) {
                return true;
            }
            return false;
        }
    </script>
  </head>
  <body>
    <div class="container" style="margin-top:20px">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Danh Sách Học Sinh</h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>STT</th>
                <th>Họ Tên</th>
                <th>Điểm Toán</th>
                <th>Điểm Lý</th>
                <th>Điểm Hóa</th>
                <th>Xóa</th>
                <th>Sửa</th>
                <th>Thêm</th>
              </tr>
            </thead>
            <?php $stt= 0; ?>
            <tbody>
              @foreach($hocsinh as $hs)
              <?php $stt+=1; ?>
              <tr>
                <th scope="row">{!! $stt !!}</th>
                <td>{!! $hs->ten !!}</td>
                <td>{!! $hs->toan !!}</td>
                <td>{!! $hs->ly !!}</td>
                <td>{!! $hs->hoa !!}</td>
                <th>
                  {!! Form::open(array('route'=>array('hocsinh.destroy',$hs->id), 'method'=>'DELETE')) !!}
                    <button onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" type="submit" id="delete" class="btn btn-link">Xóa</button>
                  {!! Form::close() !!}
                </th>
                <th>
                  
                  <a href="{{route('hocsinh.edit', $hs->id)}}">Sửa</a>
                  
                  
                </th>
                <th>
                  
                    <a href="{{route('hocsinh.create')}}">Thêm</a>
                  
                  
                </th>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
   
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>