<nav class="fixed top-0 left-0 z-50 w-full bg-white border-b ">
  <div class="mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center ">
      <div class="flex items-start ">
        <a href="{{ url('/') }}" class="text-xl font-semibold text-blue-600">RentEase</a>
      </div>
      <div class="hidden md:flex items-center space-x-4">

        <a href="{{ url('/') }}" class="text-blue-800 shadow-md border-b-2 border-b-blue-600 transition-colors duration-200">Beranda</a>
        <a href="#fleet" class="text-gray-600 hover:text-gray-900 hover:border-b-2 hover:border-b-cyan-500 transition-colors duration-200">Cara Kerja</a>
        <a href="#pricing" class="text-gray-600 hover:text-gray-900 hover:border-b-2 hover:border-b-cyan-500 transition-colors duration-200">Promo</a>
        <a href="#pricing" class="text-gray-600 hover:text-gray-900 hover:border-b-2 hover:border-b-cyan-500 transition-colors duration-200">Tentang Kami</a>
        <a href="#pricing" class="text-gray-600 hover:text-gray-900 hover:border-b-2 hover:border-b-cyan-500 transition-colors duration-200">Kontak</a>
      </div>
      <div class=" hidden md:flex items-center space-x-3">
        @auth
          <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Logout</button></form>
        @else
          <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Login</a>
          <a href="{{ route('register') }}" class="px-3 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700">Get Started</a>
        @endauth
      </div>
      <div class="md:hidden">
        <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-600 hover:bg-gray-100 focus:outline-none transition-colors duration-200" aria-expanded="false" aria-controls="mobile-menu">
          <span class="sr-only">Buka menu</span>
          <svg id="menu-icon-open" class="h-6 w-6 block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg id="menu-icon-close" class="h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <div id="mobile-menu" class="hidden border-t bg-white md:hidden overflow-hidden transition-all duration-300 ease-in-out">
    <div class="px-4 py-3 space-y-2">
      <a href="{{ url('/') }}" class="block rounded-md px-2 py-2 text-sm font-medium text-white bg-blue-600">Beranda</a>
      <a href="#fleet" class="block rounded-md px-2 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">Cara Kerja</a>
      <a href="#pricing" class="block rounded-md px-2 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">Promo</a>
      <a href="#pricing" class="block rounded-md px-2 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">Tentang Kami</a>
      <a href="#pricing" class="block rounded-md px-2 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">Kontak</a>

      <div class="border-t-2 border-t-blue-500 pt-2 mt-2 space-y-2">
        @auth
          <a href="{{ route('dashboard') }}" class="block rounded-md px-2 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="w-full text-left rounded-md px-2 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">Logout</button></form>
        @else
          <a href="{{ route('login') }}" class="block rounded-md px-2 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">Login</a>
          <a href="{{ route('register') }}" class="block rounded-md px-2 py-2 text-sm font-medium bg-blue-600 text-white hover:bg-blue-700">Get Started</a>
        @endauth
      </div>
    </div>
  </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const button = document.getElementById('mobile-menu-button');
  const menu = document.getElementById('mobile-menu');
  const iconOpen = document.getElementById('menu-icon-open');
  const iconClose = document.getElementById('menu-icon-close');

  if (button && menu && iconOpen && iconClose) {
    button.addEventListener('click', function () {
      const isExpanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', String(!isExpanded));

      menu.classList.toggle('hidden');
      iconOpen.classList.toggle('hidden', !isExpanded);
      iconClose.classList.toggle('hidden', isExpanded);
    });
  }
});
</script>
