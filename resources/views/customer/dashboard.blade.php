<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('My Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
                
                <!-- Hero / Welcome Section -->
                <div class="relative overflow-hidden rounded-3xl p-8 shadow-2xl transition-all" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.15), rgba(0, 88, 168, 0.1)); border: 1px solid rgba(0, 168, 216, 0.2);">
                    <div class="relative z-10">
                        <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl mb-2">
                            Welcome back, {{ explode(' ', Auth::user()->name)[0] }}! 👋
                        </h1>
                        <p class="text-cyan-100 text-lg">
                            Track your savings progress and reach your financial goals faster with Akibaplus.
                        </p>
                    </div>
                </div>

                <!-- Dashboard Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Total Savings Card -->
                    <div class="group relative overflow-hidden rounded-3xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(34, 197, 94, 0.05));">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-400/5 to-cyan-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-sm font-bold text-green-300 uppercase tracking-widest">Total Savings</p>
                                <span class="text-2xl">💰</span>
                            </div>
                            <h2 class="text-4xl font-black text-green-400 mb-2">
                                Tsh {{ number_format($totalSaved, 2) }}
                            </h2>
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
                            <h2 class="text-4xl font-black text-cyan-400 mb-2">Tsh {{ number_format($totalSixMonth, 2) }}</h2>
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
                            <h2 class="text-4xl font-black text-purple-400 mb-2">Tsh {{ number_format($totalTwelveMonth, 2) }}</h2>
                            <p class="text-xs text-purple-200">Long-term growth</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <a href="{{ route('customer.savings.index') }}" 
                        class="group relative overflow-hidden rounded-3xl p-8 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-400/5 to-blue-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 text-center">
                            <div class="text-5xl mb-3">💳</div>
                            <h3 class="text-2xl font-bold text-white mb-2">Make a Deposit</h3>
                            <p class="text-cyan-200 text-sm">Add money to your savings accounts</p>
                        </div>
                    </a>

                    <a href="{{ route('customer.savings.withdrawal') }}" 
                        class="group relative overflow-hidden rounded-3xl p-8 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(34, 197, 94, 0.05));">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-400/5 to-emerald-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 text-center">
                            <div class="text-5xl mb-3">💸</div>
                            <h3 class="text-2xl font-bold text-white mb-2">Withdraw Savings</h3>
                            <p class="text-green-200 text-sm">Access your mature savings</p>
                        </div>
                    </a>
                </div>

                <!-- Recent Transactions Section -->
                <div class="bg-white/5 backdrop-blur-md overflow-hidden rounded-3xl shadow-xl" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.08), rgba(0, 168, 216, 0.03));">
                    <div class="px-8 py-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-2xl leading-6 font-bold text-cyan-300 flex items-center gap-2">
                                <span>📊</span> Recent Deposits
                            </h3>
                            @if($transactions->count() > 0)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-700/60 text-green-300">
                                    ✓ Active
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="px-8 pb-8">
                        @if($transactions->count() > 0)
                            <div class="space-y-3">
                                @foreach($transactions as $transaction)
                                    <div class="group relative overflow-hidden rounded-2xl p-5 backdrop-blur-sm transition-all duration-300 bg-gradient-to-r from-green-900/30 to-green-800/20 hover:shadow-lg hover:-translate-y-1">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-4">
                                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-600 to-green-700 text-white flex items-center justify-center shadow-lg">
                                                    <span class="text-xl">💵</span>
                                                </div>
                                                <div>
                                                    <p class="text-sm font-bold text-cyan-200">{{ $transaction->created_at->format('M d, Y h:i A') }}</p>
                                                    <p class="text-xs text-cyan-400">{{ $transaction->plan_months }}-Month Plan</p>
                                                </div>
                                            </div>
                                            <p class="text-lg font-black text-green-400">+ Tsh {{ number_format($transaction->amount, 2) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-16">
                                <div class="text-5xl mb-4">📋</div>
                                <h3 class="text-lg font-bold text-cyan-300 mb-2">No transactions yet</h3>
                                <p class="text-cyan-200 mb-8">Get started by making your first deposit and start your savings journey.</p>
                                <a href="{{ route('customer.savings.index') }}" 
                                    class="inline-flex items-center justify-center px-8 py-4 rounded-2xl font-bold text-white transition-all duration-300 shadow-lg hover:shadow-2xl hover:-translate-y-1 bg-gradient-to-r from-cyan-600 to-cyan-500 hover:from-cyan-700 hover:to-cyan-600">
                                    <span>💾 Make Your First Deposit</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
