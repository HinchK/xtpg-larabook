@include('layouts.partials.errors')

<div class="status-post">
    {{ Form::open(['route' => 'statuses_path']) }}

        <div class="form-group">

            {{ Form::textarea('body',null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => "What's going on?"]) }}

        </div>

        <div class="form-group status-post-submit">
            {{ Form::submit('Post Status',['btn btn-primary btn-xs']) }}
        </div>

    {{ Form::close() }}
</div>
