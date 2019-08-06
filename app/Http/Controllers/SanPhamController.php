<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\SanPham;
use App\ProductType;
use View;
use App\Http\Requests\RequestSanPham;


class SanPhamController extends Controller
{
    protected $rules =
        [
            'name' => 'required|min:2|max:32|',
            'tomtat' => 'required|min:2|max:500|',
            'danhgia' => 'required|min:1|max:4'
        ];

    protected $sanpham;

    public function __construct(SanPham $sanpham)
    {
        $this->sanpham = $sanpham;
    }

    public function index()
    {
        $sanpham = SanPham::all();
        $producttype = ProductType::all();
        return view('admincp.sanpham.list', ['sanpham' => $sanpham, 'producttype' => $producttype]);
    }

    public function create()
    {
        return view('admincp.sanpham.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {

            $sanpham = $this->sanpham->add($request->all());
            $type = ProductType::find($sanpham->id_type);

            return response()->json(['sanpham' => $sanpham, 'type' => $type]);
        }
    }

    public function show($id)
    {
        $post = SanPham::findOrFail($id);
        return view('sanpham.show', ['sanpham' => $post]);
    }

    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $this->sanpham->updateSanPham($request->all(), $id);
            $product = SanPham::findOrFail($id);
            $type    = ProductType::find($product->id_type);
            if($product->id_type == $type->id){
                return response()->json(['sanpham'=>$product, 'type'=>$type]);
            }
        }

    }

}
