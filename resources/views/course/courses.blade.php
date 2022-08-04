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
  @foreach($courses as $course)
    <tr>
      <th scope="row">{{ $loop->index +1 }}</th>
      <td>{{ $course->nom }}</td>
      <td>{{ $course->prenom }}</td>
      <td>{{ $course->telephone }}</td>
      <td>{{ $course->societe }}</td>
      <td>{{ $course->email }}</td>
      <td>{{ $course->civilite }}</td>
      <td>{{ $course->client->nom }}</td>
   
      <td>
        <a href="{{ route('course.edit', ['course'=>$course]) }}" class="btn btn-warning">editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment suprimer cet course?')){document.getElementById('form-{{$course->id}}').submit() }">suprimer</a>
        <form  id="form-{{$course->id}}" action="{{ route('course.supprimer', ['course'=>$course->id]) }}" method="post">
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