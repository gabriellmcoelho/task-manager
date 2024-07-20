<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('projects.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            {{ __('Create New Project') }}
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($projects as $project)
                            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold">{{ $project->name }}</h3>
                                <p class="text-gray-600 mt-2">{{ $project->description }}</p>
                                <div class="flex justify-end mt-4 space-x-2">
                                    <a href="{{ route('projects.show', $project) }}" class="px-3 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                                        {{ __('View') }}
                                    </a>
                                    <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
