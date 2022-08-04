@extends('templete.layout')

@section('content')
<br>
<div class = "container">
           
<div id="page-wrapper" style="min-height: 292px;">

<div class="row">
 <div class="col-lg-12 col-md-12">
 <h1 class="h3 mb-0 text-gray-800 text-primary">Ajouter Chauffeur</h1>
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
         <form class="form-horizontal" data-toggle="validator"  role="form"  method="POST" action="{{ route('chauffeur.store') }}">
         @csrf
           
                    <div class="form-group">
                        <label for="exampleInputEmail1">NOM</label>
                         <input type="text" class="form-control" id="nom" name="nom"
                            placeholder="Entrer un nom">
                     
                    </div>
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">PRENOM</label>
                         <input type="text" class="form-control" id="prenom" name="prenom"
                            placeholder="Entrer un prenom">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">MATRICULE</label>
                         <input type="text" class="form-control" id="matricule" name="matricule"
                            placeholder="Entrer un matricule">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">N° PERMIS</label>
                         <input type="text" class="form-control" id="permis" name="permis"
                            placeholder="Entrer un N° permis">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">TELEPHONE</label>
                         <input type="text" class="form-control" id="telephone" name="telephone"
                            placeholder="Entrer un numero telephone à 10 chiffres">
                     
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('chauffeur.index') }}" class="btn btn-danger">Annuler</a>
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