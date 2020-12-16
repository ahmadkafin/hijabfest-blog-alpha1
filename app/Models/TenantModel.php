<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class TenantModel extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'tbl_tenants';
    protected $filable = 
    [
        'user_id',
        'tenant_email',
        'tenant_brand',
        'tenant_slugs',
        'tenant_logo',
        'tenant_brand_is_active'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sluggable(): array
    {
        return [
            'tenant_slugs'  => [
                'source'    => 'tenant_brand'
            ]
        ];
    }
}
