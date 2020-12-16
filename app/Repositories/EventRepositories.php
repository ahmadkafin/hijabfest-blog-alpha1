<?php

namespace App\Repositories;

use App\Models\EventModel;

class EventRepositories
{
    /**
     * get all event paginate
     * 
     * @return void
     */
    public function getEvent()
    {
        return EventModel::select(['id', 'event_name', 'event_desc', 'event_is_active', 'event_cover', 'event_slug'])->paginate(10);
    }

    /**
     * create event
     * @param [array] $data
     * 
     * @return void
     */
    public function createEvent(array $data)
    {
        return EventModel::create($data);
    }

    /**
     * get single events
     * @param [int] $id
     * 
     * @return void
     */

    public function findEvent(int $id)
    {
        return EventModel::findOrFail($id);
    }

    /**
     * update event
     * @param [int] $id
     * @param [array] $data
     * 
     * @return void
     */

    public function updateEvent(int $id, array $data)
    {
        return EventModel::where('id', $id)->update($data);
    }

    /**
     * delete data event
     * 
     * @param [int] $id
     * 
     * @return void
     */
    public function deleteEvent(int $id){
        return EventModel::where('id', $id)->delete();
    }
}
