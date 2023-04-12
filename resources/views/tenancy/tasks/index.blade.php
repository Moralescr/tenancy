<x-tenancy-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tasks
        </h2>
    </x-slot>

    <x-container class="py-12">
        <div class="flex justify-end mb-6">
            <a class="btn btn-green" href="{{ route('tasks.create') }}"> Add task </a>
        </div>

        @if ($tasks->count())
            {{-- Table --}}
            <div class="relative overflow-x-auto mb-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Task name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Task description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $task->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $task->description }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex justify-end">
                                        <a class="btn btn-blue mr-2" href="{{ route('tasks.show', $task) }}">Show</a>
                                        <a class="btn btn-yellow mr-2" href="{{ route('tasks.edit', $task) }}">Edit</a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-red mr-2">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- Pagination --}}
            {{ $tasks->links() }}
        @else
            <div class="card">
                <div class="card-body">
                    <p class="text-center">There is no data</p>
                </div>
            </div>
        @endif

    </x-container>
</x-tenancy-layout>
