@extends('templete.layout')

@section('content')
    <br>
    <div class = "container ">
           



<div id="page-wrapper" style="min-height: 292px;">

<div class="row">
 <div class="col-lg-12 col-md-12">
     <h1 align = "center" class=" bg-primary titre-contact">  EDITION D UN POINT GPS </h1>

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
         <form class="form-horizontal" data-toggle="validator"  role="form"  method="POST" action="{{ route('gps.update', ['gp'=>$gps->id]) }}">
         @csrf
           @method('put')
             <div class="row">
                 
             <input type="hidden" name="_method" value="put">
                         

                         <div class="form-group">
                         
                             <label  class=" col-sm-4 control-label">LATITUDE</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" name="latitude" id="latitude" value="{{$gps->latitude}}">
                             </div>
                             <br>
                         </div>
                     
                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">LONGITUDE</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" name="longitude" id="longitude" value="{{$gps->longitude}}">
                             </div>
                             <br>
                         </div>

                         <div class="form-group">
                             <label  class=" col-sm-4 control-label">CLIENT</label>
                             <div class="col-sm-12">
                             <select  class="form-control" name="client_id" id="client_id"  >
                            
                                        <option value="{{ $gps->client['id'] }}" >{{ $gps->client['nom'] }}</option>

                            
                                 </select>
                             
                             </div>
                             <br>
                         </div>
                         
                         <br>
                         <br>
                         <div class="form-group">
                         
                               <button type="submit" class="btn btn-warning" name="enregistrer">Enregistrer </button>
                               <a href="{{ route('gps.index') }}" class="btn btn-danger">Annuler</a>

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