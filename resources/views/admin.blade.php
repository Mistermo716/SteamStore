@extends('layouts.main')

@section('content')
<script>
    function confirmDelete(){
      return confirm("Are you sure you want to delete this product?");        
    }
    
  </script>
    <h3 class="text-center">
        Hello {{$admin}}
    </h3>
    <a style="width:100%" class="btn btn-success" href="admin/addGame">Add Game</a>
    <div class="table-responsive">
    <table class='table table-hover'>
        <thead>
                <tr>
                  <th scope='col'>ID</th>
                  <th scope='col'>Name</th>
                  <th scope='col'>Publisher</th>
                  <th scope='col'>Genre</th>
                  <th scope='col'>Score</th>
                  <th scope='col'>Price</th>
                  <th scope='col'>Update</th>
                  <th scope='col'>Remove</th>
                  </tr>
        </thead>
        @foreach($games as $game)
        <tr>
            <td>{{$game->id}}</td>
            <td>{{$game->name}}</td>
            <td>{{$game->publisher}}</td>
            <td>{{$game->genre->name}}</td>
            <td>{{$game->score}}</td>
            <td>${{$game->price}}</td>
        <td><a class='btn btn-primary' href='updateProduct.php?productId="{{$game->id}}"'>Update</a></td>
            <form onsubmit='return confirmDelete()'>
            <input type='hidden' name='productId' value="{{$game->id}}" />
            <td><input type='submit' class='btn btn-danger' value='Remove'></td>
            </form>
        </tr>
        @endforeach
    </table>
</div>
@endsection