<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Event;
use App\Event\Repository;
use App\Event\Service;
use App\Http\Requests;
use App\Http\Requests\CreateEventRequest;
use Date;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Repository $eventRepository
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Repository $eventRepository)
    {
        return view('events.index', ['events' => $eventRepository->getForUser($request->user())]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request, Service $eventService)
    {
        $event = $eventService->create($request->user(), $request->title, $request->location, Date::parse($request->fromtime), Date::parse($request->totime), $request->get('description', ''));

        return redirect('/events/' . $event->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  Event  $event
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Event  $event
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->destroy();

        return redirect('/events');
    }
}
