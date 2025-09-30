<x-layouts.app>
  <!-- Header -->
  <div class="mb-6 border-b-2 border-gray-300 pb-3">
    <h1 class="text-3xl font-semibold text-gray-800">Create Account</h1>
    <p class="mt-1 text-sm text-gray-600">Join us today! Create your account to get started</p>
  </div>

  <!-- Registration Form -->
  <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
    <form action="{{ route('register.register') }}" method="POST" class="space-y-5">
      @csrf
      <!-- Name Field -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-800">Full Name</label>
        <input type="text" id="name" name="name" required
          class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 text-base text-gray-800 placeholder-gray-500 focus:border-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500"
          placeholder="Enter your full name" />
      </div>

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
          placeholder="Create a password" />
        <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters long</p>
      </div>

      <!-- Confirm Password Field -->
      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-800">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required
          class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 text-base text-gray-800 placeholder-gray-500 focus:border-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500"
          placeholder="Confirm your password" />
      </div>

      <!-- Terms and Privacy -->
      <div class="flex items-start">
        <input type="checkbox" id="terms" name="terms" required
          class="mt-1 h-4 w-4 rounded border-gray-300 text-gray-600 focus:ring-gray-500" />
        <label for="terms" class="ml-2 text-sm text-gray-600">
          I agree to the
          <a href="#" class="text-gray-800 hover:text-gray-900">Terms of Service</a>
          and
          <a href="#" class="text-gray-800 hover:text-gray-900">Privacy Policy</a>
        </label>
      </div>

      <!-- Newsletter Subscription -->
      {{-- <div class="flex items-start">
        <input type="checkbox" id="newsletter" name="newsletter"
          class="mt-1 h-4 w-4 rounded border-gray-300 text-gray-600 focus:ring-gray-500" />
        <label for="newsletter" class="ml-2 text-sm text-gray-600">
          Subscribe to our newsletter for updates and tips
        </label>
      </div> --}}

      <!-- Submit Button -->
      <button type="submit"
        class="w-full rounded-lg bg-gray-800 px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600">
        Create Account
      </button>
    </form>

    <!-- Divider -->
    <div class="my-5 flex items-center">
      <div class="flex-1 border-t border-gray-200"></div>
      <span class="mx-4 text-sm text-gray-500">or sign up with</span>
      <div class="flex-1 border-t border-gray-200"></div>
    </div>

    <!-- Social Registration Buttons -->
    <div class="grid grid-cols-1 gap-2.5 sm:grid-cols-2">
      <button type="button"
        class="flex items-center justify-center gap-2.5 rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
        <svg class="h-4 w-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 15h-2v-2h2v2zm.79-5.38l-.9.92c-.7.72-.89 1.18-.89 2.46h-2v-.5c0-1.02.19-1.79.89-2.52l1.24-1.28c.36-.34.56-.82.56-1.32a1.66 1.66 0 10-3.32 0H8a3.66 3.66 0 117.32 0 3.11 3.11 0 01-.53 1.74z" />
        </svg>
        Single Sign-On
      </button>

      <button type="button"
        class="flex items-center justify-center gap-2.5 rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
        <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm6 0a10 10 0 11-20 0 10 10 0 0120 0z" />
        </svg>
        Directory
      </button>
    </div>
  </div>

  <!-- Sign In Link -->
  <div class="mt-5 text-center">
    <p class="text-sm text-gray-600">
      Already have an account?
      <a href="{{ route('login') }}" class="font-medium text-gray-800 hover:text-gray-900">Sign in here</a>
    </p>
  </div>

</x-layouts.app>
