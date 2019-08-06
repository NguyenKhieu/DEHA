<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HocSinh;
class HocSinhController extends Controller
{
    public function index(){
        $hocsinh = HocSinh::all();
        return view('restful.list',['hocsinh'=>$hocsinh]);
    }

    public function create(){
        return view('restful.add');
    }

    public function store(Request $rq){
        $hocsinh = new HocSinh;
        $hocsinh->ten = $rq->txtHoTen;
        $hocsinh->toan = $rq->txtToan;
        $hocsinh->ly   = $rq->txtLy;
        $hocsinh->hoa  = $rq->txtHoa;
        $hocsinh->save();

        return redirect()->route('hocsinh.index');
    }

    //Form hiển thị dòng dữ liệu

    public function show($id){
        echo "Đây là dòng dữ liệu thứ $id";
    }

    // Form update dữ liệu
    public function edit($id){
        $hocsinh = HocSinh::find($id);
        // $this->validate($rq,)
        return view('restful.edit', ['data'=>$hocsinh]);
    }

    public function update(Request $rq, $id){
        $hocsinh = HocSinh::find($id);
        // $this->validate($rq,)
        $hocsinh->ten = $rq->txtHoTen;
        $hocsinh->toan = $rq->txtToan;
        $hocsinh->ly   = $rq->txtLy;
        $hocsinh->hoa  = $rq->txtHoa;
        $hocsinh->save();

        return redirect()->route('hocsinh.index');
    }

    public function destroy($id){
        $hocsinh = HocSinh::findOrFail($id);
        $hocsinh->delete();
        return redirect()->route('hocsinh.index');
    }
}
