<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $user=User::orderBy('id','desc')->get();
        return view("users.index",compact('user'));
    }

    public function addUsers(Request $request){
        $request->validate([
            'name'=>'required',
            'prenom'=>'required',
            'email'=>'required',
            'sexe'=>'required'
        ],

        [
            'name.required'=>'renseigney le nom',
            'prenom.required'=>'renseigney le prenom',
            'email.required'=>'renseignez l\'email',
            'sexe.required'=>'renseignez le sexe'
        ]
        );
        //dd($request->all());
         $user=   User::create(
                [
                    'name'=>$request->name,
                    'prenom'=>$request->prenom,
                    'email'=>$request->email,
                    'sexe'=>$request->sexe,
                    'telephone'=>$request->telephone,
                    'poste'=>$request->poste,
                    'specialite'=>$request->specialite,
                    'lieu'=>$request->lieu,
                    'date'=>$request->date,
                ]

                );
                $user->notify(new UserNotification());
                return back()->with('info','utilisateur enregistre avec success');
    }
    public function editUser($id){
        $user=User::find($id);
        $role=Role::all();
        return view('users.edit',compact('user','role'));
    }

    public function edition(Request $request,User $user)
{
        $request->validate([],[]);

        $user->update([
            'password'=>sha1($request->password),
            'role_id'=>$request->role_id,
            'name'=>$request->name,
            'specialite'=>$request->specialite,
            'prenom'=>$request->prenom,
            'email'=>$request->email,
            'telephone'=>$request->telephone,
        ]);
        return back()->with('success','mise a jour realisée avec succes');
}
public function softUser($id){
    $user=User::find($id);
    $user->forcedelete();
    return back()->with('success','utilisateur supprimé avec succes');
}
}
