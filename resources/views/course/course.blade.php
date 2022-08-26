@extends('templete.layout')

@section('content')
<br>
<div class = "container">
           
<div id="page-wrapper" style="min-height: 292px;">

<div class="row">
 <div class="col-lg-12 col-md-12">
 <h1 class="h3 mb-0 text-gray-800 text-primary">Ajouter course</h1>
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
         <form class="form-horizontal" data-toggle="validator"  role="form"  method="POST" action="{{ route('course.store') }}">
         @csrf
           
                    <div class="form-group">
                        <label for="exampleInputEmail1">DATE</label>
                         <input type="date" class="form-control" id="date" name="date"
                            placeholder="Entrer le point de depart">
                     
                    </div>

                    <div class="form-group">
                    <label for="select2SinglePlaceholder">CHAUFFEUR</label>
                    <select class="select2-single-placeholder form-control" name="chauffeur_id" id="chauffeur_id">
                    <option disabled selected value>Sélectionner un chauffeur</option>
                                    @foreach($chauffeurs as $chauffeur)
                                        <option value=""></option>
                                        <option value="{{ $chauffeur->id }}">{{ $chauffeur->nom }}</option>

                                    @endforeach
                    </select>
                  </div>
                    

                    <div class="form-group">
                    <label for="select2SinglePlaceholder">VOITURE</label>
                    <select class="select2-single-placeholder form-control" name="voiture_id" id="voiture_id">
                    <option disabled selected value>Sélectionner une voiture</option>
                                    @foreach($voitures as $voiture)
                                        <option value=""></option>
                                        <option value="{{ $voiture->id }}">{{ $voiture->marque }}</option>

                                    @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="select2SinglePlaceholder">PASSAGER</label>
                    <select class="select2-single-placeholder form-control" name="passager_id" id="passager_id">
                    <option disabled selected value>Sélectionner un passager</option>
                                    @foreach($passagers as $passager)
                                        <option value=""></option>
                                        <option value="{{ $passager->id }}">{{ $passager->nom }}</option>

                                    @endforeach
                    </select>
                  </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('course.index') }}" class="btn btn-danger">Annuler</a>
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