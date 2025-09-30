<x-layouts.app>
  <!-- Header -->
  <div class="mb-6 border-b-2 border-gray-300 pb-3">
    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-3xl font-semibold text-gray-800">Task Details</h1>
        <p class="mt-1 text-sm text-gray-600">View and manage your task</p>
      </div>
      <a href="#"
        class="rounded-lg bg-gray-800 px-5 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600">
        ← Back to List
      </a>
    </div>
  </div>

  <!-- Task Card -->
  <div class="mb-5 rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
    <!-- Task Status & Title -->
    <div class="mb-5">
      <div class="flex items-start gap-3">
        <input type="checkbox" checked
          class="mt-0.5 h-5 w-5 rounded border-gray-300 text-gray-600 focus:ring-gray-500" />
        <div class="flex-1">
          <h2 class="text-xl font-semibold text-gray-500 line-through">
            Complete project documentation
          </h2>
        </div>
      </div>
    </div>

    <!-- Task Meta Information -->
    <div class="grid grid-cols-1 gap-3 border-t border-gray-200 pt-5 md:grid-cols-2">
      <div>
        <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-500">Status</h3>
        <span class="mt-1 inline-flex rounded-full bg-gray-200 px-3 py-1 text-xs font-medium text-gray-700">
          Completed
        </span>
      </div>

      <div>
        <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-500">Created</h3>
        <p class="mt-1 text-sm text-gray-600">Sep 20, 2025 at 9:30 AM</p>
      </div>

      <div>
        <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-500">Completed</h3>
        <p class="mt-1 text-sm text-gray-600">Sep 22, 2025 at 2:15 PM</p>
      </div>
    </div>
  </div>

  <!-- Action Buttons -->
  <div class="mb-5 flex flex-wrap gap-2.5">
    <button type="button"
      class="rounded-lg bg-gray-700 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600">
      Mark as Incomplete
    </button>

    <a href="#"
      class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
      Edit Task
    </a>

    <button type="button" onclick="return confirm('Are you sure you want to delete this task?')"
      class="rounded-lg border border-gray-400 px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
      Delete Task
    </button>
  </div>

  <!-- Notes Section -->
  <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
    <div class="mb-3 flex items-center justify-between">
      <h3 class="text-lg font-medium text-gray-800">Notes</h3>
      <button type="button"
        class="rounded-lg bg-gray-800 px-3.5 py-2 text-xs font-semibold text-white transition-colors hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600">
        Add Note
      </button>
    </div>

    <!-- Notes List -->
    <div class="space-y-3">
      <!-- Note 1 -->
      <div class="rounded-lg border border-gray-200 bg-gray-50 p-3">
        <div class="mb-2 flex items-center justify-between">
          <span class="text-xs text-gray-500">Sep 21, 2025 at 10:15 AM</span>
          <div class="flex gap-2">
            <button class="text-xs font-medium text-gray-600 hover:text-gray-800">Edit</button>
            <button class="text-xs font-medium text-gray-500 hover:text-gray-700">Delete</button>
          </div>
        </div>
        <p class="text-sm text-gray-700">Started working on the API documentation. Need to cover authentication
          endpoints
          and error handling.</p>
      </div>

      <!-- Note 2 -->
      <div class="rounded-lg border border-gray-200 bg-gray-50 p-3">
        <div class="mb-2 flex items-center justify-between">
          <span class="text-xs text-gray-500">Sep 22, 2025 at 1:30 PM</span>
          <div class="flex gap-2">
            <button class="text-xs font-medium text-gray-600 hover:text-gray-800">Edit</button>
            <button class="text-xs font-medium text-gray-500 hover:text-gray-700">Delete</button>
          </div>
        </div>
        <p class="text-sm text-gray-700">Finished all sections. Added examples and code snippets. Ready for review.</p>
      </div>

      <!-- Add Note Form (initially hidden) -->
      <div class="hidden rounded-lg border border-gray-300 bg-white p-3">
        <textarea
          class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-800 placeholder-gray-500 focus:border-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500"
          rows="3" placeholder="Add a note about this task..."></textarea>
        <div class="mt-3 flex gap-2">
          <button type="button"
            class="rounded-lg bg-gray-800 px-3.5 py-2 text-xs font-semibold text-white transition-colors hover:bg-gray-900">
            Save Note
          </button>
          <button type="button"
            class="rounded-lg border border-gray-300 px-3.5 py-2 text-xs font-medium text-gray-700 transition-colors hover:bg-gray-100">
            Cancel
          </button>
        </div>
      </div>

      <!-- Empty State -->
      <div class="hidden py-6 text-center">
        <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100">
          <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
        </div>
        <p class="text-xs text-gray-600">No notes yet. Add your first note above.</p>
      </div>
    </div>
  </div>

</x-layouts.app>
