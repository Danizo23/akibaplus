<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-[#1B2559]">
            {{ __('Manager Dashboard') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Manager Dashboard" description="Review staff performance, customer details, and reports from one central dashboard." icon="🛡️">
        <div class="grid gap-6 xl:grid-cols-3">
            {{-- Staff Members --}}
            <div class="horizon-card rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">Staff Members</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">{{ $staff->count() }}</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#F4F7FE] text-2xl text-[#4318FF]">👥</div>
                </div>
                <p class="mt-3 text-xs text-[#A3AED0]">Total active staff roles</p>
            </div>

            {{-- Customers --}}
            <div class="horizon-card rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">Customers</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">{{ $customers->count() }}</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#F4F7FE] text-2xl text-[#4318FF]">📋</div>
                </div>
                <p class="mt-3 text-xs text-[#A3AED0]">Total registered customers</p>
            </div>

            {{-- Reports --}}
            <div class="horizon-card rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">Reports</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">{{ $reportsCount }}</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#F4F7FE] text-2xl text-[#4318FF]">🧾</div>
                </div>
                <p class="mt-3 text-xs text-[#A3AED0]">Staff reports submitted</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.7fr,1.3fr]">
            {{-- Management Overview --}}
            <div class="rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-[#1B2559]">Management Overview</h2>
                        <p class="mt-1 text-sm text-[#A3AED0]">Move between staff, customers, and reports from a consistent workspace.</p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F4F7FE] text-xl text-[#4318FF]">🧭</div>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <a href="{{ route('manager.staff.index') }}" class="inline-flex items-center justify-center rounded-xl bg-[#4318FF] px-6 py-3.5 text-sm font-bold text-white shadow-sm transition-all hover:bg-[#3311DB] hover:shadow-md">Staff Management</a>
                    <a href="{{ route('manager.customers.index') }}" class="inline-flex items-center justify-center rounded-xl border border-[#E9EDF7] bg-[#F4F7FE] px-6 py-3.5 text-sm font-bold text-[#1B2559] shadow-sm transition-all hover:bg-[#EBF0FA]">Customer Management</a>
                    <a href="{{ route('manager.reports.index') }}" class="inline-flex items-center justify-center rounded-xl border border-[#E9EDF7] bg-[#F4F7FE] px-6 py-3.5 text-sm font-bold text-[#1B2559] shadow-sm transition-all hover:bg-[#EBF0FA] sm:col-span-2">Staff Reports</a>
                </div>
            </div>

            {{-- Daily Summary --}}
            <div class="rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-[#1B2559]">Daily Summary</h3>
                <p class="mt-1 text-sm text-[#A3AED0]">A quick overview of the current management workload.</p>
                <div class="mt-5 space-y-3">
                    <div class="rounded-2xl border border-[#E9EDF7] bg-[#F4F7FE] p-4 transition-colors hover:bg-[#EBF0FA]">
                        <p class="font-bold text-[#1B2559]">Staff roles monitored</p>
                        <p class="mt-0.5 text-xs text-[#A3AED0]">Keep track of team availability and assigned responsibilities.</p>
                    </div>
                    <div class="rounded-2xl border border-[#E9EDF7] bg-[#F4F7FE] p-4 transition-colors hover:bg-[#EBF0FA]">
                        <p class="font-bold text-[#1B2559]">Customer records reviewed</p>
                        <p class="mt-0.5 text-xs text-[#A3AED0]">Ensure account activity stays accurate and up to date.</p>
                    </div>
                </div>
            </div>
        </div>
    </x-dashboard-shell>
</x-app-layout>
