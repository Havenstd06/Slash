<div x-data="{ dash: true }" class="z-30">
  <div class="absolute top-0 right-0 mt-20 mr-4">
    <span class="inline-flex rounded-md shadow-sm">
      <button :class="{ 'hidden': dash === true }"  @click="dash = true" type="button" class="inline-flex items-center px-4 py-2 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">
        My Dashboard
      </button>
    </span>
  </div>
  <section class="absolute inset-y-0 right-0 flex max-w-full pl-10 my-20">
    <div class="w-screen max-w-md" x-description="Slide-over panel, show/hide based on slide-over state." x-show="dash" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
      <div class="flex flex-col h-full py-6 space-y-6 overflow-y-scroll bg-white rounded-md shadow-xl">
        <header class="px-4 sm:px-6">
          <div class="flex items-start justify-between space-x-3">
            <h2 class="text-xl font-medium leading-7 tracking-wide text-gray-900 truncate" title="{{ auth()->user()->name }}'s Dashboard">
              {{ auth()->user()->name }}'s Dashboard
            </h2>
            <div class="flex items-center h-7">
              <button @click="dash = false" aria-label="Close panel" class="text-gray-400 transition duration-150 ease-in-out hover:text-gray-500">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
              </button>
            </div>
          </div>
        </header>
        <div id="settings">
          <h1 class="px-4 mb-2 text-lg font-medium leading-7 text-gray-800 sm:px-6">Settings</h1>
          @livewire('user-settings-dashboard')
        </div>
        <div id="links">
          <h1 class="px-4 mb-2 text-lg font-medium leading-7 text-gray-800 sm:px-6">My Last 5 Links</h1>
          @livewire('user-links-dashboard')
        </div>
      </div>
    </div>
  </section>
  </div>