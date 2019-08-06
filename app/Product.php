<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ="product";

    protected $fillable = ['name', 'tomtat','nsx', 'gia', 'id_type'];

    public function producttype(){
        return $this->belongsTo('App\ProductType','id_type', 'id');
    }

    public function showProduct()
    {
        $sanpham = Product::all();
        return $sanpham;
    }

    public function add($input)
    {
        return Product::create($input);
    }

    public function findId($id){
        $sanpham = Product::findOrFail($id);
        return $sanpham;
    }

    public function updateProduct($input, $id){
        $request = new Product();
        $sanpham = $this->findId($id);
        if($sanpham){
            return $sanpham->update($input);
        }
    }

    public function deleteProduct($id){
        $sanpham = $this->findId($id);
        if(sanpham){
            return $sanpham->delete();
        }
    }
}
