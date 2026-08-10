<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-[#1B2559]">
            {{ __('Manager Dashboard') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Manager Dashboard" description="Review staff performance, customer details, and reports from one central dashboard." icon="🛡️">
        <div class="grid gap-6 xl:grid-cols-3">
            {{-- Staff Members --}}
             <div class="group relative overflow-hidden rounded-3xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(34, 197, 94, 0.05));">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-400/5 to-cyan-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-sm font-bold text-green-300 uppercase tracking-widest">Staff Members</p>
                                    <span class="text-2xl">👥</span>
                                </div>
                                <p class="text-4xl font-black text-green-400 mb-1">{{ $staff->count() }}</p>
                                <p class="text-xs text-green-200">Total active staff roles</p>
                            </div>
                        </div>


            {{-- Customers --}}
            <div class="group relative overflow-hidden rounded-3xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));">
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-400/5 to-blue-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-sm font-bold text-cyan-300 uppercase tracking-widest">Customers</p>
                                    <span class="text-2xl">📋</span>
                                </div>
                                <p class="text-4xl font-black text-cyan-400 mb-1">{{ $customers->count() }}</p>
                                <p class="text-xs text-cyan-200">Total registered customersp>
                            </div>
                        </div>


            {{-- Reports --}}
            <div class="group relative overflow-hidden rounded-3xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(168, 85, 247, 0.1), rgba(168, 85, 247, 0.05));">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-400/5 to-pink-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-sm font-bold text-purple-300 uppercase tracking-widest">Reports</p>
                                    <span class="text-2xl">🧾</span>
                                </div>
                                <p class="text-4xl font-black text-purple-400 mb-1">{{ $reportsCount }}</p>
                                <p class="text-xs text-purple-200">Staff reports submitted</p>
                            </div>
                        </div>

        </div>

        <div class="grid gap-6 xl:grid-cols-[1.7fr,1.3fr]">
            {{-- Management Overview --}}
             <div class="bg-white/5 backdrop-blur-md rounded-3xl p-8 shadow-lg" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.08), rgba(0, 168, 216, 0.03));">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-[#1B2559]">Management Overview</h2>
                        <p class="mt-1 text-sm text-[#A3AED0]">Move between staff, customers, and reports from a consistent workspace.</p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F4F7FE] text-xl text-[#4318FF]">🧭</div>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <a href="{{ route('manager.staff.index') }}" class="group relative overflow-hidden justify-center rounded-xl shadow-lg  bg-[#4318FF] px-6 py-3.5 text-sm font-bold text-white  hover:shadow-2xl hover:-translate-y-2 transition-all hover:bg-[#3311DB] hover:shadow-md">Staff Management</a>
                    <a href="{{ route('manager.customers.index') }}" class="group relative overflow-hidden rounded-3xl p-6 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));">Customer Management</a>
                    <a href="{{ route('manager.reports.index') }}" class="inline-flex items-center justify-center rounded-xl border border-[#E9EDF7] bg-[#F4F7FE] px-6 py-3.5 text-sm font-bold text-[#1B2559] shadow-sm transition-all hover:bg-[#EBF0FA] sm:col-span-2">Staff Reports</a>
                </div>
            </div>

            {{-- Daily Summary --}}
            <div class="bg-white/5 backdrop-blur-md rounded-3xl p-8 shadow-lg" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.08), rgba(0, 168, 216, 0.03));">
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
