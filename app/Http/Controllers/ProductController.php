<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Product;
use App\ProductType;
use View;
use App\Http\Requests\RequestSanPham;


class ProductController extends Controller
{
    protected $rules =
        [
            'name' => 'required|min:2|max:32|',
            'tomtat' => 'required|min:2|max:500|',
            'danhgia' => 'required|min:1|max:4'
        ];

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $product = Product::all();
        $producttype = ProductType::all();
        return view('admincp.sanpham.list', ['product'=>$product, 'producttype'=>$producttype]);
    }

    public function create()
    {
        return view('admincp.sanpham.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),$this->rules);
        if($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }else{

            $product = $this->product->add($request->all());
            $type = ProductType::find($product->id_type);

            return response()-> json(['product'=>$product, 'type'=>$type]);
        }
    }

    public function show($id)
    {
        $post = Product::findOrFail($id);
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
            $this->product->updateProduct($request->all(), $id);
            $product = Product::findOrFail($id);
            $type    = ProductType::find($product->id_type);
            if($product->id_type == $type->id){
                return response()->json(['product'=>$product, 'type'=>$type]);
            }
        }

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json($product);
    }

    public function timkiem(Request $request){
        $keyword = $request->keyword;
        $producttype = ProductType::all();
        $list = Product::select('product.*')->join('producttype', 'product.id_type', '=' , 'producttype.id')
            ->where('producttype.loaisanpham', 'like', '%'. $keyword . '%')
            ->orwhere('product.name', 'like', '%'. $keyword . '%')->get();

        return view('admincp.timkiem.search', ['product'=>$list, 'producttype'=>$producttype]);
    }

}










