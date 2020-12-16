<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EventServices
{
    public function popData($request)
    {
        $file = $request->event_cover;
        $cover = $this->imagesData($file);
        $id = Auth::user()->id;
        if($file != '') {
            return [
                'user_id'           =>  $id,
                'event_name'        =>  $request->event_name,
                'event_desc'        =>  $request->event_desc,
                'event_cover'       =>  $cover,
                'event_is_active'   =>  $request->event_is_active
            ];    
        } else {
            return [
                'user_id'           =>  $id,
                'event_name'        =>  $request->event_name,
                'event_desc'        =>  $request->event_desc,
                'event_is_active'   =>  $request->event_is_active
            ];
        }
    }

    private function imagesData($file)
    {
        if ($file != '') {
            $now = Carbon::now()->format('D-m');
            $filename = md5($now) . "." . $file->getClientOriginalExtension();
            $dir =  public_path() . '/img/events';
            $file->move($dir, $filename);
            return $filename;
        }
    }

    private function imageRules()
    {
        return array(
            'file'  => 'file|image|mimes:jpeg,png,jpg|max:2048'
        );
    }
}
