@extends('templete.layout')

@section('content')
<br>
 <div class = "container ">
<div id="page-wrapper" style="min-height: 292px;">

<div class="row">
 <div class="col-lg-12 col-md-12">
 <h1 class="h3 mb-0 text-gray-800 text-primary">Ajouter Client</h1>
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
         <form class="form-horizontal" data-toggle="validator"  role="form"  method="POST" action="{{ route('client.store') }}">
         @csrf

         <div class="form-group ">
                    <label for="select2SinglePlaceholder">Selectionner le type de Client</label>
                    <select class="select2-single-placeholder form-control selected" name="state" id="select2SinglePlaceholder" >
                      <option value="individus">Individus</option>
                      <option value="societe">Sociéte</option>
                    </select>
                  </div>


                    <div class="form-group  nom">
                        <label for="exampleInputEmail1">NOM</label>
                         <input type="text" class="form-control " id="nom" name="nom"
                            placeholder="Entrer un nom">
                     
                    </div>
                    

                    <div class="form-group prenom">
                        <label for="exampleInputEmail1">PRENOM</label>
                         <input type="text" class="form-control  " id="prenom" name="prenom"
                            placeholder="Entrer un prenom">
                     
                    </div>

                    <div class="form-group telephone">
                        <label for="exampleInputEmail1">TELEPHONE</label>
                         <input type="text" class="form-control " id="telephone" name="telephone"
                            placeholder="Entrer un numéro de telephone à 10 chiffres ">
                     
                    </div>

                    <div class="form-group societe">
                        <label for="exampleInputEmail1">SOCIETE</label>
                         <input type="text" class="form-control " id="societe" name="societe"
                            placeholder="Entrer une societe">
                     
                    </div>

                    <div class="form-group email">
                        <label for="exampleInputEmail1">EMAIL</label>
                        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                    <input type="text" class="form-control "  id="email" name="email" aria-label="Username"
                      aria-describedby="basic-addon1" placeholder="entrer une adresse émail valide">
                  </div>
                     
                    </div>

                    
                    <div class="form-group civilite">
                    <label for="select2SinglePlaceholder">Selectionner votre civilité</label>
                    <select class="select2-single-placeholder form-control" name="civilite" id="civilite">
                      <option value="MESSIEUR">MESSIEUR</option>
                      <option value="MADAME">MADAME</option>
                    </select>
                  </div>

           
             
                         <div class="form-group">
                         
                               <button type="submit" class="btn btn-primary" name="enregistrer">Enregistrer </button>
                               <a href="{{ route('client.index') }}" class="btn btn-danger">Annuler</a>

                        </div>

           </div> <!--row -->

         </form> <!--  /form>-->


         </div>
         </div>
        </div>

 </div>
</div>
</div>


    </div>
    
      
    
    

    
    <br>


    <script>
        var nom = document.querySelector('.nom');
        var prenom = document.querySelector('.prenom');
        var telephone = document.querySelector('.telephone');
        var societe = document.querySelector('.societe');
        var email = document.querySelector('.email');
        var civilite = document.querySelector('.civilite');

        var selected = document.querySelector('.selected')

        selected.addEventListener('change', () => {

            if (selected.value === "societe") {
             
              prenom.style.display = "none";
              societe.style.display = "none";
              civilite.style.display = "none";
                


            } else {

              prenom.style.display = "grid";
              societe.style.display = "grid";
              civilite.style.display = "grid";
                

            }
        })
    </script>
   @endsection