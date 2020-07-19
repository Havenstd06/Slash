<nav x-data="{ open: false }" class="mb-4 bg-white shadow">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
        <div class="flex">
        @auth
        <div class="flex items-center mr-2 -ml-2 md:hidden">
            <!-- Mobile menu button -->
            <button @click="open = !open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500" x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" aria-label="Main menu" x-bind:aria-expanded="open">
            <!-- Icon when menu is closed. -->
            <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': open, 'block': !open }" class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <!-- Icon when menu is open. -->
            <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': !open, 'block': open }" class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            </button>
        </div>
        @endauth
          <a class="flex items-center flex-shrink-0" href="{{ route('home') }}">
            <img class="w-auto h-7 md:h-9" src="{{ url('/img/logo-icon.png') }}" alt="{{ config('app.name') }} logo">
            <h1 class="ml-1.5 font-semibold text-xl md:text-2xl text-gray-800 uppercase">{{ config('app.name') }}</h1>
            <small class="ml-1 text-sm text-gray-700">Beta</small>
          </a>
        </div>
        <div class="flex items-center">
        @auth
          <div class="hidden md:ml-4 md:flex-shrink-0 md:flex md:items-center">
            <!-- Profile dropdown -->
            <div @click.away="open = false" class="relative ml-3" x-data="{ open: false }">
              <div class="flex items-center">
                  <h2 class="mr-2 text-lg font-medium text-gray-700">{{ auth()->user()->name }}</h2>
                  <button @click="open = !open" class="flex text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300" id="user-menu" aria-label="User menu" aria-haspopup="true" x-bind:aria-expanded="open">
                  <img class="w-10 h-10 rounded-full" src="{{ url('img/profile.png') }}" alt="">
                  </button>
              </div>
              <div x-show="open" x-description="Profile dropdown panel, show/hide based on dropdown state." x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-48 mt-2 origin-top-right rounded-md shadow-lg" style="display: none;">
                  <div class="py-1 bg-white rounded-md shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                  {{-- <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100 focus:outline-none focus:bg-gray-100" role="menuitem">My links</a> --}}
                  <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100 focus:outline-none focus:bg-gray-100" role="menuitem" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                      {{ csrf_field() }}
                  </form>
                  </div>
              </div>
            </div>
          </div>
        @else
          <div class="flex-shrink-0">
              <a href="{{ route('login') }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">
                <span>Login</span>
              </a>
              <a href="{{ route('register') }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md shadow-sm md:ml-2 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                <span>Register</span>
              </a>
          </div>
        @endauth
        </div>
    </div>
    </div>

    @auth
    <div x-description="Mobile menu, toggle classes based on menu state." x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
      <div class="pt-4 pb-3 border-t border-gray-200">
          <div class="flex items-center px-4 sm:px-6">
            <div class="flex-shrink-0">
                <img class="w-10 h-10 rounded-full" src="{{ url('img/profile.png') }}" alt="">
            </div>
            <div class="ml-3">
                <div class="text-base font-medium leading-6 text-gray-800">{{ auth()->user()->name }}</div>
                <div class="text-sm font-medium leading-5 text-gray-500">{{ auth()->user()->email }}</div>
            </div>
          </div>
          <div class="mt-3">
            {{-- <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 sm:px-6">My links</a> --}}
            <a href="{{ route('logout') }}" class="block px-4 py-2 mt-1 text-base font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 sm:px-6" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
          </div>
      </div>
    @endauth
    </div>
</nav>