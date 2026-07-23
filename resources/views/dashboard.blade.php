<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-dashboard-shell title="Dashboard" description="Your central activity hub, quick stats, and recent updates." icon="📊">
        <div class="bg-white/5 backdrop-blur-md overflow-hidden rounded-3xl shadow-xl p-8">
            <x-welcome />
        </div>
    </x-dashboard-shell>
</x-app-layout>
