@extends('app')

@section('title')
    Events
@endsection

@section('content')
<div class="page-header">
    <h1>Events</h1>
</div>
<event-list :events="{{ $events->toJson() }}"></event-list>
<event-form></event-form>
@endsection
