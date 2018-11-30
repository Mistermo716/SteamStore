@extends('layouts.main')

@section('content')
<form method="POST" class="form-group" action="addGame">
    {{csrf_field()}}
    <label>Name</label> <br>
    <input name="name" type="text" placeholder="Name of Game" required></input> <br> <br>
    <label>Publisher</label> <br>
    <input name="publisher" type="text" placeholder="Publisher" required></input> <br> <br>
    <label>Genre</label> <br>
    <select name="genre_id" required>
    @foreach($genres as $genre)
    <option value="{{$genre->id}}">{{$genre->name}}</option>
    @endforeach
    </select> <br> <br>
    <label>Score</label> <br>
    <input name="score" type="text" placeholder="Score" required></input> <br> <br>
    <label>Votes</label> <br>
    <input name="votes" type="text" placeholder="Votes" required></input> <br> <br>
    <label>Price</label> <br>
    <input name="price" type="text" placeholder="Price" required></input> <br> <br>
    <label>Image URL</label> <br>
    <input name="image_url" type="text" placeholder="Image URL" required></input> <br> <br>
    <label>Description</label> <br>
    <input name="description" type="textarea" placeholder="Description" required></input> <br> <br>
    <input class="btn btn-success" type="submit"></input>
</form>
@endsection