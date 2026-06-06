@props(['title', 'description', 'buttonText', 'buttonRoute', 'icon' => '📌', 'gradientFrom' => 'from-indigo-50', 'gradientTo' => 'to-white'])

<div class="bg-gradient-to-br {{ $gradientFrom }} {{ $gradientTo }} rounded-2xl p-6 shadow-lg border border-indigo-100 transform transition duration-300 hover:-translate-y-1 hover:shadow-xl flex flex-col justify-center items-center text-center">
    <div class="mb-4 bg-indigo-100 p-4 rounded-full text-indigo-600 text-2xl">
        {{ $icon }}
    </div>
    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $title }}</h3>
    <p class="text-sm text-gray-600 mb-4">{{ $description }}</p>
    <a href="{{ $buttonRoute }}" class="w-full inline-flex justify-center items-center px-4 py-2.5 bg-indigo-600 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200">
        {{ $buttonText }}
    </a>
</div>
