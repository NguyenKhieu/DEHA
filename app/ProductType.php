<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table ="producttype";

    protected $fillable = ['loaisanpham', 'thuonghieu','noidung'];

    public function sanpham(){
        return $this->hasMany('App\Product','id_type', 'id');
    }

    public function add($input)
    {
        return ProductType::create($input);
    }

    public function findId($id){
        $type = ProductType::findOrFail($id);
        return $type;
    }

    public function updateType($input, $id){
        $request = new ProductType();
        $type = $this->findId($id);
        if($type){
            return $type->update($input);
        }
    }

    public function deleteSanPham($id){
        $type = $this->findId($id);
        if($type){
            return $type->delete();
        }
    }

    public function publish()
    {
        $this->published_at = now();
        $this->save();
    }
}
