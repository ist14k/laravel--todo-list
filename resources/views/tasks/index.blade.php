<x-layouts.app>
  <!-- Header -->
  <div class="mb-6 border-b-2 border-gray-300 pb-3">
    <h1 class="text-3xl font-semibold text-gray-800">Your To Do List</h1>
    <p class="mt-1 text-sm text-gray-600">Keep track of your daily tasks</p>
  </div>

  <!-- Add Task Form -->
  <form action="{{ route('tasks.store') }}" method="POST" class="mb-6">
    @csrf
    <div class="flex gap-2">
      <input type="text" name="name" required
        class="flex-1 rounded-lg border border-gray-300 px-3 py-2 text-base text-gray-800 placeholder-gray-500 focus:border-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500"
        placeholder="What needs to be done?" />
      <button type="submit"
        class="rounded-lg bg-gray-800 px-5 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600">
        Add Task
      </button>
    </div>
  </form>

  <!-- Task Statistics -->
  <div class="mb-5 flex gap-3 text-xs text-gray-600">
    <span class="rounded-full bg-gray-100 px-2.5 py-1">Total: 5</span>
    <span class="rounded-full bg-gray-100 px-2.5 py-1">Completed: 2</span>
    <span class="rounded-full bg-gray-100 px-2.5 py-1">Remaining: 3</span>
  </div>

  <!-- Task List -->
  <div class="space-y-2.5">
    @forelse ($tasks as $task)
      <div
        class="group flex items-center gap-3 rounded-lg border border-gray-200 bg-white p-3 transition-all hover:shadow-sm">
        <input {{ $task->completed ? 'checked' : '' }} type="checkbox"
          class="h-4 w-4 rounded border-gray-300 text-gray-600 focus:ring-gray-500" />
        <a href="{{ route('tasks.show', $task) }}" @class([
            'flex-1 text-base',
            'text-gray-800' => !$task->completed,
            'line-through text-gray-500' => $task->completed,
        ])>{{ $task->name }}</a>
        <div class="flex gap-1.5 opacity-0 transition-opacity group-hover:opacity-100">
          <button
            class="rounded px-2.5 py-1 text-xs font-medium text-gray-600 hover:bg-gray-200 hover:text-gray-800">Edit</button>
          <button
            class="rounded px-2.5 py-1 text-xs font-medium text-gray-600 hover:bg-gray-200 hover:text-gray-700">Delete</button>
        </div>
      </div>
    @empty
      <!-- Empty State (hidden when tasks exist) -->
      <div class="hidden py-10 text-center">
        <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-full bg-gray-100">
          <svg class="h-7 w-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
        </div>
        <h3 class="text-base font-medium text-gray-800">No tasks yet</h3>
        <p class="mt-1 text-sm text-gray-600">Add your first task above to get started</p>
      </div>
    @endforelse

    <!-- Footer Actions -->
    <div class="mt-6 flex items-center justify-between border-t border-gray-200 pt-4">
      <button
        class="rounded-lg border border-gray-300 px-3.5 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100">
        Clear Completed
      </button>
      <div class="flex gap-1.5">
        <button
          class="rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100">
          All
        </button>
        <button
          class="rounded-lg bg-gray-700 px-3 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-800">
          Active
        </button>
        <button
          class="rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100">
          Completed
        </button>
      </div>
    </div>
</x-layouts.app>
