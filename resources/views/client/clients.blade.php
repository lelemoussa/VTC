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
      <th scope="col">NOM</th>
      <th scope="col">PRENOM</th>
      <th scope="col">TELEPHONE</th>
      <th scope="col">SOCIETE</th>
      <th scope="col">EMAIL</th>
      <th scope="col">CIVILITE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($clients as $client)
    <tr>
      <th scope="row">{{ $loop->index +1 }}</th>
      <td>{{ $client->nom }}</td>
      <td>{{ $client->prenom }}</td>
      <td>{{ $client->telephone }}</td>
      <td>{{ $client->societe }}</td>
      <td>{{ $client->email }}</td>
      <td>{{ $client->civilite }}</td>
      <td>
        <a href="{{ route('client.edit', ['client'=>$client]) }}" class="btn btn-warning">editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment suprimer cet client?')){document.getElementById('form-{{$client->id}}').submit() }">suprimer</a>
        <form  id="form-{{$client->id}}" action="{{ route('client.supprimer', ['client'=>$client->id]) }}" method="post">
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