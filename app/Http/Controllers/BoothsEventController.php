<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\BoothEventsRepositories;
use App\Repositories\EventRepositories;
use Illuminate\Http\Request;

class BoothsEventController extends Controller
{
    private $booths;
    public function __construct(BoothEventsRepositories $booths)
    {
        $this->booths = $booths;
    }

    /**
     * Show Booth Based on event
     * @param int $id
     * 
     * @param \Illuminate\Http\Response
     */
    public function index($id)
    {
        $booths = $this->booths->getBooth($id);
        $events = new EventRepositories;
        $event  = $events->findEvent($id);
        return view('admin.page-event-booths', compact(['booths', 'event']));
    }

    /**
     * show add page
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $events = new EventRepositories;
        $event  = $events->findEvent($id);
        $e = $this->booths->getBoothEvent($id);
        return view('admin.page-event-booths-add', compact(['event', 'e']));
    }


    /**
     * Show Booth Based on event
     * @param int $id
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            $e = $this->booths->getBoothEvent($id);
            $e = empty($e) ? 0 : $e->booth_nomor;
            for ($i = 1; $i <= $request->booth; $i++) {
                $this->booths->storeBooth([
                    'event_id'      => $id,
                    'booth_nomor'   => $i + $e,
                    'booth_price'   => $request->booth_price,
                ]);
            }
            return redirect('admin/events/' . $id . '/booths')->with('status', 'sukses menambahkan booth');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * mark available / non-available 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function markBooth($id)
    {
        try {
            $booth  = $this->booths->findBooth($id);
            $data   = $booth->is_active == false ? true : false;
            $res    = $booth->is_active == false ? 'berhasil di non-aktifkan' : 'booth berhasil di aktifkan';
            $this->booths->updateBooth($id, ['is_active' => $data]);
            return redirect()->back()->with('status', $res);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * update price single booth
     * @param int $id
     * @param \Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateBooth(Request $request, $id)
    {
        try {
            $booth  = $this->booths->findBooth($id);
            $this->booths->updateBooth($id, ['booth_price'  => $request->booth_price]);
            return redirect()->back()->with('status', 'booth nomor ' . $booth->booth_nomor . ' berhasil di ubah harga');
        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * update price single booth
     * @param int $id
     * @param \Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateNumberBooth(Request $request, $id)
    {
        try {
            $booth  = $this->booths->findBooth($id);
            $this->booths->updateBooth($id, ['booth_nomor'  => $request->booth_nomor]);
            return redirect()->back()->with('status', 'booth nomor ' . $booth->booth_nomor . ' berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * update batch booth
     * @param \Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateBatchBooth(Request $request)
    {
        try {
            foreach ($request->booth_id as $keys => $id) {
                $this->booths->updateBooth($id, ['booth_price'  => $request->harga_booth]);
            }
            return redirect()->back()->with('status', 'booth berhasil di ubah harga');
        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Destroy booth
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroyBooth($id)
    {
        $this->booths->deleteBooth($id);
        return back()->with('status', 'booth berhasil di hapus');
    }
}
