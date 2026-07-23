@props(["title" => 'Dashboard', "description" => '', "icon" => '📊'])

<div>
    <!-- Top summary card (Horizon style banner) -->
    <div class="mb-8 rounded-[20px] bg-white p-6 shadow-sm border border-[#E9EDF7] relative overflow-hidden">
        <div class="absolute right-0 top-0 h-40 w-40 translate-x-10 -translate-y-10 rounded-full bg-indigo-500/5 blur-2xl"></div>
        <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#4318FF]">Dashboard</p>
                <h1 class="mt-2 text-3xl font-extrabold text-[#1B2559]">{{ $title }}</h1>
                @if($description)
                    <p class="mt-2 text-slate-400 text-sm leading-relaxed">{{ $description }}</p>
                @endif
            </div>
            <div class="flex h-16 w-16 items-center justify-center rounded-[20px] bg-[#F4F7FE] text-3xl text-[#4318FF] shadow-sm">
                {{ $icon }}
            </div>
        </div>
    </div>

    <!-- Main page content slot -->
    <div class="space-y-6">
        {{ $slot }}
    </div>
</div>
