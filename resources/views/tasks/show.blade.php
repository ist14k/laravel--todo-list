<x-layouts.app>
  <!-- Header -->
  <div class="mb-8 flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-bold text-gray-900">Task Details</h1>
      <p class="mt-1 text-sm text-gray-500">View and manage your task</p>
    </div>
    <div class="flex gap-3">
      <a href="{{ route('tasks.index') }}"
        class="inline-flex items-center gap-2 rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 transition-all hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to List
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

  <!-- Task Card -->
  <div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
    <div class="p-6">
      <!-- Task Title -->
      <div class="mb-6">
        <h2 @class([
            'text-xl font-bold',
            'text-gray-900' => !$task->completed,
            'line-through text-gray-400' => $task->completed,
        ])>
          {{ $task->name }}
        </h2>
      </div>

      <!-- Task Meta Information -->
      <div class="grid grid-cols-1 gap-4 border-t border-gray-100 pt-6 md:grid-cols-2">
        <div class="rounded-lg bg-gray-50 p-4">
          <h3 class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-500">Status</h3>
          @if ($task->completed)
            <span
              class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
              <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                  clip-rule="evenodd" />
              </svg>
              Completed
            </span>
          @else
            <span
              class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">
              <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                  clip-rule="evenodd" />
              </svg>
              Incomplete
            </span>
          @endif
        </div>

        <div class="rounded-lg bg-gray-50 p-4">
          <h3 class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-500">Created</h3>
          <p class="text-sm font-medium text-gray-900">{{ $task->created_at->format('M d, Y \a\t h:i A') }}</p>
        </div>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="border-t border-gray-100 bg-gray-50 px-6 py-4">
      <div class="flex flex-wrap gap-3">
        <button type="button"
          class="inline-flex cursor-pointer items-center gap-2 rounded-lg bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white transition-all hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          Mark as Incomplete
        </button>

        <a href="{{ route('tasks.edit', $task) }}"
          class="inline-flex items-center gap-2 rounded-lg border-2 border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition-all hover:border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
          Edit Task
        </a>

        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Are you sure you want to delete this task?')"
            class="inline-flex cursor-pointer items-center gap-2 rounded-lg border-2 border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition-all hover:border-red-200 hover:bg-red-50 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            Delete
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Notes Section -->
  <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
    <div class="border-b border-gray-100 bg-gray-50 px-6 py-4">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-lg font-bold text-gray-900">Notes</h3>
          <p class="mt-0.5 text-xs text-gray-500">Add context and details to your task</p>
        </div>
        <button type="button" onclick="toggleNoteForm()"
          class="inline-flex cursor-pointer items-center gap-2 rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white transition-all hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Add Note
        </button>
      </div>
    </div>

    <div class="p-6">
      <!-- Add Note Form -->
      <div id="noteForm" class="mb-6 hidden">
        <form action="{{ route('notes.store', $task) }}" method="POST">
          @csrf
          <div class="space-y-4">
            <textarea name="content" required
              class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-all focus:border-gray-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200"
              rows="4" placeholder="Add a note about this task..."></textarea>
            @error('content')
              <p class="text-xs text-red-600">{{ $message }}</p>
            @enderror
            <div class="flex gap-3">
              <button type="submit"
                class="flex-1 cursor-pointer rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white transition-all hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">
                Save Note
              </button>
              <button type="button" onclick="toggleNoteForm()"
                class="flex-1 cursor-pointer rounded-lg border-2 border-gray-200 bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 transition-all hover:border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                Cancel
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Notes List -->
      <div class="space-y-3">
        @forelse ($task->notes as $note)
          <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 transition-all hover:border-gray-300">
            <div class="mb-3 flex items-center justify-between">
              <span
                class="text-xs font-medium text-gray-500">{{ $note->created_at->format('M d, Y \a\t h:i A') }}</span>
              <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this note?')"
                  class="inline-flex cursor-pointer items-center gap-1 text-xs font-semibold text-gray-500 transition-all hover:text-red-600">
                  <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                  Delete
                </button>
              </form>
            </div>
            <p class="text-sm leading-relaxed text-gray-700">{{ $note->content }}</p>
          </div>
        @empty
          <div class="rounded-lg border border-dashed border-gray-300 bg-gray-50 p-8 text-center">
            <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100">
              <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
              </svg>
            </div>
            <h4 class="text-sm font-semibold text-gray-900">No notes yet</h4>
            <p class="mt-1 text-xs text-gray-500">Add your first note to keep track of important details</p>
          </div>
        @endforelse
      </div>
    </div>
  </div>

  <script>
    function toggleNoteForm() {
      const form = document.getElementById('noteForm');
      form.classList.toggle('hidden');
    }
  </script>

</x-layouts.app>
