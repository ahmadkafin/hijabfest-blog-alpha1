<?php

namespace App\Repositories;

use App\Models\TenanEventsModel;

class TenanEventsRepositories
{
    /**
     * get brand with particular event
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */

    public function getBrandWithEvents(int $id)
    {
        return TenanEventsModel::where('events_id', $id)->simplePaginate(10);
    }

    /**
     * get brand with particular event
     * @param int $id
     * @param array $data
     * 
     * @return \Illuminate\Http\Response
     */
    public function approveTenant(int $id, array $data)
    {
        return TenanEventsModel::where('id', $id)->update($data);
    }

    /**
     * get brand based on id
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function getBrandEvent(int $id)
    {
        return TenanEventsModel::findOrFail($id);
    }
}
