@extends('templete.layout')

@section('content')
    <br>
    <div class = "container ">
           



<div id="page-wrapper" style="min-height: 292px;">

<div class="row">
 <div class="col-lg-12 col-md-12">
     <h1 align = "center" class=" bg-primary titre-contact">  EDITION D UN CLIENT </h1>

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
         <form class="form-horizontal" data-toggle="validator"  role="form"  method="POST" action="{{ route('client.update', ['client'=>$client->id]) }}">
         @csrf
           
             <div class="row">
                 
             <input type="hidden" name="_method" value="put">
                         

                         <div class="form-group">
                         
                             <label  class=" col-sm-4 control-label">NOM </label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" name="nom" id="nom" value="{{$client->nom}}">
                             </div>
                             <br>
                         </div>
                     
                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">prenom </label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" name="prenom" id="prenom" value="{{$client->prenom}}">
                             </div>
                             <br>
                         </div>

                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">TELEPHONE</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" name="telephone" id="telephone"  value="{{$client->telephone}}">
                             </div>
                             <br>
                         </div>
                         
                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">SOCIETE</label>
                             <div class="col-sm-8">

                                 <input type="text" class="form-control" name="societe" id="societe"  value="{{$client->societe}}">

                           </div>
                           <br>
                         </div>

                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">EMAIL</label>
                             <div class="col-sm-8">

                                 <input type="text" class="form-control" name="email" id="email"  value="{{$client->email}}">

                           </div>
                           <br>
                         </div>

                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">CIVILITE</label>
                             <div class="col-sm-8">

                                 <input type="text" class="form-control" name="civilite" id="civilite"  value="{{$client->civilite}}">

                           </div>
                           <br>
                         </div>

                         <div class="form-group">
                         
                               <button type="submit" class="btn btn-warning" name="enregistrer">Enregistrer </button>
                               <a href="{{ route('client.index') }}" class="btn btn-danger">Annuler</a>

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