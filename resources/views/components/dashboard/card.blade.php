@props(['icon', 'title', 'description', 'route'])

<a href="{{ $route }}" class="bg-white rounded-lg p-6 shadow flex flex-col items-center hover:bg-blue-50 transition">
    <span class="text-3xl mb-2">
        {{-- Gebruik een icon library of SVG --}}
        <i class="fas fa-{{ $icon }}"></i>
    </span>
    <span class="font-semibold">{{ $title }}</span>
    <span class="text-gray-500 text-sm">{{ $description }}</span>
</a>
