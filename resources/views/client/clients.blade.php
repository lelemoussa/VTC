@extends('templete.layout')

@section('content')
  
      @if(session()->has("successDelete"))

            <div class="alert alert-success">
                <h3>{{ session()->get('successDelete') }}</h3>
            </div>
        @endif



<div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Listes des clients</h6>
                  <a href="{{ route('client.create') }}" class="btn btn-primary">Créer un Nouveau Client</a>
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
                        <th>TELEPHONE</th>
                        <th>SOCIETE</th>
                        <th>EMAIL</th>
                        <th>CIVILITE</th>
                        <th>ACTION</th>                        
                      </tr>
                    </thead>
                    <tbody>
  @foreach($clients as $client)
    <tr>
      <th scope="row">{{ $loop->index +1 }}</th>
      <td>{{ $client->nom }} {{ $client->prenom }}</td>
      <td>{{ $client->prenom }}</td>
      <td>{{ $client->telephone }}</td>
      <td>{{ $client->societe }}</td>
      <td>{{ $client->email }}</td>
      <td>{{ $client->civilite }}</td>
      <td>
        <a href="{{ route('client.edit', ['client'=>$client]) }}" class="btn btn-primary">editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment suprimer cette client?')){document.getElementById('form-{{$client->id}}').submit() }">suprimer</a>
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
                <div class="card-footer"></div>
              </div>
            </div>
          </div>

 </div>   <!-- card -->  

@endsection