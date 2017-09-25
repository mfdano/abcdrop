<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use App\User;

class UsersController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Name: '.$request->name);
        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->date = 123;
        $user->save();
        return response()->json([
            'status' => 'OK'
        ]);
    }

    public function isEmailUsed(Request $request) {
        Log::info('Email: '.$request->email);
        $isUsed = DB::table('users')->where('email',  $request->email)->get();
        return $isUsed;
    }

    public function logout(Request $request) {
        Log::info('LOGOUT');
        Auth::logout();
        return Redirect::to('/');
    }

    public function login(Request $request)
    {
        //dd($request);
        Log::info('PASSWORD: '.$request->password);
        $user = DB::table('users')->where('email',  $request->email)->first();
        if(!$user) {
            return response()->json([
                'error' => 'La dirección de correo no está registrada'
            ]);
        } else {
            Log::info('ENTRA 0: ');
            if (Hash::check($request->password, $user->password)) {
                Auth::loginUsingId($user->id);
                Log::info('ENTRA LOGIN: ');
                return response()->json([
                    'OK' => 'OK'
                ]);
            } else {
                return response()->json([
                    'error' => 'La contraseña es incorrecta'
                ]);
            }
        }
    }

    public function stats(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $activities = $user->activities()->orderBy('activity_user.created_at', 'desc')->get();
        return view('stats')->with('activities',$activities);
    }

}
