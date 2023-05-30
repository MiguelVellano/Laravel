<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function users(){
        $search = request('search');
        if($search){
            $users = User::where([
                ['name','like','%'.$search.'%']
            ])->get();
        }else{
            $users=User::paginate(5);                 
        }
        return view('users.edit',['users'=>$users, 'search'=>$search]);
    }
    public function destroy($id){
        User::findOrFail($id)->delete();
        return redirect('dashboard')->with('msg','Usuário excluido com sucesso!');
    }   
    public function alter($id){
        $users=User::findOrFail($id);
        return view('users.alter',['users' => $users]);
    }
    public function update(Request $request){
        User::findOrFail($request->id)->update($request->all());
        return redirect('dashboard')->with('msg','Usuário editado com sucesso!');
    }
    public function store(Request $request){
        $users = new User;
        $users->id = $request->id;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;

        $users->save();

        return redirect('dashboard')->with('msg','Usuário cadastrado com sucesso!');
    }
}
