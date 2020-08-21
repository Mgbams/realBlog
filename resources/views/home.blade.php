@extends('layouts.app')

@section('content')
<div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block" style="height:40px;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            <!--This below commented line is only used if am displaying images on the site as they are uploaded-->
            <!--<img src="uploads/{{ Session::get('profile_pic') }}">--> 
        @endif
  
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <img src="uploads/{{ Session::get('profile_pic') }}" class="rounded-circle" style="width:70px; height:70px;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
