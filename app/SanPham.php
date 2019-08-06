<?php

namespace App;

use App\ProductType;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table ="sanpham";

    protected $fillable = ['name', 'tomtat','danhgia', 'gia', 'id_type'];

    public function producttype(){
        return $this->belongsTo('App\ProductType','id_type', 'id');
    }

    public function showSanPham()
    {
        $sanpham = SanPham::all();
        return $sanpham;
    }

    public function add($input)
    {
        return SanPham::create($input);
    }

    public function findId($id){
        $sanpham = SanPham::findOrFail($id);
        return $sanpham;
    }

    public function updateSanPham($input, $id){
        $request = new SanPham();
        $sanpham = $this->findId($id);
        if($sanpham){
            return $sanpham->update($input);
        }
    }

    public function deleteSanPham($id){
        $sanpham = $this->findId($id);
        if(sanpham){
            return $sanpham->delete();
        }
    }
}
