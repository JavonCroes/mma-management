<x-layout title="Vechters">
    <h1 class="text-2xl font-bold mb-4">Vechters</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($fighters as $fighter)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ $fighter->image_url ?? 'https://via.placeholder.com/300' }}" alt="Image of {{ $fighter->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold">{{ $fighter->name }}</h2>
                    @if($fighter->nickname)
                        <p class="text-gray-600">"{{ $fighter->nickname }}"</p>
                    @endif
                    <p class="text-sm text-gray-800 mt-2">{{ $fighter->weight_class }}</p>
                    <p class="text-sm text-gray-500">Record: {{ $fighter->wins }} Wins - {{ $fighter->losses }} Losses</p>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
