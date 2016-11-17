<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Event;
use App\Event\Repository;
use App\Event\Service;
use App\Http\Requests;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
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
        return $this->render('events.index', ['events' => $eventRepository->getForUser($request->user())]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->render('events.create');
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

        if ($request->hasFile('image')) {
            if (!$request->file('image')->isValid()) {
                $this->addErrorMessage('Error uploading event image');

                return redirect('/events/' . $event->id . '/edit');
            }

            $eventService->updateImage($event, $request->file('image'));
        }

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
        $this->authorize('see', $event);

        return $this->render('events.show', ['event' => $event]);
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
        $this->authorize('edit', $event);

        return $this->render('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Event  $event
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event, Service $eventService)
    {
        $this->authorize('edit', $event);

        $eventService->update($event, $request->title, $request->location, Date::parse($request->fromtime), Date::parse($request->totime), $request->description);

        if ($request->hasFile('image')) {
            if (!$request->file('image')->isValid()) {
                $this->addErrorMessage('Error uploading event image');

                return redirect('/events/' . $event->id . '/edit');
            }

            $eventService->updateImage($event, $request->file('image'));
        }
        $this->addSuccessMessage('Event updated!');

        return redirect('/events/' . $event->id . '/edit');
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
        $this->authorize('edit', $event);

        $event->destroy();

        return redirect('/events');
    }
}
