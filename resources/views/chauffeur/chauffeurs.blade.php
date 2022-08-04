@extends('templete.layout')

@section('content')
    <br>
    <br>
    <br>
    <div class = "container ">
    
      

      @if(session()->has("successDelete"))

            <div class="alert alert-success">
                <h3>{{ session()->get('successDelete') }}</h3>
            </div>
        @endif

        <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Listes des chauffeurs</h6>
                </div>
    <table class="table">
  <thead>
   
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOM</th>
      <th scope="col">PRENOM</th>
      <th scope="col">MATRICULE</th>
      <th scope="col">N° PERMIS</th>
      <th scope="col">TELEPHONE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($chauffeurs as $chauffeur)
    <tr>
      <th scope="row">{{ $loop->index +1 }}</th>
      <td>{{ $chauffeur->nom }}</td>
      <td>{{ $chauffeur->prenom }}</td>
      <td>{{ $chauffeur->matricule }}</td>
      <td>{{ $chauffeur->permis }}</td>
      <td>{{ $chauffeur->telephone }}</td>
      <td>
        <a href="{{ route('chauffeur.edit', ['chauffeur'=>$chauffeur]) }}" class="btn btn-warning">editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment suprimer cet chauffeur?')){document.getElementById('form-{{$chauffeur->id}}').submit() }">suprimer</a>
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
    </div>
    
    

    
    <br>
    <br>
    <br>

@endsection