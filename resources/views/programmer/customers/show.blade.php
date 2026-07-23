<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Customer Details" description="View customer savings profile and transaction history." icon="👤">
        <div class="bg-white/5 backdrop-blur-md overflow-hidden rounded-3xl shadow-xl p-6">
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h1 class="text-3xl font-extrabold text-white">{{ $user->name }}</h1>
                        <p class="text-cyan-200">{{ $user->email }}</p>
                    </div>
                    <div class="text-right rounded-3xl bg-slate-900/80 p-5 border border-slate-700">
                        <p class="text-sm text-cyan-300 uppercase tracking-wide">Customer</p>
                        <p class="text-2xl font-black text-white">Tsh {{ number_format($totalDeposits, 2) }}</p>
                    </div>
                </div>
                <div class="rounded-3xl bg-slate-900/80 p-5">
                    <p class="text-cyan-200">Savings account details and transaction history are shown below.</p>
                </div>
            </div>
        </div>

        <div class="bg-white/5 backdrop-blur-md overflow-hidden rounded-3xl shadow-xl p-6">
            <h2 class="text-xl font-bold text-cyan-300 mb-4">Savings Transactions</h2>
            @if($savingsAccount && $savingsAccount->transactions->count())
                <div class="space-y-3">
                    @foreach($savingsAccount->transactions as $transaction)
                        <div class="rounded-2xl bg-slate-950/80 p-4 border border-slate-700">
                            <div class="flex flex-col gap-4 md:flex-row md:justify-between md:items-center">
                                <div>
                                    <p class="text-sm text-cyan-300 uppercase tracking-widest">{{ ucfirst($transaction->type) }}</p>
                                    <p class="text-white font-semibold">Tsh {{ number_format($transaction->amount, 2) }}</p>
                                    <p class="text-slate-400 text-sm">Plan: {{ $transaction->plan_months }} months</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-white">{{ $transaction->status }}</p>
                                    <p class="text-slate-400 text-sm">{{ $transaction->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 text-cyan-200">
                    <p>No savings history available for this customer.</p>
                </div>
            @endif
        </div>

        <div class="text-right">
            <a href="{{ route('programmer.customers.index') }}" class="inline-flex items-center gap-2 rounded-2xl bg-cyan-600 px-6 py-3 text-sm font-semibold text-white hover:bg-cyan-500">← Back to customers</a>
        </div>
    </x-dashboard-shell>
</x-app-layout>
