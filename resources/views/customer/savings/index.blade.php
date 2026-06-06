<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Deposit Money') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

                <!-- Hero Section -->
                <div class="relative overflow-hidden rounded-3xl p-8 shadow-2xl transition-all mb-8" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.15), rgba(0, 88, 168, 0.1)); border: 1px solid rgba(0, 168, 216, 0.2);">
                    <div class="relative z-10">
                        <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl mb-3">
                            Your Savings Growth 📈
                        </h1>
                        <p class="text-cyan-100 text-lg">Start building your financial future with flexible savings plans designed for you</p>
                    </div>
                </div>

                <!-- Stats Grid -->
                @if($savingsAccount)
                    @php
                        $sixTotal = $savingsAccount->transactions->where('plan_months', 6)->where('type', 'deposit')->where('status', '!=', 'withdrawn')->sum('amount');
                        $twelveTotal = $savingsAccount->transactions->where('plan_months', 12)->where('type', 'deposit')->where('status', '!=', 'withdrawn')->sum('amount');
                        $totalSavings = $savingsAccount->balance;
                    @endphp
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Total Savings Card -->
                        <div class="group relative overflow-hidden rounded-3xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(34, 197, 94, 0.05));">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-400/5 to-cyan-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-sm font-bold text-green-300 uppercase tracking-widest">Total Savings</p>
                                    <span class="text-2xl">💰</span>
                                </div>
                                <p class="text-4xl font-black text-green-400 mb-1">Tsh {{ number_format($totalSavings, 2) }}</p>
                                <p class="text-xs text-green-200">Your complete savings balance</p>
                            </div>
                        </div>

                        <!-- 6-Month Plan Card -->
                        <div class="group relative overflow-hidden rounded-3xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));">
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-400/5 to-blue-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-sm font-bold text-cyan-300 uppercase tracking-widest">6-Month Plan</p>
                                    <span class="text-2xl">📅</span>
                                </div>
                                <p class="text-4xl font-black text-cyan-400 mb-1">Tsh {{ number_format($sixTotal, 2) }}</p>
                                <p class="text-xs text-cyan-200">Short-term savings</p>
                            </div>
                        </div>

                        <!-- 12-Month Plan Card -->
                        <div class="group relative overflow-hidden rounded-3xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(168, 85, 247, 0.1), rgba(168, 85, 247, 0.05));">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-400/5 to-pink-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-sm font-bold text-purple-300 uppercase tracking-widest">12-Month Plan</p>
                                    <span class="text-2xl">⭐</span>
                                </div>
                                <p class="text-4xl font-black text-purple-400 mb-1">Tsh {{ number_format($twelveTotal, 2) }}</p>
                                <p class="text-xs text-purple-200">Long-term growth</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Deposit Form Section -->
                <div class="mb-8 bg-white/5 backdrop-blur-md rounded-3xl p-8 shadow-lg" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.08), rgba(0, 168, 216, 0.03));">
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

                    <h3 class="text-2xl font-bold text-cyan-300 mb-8 flex items-center gap-2">
                        <span>💳</span> Make a Deposit
                    </h3>

                    <form method="POST" action="{{ route('customer.savings.deposit') }}" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="amount" class="block text-sm font-bold text-cyan-200 uppercase tracking-wider mb-3">Amount (TSh)</label>
                                <input id="amount" name="amount" type="number" step="0.01" required class="w-full rounded-2xl border border-cyan-500/50 bg-slate-950/50 backdrop-blur-sm px-5 py-4 text-cyan-100 placeholder:text-cyan-400 focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30 focus:outline-none transition-all" placeholder="Enter amount" />
                            </div>

                            <div>
                                <label for="plan_months" class="block text-sm font-bold text-cyan-200 uppercase tracking-wider mb-3">Deposit Into Plan</label>
                                <select id="plan_months" name="plan_months" required class="w-full rounded-2xl border border-cyan-500/50 bg-slate-950/50 backdrop-blur-sm px-5 py-4 text-cyan-100 appearance-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30 focus:outline-none transition-all">
                                    <option value="" disabled {{ old('plan_months') ? '' : 'selected' }}>Select plan</option>
                                    <option value="6" {{ old('plan_months', $savingsAccount?->period_months) == 6 ? 'selected' : '' }}>📅 6 Months</option>
                                    <option value="12" {{ old('plan_months', $savingsAccount?->period_months) == 12 ? 'selected' : '' }}>⭐ 1 Year</option>
                                </select>
                            </div>
                        </div>

                        @if(!$savingsAccount)
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="mobile_number" class="block text-sm font-bold text-cyan-200 uppercase tracking-wider mb-3">Mobile Number</label>
                                    <input id="mobile_number" name="mobile_number" type="text" required placeholder="e.g. 07XXXXXXXX" class="w-full rounded-2xl border border-cyan-500/50 bg-slate-950/50 backdrop-blur-sm px-5 py-4 text-cyan-100 placeholder:text-cyan-400 focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30 focus:outline-none transition-all" />
                                </div>

                                <div>
                                    <label for="provider" class="block text-sm font-bold text-cyan-200 uppercase tracking-wider mb-3">Mobile Money Provider</label>
                                    <select id="provider" name="provider" required class="w-full rounded-2xl border border-cyan-500/50 bg-slate-950/50 backdrop-blur-sm px-5 py-4 text-cyan-100 appearance-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30 focus:outline-none transition-all">
                                        <option value="" disabled selected>Select provider</option>
                                        <option value="tigo">Tigo</option>
                                        <option value="voda">Vodacom</option>
                                        <option value="airtel">Airtel</option>
                                        <option value="halotel">Halotel</option>
                                    </select>
                                </div>
                            </div>
                        @else
                            <input type="hidden" name="mobile_number" value="{{ $savingsAccount->mobile_number }}" />
                            <div class="rounded-2xl bg-cyan-950/30 backdrop-blur-sm p-5">
                                <p class="text-cyan-200"><span class="font-bold text-cyan-300">Depositing from:</span> {{ $savingsAccount->mobile_number }} <span class="text-cyan-400">({{ ucfirst($savingsAccount->provider) }})</span></p>
                            </div>
                        @endif

                        <div class="flex justify-end pt-4">
                            <button type="submit" class="group relative inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-cyan-600 to-cyan-500 px-8 py-4 text-base font-bold uppercase tracking-widest text-white shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:from-cyan-700 hover:to-cyan-600">
                                <span class="relative z-10">💾 Deposit Money</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Transactions History and Withdrawal Section -->
                @if($savingsAccount)
                    <div class="bg-white/5 backdrop-blur-md rounded-3xl p-8 shadow-lg" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.08), rgba(0, 168, 216, 0.03));">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
                            <h3 class="text-2xl font-bold text-cyan-300 flex items-center gap-2">
                                <span>📊</span> Your Savings Plans
                            </h3>
                          
                        </div>

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
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
