<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="flex items-center mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full bg-white dark:bg-gray-800 border-collapse">
                        <thead class="bg-gray-100 dark:bg-gray-700 border-b">
                            <tr>
                                <th class="py-2 px-4 text-left dark:text-gray-300">Name</th>
                                <th class="py-2 px-4 text-left dark:text-gray-300">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <!-- Example rows -->
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td class="py-2 px-4 border dark:border-gray-700">{{ $permission->name }}</td>
                                    <td class="py-2 px-4 border dark:border-gray-700">
                                        <div class="flex gap-2 items-center">
                                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-700 text-decoration-none text-white font-bold py-1 px-2 rounded dark:bg-yellow-700 dark:hover:bg-yellow-900">
                                                Edit
                                            </a>
                                            <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-decoration-none text-white font-bold py-1 px-2 rounded dark:bg-red-700 dark:hover:bg-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
