<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use App\Models\Hosting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    /**
     * Vista home del admin
     *
     * @return void
     */
    public function index(){

        $user = User::where('profile_id', '=', 3)
                    ->orderBy('name', 'ASC')
                    ->get();

        $hostings = Hosting::all();

        return view('admin.home', compact('hostings', 'user'));


    }

    /**
     * Comentario
     *
     * @param [type] $email
     * @return void
     */
    public function check_email($email){

        $check = DB::table('users')
                    ->where('email', '=', $email)
                    ->first();
        
        if (is_null($check)){
            return response()->json(false, 200);
        }else{
            return response()->json(true, 200);
        }
    }

    public function dataGrafica()
    {
        $anno = Carbon::now()->format('Y');
        $fecha_ini = Carbon::createFromDate($anno,1,1)->startOfDay();
        $fecha_fin = Carbon::createFromDate($anno, 12,1)->endOfMonth()->endOfDay();
        
        // Sección para las facturas de los clientes
        $facturas_clientes = Bill::where('type', 'C')->where('status', '1')
        ->select(
            
            DB::raw('date_format(payed_at,"%m/%Y") as created'),
            DB::raw('SUM(amount) as montos'),
        )
        ->whereBetween('payed_at', [$fecha_ini, $fecha_fin])
        ->groupBy('created')
        ->get()
        ->toArray();

        for ( $date = $fecha_ini->copy(); $date->lt( $fecha_fin) ; $date->addMonth(1) ) {

            $valores[$date->format('m/Y')] = 0;
     
        }
        
        foreach($facturas_clientes as $key => $orden){
            $valores[$orden['created']] = $orden['montos'];
        }
        //arreglado
        $data_clientes = [];
        foreach($valores as $valor){
            $data_clientes[] = floatVal($valor);
        }

        // Sección para las facturas de los empleados
        $facturas_empleados = Bill::where('type', 'E')->where('status', '1')
        ->select(
            
            DB::raw('date_format(payed_at,"%m/%Y") as created'),
            DB::raw('SUM(amount) as montos'),
        )
        ->whereBetween('payed_at', [$fecha_ini, $fecha_fin])
        ->groupBy('created')
        ->get()
        ->toArray();

        for ( $date = $fecha_ini->copy(); $date->lt( $fecha_fin) ; $date->addMonth(1) ) {

            $valores[$date->format('m/Y')] = 0;
     
        }
        
        foreach($facturas_empleados as $key => $orden){
            $valores[$orden['created']] = $orden['montos'];
        }
        //arreglado
        $data_empleados = [];
        foreach($valores as $valor){
            $data_empleados[] = floatVal($valor);
        }

        $data = [
            'data_clientes' => $data_clientes,
            'data_empleados' => $data_empleados
        ];
     
        return response()->json(['valores' => $data]);

    }
}