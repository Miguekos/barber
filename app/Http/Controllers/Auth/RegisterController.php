<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Barber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $barbers = Barber::all();
        return view('auth.register',compact('barbers'));
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:2|confirmed',
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
       // return $request->all();
        $this->validator($request->all())->validate();
        $crear = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol' => $request->rol,
            'barber_id' => $request->barber_id,
            'porcent' => $request->porcent,
        ]);
        // return $crear;
        return redirect()->route('user.index')->with('flash','Se guardo el empleado correctamente');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
//    protected function guard()
//    {
//        return Auth::guard();
//    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
