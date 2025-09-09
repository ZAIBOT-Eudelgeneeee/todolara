@extends('layouts.layout')
@section('content')
  <div class="bg-white border border-gray-300 p-8 rounded-lg shadow-lg w-full max-w-sm mx-auto mt-15">
    <form method="POST" action="{{route('auth.login')}}" class="space-y-4">
      @csrf
      <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Log In</h2>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-400" value="{{old('email')}}" required>
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md 
        focus:outline-none focus:ring-2 focus:ring-orange-400" required>
      </div>
      <div>
        <p>Don't have an account yet? <a href="{{route('show.register')}}" class="text-[#0000EE]">Signup here.</a></p>
      </div>

      <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
        Login
      </button>
    </form>
  </div>
@endsection