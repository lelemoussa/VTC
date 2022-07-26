@extends('templete.layout')

@section('content')
    <br>
    <br>
    <br>
    <div class = "container ">
    
      <div class="d-flex justify-content-end" >
      <a href="{{ route('chauffeur.create') }}" class="btn btn-warning">ajouter un nouveau chauffeur</a>
      </div>

      @if(session()->has("successDelete"))

            <div class="alert alert-success">
                <h3>{{ session()->get('successDelete') }}</h3>
            </div>
        @endif

    <table class="table">
  <thead>
   
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOM</th>
      <th scope="col">PRENOM</th>
      <th scope="col">MATRICULE</th>
      <th scope="col">Num PERMIS</th>
      <th scope="col">TELEPHONE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($chauffeurs as $chauffeur)
    <tr>
      <th scope="row">{{ $loop->index +1 }}</th>
      <td>{{ $chauffeur->nomch }}</td>
      <td>{{ $chauffeur->prenomch }}</td>
      <td>{{ $chauffeur->matriculech }}</td>
      <td>{{ $chauffeur->permisch }}</td>
      <td>{{ $chauffeur->telch }}</td>
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
    

    
    <br>
    <br>
    <br>

@endsection