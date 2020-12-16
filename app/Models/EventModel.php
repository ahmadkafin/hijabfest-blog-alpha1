<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class EventModel extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'tbl_events';
    protected $fillable =
    [
        'user_id',
        'event_name',
        'event_slug',
        'event_desc',
        'event_cover',
        'event_is_active',
        'deleted_at'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'event_slug'   => [
                'source'   => 'event_name'
            ]
        ];
    }
}
