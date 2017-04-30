@extends('app')

@section('title')
    {{ $event->name }}
@endsection

@section('content')
<event-info :can_edit_event="{{ $user->can('edit', $event) }}"  :event="{{ $event->toJson() }}"></event-info>
<event-form></event-form>
@endsection
