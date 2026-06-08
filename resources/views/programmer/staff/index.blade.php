<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Staff Management') }}
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

                <!-- Header Section -->
                <div class="relative overflow-hidden rounded-2xl p-8 shadow-2xl transition-all"
                    style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));">
                    <div class="relative z-10 flex justify-between items-center">
                        <div>
                            <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl mb-2">
                                👥 Staff Management
                            </h1>
                            <p class="text-cyan-200 text-lg max-w-xl">
                                Manage all staff members in the system.
                            </p>
                        </div>
                        <a href="{{ route('programmer.staff.create') }}"
                            class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-cyan-600 to-cyan-500 px-8 py-4 text-sm font-bold uppercase tracking-widest text-white shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:from-cyan-700 hover:to-cyan-600">
                            ✨ Add New Staff
                        </a>
                    </div>
                </div>

                <!-- Staff Table -->
                <div class="bg-white/10 backdrop-blur-md overflow-hidden rounded-2xl shadow-xl">
                    <div class="px-6 py-5 lg:px-8 lg:py-7">
                        <h3 class="text-lg leading-6 font-bold text-cyan-300">All Staff Members</h3>
                        <p class="text-cyan-100 text-sm mt-2">
                            Total staff: <span class="font-bold text-cyan-300">{{ $staff->count() }}</span>
                        </p>
                    </div>
                    <div class="p-6 lg:p-8 overflow-x-auto">
                        @if($staff->count() > 0)
                            <table class="min-w-[900px] w-full text-left text-sm">
                                <thead>
                                    <tr class="text-slate-300 bg-slate-900/10 border-b border-slate-700">
                                        <th class="py-4 px-6 font-semibold uppercase tracking-wide">Name</th>
                                        <th class="py-4 px-6 font-semibold uppercase tracking-wide">Email</th>
                                        <th class="py-4 px-6 font-semibold uppercase tracking-wide">Joined</th>
                                        <th class="py-4 px-6 font-semibold uppercase tracking-wide text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($staff as $member)
                                        <tr class="border-b border-slate-700 hover:bg-white/5 transition-colors">
                                            <td class="py-5 px-6 text-white font-medium">{{ $member->name }}</td>
                                            <td class="py-5 px-6 text-cyan-100">{{ $member->email }}</td>
                                            <td class="py-5 px-6 text-cyan-100 text-sm">{{ $member->created_at->format('M d, Y') }}</td>
                                            <td class="py-5 px-6 text-center">
                                                <form action="{{ route('programmer.staff.destroy', $member) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this staff member? This action cannot be undone.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-xs font-semibold text-white transition-all duration-300 hover:bg-red-700 hover:shadow-lg">
                                                        🗑️ Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-16">
                                <div class="text-5xl mb-4">👥</div>
                                <h3 class="text-lg font-bold text-cyan-300 mb-2">No staff members yet</h3>
                                <p class="text-cyan-200 mb-8">Get started by adding your first staff member.</p>
                                <a href="{{ route('programmer.staff.create') }}" 
                                    class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-cyan-600 to-cyan-500 px-8 py-4 text-sm font-bold uppercase tracking-widest text-white shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:from-cyan-700 hover:to-cyan-600">
                                    ✨ Create First Staff
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Back Link -->
                <div>
                    <a href="{{ route('programmer.dashboard') }}" class="inline-flex items-center gap-2 text-cyan-400 hover:text-cyan-300 font-semibold transition-colors">
                        ← Back to Dashboard
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
