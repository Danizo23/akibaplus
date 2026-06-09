<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Manage Staff') }}
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

                <div class="bg-white/10 backdrop-blur-md overflow-hidden rounded-3xl shadow-xl p-6">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Staff Directory</h1>
                            <p class="text-cyan-200">View and update staff roles and details.</p>
                        </div>
                        <a href="{{ route('manager.dashboard') }}" class="inline-flex items-center rounded-2xl bg-cyan-600 px-5 py-3 text-sm font-semibold text-white hover:bg-cyan-500">← Back to Manager Dashboard</a>
                    </div>
                </div>

                <div class="bg-white/10 backdrop-blur-md overflow-hidden rounded-3xl shadow-xl">
                    <div class="p-6 lg:p-8 overflow-x-auto">
                        @if($staff->count())
                            <table class="min-w-full w-full text-left text-sm">
                                <thead>
                                    <tr class="text-slate-300 bg-slate-900/10 border-b border-slate-700">
                                        <th class="py-4 px-5 font-semibold uppercase tracking-wide">Name</th>
                                        <th class="py-4 px-5 font-semibold uppercase tracking-wide">Email</th>
                                        <th class="py-4 px-5 font-semibold uppercase tracking-wide">Role</th>
                                        <th class="py-4 px-5 font-semibold uppercase tracking-wide text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($staff as $member)
                                        <tr class="border-t border-slate-700 hover:bg-white/5">
                                            <td class="py-4 px-5 text-white">{{ $member->name }}</td>
                                            <td class="py-4 px-5 text-cyan-100">{{ $member->email }}</td>
                                            <td class="py-4 px-5 text-cyan-100 uppercase">{{ str_replace('_', ' ', $member->role) }}</td>
                                            <td class="py-4 px-5 text-center">
                                                <a href="{{ route('manager.staff.edit', $member) }}" class="inline-flex items-center justify-center rounded-lg bg-cyan-600 px-4 py-2 text-xs font-semibold text-white hover:bg-cyan-500">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-16 text-cyan-200">
                                <p>No staff members available.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
