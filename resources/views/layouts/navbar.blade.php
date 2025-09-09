<nav class="bg-white shadow-md">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">
      
      <div class="flex-shrink-0 flex items-center">
        @guest  
          <span class="ml-2 font-bold text-xl text-[#7C3AED]">Todo List</span>
        @endguest
        @auth
          <h3 class="text-lg font-bold">Welcome<span class="text-lg ml-2 text-orange-500">{{Auth::user()->name}}</span></h3>
        @endauth
      </div>
      
      <div class="hidden md:flex space-x-8">
        @guest
          <a href="{{route('dashboard')}}" class="text-gray-700 hover:text-orange-500 transition">Home</a>
          <a href="{{route('show.login')}}" class="text-gray-700 hover:text-orange-500 transition">Login</a>
          <a href="{{route('show.register')}}"class="text-gray-700 hover:text-orange-500 transition">Register</a>
        @endguest
        @auth
          <form action="{{route('auth.logout')}}" method="POST">
            @csrf
            <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
              Logout    
            </button>
          </form>
        @endauth
      </div>
      
      <div class="md:hidden">
        <button type="button" class="text-gray-700 hover:text-blue-600 focus:outline-none">
          <!-- Hamburger icon -->
          <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" 
               viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>
</nav>