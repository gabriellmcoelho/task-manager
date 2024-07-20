<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task: ' . $task->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('tasks.update', $task) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{ $task->name }}" required>
                    </div>
                    <div>
                        <label for="description">Description:</label>
                        <textarea id="description" name="description">{{ $task->description }}</textarea>
                    </div>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
