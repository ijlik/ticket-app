@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <!-- Registration Form Fields -->
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <!-- Name Field -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-white">Nama</label>
            <input type="text" name="name" id="name" required
                   class="mt-2 block w-full px-4 py-2 border border-gray-300 bg-transparent text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Email Field -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-white">Email</label>
            <input type="email" name="email" id="email" required
                   class="mt-2 block w-full px-4 py-2 border border-gray-300 bg-transparent text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Password Field -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-white">Password</label>
            <input type="password" name="password" id="password" required
                   class="mt-2 block w-full px-4 py-2 border border-gray-300 bg-transparent text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Password Confirmation Field -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-white">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                   class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Submit Button -->
        <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Register
        </button>
    </form>

    <!-- Login Redirect -->
    <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">Sudah punya akun?</p>
        <a href="{{ url('login') }}"
           class="inline-block mt-2 px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Login
        </a>
    </div>
@endsection
