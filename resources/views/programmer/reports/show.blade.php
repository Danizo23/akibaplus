<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Report Details') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
                <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl p-6">
                    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-white">Report for {{ $report->report_date->format('M d, Y') }}</h1>
                            <p class="text-cyan-200">Submitted by {{ $report->staff->name }}</p>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-cyan-500/15 px-4 py-2 text-sm font-semibold text-cyan-100">
                            {{ ucfirst($report->status) }}
                        </span>
                    </div>

                    <div class="mt-8 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-3xl bg-slate-950/80 p-5 ring-1 ring-slate-800/30 shadow-sm">
                            <p class="text-sm uppercase tracking-widest text-cyan-300">New customers</p>
                            <p class="text-3xl font-black text-white mt-2">{{ number_format($report->new_customers_count) }}</p>
                        </div>
                        <div class="rounded-3xl bg-slate-950/80 p-5 ring-1 ring-slate-800/30 shadow-sm">
                            <p class="text-sm uppercase tracking-widest text-cyan-300">Total deposits</p>
                            <p class="text-3xl font-black text-white mt-2">Tsh {{ number_format($report->new_customers_total_deposit, 2) }}</p>
                        </div>
                    </div>

                    <div class="mt-8 rounded-3xl bg-slate-950/80 p-6 ring-1 ring-slate-800/30 shadow-sm">
                        <h3 class="text-lg font-semibold text-white mb-4">Work summary</h3>
                        <p class="text-cyan-100 leading-relaxed whitespace-pre-line">{{ $report->work_summary }}</p>
                    </div>

                  <div class="mt-8 overflow-x-auto rounded-3xl bg-slate-950/80 p-6 lg:p-8 ring-1 ring-slate-800/30 shadow-sm">
    <h3 class="text-lg font-semibold text-white mb-4">
        New customers submitted in this report
    </h3>

    <table class="w-full text-sm">
        <thead>
            <tr class="text-slate-300 border-b border-slate-700">
                <th class="py-4 px-2 font-semibold uppercase tracking-wide text-left">
                    Customer
                </th>
                <th class="py-4 px-2 font-semibold uppercase tracking-wide text-center">
                    Email
                </th>
                <th class="py-4 px-2 font-semibold uppercase tracking-wide text-right">
                    Total Deposits
                </th>
            </tr>
        </thead>

        <tbody>
            @forelse($report->customer_snapshot as $customer)
                <tr class="hover:bg-white/5 border-b border-slate-800">
                    <td class="py-5 px-2 text-white text-left">
                        {{ $customer['name'] }}
                    </td>

                    <td class="py-5 px-2 text-cyan-100 text-center">
                        {{ $customer['email'] }}
                    </td>

                    <td class="py-5 px-2 text-right text-white font-semibold">
                        Tsh {{ number_format($customer['deposit_total'], 2) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="py-5 px-2 text-cyan-100 text-left" colspan="3">
                        Hakuna data za wateja katika ripoti hii.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

                    <div class="mt-6">
                        <a href="{{ route('programmer.reports.index') }}" class="inline-flex items-center rounded-2xl bg-cyan-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-cyan-400">
                            ← Back to reports
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
