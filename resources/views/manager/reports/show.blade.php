<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Report Details') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">
                <div class="bg-white/10 backdrop-blur-md overflow-hidden rounded-3xl shadow-xl p-6">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-white">{{ $report->staff?->name ?? 'Staff' }} Report</h1>
                            <p class="text-cyan-200">Submitted on {{ $report->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <a href="{{ route('manager.reports.index') }}" class="inline-flex items-center rounded-2xl bg-cyan-600 px-5 py-3 text-sm font-semibold text-white hover:bg-cyan-500">← Back to Reports</a>
                    </div>
                </div>

                <div class="bg-white/10 backdrop-blur-md overflow-hidden rounded-3xl shadow-xl p-6 space-y-6">
                    <div class="rounded-3xl bg-slate-900/80 p-5 border border-slate-700">
                        <p class="text-cyan-200 font-semibold">Report Date</p>
                        <p class="text-white">{{ $report->report_date->format('M d, Y') }}</p>
                    </div>

                    <div class="rounded-3xl bg-slate-900/80 p-5 border border-slate-700">
                        <p class="text-cyan-200 font-semibold">Work Summary</p>
                        <p class="text-white whitespace-pre-line">{{ $report->work_summary }}</p>
                    </div>

                    <div class="rounded-3xl bg-slate-900/80 p-5 border border-slate-700">
                        <p class="text-cyan-200 font-semibold">Customer Snapshot</p>
                        <div class="space-y-3 mt-3">
                            @foreach($report->customer_snapshot as $customer)
                                <div class="rounded-2xl bg-slate-950/90 p-4">
                                    <p class="text-white font-semibold">{{ $customer['name'] }} ({{ $customer['email'] }})</p>
                                    <p class="text-cyan-200 text-sm">Deposit total: Tsh {{ number_format($customer['deposit_total'], 2) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
