@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to ScheduleGuru!</h1>
        <p>Sign up or log in with Google to create a new Account!</p>
        <p>Sign in to view your Tutoring Schedule!</p>

        @if( ! $currentUser)
            <p>
            {{ link_to_route('register_path', 'Sign up »', null, ['class' => 'btn btn-lg btn-primary']) }}
            </p>
            <br/>
            <button class="btn btn-lg btn-group-lg"><a href=" {{{ URL::to('a/login/google')  }}}">Login with Google </a></button>
        @endif
    </div>

@stop