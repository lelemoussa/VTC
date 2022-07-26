@extends('templete.layout')

@section('content')
    <br>
    <div class = "container ">
           



<div id="page-wrapper" style="min-height: 292px;">

<div class="row">
 <div class="col-lg-12 col-md-12">
     <h1 align = "center" class=" bg-primary titre-contact">  AJOUTER UNE NOUVELLE VOITURE </h1>

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
         <form class="form-horizontal" data-toggle="validator"  role="form"  method="POST" action="{{ route('voiture.store') }}">
         @csrf
           
             <div class="row">
                 
             
                         

                         <div class="form-group">
                         
                             <label  class=" col-sm-4 control-label">MARQUE </label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" name="marque" id="marque" >
                             </div>
                             <br>
                         </div>
                     
                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">IMMATRICULATION </label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" name="immatriculation" id="immatriculation" >
                             </div>
                             <br>
                         </div>

                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">PLACE </label>
                             <div class="col-sm-8">
                                 <input type="number" class="form-control" name="place" id="place"  >
                             </div>
                             <br>
                         </div>
                         
                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">DESCRIPTION </label>
                             <div class="col-sm-8">

                                 <input type="text" class="form-control" name="description" id="description"  >

                           </div>
                           <br>
                         </div>

                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">MODELE </label>
                             <div class="col-sm-8">

                                 <input type="text" class="form-control" name="modele" id="modele"  >

                           </div>
                           <br>
                         </div>

                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">ANNEE</label>
                             <div class="col-sm-8">

                                 <input type="text" class="form-control" name="annee" id="annee"  >

                           </div>
                           <br>
                         </div>

                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">COULEUR</label>
                             <div class="col-sm-8">

                                 <input type="text" class="form-control" name="couleur" id="couleur"  >

                           </div>
                           <br>
                         </div>

                         

                         <div class="form-group">
                         
                               <button type="submit" class="btn btn-warning" name="enregistrer">Enregistrer </button>
                               <a href="{{ route('voiture.index') }}" class="btn btn-danger">Annuler</a>

                        </div>

           </div> <!--row -->

         </form> <!--  /form>-->



     </div>

 </div>
</div>
</div>


    </div>
    
      
    
    

    
    <br>
   @endsection