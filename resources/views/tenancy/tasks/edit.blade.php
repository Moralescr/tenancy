<x-tenancy-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tasks
        </h2>
    </x-slot>

    <x-container class="py-12">
        <form action="{{ route('tasks.update', $task) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    {{-- Taskname --}}
                    <div class="mb-4">
                        {{-- Laravel default components --}}
                        <x-input-label>
                            Name
                        </x-input-label>
                        <x-text-input class="w-full mt-2" name="name" type="text"
                            value="{{ old('name', $task->name) }}" placeholder="Type a task name" />
                        {{-- Show error messages with input-error component --}}
                        <x-input-error :messages="$errors->first('name')" />
                    </div>
                    {{-- Task description --}}
                    <div class="mb-4 mt-4">
                        <x-input-label>
                            Description
                        </x-input-label>
                        <textarea class="form-control w-full mt-2" name="description" placeholder="Type a task description"> {{ old('description', $task->description) }}</textarea>
                        {{-- Show error messages with input-error component --}}
                        <x-input-error :messages="$errors->first('description')" />
                    </div>
                    {{-- Task image input --}}
                    <div class="mb-4">
                        <x-input-label>
                            Image upload
                        </x-input-label>
                        <input class="mt-2" name="image_url" type="file"
                            value="{{ old('image_url', $task->image_url) }}">
                        {{-- Show error messages with input-error component --}}
                        <x-input-error :messages="$errors->first('image_url')" />
                    </div>
                    {{-- submit button --}}
                    <div class="flex justify-end">
                        <button type=submit" class="btn btn-blue">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </x-container>
</x-tenancy-layout>
