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
          <h3 class="panel-title">Thêm Điểm Học Sinh</h3>
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
          
          <form method="POST" action="{{route('hocsinh.store')}}" name="frmAdd">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/> 
            <div class="form-group">
              <label for="lblHoTen">Họ Tên Học Sinh</label>
              <input type="text" class="form-control" name="txtHoTen" />
            </div>
            <div class="form-group">
              <label for="lblToan">Điểm Môn Toán</label>
              <input type="text" class="form-control" name="txtToan" />
            </div>
            <div class="form-group">
              <label for="lblLy">Điểm Môn Lý</label>
              <input type="text" class="form-control" name="txtLy" />
            </div>
            <div class="form-group">
              <label for="lblHoa">Điểm Môn Hóa</label>
              <input type="text" class="form-control" name="txtHoa" />
            </div>
            <button type="submit" class="btn btn-default">Thêm</button>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>