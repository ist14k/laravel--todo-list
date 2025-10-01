<x-layouts.app>
  <!-- Header -->
  <div class="mb-6 border-b-2 border-gray-300 pb-3">
    <div class="flex items-center justify-between">
      <h1 class="text-3xl font-semibold text-gray-800">Edit Task</h1>
      <div class="flex gap-2">
        <a href="{{ route('tasks.show', $task) }}"
          class="rounded-lg bg-gray-800 px-5 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600">
          ← Back to Task
        </a>
        @auth
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
              class="cursor-pointer rounded-lg bg-gray-400 px-5 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600">
              Logout
            </button>
          </form>
        @endauth
      </div>
    </div>
  </div>

  <!-- Edit Task Form -->
  <div class="mx-auto max-w-2xl rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
    <form action="{{ route('tasks.update', $task) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-5">
        <label for="name" class="mb-2 block text-sm font-medium text-gray-800">Task Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $task->name) }}" required
          class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-800 placeholder-gray-500 focus:border-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500"
          placeholder="Enter task name...">
        @error('name')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-5">
        <label class="flex items-center">
          <input type="checkbox" name="completed" value="1"
            {{ old('completed', $task->completed) ? 'checked' : '' }}
            class="h-4 w-4 rounded border-gray-300 text-gray-800 focus:ring-2 focus:ring-gray-600">
          <span class="ml-2 text-sm text-gray-800">Mark as completed</span>
        </label>
      </div>

      <div class="flex gap-2">
        <button type="submit"
          class="cursor-pointer rounded-lg bg-gray-800 px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600">
          Update Task
        </button>
        <a href="{{ route('tasks.show', $task) }}"
          class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Cancel
        </a>
      </div>
    </form>
  </div>
</x-layouts.app>
