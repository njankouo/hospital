<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){

        return view('role.create');
    }
     public function liste(){
          $data=[
            'role'=>User::all()
        ];
        return view('role.role',$data);
    }
    public function insertion(Request $request){
        $request->validate([
            'nom'=>'required',
          //  'prenom'=>'required',
            'telephone1'=>'required|unique:users,telephone1',
            'email'=>'required|unique:users,email',
            'sexe'=>'required',
           // 'pieceIdentite'=>'required',
            // 'password'=>'required|unique:users,password',
           // 'numeroPieceIdentite'=>'required|unique:users,numeroPieceIdentite',


        ],
        [
            'nom.required'=>'renseignez le nom',
           // 'prenom.required'=>'renseignez le prenom',
            'telephone1.required'=>'renseignez le telephone1',
            'email.required'=>'renseignez e-mail',
            'sexe.required'=>'renseignez sexe',
           // 'pieceIdentite.required'=>'renseignez piece d\'identite',
            // 'password.required'=>'renseignez le password',
           // 'numeroPieceIdentite.required'=>'renseignez numero Piece Identite ',


        ]
    );
    User::create([
        // dd($request->all())
        'nom'=>$request->nom,
         'prenom'=>$request->prenom,
         'telephone1'=>$request->telephone1,
         'email'=>$request->email,
          'sexe'=>$request->sexe,
            'pieceIdentite'=>$request->pieceIdentite,
              // 'password'=>$request->password,
               'status'=>$request->status,
               'numeroPieceIdentite'=>$request->numeroPieceIdentite,
    ]);
    return redirect('/role');
    }
    public function vue($id){
        $user=User::find($id);
        $role=role::all();
        return view('role.update',compact('user','role'));

     }public function upgrade(Request $request,User $user){
        $request->validate([],[]);

        $user->update([

               'role_id'=>$request->role,
                 'status'=>$request->status,
                'telephone1'=>$request->telephone1,
                  'password' => $request->password
        ]);

        return redirect('/role');

     }


}
