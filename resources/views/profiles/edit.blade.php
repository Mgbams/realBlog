@extends('layouts.app')

@section('content')
<div class="container">
<form action="/profile/{{ $user->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row"><h1>Edit Profile</h1></div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title}}" required autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>
                    <input type="text" id="description" class="form-control-file @error('description') is-invalid @enderror" name="description"  value="{{ old('title') ?? $user->profile->description}}" />

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="url" class="col-md-4 col-form-label">URL</label>
                    <input type="text" id="url" class="form-control-file @error('url') is-invalid @enderror" name="url"  value="{{ old('title') ?? $user->profile->url}}" />

                    @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

               <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                    <input type="file" id="image" class="form-control-file @error('image') is-invalid @enderror" name="image" />

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection