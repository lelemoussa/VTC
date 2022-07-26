@extends('templete.layout')

@section('content')
    <br>
    <br>
    <br>
    <div class = "container ">
    
      <div class="d-flex justify-content-end" >
      <a href="{{ route('voiture.create') }}" class="btn btn-warning">ajouter une nouvelle voiture</a>
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
      <th scope="col">MARQUE</th>
      <th scope="col">IMMATRICULATION</th>
      <th scope="col">NBRE PLACE</th>
      <th scope="col">DESCRIPTION</th>
      <th scope="col">MODELE</th>
      <th scope="col">ANNEE</th>
      <th scope="col">COULEUR</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($voitures as $voiture)
    <tr>
      <th scope="row">{{ $loop->index +1 }}</th>
      <td>{{ $voiture->marque }}</td>
      <td>{{ $voiture->immatriculation }}</td>
      <td>{{ $voiture->place }}</td>
      <td>{{ $voiture->description }}</td>
      <td>{{ $voiture->modele }}</td>
      <td>{{ $voiture->annee }}</td>
      <td>{{ $voiture->couleur }}</td>

      <td>
        <a href="{{ route('voiture.edit', ['voiture'=>$voiture]) }}" class="btn btn-warning">editer</a>
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
    

    
    <br>
    <br>
    <br>

@endsection