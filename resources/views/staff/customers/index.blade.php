<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Customer Directory') }}
        </h2>
    </x-slot>
     <x-dashboard-shell title="Customer Directory" description="Browse all customers and inspect their savings details." icon="📁">
       <div class="relative overflow-hidden rounded-2xl p-8 shadow-2xl transition-all"
                    style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));">
                 
            <div class="px-6 py-5 lg:px-8 lg:py-7 bg-slate-800/70 border-b border-slate-700/70">
                <h3 class="text-lg leading-6 font-bold text-cyan-300">Customer List</h3>
            </div>
            <div class="p-6 lg:p-8 overflow-x-auto">
                @if($customers->count())
                    <table class="min-w-[900px] w-full text-left text-sm">
                        <thead>
                            <tr class="text-slate-300 bg-slate-800/80 border-b border-slate-700">
                                <th class="py-4 px-6 font-semibold uppercase tracking-wide">Name</th>
                                <th class="py-4 px-6 font-semibold uppercase tracking-wide">Email</th>
                                <th class="py-4 px-6 font-semibold uppercase tracking-wide text-right">Total Deposit</th>
                                <th class="py-4 px-6 font-semibold uppercase tracking-wide text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr class="border-b border-slate-700 hover:bg-slate-800/70 transition-colors">
                                    <td class="py-5 px-6 text-white font-medium">{{ $customer->name }}</td>
                                    <td class="py-5 px-6 text-cyan-100">{{ $customer->email }}</td>
                                    <td class="py-5 px-6 text-right text-white font-semibold">Tsh {{ number_format($customer->savingsAccount?->transactions->where('type', 'deposit')->sum('amount') ?? 0, 2) }}</td>
                                    <td class="py-5 px-6 text-center">
                                        <a href="{{ route('staff.customers.show', $customer) }}" class="inline-flex items-center justify-center rounded-xl bg-cyan-500 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-cyan-400">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center py-16">
                        <h3 class="text-xl font-bold text-cyan-300">No customers found yet.</h3>
                    </div>
                @endif
            </div>
        </div>

    
    </x-dashboard-shell>
</x-app-layout>
