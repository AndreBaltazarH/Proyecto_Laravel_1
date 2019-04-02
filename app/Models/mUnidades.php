<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mUnidades extends Model
{
     //
     protected $table = 'unity';
     protected $fillable = ['unity_name','unity_functions','unity_email','unity_secretary','unity_annexed','unity_horary','Organ_idOrgan',
     'second_level_idsecond_level','edifice_idedifice','unity_unit_boss','unity_address'];
     //protected $fillable = ['unity_name','unity_in_charge','unity_functions','unity_email','unity_in_charge_photo','unity_photo_charge',
     //'unity_status','unity_secretary','unity_annexed','unity_horary','Organ_idOrgan','second_level_idsecond_level','edifice_idedifice','unity_unit_boss','unity_address'];
     protected  $primaryKey = 'idunity'; 
 
     public function getRouteKeyname(){
         return 'idunity';
     }
     
}
