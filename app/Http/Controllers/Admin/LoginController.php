<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function loginForm(){
        return view('pages.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'name' => 'required|min:1',
            'password' => 'required'
        ]);
        if(\Auth::attempt([ //attempt- попытка проверить сходства
            'name'=> $request->get('name'),
            'password' => $request->get('password')
        ])){
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('status','Неверный логин или пароль');
    }
    public function logout(){
        \Auth::logout();
        return redirect('/')->with('exit','Вы успешно вышли из своего аккаунта');
    }
}
