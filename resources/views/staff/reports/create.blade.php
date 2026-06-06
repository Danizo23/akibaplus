<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Daily Staff Report') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

                @if(session('success'))
                    <div class="rounded-2xl bg-emerald-500/10 border border-emerald-400/30 text-emerald-100 p-4 shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="relative overflow-hidden rounded-2xl p-8 shadow-2xl transition-all"
                    style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl mb-2">
                            Daily work report for {{ date('M d, Y', strtotime($reportDate)) }}
                        </h1>
                        <p class="text-cyan-200 text-lg max-w-xl">
                            Write a summary of work completed today and submit it to the programmer.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-[1.4fr_1fr] gap-6">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl p-6">
                        <form method="GET" action="{{ route('staff.reports.create') }}" class="space-y-4">
                            <label class="block text-cyan-200 font-semibold">Filter New Customers by Date</label>
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                <input type="date" name="report_date" value="{{ old('report_date', $reportDate) }}"
                                    class="w-full sm:w-auto rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-500 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-500" />
                                <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-cyan-500 px-5 py-3 text-sm font-semibold uppercase tracking-widest text-white shadow-lg transition hover:bg-cyan-400">
                                    Filter
                                </button>
                            </div>
                        </form>

                        <div class="mt-8 space-y-3">
                            <div class="rounded-3xl bg-slate-900/80 p-5 shadow-lg shadow-slate-950/20">
                                <p class="text-sm uppercase tracking-widest text-cyan-300">New customers</p>
                                <p class="text-3xl font-black text-white mt-2">{{ number_format($newCustomersCount) }}</p>
                            </div>
                            <div class="rounded-3xl bg-slate-900/80 p-5 shadow-lg shadow-slate-950/20">
                                <p class="text-sm uppercase tracking-widest text-cyan-300">Total deposits from new customers</p>
                                <p class="text-3xl font-black text-white mt-2">Tsh {{ number_format($newCustomersTotalDeposit, 2) }}</p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h3 class="text-lg font-semibold text-white mb-4">New Customers</h3>
                            <div class="overflow-x-auto rounded-2xl bg-slate-950/80 p-4 min-h-[560px] h-full w-full">
                                <table class="min-w-full w-full table-fixed text-left text-base">
                                    <thead>
                                        <tr class="text-cyan-300">
                                            <th class="w-1/3 px-5 py-4 text-lg font-semibold">Name</th>
                                            <th class="w-1/3 px-5 py-4 text-lg font-semibold text-center">Email</th>
                                            <th class="w-1/3 px-5 py-4 text-lg font-semibold text-right">Deposit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($newCustomers as $customer)
                                            <tr class="border-t border-slate-700 hover:bg-white/5">
                                                <td class="px-5 py-4 text-lg text-white">{{ $customer->name }}</td>
                                                <td class="px-5 py-4 text-center text-lg text-cyan-100">{{ $customer->email }}</td>
                                                <td class="px-5 py-4 text-right text-lg text-white">Tsh {{ number_format($customer->deposit_total, 2) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="px-5 py-4 text-cyan-100 text-base" colspan="3">Hakuna wateja wapya leo.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl p-6">
                        <form method="POST" action="{{ route('staff.reports.store') }}" class="space-y-6">
                            @csrf
                            <input type="hidden" name="report_date" value="{{ $reportDate }}">

                            <div>
                                <label class="block text-sm font-semibold text-cyan-200 mb-2" for="work_summary">Work summary</label>
                                <textarea id="work_summary" name="work_summary" rows="10"
                                    class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-500 focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Describe the tasks you completed today…">{{ old('work_summary') }}</textarea>
                                @error('work_summary')
                                    <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="rounded-3xl bg-slate-900/80 p-5 border border-cyan-400/10">
                                <p class="text-cyan-200 text-sm">This report will be submitted to the programmer and stored for review.</p>
                            </div>

                            <button type="submit" class="inline-flex w-full items-center justify-center rounded-2xl bg-cyan-500 px-6 py-4 text-sm font-bold uppercase tracking-widest text-white shadow-lg transition hover:bg-cyan-400">
                                Submit report to programmer
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
