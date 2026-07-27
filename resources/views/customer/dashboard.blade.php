<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-[#1B2559]">
            {{ __('Your Savings Growth') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Your Savings Growth" description="Start building your financial future with flexible savings plans designed for you." icon="📈">
        <div class="grid gap-6 xl:grid-cols-3">
            {{-- Total Savings --}}
            <div class="horizon-card rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">Total Savings</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">Tsh {{ number_format($totalSaved, 2) }}</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#F4F7FE] text-2xl text-[#4318FF]">💰</div>
                </div>
                <p class="mt-3 text-xs text-[#A3AED0]">Your complete savings balance</p>
            </div>

            {{-- 6-Month Plan --}}
            <div class="horizon-card rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">6-Month Plan</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">Tsh {{ number_format($totalSixMonth, 2) }}</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#F4F7FE] text-2xl text-[#4318FF]">🗓️</div>
                </div>
                <p class="mt-3 text-xs text-[#A3AED0]">Short-term savings</p>
            </div>

            {{-- 12-Month Plan --}}
            <div class="horizon-card rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">12-Month Plan</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">Tsh {{ number_format($totalTwelveMonth, 2) }}</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#F4F7FE] text-2xl text-[#4318FF]">⭐</div>
                </div>
                <p class="mt-3 text-xs text-[#A3AED0]">Long-term growth</p>
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
