<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class StaffReport extends Model
{
    protected $fillable = [
        'staff_id',
        'report_date',
        'work_summary',
        'customer_snapshot',
        'new_customers_count',
        'new_customers_total_deposit',
        'status',
    ];

    protected $casts = [
        'customer_snapshot' => 'array',
        'report_date' => 'date',
    ];

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
