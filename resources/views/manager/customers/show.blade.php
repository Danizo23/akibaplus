<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Customer Details" description="Edit customer info and review deposit details." icon="📝">
        @if(session('success'))
            <div class="rounded-2xl bg-emerald-500/10 border border-emerald-400/30 text-emerald-100 p-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white/5 backdrop-blur-md overflow-hidden rounded-3xl shadow-xl p-6">
            <form method="POST" action="{{ route('manager.customers.update', $user) }}" class="space-y-6">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-sm font-semibold text-cyan-200 mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-950/80 px-4 py-3 text-white" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-cyan-200 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full rounded-2xl border border-slate-700 bg-slate-950/80 px-4 py-3 text-white" required>
                </div>

                <div class="rounded-3xl bg-slate-900/80 p-5 border border-slate-700">
                    <p class="text-cyan-200">Total customer deposits: Tsh {{ number_format($totalDeposits, 2) }}</p>
                    @if($savingsAccount)
                        <p class="text-cyan-200">Savings account balance: Tsh {{ number_format($savingsAccount->balance, 2) }}</p>
                    @else
                        <p class="text-cyan-200">No savings account exists for this customer yet.</p>
                    @endif
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:justify-between sm:items-center">
                    <a href="{{ route('manager.customers.index') }}" class="inline-flex items-center justify-center rounded-2xl bg-slate-700 px-6 py-3 text-sm font-semibold text-white hover:bg-slate-600">Cancel</a>
                    <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-cyan-500 px-6 py-3 text-sm font-semibold text-white hover:bg-cyan-400">Save Customer</button>
                </div>
            </form>
        </div>
    </x-dashboard-shell>
</x-app-layout>
