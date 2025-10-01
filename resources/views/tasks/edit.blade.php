<x-layouts.app>
  <!-- Header -->
  <div class="mb-8 flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-bold text-gray-900">Edit Task</h1>
      <p class="mt-1 text-sm text-gray-500">Update your task details</p>
    </div>
    <div class="flex gap-3">
      <a href="{{ route('tasks.show', $task) }}"
        class="inline-flex items-center gap-2 rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 transition-all hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back
      </a>
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
  </div>

  <!-- Edit Task Form -->
  <div class="mx-auto max-w-2xl">
    <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
      <div class="p-6">
        <form action="{{ route('tasks.update', $task) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="space-y-6">
            <!-- Task Name -->
            <div>
              <label for="name" class="mb-2 block text-sm font-semibold text-gray-900">Task Name</label>
              <input type="text" name="name" id="name" value="{{ old('name', $task->name) }}" required
                class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-all focus:border-gray-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200"
                placeholder="Enter task name...">
              @error('name')
                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <!-- Completed Checkbox -->
            <div class="rounded-lg bg-gray-50 p-4">
              <label class="flex cursor-pointer items-center">
                <input type="checkbox" name="completed" value="1"
                  {{ old('completed', $task->completed) ? 'checked' : '' }}
                  class="h-5 w-5 rounded border-gray-300 text-gray-900 transition-all focus:ring-2 focus:ring-gray-400 focus:ring-offset-0">
                <span class="ml-3 text-sm font-medium text-gray-900">Mark as completed</span>
              </label>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 pt-4">
              <button type="submit"
                class="flex-1 cursor-pointer rounded-lg bg-gray-900 px-6 py-3 text-sm font-semibold text-white transition-all hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
                Update Task
              </button>
              <a href="{{ route('tasks.show', $task) }}"
                class="flex-1 rounded-lg border-2 border-gray-200 bg-white px-6 py-3 text-center text-sm font-semibold text-gray-700 transition-all hover:border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                Cancel
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layouts.app>
