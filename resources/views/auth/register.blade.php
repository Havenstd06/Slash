@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center py-14 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full">
    <div>
      <img class="mx-auto h-12 w-auto" src="{{ url('/img/logo-icon.png') }}" alt="{{ config('app.name') }} logo">
      <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
        Create your account
      </h2>
      <p class="mt-2 text-center text-sm leading-5 text-gray-600">
        Or
        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
          sign in to your account
        </a>
      </p>
    </div>
    <form class="mt-8" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="rounded-md shadow-sm">
            <div>
                <input aria-label="Name" name="name" id="name" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:z-10 sm:text-sm sm:leading-5 @error('name') border-red-500 focus:shadow-outline-red focus:border-red-300 @else border-gray-300 focus:shadow-outline-blue focus:border-blue-300 @enderror" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>
            <div class="-mt-px">
                <input aria-label="Email address" name="email" id="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border placeholder-gray-500 text-gray-900 focus:outline-none focus:z-10 sm:text-sm sm:leading-5 @error('email') border-red-500 focus:shadow-outline-red focus:border-red-300 @else border-gray-300 focus:shadow-outline-blue focus:border-blue-300 @enderror" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            <div class="-mt-px">
                <input aria-label="Password" name="password" id="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5 @error('password') border-red-500 focus:shadow-outline-red focus:border-red-300 @else focus:shadow-outline-blue focus:border-blue-300 border-gray-300 @enderror" placeholder="Password"  required autocomplete="new-password">
            </div>
            <div class="-mt-px">
                <input aria-label="Confirm Password" name="password_confirmation" id="password-confirm" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5 focus:shadow-outline-blue focus:border-blue-300 border-gray-300" placeholder="Confirm Password" required autocomplete="new-password">
            </div>
        </div>
        @error('name')
            <p class="text-red-500 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror
        @error('email')
            <p class="text-red-500 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror
        @error('password')
            <p class="text-red-500 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror

        <div class="mt-6">
            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 transition ease-in-out duration-150" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                </svg>
            </span>
                Register
            </button>
        </div>
    </form>
  </div>
</div>
@endsection
