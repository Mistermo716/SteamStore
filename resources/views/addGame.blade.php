@extends('layouts.main')

@section('content')
<form method="POST" class="form-group" action="addGame">
    {{csrf_field()}}
    <label>Name</label> <br>
    <input name="name" type="text" placeholder="Name of Game"></input> <br> <br>
    <label>Publisher</label> <br>
    <input name="publisher" type="text" placeholder="Publisher"></input> <br> <br>
    <label>Score</label> <br>
    <input name="score" type="text" placeholder="Score"></input> <br> <br>
    <label>Votes</label> <br>
    <input name="votes" type="text" placeholder="Votes"></input> <br> <br>
    <label>Price</label> <br>
    <input name="price" type="text" placeholder="Price"></input> <br> <br>
    <label>Image URL</label> <br>
    <input name="img_url" type="text" placeholder="Image URL"></input> <br> <br>
    <label>Description</label> <br>
    <input name="description" type="textarea" placeholder="Description"></input> <br> <br>
    <input class="btn btn-success" type="submit"></input>
</form>
@endsection