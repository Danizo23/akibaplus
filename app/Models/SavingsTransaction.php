<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SavingsTransaction extends Model
{
    protected $fillable = [
        'savings_account_id',
        'amount',
        'type',
        'plan_months',
        'maturity_date',
        'status',
    ];

    protected $casts = [
        'maturity_date' => 'datetime',
    ];

    public function account()
    {
        return $this->belongsTo(SavingsAccount::class, 'savings_account_id');
    }

    /**
     * Check if the plan has reached maturity
     */
    public function isMatured(): bool
    {
        return $this->maturity_date && Carbon::now()->greaterThanOrEqualTo($this->maturity_date);
    }

    /**
     * Get days remaining until maturity
     */
    public function daysUntilMaturity(): int
    {
        if (!$this->maturity_date) {
            return 0;
        }
        
        $remaining = Carbon::now()->diffInDays($this->maturity_date, false);
        return max(0, $remaining);
    }

    /**
     * Get maturity date formatted
     */
    public function getMaturityDateFormatted(): string
    {
        return $this->maturity_date ? $this->maturity_date->format('M d, Y') : 'N/A';
    }
}
