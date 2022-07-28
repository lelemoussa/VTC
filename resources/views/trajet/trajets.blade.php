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

    <table class="table">
  <thead>
   
    <tr>
      <th scope="col">#</th>
      <th scope="col">DEPART</th>
      <th scope="col">ARRIVER</th>
      <th scope="col">CLIENT</th>
 
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($trajets as $trajet)
    <tr>
      <th scope="row">{{ $loop->index +1 }}</th>
      <td>{{ $trajet->depart }}</td>
      <td>{{ $trajet->arrive }}</td>
      <td>{{ $trajet->client->nom }}</td>
   
      <td>
        <a href="{{ route('trajet.edit', ['trajet'=>$trajet]) }}" class="btn btn-warning">editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment suprimer cet trajet?')){document.getElementById('form-{{$trajet->id}}').submit() }">suprimer</a>
        <form  id="form-{{$trajet->id}}" action="{{ route('trajet.supprimer', ['trajet'=>$trajet->id]) }}" method="post">
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