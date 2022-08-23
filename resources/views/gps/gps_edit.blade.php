@extends('templete.layout')

@section('content')
<br>
<div class = "container">
           
<div id="page-wrapper" style="min-height: 292px;">

<div class="row">
 <div class="col-lg-12 col-md-12">
 <h1 class="h3 mb-0 text-gray-800 text-primary">Modifier gps</h1>
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
            <form class="form-horizontal" data-toggle="validator"  role="form"  method="POST" action="{{ route('gps.update', ['gps'=>$gps->id]) }}">
                         @csrf
                         <input type="hidden" name="_method" value="put">
                         
                    <div class="form-group">
                        <label for="exampleInputEmail1">LATITUDE</label>
                         <input type="text" class="form-control" id="latitude" name="latitude" value="{{$gps->depart}}"
                            placeholder="Entrer une latitude">
                     
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">LONGITUDE</label>
                         <input type="text" class="form-control" id="latitude" name="latitude"  value="{{$gps->arrive}}"
                            placeholder="Entrer une longitude">
                     
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
                    <a href="{{ route('gps.index') }}" class="btn btn-danger">Annuler</a>
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