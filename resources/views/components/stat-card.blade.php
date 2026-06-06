@props(['title', 'value', 'subtitle' => '', 'color' => 'green'])

@php
    $colorClasses = [
        'green' => 'bg-green-50',
        'indigo' => 'bg-indigo-50',
        'blue' => 'bg-blue-50',
        'purple' => 'bg-purple-50',
        'orange' => 'bg-orange-50',
    ];
    $bgColor = $colorClasses[$color] ?? 'bg-green-50';
@endphp

<div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 transform transition duration-300 hover:-translate-y-1 hover:shadow-xl relative overflow-hidden group">
    <div class="absolute top-0 right-0 w-24 h-24 {{ $bgColor }} rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
    <div class="relative z-10">
        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">{{ $title }}</p>
        <h2 class="text-4xl font-black text-gray-900 mb-2">
            {{ $value }}
        </h2>
        @if($subtitle)
            <p class="text-sm text-gray-600">{{ $subtitle }}</p>
        @endif
        {{ $slot }}
    </div>
</div>
