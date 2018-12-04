@extends('layouts.main')

@section('content')

<form method="POST" class="form-group" action="{{ route('admin.store') }}">
    @csrf

    <div class="form-group">
        <label>Name</label>
        <input class="form-control" name="name" type="text" oninput="onNameInput(this)" value="{{ old('name', $game->name) }}">
    </div>

    <div class="form-group">
        <label>Slug</label>
        <input class="form-control" name="slug" id="slug" type="text" value="{{ old('slug', $game->slug) }}">
    </div>

    <div class="form-group">
        <label>Publisher</label>
        <input class="form-control" name="publisher" type="text" value="{{ old('publisher', $game->slug) }}">
    </div>

    <div class="form-group">
        <label>Genre</label>
        <select class="form-control" name="genre_id">
            <option></option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id}}"{{ selected($genre->id, data_get($game, 'genre.id'))}}>{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Platforms</label>

        <div class="d-flex justify-content-between ml-5 mr-5">
            @foreach($platforms as $platform)
                <div class="custom-checkbox custom-control custom-checkbox-icon custom-control-inline">
                    <input class="custom-control-input"
                           type="checkbox" name="platforms[]"
                           value="{{ $platform->id }}" id="platform-{{ $platform->id }}"
                           {{ checked($platform->id, $game->platforms) }}>
                    <label class="custom-control-label" for="platform-{{ $platform->id }}">
                        <i class="{{ $platform->icon }} fa-fw"></i>
                        {{ $platform->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="form-group">
        <label>Score</label>
        <input class="form-control" name="score" type="number" value="{{ old('score', $game->score) }}">
    </div>

    <div class="form-group">
        <label>Votes</label>
        <input class="form-control" name="votes" type="number" value="{{ old('votes', $game->votes) }}">
    </div>

    <div class="form-group">
        <label>Price</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input class="form-control" name="price" type="number" value="{{ old('price', $game->price) }}">
        </div>
        <small class="form-text text-muted">
            To make a game free, enter 0.
        </small>
    </div>

    <div class="form-group">
        <label>Image URL</label>
        <input class="form-control" name="image_url" type="text" value="{{ old('image_url', $game->image_url) }}">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description">{{ old('description', $game->description) }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">
        <i class="fa fa-plus"></i>
        Save Game
    </button>
</form>

@endsection

@section('scripts')
    <script>
        $slug = $('#slug');
        function onNameInput(obj) {
            $slug.val(slugify(obj.value));
        }

        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }
    </script>
@endsection
