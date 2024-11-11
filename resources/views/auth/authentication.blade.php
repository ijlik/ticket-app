@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-white">Email</label>
            <input type="text" name="email" id="email" required
                   class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-white">Password</label>
            <input type="password" name="password" id="password" required
                   class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Login
        </button>
    </form>

    <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">Belum punya akun?</p>
        <a href="{{ route('register') }}"
           class="inline-block mt-2 px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Register
        </a>
    </div>
@endsection
