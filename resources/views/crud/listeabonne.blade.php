@extends('layouts.admin')
@section('main-content')
    
    <!-- <div class="navbar-wrapper">
                    <a class="navbar-brand text-black " href="#pablo">Bus List</a>
                     </div> -->

    <div class="content" style="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <span class="pull-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#abonneaddmodal">
                            Ajouter un abonné
                        </button>
                    </span>
                    <br>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (count($abonnes) > 0)
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Tel</th>
                                            <th>Numero Carte</th>
                                            <th>Email</th>
                                            <th>Sexe</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($abonnes as $data)
                                                <tr>
                                                    <td>{{ $data->id }}</td>
                                                    <td>{{ $data->nom }}</td>
                                                    <td>{{ $data->prenom }}</td>
                                                    <td>{{ $data->tel }}</td>
                                                    <td>{{ $data->numcarte }}</td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>{{ $data->sex }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {!! $abonnes->links() !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Add Abonne Modal -->
    <div class="modal fade" id="abonneaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un abonné</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addform" action="{{ action('AbonneController@store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleInputName">Nom</label>
                          <input type="text" class="form-control" id="nom" aria-describedby="lnameHelp" placeholder="Nom client">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFname">Prénom</label>
                            <input type="text" class="form-control" id="prenom" aria-describedby="fnameHelp" placeholder="Prénom client">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputTel">Telephone</label>
                            <input type="phone" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="Tel client">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputCarte">Numero Carte</label>
                            <input type="number" class="form-control" id="numcarte" aria-describedby="numcarteHelp" placeholder="XXXXXXX">
                          </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Adresse e-mail</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Abonne@cozi.tn">
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                              <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                              <div class="col-sm-10">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="H" >
                                  <label class="form-check-label" for="gridRadios1">
                                    Homme
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="F">
                                  <label class="form-check-label" for="gridRadios2">
                                    Femme
                                  </label>
                                </div>
                              </div>
                            </div>
                          </fieldset>
                </form>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </div>
    </div>


    

    <script type="text/javascript">
        $(document).ready(function (){

            $('#addform').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "/abonneadd",
                    data: $('addform').serialize(),
                    success: function(response) {
                        console.log(response)
                        $('#abonneaddmodal').modal('hide')
                        alert("Abonné ajouté avec succés");
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error)
                        alert("Erreur");
                    }
                });
            });
        });
    </script>

@endsection
