<x-layouts.app>
  <!-- Header -->
  <div class="mb-8 flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-bold text-gray-900">Your To Do List</h1>
      <p class="mt-1 text-sm text-gray-500">Organize and track your tasks</p>
    </div>
    @auth
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
          class="inline-flex cursor-pointer items-center rounded-lg bg-gray-800 px-4 py-2 text-sm font-medium text-white transition-all hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
          Logout
        </button>
      </form>
    @endauth
  </div>

  <!-- Add Task Form -->
  <div class="mb-6 rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
    <form action="{{ route('tasks.store') }}" method="POST">
      @csrf
      <div class="flex gap-3">
        <input type="text" name="name" required
          class="flex-1 rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-all focus:border-gray-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200"
          placeholder="What needs to be done?" />
        <button type="submit"
          class="inline-flex cursor-pointer items-center gap-2 rounded-lg bg-gray-900 px-6 py-3 text-sm font-semibold text-white transition-all hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Add Task
        </button>
      </div>
    </form>
  </div>

  <!-- Task Statistics -->
  <div class="mb-6 flex gap-3">
    <div class="flex items-center gap-2 rounded-lg bg-gray-100 px-4 py-2">
      <span class="text-xs font-semibold text-gray-500">Total:</span>
      <span class="text-sm font-bold text-gray-900">5</span>
    </div>
    <div class="flex items-center gap-2 rounded-lg bg-gray-100 px-4 py-2">
      <span class="text-xs font-semibold text-gray-500">Completed:</span>
      <span class="text-sm font-bold text-gray-900">2</span>
    </div>
    <div class="flex items-center gap-2 rounded-lg bg-gray-100 px-4 py-2">
      <span class="text-xs font-semibold text-gray-500">Remaining:</span>
      <span class="text-sm font-bold text-gray-900">3</span>
    </div>
  </div>

  <!-- Task List -->
  <div class="space-y-2">
    @forelse ($tasks as $task)
      <div
        class="group flex items-center gap-4 rounded-lg border border-gray-200 bg-white p-4 transition-all hover:border-gray-300 hover:shadow-sm">
        <input {{ $task->completed ? 'checked' : '' }} type="checkbox"
          class="h-5 w-5 cursor-pointer rounded border-gray-300 text-gray-900 transition-all focus:ring-2 focus:ring-gray-400 focus:ring-offset-0" />
        <a href="{{ route('tasks.show', $task) }}" @class([
            'flex-1 text-sm font-medium transition-colors',
            'text-gray-900 hover:text-gray-700' => !$task->completed,
            'line-through text-gray-400' => $task->completed,
        ])>{{ $task->name }}</a>
        <div class="flex gap-2 opacity-0 transition-opacity group-hover:opacity-100">
          <a href="{{ route('tasks.edit', $task) }}"
            class="inline-flex cursor-pointer items-center gap-1 rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-700 transition-all hover:bg-gray-200">
            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
          </a>
          <form action="{{ route('tasks.destroy', $task) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this task?')"
              class="inline-flex cursor-pointer items-center gap-1 rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-700 transition-all hover:bg-red-100 hover:text-red-700">
              <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
              Delete
            </button>
          </form>
        </div>
      </div>
    @empty
      <!-- Empty State -->
      <div class="rounded-xl border border-dashed border-gray-300 bg-gray-50 py-12 text-center">
        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-gray-100">
          <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
        </div>
        <h3 class="text-base font-bold text-gray-900">No tasks yet</h3>
        <p class="mt-1 text-sm text-gray-500">Add your first task above to get started</p>
      </div>
    @endforelse
  </div>

  <!-- Footer Actions -->
  @if ($tasks->count() > 0)
    <div class="mt-6 flex items-center justify-between rounded-xl border border-gray-200 bg-white px-5 py-4 shadow-sm">
      <button
        class="inline-flex cursor-pointer items-center gap-2 rounded-lg border-2 border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700 transition-all hover:border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        Clear Completed
      </button>
      <div class="flex gap-2">
        <button
          class="cursor-pointer rounded-lg border-2 border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700 transition-all hover:border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
          All
        </button>
        <button
          class="cursor-pointer rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white transition-all hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
          Active
        </button>
        <button
          class="cursor-pointer rounded-lg border-2 border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700 transition-all hover:border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
          Completed
        </button>
      </div>
    </div>
  @endif
</x-layouts.app>
