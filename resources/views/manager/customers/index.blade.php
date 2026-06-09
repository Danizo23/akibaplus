<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Customer Management') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
                <div class="bg-white/10 backdrop-blur-md overflow-hidden rounded-3xl shadow-xl p-6">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-white">All Customers</h1>
                            <p class="text-cyan-200">View customers and edit their contact information.</p>
                        </div>
                        <a href="{{ route('manager.dashboard') }}" class="inline-flex items-center rounded-2xl bg-cyan-600 px-5 py-3 text-sm font-semibold text-white hover:bg-cyan-500">← Back to Manager Dashboard</a>
                    </div>
                </div>

                <div class="bg-white/10 backdrop-blur-md overflow-hidden rounded-3xl shadow-xl">
                    <div class="p-6 lg:p-8 overflow-x-auto">
                        @if($customers->count())
                            <table class="min-w-full w-full text-left text-sm">
                                <thead>
                                    <tr class="text-slate-300 bg-slate-900/10 border-b border-slate-700">
                                        <th class="py-4 px-5 font-semibold uppercase tracking-wide">Name</th>
                                        <th class="py-4 px-5 font-semibold uppercase tracking-wide">Email</th>
                                        <th class="py-4 px-5 font-semibold uppercase tracking-wide text-right">Deposits</th>
                                        <th class="py-4 px-5 font-semibold uppercase tracking-wide text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                        <tr class="border-t border-slate-700 hover:bg-white/5">
                                            <td class="py-4 px-5 text-white">{{ $customer->name }}</td>
                                            <td class="py-4 px-5 text-cyan-100">{{ $customer->email }}</td>
                                            <td class="py-4 px-5 text-right text-white">Tsh {{ number_format($customer->savingsAccount?->transactions->where('type', 'deposit')->sum('amount') ?? 0, 2) }}</td>
                                            <td class="py-4 px-5 text-center">
                                                <a href="{{ route('manager.customers.show', $customer) }}" class="inline-flex items-center justify-center rounded-lg bg-cyan-600 px-4 py-2 text-xs font-semibold text-white hover:bg-cyan-500">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-16 text-cyan-200">
                                <p>No customers found.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
