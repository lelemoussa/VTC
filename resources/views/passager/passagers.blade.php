@extends('templete.layout')

@section('content')
  
      @if(session()->has("successDelete"))

            <div class="alert alert-success">
                <h3>{{ session()->get('successDelete') }}</h3>
            </div>
        @endif



<div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Listes des passagers</h6>
                  <a href="{{ route('passager.create') }}" class="btn btn-primary">Créer un Nouveau passager</a>

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
                        <th>IDENTIFICATION</th>
                        <!-- <th>PRENOM</th> -->
                        <th>TELEPHONE</th>
                        <th>SOCIETE</th>
                        <th>EMAIL</th>
                        <th>CIVILITE</th>
                        <th>CLIENT</th>
                        <th>ACTION</th>                        
                      </tr>
                    </thead>
                    <tbody>
  @foreach($passagers as $passager)
    <tr>
      <th scope="row">{{ $loop->index +1 }}</th>
      <td>{{ $passager->nom }} {{ $passager->prenom }}</td>
      <!-- <td>{{ $passager->prenom }}</td> -->
      <td>{{ $passager->telephone }}</td>
      <td>{{ $passager->societe }}</td>
      <td>{{ $passager->email }}</td>
      <td>{{ $passager->civilite }}</td>
      <td>{{ $passager->client->nom }}</td> 
      <td>
        <a href="{{ route('passager.edit', ['passager'=>$passager]) }}" class="btn btn-primary">editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment suprimer cette passager?')){document.getElementById('form-{{$passager->id}}').submit() }">suprimer</a>
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
                <div class="card-footer"></div>
              </div>
            </div>
          </div>

 </div>   <!-- card -->  

@endsection