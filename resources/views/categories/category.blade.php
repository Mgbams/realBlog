@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
            @endif

            @if(session('response'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{session('response')}}</strong>
                </div>
            @endif

            <div class="card">
                <div class="card-header">Category</div>

                <div class="card-body">
                <form method="POST" action="{{ url('/addCategory') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Enter Category</label>

                            <div class="col-md-6">
                                <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autofocus>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Category
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection