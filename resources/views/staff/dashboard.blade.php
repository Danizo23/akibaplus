<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-700 leading-tight">
            {{ __('Staff Dashboard') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Staff Operations" description="Monitor customers, deposits and support activity from one clean dashboard." icon="👔">
        <div class="grid gap-6 xl:grid-cols-3">
            <div class="rounded-3xl bg-slate-50 p-6 shadow-lg border border-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Total Customers</p>
                        <p class="mt-4 text-3xl font-bold text-slate-900">{{ number_format($totalCustomers) }}</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-cyan-500/10 text-2xl text-cyan-600">👥</div>
                </div>
                <p class="mt-4 text-sm text-slate-500">Active customers in the system</p>
            </div>

            <div class="rounded-3xl bg-slate-50 p-6 shadow-lg border border-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Total Deposits</p>
                        <p class="mt-4 text-3xl font-bold text-slate-900">Tsh {{ number_format($totalDeposits, 2) }}</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-emerald-500/10 text-2xl text-emerald-600">💵</div>
                </div>
                <p class="mt-4 text-sm text-slate-500">Sum of customer deposit transactions</p>
            </div>

            <div class="rounded-3xl bg-slate-50 p-6 shadow-lg border border-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Reports</p>
                        <p class="mt-4 text-3xl font-bold text-slate-900">{{ $customerDepositTotals->count() }}</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-amber-400/10 text-2xl text-amber-600">🧾</div>
                </div>
                <p class="mt-4 text-sm text-slate-500">Recent record activity</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.7fr,1.3fr]">
            <div class="rounded-3xl bg-white p-6 shadow-lg border border-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">Operations Summary</h2>
                        <p class="mt-2 text-slate-500">Quick actions and the latest staff activity.</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-cyan-500/10 text-2xl text-cyan-600">⚡</div>
                </div>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-3xl bg-slate-50 p-5 border border-slate-200">
                        <p class="text-xs uppercase tracking-[0.18em] text-slate-500">Open support cases</p>
                        <p class="mt-3 text-2xl font-semibold text-slate-900">{{ $customerDepositTotals->count() }}</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-5 border border-slate-200">
                        <p class="text-xs uppercase tracking-[0.18em] text-slate-500">Staff on shift</p>
                        <p class="mt-3 text-2xl font-semibold text-slate-900">{{ $totalCustomers > 0 ? 12 : 0 }}</p>
                    </div>
                </div>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <a href="{{ route('staff.reports.create') }}" class="inline-flex items-center justify-center rounded-3xl bg-cyan-600 px-6 py-3 text-sm font-semibold text-white shadow hover:bg-cyan-500">Create Report</a>
                    <a href="{{ route('manager.dashboard') }}" class="inline-flex items-center justify-center rounded-3xl border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-900 shadow-sm hover:bg-slate-50">View Manager</a>
                </div>
            </div>

            <div class="rounded-3xl bg-white p-6 shadow-lg border border-slate-200">
                <h3 class="text-lg font-semibold text-slate-900">Activity Feed</h3>
                <p class="mt-2 text-slate-500">Latest customer interactions and deposit checks.</p>
                <div class="mt-5 space-y-4">
                    @forelse($customerDepositTotals->take(4) as $customer)
                        <div class="rounded-3xl bg-slate-50 p-4 border border-slate-200">
                            <p class="font-semibold text-slate-900">{{ $customer->name }}</p>
                            <p class="text-sm text-slate-500">Tsh {{ number_format($customer->total_deposit, 2) }} deposits</p>
                        </div>
                    @empty
                        <div class="rounded-3xl bg-slate-50 p-6 text-center text-slate-500">No recent activity available.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </x-dashboard-shell>
</x-app-layout>
