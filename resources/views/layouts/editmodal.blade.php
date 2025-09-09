<div id="editModal-{{ $task->id }}" class="fixed inset-0 hidden bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6 relative">
        <h2 class="text-lg font-semibold mb-4">Edit Task</h2>
        <form method="POST" action="{{route('tasks.update', $task->id)}}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Task Name</label>
                <input type="text" name="title" value="{{ $task->title }}" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Description</label>
                <textarea name="description" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">{{ $task->description }}</textarea>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal('editModal-{{ $task->id }}')" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>

</div>