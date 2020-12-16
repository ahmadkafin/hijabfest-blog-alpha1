<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Repositories\EventRepositories;
use App\Services\EventServices;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Models\EventModel;

class EventController extends Controller
{

    private $events;
    public function __construct(EventRepositories $events)
    {
        $this->events = $events;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->events->getEvent();
        return view('admin.page-event-show', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page-event-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        try {
            $eventServices = new EventServices;
            $data = $eventServices->popData($request);
            $this->events->createEvent($data);
            return redirect('/admin/events')->with('status', 'Telah berhasil membuat ' . $request->event_name);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = $this->events->findEvent($id);
        return view('admin.page-event-edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $id)
    {
        try {
            $eventServices = new EventServices;
            $data = $eventServices->popData($request);
            $this->events->updateEvent($id, $data);
            return redirect('admin/events')->with('status', 'berhasil update ' . $request->event_name);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->events->deleteEvent($id);
        return redirect()->back()->with('status', 'berhasil menghapus event');
    }


    /**
     * get slug for add and update article.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function slugs(Request $request)
    {
        $slug = $request->event_name != '' ? SlugService::createSlug(EventModel::class, 'event_slug', $request->event_name) : '';
        return response()->json(['slugs' => $slug]);
    }
}
