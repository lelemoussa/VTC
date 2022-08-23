@extends('templete.layout')

@section('content')
  
      @if(session()->has("successDelete"))

            <div class="alert alert-success">
                <h3>{{ session()->get('successDelete') }}</h3>
            </div>
        @endif



<div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Listes des point gpss</h6>
                  <a href="{{ route('gps.create') }}" class="btn btn-primary">Créer un Nouveau point gps</a>

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
                        <th>LATITUDE</th>
                        <th>LONGITUDE</th>
                        <th>CLIENT</th>
        
                        <th>ACTION</th>                        
                      </tr>
                    </thead>
                    <tbody>
  @foreach($gpss as $gps)
    <tr>
      <th scope="row">{{ $loop->index +1 }}</th>
      <td>{{ $gps->latitude }}</td>
      <td>{{ $gps->longitude }}</td>
      <td>{{ $gps->client->nom }}</td>
     
      <td>
        <a href="{{ route('gps.edit', ['gp'=>$gps]) }}" class="btn btn-primary">editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment suprimer cette gps?')){document.getElementById('form-{{$gps->id}}').submit() }">suprimer</a>
        <form  id="form-{{$gps->id}}" action="{{ route('gps.supprimer', ['gps'=>$gps->id]) }}" method="post">
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