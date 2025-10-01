<x-layouts.app>
  <div class="flex min-h-screen items-center justify-center bg-gray-100">
    <div class="text-center">
      <h1 class="mb-4 text-4xl font-bold text-gray-800">Welcome to Laravel Todo List Application</h1>
      <p class="mb-8 text-lg text-gray-600">Organize your tasks efficiently</p>
      <a href="{{ route('login') }}"
        class="inline-block rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white transition duration-200 hover:bg-blue-700">
        Get Started - Login
      </a>
    </div>
  </div>
</x-layouts.app>
