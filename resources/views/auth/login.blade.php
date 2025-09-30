<x-layouts.app>
  <!-- Header -->
  <div class="mb-6 border-b-2 border-gray-300 pb-3">
    <h1 class="text-3xl font-semibold text-gray-800">Sign In</h1>
    <p class="mt-1 text-sm text-gray-600">Welcome back! Please sign in to your account</p>
  </div>

  <!-- Login Form -->
  <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
    <form action="{{ route('login.authenticate') }}" method="POST" class="space-y-5">
      @csrf
      <!-- Email Field -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-800">Email Address</label>
        <input type="email" id="email" name="email" required
          class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 text-base text-gray-800 placeholder-gray-500 focus:border-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500"
          placeholder="Enter your email" />
      </div>

      <!-- Password Field -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-800">Password</label>
        <input type="password" id="password" name="password" required
          class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 text-base text-gray-800 placeholder-gray-500 focus:border-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500"
          placeholder="Enter your password" />
      </div>

      <!-- Remember Me & Forgot Password -->
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input type="checkbox" id="remember" name="remember"
            class="h-4 w-4 rounded border-gray-300 text-gray-600 focus:ring-gray-500" />
          <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
        </div>
        <a href="#" class="text-sm text-gray-600 hover:text-gray-800">Forgot your password?</a>
      </div>

      @error('email')
        <p class="text-sm text-gray-600">{{ $message }}</p>
      @enderror

      <!-- Submit Button -->
      <button type="submit"
        class="w-full rounded-lg bg-gray-800 px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600">
        Sign In
      </button>
    </form>

    <!-- Divider -->
    <div class="my-5 flex items-center">
      <div class="flex-1 border-t border-gray-200"></div>
      <span class="mx-4 text-sm text-gray-500">or</span>
      <div class="flex-1 border-t border-gray-200"></div>
    </div>

    <!-- Social Login Buttons -->
    <div class="space-y-2.5">
      <button type="button"
        class="flex w-full items-center justify-center gap-2.5 rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
        <svg class="h-4 w-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 15h-2v-2h2v2zm.79-5.38l-.9.92c-.7.72-.89 1.18-.89 2.46h-2v-.5c0-1.02.19-1.79.89-2.52l1.24-1.28c.36-.34.56-.82.56-1.32a1.66 1.66 0 10-3.32 0H8a3.66 3.66 0 117.32 0 3.11 3.11 0 01-.53 1.74z" />
        </svg>
        Continue with Single Sign-On
      </button>

      <button type="button"
        class="flex w-full items-center justify-center gap-2.5 rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
        <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm6 0a10 10 0 11-20 0 10 10 0 0120 0z" />
        </svg>
        Continue with Directory
      </button>
    </div>
  </div>

  <!-- Sign Up Link -->
  <div class="mt-5 text-center">
    <p class="text-sm text-gray-600">
      Don't have an account?
      <a href="{{ route('register') }}" class="font-medium text-gray-800 hover:text-gray-900">Sign up here</a>
    </p>
  </div>
</x-layouts.app>
