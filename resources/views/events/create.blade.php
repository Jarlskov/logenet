@extends('app')

@section('content')
<div class="page-header">
    <h1>{{ trans('events.plan_new_event') }}</h1>
</div>
<div class="row">
    <div class="col-cs-12">
        <div class="well page active">
            <form method="POST" action="/events" class="event-form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group label-floating">
                    <label for="title" class="control-label">{{ trans('events.title_label') }}</label>
                    <input name="title" type="text" class="form-control" id="title">
                </div>
                <div class="form-group label-floating">
                    <label for="location" class="control-label">{{ trans('events.location_label') }}</label>
                    <input type="text" id="location" name="location" class="form-control">
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group label-static">
                            <label for="fromtime" class="control-label">{{ trans('events.start_time_label') }}</label>
                            <input name="fromtime" type="text" id="fromtime" class="form-control datepicker">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group label-static">
                            <label for="totime" class="control-label">{{ trans('events.end_time_label') }}</label>
                            <input name="totime" id="totime" type="text" class="form-control datepicker">
                        </div>
                    </div>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" for="image">{{ trans('events.image_label') }}</label>
                    <input id="image" name="image" type="file" class="file-loading" data-show-upload="false">
                </div>
                <div class="form-group label-floating">
                    <label for="description" class="control-label">{{ trans('events.description_label') }}</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group label-floating">
                    <input class="btn btn-primary btn-raised" type="submit" value="{{ trans('events.create_label') }}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
