<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inquilinos
        </h2>
    </x-slot>

    <x-container class="py-12">
        <div class="flex justify-end">
            <a class="btn btn-green" href="{{ route('tenants.create') }}"> New tenant</a>
        </div>

        {{-- Table --}}
        <div class="relative overflow-x-auto mb-6 mt-2">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tenant name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tenant domain
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $tenant->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{-- Access to relation domains --}}
                                {{ $tenant->domains->first()->domain }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end">
                                    <form action="{{ route('tenants.destroy', $tenant) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-red mr-2">Delete</button>
                                    </form>
                                    <a class="btn btn-yellow" href="{{ route('tenants.edit', $tenant) }}">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-container>
</x-app-layout>
