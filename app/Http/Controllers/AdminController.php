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

        $billC = Bill::select(
            DB::raw('sum(amount) as monto'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as mes"))
            ->where('type','C')->groupBy('mes')->orderBy('mes', 'DESC')->get();

        $billC->toArray();

        $Clientes = [];

        //Testeando////////////////////////////////////////////////////////////
            /*$anno = Carbon::now()->format('Y');
            $fecha_ini = Carbon::createFromDate($anno,1,1)->startOfDay();
            $fecha_fin = Carbon::createFromDate($anno, 12,1)->endOfMonth()->endOfDay();

            //Factura de empleadoss/////////////////////////////////////////////////////////////
            $facturaEmpleado= Bill::select(
            DB::raw('DATE_FORMAT(created_at,"%m %Y") as mes'),
            DB::raw('SUM(amount) as monto'))
            ->where('type', 'E')->whereBetween('created_at', [$fecha_ini, $fecha_fin])->groupBy('mes')->orderBy('mes', 'ASC')->get();

            $facturaEmpleado->toArray();
            $Empleado = []; */

            //testeando///////////////////////////////////////////////////
           /* $anno = Carbon::now()->format('Y');

            $fecha_ini = Carbon::createFromDate($anno,1,1)->startOfDay();
            $fecha_fin = Carbon::createFromDate($anno, 12,1)->endOfMonth()->endOfDay();

            //Factura de empleadoss/////////////////////////////////////////////////////////////
            $facturaEmpleado= Bill::select(
            DB::raw('DATE_FORMAT(created_at,"%m ") as mes'),
            DB::raw('SUM(amount) as monto'))
            ->where('type', 'C')->whereBetween('created_at', [$fecha_ini, $fecha_fin])->groupBy('mes')->orderBy('mes', 'ASC')->get();
                $m = $facturaEmpleado->count();
            $facturaEmpleado->toArray();
            $Empleado = [];
            for($j = 0; $j < $m; $j++) {


                array_push($Empleado, $facturaEmpleado[$j]['monto']);

            } */
            $anno = Carbon::now()->format('Y');
            $fecha_ini = Carbon::createFromDate($anno,1,1)->startOfDay();
            $fecha_fin = Carbon::createFromDate($anno, 12,1)->endOfMonth()->endOfDay();
            $facturaCliente= Bill::select(
                DB::raw('DATE_FORMAT(payed_at,"%m %Y") as mes'),
                DB::raw('SUM(amount) as monto'))
                ->where('status','1')->where('type', 'E')->whereBetween('created_at', [$fecha_ini, $fecha_fin])->groupBy('mes')->orderBy('mes', 'ASC')->get();
                $m = $facturaCliente->count();

                $facturaFecha= Bill::select(
                    DB::raw('DATE_FORMAT(payed_at,"%M ") as mes'))->where('status','1')->whereBetween('created_at', [$fecha_ini, $fecha_fin])->groupBy('mes')->orderBy('mes', 'ASC')->get();

            $mont= [];
            for($i = 0; $i < $m; $i++) {

                $facturaCliente[$i];
                array_push($Clientes, $facturaCliente[$i]['monto']);
                array_push(  $mont , $facturaFecha[$i]['mes']);

            }
                //return $facturaEmpleado;
           // return    $mont;
        return view('admin.home', compact('hostings', 'user','billC'));
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
       /* $anno = Carbon::now()->format('Y');
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


            $billE = Bill::select(
            DB::raw('sum(amount) as monto'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as mes"))
            ->where('type','E')->groupBy('mes')->orderBy('mes', 'DESC')->get();

            $billE->toArray();
            $Empleados = [];
            for($i = 0; $i <= 5; $i++) {
                $billE[$i];
                array_push($Empleados,$billE[$i]['monto']);

            }

            $billC = Bill::select(
                DB::raw('sum(amount) as monto'),
                DB::raw("DATE_FORMAT(created_at,'%M %Y') as mes"))
                ->where('type','C')->groupBy('mes')->orderBy('mes', 'DESC')->get();

            $billC->toArray();
            $Clientes = [];
            for($j = 0; $j <= 2; $j++) {
                $billC[$j];
                array_push($Clientes,$billC[$j]['monto']);

            }  */
            //return $B;

            //Obtener fecha para generar las facturas ////////////////////////////////////////////
            $anno = Carbon::now()->format('Y');
            $fecha_ini = Carbon::createFromDate($anno,1,1)->startOfDay();
            $fecha_fin = Carbon::createFromDate($anno, 12,1)->endOfMonth()->endOfDay();

            $facturaFecha = Bill::select(
                            DB::raw('DATE_FORMAT(payed_at,"%M ") as mes'))
                            ->where('status','1')
                            ->whereBetween('created_at', [$fecha_ini, $fecha_fin])
                            ->groupBy('mes')
                            ->orderBy('mes', 'DESC')
                            ->get();

            //Factura de empleadoss/////////////////////////////////////////////////////////////
            $facturaEmpleado = Bill::select(
                DB::raw('DATE_FORMAT(payed_at,"%m %Y") as mes'),
                DB::raw('SUM(amount) as monto'))
                ->where('status','1')
                ->where('type', 'E')
                ->whereBetween('created_at', [$fecha_ini, $fecha_fin])
                ->groupBy('mes')
                ->orderBy('mes', 'ASC')
                ->get();

            $m = $facturaEmpleado->count();

            $facturaEmpleado->toArray();
            $Empleado = [];
            for($j = 0; $j < $m; $j++) {

                $facturaEmpleado[$j];
                array_push($Empleado, $facturaEmpleado[$j]['monto']);

            }

            //Factura de Clientes/////////////////////////////////////////////////////////
            $facturaCliente= Bill::select(
            DB::raw('DATE_FORMAT(payed_at,"%m %Y") as mes'),
            DB::raw('SUM(amount) as monto'))
                ->where('status','1')
                ->where('type', 'C')
                ->whereBetween('created_at', [$fecha_ini, $fecha_fin])
                ->groupBy('mes')
                ->orderBy('mes', 'ASC')
                ->get();

            $m2 = $facturaCliente->count();

            $facturaCliente->toArray();
            $Clientes = [];
            $mont= [];
            for($i = 0; $i < $m2; $i++) {

                $facturaCliente[$i];
                array_push($Clientes, $facturaCliente[$i]['monto']);
                array_push(  $mont , $facturaFecha[$i]['mes']);

            }

            $data = [
                'data_clientes' => $Clientes,
                'data_empleados' =>  $Empleado,
                'data_mes'=>$mont
            ];

            return response()->json(['valores' => $data]);

        }
}

