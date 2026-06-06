@props(['title', 'subtitle', 'gradientFrom' => 'from-indigo-900', 'gradientTo' => 'to-blue-800', 'icon' => '👋'])

<div class="relative overflow-hidden rounded-2xl bg-gradient-to-br {{ $gradientFrom }} {{ $gradientTo }} p-8 shadow-2xl transition-all hover:shadow-indigo-500/30">
    <div class="relative z-10">
        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl mb-2">
            {{ $title }} {{ $icon }}
        </h1>
        <p class="text-indigo-200 text-lg max-w-xl">
            {{ $subtitle }}
        </p>
    </div>
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-20 -mb-20 w-60 h-60 bg-blue-400 opacity-20 rounded-full blur-2xl"></div>
</div>
