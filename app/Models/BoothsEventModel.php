<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoothsEventModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_booth_event';
    protected $fillable = ['event_id', 'booth_nomor', 'is_active', 'booth_price'];

    public function events()
    {
        $this->belongsTo(EventModel::class, 'event_id');
    }
}
