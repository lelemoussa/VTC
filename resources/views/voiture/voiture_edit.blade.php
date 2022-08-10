@extends('templete.layout')

@section('content')
<br>
<div class = "container">
           
<div id="page-wrapper" style="min-height: 292px;">

<div class="row">
 <div class="col-lg-12 col-md-12">
 <h1 class="h3 mb-0 text-gray-800 text-primary">Modifier une voiture</h1>
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
            <form class="form-horizontal" data-toggle="validator"  role="form"  method="POST" action="{{ route('voiture.update', ['voiture'=>$voiture->id]) }}">
                         @csrf
                         <input type="hidden" name="_method" value="put">
                         
                    <div class="form-group">
                        <label for="exampleInputEmail1">MARQUE</label>
                         <input type="text" class="form-control" id="marque" name="marque" value="{{$voiture->marque}}"
                            >
                     
                    </div>
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">IMMATRICULATION</label>
                         <input type="text" class="form-control" id="immatriculation" name="immatriculation"  value="{{$voiture->immatriculation}}"
                            >
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">NBRE-PLACE</label>
                         <input type="text" class="form-control" id="place" name="place"  value="{{$voiture->place}}"
                            >
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">MODELE</label>
                         <input type="text" class="form-control" id="modele" name="modele"  value="{{$voiture->modele}}"
                            >
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">COULEUR</label>
                         <input type="text" class="form-control" id="couleur" name="couleur" value="{{$voiture->couleur}}"
                            >
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ANNEE DE  CONSTRUCTION</label>
                         <input type="text" class="form-control" id="annee" name="annee"
                             value="{{$voiture->annee}}">
                     
                    </div>


                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">DESCRIPTION</label>
                      <textarea class="form-control" id="description" name="description"
                              rows="3" >{{$voiture->description}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('voiture.index') }}" class="btn btn-danger">Annuler</a>
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