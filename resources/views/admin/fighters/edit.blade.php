<x-layout title="Edit Fighter">
    <h1 class="text-2xl font-bold mb-4">Edit Fighter: {{ $fighter->name }}</h1>

    <div class="bg-white rounded shadow p-6">
        <form action="{{ route('admin.fighters.update', $fighter) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ $fighter->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>
                <div>
                    <label for="nickname" class="block text-sm font-medium text-gray-700">Nickname</label>
                    <input type="text" name="nickname" id="nickname" value="{{ $fighter->nickname }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="weight_class" class="block text-sm font-medium text-gray-700">Weight Class</label>
                    <input type="text" name="weight_class" id="weight_class" value="{{ $fighter->weight_class }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>
                <div>
                    <label for="image_url" class="block text-sm font-medium text-gray-700">Image URL</label>
                    <input type="text" name="image_url" id="image_url" value="{{ $fighter->image_url }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="wins" class="block text-sm font-medium text-gray-700">Wins</label>
                    <input type="number" name="wins" id="wins" value="{{ $fighter->wins }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>
                <div>
                    <label for="losses" class="block text-sm font-medium text-gray-700">Losses</label>
                    <input type="number" name="losses" id="losses" value="{{ $fighter->losses }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update Fighter</button>
                <a href="{{ route('admin.dashboard') }}" class="ml-4 text-gray-500 hover:text-gray-700">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
