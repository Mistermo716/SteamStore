@extends('layouts.main')

@section('content')
<form method="POST" class="form-group" action="editGame">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <input hidden value={{$game->id}} name=id>
    <label class="">Name</label> <br>
    <input class="form-control" name="name" value="{{$game->name}}" type="text" placeholder="Name of Game" required></input> <br> <br>
    <label>Publisher</label> <br>
    <input class="form-control" name="publisher" value={{$game->publisher}} type="text" placeholder="Publisher" required></input> <br> <br>
    <label>Genre</label> <br>
    <select class="form-control" name="genre_id" required>
    @foreach($genres as $genre)
    @if($genre->id == $game->genre_id)
    <option value="{{$genre->id}}" selected>{{$genre->name}}</option>
    @else
    <option value="{{$genre->id}}">{{$genre->name}}</option>
    @endif
    @endforeach
    </select> <br> <br>
    <label>Score</label> <br>
    <input class="form-control" name="score" value={{$game->score}} type="text" placeholder="Score" required></input> <br> <br>
    <label>Votes</label> <br>
    <input class="form-control" name="votes" value={{$game->votes}} type="text" placeholder="Votes" required></input> <br> <br>
    <label>Price</label> <br>
    <input class="form-control" name="price" value={{$game->price}} type="text" placeholder="Price" required></input> <br> <br>
    <label>Image URL</label> <br>
    <input class="form-control" name="image_url" value={{$game->image_url}} type="text" placeholder="Image URL" required></input> <br> <br>
    <label>Description</label> <br>
<textarea class="form-control" name="description" placeholder="Description" required>{{$game->description}}</textarea> <br> <br>
    <input class="btn btn-success" type="submit"></input>
</form>
@endsection