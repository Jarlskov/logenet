@extends('app')

@section('content')
<div class="page-header">
    <h1>Edit event: {{ $event->title }}</h1>
    <a href="/events/{{ $event->id }}">Back to event</a>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form method="POST" action="/events/{{ $event->id }}" class="form-horizontal event-form" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Event title</label>
                <div class="col-sm-10">
                    <input name="title" type="text" class="form-control" id="title" placeholder="title" value="{{ $event->title }}">
                </div>
            </div>
            <div class="form-group">
                <label for="location" class="col-sm-2 control-label">Location</label>
                <div class="col-sm-10">
                    <input type="text" id="location" name="location" class="form-control" placeholder="location" value="{{ $event->location }}">
                </div>
            </div>
            <div class="form-group">
                <label for="fromtime" class="col-sm-2 control-label">Start</label>
                <div class="col-sm-4">
                    <input name="fromtime" type="text" id="fromtime" class="form-control datepicker" data-default-date="{{ $event->starttime }}">
                </div>
                <label for="totime" class="col-sm-2 control-label">End</label>
                <div class="col-sm-4">
                    <input name="totime" id="totime" type="text" class="form-control datepicker" data-default-date="{{ $event->endtime }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="image">Select image</label>
                <div class="col-sm-10">
                    <input id="image" name="image" type="file" class="file-loading" data-preview="{{ asset('storage/' . $event->image) }}">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="10">{{ $event->description }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input class="btn btn-primary" type="submit" value="Update event">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
