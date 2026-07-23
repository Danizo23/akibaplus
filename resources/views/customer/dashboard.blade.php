<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-700 leading-tight">
            {{ __('Your Savings Growth') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Your Savings Growth" description="Start building your financial future with flexible savings plans designed for you." icon="📈">
        <div class="grid gap-6 xl:grid-cols-3">
            <div class="rounded-3xl bg-slate-50 p-6 shadow-lg border border-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Total Savings</p>
                        <p class="mt-4 text-3xl font-bold text-slate-900">Tsh {{ number_format($totalSaved, 2) }}</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-emerald-500/10 text-2xl text-emerald-600">💰</div>
                </div>
                <p class="mt-4 text-sm text-slate-500">Your complete savings balance</p>
            </div>

            <div class="rounded-3xl bg-slate-50 p-6 shadow-lg border border-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">6-Month Plan</p>
                        <p class="mt-4 text-3xl font-bold text-slate-900">Tsh {{ number_format($totalSixMonth, 2) }}</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-cyan-500/10 text-2xl text-cyan-600">🗓️</div>
                </div>
                <p class="mt-4 text-sm text-slate-500">Short-term savings</p>
            </div>

            <div class="rounded-3xl bg-slate-50 p-6 shadow-lg border border-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">12-Month Plan</p>
                        <p class="mt-4 text-3xl font-bold text-slate-900">Tsh {{ number_format($totalTwelveMonth, 2) }}</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-amber-400/10 text-2xl text-amber-600">⭐</div>
                </div>
                <p class="mt-4 text-sm text-slate-500">Long-term growth</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.7fr,1.3fr]">
            <div class="rounded-3xl bg-white p-6 shadow-lg border border-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">Savings Dashboard</h2>
                        <p class="mt-2 text-slate-500">Manage deposits, view plan balances, and track activity.</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-cyan-500/10 text-2xl text-cyan-600">💡</div>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <a href="{{ route('customer.savings.index') }}" class="rounded-3xl bg-cyan-600 px-6 py-4 text-sm font-semibold text-white shadow hover:bg-cyan-500">Deposit Money</a>
                    <a href="{{ route('customer.savings.withdrawal') }}" class="rounded-3xl border border-slate-200 bg-slate-50 px-6 py-4 text-sm font-semibold text-slate-900 shadow-sm hover:bg-slate-100">Withdraw Savings</a>
                </div>
            </div>

            <div class="rounded-3xl bg-white p-6 shadow-lg border border-slate-200">
                <h3 class="text-lg font-semibold text-slate-900">Latest Deposits</h3>
                <p class="mt-2 text-sm text-slate-500">Your most recent savings contributions.</p>
                <div class="mt-5 space-y-4">
                    @if($transactions->count())
                        @foreach($transactions->take(4) as $transaction)
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="font-semibold text-slate-900">Tsh {{ number_format($transaction->amount, 2) }}</p>
                                        <p class="text-sm text-slate-500">{{ $transaction->created_at->format('M d, Y') }} · {{ $transaction->plan_months }}-month</p>
                                    </div>
                                    <span class="rounded-full bg-emerald-500/10 px-3 py-1 text-sm font-semibold text-emerald-600">Deposit</span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 text-center text-slate-500">No recent deposits yet.</div>
                    @endif
                </div>
            </div>
        </div>
    </x-dashboard-shell>
</x-app-layout>
