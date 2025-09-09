@extends('layouts.layout')

@section('content')
{{-- TASKS FORM WILL ONLY DISPLAY IF USER LOGGED IN --}}
@auth()
   <div class="bg-white border border-gray-300 p-8 rounded-lg shadow-lg w-50%">
      {{-- Task Input Form --}}
      <form method="POST" class="flex mb-6" action="{{ route('tasks.store') }}">
         @csrf
         <input type="text" name="title" placeholder="Add a new task..."
               class="flex-grow p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"/>
         <input type="text" name="description" placeholder="Add description..."
               class="flex-grow p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 ml-2"/>       
         <input type="submit" value="Add Task" class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600 transition duration-200 ml-2" />
      </form>

      {{-- TASK LOOPING  --}}
      @foreach($tasks as $task)
         <div class="bg-white border border-gray-300 p-6 rounded-lg shadow-md w-full max-w-md mt-4">
            <h2 class="text-xl text-[#7C3AED] font-semibold mb-3">{{ $task->title }}</h2>
            <p class="text-gray-700 mb-4">{{ $task->description }}</p>

            {{-- CREATED_AT/UPDATED_AT ARGUMENTS --}}
            @if($task->created_at != $task->updated_at)
               <p class="text-gray-700 mb-4">Updated {{ $task->updated_at->diffForHumans() }}</p>
            @else
               <p class="text-gray-700 mb-4">Created {{ $task->created_at->diffForHumans() }}</p>
            @endif

            <div class="flex space-x-2">
               {{-- Edit Button  --}}
               <button type="button" onclick="openModal('editModal-{{ $task->id }}')" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-200">Edit
               </button>

                {{-- Delete Form  --}}
               <form method="POST" action="{{route('tasks.destroy', $task->id)}}" class="inline">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Delete" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-200" />
               </form>
            </div>
         </div>
         {{-- FOR UPDATE MODAL HERE --}}
         @include('layouts.editmodal')
      @endforeach
   </div>
@endauth

{{-- DISPLAY DEFAULT IF USER NOT LOGGEDIN --}}
@guest
   <h1 class="text-3xl font-bold text-center mb-6">Login to create tasks.</h1>
@endguest
   {{-- Modal JS  --}}
   <script>
      function openModal(id) {
         document.getElementById(id).classList.remove('hidden');
      }
      function closeModal(id) {
         document.getElementById(id).classList.add('hidden');
      }
   </script>
@endsection
