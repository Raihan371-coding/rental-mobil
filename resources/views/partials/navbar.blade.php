<nav class="bg-white border-b">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">
      <div class="flex items-center">
        <a href="{{ url('/') }}" class="text-xl font-semibold text-blue-600">Rental Mobil</a>
      </div>
      <div class="hidden md:flex items-center space-x-4">
        <a href="#features" class="text-gray-600 hover:text-gray-900">Features</a>
        <a href="#fleet" class="text-gray-600 hover:text-gray-900">Fleet</a>
        <a href="#pricing" class="text-gray-600 hover:text-gray-900">Pricing</a>
      </div>
      <div class="flex items-center space-x-3">
        @auth
          <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Logout</button></form>
        @else
          <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Login</a>
          <a href="{{ route('register') }}" class="px-3 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700">Get Started</a>
        @endauth
      </div>
      <div class="md:hidden">
        <!-- Mobile menu placeholder -->
      </div>
    </div>
  </div>
</nav>
