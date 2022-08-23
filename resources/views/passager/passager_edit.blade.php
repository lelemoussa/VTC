@extends('templete.layout')

@section('content')
<br>
<div class = "container">
           
<div id="page-wrapper" style="min-height: 292px;">

<div class="row">
 <div class="col-lg-12 col-md-12">
 <h1 class="h3 mb-0 text-gray-800 text-primary">Modifier passager</h1>
<br>
     <div class="panel panel-primary">

        @if(session()->has("success"))

            <div class="alert alert-success">
                <h3>{{ session()->get('success') }}</h3>
            </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
        <ul >
            @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        @endif
        <div class="container">
            
            <div class="card mb-4">
            <div class="card-body">
            <form class="form-horizontal" data-toggle="validator"  role="form"  method="POST" action="{{ route('passager.update', ['passager'=>$passager->id]) }}">
                         @csrf
                         <input type="hidden" name="_method" value="put">
                         
                    <div class="form-group">
                        <label for="exampleInputEmail1">NOM</label>
                         <input type="text" class="form-control" id="nom" name="nom" value="{{$passager->nom}}"
                            placeholder="Entrer un nom">
                     
                    </div>
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">PRENOM</label>
                         <input type="text" class="form-control" id="prenom" name="prenom"  value="{{$passager->prenom}}"
                            placeholder="Entrer un prenom">
                     
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">TELEPHONE</label>
                         <input type="text" class="form-control" id="telephone" name="telephone" value="{{$passager->telephone}}"
                            placeholder="Entrer un numero telephone à 10 chiffres">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">SOCIETE</label>
                         <input type="text" class="form-control" id="societe" name="societe"  value="{{$passager->societe}}"
                            placeholder="Entrer une societe">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">EMAIL</label>
                         <input type="text" class="form-control" id="email" name="email"  value="{{$passager->email}}"
                            placeholder="Entrer une  email">
                     
                    </div>

                    

                    <div class="form-group">
                    <label for="select2SinglePlaceholder">CIVILITE</label>
                    <select class="select2-single-placeholder form-control" name="civilite" id="civilite" value="{{$passager->civilite}}" >
                    <option disabled selected value>Sélectionner votre civilité</option>
                      <option value="MESSIEUR">MESSIEUR</option>
                      <option value="MADAME">MADAME</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="select2SinglePlaceholder">CLIENT</label>
                    <select class="select2-single-placeholder form-control" name="client_id" id="client_id">
                    <option disabled selected value>Sélectionner un client</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                    @endforeach
                    </select>
                  </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('passager.index') }}" class="btn btn-danger">Annuler</a>
         </form> <!--  /form>-->
     </div>
     </div>



     </div>

 </div>
</div>
</div>


    </div>
    
      
    
    

    
    <br>
   @endsection