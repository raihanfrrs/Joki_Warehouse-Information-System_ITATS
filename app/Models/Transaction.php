<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $keyType = "string";

    public function warehouse_subscription()
    {
        return $this->belongsTo(WarehouseSubscription::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
