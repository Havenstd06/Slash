@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center mt-12">
        <div>
            <h1 class="text-xl text-gray-800 font-medium">Reduce the size of your links with {{ config('app.name') }}!</h1>
        </div>

        <div class="border-l border-gray-800 ml-6">
            <div class="ml-6 flex rounded-md shadow-sm">
                <div class="relative flex-grow focus-within:z-10">
                    <input id="url" class="form-input block w-full rounded-none rounded-l-md pl-3 transition ease-in-out duration-150 sm:text-sm sm:leading-5" placeholder="Paste your link, we will slash it for you 😁">
                </div>
                <button class="-ml-px relative inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-r-md text-indigo-700 bg-indigo-100 hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                    <svg aria-hidden="true" data-prefix="fas" data-icon="cut" class="h-5 w-5 text-indigo-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M278 256L444 90c5-5 5-13 0-17a84 84 0 00-118 0L210 188l-25-25a96 96 0 10-76 60l33 33-33 33-13-1a96 96 0 1089 61l25-25 116 115c32 33 86 33 118 0 5-4 5-12 0-17L278 256zM96 160a32 32 0 110-64 32 32 0 010 64zm0 256a32 32 0 110-64 32 32 0 010 64z"/>
                    </svg>
                    <span class="ml-2">Slash</span>
                </button>
            </div>
        </div>
    </div>
@endsection
