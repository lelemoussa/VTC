@extends('templete.layout')

@section('content')
    

      @if(session()->has("successDelete"))

            <div class="alert alert-success">
                <h3>{{ session()->get('successDelete') }}</h3>
            </div>
        @endif


        <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Listes des voitures</h6>
                  <a href="{{ route('voiture.create') }}" class="btn btn-primary">Créer une Nouvelle Voiture</a>

                </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>MARQUE</th>
                        <th>IMMATRICULATION</th>
                        <th>NBRE PLACE</th>
                        <th>MODELE</th>
                        <th>COULEUR</th>
                        <!-- <th>DESCRIPTION</th> -->
                        <!-- <th>ANNEE DE CONSTRUCTION</th> -->
                        
                        <th>ACTION</th>
                        
                      </tr>
                    </thead>
                    <tbody>
  @foreach($voitures as $voiture)
    <tr>
      <th scope="row">{{ $loop->index +1 }}</th>
      <td>{{ $voiture->marque }}</td>
      <td>{{ $voiture->immatriculation }}</td>
      <td>{{ $voiture->place }}</td>
      <td>{{ $voiture->modele }}</td>
      <td>{{ $voiture->couleur }}</td>
      <!-- <td>{{ $voiture->description }}</td>
      <td>{{ $voiture->annee }}</td> -->
      
      

      <td>
        <a href="{{ route('voiture.edit', ['voiture'=>$voiture]) }}" class="btn btn-primary">editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment suprimer cette voiture?')){document.getElementById('form-{{$voiture->id}}').submit() }">suprimer</a>
        <form  id="form-{{$voiture->id}}" action="{{ route('voiture.supprimer', ['voiture'=>$voiture->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete">
        </form>
      </td>
      
    </tr>
    @endforeach
    
     </tbody>
                      
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>

 </div>   <!-- card -->        
    

    
    

@endsection