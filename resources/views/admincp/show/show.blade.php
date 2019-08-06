@extends('admincp.layout.index')

@section('content')


    <div class="container" style="margin-top:20px; margin-left:-15px;">
        <div class="panel panel-primary">
            <div class="panel-heading" style="height: 45px;">
                @foreach($sanpham as $sp)
                <h3 class="panel-title" style="position: relative;padding-top: 5px; font-size:30px;">Danh Sách {{ $sp->producttype->loaisanpham }}</h3>
                @endforeach
            </div>
            <form action="{{ route('loaisanpham.timkiem') }}" method="post" class="navbar-form navbar-left" role="search">
                <input type="hidden" name="_token" value="{{ csrf_token() }}";>
                <div class="form-group">
                    <input type="text" name="keyword" class="form-control timkiem" placeholder="Tìm kiếm">
                </div>
                <button type="submit" class="btn btn-default">Tìm</button>
                <a class="btn btn-default" href="admincp/loaisanpham">Quay lại</a>
            </form>
            <div class="panel-body">
                <table class="table table-bordered" id="postTable">
                    <a type="submit" id="add" class="btn btn-success add" style="margin-top:-8px;"><span id="" class='glyphicon glyphicon-check'></span> Thêm sản phẩm</a>
                    <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Tóm tắt</th>
                        <th>Đánh giá</th>
                        <th>Giá</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    </thead>
                    <?php $stt=0; ?>
                    <tbody>
                    @foreach($sanpham as $sp)
                        <?php $stt += 1; ?>
                        <tr class="item{{ $sp->id }}">
                        <!-- <th scope="row">{{ $stt }}</th> -->
                            <td>{{ $sp->name }}</td>
                            <td>{{ $sp->producttype->loaisanpham }}</td>
                        <!-- <td><img width="180px" height="180x" src="{{ asset('images'). '/' . $sp->anh}}"></td> -->
                            <td>{{ $sp->tomtat }}</td>
                            <td>{{ $sp->danhgia }}</td>
                            <td>{{ $sp->gia }} VNĐ</td>

                            <td>
                            <!-- <button data-id="{{ $sp->id }}" data-title="{{ $sp->name }}" id="show" class="btn btn-success"><span>Xem</button> -->
                                <button data-id="{{ $sp->id }}" data-name="{{ $sp->name }}" data-tomtat="{{ $sp->tomtat }}" data-danhgia="{{ $sp->danhgia }}" data-gia="{{ $sp->gia }}" id="edit" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Sửa </button>
                                <button data-id="{{ $sp->id }}" data-name="{{ $sp->name }}" class="btn btn-danger delete"><span class="glyphicon glyphicon-trash"></span> Xóa </button>
                            </td>
                        </tr>
                    @endforeach
                    <div style="text-align:center">
                        {{--                {{ $sanpham->links() }}--}}
                    </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Tên:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name_add">
                                <p class="errorName text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Loại sản phẩm</label>
                            <select class="form-control" name="id_type" id="typeAdd" style="width: 78.5%;margin-left: 115px; margin-top: -27px;">
                                @foreach($producttype as $sp)
                                    <option value="{{ $sp->id }}" class="loaisp">{{ $sp->loaisanpham }}</option>
                                @endforeach
                            </select>

                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-sm-2">Ảnh:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="anh" id="img_add">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="tomtat">Tóm tắt:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="tomtat_add" name="tomtat" cols="40" rows="5">{{ old('tomtat') }}</textarea>
                                <small>Min: 2, Max: 500, only text</small>
                                <p class="errorTT text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="danhgia">Đánh gía:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="danhgia" id="danhgia_add">
                                <p class="errorDanhgia text-center alert alert-danger hidden"></p>
                                <small>Max 100/100 points</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="gia">Giá:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="gia" id="gia_add">
                                <p class="errorGia text-center alert alert-danger hidden" ></p>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div> -->
                    </form>
                    <div id="validation-errors-create" class="error"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit -->

    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Sửa sản phẩm</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Tên:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name_edit">
                                <p class="errorName text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Loại sản phẩm</label>
                            <select class="form-control" name="id_type" id="typeEdit" style="width: 78.5%;margin-left: 115px; margin-top: -27px;">
                                @foreach($producttype as $sp)
                                    <option value="{{ $sp->id }}" class="loaisp">{{ $sp->loaisanpham }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="tomtat">Tóm tắt:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="tomtat_edit" name="tomtat" cols="40" rows="5"></textarea>
                                <small>Min: 2, Max: 500, only text</small>
                                <p class="errorTT text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="danhgia">Đánh gía:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="danhgia" id="danhgia_edit">
                                <p class="errorDanhgia text-center alert alert-danger hidden"></p>
                                <small>Max 100/100 points</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="gia">Giá:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="gia" id="gia_edit">
                                <p class="errorGia text-center alert alert-danger hidden" ></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Edit
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete -->

    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Xóa sản phẩm</h4>
                </div>
                <p>  Bạn có chắc chắn xóa?</p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary xoa" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-check'></span> Có
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Không
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <form>
        <input type="file">
    </form>

    <!--
<script type="text/javascript" src="{{ asset('restful/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('restful/js/bootstrap.min.js') }}"></script> -->

@endsection


@section('script')
    <script type="text/javascript" src="{{asset('js/ajax.js')}}"></script>
    <script></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(window).load(function(){
            $('#postTable').removeAttr('style');
        })
    </script>
@endsection
