<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Manager Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
                <div class="relative overflow-hidden rounded-2xl p-8 shadow-2xl transition-all"
                    style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl mb-2">Welcome, {{ explode(' ', Auth::user()->name)[0] }}! 🛡️</h1>
                        <p class="text-cyan-200 text-lg max-w-xl">Review staff performance, customer details and reports from one central dashboard.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('manager.staff.index') }}" class="block rounded-3xl bg-cyan-600/15 border border-cyan-400/20 p-8 text-white transition hover:bg-cyan-600/25">
                        <h3 class="text-xl font-bold mb-3">Staff Management</h3>
                        <p class="text-cyan-200">View, edit or remove staff roles and assignments.</p>
                    </a>

                    <a href="{{ route('manager.customers.index') }}" class="block rounded-3xl bg-cyan-600/15 border border-cyan-400/20 p-8 text-white transition hover:bg-cyan-600/25">
                        <h3 class="text-xl font-bold mb-3">Customer Management</h3>
                        <p class="text-cyan-200">Review customer records and update details.</p>
                    </a>

                    <a href="{{ route('manager.reports.index') }}" class="block rounded-3xl bg-cyan-600/15 border border-cyan-400/20 p-8 text-white transition hover:bg-cyan-600/25 md:col-span-2">
                        <h3 class="text-xl font-bold mb-3">Staff Reports</h3>
                        <p class="text-cyan-200">See staff performance and daily work summaries.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
