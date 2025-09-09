@extends('layouts.layout')
{{-- @include('layouts.registernav') --}}
@section('content')
  <div class="bg-white border border-gray-300 p-5 rounded-lg shadow-lg w-full max-w-sm mx-auto">
    <form method="POST" action="{{route('auth.register')}}" class="space-y-4">
      @csrf
      <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Sign Up</h2>

      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
        <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Full Name" value="{{old('name')}}">
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="example@gmail.com" 
        value="{{old('email')}}">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Password">
      </div>

      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
        <input type="password" name="password_confirmation" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Confirm Password">
      </div>

      <div>
        <p>Already have an account? <a href="{{route('show.login')}}" class="text-[#0000EE]">Login here.</a></p>
      </div>

      <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
        Signup
      </button>
    </form>

    @if($errors->any())
      <ul class="px-4 py-4 bg-red-100">
        @foreach($errors->all() as $error)
          <li class="my-2 text-red-500">{{$error}}</li>
        @endforeach
      </ul>
    @endif
  </div>
@endsection