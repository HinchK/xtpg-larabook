@forelse ($statuses as $status)
    @include('statuses.partials.status')
@empty
    <p>This user has not yet posted a status.</p>
@endforelse