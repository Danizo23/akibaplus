<!-- Programmer Welcome Component stored in components folder -->
@php
    $userName = Auth::user()->name;
    $firstName = explode(' ', $userName)[0];
@endphp

<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
        
        <!-- Welcome Hero Section -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-purple-900 to-indigo-800 p-8 shadow-2xl transition-all hover:shadow-purple-500/30">
            <div class="relative z-10">
                <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl mb-2">
                    Welcome, {{ $firstName }}! ⚙️
                </h1>
                <p class="text-purple-200 text-lg max-w-xl">
                    Full system control and administrative features. Manage all aspects of the platform.
                </p>
            </div>
            <!-- Decorative elements -->
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-20 -mb-20 w-60 h-60 bg-indigo-400 opacity-20 rounded-full blur-2xl"></div>
        </div>

        {{ $slot }}

    </div>
</div>
