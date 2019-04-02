<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mEdificio extends Model
{
    protected $table = 'edifice';
    protected $fillable = ['edifice_name','edifice_status'];
    protected  $primaryKey = 'idedifice'; 

    public function getRouteKeyname(){
        return 'idedifice';
    }
}
