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
use App\Repositories\Post\PostRepositoryInterface;

class SanPhamController extends Controller
{
    protected $rules =
        [
            'name' => 'required|min:2|max:32|',
            'tomtat' => 'required|min:2|max:500|',
            'danhgia' => 'required|min:1|max:2'
        ];

    public function index()
    {
        $sanpham = SanPham::all();
        $producttype = ProductType::all();
        return view('admincp.sanpham.list', ['sanpham'=>$sanpham, 'producttype'=>$producttype]);
    }

    public function create()
    {
        return view('admincp.sanpham.add');
    }

    public function store(Request $request)
    {
        // echo $rules;

        $validator = Validator::make($request->all(),$this->rules);
        if($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else{
            $sanpham = new SanPham;
            $sanpham->name    = $request->name;
            $sanpham->tomtat  = $request->tomtat;
            $sanpham->danhgia = $request->danhgia;
            $sanpham->gia     = $request->gia;
            $sanpham->id_type = $request->id_type;

            $sanpham->save();
            $type = ProductType::all();

            return response()-> json(['sanpham'=>$sanpham, 'type'=>$type]);
        }
    }

    public function show($id)
    {
        $post = SanPham::findOrFail($id);

        return view('sanpham.show', ['sanpham' => $post]);
    }

    public function edit($id){

    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $post = SanPham::findOrFail($id);

            $post->name     = $request->name;
            $post->tomtat   = $request->tomtat;
            $post->id_type  = $request->id_type;
            $post->danhgia  = $request->danhgia;
            $post->gia      = $request->gia;


            $post->save();

//            $sanpham = SanPham::all();
            $type    = ProductType::find($post->id_type);

            if($post->id_type == $type->id){
                return response()->json(['sanpham'=>$post, 'type'=>$type]);
            }


//            return response()->json(['sanpham'=>$post, 'type'=>$type]);
        }
    }

    public function destroy($id)
    {
        $sanpham = SanPham::findOrFail($id);
        $sanpham->delete();
        return response()->json($sanpham);
    }

    public function changeStatus()
    {
        // $id = Input::get('id');

        // $post = Post::findOrFail($id);
        // $post->is_published = !$post->is_published;
        // $post->save();

        // return response()->json($post);
    }
}










