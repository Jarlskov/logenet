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
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Start</th>
                    <th>End</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr class="linked-row" data-href="/events/{{ $event->id }}">
                        <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                        <td><a href="/events/{{ $event->id }}">{{ $event->starttime->format('Y-m-d H:i') }}</a></td>
                        <td><a href="/events/{{ $event->id }}">{{ $event->endtime->format('Y-m-d H:i') }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<div>
    <a href="/events/create" class="btn btn-primary">Plan new event</a>
</div>
@endsection
