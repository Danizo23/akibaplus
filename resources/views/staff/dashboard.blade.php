<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-[#1B2559]">
            {{ __('Staff Dashboard') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Staff Operations" description="Monitor customers, deposits and support activity from one clean dashboard." icon="👔">
        <div class="grid gap-6 xl:grid-cols-3">
            {{-- Total Customers --}}
            <div class="horizon-card rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">Total Customers</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">{{ number_format($totalCustomers) }}</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#F4F7FE] text-2xl text-[#4318FF]">👥</div>
                </div>
                <p class="mt-3 text-xs text-[#A3AED0]">Active customers in the system</p>
            </div>

            {{-- Total Deposits --}}
            <div class="horizon-card rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">Total Deposits</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">Tsh {{ number_format($totalDeposits, 2) }}</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#F4F7FE] text-2xl text-[#4318FF]">💵</div>
                </div>
                <p class="mt-3 text-xs text-[#A3AED0]">Sum of customer deposit transactions</p>
            </div>

            {{-- Reports --}}
            <div class="horizon-card rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">Reports</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">{{ $customerDepositTotals->count() }}</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#F4F7FE] text-2xl text-[#4318FF]">🧾</div>
                </div>
                <p class="mt-3 text-xs text-[#A3AED0]">Recent record activity</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.7fr,1.3fr]">
            {{-- Operations Summary --}}
            <div class="rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-[#1B2559]">Operations Summary</h2>
                        <p class="mt-1 text-sm text-[#A3AED0]">Quick actions and the latest staff activity.</p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F4F7FE] text-xl text-[#4318FF]">⚡</div>
                </div>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl border border-[#E9EDF7] bg-[#F4F7FE] p-5">
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">Open support cases</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">{{ $customerDepositTotals->count() }}</p>
                    </div>
                    <div class="rounded-2xl border border-[#E9EDF7] bg-[#F4F7FE] p-5">
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">Staff on shift</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">{{ $totalCustomers > 0 ? 12 : 0 }}</p>
                    </div>
                </div>
                <div class="mt-6 grid gap-4 sm:grid-cols-3">
                    <a href="{{ route('staff.customers.index') }}" class="inline-flex items-center justify-center rounded-xl bg-[#4318FF] px-6 py-3.5 text-sm font-bold text-white shadow-sm transition-all hover:bg-[#3311DB] hover:shadow-md">View Customers</a>
                    <a href="{{ route('staff.reportss.create') }}" class="inline-flex items-center justify-center rounded-xl bg-[#4318FF] px-6 py-3.5 text-sm font-bold text-white shadow-sm transition-all hover:bg-[#3311DB] hover:shadow-md">Create Report</a>
                    <a href="{{ route('manager.dashboard') }}" class="inline-flex items-center justify-center rounded-xl border border-[#E9EDF7] bg-[#F4F7FE] px-6 py-3.5 text-sm font-bold text-[#1B2559] shadow-sm transition-all hover:bg-[#EBF0FA]">View Manager</a>
                </div>
            </div>

            {{-- Activity Feed --}}
            <div class="rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-[#1B2559]">Activity Feed</h3>
                <p class="mt-1 text-sm text-[#A3AED0]">Latest customer interactions and deposit checks.</p>
                <div class="mt-5 space-y-3">
                    @forelse($customerDepositTotals->take(4) as $customer)
                        <div class="rounded-2xl border border-[#E9EDF7] bg-[#F4F7FE] p-4 transition-colors hover:bg-[#EBF0FA]">
                            <p class="font-bold text-[#1B2559]">{{ $customer->name }}</p>
                            <p class="mt-0.5 text-xs text-[#A3AED0]">Tsh {{ number_format($customer->total_deposit, 2) }} deposits</p>
                        </div>
                    @empty
                        <div class="rounded-2xl border border-[#E9EDF7] bg-[#F4F7FE] p-6 text-center text-sm text-[#A3AED0]">No recent activity available.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </x-dashboard-shell>
</x-app-layout>
