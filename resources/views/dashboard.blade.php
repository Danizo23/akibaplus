<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Dashboard" description="Your central activity hub, quick stats, and recent updates." icon="📊">
    <!-- Box la muonekano wa Savings Page -->
    <div class="relative overflow-hidden rounded-3xl p-8 shadow-2xl transition-all mb-8" style="background: linear-gradient(135deg, rgba(0, 168, 216, 0.15), rgba(0, 88, 168, 0.1)); border: 1px solid rgba(0, 168, 216, 0.2);">
        <div class="relative z-10 text-white">
            <x-welcome />
        </div>
    </div>
    </x-dashboard-shell>
</x-app-layout>


