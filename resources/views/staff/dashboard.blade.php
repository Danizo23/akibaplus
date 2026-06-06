<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Staff Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
                
                <!-- Welcome Hero Section -->
                <div class="relative overflow-hidden rounded-2xl p-8 shadow-2xl transition-all"
                    style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl mb-2">
                            Welcome, {{ explode(' ', Auth::user()->name)[0] }}! 👔
                        </h1>
                        <p class="text-cyan-200 text-lg max-w-xl">
                            Manage daily operations and customer support with ease.
                        </p>
                    </div>
                </div>

                <!-- Staff Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Total Customers Card -->
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg transform transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:bg-white/20 relative overflow-hidden group">
                        <div class="relative z-10">
                            <p class="text-sm font-semibold text-cyan-300 uppercase tracking-wider mb-1">Total Customers</p>
                            <h2 class="text-4xl font-black text-white mb-2">{{ number_format($totalCustomers) }}</h2>
                            <p class="text-sm text-cyan-100">Active customers in system</p>
                        </div>
                    </div>

                    <!-- Total Deposits Card -->
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg transform transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:bg-white/20 relative overflow-hidden group">
                        <div class="relative z-10">
                            <p class="text-sm font-semibold text-cyan-300 uppercase tracking-wider mb-1">Total Deposits</p>
                            <h2 class="text-4xl font-black text-white mb-2">Tsh {{ number_format($totalDeposits, 2) }}</h2>
                            <p class="text-sm text-cyan-100">Sum of customer deposit transactions</p>
                        </div>
                    </div>

                    <!-- Quick Actions Card -->
                    <div class="rounded-2xl p-6 shadow-xl transform transition duration-300 hover:-translate-y-1 hover:shadow-2xl flex flex-col justify-center items-center text-center"
                        style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.15), rgba(0, 168, 216, 0.05));">
                        <div class="mb-4 text-4xl">📊</div>
                        <h3 class="text-xl font-bold text-white mb-2">Create Report</h3>
                        <p class="text-sm text-cyan-200 mb-6">Generate daily operations report</p>
                        <a href="#" 
                            class="w-full inline-flex justify-center items-center px-6 py-3 border border-cyan-400 rounded-xl font-bold text-sm text-white uppercase tracking-widest transition-all duration-200 shadow-lg hover:bg-cyan-500/20"
                            style="background: linear-gradient(135deg, #00a8d8, #0088a8); color: white;">
                            📋 New Report
                        </a>
                    </div>
                </div>

                <!-- Additional Content Section -->
                <div class="bg-white/10 backdrop-blur-md overflow-hidden rounded-2xl shadow-xl">
                    <div class="px-6 py-5">
                        <h3 class="text-lg leading-6 font-bold text-cyan-300">🔗 Quick Links & Tools</h3>
                    </div>
                    <div class="p-6 lg:p-8">
                        <p class="text-cyan-100 leading-relaxed font-medium">
                            Access all your staff tools and manage customer interactions from this dashboard. Use the cards above to view key metrics and create reports.
                        </p>
                    </div>
                </div>

                <div class="bg-white/10 backdrop-blur-md overflow-hidden rounded-2xl shadow-xl">
                    <div class="px-6 py-5">
                        <h3 class="text-lg leading-6 font-bold text-cyan-300">👥 Customer Deposits</h3>
                        <p class="text-cyan-100 text-sm mt-1">
                            List of customers and the total amount each has deposited.
                        </p>
                    </div>
                    <div class="p-6 lg:p-8 overflow-x-auto">
                        <table class="min-w-full text-left text-sm divide-y divide-slate-700">
                            <thead>
                                <tr class="text-slate-300">
                                    <th class="py-3 px-4 font-semibold uppercase tracking-wide">Customer</th>
                                    <th class="py-3 px-4 font-semibold uppercase tracking-wide">Email</th>
                                    <th class="py-3 px-4 font-semibold uppercase tracking-wide text-right">Total Deposits</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700">
                                @forelse($customerDepositTotals as $customer)
                                    <tr class="hover:bg-white/5">
                                        <td class="py-4 px-4 text-white">{{ $customer->name }}</td>
                                        <td class="py-4 px-4 text-cyan-100">{{ $customer->email }}</td>
                                        <td class="py-4 px-4 text-right text-white font-semibold">Tsh {{ number_format($customer->total_deposit, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="py-4 px-4 text-cyan-100" colspan="3">Hakuna wateja waliopatikana.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
