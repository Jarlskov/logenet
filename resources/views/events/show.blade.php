@extends('app')

@section('content')
<div class="page-header">
    <h1>{{ $event->title }}</h1>
    @can('edit', $event)
        <a href="/events/{{ $event->id }}/edit">Edit</a>
    @endif
</div>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Description
            </div>
            <div class="panel-body">
                @if ($event->image)
                    <img class="img-responsive img-rounded" src="{{ asset('/storage/' . $event->image) }}">
                @endif
                &nbsp;
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Participants</div>
            <div class="panel-body">
                Participants
                <ul>
                    @foreach ($event->participants()->orderBy('is_host', 'DESC')->get() as $participant)
                        <li>{{ $participant->name }}@if($participant->pivot->is_host) <i class="glyphicon glyphicon-star"></i> @endif</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
