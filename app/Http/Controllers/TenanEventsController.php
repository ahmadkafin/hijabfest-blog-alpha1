<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\EventRepositories;
use App\Repositories\TenanEventsRepositories;
use Illuminate\Http\Request;

class TenanEventsController extends Controller
{
    private $tenant_event;
    public function __construct(TenanEventsRepositories $tenant_event)
    {
        $this->tenant_event = $tenant_event;
    }

    public function index($id)
    {
        $brands = $this->tenant_event->getBrandWithEvents($id);
        return view('admin.page-tenant-event-show', compact('brands'));
    }

    public function approveTenant($id)
    {
        try {
            $brand  = $this->tenant_event->getBrandEvent($id);
            $data   = $brand->is_approved == false ? true : false;
            $this->tenant_event->approveTenant($id, ['is_approved' => $data]);
            $res    = $brand->is_approved == false ? 'Kamu mengizinkan ' . $brand->tenants->tenant_brand . ' mengikutin event' : 'Kamu menolak ' . $brand->tenants->tenant_brand . ' mengikutin event';
            return redirect()->back()->with('status', $res);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }
}
