@extends('app')

@section('content')
<div class="page-header">
    <h1>{{ $event->title }}</h1>
    @can('edit', $event)
        <a href="/events/{{ $event->id }}/edit">Edit</a>
    @endif
</div>
@endsection
