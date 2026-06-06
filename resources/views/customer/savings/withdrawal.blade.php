<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Withdraw Savings') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

                <!-- Hero Section -->
                <div class="relative overflow-hidden rounded-3xl p-8 shadow-2xl transition-all mb-8" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.15), rgba(0, 88, 168, 0.1)); border: 1px solid rgba(0, 168, 216, 0.2);">
                    <div class="relative z-10">
                        <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl mb-3">
                            Withdraw Your Savings 💰
                        </h1>
                        <p class="text-cyan-100 text-lg">Access your mature savings when you need them most</p>
                    </div>
                </div>

                @if($savingsAccount)
                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Total Balance Card -->
                        <div class="group relative overflow-hidden rounded-3xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));">
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-400/5 to-blue-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-sm font-bold text-cyan-300 uppercase tracking-widest">Total Balance</p>
                                    <span class="text-2xl">💳</span>
                                </div>
                                <p class="text-4xl font-black text-green-400 mb-1">Tsh {{ number_format($savingsAccount->balance, 2) }}</p>
                                <p class="text-xs text-cyan-200">Complete balance</p>
                            </div>
                        </div>

                        <!-- Available for Withdrawal Card -->
                        <div class="group relative overflow-hidden rounded-3xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(34, 197, 94, 0.05));">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-400/5 to-emerald-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-sm font-bold text-green-300 uppercase tracking-widest">Ready to Withdraw</p>
                                    <span class="text-2xl">✓</span>
                                </div>
                                <p class="text-4xl font-black text-yellow-400 mb-1">Tsh {{ number_format($totalMatureAmount, 2) }}</p>
                                <p class="text-xs text-green-200">Mature & available</p>
                            </div>
                        </div>

                        <!-- Pending Withdrawals Card -->
                        <div class="group relative overflow-hidden rounded-3xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(234, 88, 12, 0.1), rgba(234, 88, 12, 0.05));">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-400/5 to-red-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-sm font-bold text-orange-300 uppercase tracking-widest">Pending</p>
                                    <span class="text-2xl">⏳</span>
                                </div>
                                <p class="text-4xl font-black text-orange-400 mb-1">Tsh {{ number_format($totalPendingWithdrawal, 2) }}</p>
                                <p class="text-xs text-orange-200">Processing</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Mature Transactions Available -->
                @if($matureTransactions->count() > 0)
                    <div class="bg-white/5 backdrop-blur-md rounded-3xl p-8 shadow-lg mb-8" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.08), rgba(34, 197, 94, 0.03));">
                        <h3 class="text-2xl font-bold text-green-400 mb-8 flex items-center gap-2">
                            <span>✓</span> Mature Plans Ready for Withdrawal
                        </h3>

                        <form method="POST" action="{{ route('customer.savings.withdraw') }}">
                            @csrf

                            @if(session('success'))
                                <div class="mb-6 rounded-2xl border-l-4 border-green-500 bg-green-900/40 px-6 py-4 text-green-100 backdrop-blur-sm">
                                    <p class="font-semibold">✓ Success!</p>
                                    <p class="text-sm mt-1">{{ session('success') }}</p>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="mb-6 rounded-2xl border-l-4 border-red-500 bg-red-900/40 px-6 py-4 text-red-100 backdrop-blur-sm">
                                    <p class="font-semibold">⚠ Error</p>
                                    <ul class="list-disc list-inside space-y-1 text-sm mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="space-y-4 mb-8">
                                @foreach($matureTransactions as $transaction)
                                    <div class="group relative overflow-hidden rounded-2xl p-6 backdrop-blur-sm transition-all duration-300 bg-gradient-to-r from-green-900/30 to-green-800/20 hover:shadow-xl hover:-translate-y-1">
                                        <div class="flex items-start gap-4">
                                            <input type="checkbox" name="transaction_ids[]" value="{{ $transaction->id }}" class="mt-2 h-5 w-5 rounded border border-green-500 bg-slate-950 text-green-500 focus:ring-2 focus:ring-green-400/50 cursor-pointer">
                                            <div class="flex-1">
                                                <div class="flex justify-between items-start mb-3">
                                                    <div>
                                                        <p class="text-lg font-bold text-green-400">{{ $transaction->plan_months }}-Month Plan</p>
                                                        <p class="text-sm text-cyan-300 mt-1">📅 Deposited: {{ $transaction->created_at->format('M d, Y') }}</p>
                                                    </div>
                                                    <span class="text-2xl font-black text-green-400">Tsh {{ number_format($transaction->amount, 2) }}</span>
                                                </div>
                                                <p class="text-sm font-semibold text-green-300">✓ Matured on {{ $transaction->getMaturityDateFormatted() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="space-y-5">
                                <div>
                                    <label for="amount" class="block text-sm font-bold text-cyan-200 uppercase tracking-wider mb-3">Withdrawal Amount (TSh)</label>
                                    <input id="amount" name="amount" type="number" step="0.01" required value="{{ old('amount') }}" class="w-full rounded-2xl border border-cyan-500/50 bg-slate-950/50 backdrop-blur-sm px-5 py-4 text-cyan-100 placeholder:text-cyan-400 focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30 focus:outline-none transition-all" placeholder="Enter amount to withdraw" />
                                    <p class="mt-3 text-sm text-cyan-300">Maximum available: <span class="font-bold text-yellow-400">Tsh {{ number_format($totalMatureAmount, 2) }}</span></p>
                                </div>

                                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                                    <button type="submit" class="group flex-1 relative inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-green-600 to-green-500 px-8 py-4 text-base font-bold uppercase tracking-widest text-white shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:from-green-700 hover:to-green-600">
                                        <span class="relative z-10">💸 Submit Withdrawal</span>
                                    </button>

                                    <a href="{{ route('customer.savings.index') }}" class="group flex-1 relative inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-slate-700 to-slate-600 px-8 py-4 text-base font-bold uppercase tracking-widest text-cyan-200 shadow-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-1 hover:from-slate-600 hover:to-slate-500">
                                        <span class="relative z-10">← Back</span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <!-- No Mature Transactions Section -->
                    <div class="bg-white/5 backdrop-blur-md rounded-3xl p-8 shadow-lg" style="background: linear-gradient(135deg, rgba(234, 88, 12, 0.08), rgba(234, 88, 12, 0.03));">
                        <div class="text-center">
                            <div class="text-6xl mb-4">⏳</div>
                            <p class="text-2xl font-bold text-orange-300 mb-3">No Plans Ready for Withdrawal</p>
                            <p class="text-cyan-200 mb-8 max-w-2xl mx-auto">Your plans are still in progress. Check back once they reach maturity.</p>
                            
                           @if($savingsAccount->transactions->count() > 0)
                            <div class="space-y-4">
                                @foreach($savingsAccount->transactions->where('type', 'deposit')->sortByDesc('created_at')->take(4) as $transaction)
                                    @php
                                        $isMatured = $transaction->isMatured();
                                        $daysRemaining = $transaction->daysUntilMaturity();
                                    @endphp
                                    <div class="group relative overflow-hidden rounded-2xl p-5 backdrop-blur-sm transition-all duration-300 @if($transaction->status === 'withdrawn') bg-gradient-to-r from-gray-900/30 to-gray-800/20 @elseif($isMatured) bg-gradient-to-r from-green-900/30 to-green-800/20 @else bg-gradient-to-r from-blue-900/30 to-blue-800/20 @endif hover:shadow-xl hover:-translate-y-1">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <div class="flex items-center gap-3 mb-2">
                                                    <p class="text-lg font-bold @if($transaction->status === 'withdrawn') text-gray-400 @elseif($isMatured) text-green-400 @else text-blue-400 @endif">
                                                        {{ $transaction->plan_months }}-Month Plan
                                                    </p>
                                                    <span class="inline-flex items-center px-3 py-1 text-xs font-bold rounded-full @if($transaction->status === 'withdrawn') bg-gray-700/60 text-gray-300 @elseif($isMatured) bg-green-700/60 text-green-300 @else bg-blue-700/60 text-blue-300 @endif">
                                                        @if($transaction->status === 'withdrawn')
                                                            ✓ Withdrawn
                                                        @elseif($isMatured)
                                                            ✓ Ready
                                                        @else
                                                            ⏳ Active
                                                        @endif
                                                    </span>
                                                </div>
                                                <p class="text-xs @if($transaction->status === 'withdrawn') text-gray-400 @else text-cyan-300 @endif">
                                                    📅 Deposited: {{ $transaction->created_at->format('M d, Y') }}
                                                </p>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-2xl font-black @if($transaction->status === 'withdrawn') text-gray-400 @elseif($isMatured) text-green-400 @else text-cyan-400 @endif">
                                                    Tsh {{ number_format($transaction->amount, 2) }}
                                                </p>
                                                <p class="text-xs font-semibold @if($transaction->status === 'withdrawn') text-gray-400 @elseif($isMatured) text-green-300 @else text-yellow-400 @endif">
                                                    @if($transaction->status === 'withdrawn')
                                                        ✓ Withdrawn
                                                    @elseif($isMatured)
                                                        ✓ Matured: {{ $transaction->getMaturityDateFormatted() }}
                                                    @else
                                                        ⏱ {{ $daysRemaining }} days left
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="rounded-2xl bg-cyan-950/30 backdrop-blur-sm p-8 text-center">
                                <p class="text-lg font-bold text-cyan-300 mb-2">No deposits yet</p>
                                <p class="text-sm text-cyan-200">Start depositing today to begin your savings journey. Withdrawals become available once a plan matures.</p>
                            </div>
                        @endif
                    </div>
                

                            <a href="{{ route('customer.savings.index') }}" class="inline-flex mt-8 items-center justify-center rounded-2xl bg-gradient-to-r from-cyan-600 to-cyan-500 px-10 py-4 text-base font-bold uppercase tracking-widest text-white shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:from-cyan-700 hover:to-cyan-600">
                                <span>💳 Add More Deposits</span>
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
