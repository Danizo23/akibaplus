<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-700 leading-tight">
            {{ __('Programmer Dashboard') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Platform Overview" description="Monitor system status, staff counts, and customer activity in a modern dashboard." icon="⚙️">
        <div class="grid gap-6 xl:grid-cols-3">
            <div class="rounded-3xl bg-slate-50 p-6 shadow-lg border border-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">System Status</p>
                        <p class="mt-4 text-3xl font-bold text-slate-900">Active</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-emerald-500/10 text-2xl text-emerald-600">✅</div>
                </div>
                <p class="mt-4 text-sm text-slate-500">All systems operational and ready.</p>
            </div>

            <div class="rounded-3xl bg-slate-50 p-6 shadow-lg border border-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Total Staff</p>
                        <p class="mt-4 text-3xl font-bold text-slate-900">{{ $staffCount }}</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-cyan-500/10 text-2xl text-cyan-600">👥</div>
                </div>
                <p class="mt-4 text-sm text-slate-500">Registered staff members.</p>
            </div>

            <div class="rounded-3xl bg-slate-50 p-6 shadow-lg border border-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Total Customers</p>
                        <p class="mt-4 text-3xl font-bold text-slate-900">{{ $customerCount }}</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-blue-500/10 text-2xl text-blue-600">📋</div>
                </div>
                <p class="mt-4 text-sm text-slate-500">Customers currently registered.</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.7fr,1.3fr]">
            <div class="rounded-3xl bg-white p-6 shadow-lg border border-slate-200">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">Platform Control</h2>
                        <p class="mt-2 text-slate-500">Use the quick actions below to manage staff, customers, and features.</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-cyan-500/10 text-2xl text-cyan-600">🛠️</div>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <a href="{{ route('programmer.staff.create') }}" class="rounded-3xl bg-cyan-600 px-6 py-4 text-sm font-semibold text-white shadow hover:bg-cyan-500">Add Staff Member</a>
                    <a href="{{ route('programmer.customers.index') }}" class="rounded-3xl border border-slate-200 bg-slate-50 px-6 py-4 text-sm font-semibold text-slate-900 shadow-sm hover:bg-slate-100">View Customers</a>
                    <a href="{{ route('programmer.staff.index') }}" class="rounded-3xl border border-slate-200 bg-slate-50 px-6 py-4 text-sm font-semibold text-slate-900 shadow-sm hover:bg-slate-100">Manage Staff</a>
                    <a href="{{ route('programmer.features.index') }}" class="rounded-3xl border border-slate-200 bg-slate-50 px-6 py-4 text-sm font-semibold text-slate-900 shadow-sm hover:bg-slate-100">Feature Requests</a>
                </div>
            </div>

            <div class="rounded-3xl bg-white p-6 shadow-lg border border-slate-200">
                <h3 class="text-lg font-semibold text-slate-900">Quick Overview</h3>
                <p class="mt-2 text-slate-500">Recent admin activity and customer insights.</p>
                <div class="mt-5 space-y-4">
                    <div class="rounded-3xl bg-slate-50 p-4 border border-slate-200">
                        <p class="font-semibold text-slate-900">Customer accounts checked</p>
                        <p class="text-sm text-slate-500 mt-1">Overview of latest customer status updates.</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-4 border border-slate-200">
                        <p class="font-semibold text-slate-900">System health stable</p>
                        <p class="text-sm text-slate-500 mt-1">All core modules are operating normally.</p>
                    </div>
                </div>
            </div>
        </div>
    </x-dashboard-shell>
</x-app-layout>
