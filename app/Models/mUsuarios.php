<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mUsuarios extends Model
{
    //
    protected $table = 'user';
    protected $fillable = ['user_name','user_lastname','user_password','user_facultity','user_email'];
    protected  $primaryKey = 'iduser'; 
 
    public function getRouteKeyname(){
        return 'iduser';
    }
}
