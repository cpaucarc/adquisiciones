<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
//    public function __invoke()
//    {
//        return "Bienvenido al login desdde controller";
//    }

    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $special = array("'", "\"", "\\");
        $password = str_replace($special, '', $request->password);
        $username = str_replace($special, '', $request->username);

        $user = DB::table('users')
            ->where('username', $username)
            ->whereRaw('password', "sha1($password)")
            ->first();

        if ($user) {
            return redirect()->back()->withErrors(['name' => 'Welcome bitch']);
        } else {
            return redirect()->back()->withErrors([
                'name' => 'Verifica tu nombre de usuario y contraseña e intentalo otra vez.',
                'username' => $request->username]);
        }
    }
}
