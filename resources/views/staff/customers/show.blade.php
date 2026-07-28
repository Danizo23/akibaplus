@extends('layouts.app')

@section('content')
    <x-dashboard-shell title="Customer Details" description="View customer balances and withdrawals." icon="👤">
        <div class="space-y-6">
            <div>
                <p class="text-sm text-cyan-200">{{ $user->email }}</p>
                <h2 class="text-2xl font-bold text-white">{{ $user->name }}</h2>
                <p class="text-cyan-200 mt-2">Total deposits: Tsh {{ number_format($totalDeposits, 2) }}</p>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white">Withdrawal History</h3>
                @if($withdrawals->count())
                    <ul class="mt-4 space-y-3">
                        @foreach($withdrawals as $w)
                            <li class="flex items-center justify-between bg-slate-800 rounded-md px-4 py-3">
                                <div>
                                    <p class="text-white font-semibold">Tsh {{ number_format($w->amount, 2) }}</p>
                                    <p class="text-xs text-cyan-200">{{ $w->created_at->toDayDateTimeString() }}</p>
                                </div>
                                <div class="text-sm text-cyan-200">Status: {{ ucfirst($w->status ?? 'completed') }}</div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-cyan-200">No withdrawals found for this customer.</p>
                @endif
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white">Deposit Plans</h3>
                @if($depositTransactions->count())
                    <ul class="mt-4 space-y-3">
                        @foreach($depositTransactions as $deposit)
                            <li class="bg-slate-800 rounded-md p-4">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="text-white font-semibold">Tsh {{ number_format($deposit->amount, 2) }}</p>
                                        <p class="text-sm text-cyan-200">Plan: {{ $deposit->plan_months }} months</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm text-cyan-200">Maturity: {{ $deposit->getMaturityDateFormatted() }}</p>
                                        <p class="text-sm text-cyan-200">{{ $deposit->isMatured() ? 'Mature' : $deposit->daysUntilMaturity() . ' days until maturity' }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-cyan-200">No deposit plans found for this customer.</p>
                @endif
            </div>

            <div class="flex gap-3">
                <a href="{{ route('staff.customers.index') }}" class="inline-flex items-center justify-center rounded-2xl bg-slate-700 px-6 py-3 text-sm font-semibold text-white hover:bg-slate-600">← Back</a>
            </div>
        </div>
    </x-dashboard-shell>
@endsection
