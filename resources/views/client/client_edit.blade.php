@extends('templete.layout')

@section('content')
<br>
<div class = "container">
           
<div id="page-wrapper" style="min-height: 292px;">

<div class="row">
 <div class="col-lg-12 col-md-12">
 <h1 class="h3 mb-0 text-gray-800 text-primary">Modifier Client</h1>
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
            <form class="form-horizontal" data-toggle="validator"  role="form"  method="POST" action="{{ route('client.update', ['client'=>$client->id]) }}">
                         @csrf
                         <input type="hidden" name="_method" value="put">
                         
                    <div class="form-group">
                        <label for="exampleInputEmail1">NOM</label>
                         <input type="text" class="form-control" id="nom" name="nom" value="{{$client->nom}}"
                            placeholder="Entrer un nom">
                     
                    </div>
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">PRENOM</label>
                         <input type="text" class="form-control" id="prenom" name="prenom"  value="{{$client->prenom}}"
                            placeholder="Entrer un prenom">
                     
                    </div>

                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">TELEPHONE</label>
                         <input type="text" class="form-control" id="telephone" name="telephone" value="{{$client->telephone}}"
                            placeholder="Entrer un numero telephone à 10 chiffres">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">SOCIETE</label>
                         <input type="text" class="form-control" id="societe" name="societe"  value="{{$client->societe}}"
                            placeholder="Entrer une societe">
                     
                    </div>

                    <div class="form-group email">
                        <label for="exampleInputEmail1">EMAIL</label>
                        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                    <input type="text" class="form-control "  id="email" name="email" value="{{$client->email}}" aria-label="Username"
                      aria-describedby="basic-addon1" placeholder="entrer une adresse émail valide">
                  </div>
                     
                    </div>                    

                    <div class="form-group">
                    <label for="select2SinglePlaceholder">Selectionner votre civilité</label>
                    <select class="select2-single-placeholder form-control" name="civilite" id="civilite" value="{{$client->civilite}}">
                      <option value="civilite">MESSIEUR</option>
                      <option value="civilite">MADAME</option>
                    </select>
                  </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('client.index') }}" class="btn btn-danger">Annuler</a>
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