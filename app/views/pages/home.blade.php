@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to LaraBook-TPG!</h1>
        <p>Sign up to create a new TPG-User Account!</p>
        <p>Sign in to view your TPG-Tutoring Schedule!</p>

        @if( ! $currentUser)
            <p>
            {{ link_to_route('register_path', 'Sign up »', null, ['class' => 'btn btn-lg btn-primary']) }}
            </p>
        @endif
    </div>

@stop