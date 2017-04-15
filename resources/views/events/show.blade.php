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
                {{ $event->description }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <participant-list :event="{{ $event->toJson() }}"></participants-list>
    </div>
</div>
@endsection
