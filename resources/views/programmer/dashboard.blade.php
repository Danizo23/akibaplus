<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Programmer Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
                
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Welcome Hero Section -->
                <div class="relative overflow-hidden rounded-2xl p-8 shadow-2xl transition-all"
                    style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl mb-2">
                            Welcome, {{ explode(' ', Auth::user()->name)[0] }}! ⚙️
                        </h1>
                        <p class="text-cyan-200 text-lg max-w-xl">
                            Full system control and administrative features. Manage all aspects of the platform.
                        </p>
                    </div>
                </div>

                <!-- Programmer Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- System Status Card -->
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg transform transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:bg-white/20 relative overflow-hidden group">
                        <div class="relative z-10">
                            <p class="text-sm font-semibold text-cyan-300 uppercase tracking-wider mb-1">System Status</p>
                            <h2 class="text-4xl font-black text-green-400 mb-2">Active</h2>
                            <p class="text-sm text-cyan-100">✓ All systems operational</p>
                        </div>
                    </div>

                    <!-- Total Staff Card -->
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-lg transform transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:bg-white/20 relative overflow-hidden group">
                        <div class="relative z-10">
                            <p class="text-sm font-semibold text-cyan-300 uppercase tracking-wider mb-1">Total Staff</p>
                            <h2 class="text-4xl font-black text-white mb-2">--</h2>
                            <p class="text-sm text-cyan-100">Registered staff members</p>
                        </div>
                    </div>

                    <!-- Add Staff Card -->
                    <div class="rounded-2xl p-6 shadow-xl transform transition duration-300 hover:-translate-y-1 hover:shadow-2xl flex flex-col justify-center items-center text-center"
                        style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.15), rgba(0, 168, 216, 0.05));">
                        <div class="mb-4 text-4xl">👤</div>
                        <h3 class="text-xl font-bold text-white mb-2">Add Staff Member</h3>
                        <p class="text-sm text-cyan-200 mb-6">Register a new staff member in the system</p>
                        <a href="{{ route('programmer.staff.create') }}" 
                            class="w-full inline-flex justify-center items-center px-6 py-3 border border-cyan-400 rounded-xl font-bold text-sm text-white uppercase tracking-widest transition-all duration-200 shadow-lg hover:bg-cyan-500/20"
                            style="background: linear-gradient(135deg, #00a8d8, #0088a8); color: white;">
                            ✨ New Staff
                        </a>
                    </div>

                    <!-- View Reports Card -->
                    <div class="rounded-2xl p-6 shadow-xl transform transition duration-300 hover:-translate-y-1 hover:shadow-2xl flex flex-col justify-center items-center text-center"
                        style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.15), rgba(0, 168, 216, 0.05));">
                        <div class="mb-4 text-4xl">🧾</div>
                        <h3 class="text-xl font-bold text-white mb-2">Staff Reports</h3>
                        <p class="text-sm text-cyan-200 mb-6">Review daily reports submitted by staff.</p>
                        <a href="{{ route('programmer.reports.index') }}" 
                            class="w-full inline-flex justify-center items-center px-6 py-3 border border-cyan-400 rounded-xl font-bold text-sm text-white uppercase tracking-widest transition-all duration-200 shadow-lg hover:bg-cyan-500/20"
                            style="background: linear-gradient(135deg, #00a8d8, #0088a8); color: white;">
                            👁️ View Reports
                        </a>
                    </div>
                </div>

                <!-- Developer Tools Section -->
                <div class="bg-white/10 backdrop-blur-md overflow-hidden rounded-2xl shadow-xl">
                    <div class="px-6 py-5">
                        <h3 class="text-lg leading-6 font-bold text-cyan-300">⚙️ System Management</h3>
                    </div>
                    <div class="p-6 lg:p-8">
                        <p class="text-cyan-100 leading-relaxed mb-6 font-medium">
                            You have full access to system administration tools. Use the cards above to manage staff members, monitor system status, and perform administrative tasks.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="{{ route('programmer.staff.create') }}" 
                                class="inline-flex items-center justify-center px-6 py-3 border border-cyan-400 rounded-xl font-bold text-sm text-white uppercase tracking-widest transition-all duration-200 shadow-lg hover:shadow-xl"
                                style="background: linear-gradient(135deg, #00a8d8, #0088a8); color: white;">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                Add New Staff
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
