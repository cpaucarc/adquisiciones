<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $request->validate([
            'password' => 'required',
            'username' => 'required',
        ]);

        $special = array("'", "\"", "\\");
        $password = str_replace($special, '', $request->password);
        $username = str_replace($special, '', $request->username);

        $user = User::where('username', $username)->first();

        if (!$user) {
            return redirect()->back()->withErrors([
                'name' => 'Verifica tu nombre de usuario y contraseña e intentalo otra vez.',
                'oldUsername' => $request->username]);
        }

        if (Hash::check($password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/')
                ->with('status', 'You are logged');
        } else {
            if ($user->password === sha1($password)) {
                $user->update(['password' => Hash::make($password)]);
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->intended('/')
                    ->with('status', 'You are logged');
            } else {
                return redirect()->back()->withErrors([
                    'name' => 'Verifica tu nombre de usuario y contraseña e intentalo otra vez.',
                    'oldUsername' => $request->username]);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('login');

    }
}
