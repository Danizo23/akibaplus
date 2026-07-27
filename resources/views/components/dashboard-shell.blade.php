@props(["title" => 'Dashboard', "description" => '', "icon" => '📊'])

<div>
    <div class="relative mb-8 overflow-hidden rounded-[24px] border border-[#E9EDF7] bg-gradient-to-br from-white via-[#FCFDFF] to-[#F4F7FE] p-6 shadow-sm">
        <div class="absolute right-0 top-0 h-40 w-40 translate-x-10 -translate-y-10 rounded-full bg-indigo-500/5 blur-2xl"></div>
        <div class="relative flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#4318FF]">Dashboard</p>
                <h1 class="mt-2 text-3xl font-extrabold text-[#1B2559]">{{ $title }}</h1>
                @if($description)
                    <p class="mt-2 text-sm leading-relaxed text-slate-500">{{ $description }}</p>
                @endif
            </div>
            <div class="flex h-16 w-16 items-center justify-center rounded-[20px] bg-[#F4F7FE] text-3xl text-[#4318FF] shadow-sm">
                {{ $icon }}
            </div>
        </div>
    </div>

    <div class="space-y-6">
        {{ $slot }}
    </div>
</div>
