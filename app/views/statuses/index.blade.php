@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="status-post">
                {{ Form::open() }}

                    <div class="form-group">
                        {{-- Form::label('body', 'Status:') --}}
                        {{ Form::textarea('body',null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => "What's going on?"]) }}

                    </div>

                    <div class="form-group status-post-submit">
                        {{ Form::submit('Post Status',['btn btn-primary btn-xs']) }}
                    </div>

                {{ Form::close() }}
            </div>

            @foreach($statuses as $status)

                @include('statuses.partials.status')

            @endforeach
        </div>
    </div>
@stop