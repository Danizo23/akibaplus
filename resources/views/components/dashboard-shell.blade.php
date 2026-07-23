@props(["title" => 'Dashboard', "description" => '', "icon" => '📊'])

<div class="min-h-screen" style="background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);">
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <div class="relative overflow-hidden rounded-[2rem] p-8 shadow-2xl transition-all duration-300"
                style="background: rgba(15, 42, 82, 0.86); border: 1px solid rgba(148, 205, 255, 0.14); backdrop-filter: blur(18px);">
                <div class="relative z-10 flex flex-col gap-4">
                    <div class="inline-flex items-center gap-4 rounded-3xl bg-white/5 px-4 py-3 text-white/90 shadow-sm">
                        <div class="inline-flex h-14 w-14 items-center justify-center rounded-3xl bg-white/10 text-3xl">
                            {{ $icon }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-cyan-300">Dashboard</p>
                            <h1 class="text-3xl sm:text-4xl font-extrabold text-white">{{ $title }}</h1>
                        </div>
                    </div>
                    <p class="max-w-3xl text-cyan-200 text-lg">{{ $description }}</p>
                </div>
                <div class="pointer-events-none absolute inset-x-0 bottom-0 h-56 bg-gradient-to-t from-slate-950/70 to-transparent"></div>
                <div class="absolute -right-12 top-1/2 h-48 w-48 rounded-full bg-cyan-500/10 blur-3xl"></div>
                <div class="absolute -left-12 bottom-8 h-40 w-40 rounded-full bg-blue-400/10 blur-3xl"></div>
            </div>

            {{ $slot }}
        </div>
    </div>
</div>
