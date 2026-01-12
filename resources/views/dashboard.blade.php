<x-layout title="Dashboard">
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-2">Welkom terug </h1>
        <p class="text-gray-600">
            Dit is je dashboard. Gebruik het menu om Vechters en Events te beheren.
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-6 mt-6">
        <a href="{{ route('fighters.index') }}" class="bg-white rounded shadow p-6 hover:shadow-md transition">
            <h2 class="text-xl font-semibold mb-1">Vechters</h2>
            <p class="text-gray-600">Bekijk, voeg toe, pas aan en verwijder vechters.</p>
        </a>

        <a href="{{ route('events.index') }}" class="bg-white rounded shadow p-6 hover:shadow-md transition">
            <h2 class="text-xl font-semibold mb-1">Events</h2>
            <p class="text-gray-600">Beheer events en kies een main event vechter.</p>
        </a>
    </div>
</x-layout>
