<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Model\BookStore;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        if(Auth::check() === true) {
            return redirect()->route('app.home');
        }

        return view('app.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //faturamento
        $mesAtual = date('m');
        $books = BookStore::all();

        return view('app.dashboard', [
            "books" => $books
        ]);
    }

    public function login(Request $request)
    {
        if(in_array('', $request->only('email', 'password'))) {
            $json['message'] = $this->message->error('Ooops, inform all fields to do login')->render();
            return response()->json($json);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->error('Ooops, something is wrong')->render();
            return response()->json($json);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(!Auth::attempt($credentials)) {
            $json['message'] = $this->message->error('Ooops, e-mail or password are wrong')->render();
            return response()->json($json);
        }
        $nameUser = User::firstWhere('email', $request->email);
        session(['user' => $nameUser['name']]);
        session(['id' => $nameUser['id']]);

        $json['redirect'] = route('app.home');
        return response()->json($json);
    }

    public function register(UserRequest $request)
    {
        $user = User::where('email', $request->email)->get();

        if(!empty($user[0]->email)) {
            return view('admin.users.create', [
                'error' => 'E-mail já existente'
            ]);
        }

        $password = Hash::make($request->password);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $password
        ]);

        return redirect()->route('users.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('app.login');
    }
}
