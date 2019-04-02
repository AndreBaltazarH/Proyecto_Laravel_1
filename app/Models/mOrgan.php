<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mOrgan extends Model
{
    protected $table = 'organ';
    protected $fillable = ['faculty_idfaculty','organ_name','organ_status'];
    protected  $primaryKey = 'idOrgan'; 

    public function getRouteKeyname(){
        return 'idOrgan';
    }
}
