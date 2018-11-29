@extends('layouts.main')

@section('content')
<form method="POST" class="form-group" action="addGame">
    {{csrf_field()}}
    <label>Name</label> <br>
    <input name="name" type="text" placeholder="Name of Game"></input> <br> <br>
    <input name="publisher" type="text" placeholder="Publisher"></input> <br> <br>
    <input name="score" type="text" placeholder="Score"></input> <br> <br>
    <input type="submit"></input>
</form>
@endsection