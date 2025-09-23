    <x-layouts.app>
      <!-- Header -->
      <div class="mb-8 border-b-2 border-gray-300 pb-4">
        <div class="flex items-center justify-between">
          <div>
            <h1 class="text-4xl font-bold text-gray-800">Task Details</h1>
            <p class="mt-2 text-gray-600">View and manage your task</p>
          </div>
          <a href="#"
            class="rounded-lg bg-gray-800 px-6 py-3 font-medium text-white transition-colors hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500">
            ← Back to List
          </a>
        </div>
      </div>

      <!-- Task Card -->
      <div class="mb-6 rounded-lg border border-gray-200 bg-white p-6 shadow-lg">
        <!-- Task Status & Title -->
        <div class="mb-6">
          <div class="flex items-start gap-4">
            <input type="checkbox" checked
              class="mt-1 h-6 w-6 rounded border-gray-300 text-gray-600 focus:ring-gray-500" />
            <div class="flex-1">
              <h2 class="text-2xl font-semibold text-gray-500 line-through">
                Complete project documentation
              </h2>
            </div>
          </div>
        </div>

        <!-- Task Meta Information -->
        <div class="grid grid-cols-1 gap-4 border-t border-gray-200 pt-6 md:grid-cols-2">
          <div>
            <h3 class="text-sm font-medium text-gray-800">Status</h3>
            <span class="mt-1 inline-flex rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-800">
              Completed
            </span>
          </div>

          <div>
            <h3 class="text-sm font-medium text-gray-800">Created</h3>
            <p class="mt-1 text-sm text-gray-600">Sep 20, 2025 at 9:30 AM</p>
          </div>

          <div>
            <h3 class="text-sm font-medium text-gray-800">Completed</h3>
            <p class="mt-1 text-sm text-gray-600">Sep 22, 2025 at 2:15 PM</p>
          </div>
        </div>

      </div>

      <!-- Action Buttons -->
      <div class="mb-6 flex flex-wrap gap-3">
        <button type="button"
          class="rounded-lg bg-yellow-600 px-6 py-3 font-medium text-white transition-colors hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500">
          Mark as Incomplete
        </button>

        <a href="#"
          class="rounded-lg border border-gray-300 px-6 py-3 font-medium text-gray-700 transition-colors hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Edit Task
        </a>

        <button type="button" onclick="return confirm('Are you sure you want to delete this task?')"
          class="rounded-lg border border-red-300 px-6 py-3 font-medium text-red-600 transition-colors hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500">
          Delete Task
        </button>
      </div>
      <!-- Notes Section -->
      <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-lg">
        <div class="mb-4 flex items-center justify-between">
          <h3 class="text-lg font-medium text-gray-800">Notes</h3>
          <button type="button"
            class="rounded-lg bg-gray-800 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500">
            Add Note
          </button>
        </div>

        <!-- Notes List -->
        <div class="space-y-4">
          <!-- Note 1 -->
          <div class="rounded-lg border border-gray-200 bg-gray-50 p-4">
            <div class="mb-2 flex items-center justify-between">
              <span class="text-xs text-gray-500">Sep 21, 2025 at 10:15 AM</span>
              <div class="flex gap-2">
                <button class="text-xs text-gray-600 hover:text-gray-800">Edit</button>
                <button class="text-xs text-red-600 hover:text-red-800">Delete</button>
              </div>
            </div>
            <p class="text-gray-700">Started working on the API documentation. Need to cover authentication endpoints
              and
              error handling.</p>
          </div>

          <!-- Note 2 -->
          <div class="rounded-lg border border-gray-200 bg-gray-50 p-4">
            <div class="mb-2 flex items-center justify-between">
              <span class="text-xs text-gray-500">Sep 22, 2025 at 1:30 PM</span>
              <div class="flex gap-2">
                <button class="text-xs text-gray-600 hover:text-gray-800">Edit</button>
                <button class="text-xs text-red-600 hover:text-red-800">Delete</button>
              </div>
            </div>
            <p class="text-gray-700">Finished all sections. Added examples and code snippets. Ready for review.</p>
          </div>

          <!-- Add Note Form (initially hidden) -->
          <div class="hidden rounded-lg border border-gray-300 bg-white p-4">
            <textarea
              class="w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-800 placeholder-gray-500 focus:border-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500"
              rows="3" placeholder="Add a note about this task..."></textarea>
            <div class="mt-3 flex gap-2">
              <button type="button"
                class="rounded-lg bg-gray-800 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-900">
                Save Note
              </button>
              <button type="button"
                class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50">
                Cancel
              </button>
            </div>
          </div>

          <!-- Empty State -->
          <div class="hidden py-8 text-center">
            <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100">
              <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
            </div>
            <p class="text-sm text-gray-600">No notes yet. Add your first note above.</p>
          </div>
        </div>
      </div>

    </x-layouts.app>
