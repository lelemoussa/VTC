@extends('templete.layout')

@section('content')
<br>

 <div class="col-lg-12 col-md-12">
 <h1 class="h3 mb-0 text-gray-800 text-primary">Ajouter Voiture</h1>
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
         <form class="form-horizontal" data-toggle="validator"  role="form"  method="POST" action="{{ route('voiture.store') }}">
         @csrf
           
                    <div class="form-group">
                        <label for="exampleInputEmail1">MARQUE</label>
                         <input type="text" class="form-control" id="marque" name="marque"
                            placeholder="Enter une marque">
                     
                    </div>
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">IMMATRICULATION</label>
                         <input type="text" class="form-control" id="immatriculation" name="immatriculation"
                            placeholder="Enter une immatriculation">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">NBRE-PLACE</label>
                         <input type="number" class="form-control" id="place" name="place"
                            placeholder="Enter le nombre de place">
                     
                    </div>

                
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">MODELE</label>
                         <input type="text" class="form-control" id="modele" name="modele"
                            placeholder="Enter un modele">
                     
                    </div>

                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">COULEUR</label>
                         <input type="text" class="form-control" id="couleur" name="couleur"
                            placeholder="Enter une couleur">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ANNEE DE  CONSTRUCTION</label>
                         <input type="text" class="form-control" id="annee" name="annee"
                            placeholder="Enter une année de construction">
                     
                    </div>


                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">DESCRIPTION</label>
                      <textarea class="form-control" id="description" name="description"
                            placeholder="Enter une description" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('voiture.index') }}" class="btn btn-danger">Annuler</a>

         </form> <!--  /form>-->
     </div>
     </div>
</div>
 </div>
<br>
@endsection