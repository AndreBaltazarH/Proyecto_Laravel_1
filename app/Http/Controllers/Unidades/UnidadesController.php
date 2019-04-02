<?php

namespace App\Http\Controllers\Unidades;

use App\Http\Controllers\Controller;
use App\Models\mUnidades;
use App\Models\mEdificio;
use App\Models\mOrgan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UnidadesController extends Controller
{
    //
    public function index(Request $request)
    {
        $valor = $request->session()->get('eUsuario', 'default');        
        if($valor == 'default'){ return redirect()->route("login_index"); }

        $unidades = mUnidades::all();        
        $title = 'Listado de Unidades';        
        return view("Unidades/vbUnidades_list",compact('unidades','title','valor'));
    }

    
    public function ver(Request $request,$id)
    {
        $valor = $request->session()->get('eUsuario', 'default');
        if($valor == 'default'){ return redirect()->route("login_index"); }

        $unidad = DB::select('SELECT ut.unity_name,unity_address,ut.unity_horary,ut.unity_secretary,ut.unity_email,
        og.organ_name,ed.edifice_name,ifnull(ut.unity_unit_boss,"") unity_unit_boss FROM unity ut
        INNER JOIN edifice ed ON ut.edifice_idedifice = ed.idedifice
        INNER JOIN organ og ON ut.organ_idorgan = og.idOrgan
        WHERE ut.idunity = ?', [$id]); 
        
        return view("Unidades/vbUnidades_ver",[
            'unidad' => $unidad[0],
            'valor' => $valor
        ]);
    }

    public function detalles(Request $request,$id)
    {        
        $valor = $request->session()->get('eUsuario', 'default');
        if($valor == 'default'){ return redirect()->route("login_index"); }

        $unidades = DB::select('SELECT ut.idunity,ut.unity_name,unity_address,ut.unity_horary,ut.unity_secretary,ut.unity_email,
        ut.unity_annexed,ut.Organ_idOrgan,ut.edifice_idedifice,ifnull(ut.unity_unit_boss,"") unity_unit_boss,unity_functions  FROM unity ut
        INNER JOIN edifice ed ON ut.edifice_idedifice = ed.idedifice
        INNER JOIN organ og ON ut.organ_idorgan = og.idOrgan
        WHERE ut.idunity = ?', [$id]);

        $edificios = mEdificio::all();
        $organs = mOrgan::all();        
        if ($unidades==null){
            $unidades = new mUnidades;            
            return view("Unidades/vbUnidades_mant", [
                'id' => $id,
                'unidad' => $unidades,
                'edificios' => $edificios,
                'organs' => $organs,
                'valor' => $valor
            ]);
        }
        return view("Unidades/vbUnidades_mant", [
            'id' => $id,
            'unidad' => $unidades[0],
            'edificios' => $edificios,
            'organs' => $organs,
            'valor' => $valor
        ]);
    }

    public function eliminar(Request $request,$id)
    { 
        $valor = $request->session()->get('eUsuario', 'default');
        if($valor == 'default'){ return redirect()->route("login_index"); } 
             
        DB::table('unity')->where('idunity', $id)->delete();        
        return redirect()->route("unidad_index",[
            'valor' => $valor
        ]);
    }

    public function ejecutar(Request $request)
    {    
        $valor = $request->session()->get('eUsuario', 'default');
        if($valor == 'default'){ return redirect()->route("login_index"); }

        $data = request()->all();        
        if ($data['command'] == "Actualizar"){ 
            $data = request()->validate([
                'idunity'=> 'required',
                'unity_name'=> 'required',
                'unity_horary'=> 'required',
                'unity_email'=> ['required','email'],
                'unity_functions'=> '',
                'unity_annexed'=> '',
                'idedifice'=> 'required',
                'idOrgan'=> 'required',
                'unity_unit_boss'=> 'required',
                'unity_address'=> 'required',
                'unity_secretary'=> ''
            ],[
                'unity_name.required'=>'el Nombre es Obligatorio',
                'unity_horary.required'=>'el Horario es Obligatorio',
                'unity_email.required'=>'el Correo es Obligatorio',
                'idedifice.required'=>'Seleccione un Organo',
                'idOrgan.required'=>'Seleccione un Edificio',
                'unity_unit_boss.required'=>'nombre al Jefe de Unidad es Obligatorio',
                'unity_address.required'=>'la Direccion es Obligatorio'
            ]);
            DB::table('unity')
            ->where('idunity', $data['idunity'])
            ->update([
                'unity_name' => $data['unity_name'],
                'unity_horary' => $data['unity_horary'],
                'unity_email' => $data['unity_email'],
                'unity_functions' => $data['unity_functions'],
                'unity_annexed' => $data['unity_annexed'],
                'unity_unit_boss' => $data['unity_unit_boss'],
                'Organ_idOrgan' => $data['idOrgan'],
                'edifice_idedifice' => $data['idedifice'],
                'unity_address' => $data['unity_address'],
                'unity_secretary' => $data['unity_secretary']
                ]);

            return redirect()->route("unidad_index",[
                'valor' => $valor
            ]);
        } else {
            $data = request()->validate([
                'unity_name'=> 'required',
                'unity_horary'=> 'required',
                'unity_email'=> ['required','email'],
                'unity_functions'=> '',
                'unity_annexed'=> '',
                'Organ_idOrgan'=> 'required',
                'edifice_idedifice'=> 'required',
                'unity_unit_boss'=> 'required',
                'unity_address'=> 'required',
                'unity_secretary'=> ''
            ],[
                'unity_name.required'=>'el Nombre es Obligatorio',
                'unity_horary.required'=>'el Horario es Obligatorio',
                'unity_email.required'=>'el Correo es Obligatorio',
                'Organ_idOrgan.required'=>'Seleccione un Organo',
                'edifice_idedifice.required'=>'Seleccione un Edificio',
                'unity_unit_boss.required'=>'nombre al Jefe de Unidad es Obligatorio',
                'unity_address.required'=>'la Direccion es Obligatorio'
            ]);
            
            Usuario::create([
                'unity_name'=> $data['unity_name'],
                'unity_horary'=> $data['unity_horary'],
                'unity_email'=> $data['unity_email'],
                'unity_functions'=> $data['unity_functions'],
                'unity_annexed'=> $data['unity_annexed'],
                'Organ_idOrgan'=> $data['Organ_idOrgan'],
                'edifice_idedifice'=> $data['edifice_idedifice'],
                'unity_unit_boss'=> $data['unity_unit_boss'],
                'unity_address'=> $data['unity_address'],
                'unity_secretary'=> $data['unity_secretary']
            ]);

            return redirect()->route("unidad_index",[
                'valor' => $valor
            ]);
        }; 
        return redirect()->route("unidad_index",[
            'valor' => $valor
        ]);
    }
}
