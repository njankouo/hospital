<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="card">
                <div class="card-title d-flex">

                    <i class="fas fa-users fa-2x"></i>
                    <h3 style="font-size:20px;font-family:forte"> New Client</h3>
                </div>
                <div class="card body">
                    <div class="row">
                        <form action="{{ route('create.client') }}" method="POST" class="form-block">
                            @csrf
                            <div class="form-row" style="margin: 10px;">


                                <div class="col-6">
                                    <label for="">Nom</label>
                                    <input type="text" class="my-2 form-control @error('nom') is-invalid @enderror"
                                        name="nom" placeholder="Enter ...">
                                    @error('nom')
                                        <p>{{ $message }}</p>
                                    @enderror
                                    <label for="">Prenom</label>
                                    <input type="text" class="my-2 form-control @error('prenom') is-invalid @enderror"
                                        placeholder="Enter ..." name="prenom">
                                    @error('prenom')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="">sexe</label>
                                    <select name="sexe" id=""
                                        class="form-control my-2 @error('sexe') is-invalid @enderror">
                                        <option value="" disabled>select gender</option>
                                        <option value=""></option>
                                        <option value="1">Masculin</option>
                                        <option value="0">feminin</option>
                                    </select>
                                    @error('sexe')
                                        <p>{{ $message }}</p>
                                    @enderror
                                    <label for="">telephone</label>
                                    <input type="text"
                                        class="my-2 form-control @error('telephone') is-invalid @enderror"
                                        id="inputSuccess" placeholder="Enter ..." name="telephone">
                                    @error('telephone')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-8 my-4">
                                    <button type="submit" class="btn btn-primary mx-1">save</button>
                                    <a class="btn btn-danger mx-1" data-dismiss="modal">close</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
