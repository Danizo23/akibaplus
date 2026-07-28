<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-[#1B2559]">
            {{ __('Your Savings Growth') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Your Savings Growth" description="Start building your financial future with flexible savings plans designed for you." icon="📈">
        <div class="grid gap-6 xl:grid-cols-3">
            {{-- Total Savings --}}
            <div class="group relative overflow-hidden rounded-3xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(34, 197, 94, 0.05));">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-400/5 to-cyan-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-sm font-bold text-green-300 uppercase tracking-widest">Total Savings</p>
                                    <span class="text-2xl">💰</span>
                                </div>
                                <p class="text-4xl font-black text-green-400 mb-1">Tsh {{ number_format($totalSaved, 2) }}</p>
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
                                <p class="text-4xl font-black text-cyan-400 mb-1">Tsh {{ number_format($totalSixMonth, 2) }}</p>
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
                                <p class="text-4xl font-black text-purple-400 mb-1">Tsh {{ number_format($totalTwelveMonth, 2) }}</p>
                                <p class="text-xs text-purple-200">Long-term growth</p>
                            </div>
                        </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.7fr,1.3fr]">
            {{-- Savings Dashboard Panel --}}
            <div class="rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-[#1B2559]">Savings Dashboard</h2>
                        <p class="mt-1 text-sm text-[#A3AED0]">Manage deposits, view plan balances, and track activity.</p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F4F7FE] text-xl text-[#4318FF]">💡</div>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <a href="{{ route('customer.savings.index') }}" class="inline-flex items-center justify-center rounded-xl bg-[#4318FF] px-6 py-3.5 text-sm font-bold text-white shadow-sm transition-all hover:bg-[#3311DB] hover:shadow-md">Deposit Money</a>
                    <a href="{{ route('customer.savings.withdrawal') }}" class="inline-flex items-center justify-center rounded-xl border border-[#E9EDF7] bg-[#F4F7FE] px-6 py-3.5 text-sm font-bold text-[#1B2559] shadow-sm transition-all hover:bg-[#EBF0FA]">Withdraw Savings</a>
                </div>
            </div>

            {{-- Latest Deposits --}}
            <div class="rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-[#1B2559]">Latest Deposits</h3>
                <p class="mt-1 text-sm text-[#A3AED0]">Your most recent savings contributions.</p>
                <div class="mt-5 space-y-3">
                    @if($transactions->count())
                        @foreach($transactions->take(4) as $transaction)
                            <div class="rounded-2xl border border-[#E9EDF7] bg-[#F4F7FE] p-4 transition-colors hover:bg-[#EBF0FA]">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="font-bold text-[#1B2559]">Tsh {{ number_format($transaction->amount, 2) }}</p>
                                        <p class="mt-0.5 text-xs text-[#A3AED0]">{{ $transaction->created_at->format('M d, Y') }} · {{ $transaction->plan_months }}-month</p>
                                    </div>
                                    <span class="rounded-full bg-[#E2F9EE] px-3 py-1 text-xs font-bold text-[#05CD99]">Deposit</span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="rounded-2xl border border-[#E9EDF7] bg-[#F4F7FE] p-6 text-center text-sm text-[#A3AED0]">No recent deposits yet.</div>
                    @endif
                </div>
            </div>
        </div>
    </x-dashboard-shell>
</x-app-layout>
