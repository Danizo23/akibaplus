<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800/50 dark:backdrop-blur-xl overflow-hidden shadow-2xl sm:rounded-2xl border border-white/10 transition-all duration-300 hover:shadow-blue-500/20">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
