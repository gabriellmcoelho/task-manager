<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>{{ $project->description }}</p>
                <a href="{{ route('projects.edit', $project) }}">Edit</a>
                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>

                <h2>Tasks</h2>
                <a href="{{ route('projects.tasks.create', $project) }}">Add Task</a>
                <ul>
                    @foreach($project->tasks as $task)
                        <li>
                            <a href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
