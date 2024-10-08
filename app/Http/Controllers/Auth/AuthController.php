<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->withErrors([
                'login' => 'Credenciais inválidas.'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('message', 'Você deslogou com sucesso.');
    }
}
