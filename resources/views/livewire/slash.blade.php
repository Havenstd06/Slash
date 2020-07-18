<div>
    <div class="flex items-center justify-center mt-12">
        <div>
            <h1 class="text-xl font-medium text-gray-800">Reduce the size of your links with {{ config('app.name') }}!</h1>
        </div>
        <div class="ml-6 border-l border-gray-800">
            <form action="" method="POST">
                <div class="flex ml-6">
                    <div class="relative flex-grow focus-within:z-10">
                        <input wire:model="original_url" name="original_url" id="original_url" type="text" placeholder="Paste your link, we will slash it for you 😁" class="block w-full pl-3 transition duration-150 ease-in-out rounded-none form-input rounded-l-md sm:text-sm sm:leading-5">
                    </div>
                    <button wire:click.prevent="create" type="submit" class="@if (!$originalUrlValid) cursor-not-allowed hover:opacity-75 @endif relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-indigo-700 transition duration-150 ease-in-out bg-indigo-100 border border-transparent rounded-r-md hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200" @if (!$originalUrlValid) disabled="disabled" @endif>
                        <svg aria-hidden="true" data-prefix="fas" data-icon="cut" class="w-5 h-5 text-indigo-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M278 256L444 90c5-5 5-13 0-17a84 84 0 00-118 0L210 188l-25-25a96 96 0 10-76 60l33 33-33 33-13-1a96 96 0 1089 61l25-25 116 115c32 33 86 33 118 0 5-4 5-12 0-17L278 256zM96 160a32 32 0 110-64 32 32 0 010 64zm0 256a32 32 0 110-64 32 32 0 010 64z"/>
                        </svg>
                        <span class="ml-2">Slash my URL</span>
                    </button>
                    @if ($originalUrlValid == true && $original_url != null)
                        <p class="flex items-center ml-2 text-green-600" wire:target="original_url">
                            <svg aria-hidden="true" data-prefix="far" data-icon="check-circle" class="w-6 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8a248 248 0 100 496 248 248 0 000-496zm0 48a200 200 0 110 400 200 200 0 010-400m140 130l-22-22c-5-5-13-5-17-1L215 304l-59-61c-5-4-13-4-17 0l-23 23c-5 5-5 12 0 17l91 91c4 5 12 5 17 0l172-171c5-4 5-12 0-17z"/></svg>
                            <span class="font-bold"></span>
                        </p>
                    @elseif ($originalUrlValid == false && $original_url != null)
                        <p class="flex items-center ml-2 text-red-600" wire:target="original_url">
                            <svg aria-hidden="true" data-prefix="far" data-icon="times-circle" class="w-6 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8a248 248 0 100 496 248 248 0 000-496zm0 448a200 200 0 110-400 200 200 0 010 400zm102-262l-62 62 62 62c5 5 5 12 0 17l-23 23c-5 5-12 5-17 0l-62-62-62 62c-5 5-12 5-17 0l-23-23c-4-5-4-12 0-17l62-62-62-62c-4-5-4-12 0-17l23-23c5-4 12-4 17 0l62 62 62-62c5-4 13-4 17 0l23 23c5 5 5 12 0 17z"/></svg>
                            <span class="font-bold">Invalid URL</span>
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="container max-w-lg mx-auto mt-6 bg-white rounded-md">
        <div class="flex items-center justify-between w-full p-6 space-x-6">
            <div class="flex-1 truncate">
                <div class="flex items-center space-x-3">
                    <h3 class="text-sm font-medium leading-5 text-gray-900 truncate">limg.app</h3>
                </div>
                <p class="mt-1 text-sm leading-5 text-gray-500 truncate">Limg — Image Hosting Made In Laravel</p>
            </div>
            <img class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full" src="https://limg.app/images/favicon/favicon.ico" alt="Site Favicon">
        </div>
        <div class="border-t border-gray-200">
            <div class="flex -mt-px">
                <div class="flex flex-1 w-0 border-r border-gray-200">
                <a href="#" class="relative inline-flex items-center justify-center flex-1 w-0 py-4 -mr-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out border border-transparent rounded-bl-lg hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10">
                    <span class="ml-3">Original URL</span>
                </a>
                </div>
                <div class="flex flex-1 w-0 -ml-px">
                <a href="#" class="relative inline-flex items-center justify-center flex-1 w-0 py-4 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out border border-transparent rounded-br-lg hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10">
                    <span class="ml-3">Slash URL</span>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
