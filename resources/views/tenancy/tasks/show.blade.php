<x-tenancy-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tareas
        </h2>
    </x-slot>

    <x-container class="py-12">

        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-semibold mb-4">{{ $task->name }}</h1>
                <p>{{ $task->description }}</p>
                <img src="{{ route('file', $task->image_url) }}" alt="">
            </div>
        </div>

    </x-container>
</x-tenancy-layout>
