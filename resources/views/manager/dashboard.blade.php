<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Manager Dashboard') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Manager Dashboard" description="Review staff performance, customer details, and reports from one central dashboard." icon="🛡️">
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                <p class="text-sm font-semibold text-cyan-300 uppercase tracking-wide mb-2">Staff Members</p>
                <h2 class="text-4xl font-black text-white">{{ $staff->count() }}</h2>
                <p class="text-sm text-cyan-200">Total active staff roles</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                <p class="text-sm font-semibold text-cyan-300 uppercase tracking-wide mb-2">Customers</p>
                <h2 class="text-4xl font-black text-white">{{ $customers->count() }}</h2>
                <p class="text-sm text-cyan-200">Total registered customers</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
                <p class="text-sm font-semibold text-cyan-300 uppercase tracking-wide mb-2">Reports</p>
                <h2 class="text-4xl font-black text-white">{{ $reportsCount }}</h2>
                <p class="text-sm text-cyan-200">Staff reports submitted</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <a href="{{ route('manager.staff.index') }}" class="block rounded-3xl bg-white/5 border border-white/10 p-8 text-white transition hover:bg-white/10">
                <h3 class="text-xl font-bold mb-3">Staff Management</h3>
                <p class="text-cyan-200">View, edit or remove staff roles and assignments.</p>
            </a>

            <a href="{{ route('manager.customers.index') }}" class="block rounded-3xl bg-white/5 border border-white/10 p-8 text-white transition hover:bg-white/10">
                <h3 class="text-xl font-bold mb-3">Customer Management</h3>
                <p class="text-cyan-200">Review customer records and update details.</p>
            </a>

            <a href="{{ route('manager.reports.index') }}" class="block rounded-3xl bg-white/5 border border-white/10 p-8 text-white transition hover:bg-white/10 md:col-span-2">
                <h3 class="text-xl font-bold mb-3">Staff Reports</h3>
                <p class="text-cyan-200">See staff performance and daily work summaries.</p>
            </a>
        </div>
    </x-dashboard-shell>
</x-app-layout>
