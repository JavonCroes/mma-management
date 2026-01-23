<x-layout title="Manage Fighters">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Fighters</h1>
        <a href="{{ route('admin.fighters.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Add Fighter</a>
    </div>

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nickname</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Weight Class</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Record (W-L)</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($fighters as $fighter)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $fighter->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $fighter->nickname }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $fighter->weight_class }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $fighter->wins }} - {{ $fighter->losses }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.fighters.edit', $fighter) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.fighters.destroy', $fighter) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
