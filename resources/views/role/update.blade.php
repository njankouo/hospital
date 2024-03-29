 <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
 <script src="{{ asset('js/toastr.min.js') }}"></script>
 <script src="{{ asset('js/jquery.typeahead.min.js') }}"></script>

 <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

 @extends('layouts.master')

 @section('contenu')
     <form action="{{ route('user.upgrade', ['user' => $user->id]) }}" method="POST">
         @csrf
         <input type="hidden" name="_method" value="put">
         <div class="row">

             <div class="col-9">

                 <div class="card">
                     <div class="card-title bg-primary">
                         <p style="font-family: forte;font-size:15px;" class="my-2 mx-2 text-light p-3">
                             <i class="fa fa-users fa-2x"></i>Mise à jour Utilisateur
                             utilisateur
                         </p>
                     </div>
                     <div class="card-body">

                         <div class="row">
                             <div class="col-6">
                                 <label for="">nom utilisateur</label>
                                 <input type="text" placeholder="nom du user....."
                                     class="form-control
                                @error('nom') is-invalid @enderror
                                "
                                     name="nom" value="{{ $user->nom }}">
                                 @error('nom')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>


                             <div class="col-6">
                                 <label for="">prenom utilisateur</label>
                                 <input type="text" class="form-control @error('prenom') is-invalid @enderror"
                                     placeholder="prenom utilisateur....." name="prenom" value="{{ $user->prenom }}">
                                 @error('prenom')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>

                         </div>


                         <div class="row">
                             <div class="col-6">
                                 <label for="">telephone 1</label>
                                 <input type="text" placeholder="telephone1....."
                                     class="form-control @error('telephone1') is-invalid @enderror" name="telephone1"
                                     value="{{ $user->telephone1 }}">
                             </div>
                             @error('telephone')
                                 <p class="text-danger">{{ $message }}</p>
                             @enderror
                             <div class="col-6">
                                 <label for="">telephone2</label>
                                 <input type="text" placeholder="telephone2....." class="form-control" disabled>

                             </div>
                         </div>
                         <div class="row">
                             <div class="col-12">
                                 <label for="">email</label>
                                 <input type="email" class="form-control @error('email') is-invalid @enderror"
                                     placeholder="email...." name="email" value="{{ $user->email }}">
                                 @error('email')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>

                         </div>
                         <div class="row">
                             <div class="col-6">
                                 <label for="">numero de la piece d'identification</label>
                                 <input type="number" placeholder="numero de la piece d'identification....."
                                     class="form-control @error('numeroPieceIdentite') is-invalid @enderror"
                                     name="numeroPieceIdentite" value="{{ $user->numeroPieceIdentite }}">
                                 @error('numeroPieceIdentite')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="col-6">
                                 <label for="">carte d'identification</label>

                                 <input type="text" class="form-control" name="pieceIdentite"
                                     value="{{ $user->pieceIdentite }}">
                                 @error('pieceIdentite')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-12">
                                 <label for="">sexe</label>
                                 <input type="text" class="form-control" name="sexe" value="{{ $user->sexe }}">
                                 @error('sexe')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="col-12">
                                 <label for="">statut utilisateur </label>
                                 <select name="status">

                                     <option value="actif" selected>actif</option>

                                     <option value="inactif">inactif</option>



                                 </select>
                             </div>
                         </div>

                         <a href="{{ route('role.liste') }}" class="btn btn-danger my-4">retour </a>
                         <button type="submit" class="btn btn-success my-4">modification</button>
                     </div>
                     <div class="card-footer bg-primary"></div>
                 </div>

             </div>
             <div class="col-3">
                 <div class="card">
                     <div class="card-title bg-primary text-light p-3 my-2 mx-2" style="font-family: forte">
                         <i class="fa fa-pencil fa-2x"></i> affectation des Roles

                     </div>
                     <div class="card-body">
                         <div class="col-12">
                             <label for="" style="font-weight: bold;text-decoration:underline" hidden>Mot de
                                 Passe</label>
                             <input type="text" placeholder="password....."
                                 class="form-control @error('password') is-invalid @enderror" name="password"
                                 value="$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi" hidden>
                             @error('password')
                                 <p class="text-danger">{{ $message }}</p>
                             @enderror
                         </div>
                         <div class="col-12">
                             <label for="" class="my-2" style="font-weight: bold;text-decoration:underline">
                                 roles</label><br>

                             @foreach ($role as $roles)
                                 @if ($user->role_id == $roles->id)
                                     <p>
                                         <label>
                                             <input type="checkbox" name="role" value="{{ $roles->id }}" checked>
                                             <span> {{ $roles->nom }}</span>
                                         </label>
                                     </p>
                                 @else
                                     <p>
                                         <label>
                                             <input type="checkbox" name="role" value="{{ $roles->id }}">
                                             <span> {{ $roles->nom }}</span>
                                         </label>
                                     </p>
                                 @endif
                             @endforeach
                         </div>
                     </div>
                     <div class="card-footer bg-primary">

                     </div>

                 </div>
             </div>

         </div>

         </div>
         </div>
     </form>
     <script>
         @if (Session::has('success'))
             toastr.options = {
                 "closeButton": true,
                 "progressBar": true,
                 positionClass: 'toast-top-center'
             }
             toastr.success("{{ session('success') }}");
         @endif
     </script>
 @endsection
