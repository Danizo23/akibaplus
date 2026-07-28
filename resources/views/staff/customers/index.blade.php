@extends('layouts.app')

@section('content')
    <x-dashboard-shell title="Customers" description="List of customers available to staff." icon="👥">
        <div class="space-y-6">
            @if($customers->count())
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th class="py-3 px-4 text-cyan-200">Name</th>
                            <th class="py-3 px-4 text-cyan-200">Email</th>
                            <th class="py-3 px-4 text-cyan-200 text-right">Total Deposits</th>
                            <th class="py-3 px-4 text-cyan-200 text-right">Ready to Withdraw</th>
                            <th class="py-3 px-4 text-cyan-200 text-right">Next Maturity</th>
                            <th class="py-3 px-4 text-cyan-200 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            <tr class="border-t border-slate-700">
                                <td class="py-4 px-4 text-white">{{ $customer->name }}</td>
                                <td class="py-4 px-4 text-cyan-100">{{ $customer->email }}</td>
                                <td class="py-4 px-4 text-right text-white">Tsh {{ number_format($customer->total_deposits ?? 0, 2) }}</td>
                                <td class="py-4 px-4 text-right text-white">Tsh {{ number_format($customer->withdrawable_amount ?? 0, 2) }}</td>
                                <td class="py-4 px-4 text-right text-cyan-200">{{ $customer->next_withdrawal_date ?? 'N/A' }}</td>
                                <td class="py-4 px-4 text-right">
                                    <a href="{{ route('staff.customers.show', $customer) }}" class="inline-flex items-center justify-center rounded-lg bg-cyan-600 px-4 py-2 text-xs font-semibold text-white hover:bg-cyan-500">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No customers found.</p>
            @endif
        </div>
    </x-dashboard-shell>
@endsection
