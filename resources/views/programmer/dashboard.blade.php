<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-[#1B2559]">
            {{ __('Programmer Dashboard') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Platform Overview" description="Monitor system status, staff counts, and customer activity in a modern dashboard." icon="⚙️">
        <div class="grid gap-6 xl:grid-cols-3">
            {{-- System Status --}}
            <div class="horizon-card rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">System Status</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">Active</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#E2F9EE] text-2xl text-[#05CD99]">✅</div>
                </div>
                <p class="mt-3 text-xs text-[#A3AED0]">All systems operational and ready.</p>
            </div>

            {{-- Total Staff --}}
            <div class="horizon-card rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">Total Staff</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">{{ $staffCount }}</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#F4F7FE] text-2xl text-[#4318FF]">👥</div>
                </div>
                <p class="mt-3 text-xs text-[#A3AED0]">Registered staff members.</p>
            </div>

            {{-- Total Customers --}}
            <div class="horizon-card rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A3AED0]">Total Customers</p>
                        <p class="mt-2 text-2xl font-bold text-[#1B2559]">{{ $customerCount }}</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#F4F7FE] text-2xl text-[#4318FF]">📋</div>
                </div>
                <p class="mt-3 text-xs text-[#A3AED0]">Customers currently registered.</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.7fr,1.3fr]">
            {{-- Platform Control --}}
            <div class="rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-[#1B2559]">Platform Control</h2>
                        <p class="mt-1 text-sm text-[#A3AED0]">Use the quick actions below to manage staff, customers, and features.</p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F4F7FE] text-xl text-[#4318FF]">🛠️</div>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <a href="{{ route('programmer.staff.create') }}" class="inline-flex items-center justify-center rounded-xl bg-[#4318FF] px-6 py-3.5 text-sm font-bold text-white shadow-sm transition-all hover:bg-[#3311DB] hover:shadow-md">Add Staff Member</a>
                    <a href="{{ route('programmer.customers.index') }}" class="inline-flex items-center justify-center rounded-xl border border-[#E9EDF7] bg-[#F4F7FE] px-6 py-3.5 text-sm font-bold text-[#1B2559] shadow-sm transition-all hover:bg-[#EBF0FA]">View Customers</a>
                    <a href="{{ route('programmer.staff.index') }}" class="inline-flex items-center justify-center rounded-xl border border-[#E9EDF7] bg-[#F4F7FE] px-6 py-3.5 text-sm font-bold text-[#1B2559] shadow-sm transition-all hover:bg-[#EBF0FA]">Manage Staff</a>
                    <a href="{{ route('programmer.features.index') }}" class="inline-flex items-center justify-center rounded-xl border border-[#E9EDF7] bg-[#F4F7FE] px-6 py-3.5 text-sm font-bold text-[#1B2559] shadow-sm transition-all hover:bg-[#EBF0FA]">Feature Requests</a>
                </div>
            </div>

            {{-- Quick Overview --}}
            <div class="rounded-[20px] border border-[#E9EDF7] bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-[#1B2559]">Quick Overview</h3>
                <p class="mt-1 text-sm text-[#A3AED0]">Recent admin activity and customer insights.</p>
                <div class="mt-5 space-y-3">
                    <div class="rounded-2xl border border-[#E9EDF7] bg-[#F4F7FE] p-4 transition-colors hover:bg-[#EBF0FA]">
                        <p class="font-bold text-[#1B2559]">Customer accounts checked</p>
                        <p class="mt-0.5 text-xs text-[#A3AED0]">Overview of latest customer status updates.</p>
                    </div>
                    <div class="rounded-2xl border border-[#E9EDF7] bg-[#F4F7FE] p-4 transition-colors hover:bg-[#EBF0FA]">
                        <p class="font-bold text-[#1B2559]">System health stable</p>
                        <p class="mt-0.5 text-xs text-[#A3AED0]">All core modules are operating normally.</p>
                    </div>
                </div>
            </div>
        </div>
    </x-dashboard-shell>
</x-app-layout>
