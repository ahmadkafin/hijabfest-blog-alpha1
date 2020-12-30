<?php

namespace App\Repositories;

use App\Models\BoothsEventModel;

class BoothEventsRepositories
{

    /**
     * get booth based on event
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function getBooth(int $id)
    {
        return BoothsEventModel::where('event_id', $id)->get();
    }

    /**
     * store to booth based on event
     * @param array $data
     * 
     * @return \Illuminate\Http\Response
     */
    public function storeBooth(array $data)
    {
        return BoothsEventModel::create($data);
    }

    /**
     * find booth base on id
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function findBooth(int $id)
    {
        return BoothsEventModel::findOrFail($id);
    }

    /**
     * update booth
     * @param int $id
     * @param array $data
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateBooth(int $id, array $data)
    {
        return BoothsEventModel::where('id', $id)->update($data);
    }

    /**
     * update batch booth
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function deleteBooth(int $id)
    {
        return BoothsEventModel::where('id', $id)->delete();
    }

    /**
     * update batch booth
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function getBoothEvent(int $id)
    {
        return BoothsEventModel::where('event_id', $id)->orderBy('id', 'desc')->first();
    }
}
