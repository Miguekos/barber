<?php

namespace App\Http\Controllers;
use App\Barber;
use App\Barbercierre;
use App\Roles;
use App\User;
use App\Corte;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {

        // $inicio = Cierre::where('user_id',$id)->orderBy('id','desc')->first();
        //
        // if ($inicio){
        //   $calc1 = Cierre::where([
        //     'user_id' => $id,
        //     'accion' => 'deposito',
        //     ])->sum('monto');
        //   $calc2 = Cierre::where([
        //     'user_id' => $id,
        //     'accion' => 'retiro',
        //     ])->sum('monto');
        //   $inicio_m = $calc1 - $calc2;
        // }else{
        //   $inicio_m = 0;
        // }
        // return $inicio->monto;



        // $barbers = Barber::where([
        //     'id' => $barber_id,
        // ])->first();
        // $barber = $barbers->nombre;


        return view('dashboard');
    }


    public function barberos()
    {
      $usuario = User::all();
      return view('barberos',compact('usuario'));
    }


    public function cerrarBarbero(Request $request)
    {
//       $datos = Corte::where('user_id',$request->barber_id)->get();

        //validar admin
//        return $request->all();
//        if ($request->barbero_id == "1"){
//            return back()->with('flash','Eres administrador');
//        }else{

//            $barberoo = Barbercierre::where([
//                ['barbero_id', '=', $request->barbero_id],
//         ['created_at', 'LIKE', date('Y-m-d%')],
//            ])->orderBy('id','DESC')->first();

//            if ($barberoo){
//                $fecha = $barberoo->fecha;

//        return $fecha;

                $suma = Corte::where([
                    ['user_id', '=', $request->barbero_id],
                    ['activo', '>=', 1],
                ])->sum('valor');

                $cantidad_cortes = Corte::where([
                    ['user_id', '=', $request->barbero_id],
                    ['activo', '>=', 1],
                ])->count();

                $barbero_id = $request->barbero_id;
                $porcentaje = $request->porcent;
                $por_pagar = ($porcentaje / 100) * $suma;
                $nombre_cierre = $request->nombre;

                $detalle = Barbercierre::where('barbero_id',$request->barbero_id)->get();


                return view('detalleCierre',compact('suma','por_pagar','nombre_cierre','barbero_id','detalle','cantidad_cortes'));
//            } else{
//                return back()->with('success','No tiene cortes por cerrar..!!');
//            }
//        }


      //sumar y calcular por usuarios
    //   $usuarios = User::all();
    //   $id = auth()->user()->id;
    //   $suma= Pago::where([
    //     'a_caja' => 'Si',
    //     ])->sum('abono');
    //   $porcent = auth()->user()->porcent_id;
    //   $porce = 0;
    //   $total = 0;
    //   $pago = Pago::all();
    //   $entregar = 0;
    //   return view('pago_admin',compact('pago','total','porcent','entregar','usuarios'));

    // $total_r = Pago::all();

    // $despachos=DB::table('pagos')
    //         ->join('productos', 'despachos.id_producto', '=', 'productos.id')
    //         ->where('despachos.id_cliente', '=', $id)
    //          ->whereBetween('despachos.fecha', array($fechain,$fechater))
    //         ->select('productos.nombre',DB::raw('sum(despachos.cantidad) as cantidad'),DB::raw('sum(total) as total'))
    //         ->groupBy('despachos.id_producto')
    //         ->get();



    // $user = DB::table('nominas')
    //          ->select('usuario','user_id_nomina', DB::raw('sum(abono_recaudado) as recaudado'), DB::raw('sum(pago_empleado) as pago_empleado'))
    //          ->where('created_at','>','2018-07-30 06:09:35')
    //          ->groupBy('usuario','user_id_nomina')
    //          ->get();

      // foreach ($user as $key) {
      //
      //   $existe = Cierre::where('user_id',$key->user_id_nomina)->first();
      //   if ($existe){
      //     $inicio_m = Cierre::where('user_id',$key->user_id_nomina)->orderBy('id','desc')->first();
      //     $calc = $key->recaudado - $key->pago_empleado;
      //     $inicio_d = $inicio_m->monto;
      //     $inicio_m = $inicio_m->monto + $calc;
      //     $recaudo = Pago::where('created_at','>','2018-07-30 06:09:35')->get();
      //     return view('pago_admin',compact('user','recaudo','inicio_m','inicio_d'));
      //   }else{
      //     $inicio_d = 0;
      //      $inicio_m = 0;
      //      $recaudo = Pago::where('created_at','>','2018-07-30 06:09:35')->get();
      //      return view('pago_admin',compact('user','recaudo','inicio_m','inicio_d'));
      //
      //    }
      // }
      // $recaudo = Pago::where('created_at','>','2018-07-30 06:09:35')->get();
      // return view('pago_admin',compact('user','recaudo'));

    }

    public function barberosCierre(Request $request)
    {

        if (!$request->recaudado){
            return back()->with('flash','No puedes cerrar caja sin ventas..!!');
        }else{
        $dato = Barbercierre::create($request->all());
        $dato->save();

        Corte::where('activo', 1)
            ->where('user_id',$request->barbero_id)
            ->update(['activo' => 0]);

        return redirect()->route('barberos')->with('success','Se cerro correctamente las cuentas.!');
//        return $request->all();
        }
    }


    public function cambioclave(Request $request, $empleado)
    {
      $password = bcrypt($request->password);
      DB::table('users')
            ->where('id', $empleado)
            ->update(['password' => $password]);
      return back()->with('flash','Se actualizo la contraseña correctamente');

    }


    public function cambioclaveform()
    {
      return view('auth.reset');

    }


}
