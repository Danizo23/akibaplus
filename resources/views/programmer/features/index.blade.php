<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-300 leading-tight">
            {{ __('Feature Requests & Additions') }}
        </h2>
    </x-slot>

    <div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">
                <div class="bg-white/10 backdrop-blur-md overflow-hidden rounded-3xl shadow-xl p-6">
                    <div class="space-y-4">
                        <p class="text-cyan-200">Programmers can use this area to plan, track and add feature improvements for Akibaplus.</p>
                        <div class="rounded-3xl bg-slate-900/80 p-6 border border-slate-700">
                            <h3 class="text-xl text-white font-semibold mb-3">Feature placeholder</h3>
                            <p class="text-slate-300">This section is a starting point for adding feature management. You can extend it later to include feature requests, backlog items, or release notes.</p>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="{{ route('programmer.dashboard') }}" class="inline-flex items-center gap-2 rounded-2xl bg-cyan-600 px-6 py-3 text-sm font-semibold text-white hover:bg-cyan-500">← Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
