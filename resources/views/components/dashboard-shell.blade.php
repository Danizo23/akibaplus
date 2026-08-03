@props(["title" => 'Dashboard', "description" => '', "icon" => '📊'])

<div>
    <!-- Container ya Banner yenye Dark Teal Gradient & Glass Effect -->
   <div class="relative mb-8 overflow-hidden rounded-[24px] border border-transparent bg-gradient-to-br from-[#124e63]/90 via-[#0f3d4e]/80 to-[#0b2b37]/90 p-6 shadow-xl backdrop-blur-md">
        
        <!-- Subtle Glow Effect -->
        <div class="absolute right-0 top-0 h-40 w-40 translate-x-10 -translate-y-10 rounded-full bg-cyan-400/10 blur-2xl"></div>
        
        <div class="relative flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-300">Dashboard</p>
                <h1 class="mt-2 text-3xl font-extrabold text-white">{{ $title }}</h1>
                @if($description)
                    <p class="mt-2 text-sm leading-relaxed text-slate-200">{{ $description }}</p>
                @endif
            </div>
            
            <!-- Box la Icon -->
            <div class="flex h-16 w-16 items-center justify-center rounded-[20px] bg-white/10 text-3xl border border-transparent shadow-inner">
                {{ $icon }}
            </div>
        </div>
    </div>

    <div class="space-y-6">
        {{ $slot }}
    </div>
</div>