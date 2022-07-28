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
      <th scope="col">LATITUDE</th>
      <th scope="col">LONGITUDE</th>
      <th scope="col">CLIENT</th>
 
      <th scope="col">ACTION</th>
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
        <a href="{{ route('gps.edit', ['gp'=>$gps->id]) }}" class="btn btn-warning">editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment suprimer cet gps?')){document.getElementById('form-{{$gps->id}}').submit() }">suprimer</a>
        <form  id="form-{{$gps->id}}" action="{{ route('gps.destroy', ['gp'=>$gps->id]) }}" method="post">
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