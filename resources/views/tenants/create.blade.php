<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inquilinos
        </h2>
    </x-slot>

    <x-container class="py-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('tenants.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        {{-- Laravel default components --}}
                        <x-input-label>
                            Name
                        </x-input-label>
                        <x-text-input class="w-full mt-2" name="id" type="text" value="{{ old('id') }}"
                            placeholder="Type a tenant name" />
                        {{-- Show error messages with input-error component --}}
                        <x-input-error :messages="$errors->first('id')" />
                    </div>
                    <div class="flex justify-end">
                        <button type=submit" class="btn btn-blue">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-container>
</x-app-layout>
