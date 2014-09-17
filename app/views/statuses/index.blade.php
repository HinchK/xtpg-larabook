@extends('layouts.default')

@section('content')

    <h1>Post a Status</h1>

    {{ Form::open() }}

        <div class="form-group">
            {{ Form::label('body', 'Status:') }}
            {{ Form::textarea('body',null, ['class' => 'form-control']) }}

        </div>

        <div class="form-group">
            {{ Form::submit('Post Status',['btn btn-primary']) }}
        </div>

    {{ Form::close() }}

    <h2>Statuses</h2>

    @foreach($statuses as $status)

        <article>
            {{ $status->body }}
        </article>

    @endforeach

@stop