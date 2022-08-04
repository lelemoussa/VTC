@extends('templete.layout')

@section('content')
    <br>
    <div class = "container ">
           



<div id="page-wrapper" style="min-height: 292px;">

<div class="row">
 <div class="col-lg-12 col-md-12">
     <h1 align = "center" class=" bg-primary titre-contact">  AJOUTER UN NOUVELLE COURSE </h1>

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
         <form class="form-horizontal" data-toggle="validator"  role="form"  method="POST" action="{{ route('course.store') }}">
         @csrf
           
             <div class="row">
                 
             
                         

                         <div class="form-group">
                         
                             <label  class=" col-sm-4 control-label">DATE</label>
                             <div class="col-sm-12">
                                 <input type="date" class="form-control" name="date" id="date" >
                             </div>
                             <br>
                         </div>
                    

                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">CHAUFFEUR</label>
                             <div class="col-sm-12">
                                 <select  class="form-control" name="chauffeur_id" id="chauffeur_id"  >
                                    @foreach($chauffeurs as $chauffeur)
                                        <option value=""></option>
                                        <option value="{{ $chauffeur->id }}">{{ $chauffeur->nom }}</option>

                                    @endforeach
                                 </select>
                             </div>
                             <br>
                         </div>

                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">VOITURE</label>
                             <div class="col-sm-12">
                                 <select  class="form-control" name="voiture_id" id="voiture_id"  >
                                    @foreach($voitures as $voiture)
                                        <option value=""></option>
                                        <option value="{{ $voiture->id }}">{{ $voiture->marque }}</option>

                                    @endforeach
                                 </select>
                             </div>
                             <br>
                         </div>
                      
                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">Passager</label>
                             <div class="col-sm-12">
                                 <select  class="form-control" name="passager_id" id="passager_id"  >
                                    @foreach($passagers as $passager)
                                        <option value=""></option>
                                        <option value="{{ $passager->id }}">{{ $passager->nom }}</option>

                                    @endforeach
                                 </select>
                             </div>
                             <br>
                         </div>
                         
                       
                         <div class="form-group">
                         
                               <button type="submit" class="btn btn-warning" name="enregistrer">Enregistrer </button>
                               <a href="{{ route('course.index') }}" class="btn btn-danger">Annuler</a>

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