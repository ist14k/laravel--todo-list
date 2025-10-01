<x-layouts.app>
  <!-- Header -->
  <div class="mb-6 border-b-2 border-gray-300 pb-3">
    <div class="flex items-center justify-between">
      <h1 class="text-3xl font-semibold text-gray-800">Task Details</h1>
      <div class="flex gap-2">
        <a href="{{ route('tasks.index') }}"
          class="rounded-lg bg-gray-800 px-5 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600">
          ← Back to List
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

  <!-- Task Card -->
  <div class="mb-5 rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
    <!-- Task Status & Title -->
    <div class="mb-5">
      <h2 @class([
          'text-xl font-semibold',
          'text-gray-800' => !$task->completed,
          'line-through text-gray-500' => $task->completed,
      ])>
        {{ $task->name }}
      </h2>
    </div>

    <!-- Task Meta Information -->
    <div class="grid grid-cols-1 gap-3 border-t border-gray-200 pt-5 md:grid-cols-2">
      <div>
        <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-500">Status</h3>
        @if ($task->completed)
          <span
            class="mt-1 inline-block rounded-full bg-green-100 px-2.5 py-1 text-xs font-medium text-green-800">Completed</span>
        @else
          <span
            class="mt-1 inline-block rounded-full bg-red-100 px-2.5 py-1 text-xs font-medium text-red-800">Incomplete</span>
        @endif
      </div>

      <div>
        <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-500">Created</h3>
        <p class="mt-1 text-sm text-gray-600">{{ $task->created_at->format('M d, Y \a\t h:i A') }}</p>
      </div>
    </div>
  </div>

  <!-- Action Buttons -->
  <div class="mb-5 flex flex-wrap gap-2.5">
    <button type="button"
      class="cursor-pointer rounded-lg bg-gray-700 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600">
      Mark as Incomplete
    </button>

    <a href="{{ route('tasks.edit', $task) }}"
      class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
      Edit Task
    </a>

    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
      @csrf
      @method('DELETE')
      <button type="submit" onclick="return confirm('Are you sure you want to delete this task?')"
        class="cursor-pointer rounded-lg border border-gray-400 px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
        Delete Task
      </button>
    </form>
  </div>

  <!-- Notes Section -->
  <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
    <div class="mb-3 flex items-center justify-between">
      <h3 class="text-lg font-medium text-gray-800">Notes</h3>
      <button type="button" onclick="toggleNoteForm()"
        class="cursor-pointer rounded-lg bg-gray-800 px-3.5 py-2 text-xs font-semibold text-white transition-colors hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600">
        Add Note
      </button>
    </div>

    <!-- Add Note Form -->
    <div id="noteForm" class="mb-4 hidden rounded-lg border border-gray-300 bg-white p-3">
      <form action="{{ route('notes.store', $task) }}" method="POST">
        @csrf
        <textarea name="content" required
          class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-800 placeholder-gray-500 focus:border-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500"
          rows="3" placeholder="Add a note about this task..."></textarea>
        @error('content')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
        <div class="mt-3 flex gap-2">
          <button type="submit"
            class="cursor-pointer rounded-lg bg-gray-800 px-3.5 py-2 text-xs font-semibold text-white transition-colors hover:bg-gray-900">
            Save Note
          </button>
          <button type="button" onclick="toggleNoteForm()"
            class="cursor-pointer rounded-lg border border-gray-300 px-3.5 py-2 text-xs font-medium text-gray-700 transition-colors hover:bg-gray-100">
            Cancel
          </button>
        </div>
      </form>
    </div>

    <!-- Notes List -->
    <div class="space-y-3">
      @forelse ($task->notes as $note)
        <div class="rounded-lg border border-gray-200 bg-gray-50 p-3">
          <div class="mb-2 flex items-center justify-between">
            <span class="text-xs text-gray-500">{{ $note->created_at->format('M d, Y \a\t h:i A') }}</span>
            <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Are you sure you want to delete this note?')"
                class="cursor-pointer text-xs font-medium text-gray-500 hover:text-gray-700">Delete</button>
            </form>
          </div>
          <p class="text-sm text-gray-700">{{ $note->content }}</p>
        </div>
      @empty
        <div class="rounded-lg border border-gray-200 bg-gray-50 p-3">
          <p class="text-sm text-gray-600">No notes yet. Add your first note above.</p>
        </div>
      @endforelse
    </div>
  </div>

  <script>
    function toggleNoteForm() {
      const form = document.getElementById('noteForm');
      form.classList.toggle('hidden');
    }
  </script>

</x-layouts.app>
