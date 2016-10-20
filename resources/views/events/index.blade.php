@extends('app')

@section('content')
<div class="page-header">
    <h1>Events</h1>
</div>
<div>
    <a href="/events/create" class="btn btn-primary">Plan new event</a>
</div>
<div>
    @if ($events->isEmpty())
        You have no upcomming events.
    @else
        @foreach ($events as $event)
            <a href="/events/{{ $event->id }}">{{ $event->title }}</a><br>
        @endforeach
    @endif
</div>
<div>
    <a href="/events/create" class="btn btn-primary">Plan new event</a>
</div>
@endsection
