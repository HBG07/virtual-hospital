<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ViewEditUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $usuarios = User::paginate(5);
        return view('user.index')->with('usuarios',$usuarios);
    }

    public function edit(User $user){
        return view('user.edit')->with('usuario',$user);
    }

    public function update(UserRequest $request, User $user){
        $user->fill($request->all());
        $user->password = Hash::make($user->password);
        $user->save();
        Session::flash('warning','El usuario '.$request->name.' ha sido modificado con exito');
        return redirect()->route('user.index');
    }

    public function destroy(User $user){
        $user->delete();
        Session::flash('danger','El usuario '.$user->name.' ha sido eliminado con exito');
        return redirect()->route('user.index');
    }
}
