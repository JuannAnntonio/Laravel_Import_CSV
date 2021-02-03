<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    //aquellos campos que si se pueden modificar
    public $fillable = ['titulo', 'descripcion','imagen_url', 'precio'];



    public static function insertData($data){

        //$value=DB::table('productos')->where('username', $data['username'])->get();
        //if($value->count() == 0){
           DB::table('users')->insert($data);
        //}
     }
}
