@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center py-14 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full">
    <div>
      <img class="mx-auto h-12 w-auto" src="{{ url('/img/logo-icon.png') }}" alt="{{ config('app.name') }} logo">
      <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
        Reset Password
      </h2>
      <p class="mt-2 text-center text-sm leading-5 text-gray-600">
        Or
        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
          sign in to your account
        </a>
      </p>
    </div>
    @if (session('status'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form class="mt-8" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="rounded-md shadow-sm">
            <div>
                <input aria-label="Email address" name="email" id="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:z-10 sm:text-sm sm:leading-5 @error('email') border-red-500 focus:shadow-outline-red focus:border-red-300 @else border-gray-300 focus:shadow-outline-blue focus:border-blue-300 @enderror" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
        </div>
        @error('email')
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
                Send Password Reset Link
            </button>
        </div>
    </form>
  </div>
</div>
@endsection
