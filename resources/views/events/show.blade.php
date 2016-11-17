@extends('app')

@section('content')
<div class="page-header">
    <h1>{{ $event->title }}</h1>
    @can('edit', $event)
        <a href="/events/{{ $event->id }}/edit">Edit</a>
    @endif
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <img src="{{ asset('/storage/' . $event->image) }}">
    </div>
</div>
@endsection
