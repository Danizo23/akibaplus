<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Staff Reports') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
                <div class="relative overflow-hidden rounded-2xl p-8 shadow-2xl transition-all"
                    style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl mb-2">Staff Reports</h1>
                        <p class="text-cyan-200 text-lg max-w-xl">Review daily reports submitted by staff members.</p>
                    </div>
                </div>

                <div class="bg-white/10 backdrop-blur-md overflow-hidden rounded-2xl shadow-xl p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm">
                            <thead>
                                <tr class="text-slate-300 bg-slate-900/10">
                                    <th class="px-4 py-4 font-semibold uppercase tracking-wide">Report Date</th>
                                    <th class="px-4 py-4 font-semibold uppercase tracking-wide">Staff</th>
                                    <th class="px-4 py-4 font-semibold uppercase tracking-wide text-right">New Customers</th>
                                    <th class="px-4 py-4 font-semibold uppercase tracking-wide text-right">New Deposits</th>
                                    <th class="px-4 py-4 font-semibold uppercase tracking-wide">Status</th>
                                    <th class="px-4 py-4 font-semibold uppercase tracking-wide">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reports as $report)
                                    <tr class="border-t border-slate-700 hover:bg-white/5">
                                        <td class="px-4 py-4 text-cyan-100">{{ $report->report_date->format('M d, Y') }}</td>
                                        <td class="px-4 py-4 text-white">{{ $report->staff->name }}</td>
                                        <td class="px-4 py-4 text-right text-white">{{ number_format($report->new_customers_count) }}</td>
                                        <td class="px-4 py-4 text-right text-white">Tsh {{ number_format($report->new_customers_total_deposit, 2) }}</td>
                                        <td class="px-4 py-4 text-cyan-200 uppercase">{{ $report->status }}</td>
                                        <td class="px-4 py-4">
                                            <a href="{{ route('programmer.reports.show', $report) }}" class="rounded-xl bg-cyan-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-cyan-400">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-4 py-4 text-cyan-100" colspan="6">Hakuna ripoti zilizowasilishwa bado.</td>
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
