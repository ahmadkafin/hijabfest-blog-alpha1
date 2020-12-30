<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenanEventsModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_tenant_events';
    protected $fillable = ['tenant_id', 'events_id', 'is_approved'];

    public function tenants()
    {
        return $this->belongsTo(TenantModel::class, 'tenant_id');
    }
}
