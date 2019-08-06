<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khoa Phạm - Quản Lý Học Sinh</title>
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="{{asset('restful/css/bootstrap.min.css')}}" rel="stylesheet">
  </head>
  <body>
    <div class="container" style="margin-top:20px">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Sửa Điểm Học Sinh</h3>
        </div>
        <div class="panel-body">
          <!-- <div class="alert alert-danger" role="alert">
            <ul>
              <li>Enter a valid email address</li>
              <li>Enter a valid email address</li>
              <li>Enter a valid email address</li>
              <li>Enter a valid email address</li>
            </ul>
          </div> -->
          {!! Form::open(array('route'=>array('hocsinh.update',$data['id']), 'method'=>'PUT')) !!}
            <div class="form-group">
              <label for="lblHoTen">Họ Tên Học Sinh</label>
              <input type="text" class="form-control" name="txtHoTen" value="{!! old('txtHoTen', isset($data) ? $data['ten'] : null ) !!}"/>
            </div>
            <div class="form-group">
              <label for="lblToan">Điểm Môn Toán</label>
              <input type="text" class="form-control" name="txtToan" value="{!! old('txtToan', isset($data) ? $data['toan'] : null ) !!}" />
            </div>
            <div class="form-group">
              <label for="lblLy">Điểm Môn Lý</label>
              <input type="text" class="form-control" name="txtLy" value="{!! old('txtLy', isset($data) ? $data['ly'] : null ) !!}" />
            </div>
            <div class="form-group">
              <label for="lblHoa">Điểm Môn Hóa</label>
              <input type="text" class="form-control" name="txtHoa" value="{!! old('txtHoa', isset($data) ? $data['hoa'] : null ) !!}" />
            </div>
            <button type="submit" class="btn btn-default">Sửa</button>
            {!! Form::close() !!}
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>