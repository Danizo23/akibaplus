<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingsAccount extends Model
{
    protected $fillable = [
        'user_id',
        'balance',
        'period_months',
        'mobile_number',
        'provider',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(SavingsTransaction::class);
    }

    /**
     * Get all mature transactions that haven't been withdrawn
     */
    public function getMatureTransactions()
    {
        return $this->transactions()
            ->where('status', 'active')
            ->where('type', 'deposit')
            ->whereNotNull('maturity_date')
            ->get()
            ->filter(function ($transaction) {
                return $transaction->isMatured();
            });
    }

    /**
     * Get total amount available for withdrawal
     */
    public function getTotalMatureAmount(): float
    {
        return (float) $this->getMatureTransactions()->sum('amount');
    }

    /**
     * Get all pending withdrawal transactions
     */
    public function getPendingWithdrawals()
    {
        return $this->transactions()
            ->where('status', 'pending')
            ->where('type', 'withdrawal')
            ->get();
    }

    /**
     * Get total amount pending withdrawal
     */
    public function getTotalPendingWithdrawal(): float
    {
        return (float) $this->getPendingWithdrawals()->sum('amount');
    }

    /**
     * Get all active deposits (not yet mature)
     */
    public function getActiveDeposits()
    {
        return $this->transactions()
            ->where('status', 'active')
            ->where('type', 'deposit')
            ->whereNotNull('maturity_date')
            ->get()
            ->filter(function ($transaction) {
                return !$transaction->isMatured();
            });
    }
}
