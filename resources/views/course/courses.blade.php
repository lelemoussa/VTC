@extends('templete.layout')

@section('content')
    <br>
    <br>
    <br>
    <div class = "container">
    
      

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
      <th scope="col">CLIENT</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($passagers as $passager)
    <tr>
      <th scope="row">{{ $loop->index +1 }}</th>
      <td>{{ $passager->nom }}</td>
      <td>{{ $passager->prenom }}</td>
      <td>{{ $passager->telephone }}</td>
      <td>{{ $passager->societe }}</td>
      <td>{{ $passager->email }}</td>
      <td>{{ $passager->civilite }}</td>
      <td>{{ $passager->client->nom }}</td>
   
      <td>
        <a href="{{ route('passager.edit', ['passager'=>$passager]) }}" class="btn btn-warning">editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment suprimer cet passager?')){document.getElementById('form-{{$passager->id}}').submit() }">suprimer</a>
        <form  id="form-{{$passager->id}}" action="{{ route('passager.supprimer', ['passager'=>$passager->id]) }}" method="post">
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