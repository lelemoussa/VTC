@extends('templete.layout')

@section('content')
  
      @if(session()->has("successDelete"))

            <div class="alert alert-success">
                <h3>{{ session()->get('successDelete') }}</h3>
            </div>
        @endif



<div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Listes des chauffeurs</h6>
                  <a href="{{ route('chauffeur.create') }}" class="btn btn-primary">Créer un Nouveau Chauffeur</a>

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
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>MATRICULE</th>
                        <!-- <th>N° PERMIS</th>
                        <th>TELEPHONE</th>
                        <th>CIVILITE</th> -->
                        <th>ACTION</th>                        
                      </tr>
                    </thead>
                    <tbody>
  @foreach($chauffeurs as $chauffeur)
    <tr>
      <th scope="row">{{ $loop->index +1 }}</th>
      <td>{{ $chauffeur->nom }}</td>
      <td>{{ $chauffeur->prenom }}</td>
      <td>{{ $chauffeur->matricule }}</td>
      <!-- <td>{{ $chauffeur->permis }}</td>
      <td>{{ $chauffeur->telephone }}</td>
      <td>{{ $chauffeur->civilite }}</td> -->
      <td>
        <a href="{{ route('chauffeur.edit', ['chauffeur'=>$chauffeur]) }}" class="btn btn-primary">editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment suprimer cette chauffeur?')){document.getElementById('form-{{$chauffeur->id}}').submit() }">suprimer</a>
        <form  id="form-{{$chauffeur->id}}" action="{{ route('chauffeur.supprimer', ['chauffeur'=>$chauffeur->id]) }}" method="post">
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