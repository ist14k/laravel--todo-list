<x-layouts.app>
  <!-- Header -->
  <div class="mb-8 border-b-2 border-gray-300 pb-4">
    <h1 class="text-4xl font-bold text-gray-800">Your To Do List</h1>
    <p class="mt-2 text-gray-600">Keep track of your daily tasks</p>
  </div>

  <!-- Add Task Form -->
  <form action="" class="mb-8">
    <div class="flex gap-3">
      <input type="text"
        class="flex-1 rounded-lg border border-gray-300 px-4 py-3 text-lg text-gray-800 placeholder-gray-500 focus:border-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500"
        placeholder="What needs to be done?" />
      <button type="submit"
        class="rounded-lg bg-gray-800 px-6 py-3 font-medium text-white transition-colors hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500">
        Add Task
      </button>
    </div>
  </form>

  <!-- Task Statistics -->
  <div class="mb-6 flex gap-4 text-sm text-gray-600">
    <span class="rounded-full bg-gray-100 px-3 py-1">Total: 5</span>
    <span class="rounded-full bg-gray-100 px-3 py-1">Completed: 2</span>
    <span class="rounded-full bg-gray-100 px-3 py-1">Remaining: 3</span>
  </div>

  <!-- Task List -->
  <div class="space-y-3">
    <!-- Completed Task -->
    <div
      class="group flex items-center gap-4 rounded-lg border border-gray-200 bg-gray-50 p-4 transition-all hover:shadow-md">
      <input type="checkbox" checked class="h-5 w-5 rounded border-gray-300 text-gray-600 focus:ring-gray-500" />
      <p class="flex-1 text-lg text-gray-500 line-through">Complete project documentation</p>
      <div class="flex gap-2 opacity-0 transition-opacity group-hover:opacity-100">
        <button class="rounded px-3 py-1 text-sm text-gray-600 hover:bg-gray-200">Edit</button>
        <button class="rounded px-3 py-1 text-sm text-gray-600 hover:bg-gray-200 hover:text-red-600">Delete</button>
      </div>
    </div>

    <!-- Active Task -->
    <div
      class="group flex items-center gap-4 rounded-lg border border-gray-200 bg-white p-4 transition-all hover:shadow-md">
      <input type="checkbox" class="h-5 w-5 rounded border-gray-300 text-gray-600 focus:ring-gray-500" />
      <p class="flex-1 text-lg text-gray-800">Review code changes</p>
      <div class="flex gap-2 opacity-0 transition-opacity group-hover:opacity-100">
        <button class="rounded px-3 py-1 text-sm text-gray-600 hover:bg-gray-200">Edit</button>
        <button class="rounded px-3 py-1 text-sm text-gray-600 hover:bg-gray-200 hover:text-red-600">Delete</button>
      </div>
    </div>

    <!-- Active Task -->
    <div
      class="group flex items-center gap-4 rounded-lg border border-gray-200 bg-white p-4 transition-all hover:shadow-md">
      <input type="checkbox" class="h-5 w-5 rounded border-gray-300 text-gray-600 focus:ring-gray-500" />
      <p class="flex-1 text-lg text-gray-800">Update user interface</p>
      <div class="flex gap-2 opacity-0 transition-opacity group-hover:opacity-100">
        <button class="rounded px-3 py-1 text-sm text-gray-600 hover:bg-gray-200">Edit</button>
        <button class="rounded px-3 py-1 text-sm text-gray-600 hover:bg-gray-200 hover:text-red-600">Delete</button>
      </div>
    </div>

    <!-- Completed Task -->
    <div
      class="group flex items-center gap-4 rounded-lg border border-gray-200 bg-gray-50 p-4 transition-all hover:shadow-md">
      <input type="checkbox" checked class="h-5 w-5 rounded border-gray-300 text-gray-600 focus:ring-gray-500" />
      <p class="flex-1 text-lg text-gray-500 line-through">Set up development environment</p>
      <div class="flex gap-2 opacity-0 transition-opacity group-hover:opacity-100">
        <button class="rounded px-3 py-1 text-sm text-gray-600 hover:bg-gray-200">Edit</button>
        <button class="rounded px-3 py-1 text-sm text-gray-600 hover:bg-gray-200 hover:text-red-600">Delete</button>
      </div>
    </div>

    <!-- Active Task -->
    <div
      class="group flex items-center gap-4 rounded-lg border border-gray-200 bg-white p-4 transition-all hover:shadow-md">
      <input type="checkbox" class="h-5 w-5 rounded border-gray-300 text-gray-600 focus:ring-gray-500" />
      <p class="flex-1 text-lg text-gray-800">Prepare presentation slides</p>
      <div class="flex gap-2 opacity-0 transition-opacity group-hover:opacity-100">
        <button class="rounded px-3 py-1 text-sm text-gray-600 hover:bg-gray-200">Edit</button>
        <button class="rounded px-3 py-1 text-sm text-gray-600 hover:bg-gray-200 hover:text-red-600">Delete</button>
      </div>
    </div>
  </div>

  <!-- Empty State (hidden when tasks exist) -->
  <div class="hidden py-12 text-center">
    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-gray-100">
      <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
      </svg>
    </div>
    <h3 class="text-lg font-medium text-gray-800">No tasks yet</h3>
    <p class="mt-1 text-gray-600">Add your first task above to get started</p>
  </div>

  <!-- Footer Actions -->
  <div class="mt-8 flex justify-between border-t border-gray-200 pt-6">
    <button class="rounded-lg border border-gray-300 px-4 py-2 text-gray-700 transition-colors hover:bg-gray-50">
      Clear Completed
    </button>
    <div class="flex gap-2">
      <button class="rounded-lg border border-gray-300 px-4 py-2 text-gray-700 transition-colors hover:bg-gray-50">
        All
      </button>
      <button class="rounded-lg bg-gray-700 px-4 py-2 text-white transition-colors hover:bg-gray-800">
        Active
      </button>
      <button class="rounded-lg border border-gray-300 px-4 py-2 text-gray-700 transition-colors hover:bg-gray-50">
        Completed
      </button>
    </div>
  </div>
</x-layouts.app>
